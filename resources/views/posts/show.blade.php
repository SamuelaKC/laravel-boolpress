@extends('layouts.app') @section('content')
<div class="container posts-cont">
    <table class="table">
        <thead>
            <!-- -- $postObject->titlePost = $fakerPost->sentence(5); 
                $postObject->textPost = $fakerPost->paragraph(5); 
                $postObject->etiquette = $fakerPost->words(1, true); 
                $postObject->comment = $fakerPost->sentence(3); 
                $postObject->image = $fakerPost->imageUrl(300, 200, 'posts', true);
                $postObject->read = $fakerPost->boolean(); -- -->

            <tr>
                <th scope="col" colspan="3" class="title-post">Title</th>
                <th scope="col"class="title-post">Post</th>
                <th scope="col"class="title-post">Image</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="3" class="title-post">{{$post->titlePost}}</td>
                <td class="text-post">{{$post->textPost}}</td>
                <td>
                    <img
                        src="{{$post->image}}"
                        alt="Image of {{$post->idUsers}}"
                    />
                </td>
            </tr>
            <tr>
                <th scope="row" class="title-post">Commento</th>
                <td colspan="5" class="text-post">{{$post->comment}}</td>
            </tr>
            <tr>
                <th scope="row" class="title-post">Etichette</th>
                <td colspan="3"class="text-post">{{$post->etiquette}}</td>
                <td colspan="2"class="text-post">Letto? {{$post->read}}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
