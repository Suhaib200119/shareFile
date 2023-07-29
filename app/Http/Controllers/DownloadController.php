<?php

namespace App\Http\Controllers;

use App\Http\Requests\DownloadFileRequset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
  
    /**
     * Display the specified resource.
     */
    public function show(string $fileName)
    {
        if(Storage::disk("public")->exists("files/".$fileName)){
           return response()->download("storage/files/".$fileName)->deleteFileAfterSend();
        }
    }


}
