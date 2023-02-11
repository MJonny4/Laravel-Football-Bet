<x-layouts.app
    title="Registre"
>
    <div class="container p-3">
        <main class="form-signup">
            <form method="post" class="row g-3" action="{{ route('register') }}">
                @csrf
                <h1 class="h2 mb-2 fw-normal text-center">Registrat Ara!</h1>

                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email: </label>
                    <input type="email" name="email" class="form-control" id="inputEmail4" size="20" maxlength="60"
                           value="{{ old('email') }}"/>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom: </label>
                    <input type="text" name="nom" class="form-control" id="nom" size="15" maxlength="20"
                           value="{{ old('nom') }}"/>
                    @error('nom')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="password" class="form-label">Contrasenya: </label>
                    <input type="password" name="password" class="form-control" id="password" size="10" maxlength="60"/>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="password_confirmation" class="form-label">Confirmar Contrasenya: </label>
                    <input type="password" name="password_confirmation" size="10" maxlength="20" class="form-control"
                           id="password_confirmation"/>
                    @error('password_confirmation')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <button type="submit" name="submitted" class="btn btn-primary">Register!</button>
                </div>

            </form>
        </main>
    </div>
</x-layouts.app>
