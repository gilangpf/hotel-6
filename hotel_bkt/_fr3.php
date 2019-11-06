<?php
require '../connect.php';
$product=$_GET['sou'];			//kategori tempat ibadah sekitar
$destinasi=$_GET['destinasi'];	//destinasi angkot
$tipe=$_GET['tipe'];			//tipe hotel

$querysearch	="SELECT DISTINCT hotel.id as id, hotel.name as name, st_x(st_centroid(hotel.geom)) as lon, st_y(st_centroid(hotel.geom)) as lat from hotel left join detail_hotel on detail_hotel.id_hotel=hotel.id left join angkot on detail_hotel.id_angkot=angkot.id left join hotel_type on hotel.id_type=hotel_type.id, souvenir left join detail_product_souvenir on souvenir.id=detail_product_souvenir.id_souvenir left join product_souvenir on detail_product_souvenir.id_product=product_souvenir.id where ";
if ($product!="") {
	$querysearch	.="product_souvenir.id = $product and st_distancesphere(hotel.geom, souvenir.geom) <= 300 ";
}
if($product!=""&&$destinasi!=""){
	$querysearch	.="and ";
}
if($destinasi!=""){
	$querysearch    .="angkot.id = '$destinasi'";  
}
if ($product!=""&&$tipe!="") {
	$querysearch	.="and ";
}else if($destinasi!=""&&$tipe!=""){
	$querysearch	.="and ";
}
if ($tipe!="") {
	$querysearch	.="hotel_type.id = '$tipe'";	
}
$hasil=pg_query($querysearch);
while($baris = pg_fetch_array($hasil))
	{
		  $query="SELECT souvenir.id as id2, souvenir.name as name2, st_x(st_centroid(souvenir.geom)) as lon2, st_y(st_centroid(souvenir.geom)) as lat2 from hotel, souvenir where st_distancesphere(hotel.geom, souvenir.geom) <= 300 and hotel.id='".$baris['id']."'";
		$id=$baris['id'];
		$name=$baris['name'];
		$lat=$baris['lat'];
		$lng=$baris['lon'];
		$res=pg_query($query);
		while($row=pg_fetch_array($res)){
			$id2=$row['id2'];
			$lat2=$row['lat2'];
			$lng2=$row['lon2'];
		}
		$dataarray[]=array('id'=>$id,'name'=>$name, 'id2'=>$id2,'name2'=>$name2,'lng'=>$lng, 'lat'=>$lat, 'lng2'=>$lng2, 'lat2'=>$lat2);
	}
echo json_encode ($dataarray);
// echo $querysearch;
?>