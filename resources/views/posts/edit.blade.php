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

    <form action="{{ Route('posts.update', $post) }}" method="POST">
        @csrf
        @method ('PUT')
        <div class="form-group">
            <label for="titlePost"  class="title-post">Titolo del Post</label>
            <input
                type="text"
                name="titlePost"
                id="titlePost"
                class="form-control"
                aria-describedby="emailHelp"
                placeholder="Titolo Post"
                value="{{$post->titlePost}}"
            />
        </div>
        <div class="form-group">
            <label for="textPost"  class="title-post">Testo del Post</label>
            <textarea
                class="form-control"
                name="textPost"
                id="textPost"
                rows="3"
                placeholder="Testo del Post"
            >{{$post->textPost}}</textarea>
        </div>
        <div class="form-group">
            <label for="etiquette"  class="title-post">Etichetta</label>
            <select class="form-control" name="etiquette" id="etiquette">
                <option>Nessun Genere</option>
                <option>Fantasy</option>
                <option>Fantascienza</option>
                <option>Horror</option>
                <option>Romance</option>
                <option>Storico</option>
            </select>
        </div>
        <div class="form-group">
            <label for="comment"  class="title-post">Commento</label>
            <textarea
                class="form-control"
                name="comment"
                id="comment"
                rows="3"
                placeholder="Commento"
            >{{$post->comment}}</textarea>
        </div>
        <div class="form-group">
            <label for="image"  class="title-post">Immagine</label>
            <input
                type="text"
                name="image"
                id="image"
                class="form-control"
                aria-describedby="emailHelp"
                placeholder="Url Immagine"
                value="{{$post->image}}"
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
        <button type="submit" class="btn btn-outline-primary btn-sm">Salva Post</button>
    </form>
</div>
@endsection
