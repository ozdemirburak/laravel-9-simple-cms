<?php namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

use Pqb\FilemanagerLaravel\FilemanagerLaravel;

class FileController extends Controller {

    public function getShow()
    {
        return view('partials.admin.filemanager');
    }

    public function getConnectors()
    {
        $f = FilemanagerLaravel::Filemanager();
        $f->run();
    }

    public function postConnectors()
    {
        $f = FilemanagerLaravel::Filemanager();
        $f->run();
    }

}