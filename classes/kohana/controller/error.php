<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Controller_Error extends Controller {
	
	public function before()
	{
		// External requests default to 404
		if ($this->request->is_initial())
		{
			$this->request->action(404);
		}
		
		return parent::before();
	}
	
	public function action_404()
	{
		$this->response->status(404);
	}
	
	public function action_500()
	{
		$this->response->status(500);
	}
	
}