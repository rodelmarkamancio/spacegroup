<div class="col-sm-3 menu-list-left">
    <form class="menu-category form-import-pages">
        <div class="menu-container">
            <input type="radio" name="size" id="small" value="small" checked="checked" /> 
            <label for="small">Import Pages</label>
            <article>
                <ul>
                    @foreach ($pages as $page)
                        <li>
                            <input type="checkbox" name="page_title" class="page-title" value="{{ $page->id }}" data-menu-id="{{ $menu->id }}" data-title="{{ $page->title }}" /><span>{{ $page->title }}</span>
                        </li>
                    @endforeach
                </ul>
                <button type="button" class="btn btn-primary btn-import-pages">Add to Menu</button>
            </article>
        </div>
        <div class="menu-container">
            <input type="radio" name="size" id="medium" value="medium" />     
            <label for="medium">Custom Links</label>
            <article>
                <h2>Coming soon</h2>
            </article>    
        </div>
    </form>
</div>