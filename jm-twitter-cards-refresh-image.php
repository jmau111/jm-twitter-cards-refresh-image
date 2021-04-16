<?php
/*
Plugin Name: JM Twitter Cards Refresh image
Plugin URI: https://julien-maury.dev
Description: this plugin filters JM Twitter Cards to add a query string to force cache busting on image meta.
Author: Julien Maury
Author URI: https://julien-maury.dev
Version: 1.2
License: GPL2++

JM Twitter Cards Plugin
Copyright (C) 2016, Julien Maury - contact@julien-maury.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// Add some security, no direct load !
defined('ABSPATH')
    or die('No direct load !');

add_filter('jm_tc_image_source', 'jm_tc_refresh_image');
function jm_tc_refresh_image($image)
{

    if (empty($image)) {
        return false;
    }

    $params = (array) apply_filters('jm_tc_refresh_image_query_string_params', ['tc' => strtotime('now')], $image);

    return add_query_arg($params, $image);
}
