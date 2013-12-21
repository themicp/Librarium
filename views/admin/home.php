<?php
    include '../views/admin/header.php';
?>
        <div id='overlay'>
        <img src='images/ajax-loader.gif' />
        </div>
        <div id='admin_main' >
            <a href='#' id='alogout' >Logout</a>
            <div id='added'>
            </div>
            <div id='preview'>
                <input type='text' value='' />
                <select>
                </select>
                <textarea></textarea>
                <div id='book_options'>
                    <a href='#' id='book_save' >Save</a>
                    <a href='#' id='book_delete' >Delete</a>
                </div>
            </div>

            <div class='clear' ></div>
        </div>

        <script type='text/javascript' >
            function loadBooks() {
                $.post( 'book/listing', {
                    initial: false
                }, function( response ) {
                    response += "<a id='add_new'href='#'>Add</a>";
                    $( "#added" ).html( response );
                } );
            }
            function loadCategories() {
                $.post( 'category/listing', {
                }, function( response ) {
                    response = JSON.parse( response );
                    for ( var i = 0; i < response.length; ++i ) {
                        $( '#preview select' ).append( $( '<option>' ).attr( {
                            id: 'cat' + response[ i ].id,
                            value: response[ i ].id
                        } ).text( response[ i ].title ) );
                    }
                } );
            }

            loadBooks();
            loadCategories();
        </script>
<?php
    include '../views/admin/footer.php';
?>
