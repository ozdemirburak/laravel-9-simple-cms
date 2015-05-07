<?php

if( ! function_exists('limit_to_numwords'))
{
    /**
     * Limit content with number of words
     *
     * @param $string
     * @param $numwords
     * @return array|string
     */
    function limit_to_numwords($string, $numwords)
    {
        $excerpt = explode(' ', $string, $numwords + 1);
        if (count($excerpt) >= $numwords)
        {
            array_pop($excerpt);
        }
        $excerpt = implode(' ', $excerpt) . ' ...';
        return $excerpt;
    }
}

if( ! function_exists('renderMenuNode')) {
    /**
     * Render nodes for nested sets
     *
     * @param $node
     * @return string
     */
    function renderMenuNode($node)
    {
        $list = 'class="dropdown-menu"';
        $class = 'class="dropdown"';
        $caret = '<i class="fa fa-caret-down"></i>';
        $link = route('page', ['id' => $node->id]);
        $drop_down = '<a class="dropdown-toggle" data-toggle="dropdown" href="'.$link.'" role="button" aria-expanded="false">' . $node->title . ' ' . $caret . '</a>';
        $single  = '<a href="'. $link .'">' . $node->title . '</a>';
        if ($node->isLeaf())
        {
            return '<li>' . $single . '</li>';
        }
        else
        {
            $html = '<li '.$class.'>' . $drop_down;
            $html .= '<ul '.$list.'>';
            foreach ($node->children as $child)
            {
                $html .= renderMenuNode($child);
            }
            $html .= '</ul>';
            $html .= '</li>';
        }
        return $html;
    }
}