@extends('./../layouts/app')
@section("title")
Article
@endsection
@section("page-content")
    <div class="card mt-5">
        <a href="/acceuil" class="px-2">retour</a>
        <div class="card-body">
            <div class='title'>{{ $article->titre }}</div>
            <p>{{ $article->description }}</p>
        </div>
        <div class="card-footer">
            <button class="btn btn-info">Editer</button>
            <button class="btn btn-danger">Supprimer</button>
        </div>
    </div>
@endsection
