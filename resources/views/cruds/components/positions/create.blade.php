<!-- Modal -->
<div class="modal fade" id="modal-cadastro" tabindex="-1" role="dialog" aria-labelledby="modal-cadastroLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{!! route('positions.store') !!}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="modal-cadastroLabel">Cadastrar Cargo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="input-nome-cadastro">Nome:</label>
          <input type="text" id="input-nome-cadastro" class="form-control mb-3" name="nome" placeholder="Digite o nome do cargo" required>
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