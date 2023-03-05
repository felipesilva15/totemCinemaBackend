<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index(){
        $tickets = Ticket::all();

        return response()->json($tickets);
    }

    public function store(Request $request){
        $ticket = new Ticket();

        $ticket->price = $request->price;
        $ticket->seat_id = $request->seat_id;
        $ticket->order_id = $request->order_id;
        $ticket->ticket_type_id = $request->ticket_type_id;

        $ticket->save();

        return response()->json([
            'status'=>200,
            'message'=>'Ticket criado com sucesso!'
        ]);
    }

    public function update(Request $request){
        Ticket::findOrFailt($request->id)->update($request->all());

        return response()->json([
            'status'=>200,
            'message'=>"Ticket de ID {$request->id} alterado!"
        ]);
    }

    public function destroy($id){
        Ticket::findOrFailt($id)->delete();

        return response()->json([
            'status'=>200,
            'message'=>"Ticket de ID {$id} deletado!"
        ]);
    }
}
