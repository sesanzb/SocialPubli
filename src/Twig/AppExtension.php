<?php
// src/Twig/AppExtension.php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('parse_url', [$this, 'parseUrl']),
        ];
    }

    public function parseUrl ( $url = '', $component = '' )
    {
        switch ($component) {
            case 'scheme' :
                return parse_url($url, PHP_URL_SCHEME);
            case 'host' :
                return parse_url($url, PHP_URL_HOST);
            case 'port' :
                return parse_url($url, PHP_URL_PORT);
            case 'user' :
                return parse_url($url, PHP_URL_USER);
            case 'pass' :
                return parse_url($url, PHP_URL_PASS);
            case 'path' :
                return parse_url($url, PHP_URL_PATH);
            case 'query' :
                return parse_url($url, PHP_URL_QUERY);
            case 'fragment' :
                return parse_url($url, PHP_URL_FRAGMENT);
            default :
                return parse_url($url);
        }
    }
}
