<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Exception;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Empresas';
        $companies = Company::withTrashed()->get();

        if( $request->ajax() != null ) {
            return DataTables::of($companies)->make(true);
        }

        return view('cruds.companies', compact('title', 'companies'));
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
            Company::create([
                'nome' => $request->nome,
                'status' => Company::STATUS_ACTIVE
            ]);

            return back()->with('success', 'Empresa cadastrada com sucesso!');
        } catch( Exception $e ) {
            return back()->with('error', 'Houve um erro ao cadastrar a empresa. '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $company)
    {
        try {
            Company::find($company)->update([
                'nome' => $request->nome,
            ]);
            
            return back()->with('success', 'Empresa atualizada com sucesso!');
        } catch( Exception $e ) {
            return back()->with('error', 'Ops, houve um erro ao atualizar a empresa. '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $company)
    {
        try {
            $company = Company::find($company);
            $company->update(['status' => 0]);
            $company->delete();
        
            return back()->with('success', 'Empresa excluída com sucesso!');
        } catch( Exception $e ) {
            return back()->with('error', 'Ops! Houve um erro ao deletar a empresa. '.$e->getMessage());
        }
    }

    /**
     * Muda o status para ativo e deleta o timestamp registrado referente a empresa
     * 
     * @param int $company
     * @return \Illuminate\Http\Response
     */
    public function activateCompany(int $company)
    {
        try {
            Company::withTrashed()->find($company)->update([
                'status' => 1,
                'deleted_at' => null
            ]);

            return back()->with('success', 'Empresa reativada com sucesso!');
        } catch( Exception $e ) {
            return back()->with('error', 'Ops! Houve um erro ao reativar a empresa! '.$e->getMessage());
        }
    }
}
