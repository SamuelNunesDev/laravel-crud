<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Company;
use App\Models\Bond;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BondController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Vinculos';
        $employees = Employee::withTrashed()->get();
        $positions = Position::withTrashed()->get();
        $companies = Company::withTrashed()->get();

        $bonds = Bond::withTrashed()
                            ->select(
                                'vinculos.status as status',
                                'vinculos.vinculo_id as id',
                                'f.nome as name',
                                'c.nome as position',
                                'e.nome as company',
                                'vinculos.created_at as created_at',
                                'vinculos.deleted_at as deleted_at',   
                                )
                            ->join('funcionarios as f', 'f.funcionario_id', '=', 'vinculos.funcionario_id')
                            ->join('cargos as c', 'c.cargo_id', '=', 'vinculos.cargo_id')
                            ->join('empresas as e', 'e.empresa_id', '=', 'vinculos.empresa_id')
                            ->get();

        if( $request->ajax() != null ) {
            return DataTables::of($bonds)->make(true);
        }

        return view('cruds.bonds', compact('title', 'employees', 'positions', 'companies', 'bonds'));
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
            $dados = $request->except('_token');

            if( !Employee::withTrashed()->find($dados['funcionario_id'])->status || 
                !Position::withTrashed()->find($dados['cargo_id'])->status || 
                !Company::withTrashed()->find($dados['empresa_id'])->status ) {

                $dados['status'] = Bond::STATUS_DISABLED;
            } else {
                $dados['status'] = Bond::STATUS_ACTIVE;
            }
            
            Bond::create([
                'funcionario_id' => $dados['funcionario_id'],
                'cargo_id' => $dados['cargo_id'],
                'empresa_id' => $dados['empresa_id'],
                'status' => $dados['status']
            ]);

            return back()->with('success', 'Vinculo cadastrado com sucesso!');
        } catch( Exception $e ) {
            return back()->with('error', 'Houve um erro ao cadastrar. '.$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vinculo  $bond
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $bond)
    {
        try {
            Bond::find($bond)->update([
                'funcionario_id' => $request->funcionario_id,
                'cargo_id' => $request->cargo_id,
                'empresa_id' => $request->empresa_id
            ]);
            
        return back()->with('success', 'Vinculo atualizado com sucesso!');
        } catch( Exception $e ) {
            return back()->with('error', 'Ops, houve um erro ao atualizar o vínculo. '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vinculo  $bond
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $bond)
    {
        try {
            $vinculo = Bond::find($bond);
            $vinculo->update(['status' => 0]);
            $vinculo->delete();
        
            return back()->with('success', 'Vinculo excluído com sucesso!');
        } catch( Exception $e ) {
            return back()->with('error', 'Ops! Houve um erro ao deletar o vínculo. '.$e->getMessage());
        }
    }

    /**
     * Retorna o nome, cargo e empresa referentes ao vinculo
     * 
     * @param int $bond
     * @return \Illuminate\Http\JsonResponse
     */
    public function returnBondInfo(int $bond)
    {
        $bond = Bond::withTrashed()->find($bond);

        return response()->json([
            'nome' => $bond->funcionario->funcionario_id,
            'cargo' => $bond->cargo->cargo_id,
            'empresa' => $bond->empresa->empresa_id
        ]);
    }

    /**
     * Muda o status para ativo e deleta o timestamp registrado referente ao vinculo
     * 
     * @param int $bond
     * @return \Illuminate\Http\Response
     */
    public function activateBond(int $bond)
    {
        try {
            Bond::withTrashed()->find($bond)->update([
                'status' => 1,
                'deleted_at' => null
            ]);

            return back()->with('success', 'Vínculo reativado com sucesso!');
        } catch( Exception $e ) {
            return back()->with('error', 'Ops! Houve um erro ao reativar o vínculo! '.$e->getMessage());
        }
    }
}