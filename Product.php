<?php 

class Product{
	public $name;
	private $price;
	protected $size;

	public function __construct($name, $price = 50, $size = 9){
		$this->name = $name;
		$this->price = $price;
		$this->size = $size;
	}

	public function getName(){
		return $this->name;
	}
	public function getPrice(){
		return $this->price;
	}
}

class Shoe extends Product {
	public static $count = 0;

	public function __construct(){
		static::$count = static::$count + 1;
		parent::__construct();
	}
}

$product = new Product('Go Run', 60, 8.5);