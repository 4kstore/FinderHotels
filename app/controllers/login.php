<?php
use \GuzzleHttp\Client;
use models\Login as loginModel;

class Login extends Controller
{
	const REDIRECT_AFTER_LOGIN = 'hotel';

	public function index()
	{
		$login_status = true;
		$model = new loginModel();
		$airlines = [];

		if (!empty($_POST))
		{
			$model->user = !empty($_POST['user']) ? $_POST['user'] : '';
			$model->pass = !empty($_POST['pass']) ? $_POST['pass'] : '';
			$model->airline = !empty($_POST['airline']) ? $_POST['airline'] : '';

			//If we don't have lucky we need to know so we can send an error msg
			$login_status = $this->doLogin($model);
		}

		$client = new Client();
		$airlinesReq = $client->request(
			'GET',
			$this->config->get('endpoints')['airlines'],
			['verify' => false]
		);

		//Get the airlines availables to fill the select
		if ($airlinesReq->getStatusCode() === 200);
			$airlines = json_decode($airlinesReq->getBody());

		$this->view(
			'login/index', [
				'model' => $model,
				'airlines' => $airlines,
				'login_status' => $login_status
			],
			'login'
		);
	}

	/**
	 * Get the token from this user to login.
	 * @param Login model with user info
	 * @return boolean or redirect.
	 */
	protected function doLogin($model)
	{
		$client = new Client();
		$response = $client->request('POST', $this->config->get('endpoints')['session'], [
		    'form_params' => [
		        'user' => $model->user,
		        'pass' => $model->pass,
		        'airline' => $model->airline
		    ],
		   	'verify' => false
		]);

		if ($response->getStatusCode() === 200)
		{
			$response = json_decode($response->getBody());

			if (!empty($response->token))
			{
				//Save the token in a session before leaves.
				$model->saveSessionToken($response->token);
				header("Location: ". self::REDIRECT_AFTER_LOGIN);
				exit();
			}
		}

		return false;
	}
}