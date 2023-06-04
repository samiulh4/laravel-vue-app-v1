<?php

namespace App\Modules\JobSearch\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Goutte\Client;
//use Symfony\Component\HttpClient\HttpClient;
use GuzzleHttp\Client as GuzzleClient;
use App\Modules\JobSearch\Models\JobWebList;
use App\Modules\JobSearch\Models\JobUrlToFetch;
use App\Modules\JobSearch\Models\JobDataMaster;
use DateTime;

class JobScrapController extends Controller
{
  public function jobScrap()
  {
       try{
           $jobWeb = JobWebList::where('id', 1)->first();

           $goutteClient = new Client();
           $guzzleClient = new GuzzleClient(array(
               'timeout' => 60,
               'verify' => false
           ));
           $goutteClient->setClient($guzzleClient);
           $crawler = $goutteClient->request('GET', 'https://jobs.bdjobs.com/jobsearch.asp?fcatId=8&icatId=');

           $crawler->filter('.job-title-text a')->each(function ($node) use($jobWeb) {
               $jobDetailsUrl = $node->attr('href');
               # Check if the link is missing the https prefix
               if (strpos($jobDetailsUrl, 'http') !== 0) {
                   $jobDetailsUrl = $jobWeb->web_host.$jobDetailsUrl;
               }


               $jobUrlToFetch = new JobUrlToFetch();
               $jobUrlToFetch->web_url = $jobDetailsUrl;
               $jobUrlToFetch->job_web_id = $jobWeb->id;
               $jobUrlToFetch->is_active = 1;
               $jobUrlToFetch->save();

           });

           print 'Data Successfully Store';
           //$href = $crawler->filter('a')->attr('href');
           //dd($href);
       }catch (\Exception $e){

       }
  }//end -:- jobScrap()
  public function jobScrapUrl()
  {
      try{
          $jobUrlToFetch = JobUrlToFetch::where('is_active', '=', 1)
              ->where('job_web_id', '=', 1) // For BDJobs
              ->first();
          $goutteClient = new Client();
          $guzzleClient = new GuzzleClient(array(
              'timeout' => 60,
              'verify' => false
          ));
          $goutteClient->setClient($guzzleClient);
          $crawler = $goutteClient->request('GET', $jobUrlToFetch->web_url);
          $title          = $crawler->filter('.job-title')->first()->text();
          $vacancy_number = $crawler->filter('.vac p')->first()->text();
          $job_des        = $crawler->filter('.job_des ul')->extract(['_text']);
          $description    = $job_des[0];
          $responsibility = $job_des[1];
          $location       = $crawler->filter('.job_loc p')->first()->text();
          $salary         = $crawler->filter('.salary_range h4')->first()->text();
          $published_on   = $crawler->filter('.job-summary h4')->first()->text();
          $published_on   = trim($published_on);
          $published_on   = str_replace('Published on:', '', $published_on);
          $published_on   = str_replace(' ', '-', $published_on);
          $published_on   = trim($published_on);
          $date_obj = DateTime::createFromFormat(' d-M-Y', $published_on);
          $output_date = $date_obj->format('Y-m-d');
          //$published_on   = date('d-M-Y', strtotime($published_on));
          dd($output_date);

//          $jobDataMaster = new JobDataMaster();
//          $jobDataMaster->job_web_id = $jobUrlToFetch->job_web_id;
//          $jobDataMaster->title = $title;
          print 'Data Successfully Store';
      }catch (\Exception $e){
        dd('[Line] => '. $e->getLine(). '[File] =>'.$e->getFile().'[Message] =>' .$e->getMessage());
      }
  }// end -:- jobScrapUrl()
}// end -:- JobScrapController
