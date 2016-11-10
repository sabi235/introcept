<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Image;

use DB , Response;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    private $imageObj;
    function __construct() {
        $this->imageObj = new Image();
    }
    
    
    public function index()
    {
       $images = $this->imageObj->fetchAll();
       return $this->loadpage('clients.list_images','List of all Images',compact('clients'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return $this->loadpage('clients.form_images','Create Image');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        print_r($request['upload_images']); die;
        $data = $request->all();
        $images = Image::create($data); 
        if($images->id>0){
            $request->session()->flash('alert-success', 'Image Added successfully!');
        }else{
            $request->session()->flash('alert-danger', 'Couldn\'t create new Image!');
        }
        return redirect('images');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $images = Image::find($id);
        return view('clients.form_images',compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $images = Image::findOrFail($request->id);
        $images->name     = $request->name;
        $images->save();
        $request->session()->flash('alert-success', 'Image Updated successfully!');
        return redirect('images');
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $image = Image::find($id);
        if($image){
            $image->delete();
            $request->session()->flash('alert-success', 'Image deleted successfully!');
            return redirect('images');
        }
        else
            $request->session()->flash('alert-success', 'Image couldn\'t be deleted!');
            return redirect('images');
    }
    
}
