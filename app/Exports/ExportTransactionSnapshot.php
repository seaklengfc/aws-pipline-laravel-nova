<?php

namespace App\Exports;

use App\Models\TransactionSnapshot;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class ExportTransactionSnapshot implements FromView, WithColumnWidths
{

    public function __construct(protected string $startDate, protected string $endDate)
    {
    }

    public function view(): View
    {
        return view('exports.transaction_snapshot', [
            'snapshots' => TransactionSnapshot::whereBetween('date', [$this->startDate, $this->endDate])->get()
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,
            'C' => 19,
            'D' => 19,
            'E' => 19,
            'F' => 19,
            'G' => 19,
            'H' => 19,
            'I' => 19,
        ];
    }
}
