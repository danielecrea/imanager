<?php
require_once(__DIR__.'../IDataSrc.php');
class DatabaseModel extends IDataSrc {
    public function __construct()
    {
    	//Load all data_source
        $this->load->database();
    }
    
    public function getPrices($from, $to, $priceType, $typeOfUse=null, $hotelId, $roomId=null){
        $filter = array();
        //TODO: filter per from, to and hotelId
        if ($priceType!=null)  $filter['priceTypeId'] = $priceType;
        if ($typeOfUse!=null)  $filter['typeOfUse'] = $typeOfUse;
        //if ($hotelId!=null)  $filter['hotelId'] = $hotelId;
        if ($roomId!=null)  $filter['roomId'] = $roomId;
        $query = $this->db->get_where('prices', $filter);
        return $query->result_array();
    }
	public function setPrices($from, $to, $priceType, $typeOfUse=null, $hotelId, $roomId=null){
    	//TODO: implement it
    }

    public function getOccupancy($from, $to, $hotelId, $roomId=null){
        $filter = array();
        //TODO: this is just to simulate the algorithm. Get occupancy from the google calendar
        if ($hotelId!=null)  $filter['hotelId'] = $hotelId;
        if ($roomId!=null)  $filter['roomId'] = $roomId;
        $query = $this->db->get_where('occupancies', $filter);
        return $query->result_array();

    }
	
	public function getReservation($from,$to,$typeOfUse,$hotelId,$roomId=NULL){
    	//TODO: implement it
    }
	public function setReservation($from,$to,$typeOfUse,$hotelId,$roomId=NULL){
    	//TODO: implement it
    }
    public function getRooms($hotelId){
        $filter = array();
        if ($hotelId!=null)  $filter['hotelId'] = $hotelId;
        $query = $this->db->get_where('rooms', $filter);
<<<<<<< HEAD
=======
//        print_r($query->result_array());
        return $query->result_array();
    }

    public function getOctoRoomId($id,$typeOfUse){
        $filter = array();
        //echo "$id $typeOfUse";
        if (!($id == ''))  $filter['roomId'] = $id;
        if ($typeOfUse!=null)  $filter['typeOfUse'] = $typeOfUse;
        $query = $this->db->get_where('room_mapping', $filter);
        //print_r($query->result_array());
>>>>>>> parent of d5c35f0... all the changes for occupancy
        return $query->result_array();
    }
    public function setRoom(){}

}
?>