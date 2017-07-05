@extends ('dashboard.master')

@section ('content')
    <div class="col-sm-12 users-list">

        <div class="post-container">
            <a href="{{ route('posts_cat_create') }}" class="btn btn-outline-primary">Create New Category</a>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Data Table Example
            </div>
            <div class="card-block">
                <div class="table-responsive">

                    @if ($message = Session::get('flash_message'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Category Slug</th>
                                <th>Count</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cat as $c)
                                <tr id="parent-{{ $c->id }}">
                                    <td>{{ $c->category_name }}</td>
                                    <td>{{ $c->category_slug }}</td>
                                    <td>{{ $c->total_posts }}</td>
                                    <td>
                                        <a href="{{ route('posts_cat_edit', $c->id) }}" class="nav-link"><i class="fa fa-fw fa-edit"></i></a>
                                        <a href="{{ route('posts_cat_delete', $c->id) }}" id="{{ $c->id }}" data-method="DELETE" class="nav-link delete-btn"><i class="fa fa-fw fa-remove"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

    </div><!-- /.blog-main -->
@endsection

@section ('footerjs')
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '.delete-btn', function(e) {
        var $this = $(this),
            $id = $(this).attr('id');

        if (confirm('Are you sure you want to delete this post?')) {
            $.post({
                type: $this.data('method'),
                url: $this.attr('href')
            }).done(function (data) {
                $('#parent-' + $id).slideUp(300, function() {
                    $(this).remove();
                });
            }).fail(function (data) {
                console.log(data);  
            });
        }

        e.preventDefault();
    });
    </script>
@endsection