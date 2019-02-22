<?php 

namespace App\Interfaces;

interface ProductInterface{
    
	//public function sort();
	
	
	public function rating_sort();
	public function price_sort();
	public function filter();
	
    
    public function addProduct();
    public function getProducts();



}