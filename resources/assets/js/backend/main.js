$(document).ready(function() {
    $('.grid').masonry({
        // options...
        itemSelector: '.card-columns-posts',
        columnWidth: 500
    });

    $(".js-example-basic-multiple").select2();

    // Sortable Lists for MENU
    ////
    var options = {
		placeholderCss: {'background-color': '#ff8'},
		hintCss: {'background-color':'#bbf'},
        onChange: function( cEl )
        {
            $('.menu-configuration .menu-sort-id').each(function (i) {
                var num = i + 1;
                $(this).val(num);
            });
            console.log( 'onChange' );
        },
        complete: function( cEl )
        {
            console.log( 'complete' );
        },
		isAllowed: function( cEl, hint, target )
		{
			if (target.data('module') === 'c' && cEl.data('module') !== 'c') {
				hint.css('background-color', '#ff9999');
				return false;
			} else {
				hint.css('background-color', '#99ff99');
				return true;
			}
		},
		opener: {
            active: true,
            as: 'html', 
            close: '<i class="fa fa-minus c3"></i>',  
            open: '<i class="fa fa-plus"></i>', 
            openerCss: {
                'display': 'inline-block',
                'float': 'left',
                'margin-left': '-35px',
                'margin-right': '5px',
                'font-size': '1.1em'
            }
		},
		ignoreClass: 'clickable'
	};
    $('#sTree2').sortableLists( options );

    // Adding pgaes to menu
    ///
    $(document.body).on('click', '.btn-import-pages', function() {
        $('.form-import-pages .page-title:checked').each(function(i) {
            var num,
                parent = $('.menu-configuration'),
                lastKey = Number(parent.find('li.last').find('.menu-sort-id').val());

            console.log(parent.find('li.last').find('.menu-sort-id').val());
            if (parent.find('li.last').length) {
                num = lastKey + 1;
            } else {
                num = i + 1;
            }

            $('.menu-configuration').append(
                '<li>' +
                    '<div class="menu-config-wrapper">' + 
                        $(this).data('title') + 
                        '<input type="hidden" name="input' + num + '[page_id]" class="menu-page-id" value="' + $(this).val() + '" />' +
                        '<input type="hidden" name="input' + num + '[sort_id]" class="menu-sort-id" value="' + num + '" />' +
                        '<input type="hidden" name="input' + num + '[menu_id]" class="menu-id" value="' + $(this).data('menu-id') + '" />' +
                    '</div>' + 
                '</li>'
            );
            $(this).prop('checked', false);
        });
    });

    // selecting a menu
    ///
    $('#select-menu').on('change', function() {
        window.location.href = $(this).val();
    });
});