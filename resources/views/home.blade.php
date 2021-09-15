@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __("Dashboard") }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session("status") }}
                    </div>
                    @endif

                    {{ __("You are logged in!") }}
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($allPosts as $post )
<div class="container">
    <div class="row border-row">
        <div class="col-2"><img src="{{$post->avatarUsers}}" /> 
        <br> <a href ="{{route('posts.index')}}">Clicca qui</a></div>
        <div class="col-4 title-post">{{$post->titlePost}}</div>
        <div class="col-6">{{$post->textPost}}</div>
        <hr />
    </div>
</div>

@endforeach @endsection
