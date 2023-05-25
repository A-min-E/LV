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
            <a href="/articles/{{ $article->id }}/edit" class="btn btn-info" >Editer</a>
            <a href="/articles/{{ $article->id }}/delete" class="btn btn-danger">Supprimer</a>
        </div>
    </div>
@endsection
