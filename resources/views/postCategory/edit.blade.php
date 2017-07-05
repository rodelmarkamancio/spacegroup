@extends ('dashboard.master')

@section ('content')
<div class="col-sm-8 blog-main">
    <div class="blog-post-form">
        <h1>Update a Category</h1>
        
        <form method="POST" action="{{ route('posts_cat_update', $category[0]->id) }}">
            @include ('layouts.errors')
            @include ('layouts.message')
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" name="category_name" class="form-control" id="category_name" value="{{ $category[0]->category_name }}" required /> 
            </div>
            <div class="form-group">
                <label for="category_slug">Category Slug</label>
                <input type="text" name="category_slug" class="form-control" id="category_slug" value="{{ $category[0]->category_slug }}" required />
            </div>
            <div class="form-group"><button type="submit" class="btn btn-primary">Update Category</button></div>
        </form>
    </div>
</div>
@endsection