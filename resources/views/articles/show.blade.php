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
            <div class="row">
                <div class="col-md-1">
                    <a href="/articles/{{ $article->id }}/edit" class="btn btn-info" >Editer</a>
                </div>
                <div class="col-md-1">
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Supprimer
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                {{-- <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div> --}}
                                <div class="modal-body">
                                    <p class="text text-center mt-3">Et ce que vous voulez vraiment supprimer l'Article</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <form action="/articles/{{ $article->id }}/delete" method="POST">
                                        @method("delete")
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                    {{-- <button type="button" class="btn btn-primary">Supprimer</button> --}}
                                </div>
                            </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
