<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Error_Exception {
	
	public static function handler(Exception $e)
	{
		if (Kohana::$environment === Kohana::DEVELOPMENT)
		{
			Kohana_Exception::handler($e);
		}
		
		// It's a nice time to log :)
		Kohana::$log->add(Kohana_Log::ERROR, Kohana_Exception::text($e));
		
		if ( ! defined('SUPPRESS_REQUEST'))
		{
			$request = array(
				// 500 error by default
				'action'  => 500,
				
				// If exception has a message this can be passed on
				'message' => rawurlencode($e->getMessage()),
			);
			
			// Override status if HTTP_Exception thrown
			if ($e instanceof HTTP_Exception)
			{
				$request['action'] = $e->getCode();
			}
			
			echo Request::factory(Route::get('kohana_error')->uri($request))
				->execute()
				->send_headers()
				->body();
		}
	}
	
}