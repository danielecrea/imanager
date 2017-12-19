<?php
require_once(__DIR__.'../IDataSrc.php');
//require_once(APPPATH.'libraries/zapcallib.php');

class OctoModel extends IDataSrc {
    public function __construct()
    {
    	//Load all data_source
        //$this->load->helper('zapcallib');        
    }
    
    public function getPrices($from,$to,$priceType,$typeOfUse,$hotelId,$roomId){
<<<<<<< HEAD
=======
        //echo "<br>inside octorotemodel $from $to $priceType $typeOfUse $hotelId $roomId";
>>>>>>> parent of d5c35f0... all the changes for occupancy
        $url = $content = $ch = $xml = $json = $array = $data = '';
        $url = "https://www.octorate.com/api/live/callApi.php?method=GetAvailability";
        $content = 'xml=<?xml version="1.0" encoding="UTF-8"?>
                <GetAvailability>
                    <Auth>
                        <ApiKey>f08ecb1d4a42f34b4f19049cd0f6aebd</ApiKey>
                        <PropertyId>18972</PropertyId>
                    </Auth>

                    <From>'.$from.'</From>
                    <To>'.$to.'</To>
                </GetAvailability>';
                $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/x-www-form-urlencoded; charset=utf-8'));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt($ch, CURLOPT_POSTFIELDS,$content);
            $data = curl_exec($ch);
//            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch); 
            // Parse XML return and convert to array
            $xml = simplexml_load_string($data);
            $json = json_encode($xml);
            $array = json_decode($json, true);
            $infoData = array();
<<<<<<< HEAD
            foreach ($array['RoomsAvailability'] as $key => $value) {

                for($i=0;$i<count($value);$i++){
                    $infoData[$i] = array('id'=>($i+1),'roomId'=>$value[$i]['@attributes']['RoomId'],'price'=>$value[$i]['DayAvailability']['Price'],'date'=>$value[$i]['DayAvailability']['@attributes']['day']);
                    }
=======
            if(count($array['RoomsAvailability'])){
                foreach ($array['RoomsAvailability'] as $key => $value) {
                    for($i=0;$i<count($value);$i++){
                        
                        if($value[$i]['@attributes']['RoomId'] && $value[$i]['@attributes']['RoomId'] == $roomId)
                            for($j=0;$j<count($value[$i]['DayAvailability']);$j++ )   {
                                //echo "<br>from=$from to=$to roomId from DB=".$value[$i]['@attributes']['RoomId'].' and ours='.$roomId.' and price-'.$value[$i]['DayAvailability'][$j]['Price'];
                                $infoData[] = $value[$i]['DayAvailability'][$j]['Price'];                            
                            }
                        }
                }
>>>>>>> parent of d5c35f0... all the changes for occupancy
            }
    return $infoData;
    }

<<<<<<< HEAD
    public function setPrices($from,$to,$priceType,$typeOfUse,$hotelId,$roomId){}
	
=======
    public function setPrices($from,$to,$priceType,$typeOfUse,$hotelId,$roomId){
        echo "<br>";
    }

    public function getOccupancy($from, $to, $hotelId, $roomId){
        echo "<br>";
    }
    public function getReservation($from,$to,$hotelId,$roomId,$typeOfUse){
        echo "<br>";
    }
    public function setReservation($from,$to,$hotelId,$roomId,$typeOfUse){
        echo "<br>";
    }
>>>>>>> parent of d5c35f0... all the changes for occupancy
}
?>