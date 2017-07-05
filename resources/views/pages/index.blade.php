@extends ('dashboard.master')

@section ('content')
    <div class="col-sm-12 users-list">

        <div class="page-container">
            <a href="{{ route('pages_create') }}" class="btn btn-outline-primary">Create New Page</a>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Data Table Example
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Created On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page)
                                <tr id="parent-{{ $page->id }}">
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->description }}</td>
                                    <td>
                                        @if ($page->status == 1)
                                            Draft
                                        @else
                                            Publish
                                        @endif
                                    </td>
                                    <td>{{ $page->created_at->toDayDateTimeString() }}</td>
                                    <td>
                                        <a href="{{ route('pages_edit', $page->id) }}" class="nav-link"><i class="fa fa-fw fa-edit"></i></a>
                                        <a href="{{ route('pages_delete', $page->id) }}" id="{{ $page->id }}" data-method="DELETE" class="nav-link delete-btn"><i class="fa fa-fw fa-remove"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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