@extends ('dashboard.master')

@section('content')
    <!-- Icon Cards -->
    <div class="row">
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
    </div>

    <div class="row">

        <div class="col-lg-8">

            <!-- Card Columns Example Social Feed -->
            <div class="card-columns">

                <!-- Example Social Card -->
                <div class="card mb-3">
                    <a href="#">
                        <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=610" alt="">
                    </a>
                    <div class="card-block">
                        <h6 class="card-title mb-1"><a href="#">David Miller</a></h6>
                        <p class="card-text small">These waves are looking pretty good today! <a href="#">#surfsup</a></p>
                    </div>
                    <hr class="my-0">
                    <div class="card-block py-2 small">
                        <a class="mr-3 d-inline-block" href="#">
                            <i class="fa fa-fw fa-thumbs-up"></i> Like
                        </a>
                        <a class="mr-3 d-inline-block" href="#">
                            <i class="fa fa-fw fa-comment"></i> Comment
                        </a>
                        <a class="d-inline-block" href="#">
                            <i class="fa fa-fw fa-share"></i> Share
                        </a>
                    </div>
                    <hr class="my-0">
                    <div class="card-block small bg-faded">
                        <div class="media">
                            <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                            <div class="media-body">
                                <h6 class="mt-0 mb-1"><a href="#">John Smith</a></h6> Very nice! I wish I was there! That looks amazing!
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <a href="#">Like</a>
                                    </li>
                                    <li class="list-inline-item">
                                        ·
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">Reply</a>
                                    </li>
                                </ul>
                                <div class="media mt-3">
                                    <a class="d-flex pr-3" href="#">
                                        <img src="http://placehold.it/45x45" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1"><a href="#">David Miller</a></h6> Next time for sure!
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="#">Like</a>
                                            </li>
                                            <li class="list-inline-item">
                                                ·
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Reply</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">
                        Posted 32 mins ago
                    </div>
                </div>

                <!-- Example Social Card -->
                <div class="card mb-3">
                    <a href="#">
                        <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=180" alt="">
                    </a>
                    <div class="card-block">
                        <h6 class="card-title mb-1"><a href="#">John Smith</a></h6>
                        <p class="card-text small">Another day at the office... <a href="#">#workinghardorhardlyworking</a></p>
                    </div>
                    <hr class="my-0">
                    <div class="card-block py-2 small">
                        <a class="mr-3 d-inline-block" href="#">
                            <i class="fa fa-fw fa-thumbs-up"></i> Like
                        </a>
                        <a class="mr-3 d-inline-block" href="#">
                            <i class="fa fa-fw fa-comment"></i> Comment
                        </a>
                        <a class="d-inline-block" href="#">
                            <i class="fa fa-fw fa-share"></i> Share
                        </a>
                    </div>
                    <hr class="my-0">
                    <div class="card-block small bg-faded">
                        <div class="media">
                            <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                            <div class="media-body">
                                <h6 class="mt-0 mb-1"><a href="#">Jessy Lucas</a></h6> Where did you get that camera?! I want one!
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <a href="#">Like</a>
                                    </li>
                                    <li class="list-inline-item">
                                        ·
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">Reply</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">
                        Posted 46 mins ago
                    </div>
                </div>

                <!-- Example Social Card -->
                <div class="card mb-3">
                    <a href="#">
                        <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=281" alt="">
                    </a>
                    <div class="card-block">
                        <h6 class="card-title mb-1"><a href="#">Jeffery Wellings</a></h6>
                        <p class="card-text small">Nice shot from the skate park! <a href="#">#kickflip</a> <a href="#">#holdmybeer</a> <a href="#">#igotthis</a></p>
                    </div>
                    <hr class="my-0">
                    <div class="card-block py-2 small">
                        <a class="mr-3 d-inline-block" href="#">
                            <i class="fa fa-fw fa-thumbs-up"></i> Like
                        </a>
                        <a class="mr-3 d-inline-block" href="#">
                            <i class="fa fa-fw fa-comment"></i> Comment
                        </a>
                        <a class="d-inline-block" href="#">
                            <i class="fa fa-fw fa-share"></i> Share
                        </a>
                    </div>
                    <div class="card-footer small text-muted">
                        Posted 1 hr ago
                    </div>
                </div>

                <!-- Example Social Card -->
                <div class="card mb-3">
                    <a href="#">
                        <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=185" alt="">
                    </a>
                    <div class="card-block">
                        <h6 class="card-title mb-1"><a href="#">David Miller</a></h6>
                        <p class="card-text small">It's hot, and I might be lost... <a href="#">#desert</a> <a href="#">#water</a> <a href="#">#anyonehavesomewater</a> <a href="#">#noreally</a> <a href="#">#thirsty</a> <a href="#">#dehydration</a></p>
                    </div>
                    <hr class="my-0">
                    <div class="card-block py-2 small">
                        <a class="mr-3 d-inline-block" href="#">
                            <i class="fa fa-fw fa-thumbs-up"></i> Like
                        </a>
                        <a class="mr-3 d-inline-block" href="#">
                            <i class="fa fa-fw fa-comment"></i> Comment
                        </a>
                        <a class="d-inline-block" href="#">
                            <i class="fa fa-fw fa-share"></i> Share
                        </a>
                    </div>
                    <hr class="my-0">
                    <div class="card-block small bg-faded">
                        <div class="media">
                            <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                            <div class="media-body">
                                <h6 class="mt-0 mb-1"><a href="#">John Smith</a></h6> The oasis is a mile that way, or is that just a mirage?
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <a href="#">Like</a>
                                    </li>
                                    <li class="list-inline-item">
                                        ·
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">Reply</a>
                                    </li>
                                </ul>
                                <div class="media mt-3">
                                    <a class="d-flex pr-3" href="#">
                                        <img src="http://placehold.it/45x45" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1"><a href="#">David Miller</a></h6>
                                        <img class="img-fluid w-100 mb-1" src="https://unsplash.it/700/450?image=789" alt=""> I'm saved, I found a cactus. How do I open this thing?
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="#">Like</a>
                                            </li>
                                            <li class="list-inline-item">
                                                ·
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Reply</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">
                        Posted yesterday
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Example Tables Card -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Data Table Example
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
        <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
        </div>
    </div>
@endsection