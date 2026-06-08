<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OnlineOrder;
use App\Models\OnlineOrderItem;
use App\Models\CashierOrder;
use App\Models\CashierOrderItem;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        // return view('admin.dashboard');
        
        $totalProducts = Product::count();

        $totalOrders =
            OnlineOrder::count() +
            CashierOrder::count();

        $totalRevenue =
        OnlineOrder::where(
            'payment_status',
            'Lunas'
        )->sum('total')
        +
        CashierOrder::where(
            'payment_status',
            'Lunas'
        )->sum('total');

        $activeBuyers =
        User::role('customer')->count();

        $newOrdersToday =
        OnlineOrder::whereDate(
            'created_at',
            today()
        )->count()
        +
        CashierOrder::whereDate(
            'created_at',
            today()
        )->count();

        $todayRevenue =
        OnlineOrder::whereDate(
            'created_at',
            today()
        )
        ->where(
            'payment_status',
            'Lunas'
        )
        ->sum('total')
        +
        CashierOrder::whereDate(
            'created_at',
            today()
        )
        ->where(
            'payment_status',
            'Lunas'
        )
        ->sum('total');

        $criticalStock = 0;

        $products = Product::with('variants')->get();

        foreach ($products as $product) {

            $stock = 0;

            foreach ($product->variants as $variant) {

                $stock +=
                    $variant->stock_online +
                    $variant->stock_bazar;
            }

            if ($stock < 10) {
                $criticalStock++;
            }
        }

        $period = request('period', 'week');
        $charData = [];
        // for ($i = 6; $i >= 0; $i--) {

        //     $date =
        //         Carbon::now()->subDays($i);

        //     $revenue =

        //         OnlineOrder::whereDate(
        //             'created_at',
        //             $date
        //         )
        //         ->where(
        //             'payment_status',
        //             'Lunas'
        //         )
        //         ->sum('total')

        //         +

        //         CashierOrder::whereDate(
        //             'created_at',
        //             $date
        //         )
        //         ->where(
        //             'payment_status',
        //             'Lunas'
        //         )
        //         ->sum('total');

        //     $orders =

        //         OnlineOrder::whereDate(
        //             'created_at',
        //             $date
        //         )->count()

        //         +

        //         CashierOrder::whereDate(
        //             'created_at',
        //             $date
        //         )->count();

        //     $charData[] = [

        //         'day' =>
        //             $date->translatedFormat('D'),

        //         'revenue' =>
        //             $revenue,

        //         'orders' =>
        //             $orders
        //     ];
        // }
        $period = request('period', 'week');

        if ($period === 'month') {

            $startOfMonth = Carbon::now()->startOfMonth();

            for ($week = 1; $week <= 5; $week++) {

                $weekStart =
                    $startOfMonth
                        ->copy()
                        ->addDays(($week - 1) * 7);

                if ($weekStart->month != now()->month) {
                    break;
                }

                $weekEnd =
                    $weekStart
                        ->copy()
                        ->addDays(6);

                $revenue =

                    OnlineOrder::whereBetween(
                        'created_at',
                        [$weekStart, $weekEnd]
                    )
                    ->where(
                        'payment_status',
                        'Lunas'
                    )
                    ->sum('total')

                    +

                    CashierOrder::whereBetween(
                        'created_at',
                        [$weekStart, $weekEnd]
                    )
                    ->where(
                        'payment_status',
                        'Lunas'
                    )
                    ->sum('total');

                $orders =

                    OnlineOrder::whereBetween(
                        'created_at',
                        [$weekStart, $weekEnd]
                    )->count()

                    +

                    CashierOrder::whereBetween(
                        'created_at',
                        [$weekStart, $weekEnd]
                    )->count();

                $charData[] = [
                    'day' => 'W' . $week,
                    'revenue' => $revenue,
                    'orders' => $orders
                ];
            }
        } elseif ($period === 'year') {

            for ($i = 1; $i <= 12; $i++) {

                $month = Carbon::create(
                    now()->year,
                    $i,
                    1
                );

                $revenue =

                    OnlineOrder::whereYear(
                        'created_at',
                        now()->year
                    )
                    ->whereMonth(
                        'created_at',
                        $i
                    )
                    ->where(
                        'payment_status',
                        'Lunas'
                    )
                    ->sum('total')

                    +

                    CashierOrder::whereYear(
                        'created_at',
                        now()->year
                    )
                    ->whereMonth(
                        'created_at',
                        $i
                    )
                    ->where(
                        'payment_status',
                        'Lunas'
                    )
                    ->sum('total');

                $orders =

                    OnlineOrder::whereYear(
                        'created_at',
                        now()->year
                    )
                    ->whereMonth(
                        'created_at',
                        $i
                    )
                    ->count()

                    +

                    CashierOrder::whereYear(
                        'created_at',
                        now()->year
                    )
                    ->whereMonth(
                        'created_at',
                        $i
                    )
                    ->count();

                $charData[] = [
                    'day' => $month->translatedFormat('M'),
                    'revenue' => $revenue,
                    'orders' => $orders
                ];
            }
        } else {

            for ($i = 6; $i >= 0; $i--) {

                $date = Carbon::now()->subDays($i);

                $revenue =
                    OnlineOrder::whereDate('created_at', $date)
                        ->where('payment_status', 'Lunas')
                        ->sum('total')

                    +

                    CashierOrder::whereDate('created_at', $date)
                        ->where('payment_status', 'Lunas')
                        ->sum('total');

                $orders =
                    OnlineOrder::whereDate('created_at', $date)->count()

                    +

                    CashierOrder::whereDate('created_at', $date)->count();

                $charData[] = [
                    'day' => $date->translatedFormat('D'),
                    'revenue' => $revenue,
                    'orders' => $orders
                ];
            }
        }

        $maxRevenue =
            collect($charData)
                ->max('revenue');

        $maxOrders =
            collect($charData)
                ->max('orders');

        $latestOnline =
            OnlineOrder::with([
                'user',
                'items.product'
            ])

            ->latest()

            ->take(5)

            ->get()

            ->map(function ($order) {

                return [

                    'customer' =>
                        $order->user->name ?? 'Pembeli',

                    'product' =>
                        $order->items->first()?->product?->name
                        ?? '-',

                    'qty' =>
                        $order->items->sum('quantity'),

                    'total' =>
                        $order->total,

                    'status' =>
                        $order->status,

                    'created_at' =>
                        $order->created_at

                ];
            });

            $latestCashier =
                CashierOrder::with([
                    'items.product'
                ])

                ->latest()

                ->take(5)

                ->get()

                ->map(function ($order) {

                    return [

                        'customer' =>
                            $order->customer_name
                            ?? 'Umum',

                        'product' =>
                            $order->items->first()?->product?->name
                            ?? '-',

                        'qty' =>
                            $order->items->sum('quantity'),

                        'total' =>
                            $order->total,

                        'status' =>
                            $order->payment_status,

                        'created_at' =>
                            $order->created_at

                    ];
                });

                $latestOrders =

                $latestOnline

                ->concat($latestCashier)

                ->sortByDesc('created_at')

                ->take(5);
                
        return view(
            'admin.dashboard',
            compact(
                'totalProducts',
                'totalOrders',
                'totalRevenue',
                'activeBuyers',
                'newOrdersToday',
                'todayRevenue',
                'criticalStock',
                'charData',
                'maxRevenue',
                'maxOrders',
                'latestOrders',
                'period'
            )
        );

        
    }
}
