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
            foreach ($array['RoomsAvailability'] as $key => $value) {

                for($i=0;$i<count($value);$i++){
                    $infoData[$i] = array('id'=>($i+1),'roomId'=>$value[$i]['@attributes']['RoomId'],'price'=>$value[$i]['DayAvailability']['Price'],'date'=>$value[$i]['DayAvailability']['@attributes']['day']);
                    }
            }
    return $infoData;
    }

    public function setPrices($from,$to,$priceType,$typeOfUse,$hotelId,$roomId){}
	
}
?>