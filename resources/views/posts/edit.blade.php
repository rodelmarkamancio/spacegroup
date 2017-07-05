@extends ('dashboard.master')

@section ('content')
<div class="col-sm-8 post-update-container">
    <div class="blog-post-form">
        <h1>Update a Posts</h1>
        
        <form method="POST" action="{{ route('update_posts', $post->id) }}" enctype="multipart/form-data">
            @include ('layouts.errors')
            @include ('layouts.message')
            {{ csrf_field() }}
            <div class="post-list-content">
                <ul class="post-list">
                    @foreach ($post->photos as $photo)
                        <li>
                            <img class="card-img-top img-fluid w-100" src="{{ route('storage', $photo->filename) }}" alt="" />
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="form-group">
                <label for="categories">Categories</label>
                <select class="js-example-basic-multiple" name="categories[]" multiple="multiple" class="form-control">
                    @foreach ($cat as $c)
                        @foreach ($myCat as $mc)
                            <option value="{{ $c->id }}" @if ($mc->category_id == $c->id) selected @endif>{{ $c->category_name }}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="photos">Header Background</label><br />
                <input type="file" name="photos[]" multiple />
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}" id="title" />
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="textarea1" class="form-control">{{ $post->body }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Publish</button>
                <a href="{{ route('delete_posts', $post->id) }}" data-method="DELETE" class="btn btn-primary delete-btn">Delete</a>
            </div>
        </form>
    </div>
</div>

@endsection

@section ('footerjs')
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '.delete-btn', function(e) {
        var $this = $(this);

        if (confirm('Are you sure you want to delete this post?')) {
            $.post({
                type: $this.data('method'),
                url: $this.attr('href')
            }).done(function (data) {
                console.log(data);
            }).fail(function (data) {
                console.log(data);  
            });
            window.location.href = "{{ route('your_posts') }}";
        }

        e.preventDefault();
    });
    </script>
@endsection