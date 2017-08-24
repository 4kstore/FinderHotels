<?php

class Login extends Controller{

	public function index ()
	{
		$model = $this->model('Login');
		$airlines = [];

		$client = new \GuzzleHttp\Client();
		$airlinesReq = $client->request('GET', 'https://us-central1-id90travel-be846.cloudfunctions.net/airlines', ['verify' => false]);

		if ($airlinesReq->getStatusCode() === 200);
			$airlines = json_decode($airlinesReq->getBody());


		$this->view('login/index', [
				'model' => $model,
				'airlines' => $airlines
			],
		'login');
	}

}