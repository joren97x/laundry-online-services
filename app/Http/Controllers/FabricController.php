<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Fabric;


class FabricController extends Controller
{
    public function fabric()
    {
        $fabric = Fabric::all();
        return view('admin.fabric.fabric', compact('fabric'));
    }

    public function create() {
       
        return view('admin.fabric.create');
    }

    public function submit(Request $request) {
        $request->validate([    
            'fabric_name' => 'required',
            'image' => 'required',
        ],
        [
            'fabric_name' => 'Fabric name is required',
            'image' => 'Fabric image is required',  
        ]);

        $data = $request->except('_token');
      
        if($request->file('image')){
            $imageName = time().'.'.$request->image->extension();
            $data['image']=$imageName;
            $request->image->move(public_path('/image/fabric'),$imageName);
          
        }
        $query = Fabric::create($data);
        if(isset($query)&& !empty($query))
        return redirect()->route('admin.fabric.fabric')->with('mesage','Fabric Successfully add');
        else 
        return redirect()->back()->with('error','All Fields are Required');
    }

    public function edit($id) {
       
        $edit = Fabric::find($id);
        return view('admin.fabric.update',compact('edit'));
    }

    public function update(Request $request,$id) 
    {
        $request->validate([    
            'fabric_name' => 'required',
            'image' => 'required',
        ],
        [
            'fabric_name' => 'Fabric name is required',
            'image' => 'Fabric image is required',  
        ]);
        $data = $request->except('_token');
        if(isset($data['image'])&& !empty($data['image'])) {
            $oldimage = Fabric::find($id);
            if(isset($oldimage->image)&& !empty($oldimage->image)){
                $oldimage = public_path('image/fabric/'.$oldimage);
                if(File::exists($oldimage)){
                    File::delete($oldimage);
                }
            }
            $imageName = time().'.'.$request->image->extension();
            $data['image']=$imageName;
            $request->image->move(public_path('/image/fabric'),$imageName);
        }
        $query = Fabric::where("id",$id)->update($data);
        if(isset($query) && !empty($query))
        if(isset($query) && !empty($query))
             return redirect()->route('admin.fabric.fabric')->with('message','Fabric Successfully added');
        else
        return redirect()->back()->with('error','All field are Required');
    }
    public function destroy($id) {
        $data = Fabric::where('id',$id)->first();
        $data->delete();
        return back()->withSuccess('detergent Deleted!!');
      }
  
}



