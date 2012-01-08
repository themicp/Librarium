var edit = 0;
var word;

$( document ).click( function() {
    $( "#bubble" ).css( "display", "none" );

    var comment = $( "#comment input" ).val();

    if ( word == "" ) {
        console.log( "dfsdfsdf" );
        return false;
    }

    $.post( "comment/update", {
        word: word,
        text: comment
    }, function( response ) {
        console.log( response );
        word = "";
    } );
} );

$( "#bubble" ).bind( "click", function( e ) { e.stopPropagation(); } );

$( "#text span" ).bind( "click", function( e ) {
    var offset = $( this ).offset();
    word = $( this ).text();
    $.post( 'comment/view', {
        word: $( this ).text()
    }, function( response ) {
        $( "#bubble" ).show();
        $( "#comment" ).html( response );
        $( "#bubble" ).css( "left", offset.left + "px" );
        $( "#bubble" ).css( "top", offset.top - $( "#comment" ).height() - 12 + "px" );
        $( "#comment input" ).width( $( "#hidden" ).width() + "px" );
        if ( response == "" ) {
            $( "#comment" ).html( '<input type="text" />' );
            $( "#comment input" ).width( 100 + 'px' );
            $( "#bubble" ).css( "top", offset.top - $( "#comment" ).height() - 12 + "px" );
        }
    } );

    return false;
} );

$( "form" ).submit( function() {
    $.post( 'save.php', {
        word: $( "#word" ).val(),
        text: $( "form input[ type=text ]" ).val()
    }, function( response ) {
        alert( "Saved." );
        $( "form input[ type=text ]" ).val( "" );

        $.post( 'load.php', {
            word: $( "#word" ).val()
        }, function( response ) {
            $( "#comments" ).text( response );
        } );

        console.log( response );
    } );

    return false;
} );
