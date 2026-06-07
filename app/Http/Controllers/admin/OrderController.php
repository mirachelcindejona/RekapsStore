<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OnlineOrder;
use App\Models\CashierOrder;
use App\Models\Notification;

class OrderController extends Controller
{
    // Menampilkan Halaman Orders
    public function index(Request $request)
    {
        $tab = $request->get('tab', 'online');
        
        if ($tab == 'online') {
            $query = OnlineOrder::with('user', 'items.product')->orderBy('created_at', 'desc');
            
            // Filter
            if ($request->filled('from_date')) $query->whereDate('created_at', '>=', $request->from_date);
            if ($request->filled('to_date')) $query->whereDate('created_at', '<=', $request->to_date);
            if ($request->filled('status')) $query->where('status', $request->status);
            if ($request->filled('search')) $query->where('order_code', 'like', '%' . $request->search . '%');
            
            $orders = $query->paginate(20)->withQueryString();
            
        } else {
            // Logika untuk tab Bazar (Cashier Orders)
            $query = CashierOrder::with('items.product')->orderBy('created_at', 'desc');
            
            // Filter
            if ($request->filled('from_date')) $query->whereDate('created_at', '>=', $request->from_date);
            if ($request->filled('to_date')) $query->whereDate('created_at', '<=', $request->to_date);
            if ($request->filled('status')) $query->where('status', $request->status);
            if ($request->filled('search')) $query->where('order_code', 'like', '%' . $request->search . '%');
            
            $orders = $query->paginate(20)->withQueryString();
        }

        return view('admin.orders', compact('orders', 'tab'));
    }

    // Mengupdate Status Pesanan Online & Mengirim Notifikasi
    public function updateOnlineStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
            'estimasi_hari' => 'nullable|integer|min:1'
        ]);

        $order = OnlineOrder::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        // Menyusun Pesan Notifikasi Berdasarkan Status
        $title = "Update Pesanan " . $order->order_code;
        $message = "";

        switch ($request->status) {
            case 'Menunggu Proses Produksi':
                $message = "Pesananmu sedang dalam antrean dan akan segera diproses oleh tim kami.";
                break;
            case 'Sedang Diproduksi':
                $estimasi = $request->estimasi_hari ? $request->estimasi_hari . " hari" : "beberapa waktu ke depan";
                $message = "Pesananmu sedang dibuat! Estimasi pengerjaan memakan waktu kurang lebih " . $estimasi . ".";
                break;
            case 'Siap Diambil':
                $message = "Hore! Pesananmu sudah siap diambil di stand Rekaps Store. Ditunggu kedatangannya ya!";
                break;
            case 'Pesanan Selesai':
                $message = "Pesanan telah selesai. Terima kasih telah berbelanja di Rekaps Store!";
                break;
        }

        // Insert ke tabel Notifications
        Notification::create([
            'user_id' => $order->user_id,
            'title'   => $title,
            'message' => $message,
            'type'    => 'order',
            'link'    => '/user/orders/' . $order->order_code, // Sesuaikan dengan route user kamu
            'is_read' => false
        ]);

        return back()->with('success', 'Status berhasil diupdate dan notifikasi telah dikirim ke pelanggan.');
    }
}