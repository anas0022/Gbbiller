<?php

namespace App\Http\Controllers;

use App\Models\CountrySettings;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function countrylist(){
        return view('supperadmin.country.countrylist');
    }

    public function countrypost(Request $request){
        $validatedData = $request->validate([
            'country_name' => 'required',
            'country_code' => 'required',
            'mobile_code' => 'required',
            'currency_symbol' => 'required',
        ], [
            'country_name.required' => 'The country name field is required.',
            'country_code.required' => 'The country code field is required.',
            'mobile_code.required' => 'The mobile code field is required.',
            'currency_symbol.required' => 'The currency symbol field is required.',
        ]);

        try {
            $country_id = $request->input('country_id');
            if($country_id){
                $country = CountrySettings::find($country_id);
                $country->update([
                    'country_name' => $request->input('country_name'),
                    'country_code' => $request->input('country_code'),
                    'mobile_code' => $request->input('mobile_code'),
                    'currency_symbol' => $request->input('currency_symbol'),
                    'status' => 'active'
                 
                ]);
            }else{
                CountrySettings::create([
                    'country_name' => $request->input('country_name'),
                    'country_code' => $request->input('country_code'),
                    'mobile_code' => $request->input('mobile_code'),
                    'currency_symbol' => $request->input('currency_symbol'),
                    'status' => 'active'
                ]);
            }
            return response()->json(['success' => true, 'message' => 'Country created successfully']);
        } catch(\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Country creation failed: ' . $e->getMessage()], 500);
        }
    }

    public function countrylistget(){
        $country = CountrySettings::all();
        return response()->json([ 'data' => $country]);
    }

    public function countrydelete($id){
        $country = CountrySettings::find($id);
        $country->delete();
        return response()->json(['success' => true, 'message' => 'Country deleted successfully']);
    }
}
