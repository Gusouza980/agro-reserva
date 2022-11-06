<?php

namespace App\Imports;

use App\Models\Lote;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use App\Classes\Util;

class LotesImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public $reserva_id;
    public $fazenda_id;

    public function __construct($reserva_id = null, $fazenda_id = null)
    {
        $this->reserva_id= $reserva_id;
        $this->fazenda_id= $fazenda_id;
    }

    public function model(array $row)
    {
        $lote = new Lote;

        $lote->reserva_id = $this->reserva_id;
        $lote->fazenda_id = $this->fazenda_id;

        foreach($row as $coluna => $value){
            if(!empty($coluna)){
                $lote->$coluna = $value;
            }
        }

        if($lote->nascimento){
            $lote->nascimento = Util::convertDateToString($lote->nascimento);
        }

        if($lote->parto){
            $lote->parto = Util::convertDateToString($lote->parto);
        }

        return $lote;
    }
}
