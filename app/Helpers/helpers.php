<?php

// use Illuminate\Http\Request;

/**
 * Return active if current path begins with path.
 *
 * @param string $path
 * @return string
 */
function set_active($uri, $output = 'active') {
if( is_array($uri) ) {
    foreach ($uri as $u) {
        if (Route::is($u)) {
        return $output;
        }
    }
} else {
    if (Route::is($uri)){
        return $output;
    }
}
}
