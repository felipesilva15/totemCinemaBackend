<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();

        return response()->json($orders);
    }

    public function store(Request $request){
        $order = new Order();

        $order->date = $request->date && $request->date != '' ? $request->date : date('Y-m-d H:i:s');
        $order->amount = $request->amount;

        $order->save();

        return response()->json([
            'status'=>200,
            'message'=>"Pedido criado com sucesso!"
        ]);
    }

    public function update(Request $request){
        Order::findOrFail($request->id)->update($request->all());

        return response()->json([
            'status'=>200,
            'message'=>"Pedido de ID {$request->id} alterado!"
        ]);
    }

    public function destroy($id){
        Order::findOrFail($id)->delete();

        return response()->json([
            'status'=>200,
            'message'=>"Pedido de ID {$id} deletado!"
        ]);
    }
}
