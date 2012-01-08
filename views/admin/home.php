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

            loadBooks();
        </script>
<?php
    include '../views/admin/footer.php';
?>
