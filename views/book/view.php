<div id='book' >
    <h1><?=$book[ 0 ][ 'title' ];?></h1>
    <p id='text' >
    <?php
        $final = "";

        foreach ( $temp as $word ) {
            echo " <span>$word</span>";
        }
    ?>
    </p>
</div>
<div id='bubble'>
    <div id='comment'>
    </div>
</div>
