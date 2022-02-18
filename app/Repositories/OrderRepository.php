<?php

namespace App\Repositories;

use App\Models\Order;
use App\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface {

    /**
     * Get all orders.
     */
    public function getAllOrders() {
        return Order::all();
    }

    /**
     * Get order by specific id.
     */
    public function getOrderById($orderId) {
        return Order::findOrFail($orderId);
    }

    /**
     * Delete order by id.
     */
    public function deleteOrder($orderId) {
        Order::destroy($orderId);
    }

    /**
     * Create new order.
     */
    public function createOrder(array $orderDetails) {
        return Order::create($orderdetails);
    }

    /**
     * Update order by id.
     */
    public function updateOrder($orderId, array $newDetails) {
        return Order::whereId($orderId)->update($newDetails);
    }

    /**
     * Get fulfilled orders.
     */
    public function getFulfilledOrders() {
        return Order::where('is_fulfilled', true);
    }
}
