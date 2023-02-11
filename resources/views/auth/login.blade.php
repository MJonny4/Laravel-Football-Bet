<x-layouts.app
    title="Login"
    css="../resources/css/login.css"
>
    <div class="login">
        <h2 class="h2 mb-2 fw-normal text-center mt-3">Login</h2>
        <form method="post" action="{{ route('login') }}">
            @csrf
            <input type="text" name="email" placeholder="Email" value="{{ old('email') }}"/>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="password" name="password" placeholder="Contrasenya"/>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary btn-block btn-large">Iniciar Sessio</button>
        </form>
    </div>
</x-layouts.app>
