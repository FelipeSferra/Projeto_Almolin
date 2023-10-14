<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArmazemModel;

class EmpresaModel extends Model
{
    use HasFactory;
    protected $table = 'empresa';
    protected $fillable = ['desc','cidade','dump'];

    public function relArmEmp(){
        return $this->hasMany(ArmazemModel::class,'id_emp');
    }
    public function relFuncEmp(){
        return $this->hasMany(FuncionarioModel::class, 'id_emp');
    }
}
