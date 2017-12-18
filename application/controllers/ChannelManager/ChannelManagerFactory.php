<?php
require_once(__DIR__.'/../AbstractFactory.php');
require_once(__DIR__.'../OctoController.php');
class ChannelManagerFactory extends AbstractFactory{
	public static function	getHotelManager($typeOfHotelManager){}

	public static function	getChannelManager($typeOfChannelManager)
	{
		switch($typeOfChannelManager)
		{
			case 'OCTO':
				return new OctoController();			
				break;				
		}		
	}
	
}
?>