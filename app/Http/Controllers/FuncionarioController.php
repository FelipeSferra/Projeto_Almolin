<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FuncionarioModel;
use App\Models\EmpresaModel;

class FuncionarioController extends Controller {
    private $objFunc;
    private $objEmp;

    public function __construct() {
        $this->objFunc = new FuncionarioModel();
        $this->objEmp = new EmpresaModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $funcionarios = $this->objFunc->all();
        $empresas = $this->objEmp->all();
        return view('funcionarios.index', compact('funcionarios','empresas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $empresas = $this->objEmp->all();
        return view('funcionarios.create', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $date = $this->objFunc->create([
            'nome' => $request->nome,
            'id_emp'=>$request->emp,
            'cargo' => $request->cargo,
            'nivel' => $request->nivel,
        ]);
        if($date){
            return redirect('funcionarios');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $this->objFunc->where(['id'=>$id])->update([
            'nome' => $request->nome,
            'id_emp'=>$request->emp,
            'cargo' => $request->cargo,
            'nivel' => $request->nivel
        ]);
        return redirect("funcionarios");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
