@extends('./layouts/app')
@section("title")
Les articles
@endsection

@section("page-content")
    <div class="row">

        {{-- list des articles --}}
        <div class="col-md-8 col-sm-12">
            <ul class="list-group mt-5">
                <h4>List des articles</h4>
                @forelse($articles as $article)
                    <li class="list-group-item">
                        <a href="{{ route('article.show',$article->id) }}">
                            <div class="title">
                                {{ $article->titre }}
                            </div>
                        </a>
                        <div class="description">
                            {{ $article->description }}
                        </div>
                    </li>
                @empty
                    <p class="text-danger">aucun article trouvé.</p>
                @endforelse
            </ul>
        </div>

        {{-- enregistrer un article --}}
        @auth
            <div class="col-md-4">
                <div class="card mt-5">
                    <div class="card-body ">
                        @if(session()->has("success"))
                                <div class="alert alert-success">
                                    {{ session()->get("success") }}
                                </div>
                            @endif
                        <form action="/acceuil" method="POST" class="form-product">
                            @method('post')
                            @csrf

                            <h3>Enregistrer un Article</h3>
                            <div class="form-group">
                                <label for="nom">Titre</label>
                                <input type="text" class="form-control" placeholder="Titre de produit" name="titre" value={{ old('titre') }}>
                                    @error("titre")
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <textarea class = "form-control mt-1" name="description" placeholder="Enter la description" value={{ old("description") }}></textarea>
                                    @error("description")
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                            <br>
                            <button class="btn btn-success " type="submit" name="btn_submit">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endsection
