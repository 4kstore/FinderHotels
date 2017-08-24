<?php

class Hotel extends Controller
{

	public function index ()
	{
		$client = new \GuzzleHttp\Client();
		$res = $client->request('GET', 'https://us-central1-id90travel-be846.cloudfunctions.net/hotels?token=0781d79f2d7e7b7f0f7ace1ed6e015989c4d&search=vegas', ['verify' => false]);
		echo $res->getStatusCode();
		// 200
		echo $res->getHeaderLine('content-type');
		// 'application/json; charset=utf8'
		echo $res->getBody();
		// '{"id": 1420053, "name": "guzzle", ...}'


		die();
		$hotel = $this->model('Hotel');
		$hotel->id = $id;

		$this->view('hotel/index', ['hotel' => $hotel]);
	}



}