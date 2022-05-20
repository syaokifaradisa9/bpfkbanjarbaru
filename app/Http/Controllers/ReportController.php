<?php

namespace App\Http\Controllers;

use App\Models\ExternalOrder;
use Barryvdh\DomPDF\Facade\Pdf;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;

class ReportController extends Controller
{
    public function printExternalOfferingLetter($id){
        $order = ExternalOrder::with('user')->findOrFail($id);

        $dataList = [
            ['template_name' => 'offering_letter'],
            ['template_name' => 'review_demand_letter'],
            ['template_name' => 'accommodation_letter']
        ];

        $oMerger = PDFMerger::init();
        foreach($dataList as $index => $data){
            $filePath = 'temp_files/'.$order->id. $index.'.pdf';
            file_put_contents(
                $filePath,
                Pdf::loadView('report.'.$data['template_name'], [
                    'order' => $order
                ])->output()
            );
            $oMerger->addPDF(public_path($filePath));
        }

        $oMerger->merge();

        foreach($dataList as $index => $data){
            $filePath = 'temp_files/'.$order->id. $index.'.pdf';
            unlink(public_path($filePath));
        }

        $oMerger->setFileName('Surat Penawaran.pdf');
        return $oMerger->stream();
    }
}
