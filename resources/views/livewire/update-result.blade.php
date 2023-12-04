<div>
    <div class="modal fade" id="modal-default{{ $result->id }}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modifier Résultats</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body row">
                <div class="form-group col-md-6">
                    <label for="name">Candidat</label>
                    <input type="text" disabled class="form-control" value="{{ auth()->user()->candidat->candidat }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Nom Centre de vote</label>
                    <input value="{{ $centre }}" wire:model="centre" type="text" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Code du Centre de vote</label>
                    <input wire:model="centreCode" type="text" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Code du bureau de vote</label>
                    <input wire:model="bureau" type="text" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Votants prevu</label>
                    <input wire:model="votantInitial" type="text" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Nombres des votants</label>
                    <input wire:model="votant" type="text" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Nos Votants</label>
                    <input wire:model="nosVoix" type="text" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Bulletins Restants</label>
                    <input wire:model="bulletinRestant" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <input wire:model="id" type="text" class="form-control" hidden >
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-sm btn-primary">Enregistrer</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
