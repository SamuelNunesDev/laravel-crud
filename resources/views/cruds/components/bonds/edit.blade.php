<!-- Modal -->
<button data-toggle="modal" data-target="#modal-editar" id="btn-modal-editar" hidden></button>
<div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="modal-editarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="form-edit-vinculo" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" id="edit-vinculo">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-editarLabel">Editar Vinculo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="edit-funcionario-id">Funcionario:</label>
              <select name="funcionario_id" id="edit-funcionario-id" class="form-control" required>
                @foreach ($employees as $employee)
                    <option value="{!! $employee->funcionario_id !!}">{!! $employee->nome !!}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="edit-cargo-id">Cargo:</label>
              <select name="cargo_id" id="edit-cargo-id" class="form-control" required>
                @foreach($positions as $position)
                  <option value="{!! $position->cargo_id !!}">{!! $position->nome !!}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="edit-empresa-id">Empresa:</label>
              <select name="empresa_id" id="edit-empresa-id" class="form-control" required>
                @foreach($companies as $company)
                  <option value="{!! $company->empresa_id !!}">{!! $company->nome !!}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fa fa-times-circle mr-1"></i> Cancelar
          </button>
          <button type="submit" class="btn btn-success" id="btn-submit-edit">
            <i class="fa fa-save mr-1"></i> Atualizar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>