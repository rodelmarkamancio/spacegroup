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
                        @foreach ($menu as $m)
                            <option value="{{ route('menu_edit', $m->id) }}">{{ $m->menu_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row menu-list-cat">
            <div class="col-sm-3 menu-list-left">
                <form class="menu-category">
                    <div class="menu-container">
                        <input type="radio" name="size" id="small" value="small" checked="checked" /> 
                        <label for="small">Import Pages</label>
                        <article>
                            <ul>
                                @foreach ($pages as $page)
                                    <li>
                                        <input type="checkbox" name="page_title" value="{{ $page->id }}" /><span>{{ $page->title }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <button class="btn btn-primary">Add to Menu</button>
                        </article>
                    </div>
                    <div class="menu-container">
                        <input type="radio" name="size" id="medium" value="medium" />     
                        <label for="medium">Custom Links</label>
                        <article><p>You see? It's curious. Ted did figure it out - time travel. And when we get back, we gonna tell everyone. How it's possible, how it's done, what the dangers are. But then why fifty years in the future when the spacecraft encounters a black hole does the computer call it an 'unknown entry event'? Why don't they know? If they don't know, that means we never told anyone. And if we never told anyone it means we never made it back. Hence we die down here. Just as a matter of deductive logic.</p>
                        </article>    
                    </div>
                </form>
            </div>
            <div class="col-sm-9 menu-list-right">
                <ul id="sTree2">
                    {{-- <li>
                        <div>Whatever you want here</div>
                        <ul>
                            <li><div>Nested list item</div></li>
                            <li><div>Another item</div></li>
                        </ul>
                    </li> --}}
                </ul>
            </div>
        </div>

    </div><!-- /.blog-main -->
@endsection