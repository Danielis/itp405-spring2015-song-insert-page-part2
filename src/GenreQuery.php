<?php
	namespace Itp\Music;
	require_once dirname(dirname(__file__)). '/vendor/autoload.php';

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