<?php
require_once(__DIR__.'/../ChannelAbstractFactory.php');
require_once(__DIR__.'../OctoController.php');
//require_once(__DIR__.'../TESController.php');
class ChannelManagerFactory extends ChannelAbstractFactory{

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