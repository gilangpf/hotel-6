<?php
require '../connect.php';
$category=$_GET['category'];//kategori tempat ibadah sekitar
$tw=$_GET['tw'];			//wisata
$tipe=$_GET['tipe'];		//tipe hotel

$querysearch	="SELECT DISTINCT hotel.id as id, hotel.name as name, st_x(st_centroid(hotel.geom)) as lon, st_y(st_centroid(hotel.geom)) as lat, tourism.id as id2, tourism.name as name2, st_x(st_centroid(tourism.geom)) as lon2, st_y(st_centroid(tourism.geom)) as lat2, worship_place.id as id3, worship_place.name as name3, st_x(st_centroid(worship_place.geom)) as lon3, st_y(st_centroid(worship_place.geom)) as lat3";

$querysearch	.=" from hotel left join hotel_type on hotel.id_type=hotel_type.id, tourism where ";
if ($tw!="") {
	$querysearch	.="tourism.id = '$tw' and st_distancesphere(hotel.geom, tourism.geom) <= 300 ";
}
if($tw!=""&&$category!=""){
	$querysearch	.="and ";
}
if($category!=""){
	$querysearch	.="category_worship_place.id = $category and st_distancesphere(hotel.geom, worship_place.geom) <= 300 "; 
}
if ($tw!=""&&$tipe!="") {
	$querysearch	.="and ";
}else if($category!=""&&$tipe!=""){
	$querysearch	.="and ";
}
if ($tipe!="") {
	$querysearch	.="hotel_type.id = '$tipe'";	
}
$hasil=pg_query($querysearch);
while($baris = pg_fetch_array($hasil))
	{
		  $id=$baris['id'];
		  $name=$baris['name'];
		  $id2=$baris['id2'];
		  $name2=$baris['name2'];
		  $lat=$baris['lat'];
		  $lng=$baris['lon'];
		  $lat2=$baris['lat2'];
		  $lng2=$baris['lon2'];
		  $dataarray[]=array('id'=>$id,'name'=>$name, 'id2'=>$id2,'name2'=>$name2,'lng'=>$lng, 'lat'=>$lat, 'lng2'=>$lng2, 'lat2'=>$lat2);
	}
echo json_encode ($dataarray);
// echo $querysearch;
?>