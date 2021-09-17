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
                <th scope="col" class="title-post">Title</th>
                <th scope="col" class="title-post">Post</th>
                <th scope="col" colspan="3" class="title-post">Image</th>
                <th scope="col" class="title-post"></th>
                <th scope="col" class="title-post"></th>
                <th scope="col" class="title-post"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="title-post">{{$post->titlePost}}</td>
                <td class="text-post">{{$post->textPost}}</td>
                <td colspan="4">
                    <img
                        src="{{$post->image}}"
                        alt="Image of {{$post->idUsers}}"
                    />
                </td>
            </tr>
            <tr>
                <th scope="row" class="title-post">Commento</th>
                <td colspan="8" class="text-post">{{$post->comment}}</td>
            </tr>
            <tr>
                <th scope="row" class="title-post">Etichette</th>
                <td class="text-post">{{$post->etiquette}}</td>
                <td colspan="6"class="text-post">Letto? {{$post->read}}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
