<?php

if( ! function_exists('get_ops'))
{
    /**
     * Returns resource operations for the datatable
     *
     * @param $resource
     * @param $id
     * @return string
     */
    function get_ops($resource, $id)
    {
        $show_path = route('admin.'.$resource.'.show', ['id' => $id]);
        $edit_path = route('admin.'.$resource.'.edit', ['id' => $id]);
        $delete_path = route('admin.'.$resource.'.destroy', ['id' => $id]);
        $ops  = '<ul class="list-inline no-margin-bottom">';
        $ops .=  '<li>';
        $ops .=  '<a class="btn btn-xs bg-navy" href="'.$show_path.'"><i class="fa fa-search"></i> '.trans('admin.ops.show').'</a>';
        $ops .=  '</li>';
        $ops .=  '<li>';
        $ops .=  '<a class="btn btn-xs bg-olive" href="'.$edit_path.'"><i class="fa fa-pencil-square-o"></i> '.trans('admin.ops.edit').'</a>';
        $ops .=  '</li>';
        $ops .=  '<li>';
        $ops .= Form::open(['method' => 'DELETE', 'url' => $delete_path]);
        $ops .= Form::submit('&#xf1f8; ' .trans('admin.ops.delete'), ['onclick' => "return confirm('".trans('admin.ops.confirmation')."');", 'class'=>'btn btn-xs btn-danger destroy']);
        $ops .= Form::close();
        $ops .=  '</li>';
        $ops .=  '</ul>';
        return $ops;
    }
}


if ( ! function_exists('breadcrumbs'))
{
    /**
     * Return breadcrumbs for each resource methods
     *
     * @return string
     */
    function breadcrumbs()
    {
        $route = Route::currentRouteName();
        // get after last dot
        $index = substr($route, 0, strrpos($route, '.') + 1) . 'index';
        $breadcrumbs  = '<ol class="breadcrumb">';
        $breadcrumbs .= '<li><a href="'.route('admin.root').'"><i class="fa fa-dashboard"></i> '.trans('admin.menu.dashboard').'</a></li>';
        // if not admin root
        if(strpos($route, 'root')  === false)
        {
            $breadcrumbs  .= strpos($route, 'index')  !== false ? '<li class="active">' : '<li>';
            $parent_text   = strpos($route, 'index')  !== false ? trans($route) : trans($index);
            $breadcrumbs  .= strpos($route, 'index')  !== false ? $parent_text : '<a href="'.route($index).'">'.$parent_text.'</a>';
            $breadcrumbs  .= '</li>';
            if(strpos($route, 'index')  === false)
            {
                $breadcrumbs  .= '<li class="active">'.trans($route).'</li>';
            }
        }
        $breadcrumbs .= '</ol>';
        return $breadcrumbs;
    }
}

if ( ! function_exists('header_title'))
{
    /**
     * Return the header title for each page
     *
     * @return string
     */
    function header_title()
    {
        $route = Route::currentRouteName();
        $title = '<h1>';
        $title .= trans(Route::getCurrentRoute()->getName());
        if( strpos($route, 'index')  !== false )
        {
            $new = substr($route, 0, strrpos($route, '.') + 1) . 'create';
            if(Route::has($new))
            {
                $title .= '<small>';
                $title .= '<a href="'.route($new).'" title="'.trans($new).'">';
                $title .= '<i class="fa fa-plus"></i>';
                $title .= '</a>';
                $title .= '</small>';
            }
        }
        $title .= '</h1>';
        return $title;
    }
}

if ( ! function_exists('rename_file'))
{
    /**
     * Rename the filename, convert string to url friendly form and attach random string
     *
     * @param $filename
     * @param $mime
     * @return string
     */
    function rename_file($filename, $mime)
    {
        // remove extension first
        $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
        $filename = str_slug($filename, "-");
        $filename = '/' . $filename . '_' . str_random(32) .  '.' . $mime;
        return $filename;
    }
}