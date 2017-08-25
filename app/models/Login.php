<?php
	namespace models;

	class Login
	{
		public $user;
		public $pass;
		public $airline;

		public function saveSessionToken($token)
		{
			session_start();
			$_SESSION['user_token'] = $token;
		}

		public function checkSessionToken()
		{
			session_start();
			return !empty($_SESSION['user_token']) ? true : false;
		}
	}
?>