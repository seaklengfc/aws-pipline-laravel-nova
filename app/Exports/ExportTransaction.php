<?php

namespace App\Exports;

use App\Models\Transaction;
use App\Models\TransactionSnapshot;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class ExportTransaction implements FromView, WithColumnWidths
{

    public function __construct(protected string $startDate, protected string $endDate)
    {
    }

    public function view(): View
    {
        return view('exports.transaction', [
            'transactions' => Transaction::with('provider', 'promotion')
                ->whereDate('insert_date','>=', $this->startDate)
                ->whereDate('insert_date','<=', $this->endDate)
                ->get()
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 8,
            'B' => 15,
            'C' => 20,
            'D' => 15,
            'E' => 25,
            'F' => 20,
            'G' => 10,
            'H' => 10,
            'I' => 10,
            'J' => 10,
            'K' => 5,
            'M' => 15,
            'N' => 15,
        ];
    }
}
