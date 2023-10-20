<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\discussions_Model;

class discussionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $test = discussions_Model::get()->toJson(JSON_PRETTY_PRINT);
        return response($test, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $content = new discussions_Model;
        $content->nickname = $request->name;
        $content->site_key = $request->site_key;
        $content->content = $request->content;
        $content->created_at = $request->created_at;
        $content->save();
        
        return response()->json([
            "content" => "Test record created"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Test::where('id', $id)->exists()) {
            $test = discussions_Model::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($test, 200);
        } 
        else {
            return response()->json([
                "message" => "Student not found"], 404);
        }
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
