<?php
use \GuzzleHttp\Client;
use models\Login as LoginModel;
use models\Hotel as HotelModel;

class Hotel extends Controller
{
	public function index()
	{
		//Check the session before the action begins
		$this->checkSession();

		//save the search in a var to filter later because the endpoint didn't work
		$search = !empty($_POST['search']) ? trim($_POST['search']) : '';
		$hotelsObjects = [];

		$client = new Client();
		$res = $client->request(
			'GET',
			$this->config->get('endpoints')['hotels'].'?token='. $_SESSION['user_token'].'&search='.$search.';',
			['verify' => false]
		);

		if ($res->getStatusCode() === 200)
		{
			$responseHotels = json_decode($res->getBody()->getContents());

			if (!empty($responseHotels->response[0]))
			{
				$hotels = $responseHotels->response[0];

				foreach (reset($hotels) as $hotel)
				{
					$h = new HotelModel();

					$h->id = $hotel->id;
					$h->name = $hotel->name;
					$h->location = $hotel->location;
					$h->description = $hotel->description;
					$h->image = $hotel->image;
					$h->star_rating = $hotel->star_rating;

					$hotelsObjects[] = $h;
				}

				//Time to filter by the search
				if (!empty($search))
				{
					$model = new HotelModel();
					$hotelsObjects = $model->filterSearch($hotelsObjects, $search);
				}
			}
		}

		$this->view('hotel/index', [
			'hotels' => $hotelsObjects,
			'search' => $search
		]);
	}

	//If we don't have an active session go to login, sorry..
	public function checkSession()
	{
		$login = new LoginModel();

		if ($login->checkSessionToken() === false)
		{
			header("Location: login");
			exit();
		}

		return true;
	}
}