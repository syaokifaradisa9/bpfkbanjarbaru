<?php

namespace App\Http\Controllers;

use App\Models\ExternalOrder;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function printExternalOfferingLetter($id){
        $order = ExternalOrder::with('user')->findOrFail($id);
        $offering_letter_pdf = Pdf::loadView('report.offering_letter', [
            'order' => $order
        ]);

        $review_demand_pdf = Pdf::loadView('report.review_demand_letter', [
            'order' => $order
        ]);

        $accommodation_pdf = Pdf::loadView('report.accommodation_letter', [
            'order' => $order
        ]);

        return $offering_letter_pdf->stream('Surat Penawaran');
    }
}
