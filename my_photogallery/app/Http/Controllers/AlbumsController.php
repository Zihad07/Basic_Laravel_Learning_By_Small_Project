<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    //
    public function index(){

        $albums = Album::all();
        return view('albums.index')->with('albums',$albums);
    }

    public function create(){
        return view('albums.create');
    }
    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'cover_image'=>'image|max:1999'
        ]);
//
//        Handle file upload
        if($request->hasFile('cover_image')){
//            Get the file with extention
            $image = $request->file('cover_image');
            $fileNameWithExt = $image->getClientOriginalExtension();
//            File name
            $fileName = explode('.',$image->getClientOriginalName())[0];

//            File store
            $fileNameToStore = $fileName.'_'.time().'.'.$fileNameWithExt;

//            File Move
            $image->move('album_covers',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $album = new Album();
        $album->name = $request->input('name');
        $album->description = $request->input('description') ?? '';
        $album->cover_image = $fileNameToStore;

        $album->save();

        return redirect('/albums')->with('success','New Album created successfully.');

    }

    public function show($id){
        $album = Album::with('Photos')->find($id);
//        dd($album);
        return view('albums.show')->with('album',$album);
    }
}
