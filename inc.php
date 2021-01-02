<?php 
	$db=mysqli_connect("localhost","root","","ali-mobile-mela");
	
	function make_Id($prefix,$idLen,$lastID)
	{
		$id = intval(substr($lastID,strlen($prefix)) + 1);
		$zr = $idLen - (strlen($id) + strlen($prefix)) ;
		return ($prefix.str_repeat("0",$zr).$id);
	}
		
	function CustId($prefix,$idLen,$lastID)
	{
		$id = intval(substr($lastID,strlen($prefix)) + 1);
		$zr = $idLen - (strlen($id) + strlen($prefix)) ;
		return ($prefix.str_repeat("0",$zr).$id);
		
	}	
	function OderId($prefix,$idLen,$lastID)
	{
		$id = intval(substr($lastID,strlen($prefix)) + 1);
		$zr = $idLen - (strlen($id) + strlen($prefix)) ;
		return ($prefix.str_repeat("0",$zr).$id);
		
	}	
	function Combo($nm,$sql,$sel="")
	{
		$rs=mysqli_query($GLOBALS['db'],$sql);
		$ret="<select id='".$nm."' name='".$nm."'>\n";
		while($row=mysqli_fetch_row($rs))
		{
			if($sel == $row[1])
				$ret.="\t<option value='".$row[1]."' selected >".$row[2]."</option>\n";
			else
				$ret.="\t<option value='".$row[1]."' >".$row[2]."</option>\n";
		}
		$ret.="</select>";
		return $ret;
	}
	function showData($sql )
	{
		$db =  $GLOBALS['db'];
		$rs = mysqli_query($db,$sql);
		$column = mysqli_field_count($db);
		$result = "<table class='tbl' border='1px solid'>\n";
		$result .= "\t<tr>";
		while($colName = mysqli_fetch_field($rs))
		{
			$result .= "\t<th>".$colName->name."</th>";
			}
		$result .= "\t</tr>\n";
		while($row = mysqli_fetch_row($rs))
		{
			$result .= "\t<tr>";
			for($i = 0; $i < $column; $i++)
			{
				$result .= "<td>".$row[$i]."</td>";	
				}
			$result .= "\t</tr>\n";
			}
		$result .= "</table>\n";
		return $result;	
		}

	function showPhone($sql )
	{
		$db =  $GLOBALS['db'];
		$rs = mysqli_query($db,$sql);
		$row = mysqli_fetch_row($rs);
		$column = mysqli_field_count($db);
		$result = "<table class='tbl' border='1px solid'>\n";
		while($row = mysqli_fetch_row($rs)){
				$result .= "<tr>
						<tr><td>".$row[1]."</td></tr>
						<tr><td>".$row[3]."</td></tr>
						<tr><td>".$row[4]."</td></tr>
						<tr><td>".$row[5]."</td></tr>
					</tr>";
		}
		$result .= "</table>\n";
		return $result;	
		}
?>
