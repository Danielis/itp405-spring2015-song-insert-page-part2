<?php 
	require_once __DIR__ . '/vendor/autoload.php';

	$song = new Itp\Music\Song();

	$song->setTitle($_POST['titleStr']);
	$song->setArtistId($_POST['artist']);
	$song->setGenreId($_POST['genre']);
	$song->setPrice($_POST['price']);

	$session = new \Symfony\Component\HttpFoundation\Session\Session();
	// $session->start();

	$submittedTitle = $_POST['titleStr'];
	$submittedArtist = $_POST['artist'];
	$session->getFlashBag()->add('contact-success', $submittedTitle .' by ArtistId: '. $submittedArtist.' Submitted');
	$session->getFlashBag()->add('contact-success', 'Thank you!');

	$song->save();
	if (isset($_POST['songSubmit'])) {
		header('Location: /');
	}	