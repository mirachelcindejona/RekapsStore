<?php

namespace App\Exports;

use App\Models\FinanceTransactions;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class FinanceExport implements FromArray, ShouldAutoSize, WithStyles
{
    public function array(): array
    {
        $transactions = FinanceTransactions::all();

        $totalIncome = FinanceTransactions::where(
            'type',
            'Pemasukan'
        )->sum('amount');

        $totalExpense = FinanceTransactions::where(
            'type',
            'Pengeluaran'
        )->sum('amount');

        $balance = $totalIncome - $totalExpense;

        $rows = [

            ['REKAPS STORE'],
            ['LAPORAN KEUANGAN'],
            ['Departemen Ekonomi Kreatif HIMARPL'],
            ['Dicetak pada : ' . now()->format('d F Y')], 
            ['Periode : ' . (request('from_date') 
            ? \Carbon\Carbon::parse(request('from_date'))->format('d M Y') : 'Awal Data') . ' s/d ' . (request('to_date')
            ? \Carbon\Carbon::parse(request('to_date'))->format('d M Y') : 'Akhir Data')
            ],
            [''],

            ['Ringkasan Keuangan'],
            ['Total Pemasukan', 'Rp ' . number_format($totalIncome, 0, ',', '.')],
            ['Total Pengeluaran', 'Rp ' . number_format($totalExpense, 0, ',', '.')],
            ['Saldo Bersih', 'Rp ' . number_format($balance, 0, ',', '.')],
            ['Jumlah Transaksi', $transactions->count()],
            [''],

            ['Detail Transaksi'],
            [
                'Tanggal',
                'Keterangan',
                'Kategori',
                'Tipe',
                'Jumlah'
            ]
        ];

        foreach ($transactions as $transaction) {

            $rows[] = [
                $transaction->date,
                $transaction->description,
                $transaction->category,
                $transaction->type,
                'Rp ' . number_format(
                    $transaction->amount,
                    0,
                    ',',
                    '.'
                )
            ];
        }

        return $rows;
    }

    public function styles(Worksheet $sheet) {
        $lastRow = FinanceTransactions::count() + 13;

        // Merge Judul
        $sheet->mergeCells('A1:E1');
        $sheet->mergeCells('A2:E2');
        $sheet->mergeCells('A3:E3');
        $sheet->mergeCells('A4:E4');

        // Judul
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(20);
        $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(16);

        // Center Judul
        $sheet->getStyle('A1:E4')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Ringkasan
        $sheet->getStyle('A6')->getFont()->setBold(true)->setSize(14);

        // Detail Transaksi
        $sheet->getStyle('A12')->getFont()->setBold(true)->setSize(14);

        // Header tabel
        $sheet->getStyle('A13:E13')->applyFromArray([
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

        // Border seluruh tabel
        $sheet->getStyle("A13:E{$lastRow}")
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN);

        // Alignment Header Tabel
        $sheet->getStyle('A13:E13')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        return [];
    }
}