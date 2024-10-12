<div>
    {{-- <livewire:login> = untuk mengambil componen dari halaman lain --}}

    <form wire:submit="register" class="flex justify-center min-h-screen items-center">
        @csrf
    <div class="flex  w-full max-w-sm flex-col gap-6">
        <div class="flex flex-col items-center">
            <h1 class="text-3xl font-semibold">Sign Up</h1>
            <p class="text-sm">Register to create your account</p>
        </div>
        <div class="form-group">
            <div class="form-field">
                <label class="form-label" >Your Name</label>  
                <input placeholder="Type here" type="text" wire:model="name" class="input max-w-full" />
            </div>
            <div class="form-field">
                <label class="form-label" >Username</label>  
                <input placeholder="Type here" type="text" wire:model="username" class="input max-w-full" />
            </div>
            <div class="form-field">
                <label class="form-label" >Email address</label>  
                <input placeholder="Type here" type="email" wire:model="email" class="input max-w-full" />
            </div>
            <div class="form-field">
                <label class="form-label">Password</label>
                <div class="form-control">
                    <input placeholder="Type here" type="password" wire:model="password" class="input max-w-full" />
                </div>
            </div>
            <div class="form-field pt-5">
                <div class="form-control justify-between">
                    <button type="submit" class="btn btn-primary w-full">Sign up</button>
                </div>
            </div>
    
            <div class="form-field">
                <div class="form-control justify-center">
                    <a wire:navigate href="/login" class="link link-underline-hover link-primary text-sm">have an account? Sign in.</a>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
