<div>
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Ajouter Candidat</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body row">
            <div class="form-group col-md-4">
                <label>Type</label>
                <select wire:model.live="typeId" class="form-control">
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="name">Noms</label>
                <input wire:model.live="name" type="text" class="form-control" id="name" placeholder="Enter nom complet">
            </div>
            <div class="form-group col-md-4">
                <label for="name">Regroupement</label>
                <input wire:model.live="regroupement" type="text" class="form-control" placeholder="Enter le regroupement politique">
            </div>
            <div class="form-group col-md-4">
                <label for="name">Parti Politique</label>
                <input wire:model.live="parti" type="text" class="form-control" placeholder="Enter le parti politique">
            </div>
            <div class="form-group col-md-4">
                <label for="name">Candidat</label>
                <input wire:model.live="candidat" type="text" class="form-control" placeholder="Enter le candidat">
            </div>
            <div class="form-group col-md-4">
                <label>Genre</label>
                <select wire:model.live="sexe" class="form-control">
                    <option value="Masculin">Masculin</option>
                    <option value="Feminin">Feminin</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>
            @if ($typeId != 1)
            <div class="form-group col-md-4">
                <label>Province</label>
                <select wire:model.live="province" class="form-control">
                    <option value="">Choisir Province</option>
                    @foreach ($provinces as $province)
                    <option value="{{ $province->id }}">{{ $province->titre }}</option>
                    @endforeach
                </select>
            </div>
            @endif
            @if ($showCir == true)
            <div class="form-group col-md-4">
                <label>Circonscription</label>
                <select wire:model.live="circonscription" class="form-control">
                    <option value="">Choisir Circonscription</option>
                    @foreach ($circonscriptions as $circonscription)
                    <option value="{{ $circonscription->id }}">{{ $circonscription->name }}</option>
                    @endforeach
                </select>
            </div>
            @endif
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Email</label>
                <input wire:model.live="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>
            <div class="form-group col-md-4">
                <label for="name">Télephone</label>
                <input wire:model.live="phone" type="text" class="form-control" placeholder="Ex : 82XXXXXXX">
            </div>
            <div class="form-group col-md-4">
                <label for="exampleInputPassword1">Password</label>
                <input wire:model.live="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
        </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button wire:click.live="submitForm" class="btn btn-primary">Submit</button>
          </div>
    </div>
</div>
