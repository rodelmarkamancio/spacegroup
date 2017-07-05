@extends ('dashboard.master')

@section ('content')
<div class="col-sm-8 page-create">
    <div class="blog-post-form">
        <h1>Update a Page</h1>
        
        <form method="POST" action="{{ route('pages_update', $pages->id) }}" enctype="multipart/form-data">
            @include ('layouts.errors')
            @include ('layouts.message')
            {{ csrf_field() }}
            <div class="form-group">
                <label for="photos">Header Background</label><br />
                <input type="file" name="photos[]" multiple />
            </div>
            <div class="form-group">
                <label for="permalinks">Permalinks</label>
                <input type="text" name="permalinks" class="form-control" value="{{ $pages->permalinks }}" id="permalinks" />
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $pages->title }}" id="title" />
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $pages->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-group">
                    <option value="">Select Status</option>
                    <option value="1" {{ ($pages->status == 1 ? "selected" : "") }}>Draft</option>
                    <option value="2" {{ ($pages->status == 2 ? "selected" : "") }}>Publish</option>
                </select>
            </div>
            <div class="form-group"><button type="submit" class="btn btn-primary">Create Page</button></div>
        </form>
    </div>
</div>
@endsection