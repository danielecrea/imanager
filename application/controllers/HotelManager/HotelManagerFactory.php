public class HotelManagerFactory extends AbstractFactory{

	public function	getHotelManager($typeOfHotelManager)
	{
		switch($typeOfHotelManager)
		{
			case 'ITC':
				return new ITCHotelManager();			
				break;
			
			case 'AH':
				return new AHHotelManager();			
				break;
				
			case 'TES':
				return new TESHotelManager();			
				break;			
		}		
	}
	
}