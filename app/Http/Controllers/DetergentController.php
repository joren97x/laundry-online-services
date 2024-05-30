<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Detergent;


class DetergentController extends Controller
{
    public function detergent()
    {
        $detergent = Detergent::all();
        return view('admin.detergent.detergent', compact('detergent'));
    }

    public function create() {
       
        return view('admin.detergent.create');
    }

    public function submit(Request $request) {
        $request->validate([    
            'detergent_name' => 'required',
            'image' => 'required',
        ],
        [
            'detergent_name' => 'Detergent name is required',
            'image' => 'Detergent image is required',  
        ]);

        $data = $request->except('_token');
      
        if($request->file('image')){
            $imageName = time().'.'.$request->image->extension();
            $data['image']=$imageName;
            $request->image->move(public_path('image/detergent'),$imageName);
          
        }
        $query = Detergent::create($data);
        if(isset($query)&& !empty($query))
        return redirect()->route('admin.detergent.detergent')->with('mesage','Detergent Successfully add');
        else 
        return redirect()->back()->with('error','All Fields are Required');
    }

    public function edit($id) {
       
        $edit = Detergent::find($id);
        return view('admin.detergent.update',compact('edit'));
    }

    public function update(Request $request,$id) 
    {
        $request->validate([    
            'detergent_name' => 'required',
            'image' => 'required',
        ],
        [
            'fabric_name' => 'Detergent name is required',
            'image' => 'Detergent image is required',  
        ]);
        $data = $request->except('_token');
        if(isset($data['image'])&& !empty($data['image'])) {
            $oldimage = Detergent::find($id);
            if(isset($oldimage->image)&& !empty($oldimage->image)){
                $oldimage = public_path('image/detergent/'.$oldimage);
                if(File::exists($oldimage)){
                    File::delete($oldimage);
                }
            }
            $imageName = time().'.'.$request->image->extension();
            $data['image']=$imageName;
            $request->image->move(public_path('/image/detergent'),$imageName);
        }
        $query = Detergent::where("id",$id)->update($data);
        if(isset($query) && !empty($query))
        if(isset($query) && !empty($query))
             return redirect()->route('admin.detergent.detergent')->with('message','Detergent Successfully added');
        else
        return redirect()->back()->with('error','All field are Required');
    }

   public function destroy($id) {
  $data = Detergent::where('id',$id)->first();
  $data->delete();
  return back()->withSuccess('detergent Deleted!!');
}
}
