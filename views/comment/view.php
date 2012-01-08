<?php
    if ( isset( $comment[ 0 ] ) ) {
?>
<div id='hidden'><?=$comment[ 0 ][ 'text' ];?></div>
<input type='text' value='<?=$comment[ 0 ][ 'text' ];?>' />
<?php
    }
?>
