<?php

require_once __DIR__ . '/Database.php';

class Auth extends Database {
	public function __construct(){
		session_start();
		parent::__construct();
	}
	// login the user
	// create a session for that user
	public function attempt($user, $password){
		$sql = "
			Select * from users 
			where username = ? 
			and password = SHA1(?)
			limit 1
		";
		$statement = static::$pdo->prepare($sql);
		$statement->bindParam(1, $user);
		$statement->bindParam(2, $password);
		$statement->execute();

		$user = $statement->fetch(PDO::FETCH_OBJ);

		if($user){
			$_SESSION['user'] = $user;
			return true;
		}
		return false;
	}
	// returns true or false if user is logged in
	public function check(){
		if (isset($_SESSION['user'])) {
			return true;
		}

		return false;
	}
	// destroy user session
	public function logout(){
		session_destroy();
	}
	// return data about user
	public function getUser(){
		if(isset($_SESSION['user'])){
			return $_SESSION['user'];
		}
	}
}