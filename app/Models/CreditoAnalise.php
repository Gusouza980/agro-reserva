<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditoAnalise extends Model
{
    use HasFactory;

    public function pendencias(){
        return $this->hasMany(PendenciaFinanceira::class);
    }

    public function protestos(){
        return $this->hasMany(ProtestoEstadual::class);
    }

    public function cheques(){
        return $this->hasMany(ChequeSemFundo::class);
    }

    public function cheque_interno(){
        return $this->hasOne(ConsultaChequeInterno::class);
    }

    public function cheque_mercado(){
        return $this->hasOne(ConsultaChequeMercado::class);
    }

    public function sem_cheque(){
        return $this->hasOne(ConsultaSemCheque::class);
    }

    public function referencia_comercial(){
        return $this->hasOne(ConsultaReferenciaComercial::class);
    }

    public function documentos_roubados(){
        return $this->hasMany(DocumentoRoubado::class);
    }

    public function indice_relacionamento(){
        return $this->hasMany(IndiceRelacionamentoSetor::class);
    }

    public function participacao_societaria(){
        return $this->hasMany(ParticipacaoSocietaria::class);
    }

    public function scores(){
        return $this->hasMany(SerasaScore::class);
    }
}
