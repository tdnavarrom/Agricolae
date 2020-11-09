<?php

namespace App\Util;

use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Interfaces\FileGeneration;


class CreateExcel implements FileGeneration
{

    public function store($data)
    {
        return Excel::download(new OrderExport($data), 'receipt_order_number_'.$data['order']->getId().'.xlsx');
    }

}

?>