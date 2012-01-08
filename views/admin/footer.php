        <script type='text/javascript'>
            var saveId = 0;
            $( "#form_login" ).submit( function() {
                var input = $( this ).children( 'input' );
                var user = input[ 0 ].value;
                var pass = input[ 1 ].value;

                $.post( 'session/create', {
                    user: user,
                    pass: pass
                }, function( response ) {
                    if ( response == 1 ) {
                        window.location = 'admin';
                    }
                    else {
                        alert( 'Invalid username or password' );
                    }
                } );
                return false;
            } );

            $( "#alogout" ).click( function() {
                $.post( "session/delete", {}, function() { window.location = 'admin'; } );
                return false;
            } );

            $( "#added a#add_new" ).live( "click", function() {
                saveId = 0;
                $( "#preview input" ).val( "New title" );
                $( "#preview textarea" ).val( "" );
                return false;
            } );

            $( "#added ul li a" ).live( "click", function() {
                var id = this.parentNode.id.split( "book_" )[ 1 ];
                saveId = id;
                $.post( 'book/item', {
                    id: id
                }, function( response ) {
                    var title = response.split( "@@" )[ 0 ];
                    var text = response.split( "@@" )[ 1 ];

                    $( "#preview input" ).val( title );
                    $( "#preview textarea" ).val( text );
                } );

                return false;
            } );

            $( "#preview #book_save" ).click( function() {
                var title = $( "#preview input" ).val();
                var text = $( "#preview textarea" ).val();
                $( "#overlay" ).show();

                if ( saveId == 0 ) {
                    $.post( 'book/create', {
                        title: title,
                        text: text
                    }, function( response ) {
                        loadBooks();
                        $( "#overlay" ).hide();
                    } );
                }
                else {
                    $.post( 'book/update', {
                        title: title,
                        text: text,
                        id: saveId
                    }, function( response ){ 
                        loadBooks();
                        $( "#overlay" ).hide();
                    });
                }

                return false;
            } );

            $( "#book_delete" ).click( function() {
                var answer = confirm( "Are you sure you want to delete this book?" );

                if ( answer ) {
                    $( "#overlay" ).show();
                    $.post( 'book/delete', {
                        id: saveId
                    }, function( response ) {
                        $( "#preview input" ).val( "" );
                        $( "#preview textarea" ).val( "" );
                        $( "#overlay" ).hide();
                        loadBooks();
                    } );
                }
                return false;
            } );

        </script>
    </body>
</html>
