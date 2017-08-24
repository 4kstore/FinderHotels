<?php

class Controller {

	public function model($model)
	{
		require_once '../app/models/'. $model .'.php';
		return new $model();
	}

	public function view($view, $data = '', $template = 'index')
	{
       if (!empty($data))
            extract($data);

        unset($data);
        require_once '../app/template/'. $template .'-header.php';
        require_once '../app/views/' . $view . '.php';
        require_once '../app/template/'. $template .'-footer.php';
	}
}