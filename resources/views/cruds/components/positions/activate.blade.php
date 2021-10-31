<!-- Modal -->
<button data-toggle="modal" data-target="#modal-activate" id="btn-modal-ativar" hidden></button>
<div class="modal fade" id="modal-activate" tabindex="-1" role="dialog" aria-labelledby="modal-activateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="form-activate-cargo" method="POST">
          @csrf
          <input type="hidden" id="activate-cargo">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-activateLabel">Ativar Cargo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <p>Tem certeza que deseja ativar este cargo?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fa fa-arrow-left mr-1"></i> Voltar
            </button>
            <button type="submit" class="btn btn-success" id="btn-submit-activate">
              <i class="fa fa-upload mr-1"></i> Ativar 
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>