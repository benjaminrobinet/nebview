<?php
	namespace Utils;

	/**
	* URL Parser for the Router (also for MVC)
	*/
	class Parser
	{
		private $url;

		static function getURL()
		{
			$url = isset($_SERVER['HTTPS']) ? 'https://' : 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER['REQUEST_URI'];
			return $url;
		}

		static function getParams()
		{
			# Get url
			$url = parse_url(self::getURL(), PHP_URL_PATH);

			# Parse the URL to only keep params
			$parsedurl = str_replace(WEBROOT, "", $url);
			
			# Split the parsed URL to get params
			$params = explode("/", $parsedurl);
			$params = !empty($params[0]) ? $params : NULL;

			return $params;
			
		}

		static function getQuery()
		{
			# Get url
			$url = parse_url(self::getURL(), PHP_URL_QUERY);

			# Parse the URL to only keep query
			$parsedurl = str_replace(WEBROOT, "", $url);
			
			# Split the parsed URL to get query
			$query = explode("/", $parsedurl);
			$query = !empty($query[0]) ? $query : NULL;

			return $query;
		}
	}
?>