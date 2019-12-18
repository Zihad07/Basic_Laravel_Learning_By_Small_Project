<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    //

    public function create($album_id){
//
        return view('photos.create')->with('album_id',$album_id);
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'photo'=>'image|max:1999'
        ]);
//
//        Handle file upload
        if($request->hasFile('photo')){
//            Get the file with extention
            $image = $request->file('photo');
            $fileNameWithExt = $image->getClientOriginalExtension();
//            File name
            $fileName = explode('.',$image->getClientOriginalName())[0];

//            File store
            $fileNameToStore = $fileName.'_'.time().'.'.$fileNameWithExt;

//            File Move
            $image->move('photos/'.$request->input('album_id'), $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $photo = new Photo();
        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description') ?? '';
        $photo->size = $request->file('photo')->getSize() ??'0';
        $photo->photo = $fileNameToStore;

        $photo->save();

        return redirect('/albums/'.$request->input('album_id'))->with('success','New Album created successfully.');

    }
}
