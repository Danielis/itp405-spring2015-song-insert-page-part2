<?php

namespace Itp\Music;

require_once __DIR__ . '/Database.php';

	class ArtistQuery extends \Itp\Base\Database{
		public function __construct(){
			session_start();
			parent::__construct();
		}
		public function getAll(){
			$sql = "Select * from artists
					order by artist_name ASC
			";
			$statement = static::$pdo->prepare($sql);
			$statement->execute();

			$artists = $statement->fetchAll(\PDO::FETCH_OBJ);

			return $artists;
		}
	}
//--------------------------------------------------------------------
	class GenreQuery extends \Itp\Base\Database{
		public function __construct(){
			session_start();
			parent::__construct();
		}
		public function getAll(){
			$sql = "
				Select * from genres
				order by genre ASC
			";
			$statement = static::$pdo->prepare($sql);
			$statement->execute();

			$genres = $statement->fetchAll(\PDO::FETCH_OBJ);

			return $genres;
		}
	}
//--------------------------------------------------------------------
	class Song extends \Itp\Base\Database{
		private $title ="";
		private $artistId = 0;
		private $genreId = 0;
		private $price = 0;

		public function __construct(){
			session_start();
			parent::__construct();
		}
		public function setTitle($title){
			$this->title = $title;
			if($this->title = $title){
				return true;
			}
			return false;
		}
		public function setArtistId($artistId){
			$this->artistId = $artistId;
			if($this->artistId ==  $artistId){
				return true;
			}
			return false;
		}
		public function setGenreId($genreId){
			$this->genreId = $genreId;
			if($this->genreId ==  $genreId){
				return true;
			}
			return false;
		}
		public function setPrice($price){
			$this->price = $price;
			if($this->price == $price){
				return true;
			}
			return false;
		}
		public function save(){
			$sql = "
				Insert into songs (title, artist_id, genre_id, price, added, created_at, updated_at)
				values (:title, :artistId, :genreId, :price, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
			"; 
			$statement = static::$pdo->prepare($sql);
			$statement->bindParam(':title', $this->title);
			$statement->bindParam(':artistId', $this->artistId);
			$statement->bindParam(':genreId', $this->genreId);
			$statement->bindParam(':price', $this->price);
			$statement->execute();

		}
		public function getTitle(){
			return $this->title;
		}
		public function getId(){
			return static::$pdo->lastInsertId();
		}
	}
