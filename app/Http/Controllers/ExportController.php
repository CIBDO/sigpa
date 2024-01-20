<!-- <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\MarquesExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Models\Marque;


class ExportController extends Controller
{
    public function exportPDF()
    {
        // Logique pour l'export PDF
        $marques = Marque::all(); // Remplacez cela par la récupération de vos données

        $pdf = PDF::loadView('exports.marques_pdf', compact('marques'));

        return $pdf->download('marques.pdf');
    }

    public function exportExcel()
    {
        // Logique pour l'export Excel
        return Excel::download(new MarquesExport, 'marques.xlsx');
    }

    
}
