<?php
    //$conn = mysqli_connect('localhost', 'root', '', 'atnshop') or die("Can not connect database".mysqli_connect_error());
	
	//mysqli_query($Connect,'SET NAMES "utf8"');
	//mysqli_close($Connect);*/
    $Conn = pg_connect("postgres://gyqkziltcyrjxl:6c53f023ee9e684b2eb433eede614cb778837a947e9207bcd68e6561be57a824@ec2-3-217-91-165.compute-1.amazonaws.com:5432/d5g0tpt0devfq4");
    //$Connect = pg_connect("host=localhost port=5432 dbname=postgres");
	//$Connect = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=123456");
	
    if (!$Conn) {
        die("Connection failed");
    }
?>