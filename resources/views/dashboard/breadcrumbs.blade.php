<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">
        @if (Route::currentRouteNamed('dashboard'))
            My Dashboard
        @elseif (Route::currentRouteNamed('menu'))
            My Menu
        @elseif (Route::currentRouteNamed('list_posts'))
            Users
        @elseif (Route::currentRouteNamed('posts'))
            My Posts
        @elseif (Route::currentRouteNamed('posts_cat'))
            My Category
        @elseif (Route::currentRouteNamed('pages'))
            My Pages
        @elseif (Route::currentRouteNamed('dashboard_home'))
            Edit Homepage
        @endif
    </li>
</ol>