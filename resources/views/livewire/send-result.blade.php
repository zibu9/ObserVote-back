<div>
    <div class="card-body">
        <div class="form-group">
            <label for="name">Candidat</label>
            <input name="name" type="disable" class="form-control" id="name" value="{{ auth()->user()->candidat }}">
        </div>
    </div>
    <div class="card-footer">
        @if($step > 1)
            <button wire:click.live="previousStep" class="btn btn-primary">Précédent</button>
        @endif

        @if($step < 6)
            <button wire:click.live="nextStep" class="btn btn-primary">Suivant</button>
        @else
            <button wire:click.live="submitForm" class="btn btn-success">Soumettre</button>
        @endif
    </div>
</div>
