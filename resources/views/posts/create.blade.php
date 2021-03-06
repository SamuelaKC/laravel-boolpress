@extends('layouts.app') @section('content')
<div class="container posts-cont">

            <!-- -- $postObject->titlePost = $fakerPost->sentence(5); 
                $postObject->textPost = $fakerPost->paragraph(5); 
                $postObject->etiquette = $fakerPost->words(1, true); 
                $postObject->comment = $fakerPost->sentence(3); 
                $postObject->image = $fakerPost->imageUrl(300, 200, 'posts', true);
                $postObject->read = $fakerPost->boolean(); -- -->


                @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
                </ul>
                </div>
                @endif

    <form action="{{ Route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titlePost">Titolo del Post</label>
            <input
                type="text"
                name="titlePost"
                id="titlePost"
                class="form-control"
                aria-describedby="emailHelp"
                placeholder="Titolo Post"
            />
        </div>
        <div class="form-group">
            <label for="textPost">Testo del Post</label>
            <textarea
                class="form-control"
                name="textPost"
                id="textPost"
                rows="3"
                placeholder="Testo del Post"
            ></textarea>
        </div>
        <div class="form-group">
            <label for="etiquette">Etichetta</label>
            <select class="form-control" name="etiquette_id" id="etiquette_id">
                @foreach ($etiquettes as $etiquette )
                <option value="{{$etiquette->id}}">{{$etiquette->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="comment">Commento</label>
            <textarea
                class="form-control"
                name="comment"
                id="comment"
                rows="3"
                placeholder="Commento"
            ></textarea>
        </div>
        <div class="form-group">
            <label for="image">Immagine</label>
            <input
                type="text"
                name="image"
                id="image"
                class="form-control"
                aria-describedby="emailHelp"
                placeholder="Url Immagine"
            />
        </div>
        <div class="form-check">
            <input
                class="form-check-input"
                type="checkbox"
                name="read"
                id="read"
            />
            <label class="form-check-label" for="read">
                Letto
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Salva Post</button>
    </form>
</div>
@endsection
