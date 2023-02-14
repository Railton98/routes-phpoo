<?php

use app\support\Flash;

function flash(string $index, string $css = '')
{
    $message = Flash::get($index);

    return "<span class='$css'>$message</span>";
}
