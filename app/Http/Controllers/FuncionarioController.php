<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\FuncionarioModel;
use App\Models\EmpresaModel;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends Controller {
    private $objFunc;
    private $objEmp;

    public function __construct() {
        $this->objFunc = new User();
        $this->objEmp = new EmpresaModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $funcionarios = DB::table('users')
            ->where('dump', '!=', 1)
            ->get();
        $empresas = DB::table('empresa')
            ->where('dump', '!=', 1)
            ->get();
        return view('funcionarios.index', compact('funcionarios','empresas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $empresas = DB::table('empresa')
            ->where('dump', '!=', 1)
            ->get();
        return view('funcionarios.create', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $data = $this->objFunc->create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
            'nome' => $request->nome,
            'cargo' => $request->cargo,
            'id_emp' => $request->id_emp,
        ]);
        if($data){
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
            'username' => $request->username,
            'email' => $request->email,
            'level' => $request->level,
            'nome' => $request->nome,
            'cargo' => $request->cargo,
            'id_emp' => $request->id_emp,
        ]);
        return redirect("funcionarios");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }

    public function delete(string $id){
        $this->objFunc->where(['id'=>$id])->update([
            'dump' => 1
        ]);
        return redirect('funcionarios');
    }
}
