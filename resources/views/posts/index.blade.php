@extends ('dashboard.master')

@section ('content')
    <div class="col-sm-12 post-list">

        <div class="post-container">
            <a href="{{ route('create_posts') }}" class="btn btn-outline-primary">Create New Post</a>
            <a href="{{ route('your_posts') }}" class="btn btn-outline-primary">Your Post</a>
        </div>
        
        <div class="grid">
            @foreach ($posts as $post)
                @include ('posts.post')
            @endforeach
        </div>

        <nav class="post-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

    </div><!-- /.blog-main -->
@endsection