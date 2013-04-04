<?php

class Watermark
{
    var $blockDepth;
    
    function compare_block_deep($a, $b)
    {
        return strcmp($a->blockDepth, $b->blockDepth);
    }
}
?>
