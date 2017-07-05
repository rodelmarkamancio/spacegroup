@if (Session::has('flash_message'))
    <div class="alert alert-success">
        <span class="glyphicon glyphicon-ok"></span>
        <em> {!! session('flash_message') !!}</em>
    </div>
@endif