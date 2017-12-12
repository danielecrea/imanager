<?php
require_once(__DIR__.'/HotelManager/HotelManagerFactory.php');
require_once(__DIR__.'/HotelManager/AbstractHotelManager.php');

class Prices extends CI_Controller {
	protected $hotelManager;
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->hotelManager = HotelManagerFactory::getHotelManager("ITC");
    }
    public function index($from,$to,$hotelId,$priceType)
    {
            //$data['prices'] = $this->hotelManager->getStandardPrices($from,$to,$hotelId,$priceType);
    }

    public function forecastPrices($from=null,$to=null,$priceType=null,$hotelId=null,$page =NULL)
    {
        $page="SuggestedPrices";

        if (!file_exists(APPPATH.'views/prices/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['prices'] = $this->hotelManager->forecastPrices($from,$to,$priceType,$hotelId); 
        
        $this->load->view('templates/header', $data);
        $this->load->view('prices/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    // When user submit data on view page, Then this function store data in array.
    public function setNewPrices() {
        //TODO: for ITC,AH and TES, if you are going to update priceType=1 it means we have to update prices of the official website, if priceType=2 it means we have to update prices on octorate 
        print_r($this->input->post('roomsPrices'));
        return;
    }
    public function setPrices(){
        //TODO: to implement it
    }

    public function view($page = 'index')
    {
    	if ( ! file_exists(APPPATH.'views/prices/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
        $data['title'] = ucfirst($page); // Capitalize the first letter
        
        //$data['prices'] = $this->hotelManager->getStandardPrices();  

        $this->load->view('templates/header', $data);
        $this->load->view('prices/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}