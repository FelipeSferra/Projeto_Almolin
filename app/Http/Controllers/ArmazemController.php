<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\EmpresaModel;
use App\Models\ArmazemModel;

class ArmazemController extends Controller {
    private $objEmp;
    private $objArm;

    public function __construct() {
        $this->objArm = new ArmazemModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $empresas = DB::table('empresa')
            ->where('dump', '!=', 1)
            ->get();
        $armazens = DB::table('armazem')
            ->where('dump', '!=', 1)
            ->get();
        return view('armazens.index', compact('armazens', 'empresas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $empresas = DB::table('empresa')
            ->where('dump', '!=', 1)
            ->get();
        return view('armazens.create', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $data = $this->objArm->create([
            'desc' => $request->desc,
            'id_emp' => $request->emp,
            'cidade' => $request->cidade,
            'endereco' => $request->endereco,
            'bairro' => $request->bairro,
            'numero' => $request->num,
        ]);
        if($data){
            return redirect('armazens');
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
        $this->objArm->where(['id'=>$id])->update([
            'desc' => $request->desc,
            'id_emp' => $request->emp,
            'cidade' => $request->cidade,
            'endereco' => $request->endereco,
            'bairro' => $request->bairro,
            'numero' => $request->num,
            ]);
        return redirect('armazens');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
