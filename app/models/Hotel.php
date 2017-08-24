<?php
	namespace Models;

	class Hotel{
		public $id;
		public $name;
		public $location;
		public $description;
		public $image;
		public $star_rating;

		public function __construct()
		{
			$this->id = 10;
		}

		public static function mostrar($mensaje)
		{
			echo 'La persona esta diciendo: '. $mensaje;
		}

		public function listar()
		{

		}
	}

?>