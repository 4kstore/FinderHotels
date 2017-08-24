<?php
	namespace models;

	class Hotel
	{
		public $id;
		public $name;
		public $location;
		public $description;
		public $image;
		public $star_rating;

		public function filterSearch($object, $search)
		{
			$filtered = array_filter($object, function($object) use ($search) {

	           	if (stripos($object->name, $search) !== false)
		           	return true;
	           	if (stripos($object->location->city, $search) !== false)
		           	return true;
	           	if (stripos($object->description, $search) !== false)
		           	return true;

			    return false;
			});

			return $filtered;
		}
	}

?>