<?php
require_once(__DIR__.'../IDataSrc.php');
require_once(APPPATH.'libraries/zapcallib.php');

class StandardAvailabiltyModel extends IDataSrc {
    public function __construct()
    {
    	//Load all data_source
        $this->load->helper('zapcallib');        
    }
    public function getPrice($slug = FALSE){
    	//to do
    }
    public function getPrices($from=NULL,$to=NULL,$hotelId=NULL,$roomId=NULL,$typeOfUse=NULL,$slug=FALSE ){
    	//todo
    }
	public function setPrices($from,$to,$hotelId,$roomId='',$typeOfUse=''){
    	
    }
	public function getOccupancy($from,$to,$hotelId,$roomId='',$typeOfUse=''){
           if(!$hotelId || !$from || !$to)
            return false;
        $icalfile = $icalfeed = $icalobj = $dtstart = $start = $dateTimezone = $onlyDate = $timezone = '';
        $count = $ecount = 0;
        $dates = array();

        $icalfile = APPPATH."\ics\basic.ics";        
        $icalfeed = file_get_contents($icalfile);

        // create the ical object
        $icalobj = new ZCiCal($icalfeed);

        //echo "Number of events found: " . $icalobj->countEvents() . "<br>";

        // Format DateTime Object        
        $fromDate = $from->format('Y-m-d');
        $toDate = $to->format('Y-m-d');

        // read back icalendar data that was just parsed
        if(isset($icalobj->tree->child))
        {
            foreach($icalobj->tree->child as $node)
            {
                if($node->getName() == "VEVENT")
                {
                    $ecount++;
                    //echo "Event $ecount:\n<br>";
                    foreach($node->data as $key => $value)
                    {
                        /*if(is_array($value) && !empty($value))
                        {
                            for($i = 0; $i < count($value); $i++)
                            {
                                //if(strpos($value[$i],'mailto:') === false){
                                    $p = $value[$i]->getParameters();
                                    if($key == 'DTSTART'){
                                        $d=$value[$i]->getValues();
                                        //echo "  $key: " . $d . "\n<br>";
                                        $start = new DateTime($d, new DateTimeZone('UTC'));
                                        $start->setTimezone(new DateTimeZone('Europe/Rome'));
                                        //$end   = clone $start;
                                        //$end->modify(sprintf('+ %d seconds', 1*60*60));

                                    }
                                //}
                            }//for
                        }
                        else
                        {*/
                            if($key == 'DTSTART'){

                                $dtstart = $value->getValues();
                                $start = new DateTime($dtstart, new DateTimeZone('UTC'));
                                // convert to Rome timezone
                                $start->setTimezone(new DateTimeZone('Europe/Rome'));

                                $dateTimezone = $start->format('Y-m-d\THis\Z');
                                $onlyDate = $start->format('Y-m-d');

                                // explode  dateTimezone t0 get the time 
                                $timezone = explode('T',$dateTimezone);
                                
                                // get the count within the range    
                                if($onlyDate >= $fromDate AND $onlyDate <= $toDate) 
                                {
                                    //$dates[$count] = $dd1[1];//dates[$dd[1]][$dd1[0]][] = $dd1[1];
                                    $count=$count+1;
                                }
                            }
                        //}//ellse
                    }
                }
            }
        }//if
        return ($count/10);
    }
    
	public function getReservation($from,$to,$hotelId,$roomId,$typeOfUse){
    	//TODO: implement it
    }
	public function setReservation($from,$to,$hotelId,$roomId,$typeOfUse){
    	//TODO: implement it
    }
}
?>