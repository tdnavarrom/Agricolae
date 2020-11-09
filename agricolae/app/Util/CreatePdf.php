<?php

namespace App\Util;

use App\Interfaces\FileGeneration;
use PDF;

class CreatePdf implements FileGeneration
{

    public function store($data)
    {
        view()->share('data',$data);

        $pdf = PDF::loadView('pdf/pdf_view', $data);
        return $pdf->download('receipt_order_number_'.$data['order']->getId().'.pdf');
    }

}

?>