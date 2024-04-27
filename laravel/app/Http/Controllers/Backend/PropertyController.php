<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\MultiImage;
use App\Models\Facility;

class PropertyController extends Controller
{
    public function AllProperties(){

        $properties = Property::latest()->get();
        return view('backend.property.all_properties',compact('properties'));

    } // End Method 

    public function AddProperty(){

        return view('backend.property.add_property');

    } // End Method 
}
