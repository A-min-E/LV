@extends("./layouts/app")

@section('title')
registration
@endsection

@section('page-content')
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('registration') }}" method="POST" class="form-product">
                        @method('post')
                        @csrf

                        <h3>Nouvel Utilisateur</h3>
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" placeholder="Nom" name="nom" value={{ old('nom') }}>
                                @error("nom")
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control " placeholder="Email" name="email" value="{{ old('email') }}">
                            @error("email")
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="email">Mot de passe</label>
                            <input type="password" class="form-control "  name="password" >
                            @error("password")
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>

                        <button class="btn btn-info btn-sm mt-2" type="submit" name="btn_submit">Inscription</button>
                    </form>
                    <p>Déja un compt ? <a href="{{ route('login') }}">Connecter vous</a></p>
                </div>
            </div>
    </div>
        <div class="col-md-4"></div>
    </div>
@endsection

