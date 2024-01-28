<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Barryvdh\DomPDF\Facade as PDF;

class GenericExport implements FromCollection, WithHeadings, FromView
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return array_keys($this->data[0]);
    }

    public function view(): View
    {
        return view('pdf', ['data' => $this->data]);
    }

    public function exportPDF()
    {
        $pdf = PDF::loadView('pdf', ['data' => $this->data]);

        return $pdf->download('export.pdf');
    }
}
