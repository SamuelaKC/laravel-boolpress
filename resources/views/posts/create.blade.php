@extends('layouts.app') @section('content')
<div class="container posts-cont">
    @if //codice da copiare per l'errore @endif
    <form action="{{ Route('posts.store') }}" method="POST">
        @csrf

        <!-- $table->id();
            $table->text('avatarUsers'); 
            $table->text('titlePost', 500); 
            $table->text('textPost'); 
            $table->text('image')->after('textPost'); 
            $table->double('price', 8, 2)->after('image'); 
            $table->boolean('read')->after('price');  -->

        <label for="idUsers">Id User</label>
        <input type="number" min="1" max="100" name="idUsers" id="idUsers" />
        <br />

        <label for="avatarUsers">Indirizzo dell'Avatar</label>
        <input type="text" name="avatarUsers" id="avatarUsers" /> <br />

        <label for="titlePost">Titolo del Post</label>
        <input type="text" name="titlePost" id="titlePosts" /> <br />

        <label for="textPost">Testo del Post</label>
        <input type="text" name="textPost" id="textPost" /> <br />

        <label for="image">Inserisci un immagine</label>
        <input type="text" name="image" id="image" /> <br />

        <label for="price">Prezzo</label>
        <input type="number" name="price" id="price" step="0.01" /><br />

        <div class="form-check form-check-inline">
            <input
                class="form-check-input"
                type="radio"
                name="read"
                id="read"
            />
            <label class="form-check-label" for="read">Letto</label>
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</div>
@endsection
