<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    public function index(){
        $films = Film::all();

        return response()->json($films);
    }

    public function store(Request $request){
        $film = new Film();

        $film->name = $request->name;
        $film->classification = $request->classification;
        $film->language = $request->language;

        $film->save();

        return response()->json([
            'status'=>200,
            'message'=>'Filme criado com sucesso!'
        ]);
    }

    public function update(Request $request){
        Film::FindOrFail($request->id)->update($request->all());

        return response()->json([
            'status'=>200,
            'message'=>'Filme de ID {$request->id} alterado!'
        ]);
    }

    public function destroy($id){
        Film::findOrFail($id)->delete();

        return response()->json([
            'status'=>200,
            'message'=>"Filme de ID $id deletado!"
        ]);
    }
}
