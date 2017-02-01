<?php

if (!function_exists('getTitle')) {
    /**
     * Render nodes for nested sets
     *
     * @param  mixed $object
     * @param string $property
     *
     * @return string
     */
    function getTitle($object = null, $property = 'title')
    {
        if (is_object($object) && isset($object->$property)) {
            return $object->$property . ' | ' .  session('current_lang')->site_title;
        } elseif (is_string($object) && !empty($object)) {
            return $object . ' | ' .  session('current_lang')->site_title;
        } else {
            return session('current_lang')->site_title;
        }
    }
}

if (!function_exists('getDescription')) {
    /**
     * Render nodes for nested sets
     *
     * @param  mixed $object
     * @param string $property
     *
     * @return string
     */
    function getDescription($object = null, $property = 'description')
    {
        if (is_object($object) && isset($object->$property)) {
            return $object->$property;
        } elseif (is_string($object) && !empty($object)) {
            return $object;
        } else {
            return session('current_lang')->site_description;
        }
    }
}

if (!function_exists('getImage')) {
    /**
     * Render nodes for nested sets
     *
     * @param mixed  $object
     * @param string $property
     *
     * @return string
     */
    function getImage($object = null, $property = 'featured_image')
    {
        if (is_object($object) && isset($object->$property)) {
            return asset($object->$property);
        } elseif (is_string($object) && !empty($object)) {
            return $object;
        } else {
            return asset('files/share/default.png');
        }
    }
}


if (!function_exists('getStringBetween')) {
    /**
     * Gets string between characters
     *
     * @param $string
     * @param $from
     * @param $to
     *
     * @return string
     */
    function getStringBetween($string, $from, $to)
    {
        $sub = substr($string, strpos($string, $from)+strlen($from), strlen($string));
        return substr($sub, 0, strpos($sub, $to));
    }
}

if (!function_exists('escapeAndTrim')) {
    /**
     * Escape HTML characters and trim the string
     *
     * @param $string
     *
     * @return mixed
     */
    function escapeAndTrim($string)
    {
        return trim(strip_tags($string));
    }
}

if (!function_exists('getNWords')) {
    /**
     * Limit content with number of words
     *
     * @param      $string
     * @param      $n
     * @param bool $withDots
     *
     * @return array|string
     */
    function getNWords($string, $n, $withDots = true)
    {
        $excerpt = explode(' ', $string, $n + 1);
        if (count($excerpt) >= $n) {
            array_pop($excerpt);
        }
        $excerpt = implode(' ', $excerpt);
        if ($withDots) {
            $excerpt .= ' ...';
        }
        return $excerpt;
    }
}

if (!function_exists('getNSentences')) {
    /**
     * Get first n sentences
     *
     * @param     $body
     * @param int $sentencesToDisplay
     *
     * @return mixed|string
     */
    function getNSentences($body, $sentencesToDisplay = 2)
    {
        $nakedBody = preg_replace('/\s+/', ' ', strip_tags($body));
        $sentences = preg_split('/(\.|\?|\!)(\s)/', $nakedBody);

        if (count($sentences) <= $sentencesToDisplay) {
            return $nakedBody;
        }

        $stopAt = 0;
        foreach ($sentences as $i => $sentence) {
            $stopAt += strlen($sentence);

            if ($i >= $sentencesToDisplay - 1) {
                break;
            }
        }

        $stopAt += ($sentencesToDisplay * 2);
        return trim(substr($nakedBody, 0, $stopAt));
    }
}

if (!function_exists('mb_ucfirst')) {
    /**
     *
     * @param $string
     * @param $encoding
     *
     * @return string
     */
    function mb_ucfirst($string, $encoding = 'utf8')
    {
        $stringLength = mb_strlen($string, $encoding);
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, $stringLength - 1, $encoding);
        return mb_strtoupper($firstChar, $encoding) . $then;
    }
}

if (!function_exists('file_get_contents_utf8')) {
    /**
     * @param $file
     *
     * @return mixed|string
     */
    function file_get_contents_utf8($file)
    {
        $content = @file_get_contents($file);
        return mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');
    }
}

if (!function_exists('makeDirRecursive')) {
    /**
     * @param     $path
     * @param int $mode
     *
     * @return bool
     */
    function makeDirRecursive($path, $mode = 0777)
    {
        return is_dir($path) || mkdir($path, $mode, true);
    }
}

if (!function_exists('getActiveState')) {
    /**
     * @param $route
     * @param $name
     *
     * @return bool
     */
    function getActiveState($route, $name)
    {
        if (str_contains($route, $name)) {
            return 'active';
        }
        return '';
    }
}

if (!function_exists('formatNumber')) {
    /**
     * @param     $number
     * @param int $zeroCount
     *
     * @return string
     */
    function formatNumber($number, $zeroCount = 2)
    {
        $number = number_format($number, $zeroCount, ',', '.');
        return strpos($number, ',') !== false ? rtrim(rtrim($number, '0'), ',') : $number;
    }
}
