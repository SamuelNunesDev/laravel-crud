@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="{!! url(mix('cruds/css/style.css')) !!}">
@endsection

@section('content')
    @include('cruds.components.positions.create')
    @include('cruds.components.positions.edit')
    @include('cruds.components.positions.delete')
    @include('cruds.components.positions.activate')
    <table id="dt-cargos" class="table table-hover table-sm" style="width:100%;">
        <thead>
            <tr>
                <th>Status</th>
                <th>Cargo ID</th>
                <th>Nome</th>
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
            $('#nav-link-cargos').attr('href', '#')

            let cargos = 
                $.fn.dataTable.ext.errMode = 'none';
                var table = $('#dt-cargos').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{!! route('positions.index') !!}"
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
                        {data: 'cargo_id', name: 'cargo_id', visible: false},
                        {data: 'nome', name:'nome'},
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
                        {data: 'cargo_id', name: 'cargo_id',
                            'render': function(cargo_id, type, row) {
                                if( row.status ) {
                                    return `<button type="button" class="btn btn-sm btn-warning btn-editar" value="${cargo_id}"><i class="fa fa-edit text-light"></i></button><button class="btn btn-sm btn-danger btn-deletar" value="${cargo_id}"><i class="fa fa-times-circle"></i></button>`
                                }
                                return `<button class="btn btn-sm btn-success btn-ativar" value="${cargo_id}"><i class="fa fa-check"></i></button>`
                            }
                        }
                    ],
                    "initComplete": function(settings, json) {
                        table.buttons().container().appendTo('#dt-cargos_wrapper .col-md-4:eq(0)')
                        $('#add-buttons').append('<div class="form-inline"></div>')
                        $('#dt-cargos_filter').addClass('d-flex').parent().addClass('d-flex justify-content-end').prepend('<a class="btn btn-primary btn-sm pt-1 mr-2" data-toggle="modal" data-target="#modal-cadastro"><i class="fa fa-plus-circle pt-2"></i> Criar Cargo</a>')

                        $('.buttons-html5').addClass('btn btn-sm btn-secondary')

                        $('#search').attr('placeholder', 'Pesquisar')
                    }
                })

            let $input_cargo_id = $('#edit-cargo')
            $(document).on('click', '.btn-editar', function() {
                $input_cargo_id.val(this.value)
                $('#form-edit-cargo').attr('action', `{!! url('cargos') !!}/${$input_cargo_id.val()}`)
                $('#btn-modal-editar').trigger('click')
            })

            $(document).on('click', '.btn-deletar', function() {
                $input_cargo_id.val(this.value)
                $('#form-delete-cargo').attr('action', `{!! url('cargos') !!}/${$input_cargo_id.val()}`)
                $('#btn-modal-deletar').trigger('click')
            })

            $(document).on('click', '.btn-ativar', function() {
                $input_cargo_id.val(this.value)
                $('#form-activate-cargo').attr('action', `{!! url('ativa-cargo') !!}/${$input_cargo_id.val()}`)
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