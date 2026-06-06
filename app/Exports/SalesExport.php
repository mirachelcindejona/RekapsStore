<?php

namespace App\Exports;

use App\Models\CashierOrder;
use App\Models\CashierOrderItem;
use App\Models\OnlineOrder;
use App\Models\OnlineOrderItem;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class SalesExport implements FromArray, ShouldAutoSize, WithStyles
{
    protected $orders;
    protected $topProducts;
    protected $type;
    protected $totalOrders;
    protected $totalRevenue;
    protected $totalProductsSold;
    protected $totalCustomers;
    protected $totalCashiers;

    public function __construct(
        $orders,
        $topProducts,
        $type,
        $totalOrders,
        $totalRevenue,
        $totalProductsSold,
        $totalCustomers = 0,
        $totalCashiers = 0
    ) {
        $this->orders = $orders;
        $this->topProducts = $topProducts;
        $this->type = $type;
        $this->totalOrders = $totalOrders;
        $this->totalRevenue = $totalRevenue;
        $this->totalProductsSold = $totalProductsSold;
        $this->totalCustomers = $totalCustomers;
        $this->totalCashiers = $totalCashiers;
    }

    public function array(): array
    {
        $rows = [

            ['REKAPS STORE'],

            [
                'LAPORAN PENJUALAN ' .
                strtoupper($this->type)
            ],

            ['Departemen Ekonomi Kreatif HIMARPL'],

            [
                'Dicetak pada : ' .
                now()->format('d F Y')
            ],

            [''],

            ['Ringkasan Penjualan'],

            [
                $this->type == 'online'
                    ? 'Total Pesanan'
                    : 'Total Transaksi',

                $this->totalOrders
            ],

            [
                'Total Pendapatan',

                'Rp ' . number_format(
                    $this->totalRevenue,
                    0,
                    ',',
                    '.'
                )
            ],

            [
                $this->type == 'online'
                    ? 'Pelanggan Online'
                    : 'Kasir Aktif',

                $this->type == 'online'
                    ? $this->totalCustomers
                    : $this->totalCashiers
            ],

            [
                'Produk Terjual',
                $this->totalProductsSold
            ],

            [''],

            ['Detail Penjualan'],

            [
                'Order Code',
                'Tanggal',
                'Customer',
                'Qty',
                'Total',
                $this->type == 'online'
                    ? 'Payment Status'
                    : 'Metode'
            ]

        ];

        foreach ($this->orders as $order) {

            $rows[] = [

                $order->order_code,

                $order->created_at->format('d-m-Y'),

                $this->type == 'online'
                    ? ($order->user->name ?? '-')
                    : ($order->customer_name ?? 'Umum'),

                $order->items->sum('quantity'),

                'Rp ' . number_format(
                    $order->total,
                    0,
                    ',',
                    '.'
                ),

                $this->type == 'online'
                    ? $order->payment_status
                    : $order->payment_method

            ];
        }

        $rows[] = [''];
        $rows[] = ['Produk Terlaris'];
        $rows[] = ['Produk', 'Jumlah Terjual'];

        foreach ($this->topProducts as $product) {

            $rows[] = [

                $product->product->name ?? '-',

                $product->total_sold

            ];
        }

        return $rows;
    }

    public function styles(Worksheet $sheet)
    {
        $detailHeaderRow = 13;

        $detailEndRow =
            $detailHeaderRow +
            $this->orders->count();

        $topProductTitleRow =
            $detailEndRow + 2;

        $topProductHeaderRow =
            $detailEndRow + 3;

        $topProductEndRow =
            $topProductHeaderRow +
            $this->topProducts->count();

        $sheet->mergeCells('A1:F1');
        $sheet->mergeCells('A2:F2');
        $sheet->mergeCells('A3:F3');
        $sheet->mergeCells('A4:F4');

        $sheet->getStyle('A1')
            ->getFont()
            ->setBold(true)
            ->setSize(20);

        $sheet->getStyle('A2')
            ->getFont()
            ->setBold(true)
            ->setSize(16);

        $sheet->getStyle('A1:F4')
            ->getAlignment()
            ->setHorizontal(
                Alignment::HORIZONTAL_CENTER
            );

        $sheet->getStyle('A6')
            ->getFont()
            ->setBold(true)
            ->setSize(14);

        $sheet->getStyle("A{$detailHeaderRow}")
            ->getFont()
            ->setBold(true)
            ->setSize(14);

        $sheet->getStyle(
            "A{$detailHeaderRow}:F{$detailHeaderRow}"
        )->applyFromArray([

            'font' => [
                'bold' => true,
            ],

            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'E5E7EB'
                ]
            ],

            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN
                ]
            ]

        ]);

        $sheet->getStyle(
            "A{$detailHeaderRow}:F{$detailEndRow}"
        )
        ->getBorders()
        ->getAllBorders()
        ->setBorderStyle(
            Border::BORDER_THIN
        );

        $sheet->getStyle(
            "A{$detailHeaderRow}:F{$detailHeaderRow}"
        )
        ->getAlignment()
        ->setHorizontal(
            Alignment::HORIZONTAL_CENTER
        );

        $sheet->getStyle(
            "A{$topProductTitleRow}"
        )
        ->getFont()
        ->setBold(true)
        ->setSize(14);

        $sheet->getStyle(
            "A{$topProductHeaderRow}:B{$topProductHeaderRow}"
        )->applyFromArray([

            'font' => [
                'bold' => true,
            ],

            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'E5E7EB'
                ]
            ],

            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN
                ]
            ]

        ]);

        $sheet->getStyle(
            "A{$topProductHeaderRow}:B{$topProductEndRow}"
        )
        ->getBorders()
        ->getAllBorders()
        ->setBorderStyle(
            Border::BORDER_THIN
        );

        return [];
    }
}
