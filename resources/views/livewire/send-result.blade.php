<div>
    <div class="card-body">
        <div class="form-group">
            <label for="name">Candidat</label>
            <input type="text" disabled class="form-control" id="name" value="{{ auth()->user()->candidat->candidat }}">
        </div>
        @if($step === 1 )
            <div class="form-group">
                <label for="name">Nom Centre de vote</label>
                <input wire:model.live="centre" type="text" class="form-control" id="name">
            </div>
        @endif
        @if($step === 2 )
            <div class="form-group">
                <label for="name">Code du Centre de vote</label>
                <input wire:model.live="centreCode" type="text" class="form-control" id="name">
            </div>
        @endif
        @if($step === 3 )
            <div class="form-group">
                <label for="name">Code du bureau de vote</label>
                <input wire:model.live="bureau" type="text" class="form-control" id="name">
            </div>
        @endif
        @if($step === 4 )
            <div class="form-group">
                <label for="name">Votants prevu dans le bureau de vote</label>
                <input wire:model.live="votantInitial" type="text" class="form-control" id="name">
            </div>
        @endif
        @if($step === 5 )
            <div class="form-group">
                <label for="name">Nombres des votants</label>
                <input wire:model.live="votant" type="text" class="form-control" id="name">
            </div>
        @endif
        @if($step === 6 )
            <div class="form-group">
                <label for="name">Nos Votants</label>
                <input wire:model.live="nosVoix" type="text" class="form-control" id="name">
            </div>
        @endif
        @if($step === 7 )
            <div class="form-group">
                <label for="name">Bulletins Restants</label>
                <input wire:model.live="bulletinRestant" type="text" class="form-control" id="name">
            </div>
        @endif
    </div>
    <div class="card-footer">
        @if($step > 1)
            <button wire:click.live="previousStep" class="btn btn-primary">Précédent</button>
        @endif

        @if($step === 1 && !empty($centre))
            <button wire:click.live="nextStep" class="btn btn-primary">Suivant</button>
        @endif
        @if($step === 7 && $filled[6])
            <button wire:click.live="submitForm" class="btn btn-success">Soumettre</button>
        @endif
    </div>
</div>
