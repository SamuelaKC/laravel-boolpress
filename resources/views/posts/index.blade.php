@extends('layouts.app') @section('content')
<div class="container posts-cont">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">IdUsers</th>
                <th scope="col">Avatar</th>
                <th scope="col">Title</th>
                <th scope="col">Post</th>
                <th scope="col">Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allPosts as $post )
            <tr>
                <th scope="row">{{$post->idUsers}}</th>
                <td>
                    <img
                        src="{{$post->avatarUsers}}"
                        alt="avatar of {{$post->idUsers}}"
                    />
                </td>
                <td class="title-post">{{$post->titlePost}}</td>
                <td>{{$post->textPost}}</td>
                {{-- <td><a href="/posts/{{$post->id}}"><i class="bi bi-zoom-in"></i></a></td> VARIANTE 1 --}}
                {{-- <td><a href="{{route('posts.show', $post)}}"><i class="bi bi-zoom-in"></i></a></td> VARIANTE 2 --}}
                <td><a href="{{route('posts.show', ['post' => $post->id])}}"><i class="bi bi-zoom-in"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
