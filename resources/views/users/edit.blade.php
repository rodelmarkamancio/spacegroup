@extends ('dashboard.master')

@section ('content')

    <div class="col-sm-8">
        <h1>Update a User</h1>
        {{-- UNFINISHED --}}
        
        <form method="POST" action="{{ route('update_users', $users[0]->id) }}">
            @include ('layouts.errors')
            @include ('layouts.message')
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" value="{{ $users[0]->name }}" name="name" required />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" value="{{ $users[0]->email }}" name="email" required />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" value="{{ $users[0]->password }}" name="password" required />
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="">Select a Role</option>
                    <option value="1" @if ($users[0]->slug == 'admin') selected @endif>Admin</option>
                    <option value="2" @if ($users[0]->slug == 'user') selected @endif>Default User</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update User</button>
            </div>
        </form>
    </div>

@endsection