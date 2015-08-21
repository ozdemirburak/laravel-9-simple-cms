<?php

namespace App\Services;

class ImageService
{

    /**
     * @param $request
     * @param $field
     * @return mixed
     */
    public static function uploadImage($request, $field)
    {
        $data = $request->except($field);
        if($request->file($field))
        {
            $file = $request->file($field);
            $request->file($field);
            $fileName = rename_file($file->getClientOriginalName(), $file->getClientOriginalExtension());
            $path = '/uploads/' . str_plural($field);
            $move_path = public_path() . $path;
            $file->move($move_path, $fileName);
            $data[$field] = $path . $fileName;
        }
        return $data;
    }

}
