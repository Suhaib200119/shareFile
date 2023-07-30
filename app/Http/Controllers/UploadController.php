<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadFileRequset;
use App\Models\File;
use App\Models\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class UploadController extends Controller
{
    public function index(){
        $images=File::all();
        return view("home-page")->with("images",$images);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view("uploadFileScreen");
    }

    public function show(String $id){
        $data=File::findOrFail($id);
        return response()->json(["data"=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UploadFileRequset $request)
    {
     $validation=$request->validated();
    
        $file=$request->file("userFile");
        $fileName=$file->getClientOriginalName();
        $pathFile=$file->storeAs("/files",$fileName,"public");

        $baseName=basename($pathFile);
        $expiration = now()->addHour($request->post("hours"));
        $url=URL::temporarySignedRoute("DownloadFile.show",$expiration,[
            "DownloadFile"=>$baseName,
        ]);
        
        
        $userImage=new File();
        $userImage->imagePath=$pathFile;
        $userImage->urlDownload=$url;
        $userImage->fileName= $baseName;
        $userImage->user_id=Auth::id();
        $userImage->linkHours=$request->post("hours");
        $isSaved=$userImage->save();

        
        if($isSaved){
            Session::flash("success","File Saved");
        }else{
            Session::flash("danger","Some Error!");
        }
        return redirect()->route("uploadFile.index");


    }
   public function destroy(String $id){
    $count=File::destroy($id);
       if($count>0){
        return response()->json(200);
       }else{
        return response()->json(400);

       }
    
    }

    public function update($id){
        $file=File::findOrFail($id);
        $expiration = now()->addHour(24);
        $url=URL::temporarySignedRoute("DownloadFile.show",$expiration,[
            "DownloadFile"=>$file->fileName,
        ]);
        $file->urlDownload=$url;
        $file->linkHours=24;
       if($file->save()){
        Session::flash("success","The download link has been extended by 24 hours");
       }else{
        Session::flash("danger","The download link extension failed");
       }
        return redirect()->route("uploadFile.index");
    }

    
}
