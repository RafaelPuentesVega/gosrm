<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromView;




class ExcelExportOrdenGeneral implements FromView
{
    private $arrayData; // declaras la propiedad

    public function __construct($arrayData)
    {
        $this->arrayData = $arrayData; // asignas el valor inyectado a la propiedad
    }

    public function view(): View
    {
        return view('modulos.reportes.rpt_ordenGeneral', [
            'data' => $this->arrayData
        ]);
    }
}

