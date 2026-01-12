<?php

namespace App\Http\Controllers;

use App\Models\partenaire;
use Barryvdh\DomPDF\Facade\Pdf;

class PartenairePdfController extends Controller
{
    public function generate(partenaire $partenaire)
    {
        $pdf = PDF::loadView('pdf.partenaire', ['partenaire' => $partenaire]);
        return $pdf->stream('partenaire-' . $partenaire->nom . '.pdf');
    }
}
