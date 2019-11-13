<?php
	require '../connect.php';
	$query="SELECT a.id, a.name, st_x(st_centroid(a.geom)) as lon, st_y(st_centroid(a.geom)) as lat, b.gallery_hotel FROM hotel as a left join hotel_gallery as b on a.id=b.id";
	$hasil=pg_query($query);
	while ($row=pg_fetch_array($hasil)) {
		  $id=$row['id'];
		  $name=$row['name'];
		  $lat=$row['lat'];
		  $lng=$row['lon'];
		  $img=$row['gallery_hotel'];
		  $dataarray[]=array('id'=>$id,'name'=>$name, 'lng'=>$lng, 'lat'=>$lat, 'img'=>$img);
	}
	echo json_encode ($dataarray);
?>