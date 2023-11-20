<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
    public function index(Request $request) {
        if ($request->categoria != '' && $request->categoria != null && $request->categoria != 'undefined' && $request->categoria != '0') {
            $produtos = DB::table('produto')
                ->where('dump', '!=', 1)
                ->where('id_cat', $request->categoria)
                ->get();
        }
        else {
            $produtos = DB::table('produto')->where('dump', '!=', 1)
                ->get();
        }
        $categorias = DB::table('categoria')->where('dump', '!=', 1)->get();
        $armazens = DB::table('armazem')->where('dump', '!=', 1)->get();
        return view('produtos.index', compact('produtos', 'categorias', 'armazens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categorias = DB::table('categoria')->where('dump', '!=', 1)->get();
        $armazens = DB::table('armazem')->where('dump', '!=', 1)->get();
        return view('produtos.create', compact('categorias', 'armazens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $data = $this->objProd->create(['desc' => $request->desc, 'custo' => $request->custo, 'qtd' => $request->qtd, 'id_cat' => $request->categoria, 'id_arm' => $request->armazem]);
        if ($data) {
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
        $this->objProd->where(['id' => $id])->update(['desc' => $request->desc, 'custo' => $request->custo, 'qtd' => $request->qtd, 'id_cat' => $request->categoria, 'id_arm' => $request->armazem]);
        return redirect("produtos");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }

    public function delete(string $id){
        $this->objProd->where(['id'=>$id])->update([
            'dump' => 1
        ]);
        return redirect('produtos');
    }
}
