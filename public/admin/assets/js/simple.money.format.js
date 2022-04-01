//Format Number (PRICE 19.999.000 )
function formatPrice($number)
{
	$number = intval($number);
	return $number = number_format($number,0,',','.') ;
}

//Format Number (PRICE 19.999.000 )


 //Format Number (PRICESALE 19.999.000 30% )
 function formatPriceSale($number,$sale)
 {
	$number = intval($number);
	$sale = intval($sale);

	$price = $number*(100-$sale)/100;
	return formatPrice($price);
 }

 //Format Number (PRICESALE 19.999.000 )

