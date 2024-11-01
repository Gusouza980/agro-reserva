<?php

namespace App\Imports;

use App\Models\Lote;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use App\Classes\Util;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStartRow;

class LotesImport implements ToModel, WithCalculatedFormulas, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public $reserva_id;
    public $fazenda_id;
    public $campos;

    public function __construct($campos, $reserva_id = null, $fazenda_id = null)
    {
        $this->campos = $campos;
        $this->reserva_id = $reserva_id;
        $this->fazenda_id = $fazenda_id;
    }

    public function model(array $row)
    {
        $lote = new Lote;

        $lote->reserva_id = $this->reserva_id;
        $lote->fazenda_id = $this->fazenda_id;
        $lote->sexo = 'Fêmea';
        $values = array_values($row);
        foreach ($this->campos as $key => $campo) {
            if (!empty($values[$key])) {

                if ($campo == 'nascimento' || $campo == 'parto' || $campo == 'cobert') {
                    $lote->$campo = $this->formataCampoData($values[$key]);
                    continue;
                }

                if ($campo == 'preco') {
                    $lote->$campo = $this->formataCampoPreco($values[$key]);
                    continue;
                }

                $lote->$campo = $values[$key];
            }
        }

        $lote->liberar_compra = true;

        if ($lote->numero == null) {
            return null;
        }

        return $lote;
    }

    public function formataCampoData($valor)
    {
        //try {
        //    if (gettype($valor == 'double' || gettype($valor) == 'integer')) {
        //        return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($valor)->format('Y-m-d');
        //    } elseif (isset($row['nascimento']) && strpos($row['nascimento'], '/')) {
                [$dia, $mes, $ano] = explode('/', $valor);
                return $ano . "-" . $mes . "-" . $dia;
        //    }
        //} catch (\Exception $e) {
        //    throw new \Exception("Erro ao formatar data: " . $valor);
        //}
    }

    public function formataCampoPreco($valor)
    {
        if (strpos($valor, 'R$') > -1) {
            // Remove caracteres não numéricos, exceto vírgula e ponto
            $valor = preg_replace('/[^0-9,]/', '', $valor);
            $valor = str_replace(',', '.', $valor);
            // Converte para double
            $valor = (float) $valor;

            return $valor;
        } else {
            return $valor;
        }
    }

    public function startRow(): int
    {
        return 2;
    }

    // public function map($row): array
    // {
    //     if (isset($row['nascimento']) && (gettype($row['nascimento']) == 'double' || gettype($row['nascimento']) == 'integer')) {
    //         $row['nascimento'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['nascimento'])->format('Y-m-d');
    //     } elseif (isset($row['nascimento']) && strpos($row['nascimento'], '/')) {
    //         [$dia, $mes, $ano] = explode('/', $row['nascimento']);
    //         $row['nascimento'] = $ano . "-" . $mes . "-" . $dia;
    //     }
    //     if (isset($row['parto']) && gettype($row['parto']) == 'double') {
    //         $row['parto'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['parto'])->format('Y-m-d');
    //     }

    //     if (isset($row['cobert']) && gettype($row['cobert']) == 'double') {
    //         $row['cobert'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['cobert'])->format('Y-m-d');
    //     }

    //     return $row;
    // }
}
