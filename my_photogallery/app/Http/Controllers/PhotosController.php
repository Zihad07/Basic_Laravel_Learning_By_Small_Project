<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Album;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            $image->move('album_photos/'.$request->input('album_id'), $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $photo = new Photo();
        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description') ?? '';
        $photo->size = '0' ?? $request->file('photo')->getSize();
        $photo->photo = $fileNameToStore;

        $photo->save();

        return redirect('/albums/'.$request->input('album_id'))->with('success','New Album created successfully.');

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
        $photo = Photo::findOrFail($id);
        return view('photos.show')->with('photo',$photo);
    }

    public function destroy($id){
        $photo = Photo::findOrFail($id);

//        Image Delete Handle
        if($photo->photo != 'noimage.jpg'){
//            Delete image
            if(File::exists(public_path('album_photos/'.$photo->album_id.'/'.$photo->photo))){
                File::delete(public_path('album_photos/'.$photo->album_id.'/'.$photo->photo));

//                Form database
                $photo->delete();

                return redirect('/')->with('success','Photo succesfully Deleted');
            }
        }
    }


}
