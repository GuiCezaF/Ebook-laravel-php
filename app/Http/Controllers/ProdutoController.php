<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Request;


class ProdutoController extends Controller
{
    public function Lista()
    {
        $produtos = DB::select('select * from produtos');
        return view('produto.listagem')->withProdutos($produtos);
    }

    public function Mostra($id)
    {
        $resposta =
            DB::select('select * from produtos where id = ?', [$id]);
        if (empty($resposta)) {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')->with('p', $resposta[0]);
    }

    public function Novo()
    {
        return view('produto.formulario');
    }


    public function Adiciona()
    {
        $nome = Request::input('nome');
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        $quantidade = Request::input('quantidade');

        DB::table('produtos')->insert(
            [
                'nome' => $nome,
                'valor' => $valor,
                'descricao' => $descricao,
                'quantidade' => $quantidade
            ]
        );

        return	redirect()->action('ProdutoController@Lista')->withInput(Request::only('nome'));
    }

}
