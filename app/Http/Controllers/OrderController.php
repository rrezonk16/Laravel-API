<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class OrderController extends Controller
{

    public function index()
    {
        $allOrders = Order::with('product')->get();
    
        if ($allOrders->isEmpty()) {
            return response()->json(['message' => 'No orders found'], 404);
        }
    
        return response()->json($allOrders, 200);
    }
    public function store(Request $request, $userId, $productId)
    {

        $user = User::find($userId);
        $product = Product::find($productId);
    
        if (!$user || !$product) {
            return response()->json(['error' => 'User or product not found'], 404);
        }
    
        $activeOrder = Order::where('user_id', $userId)
            ->where('product_id', $productId)
            ->where('status', '<>', 2) 
            ->first();
    
        if ($activeOrder) {
            return response()->json(['error' => 'There is already an active order for this user and product'], 400);
        }
    
        $order = new Order([
            'user_id' => $userId,
            'product_id' => $productId,
        ]);
    
        $order->save();
    
        return response()->json($order, 200);
    }


    public function getMyOrders($userId)
    {
        $userOrders = Order::with('product')
            ->where('user_id', $userId)
            ->get();
    
        if ($userOrders->isEmpty()) {
            return response()->json(['message' => 'No orders found for the user'], 404);
        }
    
        return response()->json(['user_orders' => $userOrders], 200);
    }
    
    public function updateStatus(Request $request, $orderId)
    {
        $order = Order::find($orderId);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $status = $request->input('status');

        if (!in_array($status, [0, 1, 2])) {
            return response()->json(['error' => 'Invalid status value'], 400);
        }

        $order->status = $status;
        $order->save();

        return response()->json(['message' => 'Order status updated successfully'], 200);
    }
}
