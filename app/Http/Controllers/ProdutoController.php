<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProdutosRequest;
use App\Produto;
use Illuminate\Support\Facades\DB;
use Request;


class ProdutoController extends Controller
{
    public function Lista()
    {
        $produtos = Produto::all();
        return view('produto.listagem')->withProdutos($produtos);
    }

    public function ListaJson()
    {
        $produtos = Produto::all();
        return $produtos;
    }

    public function Mostra($id)
    {
        $resposta = Produto::find($id);

        if (empty($resposta)) {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')->with('p', $resposta[0]);
    }

    public function Novo()
    {
        return view('produto.formulario');
    }


    public function Adiciona(ProdutosRequest $request)
    {

        $params = $request->all();
        Produto::create($params);

        return redirect()->action('ProdutoController@Lista')->withInput(Request::only('nome'));
    }

    public function Remove($id)
    {
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()->action('ProdutoController@Lista');
    }


}
