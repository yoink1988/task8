<?php


class myCurl
{
	public $url = 'https://www.google.com.ua/search?q=';
	public function __construct($request)
	{
		$request = urlencode($request);
		$this->url = $this->url.$request;
	}


	public function getCurl()
	{
		$c = curl_init();
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_URL, $this->url);
		curl_setopt($c, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0');
		curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($c,CURLOPT_SSL_VERIFYHOST,FALSE);
		curl_setopt($c,CURLOPT_SSL_VERIFYPEER,FALSE);
		$response = curl_exec($c);
		curl_close($c);
		return $response;
	}


}
