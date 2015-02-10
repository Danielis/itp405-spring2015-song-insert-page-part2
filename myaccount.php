<?php
	require_once __DIR__ . '/Auth.php';
	require_once __DIR__ . '/classes.php';

	$auth = new Auth();
	if (!$auth->check()) {
		header('Location: login.php');
	}

	$artistQuery = new ArtistQuery();
	$genreQuery = new GenreQuery();

	$artistQuery->getAll();
	$genreQuery->getAll();

	$artists = $_SESSION['artists'];
	$genres = $_SESSION['genres'];

	if(isset($_POST['songSubmit'])){
		$song = new Song();

		$song->setTitle($_POST['titleStr']);
		$song->setArtistId($_POST['artist']);
		$song->setGenreId($_POST['genre']);
		$song->setPrice($_POST['price']);

		$song->save();
		session_destroy();
	}
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
	<a href="logout.php">Logout</a>
	<h1>Welcome <?php echo $auth->getUser()->username ?>!</h1>
	<p><?php echo $auth->getUser()->email ?></p>
</div>

<div>
	<h4>Insert a song:</h4>
	<form method="post">
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
<?php if($song){?>
<div>
	<p>The song <?php echo $song->getTitle() ?>
   with an ID of <?php echo $song->getId() ?>
   was inserted successfully!</p>

</div>
<?php }?>

</body>
</html>