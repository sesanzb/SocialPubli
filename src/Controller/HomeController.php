<?php
// src/Controller/HomeController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\SwapiService;

class HomeController extends AbstractController{
    
    /** 
     * @Route("/", name="homepage") 
     */ 
    public function index (Request $request, SwapiService $swapi) {
        $template = $request->isXmlHttpRequest() ? 'home/_table.html.twig' : 'home/index.html.twig';
        $query_string = $request->getQueryString() ?? '';
        return $this->render($template, [
               'response' => json_decode($swapi->getPeople($query_string), true),
        ]);
    } 
}
