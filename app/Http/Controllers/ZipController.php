<?php

namespace App\Http\Controllers;
use ZipArchive;
use File;
use Illuminate\Http\Request;

class ZipController extends Controller
{
    public function indexzip(Request $request)
    {
        return view("zip");

        # code...
    }

    public function danlowd(Request $request)
    {
        $zip = new ZipArchive;
        $zipfile = public_path("new.zip");
        if ($zip->open($zipfile, ZipArchive::CREATE) == true) {
            $files = File::Files(public_path("images"));
            foreach ($files as $key => $value) {
                $zip->addFile($value, basename($value));
                # code...
            }
            $zip->close();
            # code...
        }
        return response()->download($zipfile)->deleteFileAfterSend(true);
        # code...
    }
    //
}
