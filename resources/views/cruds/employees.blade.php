@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="{!! url(mix('cruds/css/style.css')) !!}">
@endsection

@section('content')
    @include('cruds.components.employees.create')
    @include('cruds.components.employees.edit')
    @include('cruds.components.employees.delete')
    @include('cruds.components.employees.activate')
    <table id="dt-funcionarios" class="table table-hover table-sm" style="width:100%;">
        <thead>
            <tr>
                <th>Status</th>
                <th>Funcionario ID</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Cadastrado em</th>
                <th>Deletado em</th>
                <th>Ações</th>
            </tr>
        </thead>
    </table>
@endsection

@section('scripts')
    <script src="{!! url(mix('cruds/js/script.js')) !!}"></script>
    <script>
        $(function() {
            $('#nav-link-funcionarios').attr('href', '#')

            let funcionarios = 
                $.fn.dataTable.ext.errMode = 'none';
                var table = $('#dt-funcionarios').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{!! route('employees.index') !!}"
                    },
                    lengthChange: false,
                    lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
                    buttons: ['pageLength', 'colvis', 'excel', 'pdf'],
                    columns: [
                        {data: 'status', name: 'status',
                            'render': function(status, type, row) {
                                if( !status ) {
                                    return '<span class="badge badge-danger py-1 px-2">INATIVO</span>'
                                }    
                                return '<span class="badge badge-success py-1 px-2">ATIVO</span>'
                            }
                        },
                        {data: 'funcionario_id', name: 'funcionario_id', visible: false},
                        {data: 'nome', name:'nome'},
                        {data: 'data_nascimento', name: 'data_nascimento', 
                            'render': function(data_nascimento, type, row) {
                                    let date = new Date(data_nascimento)
                                    return date.toLocaleDateString('pt-BR', {timeZone: 'UTC'});
                                }
                        },
                        {data: 'created_at', name: 'created_at', 
                            'render': function(created_at, type, row) {
                                        let date = new Date(created_at)
                                        return formatDateTime(date)
                                    }
                        },
                        {data: 'deleted_at', name: 'deleted_at', visible: false,
                            'render': function(deleted_at, type, row) {
                                if( deleted_at ) {
                                    let date = new Date(deleted_at)
                                    return formatDateTime(date)
                                }
                                return '-'
                            }},
                        {data: 'funcionario_id', name: 'funcionario_id',
                            'render': function(funcionario_id, type, row) {
                                if( row.status ) {
                                    return `<button type="button" class="btn btn-sm btn-warning btn-editar" value="${funcionario_id}"><i class="fa fa-edit text-light"></i></button><button class="btn btn-sm btn-danger btn-deletar" value="${funcionario_id}"><i class="fa fa-times-circle"></i></button>`
                                }
                                return `<button class="btn btn-sm btn-success btn-ativar" value="${funcionario_id}"><i class="fa fa-check"></i></button>`
                            }
                        },
                    "initComplete": function(settings, json) {
                        table.buttons().container().appendTo('#dt-funcionarios_wrapper .col-md-4:eq(0)')
                        $('#add-buttons').append('<div class="form-inline"></div>')
                        $('#dt-funcionarios_filter').addClass('d-flex').parent().addClass('d-flex justify-content-end').prepend('<a class="btn btn-primary btn-sm pt-1 mr-2" data-toggle="modal" data-target="#modal-cadastro"><i class="fa fa-plus-circle pt-2"></i> Criar Funcionario</a>')

                        $('.buttons-html5').addClass('btn btn-sm btn-secondary')

                        $('#search').attr('placeholder', 'Pesquisar')
                    }
                })

            let $input_funcionario_id = $('#edit-funcionario')
            $(document).on('click', '.btn-editar', function() {
                $input_funcionario_id.val(this.value)
                $('#form-edit-funcionario').attr('action', `{!! url('funcionarios') !!}/${$input_funcionario_id.val()}`)
                $('#btn-modal-editar').trigger('click')
            })

            $(document).on('click', '.btn-deletar', function() {
                $input_funcionario_id.val(this.value)
                $('#form-delete-funcionario').attr('action', `{!! url('funcionarios') !!}/${$input_funcionario_id.val()}`)
                $('#btn-modal-deletar').trigger('click')
            })

            $(document).on('click', '.btn-ativar', function() {
                $input_funcionario_id.val(this.value)
                $('#form-activate-funcionario').attr('action', `{!! url('ativa-funcionario') !!}/${$input_funcionario_id.val()}`)
                $('#btn-modal-ativar').trigger('click')
            })

            function formatDateTime(date) {
                let day = String(date.getDate()).length == 1 ? `0${date.getDate()}` : date.getDate() 
                let month = String(date.getMonth() + 1).length == 1 ? `0${date.getMonth() + 1}` : date.getMonth() + 1 
                let hours = String(date.getHours()).length == 1 ? `0${date.getHours()}` : date.getHours()
                let minutes = String(date.getMinutes()).length == 1 ? `0${date.getMinutes()}` : date.getMinutes()
                let seconds = String(date.getSeconds()).length == 1 ? `0${date.getSeconds()}` : date.getSeconds()
                
                return `${day}/${month}/${date.getFullYear()} as ${hours}:${minutes}:${seconds}`
            }
        })
    </script>
@endsection