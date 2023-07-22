<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadFileRequset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view("uploadFileScreen");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UploadFileRequset $request)
    {
     $validation=$request->validated();
     if($request->hasFile("userFile")){
        $file=$request->file("userFile");
        $path = explode("/",$file->store("/files","public"));
        Session::flash("data", $path[1]);
     }else{
        Session::flash("data","no files!");
     }
     return redirect()->route("uploadFile.create");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
