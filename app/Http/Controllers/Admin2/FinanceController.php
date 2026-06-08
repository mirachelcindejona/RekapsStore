<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FinanceTransactions;
use App\Exports\FinanceExport;
use Maatwebsite\Excel\Facades\Excel;


class FinanceController extends Controller
{
     public function index(Request $request)
    {
        $transactions = FinanceTransactions::query()

            ->when($request->search, function ($query) use ($request) {
                $query->where('description', 'like', '%' . $request->search . '%')
                      ->orWhere('category', 'like', '%' . $request->search . '%');
            })

            ->when($request->type && $request->type != 'Semua', function ($query) use ($request) {
                $query->where('type', $request->type);
            })

            ->when($request->from_date, function ($query) use ($request) {
                $query->whereDate('date', '>=', $request->from_date);
            })

            ->when($request->to_date, function ($query) use ($request) {
                $query->whereDate('date', '<=', $request->to_date);
            })

            ->latest()
            ->get();

        $totalIncome = FinanceTransactions::where('type', 'Pemasukan')->sum('amount');

        $totalExpense = FinanceTransactions::where('type', 'Pengeluaran')->sum('amount');

        $balance = $totalIncome - $totalExpense;

        return view(
            'admin.finance',
            compact(
                'transactions',
                'totalIncome',
                'totalExpense',
                'balance'
            )
        );
    }

    public function store(Request $request)
    {
        FinanceTransactions::create([
            'date' => $request->date,
            'description' => $request->description,
            'category' => $request->category,
            'type' => $request->type,
            'amount' => $request->amount,
        ]);

        return redirect('/admin/finance');
    }

    public function update(Request $request, $id)
    {
        FinanceTransactions::findOrFail($id)->update([
            'amount' => $request->amount,
            'type' => $request->type,
            'date' => $request->date,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect('/admin/finance');
    }

    public function destroy($id)
    {
        FinanceTransactions::findOrFail($id)->delete();

        return redirect('/admin/finance');
    }

}
