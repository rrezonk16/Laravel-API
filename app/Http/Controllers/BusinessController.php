<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;

class BusinessController extends Controller
{
    public function store(Request $request)
    {
        $fields = $request->validate([
            'business_name' => 'required|string',
            'nui' => 'required|string|unique:business_info,nui',
            'owner_id' => 'required|exists:users,id',
            'phone_number' => 'required|string',
            'email' => 'required|string|unique:business_info,email',
        ]);
        $fields['status'] = 0;

        $business = Business::create($fields);

        return response()->json($business, 201);
    }

    public function updateStatus($nui, $statusId)
    {
        if (!in_array($statusId, [0, 1, 2, 3])) {
            return response()->json(['error' => 'Invalid status ID'], 400);
        }

        $business = Business::where('nui', $nui)->first();

        if ($business) {
            $business->update(['status' => $statusId]);
            return response()->json(['message' => 'Status updated successfully'], 200);
        } else {
            return response()->json(['error' => 'Business not found'], 404);
        }
    }

    public function getAllBusinessInfo()
    {
        // Retrieve all businesses where the status is not equal to 1
        $businesses = Business::where('status', '!=', 1)
            ->join('users', 'business_info.owner_id', '=', 'users.id')
            ->select('business_info.*', 'users.name as owner_name')
            ->get();
    
        return response()->json($businesses, 200);
    }
    


    
}
