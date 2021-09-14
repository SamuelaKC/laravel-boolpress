@extends('layouts.app') @section('content')
<div class="container posts-cont">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">IdUsers</th>
                <th scope="col">Avatar</th>
                <th scope="col">Title</th>
                <th scope="col">Post</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Read</th>
            </tr>
        </thead>
        <tbody>
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
                <td> <img
                        src="{{$post->image}}"
                        alt="Image of {{$post->idUsers}}"
                /></td>
                <td>€ {{$post->price}}</td>
                <td>{{$post->read}}</td>

            </tr>
        </tbody>
    </table>
</div>
@endsection