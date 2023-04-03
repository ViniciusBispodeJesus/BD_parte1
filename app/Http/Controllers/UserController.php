<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    private $arquivo = 'banco.json';

    public function listar()
    {
        // Lê o conteúdo do arquivo JSON
        $json = Storage::get($this->arquivo);

        // Decodifica o JSON em um array associativo
        $usuarios = json_decode($json, true);

        // Retorna o array de usuários como uma resposta JSON
        return response()->json($usuarios);
    }

    public function adicionar(Request $request)
    {
        // Define as regras de validação para os parâmetros do novo usuário
        $regras = [
            'cpf' => 'required|',
            'nome' => 'required|max:30',
            'data_de_nascimento' => 'required',
        ];

        // Executa a validação dos parâmetros
        $request->validate($regras);

        // Lê o conteúdo do arquivo JSON
        $json = Storage::get($this->arquivo);

        // Decodifica o JSON em um array associativo
        $usuarios = json_decode($json, true);

        // Adiciona o novo usuário ao final do array de usuários
        $novoUsuario = $request->all();
        $usuarios[] = $novoUsuario;

        // Codifica o array de usuários de volta para JSON
        $jsonAtualizado = json_encode($usuarios);

        // Salva o JSON atualizado no arquivo
        Storage::put($this->arquivo, $jsonAtualizado);

        // Retorna o novo usuário como uma resposta JSON
        return response()->json($novoUsuario, 201);
    }
}
