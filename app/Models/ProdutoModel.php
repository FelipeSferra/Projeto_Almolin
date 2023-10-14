<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriaModel;
use App\Models\ArmazemModel;

class ProdutoModel extends Model
{
    use HasFactory;
    protected $table = 'produto';
    protected $fillable = ['desc','custo','qtd','id_cat','id_arm','dump'];

    public function relCatProd(){
        return $this->hasOne(CategoriaModel::class,'id','id_cat');
    }

    public function relArmProd(){
        return $this->hasOne(ArmazemModel::class,'id','id_arm');
    }
}
