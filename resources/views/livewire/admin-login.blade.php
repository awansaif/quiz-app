<div>
    @if(Session::has('message'))
    <div class="text-center">
        <p class="text-danger font-weight-bold">{{ Session::get('message') }}</p>
    </div>
    @endif
    <form method="POST" wire:submit.prevent="login">
        @csrf
        <div class="form-group mb-3">
            <div class="input-group input-group-merge input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="ni ni-email-83"></i>
                    </span>
                </div>
                <input class="form-control" placeholder="Email" type="email" wire:model.lazy="email">
            </div>
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="ni ni-lock-circle-open"></i>
                    </span>
                </div>
                <input class="form-control" placeholder="Password" type="password" wire:model.lazy="password">
            </div>
            @error('password')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary my-4">Sign in</button>
        </div>
    </form>
</div>
