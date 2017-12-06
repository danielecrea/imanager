<?php
require_once(__DIR__.'../AbstractHotelManager.php');
class AHController extends AbstractHotelManager {
	public function __construct()
    {
            parent::__construct();
            $this->load->model('standardPricesModel');
            $this->load->helper('url_helper');
    }
    public function getStandardPrices()
    {
            $data['standardPrices'] = $this->news_model->getPrices();
    }
    function getActualPrices(){}
    function getRealAvailabilities(){}
    function setOTAPrices(){}
    function setOfficialWebsitePrices(){}
/*
 	public function view($slug = NULL)
    {
            $data['news_item'] = $this->news_model->get_news($slug);
    }
*/
}
?>