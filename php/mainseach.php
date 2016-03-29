<?php
	$mainsql = "select entries.*, categories.cat,logins.username from entries , categories , logins
				where entries.cat_id = categories.id and entries.wri_id = logins.id
				order by dateposted DESC
				limit 1;";
	$mainres = mysql_query($mainsql);
	if( mysql_num_rows( $mainres ) )
	{
		$mainrow = mysql_fetch_assoc($mainres );     
	}
	else 
	{
		mysql_error(); 
	}   		
	$post = "<i>In <a href='#3' class = 'tit' id = '".$mainrow['cat_id']."' >".$mainrow['cat'].
		"</a>  -  Posted on ".$mainrow['dateposted']."  By  <span class ='username'>".$mainrow['username']."</span></i>";



	$comsql = "SELECT * FROM comments WHERE blog_id =
		".$mainrow['id']." ORDER BY dateposted DESC;";
		$comres =mysql_query($comsql);
		$comrownum = mysql_num_rows( $comres);
		if( $comrownum >=2 )
		{
			$comsql1 = "SELECT * FROM comments WHERE blog_id =
		".$mainrow['id']." ORDER BY dateposted DESC LIMIT 1;";
			$comres1 = mysql_query($comsql1);
			$comrow1 = mysql_fetch_assoc($comres1);
			$comsql2 = "SELECT * FROM comments WHERE blog_id =
		".$mainrow['id']." ORDER BY dateposted ASC LIMIT 1;";
			$comres2 = mysql_query($comsql2);
			$comrow2 = mysql_fetch_assoc($comres2);
		}
		elseif ($comrownum == 1)
		{
						$comsql1 = "SELECT * FROM comments WHERE blog_id =
		".$mainrow['id']." ORDER BY dateposted DESC LIMIT 1;";
			$comres1 = mysql_query($comsql1);
			$comrow1 = mysql_fetch_assoc($comres1);
		}

		$good = $mainrow['good'];

	?>
