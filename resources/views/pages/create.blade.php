@extends ('dashboard.master')

@section ('content')
<div class="col-sm-8 page-create">
    <div class="blog-post-form">
        <h1>Create a Page</h1>

        <form method="POST" action="{{ route('pages_store') }}" enctype="multipart/form-data">
            @include ('layouts.errors')
            @include ('layouts.message')
            {{ csrf_field() }}
            <div class="form-group">
                <label for="photos">Header Background</label><br />
                <input type="file" name="photos[]" multiple />
            </div>
            <div class="form-group">
                <label for="permalinks">Permalinks</label>
                <input type="text" name="permalinks" class="form-control" id="permalinks" />
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" />
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-group">
                    <option value="">Select Status</option>
                    <option value="1">Draft</option>
                    <option value="2">Publish</option>
                </select>
            </div>
            <div class="form-group"><button type="submit" class="btn btn-primary">Create Page</button></div>
        </form>
    </div>
</div>
@endsection