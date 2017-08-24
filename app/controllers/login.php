<?php
use \GuzzleHttp\Client;
use models\Login as loginModel;

class Login extends Controller{

	public function index ()
	{
		$login_status = true;
		$model = new loginModel();
		$airlines = [];

		if (!empty($_POST))
		{
			$model->user = !empty($_POST['user']) ? $_POST['user'] : '';
			$model->pass = !empty($_POST['pass']) ? $_POST['pass'] : '';
			$model->airline = !empty($_POST['airline']) ? $_POST['airline'] : '';

			$login_status = $this->doLogin($model);
		}

		$client = new Client();
		$airlinesReq = $client->request('GET', 'https://us-central1-id90travel-be846.cloudfunctions.net/airlines', ['verify' => false]);

		if ($airlinesReq->getStatusCode() === 200);
			$airlines = json_decode($airlinesReq->getBody());

		$this->view('login/index', [
				'model' => $model,
				'airlines' => $airlines,
				'login_status' => $login_status
			],
		'login');
	}

	protected function doLogin($model)
	{
		$client = new Client();
		$response = $client->request('POST', 'https://us-central1-id90travel-be846.cloudfunctions.net/session', [
		    'form_params' => [
		        'user' => $model->user,
		        'pass' => $model->pass,
		        'airline' => $model->airline
		    ]
		]);

		if ($response->getStatusCode() === 200)
		{
			$response = json_decode($response->getBody());

			if (!empty($response->token))
			{
				$model->saveSessionToken($response->token);
				header("Location: hotel");
				exit();
			}
		}

		return false;
	}

}