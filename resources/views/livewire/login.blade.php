<div>
    <form action="{{ route('login') }}" method="post">
        @csrf
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Login with:</label>
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
                <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                    </div>
                </div>
            </div>
        @endif

        @error('password')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <p class="mb-1">
                    <a href="forgot-password.html">Forgot password ?</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">Register</a>
                </p>
            </div>

            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
        </div>
    </form>
</div>
