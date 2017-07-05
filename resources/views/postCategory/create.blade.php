@extends ('dashboard.master')

@section ('content')
<div class="col-sm-8 blog-main">
    <div class="blog-post-form">
        <h1>Create a Category</h1>

        <form method="POST" action="{{ route('posts_cat_store') }}">
            @include ('layouts.errors')
            @include ('layouts.message')
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" name="category_name" class="form-control" id="category_name" required />
            </div>
            <div class="form-group">
                <label for="category_slug">Category Slug</label>
                <input type="text" name="category_slug" class="form-control" id="category_slug" required />
            </div>
            <div class="form-group"><button type="submit" class="btn btn-primary">Create Category</button></div>
        </form>
    </div>
</div>
@endsection