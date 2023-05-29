@extends('./layouts/app')
@section('title')
Edit Article
@endsection
@section('page-content')
<div class="row mt-3">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="card mt-4">
            <div class="card-body">
                <h4>Editer un Article</h4>
                <form action="{{ route('article.update',$article->id) }}" method="POST">
                    @csrf
                    @method("put")
                    <input type="text" name="titre" value = "{{ $article->titre }}" class="form-control">
                    @error("titre")
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    <textarea class ="form-control mt-2" name="description">{{$article->description}}</textarea>
                    @error('description')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    <button type="submit" class='btn btn-success mt-3'>Actualiser</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
@endsection
