<?php

function points($res){
	$points=0;
		for($i=5;$i<10;$i++)
		{
			if($res[$i]==1){$points++;}
		}
		for($i=10;$i<15;$i++)
		{
			if($res[$i]==1){$points=$points+2;}
		}
		for($i=15;$i<20;$i++)
		{
			if($res[$i]==1){$points=$points+3;}
		}
		for($i=20;$i<25;$i++)
		{
			if($res[$i]==1){$points=$points+4;}
		}
		return $points;
}
function pt_indice($res,$indice){
	$points=$res[3];
	if($points!=0)
	{
		echo "<br><p>".$indice."</p>";
		$points-=1;
	}
	return $points;
}

?>