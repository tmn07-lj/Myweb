<?php 

require_once '../mysql.php';

if(isset($_POST['sub'])==TRUE)
{

	$sql = "select entries.*, categories.cat ,logins.username from entries , categories ,logins
				 where logins.id = entries.wri_id and entries.cat_id = categories.id AND entries.subject = '".$_POST['sub']."';";
	$res = mysql_query($sql);
	
	$row = mysql_fetch_assoc($res);
	$num = mysql_num_rows($res);
	//echo $num;
	//print_r ($_POST['sub']);
	//echo mysql_error();
	$post = "<i>In <a href='#3' class = 'tit' id = '".$row['cat_id']."'>".$row['cat'].
		"</a>  -  Posted on ".$row['dateposted']."  By  <span class ='username'>".$row['username']."</span></i>";


	$comsql = "SELECT * FROM comments WHERE blog_id =
		".$row['id']." ORDER BY dateposted DESC;";
		$comres =mysql_query($comsql);
		$comrownum = mysql_num_rows( $comres);

	$AR = array('subject'=>$row['subject'],
		'post'=>$post,'body'=>$row['body'],'comnum'=>$comrownum);

		if( $comrownum >=2 )
		{
			$comsql1 = "SELECT * FROM comments WHERE blog_id =
		".$row['id']." ORDER BY dateposted DESC LIMIT 1;";
			$comres1 = mysql_query($comsql1);
			$comrow1 = mysql_fetch_assoc($comres1);
			$comsql2 = "SELECT * FROM comments WHERE blog_id =
		".$row['id']." ORDER BY dateposted ASC LIMIT 1;";
			$comres2 = mysql_query($comsql2);
			$comrow2 = mysql_fetch_assoc($comres2);

		$AR = array('subject'=>$row['subject'],
		'post'=>$post,'body'=>$row['body'],'comnum'=>$comrownum,
		'com1name'=>$comrow1['name'],'com1com'=>$comrow1['comment'],
		'com2name'=>$comrow2['name'],'com2com'=>$comrow2['comment'] );

		}
		elseif ($comrownum == 1)
		{
			$comsql1 = "SELECT * FROM comments WHERE blog_id =
		".$row['id']." ORDER BY dateposted DESC LIMIT 1;";
			$comres1 = mysql_query($comsql1);
			$comrow1 = mysql_fetch_assoc($comres1);
		$AR = array('subject'=>$row['subject'],
		'post'=>$post,'body'=>$row['body'],'comnum'=>$comrownum,
		'com1name'=>$comrow1['name'],'com1com'=>$comrow1['comment']);
		}

		$AR['good']=$row['good'];
		$AR['blog_id']=$row['id'];
	$js= json_encode($AR);
	echo $js;

}
else
{
}
?>