<?php

namespace App\Exports;

use App\Models\Product;
use App\Models\Review;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ReviewExport implements FromArray, ShouldAutoSize, WithStyles
{
    public function array(): array
    {
        $reviews = Review::with([
            'user',
            'product'
        ])->get();

        $totalReviews = Review::count();

        $averageRating = round(
            Review::avg('rating'),
            1
        );

        $positiveReviews = Review::where(
            'rating',
            '>=',
            4
        )->count();

        $positivePercentage =
            $totalReviews > 0
                ? round(
                    ($positiveReviews / $totalReviews) * 100
                )
                : 0;

        $favoriteProduct = Product::withCount(
            'reviews'
        )
        ->orderByDesc(
            'reviews_count'
        )
        ->first();

        $productRatings = Product::with(
            'reviews'
        )
        ->get()
        ->map(function ($product) {

            return [

                'name' => $product->name,

                'total_reviews' =>
                    $product->reviews->count(),

                'average_rating' =>
                    round(
                        $product->reviews->avg('rating') ?? 0,
                        1
                    ),

                'replied_reviews' =>
                    $product->reviews
                        ->whereNotNull('admin_reply')
                        ->count()

            ];

        });

        $rows = [

            ['REKAPS STORE'],
            ['LAPORAN REVIEW PENGGUNA'],
            ['Departemen Ekonomi Kreatif HIMARPL'],
            ['Dicetak pada : ' . now()->format('d F Y')],
            [''],

            ['Ringkasan Review'],

            ['Total Review', $totalReviews],

            ['Rata-rata Rating', $averageRating . '/5'],

            ['Review Positif', $positivePercentage . '%'],

            ['Produk Terfavorit', $favoriteProduct?->name ?? '-'],

            [''],

            ['Rating Per Produk'],

            [
                'Produk',
                'Total Review',
                'Rating Rata-rata',
                'Dibalas Admin'
            ]

        ];

        foreach ($productRatings as $product) {

            $rows[] = [

                $product['name'],

                $product['total_reviews'],

                $product['average_rating'] . '/5',

                $product['replied_reviews']

            ];

        }

        $rows[] = [''];

        $rows[] = [
            'Detail Review Pengguna'
        ];

        $rows[] = [

            'Tanggal',
            'Customer',
            'Produk',
            'Rating',
            'Komentar',
            'Status Balasan'

        ];

        foreach ($reviews as $review) {

            $rows[] = [

                $review->created_at
                    ->format('d M Y'),

                $review->user->name,

                $review->product->name,

                $review->rating . '/5',

                $review->comment,

                $review->admin_reply
                    ? 'Sudah Dibalas'
                    : 'Belum Dibalas'

            ];

        }

        return $rows;
    }

    public function styles(Worksheet $sheet)
    {
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


        return [];
    }
}
