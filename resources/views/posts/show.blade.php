@extends ('dashboard.master')

@section ('content')
    <div class="col-sm-8 blog-main">
        <div class="card-columns card-columns-posts">
            <!-- Example Social Card -->
            <div class="card mb-3">
                <a href="{{ route('display_posts', ['id' => $post->id]) }}">
                @foreach ($post->photos as $photo)
                    <img class="card-img-top img-fluid w-100" src="{{ route('storage', $photo->filename) }}" alt="">
                @endforeach
                </a>
                <div class="card-block">
                    <h6 class="card-title mb-1">
                        <a href="{{ route('display_posts', ['id' => $post->id]) }}">{{ $post->user->name }}</a>
                    </h6>
                    <p class="card-text small">{{ $post->title }}</p>
                </div>
                <hr class="my-0">
                <div class="card-block py-2 small">
                    <a class="mr-3 d-inline-block" href="#">
                        <i class="fa fa-fw fa-thumbs-up"></i> Like
                    </a>
                    <a class="mr-3 d-inline-block" href="#">
                        <i class="fa fa-fw fa-comment"></i> Comment
                    </a>
                    <a class="d-inline-block" href="#">
                        <i class="fa fa-fw fa-share"></i> Share
                    </a>
                </div>
                <hr class="my-0">
                <div class="card-block small bg-faded">
                    <div class="media">
                        <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                        <div class="media-body">
                            @foreach ($post->comments as $comment)
                                <li class="list-group-item">
                                    <div class="comment-info">
                                        <h6 class="mt-0 mb-1">
                                            <a href="#">{{ $comment->user->name }}</a>
                                        </h6>
                                        {{ $comment->body }}
                                    </div>
                                    <span class="comment-time">{{ $comment->created_at->diffForHumans() }}</span>
                                </li>
                            @endforeach
                            {{-- <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a href="#">Like</a>
                                </li>
                                <li class="list-inline-item">
                                    ·
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Reply</a>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
                <div class="card-footer small text-muted">
                    Posted {{ $post->created_at->diffForHumans() }}
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                @include ('layouts.errors')
                <form method="POST" action="/posts/{{ $post->id }}/comments">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="body" id="" cols="30" rows="10" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection