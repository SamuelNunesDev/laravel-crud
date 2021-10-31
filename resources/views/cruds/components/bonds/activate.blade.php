<!-- Modal -->
<button data-toggle="modal" data-target="#modal-activate" id="btn-modal-ativar" hidden></button>
<div class="modal fade" id="modal-activate" tabindex="-1" role="dialog" aria-labelledby="modal-activateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="form-activate-vinculo" method="POST">
          @csrf
          <input type="hidden" id="activate-vinculo">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-activateLabel">Ativar Vinculo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label for="activate-funcionario-id">Funcionario:</label>
                <select name="funcionario_id" id="activate-funcionario-id" class="form-control" disabled>
                  @foreach ($employees as $employee)
                      <option value="{!! $employee->funcionario_id !!}">{!! $employee->nome !!}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="activate-cargo-id">Cargo:</label>
                <select name="cargo_id" id="activate-cargo-id" class="form-control" disabled>
                  @foreach($positions as $position)
                    <option value="{!! $position->cargo_id !!}">{!! $position->nome !!}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="activate-empresa-id">Empresa:</label>
                <select name="empresa_id" id="activate-empresa-id" class="form-control" disabled>
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
            <button type="submit" class="btn btn-success" id="btn-submit-activate">
              <i class="fa fa-upload mr-1"></i> Ativar Vincúlo
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>