<?php
/**
 * Dump and Die variable or whatever
 *
 * @param $dump Variable to dump
 *
 * @return void
 */
function dd($dump)
{
    echo "<pre>";
    var_export($dump);
    echo "</pre>";
    die();
}