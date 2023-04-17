<?php

use App\Models\Menu;

if (!function_exists('navs')) {

    function navs($id = null, $tagId = null, $class = null) {
        $nav = Menu::whereSlug($id)->first();
        // dd($nav);
        if ($nav) {
            $navs = $nav->children;
            $list = '<ul id="' . $tagId . '" class="' . $class . '">';
            if($navs->count()>0):
            foreach ($navs as $nav) {
                $list .= '<li';
                if ($nav->children()->count() > 0) {
                    $list .= ' class="menu-item-has-children"';
                }
                $list .= '>'
                        . '<a href="' . url(($nav->slug != '/' ? '/' : null) . $nav->slug) . '">' . $nav->title . '</a>';
                if ($nav->children()->count() > 0) {
                    $list .= navs($nav->slug, null, 'sub-menu');
                }
                $list .= '</li>';
            }
        endif;
            $list .= '</ul>';
            
            return $list;
        }
    }

}
