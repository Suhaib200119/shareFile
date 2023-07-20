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
        $linkFile=$request->post("linkFile");
        if(filter_var($linkFile,FILTER_VALIDATE_URL)){
            $Filename = basename($linkFile);
            return response()->download($linkFile,$Filename);
        }else{
            Session::flash("message","Invalid Link!");
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
