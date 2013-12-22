var edit = 0;
var word;

function save( e ) {
    $( "#bubble" ).css( "display", "none" );

    var comment = $( "#comment input" ).val();

    if ( word == "" || word == undefined ) {
        console.log( "empty string" );
        return false;
    }

    $( "#text" ).css( "color", "grey" );
    $( "#disable" ).show();
    $.post( "comment/update", {
        word: word,
        text: comment
    }, function( response ) {
        console.log( "Word - " + word );
        word = "";
        $( "#disable" ).hide();
        $( "#text" ).css( "color", "black" );
        if ( e != undefined ) {
            bubble( e );
        }
    } );
}

function bubble( e ) {
    var offset = $( e ).offset();
    word = $( e ).text();
    $.post( 'comment/view', {
        word: $( e ).text()
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

}

$( document ).bind( "click", function( e ) {
    if ( e.which == 3 ) { //cancel the event if it occurs from a right click
        return false;
    }
    save();
    $( "#dict" ).hide();
} );

$( "#bubble" ).bind( "click", function( e ) { e.stopPropagation(); } );

$( "#text span" ).bind( "click", function( e ) {
    if ( word != "" && word != undefined ) {
        save( this );
    }
    else {
        bubble( this );
    }
    return false;
} );

$( "#text span" ).bind( 'contextmenu', function( e ) {
    var word = $( this ).text();
    var pattern = /[a-z|A-Z|\ ]/g;
    var offset = $( this ).offset();
    word = word.match( pattern );
    word = word.join( "" );
    $( "#dict a" ).attr( "href", dict + word.toLowerCase() );
    $( "#dict" ).css( "left", offset.left + "px" );
    $( "#dict" ).css( "top", offset.top*1 + 20*1 + "px" );
    $( "#dict" ).show();
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
    } );

    return false;
} );
