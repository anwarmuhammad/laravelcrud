<?php
namespace App\Http\Controllers;
use App\Video;
use Illuminate\Http\Request;
class VideoController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{


// $videos=Video::orderBy('id','DESC')->paginate(5);
    $videos=Video::latest()->paginate(5);

return view('videos.index',compact('videos',$videos));
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
 return view('videos.create');
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
      $this->validate($request, [

            'title' => 'required',

            'url' => 'required',
            'description'=>'required',

        ]);

    
    Video::create($request->all());
    return redirect('videos')->with('message','Video created Successfully');
}
/**
* Display the specified resource.
*
* @param  \App\Video  $video
* @return \Illuminate\Http\Response
*/
public function show(Video $video)
{
  return view('videos.show',compact('video',$video));
}
/**
* Show the form for editing the specified resource.
*
* @param  \App\Video  $video
* @return \Illuminate\Http\Response
*/
public function edit(Video $video)
{
  return view('videos.edit',compact('video'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\Video  $video
* @return \Illuminate\Http\Response
*/
public function update(Request $request, Video $video)
{
   $this->validate($request,[
    'title'=>'required',
    'url'=>'required',
    'description'=>'required',

   ]);

   // $video->active = !$video->sctive;

   $video->update($request->all());
   return redirect('videos')->with('message','Successfully Updated');
}
/**
* Remove the specified resource from storage.
*
* @param  \App\Video  $video
* @return \Illuminate\Http\Response
*/
public function destroy(Request $request ,Video $video)
{
   
  $video->delete();
  return redirect('videos')->with('message','Successfully Deleted');
}
}