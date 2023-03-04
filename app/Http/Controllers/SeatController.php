<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seat;

class SeatController extends Controller
{
    public function index(){
        $seats = Seat::all();

        return response()->json($seats);
    }

    public function store(Request $request){
        $seat = new Seat();

        $seat->row = $request->row;
        $seat->column = $request->column;
        $seat->session_id = $request->session_id;
        $seat->reserved = $request->reserved;

        $seat->save();

        return response()->json([
            'status'=>200,
            'message'=>'Assento criado com sucesso!'
        ]);
    }

    public function update(Request $request){
        Seat::findOrFail($request->id)->update($request->all());

        return response()->json([
            'status'=>200,
            'message'=>"Assento de ID {$request->id} alterado!"
        ]);
    }

    public function destroy($id){
        Seat::findOrFail($id)->delete();

        return response()->json([
            'status'=>200,
            'message'=>"Sessão de ID {$id} deletado!"
        ]);
    }
}
