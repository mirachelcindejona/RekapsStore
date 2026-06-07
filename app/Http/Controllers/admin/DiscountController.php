<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DiscountController extends Controller
{
    public function index()
    {
        // Auto-expire: update status jika end_date sudah lewat
        Discount::where('end_date', '<', Carbon::today())
            ->update(['status' => 'Non-Aktif']); // ← fix: konsisten dengan enum

        Voucher::where('end_date', '<', Carbon::today())
            ->update(['status' => 'Non-Aktif']);

        $vouchers  = Voucher::all();
        $discounts = Discount::all();

        return view('admin.promo', compact('vouchers', 'discounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required',
            'type'         => 'required',
            'value'        => 'required|numeric|min:0',
            'min_purchase' => 'required|numeric|min:0',
            'quota'        => 'required|integer|min:1',
            'start_date'   => 'required|date',
            'end_date'     => 'required|date|after_or_equal:start_date',
        ], [
            'name.required'              => 'Nama diskon wajib diisi',
            'type.required'              => 'Tipe diskon wajib dipilih',
            'value.min'                  => 'Nilai diskon tidak boleh negatif',
            'min_purchase.min'           => 'Minimal pembelian tidak boleh negatif',
            'quota.min'                  => 'Kuota penggunaan minimal 1',
            'end_date.after_or_equal'    => 'Tanggal akhir tidak boleh sebelum tanggal mulai',
        ]);

        Discount::create([
            'name'         => $request->name,
            'type'         => $request->type,
            'value'        => $request->value,
            'min_purchase' => $request->min_purchase,
            'quota'        => $request->quota,
            'used_quota'   => 0,
            'start_date'   => $request->start_date,
            'end_date'     => $request->end_date,
            'status'       => 'Aktif', // ← fix: konsisten dengan enum
        ]);

        return back()->with('success', 'Diskon berhasil ditambahkan');
    }

    public function update(Request $request, Discount $discount)
    {
        $request->validate([
            'name'         => 'required',
            'type'         => 'required',
            'value'        => 'required|numeric|min:0',
            'min_purchase' => 'required|numeric|min:0',
            'quota'        => 'required|integer|min:1',
            'start_date'   => 'required|date',
            'end_date'     => 'required|date|after_or_equal:start_date',
        ], [
            'name.required'           => 'Nama diskon wajib diisi',
            'type.required'           => 'Tipe diskon wajib dipilih',
            'value.min'               => 'Nilai diskon tidak boleh negatif',
            'min_purchase.min'        => 'Minimal pembelian tidak boleh negatif',
            'quota.min'               => 'Kuota penggunaan minimal 1',
            'end_date.after_or_equal' => 'Tanggal akhir tidak boleh sebelum tanggal mulai',
        ]);

        $discount->update([
            'name'         => $request->name,
            'type'         => $request->type,
            'value'        => $request->value,
            'min_purchase' => $request->min_purchase,
            'quota'        => $request->quota,
            'start_date'   => $request->start_date,
            'end_date'     => $request->end_date,
            'status'       => $request->status,
        ]);

        return back()->with('success', 'Diskon berhasil diupdate');
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();
        return back()->with('success', 'Diskon berhasil dihapus');
    }
}