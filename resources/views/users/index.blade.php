@extends ('dashboard.master')

@section ('content')
    <div class="col-sm-12 users-list">

        <div class="post-container">
            <a href="{{ route('users_posts') }}" class="btn btn-outline-primary">Create New User</a>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $role)
                                @foreach ($role->users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <a href="{{ route('edit_users', $user->id) }}" class="nav-link"><i class="fa fa-fw fa-edit"></i></a>
                                            <a href="{{ route('delete_users', $user->id) }}" class="nav-link"><i class="fa fa-fw fa-remove"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

    </div><!-- /.blog-main -->
@endsection