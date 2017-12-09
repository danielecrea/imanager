<h3>Please check if you want to apply these prices</h3>
<?php print_r($prices);//foreach ($prices as $prices_item): ?>

        <h3><?php //echo $prices_item['id']; ?></h3>
        <div class="main">
                <?php //echo $prices_item['date']." ".$prices_item['roomId']." ".$prices_item['typeOfUse']." ".$prices_item['price']." ".$prices_item['standardPrice']; ?>
        </div>
        <br/>

<?php //endforeach; ?>
<input type="submit" name="confirmPrices" value="Apply Prices"/>