<?php
session_start();
?>
<html>
<div class="form" style="position:absolute;text-align:left;margin-top:5%;">

	
	<?php
	
	$name=$_SESSION['name'];
	$con=mysql_connect("localhost","root","4244");
			if(!$con)
			{die("Failed:".mysql_error());
			}
			
			mysql_select_db("anomoly_report",$con);
			
			$q2=mysql_query("select * from inbox where f_user='$name' AND st2='1' order by idn desc");
            $q3=mysql_query("select * from inbox where f_user='$name' AND st2='1' order by idn desc");
			$p=mysql_fetch_array($q3);
			if($p==NULL)
			echo 'No messages in your Sentbox';
		else
		{
		
		while($r=mysql_fetch_array($q2))
			{
			echo '<form action="sent_det.php" method="post" style="margin-top:2.8%">';
			if($r['subject']=="")
				{
				$sub='**NO SUBJECT**';
				$msg=$r['msg'];
				$t_user=$r['t_user'];
				$idn=$r['idn'];
				echo "<input type='text' name='sub' value='$sub' style='width:0;height:0;border:none' />";
				echo "<input type='text' name='idn' value='$idn' style='width:0;height:0;border:none' />";
				echo "<input type='text' name='msg' value='$msg' style='width:0;height:0;border:none' />";
				echo "<input type='text' name='t_user' value='$t_user' style='width:0;height:0;border:none' />";
				echo '<input type="submit" style="text-align:left; background:none; border:0.01px solid;background-color:#F0F8FF; border-radius:5px; height:30px;width:600px;font-family:arial;margin-top:-2.3%;" value=Subject:-&nbsp;&nbsp;NO&nbsp;SUBJECT&nbsp;>'.'<div style="text-align:right;margin-top:-2.8%;">To:&nbsp;&nbsp;'.$r['t_user'].'&nbsp;&nbsp;</div>';
				echo '</input>';
				
				}
				
			else
				{
				
				$str1=$r['subject'].'&nbsp;&nbsp;';
				$sub=$r['subject'];
				$msg=$r['msg'];
				$t_user=$r['f_user'];
				$idn=$r['idn'];
				echo "<input type='text' name='sub' value='$sub' style='width:0;height:0;border:none' />";
				echo "<input type='text' name='idn' value='$idn' style='width:0;height:0;border:none' />";
				echo "<input type='text' name='msg' value='$msg' style='width:0;height:0;border:none' />";
				echo "<input type='text' name='t_user' value='$t_user' style='width:0;height:0;border:none' />";
				echo '<input type="submit" style="text-align:left; background:none; border:0.01px solid;background-color:#F0F8FF;
				border-radius:5px; height:30px;width:600px;font-family:arial;" value=&nbsp;&nbsp;&nbsp;&nbsp;Subject:-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VIEW />'.
				'<div style="margin-top:-4%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
				$r["subject"].'</div>'.'<div style="text-align:right;margin-top:-3.5%;">To:&nbsp;&nbsp;'.$r['t_user'].'&nbsp;&nbsp;'.'</input></div>'
				.'<div style="margin-top:-3.3%;"><input type="checkbox" name="check" id="check"/></div>';
				}
			echo '</form>';
			}
		}
	?>

</div>
</html>