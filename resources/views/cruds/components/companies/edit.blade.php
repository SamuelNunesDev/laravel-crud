<!-- Modal -->
<button data-toggle="modal" data-target="#modal-editar" id="btn-modal-editar" hidden></button>
<div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="modal-editarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="form-edit-empresa" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" id="edit-empresa">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-editarLabel">Editar Empresa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="edit-empresa-nome">Nome:</label>
              <input type="text" name="nome" id="edit-empresa-nome" class="form-control" required>
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