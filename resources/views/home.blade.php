@extends('layouts.app') @section('content')
<div class="container posts-cont">
    <div class="title-post">{{$dateNow->format('F j, Y')}}</div>
    @if($isWeekendProva)
    <div class="title-post">it's weekend!!!</div>
    @else
    <div class="text-post">it's a work day... sorry!</div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="col-2 title-post">Title</th>
                <th scope="col" class="col-8 title-post">Post</th>
                <th scope="col" class="col-2 title-post">Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allPosts as $post )
            <tr>
                <td class="title-post">{{$post->titlePost}}</td>
                <td class="text-post">{{$post->textPost}}</td>
                <!-- {{--
                <td>
                    <a href="/posts/{{$post->id}}"
                        > <i class="bi bi-zoom-in"></i
                    > </a>
                </td>
                VARIANTE 1 --}} {{--
                <td>
                    <a href="{{ route('posts.show', $post) }}"></a>
                        <i class="bi bi-zoom-in"></i>
                    </a>
                </td>
                VARIANTE 2 --}} -->
                <td colspan="5">
                    <a href="{{ route('posts.show', $post) }}">
                        <button
                            type="button"
                            class="btn btn-outline-primary btn-sm"
                            data-toggle="modal"
                            data-target=".bd-example-modal-sm"
                        >
                            <i class="bi bi-zoom-in"></i>
                        </button>
                    </a>
                    @if(Auth::check())
                    <a href="{{ route('posts.edit', $post) }}">
                        <button
                            type="button"
                            class="btn btn-outline-primary btn-sm"
                            data-toggle="modal"
                            data-target=".bd-example-modal-sm"
                        >
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    </a>
                    <button
                        type="button"
                        class="btn btn-outline-primary btn-sm"
                        data-toggle="modal"
                        data-target=".bd-example-modal-sm-{{$post->id}}"
                    >
                        <i class="bi bi-x-square"></i>
                    </button>

                    <div
                        class="modal fade bd-example-modal-sm-{{$post->id}}"
                        tabindex="-1"
                        role="dialog"
                        aria-labelledby="mySmallModalLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Cancella</h5>
                                    <button
                                        type="button"
                                        class="close"
                                        data-dismiss="modal"
                                        aria-label="Close"
                                    >
                                        <span aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Sei sicuro di voler cancellare il post?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <form
                                        action="{{
                                            route('posts.destroy', $post)
                                        }}"
                                        method="POST"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            Cancella
                                        </button>
                                    </form>
                                    <button
                                        type="button"
                                        class="btn btn-secondary"
                                        data-dismiss="modal"
                                    >
                                        Chiudi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </form> -->

                    <!-- qui deve aprire una modals di bootstrap e poi mettere il pulsante che abbiamo messo nel cancella lo si mette nell'allert  che esce -->
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            {{$allPosts->links()}}
        </ul>
    </nav>
</div>
@endsection
