<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ProdutoModel;
use App\Models\ArmazemModel;
use App\Models\FuncionarioModel;
use App\Models\EmpresaModel;
use App\Models\TransacaoModel;

class TransacaoController extends Controller
{
    private $objProd;
    private $objFunc;
    private $objArm;
    private $objEmp;
    private $objTrans;

    public function __construct()
    {
        $this->objProd = new ProdutoModel();
        $this->objArm = new ArmazemModel();
        $this->objFunc = new FuncionarioModel();
        $this->objEmp = new EmpresaModel();
        $this->objTrans = new TransacaoModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (($request->produto != '' && $request->produto != null && $request->produto != 'undefined' && $request->armazem != '' && $request->armazem != null && $request->armazem != 'undefined')  && ($request->armazem != '0' || $request->produto != '0')) {
            if ($request->produto == '0' ) {
                $transacoes = DB::table('transacao')
                    ->where('dump', '!=', 1)
                    ->where('id_arm', $request->armazem)
                    ->get();
            }
            else if ($request->armazem == '0') {
                $transacoes = DB::table('transacao')
                    ->where('dump', '!=', 1)
                    ->where('id_itm', $request->produto)
                    ->get();
            }
            else {
                $transacoes = DB::table('transacao')
                    ->where('dump', '!=', 1)
                    ->where('id_itm', $request->produto)
                    ->where('id_arm', $request->armazem)
                    ->get();
            }

        }
        else {
            $transacoes = DB::table('transacao')
                ->where('dump', '!=', 1)
                ->get();
        }
        $funcionarios = DB::table('users')
            ->where('dump', '!=', 1)
            ->get();
        $empresas = DB::table('empresa')
            ->where('dump', '!=', 1)
            ->get();
        $produtos = DB::table('produto')
            ->where('dump', '!=', 1)
            ->get();
        $armazens = DB::table('armazem')
            ->where('dump', '!=', 1)
            ->get();
        return view('transacao.index', compact('transacoes', 'funcionarios', 'empresas', 'produtos', 'armazens'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transacoes = DB::table('transacao')
            ->where('dump', '!=', 1)
            ->get();
        $funcionarios = DB::table('users')
            ->where('dump', '!=', 1)
            ->get();
        $empresas = DB::table('empresa')
            ->where('dump', '!=', 1)
            ->get();
        $produtos = DB::table('produto')
            ->where('dump', '!=', 1)
            ->get();
        $armazem = DB::table('armazem')
            ->where('dump', '!=', 1)
            ->get();
        return view('transacao.create', compact('transacoes', 'funcionarios', 'empresas', 'produtos', 'armazem'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = $this->objTrans->create([
            'id_func' => $request->id_func,
            'id_emp' => $request->id_emp,
            'id_itm' => $request->id_itm,
            'qtd' => $request->qtd,
            'id_arm' => $request->id_arm
        ]);
        if ($date) {
            $produtos = DB::table('produto')
                ->where('id', $request->id_itm)
                ->decrement('qtd', $request->qtd);
            return redirect('transacao');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->objTrans->where(['id' => $id])->update([
            'id_func' => $request->id_func,
            'id_emp' => $request->id_emp,
            'id_itm' => $request->id_itm,
            'qtd' => $request->qtd,
            'id_arm' => $request->id_arm
        ]);
        return redirect("transacao");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(string $id){
        $this->objTrans->where(['id'=>$id])->update([
            'dump' => 1
        ]);
        return redirect('transacao');
    }
}
