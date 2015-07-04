
<?php 

if(!empty($_GET['result']))
{
	/*$result= $_GET['result'];
	echo $_GET['result'];
	
	$zahl1 = intval(substr($_GET['result'],0,1));
	$zeichen = substr($_GET['result'],1,1);
	$zahl2 = intval(substr($_GET['result'],2,1));*/
	$result = '' ;
	
	//eval ("\$result=$result;");
	
	//echo strpos($_GET['result'], '+') . '<hr>'  ;
	$plus = explode('+', $_GET['result']) ;
	$minus = explode('-', $_GET['result']) ;
	$mul = explode('*', $_GET['result']) ;
	$div = explode('/', $_GET['result']) ;
	
	
	$plusResult = '' ;
	$minusResult = '' ;
	$mulResult = '' ;
	$divResult = '' ;
	
	
	if (count($plus) > 1) {
		
		foreach($plus as $plusKey => $plusVal) {
			
			$plusResult += $plusVal ;
		}
	}
	
	if (count($minus) > 1) {
		
		foreach($minus as $minusKey => $minusVal) {
			
			if ($minusKey == 0)
				$flagNumber = $minusVal ;
			else
				$minusResult = $flagNumber - $minusVal ;
		}
	}
	
	if (count($mul) > 1) {
		
		foreach($mul as $mulKey => $mulVal) {
			
			if ($mulKey == 0)
				$flagNumber = $mulVal ;
			else
				$mulResult = $flagNumber * $mulVal ;
		}
	}
	
	if (count($div) > 1) {
		
		foreach($div as $divKey => $divVal) {
			
			if ($divKey == 0)
				$flagNumber =$divVal ;
			else
				$divResult = $flagNumber / $divVal ;
		}
	}
	//var_dump($plus,$minus,$mul,$div);
	if (!empty($plusResult))
		$result = $plusResult ;
	if (!empty($minusResult))
		$result = $minusResult ;
	if (!empty($mulResult))
		$result = $mulResult ;
	if (!empty($divResult))
		$result = $divResult ;
	//var_dump($plusResult,$minusResult,$mulResult,$divResult);
	
	
}
else
{
	$result = "";
	
}
?>


<html>
<head>
<title>Taschenrechner</title> </head>
<body  style="background-color:white">


<script type="text/javascript">

function hintergrundGelb(event) {
    
	if(event){
		event.target.style='background-color: yellow';
	}
}

function hintergrundWeiss(event) {

    if(event){
		event.target.style='background-color: lightblue';
	}

}

function Feldsetzen (zeichen) {
  window.document.myform.result.value = window.document.myform.result.value + zeichen;
}  
function reset() {
  window.document.myform.result.value =' ';
}  


</script>


<hr>
<form action="#" id = 'myform' name="myform" method="get"> 


<br /><br />
<table border=10 id='calendar'cellpadding="20" cellspacing="5">
				
		<tr>
			<th colspan=4 >Taschenrechner</th>
						
		</tr>
			
		<tr style="background-color:lightblue">
			<td  align ="center" id='zahl7'   onclick="Feldsetzen('7')" onMouseover = "hintergrundGelb(event)" onMouseout = "hintergrundWeiss(event)" >7</td>
			<td  align ="center" id='zahl8'  onclick="Feldsetzen('8')" onMouseover = "hintergrundGelb(event)" onMouseout = "hintergrundWeiss(event)" >8</td>
			<td  align ="center" id='zahl9'  onclick="Feldsetzen('9')" onMouseover = "hintergrundGelb(event)" onMouseout = "hintergrundWeiss(event)" >9</td>
			<td  align ="center" id='div'    onclick="Feldsetzen('/')" onMouseover = "hintergrundGelb(event)" onMouseout = "hintergrundWeiss(event)" >/</td>
		</tr>
		
		<tr style="background-color:lightblue">
			<td  align ="center" id='zahl4'  onclick="Feldsetzen('4')" onMouseover = "hintergrundGelb(event)" onMouseout = "hintergrundWeiss(event)" >4</td>
			<td  align ="center" id='zahl5'  onclick="Feldsetzen('5')" onMouseover = "hintergrundGelb(event)" onMouseout = "hintergrundWeiss(event)" >5</td>
			<td  align ="center" id='zahl6'  onclick="Feldsetzen('6')" onMouseover = "hintergrundGelb(event)" onMouseout = "hintergrundWeiss(event)" >6</td>
			<td  align ="center" id='mul'    onclick="Feldsetzen('*')" onMouseover = "hintergrundGelb(event)" onMouseout = "hintergrundWeiss(event)" >*</td>
		</tr>
			
			
		<tr style="background-color:lightblue">
			<td  align ="center" id='zahl1'  onclick="Feldsetzen('1')" onMouseover = "hintergrundGelb(event)" onMouseout = "hintergrundWeiss(event)" >1</td>
			<td  align ="center" id='zahl2'  onclick="Feldsetzen('2')" onMouseover = "hintergrundGelb(event)" onMouseout = "hintergrundWeiss(event)" >2</td>
			<td  align ="center" id='zahl3'  onclick="Feldsetzen('3')" onMouseover = "hintergrundGelb(event)" onMouseout = "hintergrundWeiss(event)" >3</td>
			<td  align ="center" id='sub'    onclick="Feldsetzen('-')" onMouseover = "hintergrundGelb(event)" onMouseout = "hintergrundWeiss(event)" >-</td>
		</tr>
		
		<tr style="background-color:lightblue">
			<td  align ="center" id='zahl0'  onclick="Feldsetzen('0')" onMouseover = "hintergrundGelb(event)" onMouseout = "hintergrundWeiss(event)" >0</td>
			<td  align ="center" id='punkt'  onclick="Feldsetzen('.')" onMouseover = "hintergrundGelb(event)" onMouseout = "hintergrundWeiss(event)" >.</td>
			<td  align ="center" id='mod' 	 onclick="reset()" 	   onMouseover = "hintergrundGelb(event)" onMouseout = "hintergrundWeiss(event)" >C</td>
			<td  align ="center" id='plus'   onclick="Feldsetzen('+')" onMouseover = "hintergrundGelb(event)" onMouseout = "hintergrundWeiss(event)" >+</td>
		</tr>	
				
		</table><br>
		

		<input  type="text" name="result" align="right" class="result" value="<?php if(isset($result)){echo $result;} ?>"/><br>
		<input  type="submit" name="Absenden" value="Ausrechnen" style="background-color:skyblue" />
		
</form>


</body>
</html>