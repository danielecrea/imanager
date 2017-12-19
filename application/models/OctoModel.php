<?php
require_once(__DIR__.'../IDataSrc.php');

class OctoModel extends CI_Model {
    public function __construct()
    {
    	//Load all data_source
        //$this->load->helper('zapcallib');        
    }
    
    public function getPrices($from,$to,$priceType,$typeOfUse,$hotelId,$roomId,$typeOfUse){
        //echo "<br>inside octorotemodel $from $to $priceType typeOfUse=$typeOfUse $hotelId $roomId";
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
            curl_close($ch); 
            // Parse XML return and convert to array
            $xml = simplexml_load_string($data);
            $json = json_encode($xml);
            $array = json_decode($json, true);
            $infoData = array();
//            echo "<br>Array<pre>";print_r($array);echo "</pre>";
            if(count($array['RoomsAvailability'])){
                foreach ($array['RoomsAvailability'] as $key => $value) {
                    for($i=0;$i<count($value);$i++){
                        
                        if($value[$i]['@attributes']['RoomId'] && $value[$i]['@attributes']['RoomId'] == $roomId)
                            for($j=0;$j<count($value[$i]['DayAvailability']);$j++ )   {
                                //echo "<br>from=$from to=$to roomId from DB=".$value[$i]['@attributes']['RoomId'].' and ours='.$roomId.' and price-'.$value[$i]['DayAvailability'][$j]['Price'];
                                                                                                                                            $infoData[] = array('id'=>$i,'roomId'=>$value[$i]['@attributes']['RoomId'],'prices'=>$value[$i]['DayAvailability'][$j]['Price']);                            
                            }
                        }
                }
            }
    return $infoData;
    }

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

	
}
?>