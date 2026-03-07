<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
if (have_posts())
{
    while (have_posts())
    {
        the_post();
        the_content();
    }
}