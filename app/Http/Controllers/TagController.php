<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate();
        return view("tags.index" , compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tags.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required | string | min:3'
        ]);
        Tag::create($data);
        return redirect()->route('tags.index')->with('success' , 'Data updated Sccuessfully');

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
        $tag = Tag::findOrFail($id);
        return view('tags.edit' , compact('tag'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required | string | min:3'
        ]);
        $tag->update(['name'=>$request->name]);
        $tag->save();
        return redirect()->route('tags.index')->with('success' , 'Data updated Sccuessfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {

        
        // $tag = Tag::findOrFail($id);
        $tag->delete();
        return back()->with('success' , 'Data Deleted Sccuessfully');
    }
}
