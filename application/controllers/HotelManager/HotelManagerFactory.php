<?php
require_once(__DIR__.'/../AbstractFactory.php');
require_once(__DIR__.'../ITCController.php');
require_once(__DIR__.'../AHController.php');
require_once(__DIR__.'../TESController.php');
class HotelManagerFactory extends AbstractFactory{
	public static function	getChannelManager($typeOfChannelManager){}
	
	public static function	getHotelManager($typeOfHotelManager)
	{
		switch($typeOfHotelManager)
		{
			case 'ITC':
				return new ITCController();			
				break;
			
			case 'AH':
				return new AHController();			
				break;
				
			case 'TES':
				return new TESController();			
				break;			
		}		
	}
	
}
?>