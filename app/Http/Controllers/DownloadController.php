<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
  
    /**
     * Display the specified resource.
     */
    public function show(string $fileName)
    {
        if(Storage::disk("public")->exists("files/".$fileName)){
           return response()->download("storage/files/".$fileName);
        }else{
            abort('404');
        }
    }


}
