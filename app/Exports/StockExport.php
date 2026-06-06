<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class StockExport implements FromArray, ShouldAutoSize, WithStyles
{
    public function array(): array
    {
        $products = Product::with([
            'category',
            'variants'
        ])->get();

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

        $rows = [

            ['REKAPS STORE'],
            ['LAPORAN PRODUK'],
            ['Departemen Ekonomi Kreatif HIMARPL'],
            ['Dicetak pada : ' . now()->format('d F Y')],
            ['Data stok produk saat ini'],
            [''],

            ['Ringkasan Produk'],

            ['Total Produk', $totalProducts],

            ['Total Stok', $totalStock],

            ['Produk Low Stock', $lowStockProducts],

            [
                'Nilai Inventaris',
                'Rp ' . number_format(
                    $inventoryValue,
                    0,
                    ',',
                    '.'
                )
            ],

            [''],

            ['Detail Produk'],

            [
                'Produk',
                'Kategori',
                'Harga Modal',
                'Harga Jual',
                'Total Stok',
                'Nilai Stok',
                'Status'
            ]

        ];

        foreach ($products as $product) {

            $rows[] = [

                $product->name,

                $product->category->name ?? '-',

                'Rp ' . number_format(
                    $product->cost_price,
                    0,
                    ',',
                    '.'
                ),

                'Rp ' . number_format(
                    $product->selling_price,
                    0,
                    ',',
                    '.'
                ),

                $product->total_stock,

                'Rp ' . number_format(
                    $product->total_stock *
                    $product->cost_price,
                    0,
                    ',',
                    '.'
                ),

                $product->total_stock < 10
                    ? 'Low Stock'
                    : 'Aman'

            ];
        }

        return $rows;
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = Product::count() + 14;

        $sheet->mergeCells('A1:G1');
        $sheet->mergeCells('A2:G2');
        $sheet->mergeCells('A3:G3');
        $sheet->mergeCells('A4:G4');
        $sheet->mergeCells('A5:G5');

        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(20);
        $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(16);

        $sheet->getStyle('A1:G5')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('A7')
            ->getFont()
            ->setBold(true)
            ->setSize(14);

        $sheet->getStyle('A13')
            ->getFont()
            ->setBold(true)
            ->setSize(14);

        $sheet->getStyle('A14:G14')->applyFromArray([
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

        $sheet->getStyle("A14:G{$lastRow}")
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN);

        $sheet->getStyle('A14:G14')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        return [];
    }
}
