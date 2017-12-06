<?php
require_once(__DIR__.'/HotelManager/HotelManagerFactory.php');
require_once(__DIR__.'/HotelManager/AbstractHotelManager.php');

class Prices extends CI_Controller {
	public $hotelManager;
	public function __construct()
    {
            $this->hotelManager = HotelManagerFactory::getHotelManager("ITC");
    }
    public function index()
    {
            $data['standardPrices'] = $this->hotelManager->getStandardPrices();
    }

    public function view($page = 'index')
    {
    	if ( ! file_exists(APPPATH.'views/prices/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('prices/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}