<?php
if (!function_exists('userRole')) {
    function userRole()
    {
        return auth()->user()->role;
    }
}
