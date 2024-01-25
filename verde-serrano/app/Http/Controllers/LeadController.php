<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    public function store(Request $request) {
        // Validação dos dados recebidos do front-end
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'telefone' => 'required|string',
            'estado' => 'required|string',
            'cidade' => 'required|string',
            'mensagem' => 'required|string',
        ]);
    
        try {
            // Tenta criar um novo lead no banco de dados
            $lead = Lead::create([
                'nome' => $request->input('nome'),
                'email' => $request->input('email'),
                'telefone' => $request->input('telefone'),
                'estado' => $request->input('estado'),
                'cidade' => $request->input('cidade'),
                'mensagem' => $request->input('mensagem'),
            ]);
    
            // No caso de sucesso
            return response()->json(['message' => 'Leads do usuário gravados com sucesso!', 'lead' => $lead], 201);
    
        } catch (\Exception $e) {
            // Em caso de falha 
            return response()->json(['message' => 'Erro ao gravar o lead do usuário. Detalhes: ' . $e->getMessage()], 500);
        }
    }


    public function index() {
        return Lead::all();
    }

}
