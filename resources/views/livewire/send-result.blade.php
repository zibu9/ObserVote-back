<div>
    <div class="card-body">
        <div class="form-group">
            <label for="name">Candidat</label>
            <input type="text" disabled class="form-control" value="{{ auth()->user()->candidat->candidat }}">
        </div>
        @if($step === 1 )
            <div class="form-group">
                <label for="name">Province</label>
                <select wire:model.live="province" name="province" class="form-control">
                    <option value="">Choisir Province</option>
                    @foreach ($provinces as $province)
                    <option value="{{ $province->id }}">{{ $province->titre }}</option>
                    @endforeach
                </select>
                @if ($errors) <span class="text-danger">{{ $errors->first('province') }}</span> @endif
            </div>
            @if ($showCir == true)
            <div class="form-group">
                <label for="name">Circonscription</label>
                <select wire:model.live="circonscription" class="form-control">
                    <option value="">Choisir Circonscription</option>
                    @foreach ($circonscriptions as $circonscription)
                    <option value="{{ $circonscription->id }}">{{ $circonscription->name }}</option>
                    @endforeach
                </select>
                @if ($errors) <span class="text-danger">{{ $errors->first('circonscription') }}</span> @endif
            </div>
            @endif
            <div class="form-group">
                <label for="name">Nom Centre de vote</label>
                <input wire:model.live="centre" type="text" class="form-control">
                @if ($errors) <span class="text-danger">{{ $errors->first('centre') }}</span> @endif
            </div>
        @endif
        @if($step === 2 )
            <div class="form-group">
                <label for="name">Code du Centre de vote</label>
                <input wire:model.live="centreCode" type="text" class="form-control">
                @if ($errors) <span class="text-danger">{{ $errors->first('centreCode') }}</span> @endif
            </div>
        @endif
        @if($step === 3 )
            <div class="form-group">
                <label for="name">Code du bureau de vote</label>
                <input wire:model.live="bureau" type="text" class="form-control">
                @if ($errors) <span class="text-danger">{{ $errors->first('bureau') }}</span> @endif
            </div>
        @endif
        @if($step === 4 )
            <div class="form-group">
                <label for="name">Votants prevu dans le bureau de vote</label>
                <input wire:model.live="votantInitial" type="text" class="form-control">
                @if ($errors) <span class="text-danger">{{ $errors->first('vontantInitial') }}</span> @endif
            </div>
        @endif
        @if($step === 5 )
            <div class="form-group">
                <label for="name">Nombres des votants</label>
                <input wire:model.live="votant" type="text" class="form-control">
                @if ($errors) <span class="text-danger">{{ $errors->first('votant') }}</span> @endif
            </div>
        @endif
        @if($step === 6 )
            <div class="form-group">
                <label for="name">Nos Votants</label>
                <input wire:model.live="nosVoix" type="text" class="form-control">
                @if ($errors) <span class="text-danger">{{ $errors->first('nosVoix') }}</span> @endif
            </div>
        @endif
        @if($step === 7 && ($votantInitial != $votant) )
            <div class="form-group">
                <label for="name">Bulletins Restants</label>
                <input value="{{ $votantInitial - $votant }}" wire:model.live="bulletinRestant" type="text" class="form-control">
                @if ($errors) <span class="text-danger">{{ $errors->first('bulletinRestant') }}</span> @endif
            </div>
        @endif
    </div>
    <div class="card-footer">
        @if($step > 1)
            <button wire:click.live="previousStep" class="btn btn-sm btn-warning">Précédent</button>
        @endif
        @php
            ($votantInitial == $votant) ? $n=5 : $n=6;
        @endphp
        @for ($i=0; $i<$n; $i++)
            @php
                $var = $vars[$i];
            @endphp
            @if($step === $i+1 && !empty($$var))
                <button wire:click.live="nextStep" class="btn btn-sm btn-primary">Suivant</button>
            @endif
        @endfor
        @if($step === 7 && !empty($bulletinRestant))
            <button wire:click.live="submitForm" class="btn btn-sm btn-success">Soumettre</button>
        @endif
        @if($step === 6 && ($votantInitial == $votant))
            <button wire:click.live="submitForm" class="btn btn-sm btn-success">Soumettre</button>
        @endif
    </div>
</div>
