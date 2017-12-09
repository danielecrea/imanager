<h3>Please check if you want to apply these prices</h3>
<table>
<!--create header	-->
<?php   
	foreach ($prices as $roomsPrices){
?>
		<th colspan="4"><?php echo key($roomsPrices); ?></th>
		<tr><td>Date</td><td>TypeOfUse</td><td>Price</td><td>SuggestedPrice</td><tr>
		
			<?php
				foreach ($roomsPrices as $pricesPerRoom) {
					foreach ($pricesPerRoom as $pricesPerUse) {
						foreach ($pricesPerUse as $priceItem) {
						?>
							<tr>	
								<td>
								<?php
								  echo $priceItem["old prices"][0]["date"];
								?>
								</td>
								<td>
								<?php
								  echo key($pricesPerUse);
								?>
								</td>
								<td>
								<?php
								  echo $priceItem["old prices"][0]["price"];
								?>
								</td>
								<td>
								<?php
								  echo $priceItem["new prices"][0]["price"];
								?>
								</td>
							</tr>
		<?php			}
					}
				}
	}
			?>	
</table>

    <div class="main">
    <br/>

<?php //endforeach; ?>
<input type="submit" name="confirmPrices" value="Apply Prices"/>
