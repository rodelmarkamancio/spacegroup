@extends ('dashboard.master')

@section('content')
    <!-- Icon Cards -->
    {{-- <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card card-inverse card-primary o-hidden h-100">
                <div class="card-block">
                    <div class="card-block-icon">
                        <i class="fa fa-fw fa-comments"></i>
                    </div>
                    <div class="mr-5">
                        26 New Messages!
                    </div>
                </div>
                <a href="#" class="card-footer clearfix small z-1">
                    <span class="float-left">View Details</span>
                    <span class="float-right"><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card card-inverse card-success o-hidden h-100">
                <div class="card-block">
                    <div class="card-block-icon">
                        <i class="fa fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5">
                        11 New Tasks!
                    </div>
                </div>
                <a href="#" class="card-footer clearfix small z-1">
                    <span class="float-left">View Details</span>
                    <span class="float-right"><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card card-inverse card-warning o-hidden h-100">
                <div class="card-block">
                    <div class="card-block-icon">
                        <i class="fa fa-fw fa-shopping-cart"></i>
                    </div>
                    <div class="mr-5">
                        123 New Orders!
                    </div>
                </div>
                <a href="#" class="card-footer clearfix small z-1">
                    <span class="float-left">View Details</span>
                    <span class="float-right"><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card card-inverse card-danger o-hidden h-100">
                <div class="card-block">
                    <div class="card-block-icon">
                        <i class="fa fa-fw fa-support"></i>
                    </div>
                    <div class="mr-5">
                        13 New Tickets!
                    </div>
                </div>
                <a href="#" class="card-footer clearfix small z-1">
                    <span class="float-left">View Details</span>
                    <span class="float-right"><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
        </div>
    </div> --}}

    <!-- Example Tables Card -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Users
        </div>
        <div class="card-block users-list">
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
                        {{-- @foreach ($users as $role)
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
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
        </div>
    </div>
@endsection