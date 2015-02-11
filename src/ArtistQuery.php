<?php
	namespace Itp\Music;

	require_once dirname(dirname(__file__)). '/vendor/autoload.php';

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