<?php
// src/Service/SwapiService.php
namespace App\Service;

use Symfony\Component\HttpFoundation\Response;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\HandlerStack;
use Kevinrob\GuzzleCache\CacheMiddleware;
use Kevinrob\GuzzleCache\Strategy\GreedyCacheStrategy;
use Kevinrob\GuzzleCache\Storage\DoctrineCacheStorage;
use Doctrine\Common\Cache\FilesystemCache;

class SwapiService
{   
    private $cacheTTL;
    private $client;
    
    public function __construct( $cacheTTL ) {
        $this->cacheTTL = $cacheTTL;
        $stack = HandlerStack::create();
  
        // Greedy caching
        // It performs much better than Private and Public
        $stack->push(
          new CacheMiddleware(
            new GreedyCacheStrategy(
              new DoctrineCacheStorage(
                new FilesystemCache('cache')
              ),
              $this->cacheTTL,
            )
          ), 
          'greedy-cache'
        );
        
        $this->client = new Client([
            'base_uri' => 'https://swapi.co/api/',
            'handler' => $stack
        ]);
    }
    
    public function getPeople (string $query_string = '') {
        try{
            $response = $this->client->get(
                    'people/', 
                    [
                        'allow_redirects' => false,
                        'query' => $query_string
                    ]
            );
            return $response->getBody();
        } catch (RequestException $exception) {
            return new Response(
                $exception->getMessage()
            );
        }
    }  
}