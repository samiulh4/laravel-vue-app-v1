<?php

namespace App\Modules\WebCrawler\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Goutte\Client;
//use Symfony\Component\HttpClient\HttpClient;
use GuzzleHttp\Client as GuzzleClient;

class WebCrawlerController extends Controller
{
    public function webScraping()
    {
        $goutteClient = new Client();
        $guzzleClient = new GuzzleClient(array(
            'timeout' => 60,
            'verify' => false
        ));
        $goutteClient->setClient($guzzleClient);
        $crawler = $goutteClient->request('GET', 'https://www.symfony.com/blog/');
        $crawler->filter('a')->each(function ($node) {
            //print $node->text()."<br/>";
            print $node->attr('href')."<br/>";
        });
        //$href = $crawler->filter('a')->attr('href');
        //dd($href);
    }//end -:- webScraping()

}// end -:- WebCrawlerController
