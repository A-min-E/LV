@extends('./../layouts/app')

@section("title")
Mes articles
@endsection

@section('page-content')
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <ul class="list-group mt-5">
                <h4>List des articles</h4>
                @forelse($my_articles as $article)
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
    </div>
@endsection
