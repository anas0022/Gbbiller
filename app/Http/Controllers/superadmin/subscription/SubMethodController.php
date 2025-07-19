<?php

namespace App\Http\Controllers\superadmin\subscription;

use App\Http\Controllers\Controller;
use App\Models\sub_method;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class SubMethodController extends Controller
{
    public function method (){
      
        return view('supperadmin.method.methodlist');
    }

    public function method_add(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'methodName' => 'required|string|max:255',
                'methodDescription' => 'required|string',
                'methodIcon' => 'file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                'methodName.required' => 'The method name field is required.',
                'methodName.max' => 'The method name must not exceed 255 characters.',
                'methodDescription.required' => 'The description field is required.',
                'methodIcon.required' => 'Please select an icon image.',
                'methodIcon.mimes' => 'The icon must be an image file (jpeg, png, jpg, gif, svg).',
                'methodIcon.max' => 'The icon file size must not exceed 2MB.'
            ]);

            $methodId = $request->input('methodId');
            
            if ($methodId == 0) {
                $icon = $request->file('methodIcon')->store('method_icon', 'public');

                sub_method::create([
                    'method' => $validatedData['methodName'],
                    'dis' => $validatedData['methodDescription'],
                    'icon' => $icon,
                ]);
            } else {
                // Get the existing method data
                $existingMethod = sub_method::find($methodId);
                
                // Prepare update data
                $updateData = [
                    'method' => $validatedData['methodName'],
                    'dis' => $validatedData['methodDescription'],
                ];

                // Only update icon if new file is uploaded
                if ($request->hasFile('methodIcon')) {
                    $icon = $request->file('methodIcon')->store('method_icon', 'public');
                    $updateData['icon'] = $icon;
                } else {
                    // Keep the existing icon
                    $updateData['icon'] = $existingMethod->icon;
                }

                sub_method::where('id', $methodId)->update($updateData);
            }

            return response()->json(['success' => 'Method added successfully!']);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Something went wrong! Please try again.'
            ], 500);
        }
    }
    public function methoditem_list() {
        $methods = sub_method::orderBy('created_at', 'desc')->get();
        return response()->json([
            'data' => $methods
        ]);
    }
    public function methoditem_delete($id) {
        try {
            $method = sub_method::findOrFail($id);
            $method->delete();
            Storage::delete('public/'.$method->icon);
            return response()->json(['success' => 'Method deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting method'], 500);
        }
    }
    
}
