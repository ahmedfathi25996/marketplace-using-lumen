<?php 

namespace App\Interfaces;

interface UserInterface{

	
	public function register(array $data);
	
	public function activation($api_token);
	
	public function login();
	



}