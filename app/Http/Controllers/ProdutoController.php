<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdutoModel;
use App\Models\CategoriaModel;
use App\Models\ArmazemModel;

class ProdutoController extends Controller {
    private $objProd;
    private $objCat;
    private $objArm;

    public function __construct() {
        $this->objProd = new ProdutoModel();
        $this->objCat = new CategoriaModel();
        $this->objArm = new ArmazemModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $produtos = $this->objProd->all();
        $categorias = $this->objCat->all();
        $armazens = $this->objArm->all();
        return view('produtos.index', compact('produtos','categorias','armazens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categorias = $this->objCat->all();
        $armazens = $this->objArm->all();
        return view('produtos.create', compact('categorias', 'armazens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $date = $this->objProd->create([
            'desc' => $request->desc,
            'custo'=>$request->custo,
            'qtd' => $request->qtd,
            'id_cat' => $request->categoria,
            'id_arm' => $request->armazem
        ]);
        if($date){
            return redirect('produtos');
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
        $this->objProd->where(['id' => $id])->update([
            'desc' => $request->desc,
            'custo'=>$request->custo,
            'qtd' => $request->qtd,
            'id_cat' => $request->categoria,
            'id_arm' => $request->armazem
        ]);
        return redirect("produtos");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
