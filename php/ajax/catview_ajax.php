
<?php
	
	require '../mysql.php';

    $catsql = "SELECT * FROM categories";

    $catres = mysql_query($catsql);
    // $num = mysql_num_rows($catres);
    $AR["num"]=0;
    while ($catrow = mysql_fetch_assoc($catres)) {

        //echo "<li><a class = 'ce4opener' id ='".$catrow['id']."'>".$catrow['cat']."</a></li>";
        $AR[$catrow['id']]=$catrow['cat'];
        $AR["num"]=$catrow['id'];
    }	
    
    $js = json_encode($AR);
    echo $js;
?>