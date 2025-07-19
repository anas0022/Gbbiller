<?php

namespace App\Http\Controllers\superadmin\subscription;

use App\Http\Controllers\Controller;
use App\Models\sub_method;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subsciptionadd(Request $request){
        $method  = sub_method::all();

        return view('supperadmin.subscription.subscriptionadd',compact('method'));
    }

    public function sub_list(){
        return view('supperadmin.subscription.sublist');
    }

    public function subsciptionpost(Request $request){
        $validatedData = $request->validate([
            'subtype' => 'required',
            'duration' => 'required|integer',
            'store_limit' => 'required|integer',
            'price' => 'required|integer',
            'note' => 'nullable|string',
        ], [
            'subtype.required' => 'The subscription type field is required.',
            'duration.required' => 'The duration field is required.',
            'duration.integer' => 'The duration must be an integer.',
            'store_limit.required' => 'The store limit field is required.',
            'store_limit.integer' => 'The store limit must be an integer.',
            'price.required' => 'The price field is required.',
            'price.integer' => 'The price must be an integer.',
            'note.string' => 'The note must be a string.',
        ]);

        try {
            $sub_id = $request->input('sub_id');
            if($sub_id){
                $subscription = Subscription::find($sub_id);
                $subscription->update([
                    'type' => $request->input('subtype'),
                    'duration' => $request->input('duration'),
                    'store_count' => $request->input('store_limit'),
                    'price' => $request->input('price'),
                    'note' => $request->input('note'),
                    'executive_app' => $request->input('executive'),
                    'dealers_app' => $request->input('dealer'),
                    'customer_app' => $request->input('customer'),
                ]);
            }else{
                Subscription::create([
                    'type' => $request->input('subtype'),
                    'duration' => $request->input('duration'),
                    'store_count' => $request->input('store_limit'),
                    'rate' => $request->input('price'),
                    'note' => $request->input('note'),
                    'executive_app' => $request->input('executive'),
                    'dealers_app' => $request->input('dealer'),
                    'customer_app' => $request->input('customer'),
                ]);
            }
            return response()->json(['success' => true, 'message' => 'Subscription created successfully']);
        } catch(\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Subscription creation failed: ' . $e->getMessage()], 500);
        }
    }

    public function getSubscriptionData() {
        $subscription = Subscription::with('method')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($sub) {
                $sub->method_name = $sub->method ? $sub->method->method : '';
                return $sub;
            });

        return response()->json([
            'data' => $subscription
        ]);
    }

    public function deleteSubscription($id){
        $subscription = Subscription::find($id);
        $subscription->delete();
        return response()->json(['success' => true, 'message' => 'Subscription deleted successfully']);
    }

    public function editSubscription($id){
        $subscription = Subscription::find($id);
        $method = sub_method::all();
        return view('supperadmin.subscription.subscriptionedit',compact('subscription','method'));
    }
}

