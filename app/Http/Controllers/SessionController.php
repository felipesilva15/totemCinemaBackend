<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class SessionController extends Controller
{
    private $dow = [
        'Domingo',
        'Segunda',
        'Terça',
        'Quarta',
        'Quinta',
        'Sexta',
        'Sábado'
    ];

    public function index(){
        $data = Session::all();

        return response()->json($data);
    }

    public function store(Request $request){
        $session = new Session();

        $session = $request->all();

        return response()->json([
            'status'=>200,
            'message'=>'Sessão criada com sucesso!'
        ]);
    }

    public function update(Request $request){
        Session::findOrfail($request->id)->update($request->all());

        return response()->json([
            'status'=>200,
            'message'=>'Sessão de ID {$request->id} alterada!'
        ]);
    }

    public function destroy($id){
        Session::findOrFail($id)->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Sessão de ID {$id} deletada!'
        ]);
    }

    public function findNextDays($count){
        $count = $count && $count != 0 ? 7 : $count;

        $dataSql = Session::pluck('date', )
                            ->where('date', '>=', 'GETDATE()')
                            ->groupBy('date')
                            ->limit($count)
                            ->orderBy('date')
                            ->get();

        $data = [];

        foreach ($dataSql as $date) {
            $item['date'] = $date['date'];
            $item['dayOfWeek'] = $this->dow[date('w', strtotime($date['date']))];

        }

        return response()->json($data);
    }
}
