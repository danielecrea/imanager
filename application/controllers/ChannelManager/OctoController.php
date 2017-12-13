<?php
require_once(__DIR__.'../AbstractChannelManager.php');
class OctoController extends AbstractChannelManager {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('DatabaseModel');
        $this->load->helper('Octorate');
    }
    public function getPrices($from,$to,$hotelId,$priceType)
    {   
        if($priceType == 'OCTO')     
            return $this->OctoModel->getPrices($from, $to,  $priceType, null, $hotelId,null);
        elseif($priceType == 'OWS')
            return $this->DatabaseModel->getPrices($from, $to,  $priceType, null, $hotelId,null);
    }
    
    public function setPrices($from,$to,$prices,$priceType,$hotelId,$roomId=null){}
}
?>