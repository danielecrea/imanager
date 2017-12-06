<?php
require_once(__DIR__.'../IDataSrc.php');
class StandardPricesModel extends IDataSrc {
    public function __construct()
    {
    	//Load all data_source
        $this->load->database();
    }
    public function getPrice($slug = FALSE){
    	if ($slug === FALSE)
        {
                $query = $this->db->get('prices');
                return $query->result_array();
        }

        $query = $this->db->get_where('prices', array('slug' => $slug));
        return $query->row_array();
    }
    public function getPrices($from=NULL,$to=NULL,$hotelId=NULL,$roomId=NULL,$typeOfUse=NULL,$slug=FALSE ){
    	if ($slug === FALSE)
        {
                $query = $this->db->get('prices');
                return $query->result_array();
        }

        $query = $this->db->get_where('prices', array('slug' => $slug));
        return $query->row_array();
    }
	public function setPrices($from,$to,$hotelId,$roomId,$typeOfUse){
    	//TODO: implement it
    }
	public function getOccupancy($from,$to,$hotelId,$roomId,$typeOfUse){
    	//TODO: implement it
    }
	public function getReservation($from,$to,$hotelId,$roomId,$typeOfUse){
    	//TODO: implement it
    }
	public function setReservation($from,$to,$hotelId,$roomId,$typeOfUse){
    	//TODO: implement it
    }
}
?>