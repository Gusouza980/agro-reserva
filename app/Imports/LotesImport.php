<?php

namespace App\Imports;

use App\Models\Lote;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use App\Classes\Util;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\WithMapping;

class LotesImport implements ToModel, WithHeadingRow, WithCalculatedFormulas, WithMapping
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
            // Log::info($coluna);
            // Log::debug($value);
            if(!empty($coluna) && $coluna != "skip" && !is_numeric($coluna)){
                $lote->$coluna = $value;
            }
        }

        if($lote->nascimento){
            $lote->nascimento = $lote->nascimento;
        }

        if($lote->parto){
            $lote->parto = $lote->parto;
        }

        if($lote->cobert){
            $lote->cobert = $lote->cobert;
        }

        $lote->liberar_compra = true;
        
        if($lote->numero == null){
            return null;
        }

        return $lote;
    }

    public function map($row): array
    {
        if(isset($row['nascimento']) && gettype($row['nascimento']) == 'double'){
            $row['nascimento'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['nascimento'])->format('Y-m-d');
        }elseif(isset($row['nascimento']) && strpos($row['nascimento'], '/'))
        {
            [$dia, $mes, $ano] = explode('/', $row['nascimento']);
            $row['nascimento'] = $ano . "-" . $mes . "-" . $dia;
        }

        if(isset($row['parto']) && gettype($row['parto']) == 'double'){
            $row['parto'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['parto'])->format('Y-m-d');
        }

        if(isset($row['cobert']) && gettype($row['cobert']) == 'double'){
            $row['cobert'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['cobert'])->format('Y-m-d');
        }

        return $row;
    }
}
