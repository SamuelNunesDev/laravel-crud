<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Cargos';
        $positions = Position::withTrashed()->get();

        if( $request->ajax() != null ) {
            return DataTables::of($positions)->make(true);
        }

        return view('cruds.positions', compact('title', 'positions'));
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
        try {            
            Position::create([
                'nome' => $request->nome,
                'status' => Position::STATUS_ACTIVE
            ]);

            return back()->with('success', 'Cargo cadastrado com sucesso!');
        } catch( Exception $e ) {
            return back()->with('error', 'Houve um erro ao cadastrar o cargo. '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Position $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Position $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $position)
    {
        try {
            Position::find($position)->update([
                'nome' => $request->nome,
            ]);
            
        return back()->with('success', 'Cargo atualizado com sucesso!');
        } catch( Exception $e ) {
            return back()->with('error', 'Ops, houve um erro ao atualizar o cargo. '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $position)
    {
        try {
            $position = Position::find($position);
            $position->update(['status' => 0]);
            $position->delete();
        
            return back()->with('success', 'Cargo excluído com sucesso!');
        } catch( Exception $e ) {
            return back()->with('error', 'Ops! Houve um erro ao deletar o cargo. '.$e->getMessage());
        }
    }

    /**
     * Muda o status para ativo e deleta o timestamp registrado referente ao cargo
     * 
     * @param int $position
     * @return \Illuminate\Http\Response
     */
    public function activatePosition(int $position)
    {
        try {
            Position::withTrashed()->find($position)->update([
                'status' => 1,
                'deleted_at' => null
            ]);

            return back()->with('success', 'Cargo reativado com sucesso!');
        } catch( Exception $e ) {
            return back()->with('error', 'Ops! Houve um erro ao reativar o cargo! '.$e->getMessage());
        }
    }
}
