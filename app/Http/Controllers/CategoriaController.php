<?php

namespace App\Http\Controllers;

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
        $categorias = $this->objCat->all();
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
        $date = $this->objCat->create([
            'desc' => $request->descr,
        ]);
        if($date){
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}