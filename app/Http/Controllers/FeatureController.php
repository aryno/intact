<?php

/*
*Feature Controller
*Used to create , update, get and delete features
*/

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /*
    *create feature
    * input params : title, desciption
    */
    public function createFeatureForm(Request $request,$id)
    {
        return view('web.feature.createFeature',['app_id'=>$id]);
    }
    public function createFeature(Request $request)
    {   
        
        // Validate the request
        $validator = Feature::validate($request->all());

        // Check for validation errors
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400); // Bad Request
        }
        
        $imagePath = null;
        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Store in public/images directory
        }
        $userId = auth()->id();
        $featureData = $request->all();
        $featureData['user_id'] = $userId;
        $featureData['image'] =$imagePath;

         $feature = Feature::create($featureData);
         return redirect()->route('app.list')->with(['status' => 'Feature created successfully!']);
    }

    /*
    *fetch all feature or specified feature with id
    * input params : id 
    */
    public function getFeatures(Request $request, $id = null)
    {
        $feature = Feature::find($id);

        if (!$feature) {
            return response()->json(['message' => 'Feature not found'], 404); // Not Found
        }
        return view('web.feature.createFeature', compact('feature'));
    }
    public function geAllFeatures(Request $request,$id=null)
    {
        if($id == null){
            $features = Feature::all();

            return view('web.feature.featuresList', compact('features'));
        }else{
            $features = App::findOrFail($id)->features()->with('votes')->get();
            $features->map(function($feature){
                if($feature->vote_type !='Rate 1 to 10'){
                    $feature->likes_count = $feature->votes->where('vote_status', 1)->count();
                    $feature->dislikes_count = $feature->votes->where('vote_status', 0)->count();
                }
            });
            return view('web.feature.appFeaturesList', compact('features'));
        }
        
    }

    public function updateFeature(Request $request,$id)
    {
        $feature = Feature::find($id);
        if (!$feature) {
            return response()->json(['message' => 'Feature not found'], 404); // Not Found
        }
        $validator = Feature::validate($request->all());

        // Check for validation errors
        if ($validator->fails()) {
            return redirect()->back()->with(['status' => 'Feature Update Failed']);
        }

        // Update the feature with new data
        $feature->update($request->all());

        return redirect()->route('app.list')->with(['status' => 'Feature updated successfully!']);
    }

    /*
    *delete feature 
    * input params : id
    */
    public function deleteFeature($id)
    {
        $feature = Feature::find($id);

        // Check if the feature exists
        if (!$feature) {
            return response()->json(['message' => 'Feature not found'], 404); 
        }

        // Delete the feature
        $feature->delete();

        // Return a success response
        return response()->json(['message' => 'Feature deleted successfully'], 200);
    }

}
