<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Services\LectureService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Integer;

class OrderController extends Controller
{
    protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(){
        return OrderResource::collection($this->orderService->index());
    }
    public function show(int $order_id){
        $validator = Validator::make(['order_id' => $order_id], [
            'order_id' => 'required|integer|exists:orders,id',
        ],
            [
                'order_id.required' => 'Введите ID заказа',
                'order_id.integer' => 'ID заказа должен быть числовым',
                'order_id.exists' => 'Вы ввели несуществующий ID заказа',

            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->getMessages(),
            ], 422);
        }
        return OrderResource::make($this->orderService->show($order_id));
    }

    public function store(CreateOrderRequest $request){
        return OrderResource::make($this->orderService->store($request));
    }

    public function update(UpdateOrderRequest $request,int $order_id){
        return $this->orderService->update($request,$order_id);
    }
    public function delete(int $order_id){
        return $this->orderService->delete($order_id);
    }
}
