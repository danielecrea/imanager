<?php
require_once(__DIR__.'../AbstractHotelManager.php');
require_once(__DIR__.'../AbstractChannelManager.php');
class ITCController extends AbstractHotelManager {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('DatabaseModel');
        $this->load->model('ICalModel');
        $this->load->model('OctoModel');
        $this->load->helper('url_helper');
        $this->load->library('forecastprices');
        //$this->load->library('googleclient');
    }
    public function getPrices($from,$to,$hotelId,$priceType)
    {        
        if($priceType == 'Octorate')
            return $this->Octorate->getPrices($from, $to,  $priceType, null, $hotelId,null);
        else
            return $this->DatabaseModel->getPrices($from, $to,  $priceType, null, $hotelId,null);
    }

    
    public function getOccupancy($from,$to,$hotelId,$roomId=null) {
        return $this->ICalModel->getOccupancy($from,$to,$hotelId);
    }
    public function setPrices($from,$to,$prices,$priceType,$hotelId,$roomId=null){
        //TODO: if priceType=1 we should set the new prices on the official website, if priceType=2 we should set pices on octorate
    }
}
?>