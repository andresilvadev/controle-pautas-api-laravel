<?php

namespace App\Http\Controllers;

use App\Pauta;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PautaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return DB::table('pautas')->get();
        $pautas = Pauta::where('user_id', \Auth::user()->id)               
               ->get();

        return $pautas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
            'descricao' => 'required',
            'detalhes' => 'required',
            'autor' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
             return response()->json($validator->messages(), 200);
        }

        $pauta = new Pauta;
        $pauta->titulo = $request->titulo;
        $pauta->descricao = $request->descricao;
        $pauta->detalhes = $request->detalhes;
        $pauta->autor = $request->autor;
        $pauta->status = $request->status;
        $pauta->user_id = \Auth::user()->id;
        $pauta->save();

        return response()->json($pauta, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Pauta::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
            'descricao' => 'required',
            'detalhes' => 'required',
            'autor' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
             return response()->json($validator->messages(), 200);
        }

        $pauta = Pauta::findOrFail($id);
        $pauta->update($request->all());
        return $pauta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        try {
            $pauta = Pauta::findOrFail($id);
            
        } catch(ModelNotFoundException $e){
            return response()->json(["message"=>"Pauna informada não existe."], 404);
        }

        $this->authorize('delete', $pauta);

        $pauta->delete();

        $response = [
            'message' => 'Pauta deletada com sucesso'
        ];

        return response()->json($response, 200);
    }
}
