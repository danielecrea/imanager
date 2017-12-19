<?php
require_once(__DIR__.'../IDataSrc.php');
require_once 'C:/Server/Bitnami/wampstack-5.5.30-0/g-api/vendor/autoload.php';

class GCalModel extends IDataSrc {
    public function __construct()
    {
    	//Load all data_source
       // $this->load->helper('zapcallib');        
    }
    
    public function getPrices($from,$to,$priceType,$typeOfUse,$hotelId,$roomId){}
    public function setPrices($from,$to,$priceType,$typeOfUse,$hotelId,$roomId){}

	public function getOccupancy($from,$to,$hotelId,$roomId='',$typeOfUse=''){
        //echo "<br>$from $to";
        //if(!$hotelId || !$from || !$to)
          //  return false;
        $client = $service = $calendarId = $results = $start = $timezone = $client_file = '';
        $dates = $timezone = $occupancy = array();
        $counter = 0;
        $client_file = APPPATH.'/config/NearStation.json';
        $client = new Google_Client();
        $client->setApplicationName("Google Calendar PHP API");

        $client->setAuthConfig($client_file);
        $client->setScopes(array('https://www.googleapis.com/auth/calendar.readonly'));
        $service = new Google_Service_Calendar($client);
        $calendarId = 'inthecenteryoutoo@gmail.com' ;

        $optParams = array(
          'maxResults' => 1000,
          'orderBy' => 'startTime',
          'singleEvents' => TRUE,
          'timeMin' => (new DateTime($from))->format(DateTime::RFC3339),
          'timeMax' => (new DateTime($to))->add(new DateInterval('P1D'))->format(DateTime::RFC3339),
        );
        //echo "<br>optParams<pre>";print_r($optParams);echo "</pre>";
        $results = $service->events->listEvents($calendarId, $optParams);
        if (count($results->getItems()) > 0) {
            foreach ($results->getItems() as $event) {
                $start = $event->start->dateTime;                
                if (empty($start)) {
                  $start = $event->start->date;
                }
                //echo "<br>start=$start";
                $timezone = explode('T',$start);
                if($timezone[1]) {
                    $dates[$timezone[0]][] = $timezone[1];
                    }
                }
        }
        //echo "<br>timezone<pre>";print_r($dates);echo "</pre>";
        foreach($dates as $date=>$array){
            $count = count($array);
            $occupancy[] = $count/5;
        }
        //echo "<br>occupancy<pre>";print_r($occupancy);echo "</pre>";
        return ($occupancy);
    }
    
    public function getReservation($from,$to,$hotelId,$roomId,$typeOfUse){}
    public function setReservation($from,$to,$hotelId,$roomId,$typeOfUse){}
}
?>