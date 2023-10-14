<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProdutoModel;
use App\Models\EmpresaModel;

class ArmazemModel extends Model
{
    use HasFactory;
    protected $table = 'armazem';
    protected $fillable = ['desc','id_emp','cidade','endereco','bairro','numero','dump'];

    public function relProdArm(){
        return $this->hasMany(ProdutoModel::class,'id_arm');
    }
    public function relEmpArm(){
        return $this->hasOne(EmpresaModel::class,'id','id_emp');
    }
}
