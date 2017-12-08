<?php
require_once(__DIR__.'../IDataSrc.php');
class DatabaseModel extends IDataSrc {
    public function __construct()
    {
    	//Load all data_source
        $this->load->database();
    }
    
    public function getPrices($from, $to, $priceType, $typeOfUse=null, $hotelId, $roomId=null){
    	$query = $this->db->get('prices');
        return $query->result_array();
    }
	public function setPrices($from, $to, $priceType, $typeOfUse=null, $hotelId, $roomId=null){
    	//TODO: implement it
    }

    public function getOccupancy($from, $to, $hotelId, $roomId){}
	
	public function getReservation($from,$to,$typeOfUse,$hotelId,$roomId=NULL){
    	//TODO: implement it
    }
	public function setReservation($from,$to,$typeOfUse,$hotelId,$roomId=NULL){
    	//TODO: implement it
    }
}
?>