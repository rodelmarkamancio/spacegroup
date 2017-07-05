@extends ('dashboard.master')

@section ('content')
    <div class="col-sm-12 menu-list">

        <div class="page-container">
            @include ('layouts.errors')
            @include ('layouts.message')
            <div class="row">
                <div class="col-sm-4">
                    <form action="{{ route('menu_store') }}" method="post" class="form-inline">
                        {{ csrf_field() }}
                        <div class="form-group"><input type="text" name="menu_name" placeholder="Menu Name" id="menu" class="form-control" required /></div>
                        <button type="submit" class="btn btn-primary">Create Menu</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <select name="select-menu" id="select-menu" class="select-menu form-control">
                        <option value="">Select Menu</option>
                        @foreach ($menuAll as $m)
                            <option value="{{ route('menu_edit', $m->id) }}">{{ $m->menu_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row menu-list-cat">
            @include ('menu.menu-list-left')
            <div class="col-sm-9 menu-list-right">
                {{-- <h2>{{ $menu->menu_name }}</h2> --}}
                @forelse ($menulist as $item)
                    <form action="{{ route('menu_updateStorelist', $menu->id) }}" method="post"> 
                @empty
                    <form action="{{ route('menu_storelist') }}" method="post"> 
                @endforelse
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="menu_name[]" value="{{ $menu->menu_name }}" class="form-control" />
                    </div>
                    <ul id="sTree2" class="menu-configuration clickable">
                        @foreach ($menulist as $key => $menu)
                            <li id="parent-{{ $menu->menu_list_id }}" class="clickable {{ $loop->last ? 'last' : '' }}">
                                <div class="menu-config-wrapper">
                                    {{ $menu->title }}
                                    <input type="hidden" name="input{{ $key + 1 }}[page_id]" class="menu-page-id" value="{{ $menu->page_id }}" />
                                    <input type="hidden" name="input{{ $key + 1 }}[sort_id]" class="menu-sort-id" value="{{ $menu->sort_id }}" />
                                    <input type="hidden" name="input{{ $key + 1 }}[menu_id]" class="menu-id" value="{{ $menu->menu_id }}" />
                                    <input type="hidden" name="input{{ $key + 1 }}[id]" class="menu-list-id" value="{{ $menu->menu_list_id }}" />
                                    <a href="#" id="{{ $menu->menu_list_id }}" data-method="DELETE" class="remove-btn"><i class="fa fa-fw fa-remove"></i></a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" name="active-menu[]" value="1" {{ ($menu->is_active == 1 ? "checked" : "") }} aria-label="Active menu" />
                        </span>
                        <span class="active-menu-label">Active menu</span>
                    </div>
                    <button class="btn btn-primary">Save Menu</button>
                </form>
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
    $(document).on('click', '.remove-btn', function(e) {
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