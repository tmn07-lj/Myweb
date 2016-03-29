<?php
	if(isset($_GET['id'])==TRUE)
	{
			$sql = "select entries.*, categories.cat , logins.username from entries , categories , logins
				 where entries.cat_id = categories.id and entries.wri_id = logins.id AND entries.id = '".$_GET['id']."';";
			$res = mysql_query($sql);
			$row = mysql_fetch_assoc($res); //判断该id的blog不存在？？？
	$post = "<i>In ".$row['cat'].
		"  -  Posted on ".$row['dateposted']."  By  ".$row['username']."</i>";

		$comsql = "SELECT * FROM comments WHERE blog_id =
		".$row['id']." ORDER BY dateposted DESC;";
		$comres =mysql_query($comsql);

	}
	else{
		echo "?????";
	}
?>