<?php   
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\FinanceTransactions;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\StockHistory;

// exports
use App\Exports\StockHistoryExport;
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

    ->when($request->status, function ($query) use ($request) {

        $query->where(
            'status',
            $request->status
        );

    })

    ->get();

    $totalProducts = $products->count();

    $activeProducts = $products
        ->where('status', 'Aktif')
        ->count();

    $readyStockProducts = $products
        ->where('product_type', 'Ready Stok')
        ->count();

    $poProducts = $products
        ->where('product_type', 'PO')
        ->count();

    $categories = CategoryProduct::all();

    return view(
        'admin.report-stock',
        compact(
            'products',
            'totalProducts',
            'activeProducts',
            'readyStockProducts',
            'poProducts',
            'categories'
        )
    );
    }

    public function exportStock()
    {
    return Excel::download(
    new StockExport,
    'laporan-produk.xlsx'
    );
    }

    public function stockHistory(Request $request)
    {
        $histories = StockHistory::with([
            'product',
            'variant',
            'user'
        ])

        ->when($request->from_date, function ($query) use ($request) {

            $query->whereDate(
                'created_at',
                '>=',
                $request->from_date
            );

        })

        ->when($request->to_date, function ($query) use ($request) {

            $query->whereDate(
                'created_at',
                '<=',
                $request->to_date
            );

        })

        ->when($request->product_id, function ($query) use ($request) {

            $query->where(
                'product_id',
                $request->product_id
            );

        })

        ->when($request->type, function ($query) use ($request) {

            $query->where(
                'type',
                $request->type
            );

        })

        ->when($request->location, function ($query) use ($request) {

            $query->where(
                'location',
                $request->location
            );

        })



        ->latest()

        ->get();

        $totalActivities = $histories->count();

        $totalIncoming = $histories
            ->where('type', 'Masuk')
            ->sum('qty');

        $totalOutgoing = $histories
            ->where('type', 'Keluar')
            ->sum('qty');

        $totalProducts = $histories
            ->pluck('product_id')
            ->unique()
            ->count();

        $products = Product::orderBy('name')->get();

        return view(
            'admin.report-stock-history',
            compact(
                'histories',
                'products',
                'totalActivities',
                'totalIncoming',
                'totalOutgoing',
                'totalProducts'
            )
        );


    }
    public function exportStockHistory()
    {
        return Excel::download(
            new StockHistoryExport,
            'laporan-riwayat-stok.xlsx'
        );
    }

}