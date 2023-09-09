<?php
function src($file_name, $type = "full")
{
    $path = './uploads/images/manipulated';

    if ($type != 'full') {
        $path .= $type . '/';
    }
    return $path . $file_name;
}
