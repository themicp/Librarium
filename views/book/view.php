<script type='text/javascript'>
    <?php
        for ( $i = 0; $i < count( $categories ); ++$i ) {
            if ( $categories[ $i ][ 'id' ] == $book[ 0 ][ 'category' ] ) {
                $catId = $i;
                break;
            }
        }
    ?>
    var dict = "<?=$categories[ $catId ][ 'dictionary' ];?>";
</script>
<div id='book' >
    <h1><?=$book[ 0 ][ 'title' ];?></h1>
    <p id='text' >
    <?php
        $final = "";

        foreach ( $temp as $word ) {
            $word = str_replace( "\n", "</span><br /><span>", $word );
            echo " <span>$word</span>";
        }
    ?>
    </p>
</div>
<div id='disable'>
</div>
<div id='bubble'>
    <div id='comment'>
    </div>
</div>
<div id='dict'>
    <a href='' target='_blank' >Λεξικό</a>
</div>
