<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Validation\ValidationException;

class LeadController extends Controller
{
    //Read Lead
    public function index() {
        return Lead::all();
    }
    //crate Lead
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


   
    //Update Lead
    // Atualizar Lead
public function update(Request $request, $id)
{
    try {
        $lead = Lead::findOrFail($id);

        $validateData = $request->validate([
            'email' => 'string',
            'telefone' => 'string',
            'estado' => 'string',
            'cidade' => 'string',
            'mensagem' => 'string',
        ]);

        $lead->update($validateData);

        return response()->json($lead, 200);
    } catch (ValidationException $e) {
        return response()->json(['error' => 'Lead não encontrado.'], 404);
    } catch (ValidationException $e) {
        return response()->json(['error' => $e->validator->errors()], 400);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Erro ao atualizar lead.'], 500);
    }
}

// Deletar Lead
public function destroy($id)
{
    try {
        $lead = Lead::findOrFail($id);
        $lead->delete();

        return response()->json(null, 204);
    } catch (ValidationException $e) {
        return response()->json(['error' => 'Lead não encontrado.'], 404);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Erro ao deletar o lead.'], 500);
    }
}
}

 