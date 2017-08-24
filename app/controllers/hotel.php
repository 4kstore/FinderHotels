<?php
use \GuzzleHttp\Client;
use models\Login as loginModel;
use models\Hotel as hotelModel;

class Hotel extends Controller
{

	public function index()
	{
		$this->checkSession();

		$search = !empty($_POST['search']) ? trim($_POST['search']) : '';
		$hotelsObjects = [];

		$client = new Client();
		$res = $client->request(
			'GET',
			'https://us-central1-id90travel-be846.cloudfunctions.net/hotels?token='. $_SESSION['user_token'].'&search='.$search.';',
			['verify' => false]
		);

		if ($res->getStatusCode() === 200)
		{
			$responseHotels = json_decode($res->getBody()->getContents());

			if (!empty($responseHotels->response[0]))
				$hotels = $responseHotels->response[0];


			foreach (reset($hotels) as $hotel)
			{
				$h = new hotelModel();

				$h->id = $hotel->id;
				$h->name = $hotel->name;
				$h->location = $hotel->location;
				$h->description = $hotel->description;
				$h->image = $hotel->image;
				$h->star_rating = $hotel->star_rating;

				$hotelsObjects[] = $h;
			}

			if (!empty($search))
			{
				$model = new hotelModel();
				$hotelsObjects = $model->filterSearch($hotelsObjects, $search);
			}
		}

		$this->view('hotel/index', [
			'hotels' => $hotelsObjects,
			'search' => $search
		]);
	}

	public function checkSession()
	{
		$login = new loginModel();

		if ($login->checkSessionToken() === false)
		{
			header("Location: login");
			exit();
		}

		return true;
	}
}