<div>
    <div class="mt-3">
        <div class="card-footer">
            @if($step > 1)
                <button wire:click.live="previousStep" class="btn btn-primary">Précédent</button>
            @endif

            @if($step < 3)
                <button wire:click.live="nextStep" class="btn btn-primary">Suivant</button>
            @else
                <button wire:click.live="submitForm" class="btn btn-success">Soumettre</button>
            @endif
        </div>
    </div>
</div>
