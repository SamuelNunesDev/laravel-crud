<!-- Modal -->
<button data-toggle="modal" data-target="#modal-delete" id="btn-modal-deletar" hidden></button>
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-deleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="form-delete-funcionario" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" id="delete-funcionario">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-deleteLabel">Deletar Funcionario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p>Tem certeza que deseja deletar este funcionário?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fa fa-arrow-left mr-1"></i> Voltar
          </button>
          <button type="submit" class="btn btn-danger" id="btn-submit-delete">
            <i class="fa fa-times-circle mr-1"></i> Deletar Funcionário
          </button>
        </div>
      </form>
    </div>
  </div>
</div>