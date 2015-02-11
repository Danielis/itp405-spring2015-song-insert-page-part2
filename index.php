<?php
	// require_once __DIR__ . '/classes.php';
	require_once __DIR__ . '/vendor/autoload.php';
	
	// function __autoload($className) {
 	//    	$parts = explode("\\", $className);
 	//    	var_dump($className);
 	//    	var_dump($parts);
	 //    	require_once $parts[3] . '.php';
	// }	

	$artistQuery = new Itp\Music\ArtistQuery();
	$genreQuery = new Itp\Music\GenreQuery();

	$artists = $artistQuery->getAll();
	$genres = $genreQuery->getAll();

	use Symfony\Component\HttpFoundation\Session\Session;
	$session = new \Symfony\Component\HttpFoundation\Session\Session();
	// $session->start();

	// if (isset($_POST['songSubmit'])) {
	// 	// send email
	// 	$song = new Itp\Music\Song();
	// 	$submittedTitle = $_POST['titleStr'];
	// 	$submittedArtist = $_POST['artist'];
	// 	$session->getFlashBag()->add('contact-success', 'Song Sumbitted');
	// 	$session->getFlashBag()->add('contact-success', 'Thank you!');
	// 	header('Location: /');
	// 	exit;
	// }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="login.css">
</head>	
<body>

	<div class="container">
		<?php if (isset($_POST['songSubmit'])) { ?>
		<h2> Welcome! Let's add a few songs</h2>
		<?php }?>
	</div>

	<div>
		<h4>Insert a song:</h4>
		<form method="post" action="adding_song.php" >
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" name="titleStr" class="form-control" id="title" value="In the End">
			</div>
			<div class="form-group">
				<label for="title">Price</label>
				<input type="text" name="price" class="form-control" id="title" value="100">
			</div>
			<div class="form-group">
			<label for="artist">Select an Artist</label>
			<select name="artist">
				<?php foreach($artists as $art): ?>
					<option value="<?php echo $art->id;?>"><?php echo $art->artist_name;?></option>
				<?php endforeach; ?>
			</select> 
			<label for="genre">and Select a Genre</label>
			<select  name="genre">
				<?php foreach($genres as $genre): ?>
					<option value="<?php echo $genre->id;?>"><?php echo $genre->genre;?></option>
				<?php endforeach; ?>
			</select>
			<input type="submit" name="songSubmit" class="btn btn-default" value="Submit">
		</form>
	</div>
	<div class="submittedMessage"
		<?php foreach ($session->getFlashBag()->get('contact-success') as $message) : ?>
			<p><?php echo $message ?></p>
		<?php endforeach; ?> 
	</div>
</body>
</html>