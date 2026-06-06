<?php

namespace App\Exports;

use App\Models\StockHistory;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class StockHistoryExport implements FromArray, ShouldAutoSize, WithStyles
{
    public function array(): array
    {
        $histories = StockHistory::with([
            'product',
            'user'
        ])->get();

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

        $rows = [

            ['REKAPS STORE'],
            ['LAPORAN RIWAYAT STOK'],
            ['Departemen Ekonomi Kreatif HIMARPL'],
            ['Dicetak pada : ' . now()->format('d F Y')],
            [''],

            ['Ringkasan Riwayat Stok'],
            ['Total Aktivitas', $totalActivities],
            ['Total Stok Masuk', $totalIncoming],
            ['Total Stok Keluar', $totalOutgoing],
            ['Produk Terlibat', $totalProducts],
            [''],

            ['Detail Riwayat Stok'],

            [
                'Tanggal',
                'Produk',
                'Aktivitas',
                'Lokasi',
                'Qty',
                'Petugas',
                'Keterangan'
            ]
        ];

        foreach ($histories as $history) {

            $rows[] = [

                $history->created_at->format('d-m-Y H:i'),

                $history->product?->name,

                $history->type,

                $history->location,

                $history->qty,

                $history->user?->name ?? '-',

                $history->note

            ];
        }

        return $rows;
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = StockHistory::count() + 13;

        $sheet->mergeCells('A1:G1');
        $sheet->mergeCells('A2:G2');
        $sheet->mergeCells('A3:G3');
        $sheet->mergeCells('A4:G4');

        $sheet->getStyle('A1')
            ->getFont()
            ->setBold(true)
            ->setSize(20);

        $sheet->getStyle('A2')
            ->getFont()
            ->setBold(true)
            ->setSize(16);

        $sheet->getStyle('A1:G4')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('A6')
            ->getFont()
            ->setBold(true)
            ->setSize(14);

        $sheet->getStyle('A12')
            ->getFont()
            ->setBold(true)
            ->setSize(14);

        $sheet->getStyle('A13:G13')->applyFromArray([
            'font' => [
                'bold' => true
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

        $sheet->getStyle("A13:G{$lastRow}")
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN);

        $sheet->getStyle('A13:G13')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        return [];
    }
}
