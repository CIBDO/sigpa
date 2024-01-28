<?php
namespace App\Exports;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Contracts\View\View;

class PdfExport
{
   

    protected $data;
    protected $view;

    public function __construct(array $data, string $view)
    {
        $this->data = $data;
        $this->view = $view;
    }

    public function export()
    {
        $pdf = PDF::loadView($this->view, ['data' => $this->data]);

        return $pdf->download('export.pdf');
    }
}
