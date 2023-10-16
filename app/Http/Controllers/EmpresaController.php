<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\EmpresaModel;

class EmpresaController extends Controller {
    private $objEmp;

    public function __construct() {
        $this->objEmp = new EmpresaModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $empresas = DB::table('empresa')
            ->where('dump', '!=', 1)
            ->get();
        return view('empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        // $empresas = $this->objEmp->all();
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $data = $this->objEmp->create([
            'cidade' => $request->cidade,
            'desc' => $request->descr,
        ]);
        if($data){
            return redirect('empresas');
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
        $this->objEmp->where(['id'=>$id])->update([
            'cidade' => $request->cidade,
            'desc' => $request->descr,
        ]);
        return redirect('empresas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }

    public function delete(string $id){
        $this->objEmp->where(['id'=>$id])->update([
            'dump' => 1
        ]);
        return redirect('empresas');
    }
}
