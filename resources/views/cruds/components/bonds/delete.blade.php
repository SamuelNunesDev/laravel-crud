<!-- Modal -->
<button data-toggle="modal" data-target="#modal-delete" id="btn-modal-deletar" hidden></button>
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-deleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="form-delete-vinculo" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" id="delete-vinculo">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-deleteLabel">Deletar Vinculo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="delete-funcionario-id">Funcionario:</label>
              <select name="funcionario_id" id="delete-funcionario-id" class="form-control" disabled>
                @foreach ($employees as $employee)
                    <option value="{!! $employee->funcionario_id !!}">{!! $employee->nome !!}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="delete-cargo-id">Cargo:</label>
              <select name="cargo_id" id="delete-cargo-id" class="form-control" disabled>
                @foreach($positions as $position)
                  <option value="{!! $position->cargo_id !!}">{!! $position->nome !!}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="delete-empresa-id">Empresa:</label>
              <select name="empresa_id" id="delete-empresa-id" class="form-control" disabled>
                @foreach($companies as $company)
                  <option value="{!! $company->empresa_id !!}">{!! $company->nome !!}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fa fa-arrow-left mr-1"></i> Voltar
          </button>
          <button type="submit" class="btn btn-danger" id="btn-submit-delete">
            <i class="fa fa-times-circle mr-1"></i> Deletar Vincúlo
          </button>
        </div>
      </form>
    </div>
  </div>
</div>