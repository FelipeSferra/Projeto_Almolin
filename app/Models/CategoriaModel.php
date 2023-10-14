<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProdutoModel;

class CategoriaModel extends Model
{
    use HasFactory;
    protected $table = 'categoria';
    protected $fillable = ['desc','dump'];

    public function relProdCat(){
        return $this->hasMany(ProdutoModel::class,'id_cat');
    }
}
