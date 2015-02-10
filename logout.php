<?php
	require_once __DIR__ . '/Auth.php';

	$auth = new Auth();
	$auth->logout();
	header('Location: login.php');