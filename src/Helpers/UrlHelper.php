<?php
class UrlHelper
{
	public static function absoluteUrl($relativeUrl = null)
	{
		if ($relativeUrl === null)
		{
			$relativeUrl = '/' . ltrim($_SERVER['REQUEST_URI'], '/');
		}
		if (strpos($relativeUrl, '://') !== false)
		{
			$absoluteUrl = $relativeUrl;
		}
		else
		{
			$absoluteUrl = !empty(Config::$baseUrl)
				? Config::$baseUrl
				: $_SERVER['HTTP_HOST'];
			$absoluteUrl = rtrim($absoluteUrl, '/') . '/';
			$absoluteUrl .= ltrim($relativeUrl, '/');
		}
		if (!empty($p))
		{
			$absoluteUrl .= '?' . http_build_query($p);
		}
		$absoluteUrl = preg_replace('/(?<!:)\/\//', '/', $absoluteUrl);
		return $absoluteUrl;
	}
}
