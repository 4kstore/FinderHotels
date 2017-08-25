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

		/**
		 * Filter the list of hotels using the search form
		 * @param array $listOfHotels without filtering
		 * @param string search words
		 * @return array with filtered hotels
		 */
		public function filterSearch($listOfHotels, $search)
		{
			$filteredHotels = array_filter($listOfHotels, function($listOfHotels) use ($search) {

	           	if (stripos($listOfHotels->name, $search) !== false)
		           	return true;
	           	if (stripos($listOfHotels->location->city, $search) !== false)
		           	return true;
	           	if (stripos($listOfHotels->description, $search) !== false)
		           	return true;

			    return false;
			});

			return $filteredHotels;
		}
	}

?>