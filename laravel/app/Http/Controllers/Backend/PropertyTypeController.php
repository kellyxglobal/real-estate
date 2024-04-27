<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyType;
use App\Models\Amenities;


class PropertyTypeController extends Controller
{
    public function AllType(){

        $types = PropertyType::latest()->get();
        return view('backend.type.all_type',compact('types'));

    } // End Method 

    public function AddType(){
        
        return view('backend.type.add_type');

    } // End Method 

    public function StoreType(Request $request){

        // Validation 
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required'

        ]);
        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);

        $notification = array(
            'message' => 'Property Type Created Succesfully!',
            'alert-type' => 'error'
        );
        return redirect()->route('all.type')->with($notification);

    } // End Method 


    public function EditType($id){

        $types = PropertyType::findOrFail($id);
        return view('backend.type.edit_type',compact('types'));

    }// End Method 

     public function UpdateType(Request $request){

        $pid = $request->id;

        PropertyType::findOrFail($pid)->update([ 

            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon, 
        ]);

          $notification = array(
            'message' => 'Property Type Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);

    }// End Method 

    public function DeleteType($id){

        PropertyType::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Property Type Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method 


    public function AllAmenities(){

        $amenities = Amenities::latest()->get();
        return view('backend.amenities.all_amenities',compact('amenities'));

    } // End Method 

    public function AddAmenity(){
        return view('backend.amenities.add_amenities');
    }// End Method 



    public function StoreAmenity(Request $request){

        Amenities::insert([
            'amenities_name' => $request->amenities_name,
            
        ]);

        $notification = array(
            'message' => 'Amenity name Created Succesfully!',
            'alert-type' => 'error'
        );
        return redirect()->route('all.amenities')->with($notification);

    } // End Method 


    public function EditAmenity($id){

        $amenities = Amenities::findOrFail($id);
        return view('backend.amenities.edit_amenity',compact('amenities'));

    }// End Method 



    public function UpdateAmenity(Request $request){

        $amenityid = $request->id;

        Amenities::findOrFail($amenityid)->update([ 

            'amenities_name' => $request->amenities_name, 
        ]);

          $notification = array(
            'message' => 'Amenity Name Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.amenities')->with($notification);

    }// End Method 


    public function DeleteAmenity($id){

        Amenities::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Amenity Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method

     





}