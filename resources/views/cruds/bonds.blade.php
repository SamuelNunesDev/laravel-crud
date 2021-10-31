@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="{!! url(mix('cruds/css/style.css')) !!}">
@endsection

@section('content')
    @include('cruds.components.bonds.create')
    @include('cruds.components.bonds.edit')
    @include('cruds.components.bonds.delete')
    @include('cruds.components.bonds.activate')
    <table id="dt-vinculos" class="table table-hover table-sm" style="width:100%;">
        <thead>
            <tr>
                <th>Status</th>
                <th>Vinculo ID</th>
                <th>Funcionário</th>
                <th>Cargo</th>
                <th>Empresa</th>
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
            $('#nav-link-vinculos').attr('href', '#')
            
            let vinculos = 
                $.fn.dataTable.ext.errMode = 'none';
                var table = $('#dt-vinculos').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{!! route('bonds.index') !!}"
                    },
                    lengthChange: false,
                    lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
                    buttons: ['pageLength', 'colvis', 'excel', 'pdf'],
                    columns: [
                        {data: 'status', name: 'status',
                        'render': function(status, type, row) {
                            switch(status) {
                                case 0:
                                    return '<span class="badge badge-danger py-1 px-2">INATIVO</span>'
                                    break
                                case 1:
                                    return '<span class="badge badge-success py-1 px-2">ATIVO</span>'
                                    break
                                default:
                                    return '<span class="badge badge-warning py-1 px-2">SEM INFORMAÇÕES</span>'
                                    break
                            }
                        }
                    },
                        {data: 'id', name: 'id', visible: false},
                        {data: 'name', name:'name'},
                        {data: 'position', name: 'position'},
                        {data: 'company', name: 'company'},
                        {data: 'created_at', name: 'created_at', visible: false, 
                            'render': function(created_at, type, row){
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
                        {data: 'id', name: 'id',
                            'render': function(id, type, row) {
                                switch(row.status) {
                                    case 1:
                                        return `<button type="button" class="btn btn-sm btn-warning btn-editar" value="${id}"><i class="fa fa-edit text-light"></i></button><button class="btn btn-sm btn-danger btn-deletar" value="${id}"><i class="fa fa-times-circle"></i></button>`
                                        break
                                    case 0:
                                        return `<button class="btn btn-sm btn-success btn-ativar" value="${id}"><i class="fa fa-check"></i></button>`
                                        break
                                }
                            }
                        }
                    ],
                    "initComplete": function(settings, json) {
                        table.buttons().container().appendTo('#dt-vinculos_wrapper .col-md-4:eq(0)')
                        $('#add-buttons').append('<div class="form-inline"></div>')
                        $('#dt-vinculos_filter').addClass('d-flex').parent().addClass('d-flex justify-content-end').prepend('<a class="btn btn-primary btn-sm pt-1 mr-2" data-toggle="modal" data-target="#modal-cadastro"><i class="fa fa-plus-circle pt-2"></i> Criar Vinculo</a>')

                        $('.buttons-html5').addClass('btn btn-sm btn-secondary')

                        $('#search').attr('placeholder', 'Pesquisar')
                    }
                })

            let $input_vinculo_id = $('#edit-vinculo')
            $(document).on('click', '.btn-editar', function() {
                let vinculo_id = this.value
                $.ajax({
                    type: "GET",
                    url: `{!! url('info-vinculo') !!}/${vinculo_id}`,
                    dataType: "JSON",
                    success: function(response) {
                        $('#edit-funcionario-id > option, #edit-cargo-id > option, #edit-empresa-id > option')
                            .removeAttr('selected')
                        $input_vinculo_id.val(vinculo_id)
                        $(`#edit-funcionario-id > option[value=${response.nome}]`).attr('selected', true)
                        $(`#edit-cargo-id > option[value=${response.cargo}]`).attr('selected', true)
                        $(`#edit-empresa-id > option[value=${response.empresa}]`).attr('selected', true)
                        $('#form-edit-vinculo').attr('action', `{!! url('vinculos') !!}/${$input_vinculo_id.val()}`)
                        $('#btn-modal-editar').trigger('click')
                    },
                    error: function(response) {
                        console.log(`erro: ${response}`)
                    }
                });
            })

            $(document).on('click', '.btn-deletar', function() {
                let vinculo_id = this.value
                $.ajax({
                    type: "GET",
                    url: `{!! url('info-vinculo') !!}/${vinculo_id}`,
                    dataType: "JSON",
                    success: function(response) {
                        $('#delete-funcionario-id > option, #delete-cargo-id > option, #delete-empresa-id > option')
                            .removeAttr('selected')
                        $input_vinculo_id.val(vinculo_id)
                        $(`#delete-funcionario-id > option[value=${response.nome}]`).attr('selected', true)
                        $(`#delete-cargo-id > option[value=${response.cargo}]`).attr('selected', true)
                        $(`#delete-empresa-id > option[value=${response.empresa}]`).attr('selected', true)
                        $('#form-delete-vinculo').attr('action', `{!! url('vinculos') !!}/${$input_vinculo_id.val()}`)
                        $('#btn-modal-deletar').trigger('click')
                    },
                    error: function(response) {
                        console.log(`erro: ${response}`)
                    }
                });
            })

            $(document).on('click', '.btn-ativar', function() {
                let vinculo_id = this.value
                $.ajax({
                    type: "GET",
                    url: `{!! url('info-vinculo') !!}/${vinculo_id}`,
                    dataType: "JSON",
                    success: function(response) {
                        $('#activate-funcionario-id > option, #activate-cargo-id > option, #activate-empresa-id > option')
                            .removeAttr('selected')
                        $input_vinculo_id.val(vinculo_id)
                        $(`#activate-funcionario-id > option[value=${response.nome}]`).attr('selected', true)
                        $(`#activate-cargo-id > option[value=${response.cargo}]`).attr('selected', true)
                        $(`#activate-empresa-id > option[value=${response.empresa}]`).attr('selected', true)
                        $('#form-activate-vinculo').attr('action', `{!! url('ativa-vinculo') !!}/${$input_vinculo_id.val()}`)
                        $('#btn-modal-ativar').trigger('click')
                    },
                    error: function(response) {
                        console.log(`erro: ${response}`)
                    }
                });
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