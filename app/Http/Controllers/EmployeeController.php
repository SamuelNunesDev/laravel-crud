<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Exception;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Funcionarios';
        $employees = Employee::withTrashed()->get();

        if( $request->ajax() != null ) {
            return DataTables::of($employees)->make(true);
        }

        return view('cruds.employees', compact('title', 'employees'));
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
            Employee::create([
                'nome' => $request->nome,
                'data_nascimento' => $request->data_nascimento,
                'status' => Employee::STATUS_ACTIVE
            ]);

            return back()->with('success', 'Funcionario cadastrado com sucesso!');
        } catch( Exception $e ) {
            return back()->with('error', 'Houve um erro ao cadastrar o funcionário. '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $employee)
    {
        try {
            Employee::find($employee)->update([
                'nome' => $request->nome,
                'data_nascimento' => $request->data_nascimento
            ]);
            
        return back()->with('success', 'Funcionário atualizado com sucesso!');
        } catch( Exception $e ) {
            return back()->with('error', 'Ops, houve um erro ao atualizar o funcionário. '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $employee)
    {
        try {
            $employee = Employee::find($employee);
            $employee->update(['status' => 0]);
            $employee->delete();
        
            return back()->with('success', 'Funcionário excluído com sucesso!');
        } catch( Exception $e ) {
            return back()->with('error', 'Ops! Houve um erro ao deletar o funcionário. '.$e->getMessage());
        }
    }

    /**
     * Muda o status para ativo e deleta o timestamp registrado referente ao funcionario
     * 
     * @param int $employee
     * @return \Illuminate\Http\Response
     */
    public function activateEmployee(int $employee)
    {
        try {
            Employee::withTrashed()->find($employee)->update([
                'status' => 1,
                'deleted_at' => null
            ]);

            return back()->with('success', 'Funcionario reativado com sucesso!');
        } catch( Exception $e ) {
            return back()->with('error', 'Ops! Houve um erro ao reativar o funcionário! '.$e->getMessage());
        }
    }
}
