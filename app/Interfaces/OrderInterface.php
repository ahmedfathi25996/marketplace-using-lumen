<?php 

namespace App\Interfaces;

interface OrderInterface{

	public function addOrder(array $data);
	public function getOrders();
	public function showSoldProducts();
	



}