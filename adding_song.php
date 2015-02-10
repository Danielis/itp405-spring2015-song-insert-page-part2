<?php 
	require_once __DIR__ . '/classes.php';

	$song = new Itp\Music\Song();

	$song->setTitle($_POST['titleStr']);
	$song->setArtistId($_POST['artist']);
	$song->setGenreId($_POST['genre']);
	$song->setPrice($_POST['price']);

	// $song->save();
	if (isset($_POST['songSubmit'])) {
		header('Location: /');
	}	