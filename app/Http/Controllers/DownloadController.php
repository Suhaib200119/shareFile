<?php

namespace App\Http\Controllers;

use App\Http\Requests\DownloadFileRequset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
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
        return view("downloadFileScreen");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DownloadFileRequset $request)
    {
        $validation=$request->validated();
        $fileName=$request->post("fileName");
        if(Storage::disk("uploads")->exists("files/".$fileName)){
           return response()->download("storage/uploads/files/".$fileName);
        }else{
            Session::flash("danger","The file does not exist");
        }
        return redirect()->route("DownloadFile.create");
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
