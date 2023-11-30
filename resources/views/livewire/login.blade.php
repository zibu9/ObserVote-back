<div>
        <div class="form-group">
            <select class="form-control" wire:model.live="loginType">
                <option value="email">Email</option>
                <option value="phone">Phone Number</option>
            </select>
        </div>
        @if ($loginType == 'email')
            <div class="input-group mb-3">
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
        @else
            <div class="input-group mb-3">
                <input type="text" name="email" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                    </div>
                </div>
            </div>
        @endif
</div>
