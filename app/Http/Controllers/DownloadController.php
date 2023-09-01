<?php

namespace App\Http\Controllers;

use App\Events\DownloadFileEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
  
    /**
     * Display the specified resource.
     */
    public function show(Request $request,string $fileName)
    {
        if(Storage::disk("public")->exists("files/".$fileName)){
            $arrayData=[
                "fileName"=>$fileName,
                "ip_address"=>$request->ip(),
                "user_agent"=>$request->header("user-agent")
            ];
            DownloadFileEvent::dispatch($arrayData);
           return response()->download("storage/files/".$fileName);
        }else{
            abort('404');
        }
    }


}
