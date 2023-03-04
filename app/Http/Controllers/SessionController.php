<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use Illuminate\Support\Facades\DB;

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

    private $months = [
        'Janeiro',
        'Fevereiro',
        'Março',
        'Abril',
        'Maio',
        'Junho',
        'Julho',
        'Agosto',
        'Setembro',
        'Outubro',
        'Novembro',
        'Dezembro'
    ];

    public function index(){
        $sessions = Session::all();

        return response()->json($sessions);
    }

    public function store(Request $request){
        $session = new Session();

        $session->date = $request->date;
        $session->film_id = $request->film_id;
        $session->hour = $request->hour;
        $session->language = $request->language;
        $session->room = $request->room;

        $session->save();

        return response()->json([
            'status'=>200,
            'message'=>'Sessão criada com sucesso!'
        ]);
    }

    public function update(Request $request){
        Session::findOrfail($request->id)->update($request->all());

        return response()->json([
            'status'=>200,
            'message'=>"Sessão de ID {$request->id} alterada!"
        ]);
    }

    public function destroy($id){
        Session::findOrFail($id)->delete();

        return response()->json([
            'status'=>200,
            'message'=>"Sessão de ID {$id} deletada!"
        ]);
    }

    public function findNextDays($count){
        $count = $count && $count != 0 ? intval($count) : 7;

        $dataSql = Session::orderBy('date')->where('date', '>=', date('Y-m-d'))
            ->get()
            ->unique('date')
            ->pluck('date')
            ->take($count);

        $data = [];

        foreach ($dataSql as $date) {
            $item['date'] = $date;
            $item['month'] = $this->months[date('n', strtotime($date))];
            $item['dayOfWeek'] = $this->dow[date('w', strtotime($date))];

            array_push($data, $item);
        }

        return response()->json($data);
    }
}
