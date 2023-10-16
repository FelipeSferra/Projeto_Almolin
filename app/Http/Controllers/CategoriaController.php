<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\CategoriaModel;

class CategoriaController extends Controller {
    private $objCat;

    public function __construct() {
        $this->objCat = new CategoriaModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $categorias = DB::table('categoria')
            ->where('dump', '!=', 1)
            ->get();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        // $empresas = $this->objEmp->all();
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $data = $this->objCat->create([
            'desc' => $request->descr,
        ]);
        if($data){
            return redirect('categorias');
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
        $this->objCat->where(['id'=>$id])->update([
            'desc' => $request->descr
        ]);
        return redirect('categorias');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
