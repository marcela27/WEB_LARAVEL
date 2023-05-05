<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AgendamentosController;

class AgendamentosController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::all();

        return view('consultar', compact('agendamentos'));
    }

    public function create()
    {
        return view('cadastrar');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|max:255',
            'telefone' => 'required|max:15',
            'origem' => 'required|max:255',
            'data_contato' => 'required|date',
            'observacao' => 'nullable|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->route('agendamentos.create')->withErrors($validator)->withInput();
        }

        $agendamento = new Agendamento;
        $agendamento->nome = $request->input('nome');
        $agendamento->telefone = $request->input('telefone');
        $agendamento->origem = $request->input('origem');
        $agendamento->data_contato = $request->input('data_contato');
        $agendamento->observacao = $request->input('observacao');
        $agendamento->save();

        return redirect()->route('agendamentos.index')->with('sucesso', 'Agendamento criado com sucesso!');
    }

    public function cadastrar()
    {
        return view('cadastrar');
    }
}