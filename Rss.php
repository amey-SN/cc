<?php 
 $con=mysqli_connect("localhost","root","","test",3308); 
 if (mysqli_connect_errno($con)) { 
 echo "Database connection failed!: " . mysqli_connect_error(); 
 } 
 else 
 echo "<h4>RSS Feed has been rendered</h4>"; 
 $sql = "SELECT * FROM rss_info ORDER BY id DESC LIMIT 20"; 
 $query = mysqli_query($con,$sql); 
 //header( "Content-type: text/xml"); 
 echo "<?xml version='1.0' encoding='UTF-8'?> 
 <rss version='2.0'> 
 <channel> 
 <title>w3schools.in | RSS</title> 
 <link>https://www.w3schools.in/</link> 
 <description>Cloud RSS</description> 
 <language>en-us</language>"; 
 while($row = mysqli_fetch_array($query)){ 
 $title=$row["title"]; 
 $link=$row["link"]; 
 $description=$row["description"]; 
 echo "<item> 
 <title>$title</title> 
 <link>$link</link> 
 <description>$description</description> 
 </item>"; 
 } 
 echo "</channel></rss>"; 
?> 