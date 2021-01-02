<?php
	$db=mysqli_connect("localhost","root","","ali-mobile-mela");
	
	function make_id($preFix,$idLen,$lastID)
	{
		$id=intval(substr($lastID,strlen($preFix)))+1;
		$zln=$idLen -(strlen($id)+strlen($preFix));
		return($preFix.str_repeat("0",$zln).$id);		
	}
	function LookUP($sql,$pos=0)
	{
		print $sql."<hr>";
		$rs=mysqli_query($GLOBALS['db'],$sql);
		$r=mysqli_fetch_row($rs);
		return($r[$pos]);
	}
	function MakeID($preFix,$idLen,$tblName,$pKey)
	{
		$mxID=LookUP("SELECT MAX($pKey) FROM $tblName WHERE $pKey LIKE CONCAT('".$preFix."','%')");
		$num=$idLen-strlen($preFix);
		$n=intval(substr($mxID,-$num))+1;
		$n=str_pad($n,$num,"0",STR_PAD_LEFT);
		//$id=intval(substr($lastID,strlen($preFix)))+1;
		//$zln=$idLen -(strlen($id)+strlen($preFix));
		//return($preFix.str_repeat("0",$zln).$id);		
		return($preFix.$n);
	}
	function Combo($nm,$sql,$sel="")
	{
		$rs=mysqli_query($GLOBALS['db'],$sql);
		$ret="<select id='".$nm."' name='".$nm."'>\n";
		while($row=mysqli_fetch_row($rs))
		{
			if($sel == $row[0])
				$ret.="\t<option value='".$row[0]."' selected >".$row[1]."</option>\n";
			else
				$ret.="\t<option value='".$row[0]."' >".$row[1]."</option>\n";
		}
		$ret.="</select>";
		return $ret;
	}
	function ShowData($sql,$cls="tbl")
	{
		$db=$GLOBALS['db'];
		$rs=mysqli_query($db,$sql);
		//print $rs->num_rows;
		//print "<hr>";
		
		$col= mysqli_field_count($db);
		$ret="<table class='".$cls."'>\n";
		$ret.="\t<tr>";
		while($colName=mysqli_fetch_field($rs))
		{
			$ret.= "<th>".$colName->name."</th>";
		}
		$ret.="\t</tr>\n";
		while($row=mysqli_fetch_row($rs))
		{
			$ret .="\t<tr>";
			for($i=0;$i<$col; $i++)
			{
				$ret.="<td>".$row[$i]."</td>";
			}
			$ret .="\t</tr>\n";
		}
		$ret .="</table>\n";
		return $ret;
	}
	function MakeProductID($preFix,$idLen,$tblName,$pKey)
	{
		$sql = "SELECT MAX(productID) FROM product WHERE productID LIKE ('".$preFix."%')";
		
		$rs = mysqli_query($GLOBALS['db'],$sql);
		$row = mysqli_fetch_row($rs);
		$lastID = $row[0];
		$id = intval(substr($lastID,strlen($preFix))) + 1;
		$zln = $idLen - (strlen($preFix) + strlen($id));
		return ($preFix.str_repeat("0",$zln).$id);
	}
?>