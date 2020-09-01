<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Design;
use Session;
use Illuminate\Support\Facades\Storage;
use App\ColorDesign;


class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('designs.index')->with("designs", Design::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('designs.create');
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
            'name' => 'required|unique:designs',
            'image' => 'required|image'
        ]);

       $image = $request->image->store('designs');

       Design::create([
        'name' => $request->name,
        'image' => $image
       ]);


      

       return redirect(route('designs.index'))->with('success', 'Design created successfully!');



    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $design = Design::findOrFail($id);

        $img_path = explode("/", $design->image);

        $img_path = $img_path[1];

        $path = public_path().'/storage/designs/'.$img_path;

    
        $type = pathinfo($path, PATHINFO_EXTENSION);

        
        $data = file_get_contents($path);
        
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    
        return response()->json(['data'=> $base64]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $design = Design::findOrFail($id);

        
        return view('designs.create')->with('design', $design);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $design = Design::find($id);
        $this->validate($request, [
            'name' => 'required|unique:designs,name,'.$design->name
        ]);

        if($request->hasFile('image')) {
            $image = $request->image->store('designs');
            Storage::delete($design->image);
            $design->image = $image;
        }

        $design->name = $request->name;
        $design->save();



        return redirect(route('designs.index'))->with('success', 'Design updated successfully!');



        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $design = Design::find($id);

        Storage::delete($design->image);

        $design->delete();


        return redirect(route('designs.index'))->with('success', 'Design Deleted successfully!');


    }

    public function showColorDesignPage($id) {
        
        return view('designs.color')->with('design', Design::find($id));
    }

    public function uploadColorDesign(Request $request) {


    
        $img = $request->input('img');
        $user_id = $request->input('shopify_user_id');
        
        $image_parts = explode(";base64,", $img);

        $image_type_aux = explode("image/", $image_parts[0]);

       // $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);



        
        $file =  public_path().'/storage/colors/'.uniqid(). '.png';


        file_put_contents($file, $image_base64);

        ColorDesign::create([
            'image' => $img,
            'shopify_user_id' => $user_id
        ]);   


        $file_url = explode("/public/", $file);

	
        
        return response()->json(['data'=> '/'.$file_url[1]]);
       
    }

    public function getColorDesign() {

        $designs = ColorDesign::all();
    
        return response()->json(['data'=> $designs]);
    
    }

    public function getAllDesign() {
        $designs = Design::all();
        $designs = json_decode($designs);

        return response()->json(['data' => $designs]);
    }

    public function getDesignedImages() {

	return view('designed-images');
    }
}
 