<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AgendamentosController;

Route::get('/', function () {
    return view('index');
});

Route::post('/', function (Illuminate\Http\Request $request) {
    $agendamento = new App\Models\Agendamento;
    $agendamento->nome = $request->input('nome');
    $agendamento->telefone = $request->input('telefone');
    $agendamento->origem = $request->input('origem');
    $agendamento->data_contato = $request->input('data_contato');
    $agendamento->observacao = $request->input('observacao');
    $agendamento->save();

    return redirect('/consultar');
});
Route::post('/cadastrar', [AgendamentosController::class, 'store'])->name('agendamentos.store');
Route::get('/agendamentos', [AgendamentosController::class, 'index'])->name('agendamentos.index');

Route::get('/consultar', [AgendamentosController::class, 'index']);