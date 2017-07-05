@extends ('dashboard.master')

@section ('content')

    <div class="col-sm-8">
        <h1>Add a User</h1>

        <form method="POST" action="{{ route('add_users') }}">
            @include ('layouts.errors')
            @include ('layouts.message')
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required />
            </div>
            <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required />
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="">Select a Role</option>
                    <option value="1">Admin</option>
                    <option value="2">Default User</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add User</button>
            </div>
        </form>
    </div>

@endsection