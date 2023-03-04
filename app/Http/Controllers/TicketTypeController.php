<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketType;

class TicketTypeController extends Controller
{
    public function index(){
        $ticketTypes = TicketType::all();

        return response()->json($ticketTypes);
    }

    public function store(Request $request){
        $ticketType = new TicketType();

        $ticketType->name = $request->name;

        $ticketType->save();

        return response()->json([
            'status'=>200,
            'message'=>'Tipo de ingresso criado com sucesso!'
        ]);
    }

    public function update(Request $request){
        TicketType::findOrFail($request->id)->update($request->all());

        return response()->json([
            'status'=>200,
            'message'=>"Tipo de ingresso de ID {$request->id} alterado!"
        ]);
    }

    public function destroy($id){
        TicketType::findOrFail($id)->delete();

        return response()->json([
            'status'=>200,
            'message'=>"Tipo de ingresso de ID {$id} deletado!"
        ]);
    }
}
