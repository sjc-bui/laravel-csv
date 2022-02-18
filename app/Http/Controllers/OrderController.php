<?php

namespace App\Http\Controllers;

use App\Interfaces\OrderRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{

    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository) {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        //
        return response()->json([
            'data' => $this->orderRepository->getAllOrders()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        //
        $orderDetails = $request->only([
            'clients', 'details'
        ]);

        return response()->json([
            'data' => $this->orderRepository->createOrder($orderDetails)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request): JsonResponse
    {
        //
        $orderId = $request->route('id');
        return response()->json([
            'data' => $this->orderRepository->getOrderById($orderId)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request): JsonResponse
    {
        //
        $orderId = $request->route('id');
        $orderDetails = $request->only([
            'client', 'details'
        ]);

        return response()->json([
            'data' => $this->orderRepository->updateOrder($orderId, $orderDetails)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
        $orderId = $request->route('id');
        $this->orderRepository->deleteOrder($orderId);
        return response()->json([null, Response::HTTP_NO_CONTENT]);
    }
}
