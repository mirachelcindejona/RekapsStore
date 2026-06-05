<?php   
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FinanceTransactions;
use App\Models\Product;
use App\Models\CategoryProduct;


use App\Exports\FinanceExport;
use App\Exports\StockExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.reports');
    }


    public function finance()
    {
        $query = FinanceTransactions::query();

        if (request('search')) {
            $query->where(
                'description',
                'like',
                '%' . request('search') . '%'
            );
        }

        if (request('from_date')) {
            $query->whereDate(
                'date',
                '>=',
                request('from_date')
            );
        }

        if (request('to_date')) {
            $query->whereDate(
                'date',
                '<=',
                request('to_date')
            );
        }

        $transactions = $query->latest()->get();

        $totalIncome = (clone $query)
            ->where('type', 'Pemasukan')
            ->sum('amount');

        $totalExpense = (clone $query)
            ->where('type', 'Pengeluaran')
            ->sum('amount');

        $balance = $totalIncome - $totalExpense;

        $totalTransactions = $transactions->count();

        return view(
            'admin.report-finance',
            compact(
                'transactions',
                'totalIncome',
                'totalExpense',
                'balance',
                'totalTransactions'
            )
        );
    }

    public function exportFinance()
    {
        return Excel::download(
            new FinanceExport,
            'laporan-keuangan.xlsx'
        );
    }

    public function stock(Request $request)
    {
        $products = Product::with([
        'category',
        'variants'
    ])

    ->when($request->search, function ($query) use ($request) {

        $query->where(
            'name',
            'like',
            '%' . $request->search . '%'
        );

    })

    ->when($request->category, function ($query) use ($request) {

        $query->where(
            'category_product_id',
            $request->category
        );

    })

    ->when($request->product_type, function ($query) use ($request) {

        $query->where(
            'product_type',
            $request->product_type
        );

    })

    ->get();

        $totalProducts = $products->count();

        $totalStock = 0;
        $lowStockProducts = 0;
        $inventoryValue = 0;

        foreach ($products as $product) {

            $stock = 0;

            foreach ($product->variants as $variant) {

                $stock +=
                    $variant->stock_online +
                    $variant->stock_bazar;
            }

            $product->total_stock = $stock;

            $totalStock += $stock;

            if ($stock < 10) {
                $lowStockProducts++;
            }

            $inventoryValue +=
                $stock * $product->cost_price;
        }

        if ($request->stock_status == 'low') {

            $products = $products->filter(function ($product) {

                return $product->total_stock < 10;

            });

        }

        if ($request->stock_status == 'aman') {

            $products = $products->filter(function ($product) {

                return $product->total_stock >= 10;

            });

}

        $categories = CategoryProduct::all();

        return view(
            'admin.report-stock',
            compact(
                'products',
                'totalProducts',
                'totalStock',
                'lowStockProducts',
                'inventoryValue',
                'categories'
            )
        );
    }

    public function exportStock()
    {
        return Excel::download(
            new StockExport,
            'laporan-stok.xlsx'
        );
    }

    public function transaction()
    {
        return view('admin.report-transaction');
    }

    public function review()
    {
        return view('admin.report-review');
    }

    public function discount()
    {
        return view('admin.report-discount');
    }
}