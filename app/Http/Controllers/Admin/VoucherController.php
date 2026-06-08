<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VoucherController extends Controller
{
    public function index()
    {
        // Auto-expire

        Voucher::where('end_date', '<', Carbon::today())
            ->update(['status' => 'Non-Aktif']);

        $vouchers  = Voucher::all();
        return view('admin.promo', compact('vouchers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code'         => 'required|unique:voucher,code',
            'type'         => 'required',
            'value'        => 'required|numeric|min:0',
            'min_purchase' => 'required|numeric|min:0',
            'quota'        => 'required|integer|min:1',
            'end_date'     => 'required|date',
        ], [
            'code.required'           => 'Kode voucher wajib diisi',
            'code.unique'             => 'Kode voucher sudah digunakan',
            'value.min'               => 'Nilai voucher tidak boleh negatif',
            'min_purchase.min'        => 'Minimal pembelian tidak boleh negatif',
            'quota.min'               => 'Kuota penggunaan minimal 1',
            'end_date.after_or_equal' => 'Tanggal akhir tidak boleh sebelum tanggal mulai',
        ]);

        Voucher::create([
            'code'         => strtoupper($request->code),
            'type'         => $request->type,
            'value'        => $request->value,
            'min_purchase' => $request->min_purchase,
            'quota'        => $request->quota,
            'used_quota'   => 0,
            'start_date'   => now(),
            'end_date'     => $request->end_date,
            'status'       => 'Aktif',
        ]);

        return back()->with('success', 'Voucher berhasil ditambahkan');
    }

    public function update(Request $request, Voucher $voucher)
    {
        $request->validate([
            'code'         => 'required|unique:voucher,code,' . $voucher->id,
            'type'         => 'required',
            'value'        => 'required|numeric|min:0',
            'min_purchase' => 'required|numeric|min:0',
            'quota'        => 'required|integer|min:1',
            'end_date'     => 'required|date',
        ], [
            'code.required'           => 'Kode voucher wajib diisi',
            'code.unique'             => 'Kode voucher sudah digunakan',
            'value.min'               => 'Nilai voucher tidak boleh negatif',
            'min_purchase.min'        => 'Minimal pembelian tidak boleh negatif',
            'quota.min'               => 'Kuota penggunaan minimal 1',
            'end_date.after_or_equal' => 'Tanggal akhir tidak boleh sebelum tanggal mulai',
        ]);

        $voucher->update([
            'code'         => strtoupper($request->code),
            'type'         => $request->type,
            'value'        => $request->value,
            'min_purchase' => $request->min_purchase,
            'quota'        => $request->quota,
            'start_date'   => now(),
            'end_date'     => $request->end_date,
            'status'       => $request->status,
        ]);

        return back()->with('success', 'Voucher berhasil diupdate');
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return back()->with('success', 'Voucher berhasil dihapus');
    }
}