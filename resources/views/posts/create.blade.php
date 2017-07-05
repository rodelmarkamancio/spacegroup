@extends ('dashboard.master')

@section ('content')
<div class="col-sm-8 blog-main">
    <div class="blog-post-form">
        <h1>Publish a Posts</h1>

        <form method="POST" action="/posts" enctype="multipart/form-data">
            @include ('layouts.errors')
            @include ('layouts.message')
            {{ csrf_field() }}
            <div class="form-group">
                <label for="photos">Header Background</label><br />
                <input type="file" name="photos[]" multiple />
            </div>
            <div class="form-group">
                <label for="categories">Categories</label>
                <select class="js-example-basic-multiple" name="categories[]" multiple="multiple" class="form-control">
                    @foreach ($cat as $c)
                        <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" />
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="textarea1" class="form-control"></textarea>
            </div>
            <div class="form-group"><button type="submit" class="btn btn-primary">Publish</button></div>
        </form>
    </div>
</div>
@endsection