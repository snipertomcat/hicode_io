<?php
session_start();
if (!function_exists('cache_search')) {
    function cache_search($string) {
        if ($_SESSION['search_cache']) {
            return $_SESSION['search_cache'];
        } else {
            return false;
        }
    }
}

if (!function_exists('cache_search_save')) {
    function cache_search_save($urlString, $data) {
        $_SESSION['search_cache'] = $data;
    }
}