<?php

if (!function_exists('getTitle')) {
    /**
     * @param null   $title
     * @param string $separator
     *
     * @return string
     */
    function getTitle($title = null, $separator = ' | ')
    {
        if (is_string($title)) {
            $title .= $separator .  config('settings.site_title');
        } else {
            $title = config('settings.site_title');
        }
        return strip_tags($title);
    }
}

if (!function_exists('getDescription')) {
    /**
     * Render nodes for nested sets
     *
     * @param mixed $description
     *
     * @return string
     */
    function getDescription($description = null)
    {
        if (!is_string($description)) {
            $description = config('settings.site_description');
        }
        return strip_tags($description);
    }
}

if (!function_exists('getImage')) {
    /**
     * Return Image
     *
     * @param mixed  $object
     * @param string $property
     *
     * @return string
     */
    function getImage($object = null, $property = 'logo')
    {
        if (is_object($object) && isset($object->$property)) {
            return asset($object->$property);
        }
        return is_string($object) ? $object : asset('i/icons/android-chrome-512x512.png');
    }
}

if (!function_exists('getNWords')) {
    /**
     * Limit content with number of words
     *
     * @param string $string
     * @param int    $n
     * @param bool   $withDots
     *
     * @return string
     */
    function getNWords($string, $n = 5, $withDots = true)
    {
        $excerpt = explode(' ', strip_tags($string), $n + 1);
        $wordCount = count($excerpt);
        if ($wordCount >= $n) {
            array_pop($excerpt);
        }
        $excerpt = implode(' ', $excerpt);
        if ($withDots && $wordCount >= $n) {
            $excerpt .= '...';
        }
        return $excerpt;
    }
}

if (!function_exists('getFacebookShareLink')) {
    /**
     * Get Facebook share link
     *
     * @param $url
     * @param $title
     *
     * @return string
     */
    function getFacebookShareLink($url, $title)
    {
        return 'https://www.facebook.com/sharer/sharer.php?u=' . $url .'&t=' . rawurlencode($title);
    }
}

if (!function_exists('getTwitterShareLink')) {
    /**
     * Get Twitter share link
     *
     * @param $url
     * @param $title
     *
     * @return string
     */
    function getTwitterShareLink($url, $title)
    {
        return 'https://twitter.com/intent/tweet?text=' . rawurlencode(implode(' ', [$title, $url]));
    }
}

if (!function_exists('getRobots')) {
    /**
     * @return string
     */
    function getRobots()
    {
        if (request()->get('PageSpeed')) {
            return 'noindex,nofollow';
        }
        return 'index,follow';
    }
}

if (!function_exists('getMenu')) {
    /**
     * @return mixed
     * @throws \Exception
     */
    function getMenu()
    {
        return cache()->remember('menu', 60, function () {
            return \App\Models\Page::where('parent_id', null)->with('children')->get();
        });
    }
}

if (!function_exists('getFooterArticles')) {
    /**
     * @param int $limit
     *
     * @return mixed
     * @throws \Exception
     */
    function getFooterArticles($limit = 3)
    {
        return cache()->remember('footer_articles', 60, function () use ($limit) {
            return \App\Models\Article::published()->limit($limit)->get();
        });
    }
}

if (!function_exists('active')) {
    /**
     * @param object $object
     * @param string $property
     *
     * @return string
     */
    function active($object, $property = 'slug')
    {
        return strpos(request()->url(), $object->$property) !== false ? 'is-active' : '';
    }
}

if (!function_exists('icon')) {
    /**
     * @param string $icon
     * @param null   $class
     *
     * @return string
     */
    function icon($icon, $class = null)
    {
        if ($class === null) {
            return '<i data-feather="' . $icon . '"></i>';
        }
        return '<i class="' . $class . '" data-feather="' . $icon . '"></i>';
    }
}
