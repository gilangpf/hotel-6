<?php
	$host = "ec2-174-129-253-104.compute-1.amazonaws.com";
	$user = "cobszfkrdpakdr";
	$pass = "ac33ed91148526785e3e73e92e72e25d97be733b9cbaef44e49da0c399757cd3";
	$port = "5432";
	$dbname = "dfspalvm3d8ip5";
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>