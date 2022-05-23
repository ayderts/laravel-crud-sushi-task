<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    public function store($request): object
    {
       return Order::query()->create($request->all());
    }
    public function update($request,$order_id){
        $order = Order::where('id', $order_id)->firstOrFail();
        if ($order->update($request->all())) {
            return response()->json([
                'success' => true,
                'message' => 'Данные успешно сохранены'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Что-то пошло не так'
        ]);
    }
    public function delete($order_id){
        $lecture=Order::where('id',$order_id);
        if ($lecture->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Данные успешно удалены'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Что-то пошло не так'
        ]);
    }
    public function show($order_id){
        return Order::find($order_id);
    }
    public function index(){
        return Order::all();
    }
}
