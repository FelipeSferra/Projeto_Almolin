<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmpresaModel;

class FuncionarioModel extends Model
{
    use HasFactory;
    protected $table = 'funcionario';
    protected $fillable = ['nome','id_emp','cargo','nivel','dump'];

    public function relEmpFunc(){
        return $this->hasOne(EmpresaModel::class,'id','id_emp');
    }
}
