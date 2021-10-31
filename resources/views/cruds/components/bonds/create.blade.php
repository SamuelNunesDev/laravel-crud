<!-- Modal -->
<div class="modal fade" id="modal-cadastro" tabindex="-1" role="dialog" aria-labelledby="modal-cadastroLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{!! route('bonds.store') !!}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="modal-cadastroLabel">Cadastrar Vinculo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="funcionario_id">Funcionario:</label>
              <select name="funcionario_id" id="funcionario_id" class="form-control" required>
                <option value="">Selecione um funcionário </option>
                @foreach ($employees as $employee)
                    <option value="{!! $employee->funcionario_id !!}">{!! $employee->nome !!}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="cargo_id">Cargo:</label>
              <select name="cargo_id" id="cargo_id" class="form-control" required>
                <option value="">Selecione um cargo</option>
                @foreach($positions as $position)
                  <option value="{!! $position->cargo_id !!}">{!! $position->nome !!}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="empresa_id">Empresa:</label>
              <select name="empresa_id" id="empresa_id" class="form-control" required>
                <option value="">Selecione uma empresa</option>
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
          <button type="submit" class="btn btn-success">
            <i class="fa fa-save mr-1"></i> Salvar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>