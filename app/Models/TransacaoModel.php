<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmpresaModel;
use App\Models\ArmazemModel;
use App\Models\FuncionarioModel;
use App\Models\ProdutoModel;

class TransacaoModel extends Model
{
    use HasFactory;
    protected $table = 'transacao';
    protected $fillable = ['id_func','id_emp','id_itm','qtd','id_arm','dump'];

    public function relFuncTran(){
        return $this->hasOne(FuncionarioModel::class,'id','id_func');
    }

    public function relArmTran(){
        return $this->hasOne(ArmazemModel::class,'id','id_arm');
    }

    public function relEmpTran(){
        return $this->hasOne(EmpresaModel::class,'id','id_emp');
    }

    public function relProdTran(){
        return $this->hasOne(ProdutoModel::class,'id','id_itm');
    }
}
