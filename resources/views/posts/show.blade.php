@extends('layouts.app') @section('content')
<div class="container posts-cont">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="col-1 title-post">Data Post</th>
                    <th scope="col" class="col-2 title-post">Title</th>
                    <th scope="col" class="col-7 title-post">Post</th>
                    <th scope="col" class="col-3 title-post">Image</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="title-post">{{$post->created_at->format('d M Y')}}</td>
                    <td class="title-post">{{$post->titlePost}}</td>
                    <td class="text-post">{{$post->textPost}}</td>
                    <td>
                        <img
                            class="image-tab"
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
                    <td class="text-post">{{$post->etiquette->name}}</td>
                    <td class="text-post">
                    @if(Auth::check())
                    Post Modificato il: {{$post->updated_at->format('d/m/Y')}}
                    @endif
                    </td>

                    <td class="text-post">
                        @if(Auth::check())
                        Letto {{$post->read}}
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
