<?php include_once 'header.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>HIGH STRENGTH CONCRETE MIX DESIGN</title>
</head>
<body>

<form>
		<div class="selecter">
			<div class="slect">
				<p>Required Average Compressive Strength(Mpa):</p>
				<br>
				<select name="acs">
					<option>--select--</option>
					<option value="50">50</option>
					<option value="55">55</option>
					<option value="60">60</option>
					<option value="70">70</option>
					<option value="75">75</option>
					<option value="80">80</option>
				</select>	
				<br>
			  	<br>
			  	<h4 class="heading">COARSE AND FINE AGGREGATE</h4>
			 	<br>
			  	<p>Nominal Maximum Aggregate Size(mm):</p>
				<select name="mas">
					<option>--select--</option>
					<option value="10">10</option>
					<option value="12.5">12.5</option>
					<option value="20">20</option>
					<option value="25">25</option>
				</select>	
				<br>
			 	<br>
				<p>Maximum Dry Density(kgs per cubic metre)</p>
				<input type="number" name="mdd">
				<br>
			 	<br>
				<p>Density of Aggregates(kgs per cubic metre)</p>
				<input type="number" name="aggregatedensity">
				<br>
			 	<br>
				<p>Cost of Coarse Aggregate(per kg)</p>
			 			<input type="number" step="0.01" name="costofCoarse">
			 	<br>
			 	<br>
			 	<p>Cost of Fine aggregate(per kg)</p>
			 			<input type="number" step="0.01" name="costofFines">
			 	<br>
			 	<br>
			 	<h4 class="heading">CEMENT:</h4>
			 	<br>
				<p>Density of Cement(kgs per cubic metre)</p>
				<input type="number" name="cementDensity">
				<br>
			 	<br>
				<p>Cost of Cement(per kg)</p>
			 	<input type="number" step="0.01" name="costofCement">
			 	<br>
			 	<br>
				<p>Strength at:</p>
				<select name="days">
					<option>--select--</option>
					<option value="28">28</option>
					<option value="56">56</option>
				</select>	
				<br>
				<br>
				<p>Slump(mm):</p>
				<select name="slump">
					<option>--select--</option>
					<option value="25">25-50</option>
					<option value="50">50-75</option>
					<option value="75">75-100</option>
				</select>
				<br>
			 	<br>
				<h4 class="heading">SILICA FUME:</h4>
				<br>
				<select name="silica">
					<option>--select--</option>
					<option value="0.15">15</option>
					<option value="0.2">20</option>
					<option value="0.25">25</option>
					<option value="0.30">30</option>
					<option value="0.35">35</option>
				</select>
				<br>
			 	<br>
				<p>Cost of Silica Fume per kg</p>
			 			<input type="number" step="0.01" name="costofSilica">
			 	<br>
			 	<br>
				<h4 class="heading">WATER REDUCER</h4>
				<br>
			 			<p>With HRWRA/Without HRWRA</p>
				 		<select name="sp">
							<option>--select--</option>
							<option value="1">with HRWRA</option>
							<option value="2">without HRWRA</option>
						</select>
				<br>
			 	<br>
			 			<p>Water Reduction (%)</p>
			 			<input type="number" name="waterReduction">
			 	<br>
				<br>
			 			<p>Dosage (g per kg of cement)</p>
			 			<input type="number" name="dosage">
			 			<br>
			 			<br>
			 			<p>Cost of Water Reducer (per litre)</p>
			 			<input type="number" name="costofwr">
			 			<br>
			 			<br>
			 			<p>Cost of Water per litre</p>
			 			<input type="number" step="0.01" name="costofWater">
			 			<br>
			 			<br>
		<button type="submit" name="submit" value="submit">Calculate</button>
				<br>
				<br>
</form>

<?php

$watercementratio = 1;
$waterRequired = 0;
$watertobeAdded  = 0;
$Cementtobeadded = 0;
$coarsemass  = 0;
$fineAggregate = 0;
$waterreducer = 0;
$SilicaFume = 0;
#water required and air content calculation
function WaterRequirement($mas,$slump,$waterrequirementandaircontent)
		{
			if ($slump == 25) {
				if ($mas == 10) {
					$wr = $waterrequirementandaircontent[0];
				}elseif ($mas == 12.5) {
					$wr = $waterrequirementandaircontent[1];
				}elseif ($mas == 20) {
					$wr = $waterrequirementandaircontent[2];
				}elseif ($mas == 25) {
					$wr = $waterrequirementandaircontent[3];
				}else{
					$wr = "Error: Unexpected values provided"; 
				}
			}
			if ($slump == 50) {
				if ($mas == 10) {
					$wr = $waterrequirementandaircontent[4];
				}elseif ($mas == 12.5) {
					$wr = $waterrequirementandaircontent[5];
				}elseif ($mas == 20) {
					$wr = $waterrequirementandaircontent[6];
				}elseif ($mas == 25) {
					$wr = $waterrequirementandaircontent[7];
				}else{
					$wr = "Error: Unexpected values provided"; 
				}
			}
			if ($slump == 75) {
				if ($mas == 10) {
					$wr = $waterrequirementandaircontent[8];
				}elseif ($mas == 12.5) {
					$wr = $waterrequirementandaircontent[9];
				}elseif ($mas == 20) {
					$wr = $waterrequirementandaircontent[10];
				}elseif ($mas == 25) {
					$wr = $waterrequirementandaircontent[11];
				}else{
					$wr = "Error: Unexpected values provided"; 
				}
			}
			return $wr;

		}

		function AirEntrained($mas,$waterrequirementandaircontent)
		{
				if ($mas == 10) {
					$ae = $waterrequirementandaircontent[12];
				}elseif ($mas == 12.5) {
					$ae = $waterrequirementandaircontent[13];
				}elseif ($mas == 20) {
					$ae = $waterrequirementandaircontent[14];
				}elseif ($mas == 25) {
					$ae = $waterrequirementandaircontent[15];
				}else{
					$wr = "Error: Unexpected values provided"; 
				}

				return $ae;
		}
		$waterrequirementandaircontent = array(184,175,169,166,190,184,175,172,196,190,181,178,2.5,2.0,1.5,1.0);

		if(isset($_GET['submit'])){
			$slump = $_GET['slump'];
			if (isset($_GET['mas'])) {
				$mas = $_GET['mas'];
			}
		
			$waterRequired = WaterRequirement($mas,$slump,$waterrequirementandaircontent);
			 #echo "The water required:";
			 #echo $waterRequired;
			 #echo "<br>";
			 $airContent = AirEntrained($mas,$waterrequirementandaircontent);
			 #echo "The air content:";
			 #echo $airContent;
			 #echo "<br>";
		}
			 #echo "<br>";




#water to cement ratio calculation
		function WatertoCement($acs,$sp,$mas,$days,$wcratio)
		{

			if ($acs == 50) {
				if ($days == 28) {
					if ($mas == 10) {
						if ($sp == 1) {
							$wcm = $wcratio[0];
						}elseif ($sp == 2) {
							$wcm = $wcratio[1];
						}
					}elseif ($mas == 12.5) {
						if ($sp == 1) {
							$wcm = $wcratio[2];
						}elseif ($sp == 2) {
							$wcm = $wcratio[3];
						}
					}elseif ($mas == 20) {
						if ($sp == 1) {
							$wcm = $wcratio[4];
						}elseif ($sp == 2) {
							$wcm = $wcratio[5];
						}
					}elseif ($mas == 25) {
						if ($sp == 1) {
							$wcm = $wcratio[6];
						}elseif ($sp == 2) {
							$wcm = $wcratio[7];
						}
					}
				}elseif ($days == 56) {
					if ($mas == 10) {
						if ($sp == 1) {
							$wcm = $wcratio[8];
						}elseif ($sp == 2) {
							$wcm = $wcratio[9];
						}
					}elseif ($mas == 12.5) {
						if ($sp == 1) {
							$wcm = $wcratio[10];
						}elseif ($sp == 2) {
							$wcm = $wcratio[11];
						}
					}elseif ($mas == 20) {
						if ($sp == 1) {
							$wcm = $wcratio[12];
						}elseif ($sp == 2) {
							$wcm = $wcratio[13];
						}
					}elseif ($mas == 25) {
						if ($sp == 1) {
							$wcm = $wcratio[14];
						}elseif ($sp == 2) {
							$wcm = $wcratio[15];
						}
					}
				}
			}
			if ($acs == 55) {
				if ($days == 28) {
					if ($mas == 10) {
						if ($sp == 1) {
							$wcm = $wcratio[16];
						}elseif ($sp == 2) {
							$wcm = $wcratio[17];
						}
					}elseif ($mas == 12.5) {
						if ($sp == 1) {
							$wcm = $wcratio[18];
						}elseif ($sp == 2) {
							$wcm = $wcratio[19];
						}
					}elseif ($mas == 20) {
						if ($sp == 1) {
							$wcm = $wcratio[20];
						}elseif ($sp == 2) {
							$wcm = $wcratio[21];
						}
					}elseif ($mas == 25) {
						if ($sp == 1) {
							$wcm = $wcratio[22];
						}elseif ($sp == 2) {
							$wcm = $wcratio[23];
						}
					}
				}elseif ($days == 56) {
					if ($mas == 10) {
						if ($sp == 1) {
							$wcm = $wcratio[24];
						}elseif ($sp == 2) {
							$wcm = $wcratio[25];
						}
					}elseif ($mas == 12.5) {
						if ($sp == 1) {
							$wcm = $wcratio[26];
						}elseif ($sp == 2) {
							$wcm = $wcratio[27];
						}
					}elseif ($mas == 20) {
						if ($sp == 1) {
							$wcm = $wcratio[28];
						}elseif ($sp == 2) {
							$wcm = $wcratio[29];
						}
					}elseif ($mas == 25) {
						if ($sp == 1) {
							$wcm = $wcratio[30];
						}elseif ($sp == 2) {
							$wcm = $wcratio[31];
						}
					}
				}
			}
			if ($acs == 60) {
				if ($days == 28) {
					if ($mas == 10) {
						if ($sp == 1) {
							$wcm = $wcratio[32];
						}elseif ($sp == 2) {
							$wcm = $wcratio[33];
						}
					}elseif ($mas == 12.5) {
						if ($sp == 1) {
							$wcm = $wcratio[34];
						}elseif ($sp == 2) {
							$wcm = $wcratio[35];
						}
					}elseif ($mas == 20) {
						if ($sp == 1) {
							$wcm = $wcratio[36];
						}elseif ($sp == 2) {
							$wcm = $wcratio[37];
						}
					}elseif ($mas == 25) {
						if ($sp == 1) {
							$wcm = $wcratio[38];
						}elseif ($sp == 2) {
							$wcm = $wcratio[39];
						}
					}
				}elseif ($days == 56) {
					if ($mas == 10) {
						if ($sp == 1) {
							$wcm = $wcratio[40];
						}elseif ($sp == 2) {
							$wcm = $wcratio[41];
						}
					}elseif ($mas == 12.5) {
						if ($sp == 1) {
							$wcm = $wcratio[42];
						}elseif ($sp == 2) {
							$wcm = $wcratio[43];
						}
					}elseif ($mas == 20) {
						if ($sp == 1) {
							$wcm = $wcratio[44];
						}elseif ($sp == 2) {
							$wcm = $wcratio[45];
						}
					}elseif ($mas == 25) {
						if ($sp == 1) {
							$wcm = $wcratio[46];
						}elseif ($sp == 2) {
							$wcm = $wcratio[47];
						}
					}
				}
			}
			if ($acs == 70) {
				if ($days == 28) {
					if ($mas == 10) {
						if ($sp == 1) {
							$wcm = $wcratio[48];
						}elseif ($sp == 2) {
							$wcm = $wcratio[49];
						}
					}elseif ($mas == 12.5) {
						if ($sp == 1) {
							$wcm = $wcratio[50];
						}elseif ($sp == 2) {
							$wcm = $wcratio[51];
						}
					}elseif ($mas == 20) {
						if ($sp == 1) {
							$wcm = $wcratio[52];
						}elseif ($sp == 2) {
							$wcm = $wcratio[53];
						}
					}elseif ($mas == 25) {
						if ($sp == 1) {
							$wcm = $wcratio[54];
						}elseif ($sp == 2) {
							$wcm = $wcratio[55];
						}
					}
				}elseif ($days == 56) {
					if ($mas == 10) {
						if ($sp == 1) {
							$wcm = $wcratio[56];
						}elseif ($sp == 2) {
							$wcm = $wcratio[57];
						}
					}elseif ($mas == 12.5) {
						if ($sp == 1) {
							$wcm = $wcratio[58];
						}elseif ($sp == 2) {
							$wcm = $wcratio[59];
						}
					}elseif ($mas == 20) {
						if ($sp == 1) {
							$wcm = $wcratio[60];
						}elseif ($sp == 2) {
							$wcm = $wcratio[61];
						}
					}elseif ($mas == 25) {
						if ($sp == 1) {
							$wcm = $wcratio[62];
						}elseif ($sp == 2) {
							$wcm = $wcratio[63];
						}
					}
				}
			}
			if ($acs == 75) {
				if ($days == 28) {
					if ($mas == 10) {
						if ($sp == 1) {
							$wcm = $wcratio[64];
						}else{
							$wcm = "Error: Unexpected values provided"; 
						}
					}elseif ($mas == 12.5) {
						if ($sp == 1) {
							$wcm = $wcratio[65];
						}else{
							$wcm = "Error: Unexpected values provided";
						}
					}elseif ($mas == 20) {
						if ($sp == 1) {
							$wcm = $wcratio[66];
						}else{
							$wcm = "Error: Unexpected values provided";
						}
					}elseif ($mas == 25) {
						if ($sp == 1) {
							$wcm = $wcratio[67];
						}else{
							$wcm = "Error: Unexpected values provided";
						}
					}
				}elseif ($days == 56) {
					if ($mas == 10) {
						if ($sp == 1) {
							$wcm = $wcratio[68];
						}else{
							$wcm = "Error: Unexpected values provided";
						}
					}elseif ($mas == 12.5) {
						if ($sp == 1) {
							$wcm = $wcratio[69];
						}else{
							$wcm = "Error: Unexpected values provided";
						}
					}elseif ($mas == 20) {
						if ($sp == 1) {
							$wcm = $wcratio[70];
						}else{
							$wcm = "Error: Unexpected values provided";
						}
					}elseif ($mas == 25) {
						if ($sp == 1) {
							$wcm = $wcratio[71];
						}else{
							$wcm = "Error: Unexpected values provided";
						}
					}
				}
			}
			if ($acs == 80) {
				if ($days == 28) {
					if ($mas == 10) {
						if ($sp == 1) {
							$wcm = $wcratio[72];
						}else{
							$wcm = "Error: Unexpected values provided"; 
						}
					}elseif ($mas == 12.5) {
						if ($sp == 1) {
							$wcm = $wcratio[73];
						}else{
							$wcm = "Error: Unexpected values provided";
						}
					}elseif ($mas == 20) {
						if ($sp == 1) {
							$wcm = $wcratio[74];
						}else{
							$wcm = "Error: Unexpected values provided";
						}
					}elseif ($mas == 25) {
						if ($sp == 1) {
							$wcm = $wcratio[75];
						}else{
							$wcm = "Error: Unexpected values provided";
						}
					}
				}elseif ($days == 56) {
					if ($mas == 10) {
						if ($sp == 1) {
							$wcm = $wcratio[76];
						}else{
							$wcm = "Error: Unexpected values provided";
						}
					}elseif ($mas == 12.5) {
						if ($sp == 1) {
							$wcm = $wcratio[77];
						}else{
							$wcm = "Error: Unexpected values provided";
						}
					}elseif ($mas == 20) {
						if ($sp == 1) {
							$wcm = $wcratio[78];
						}else{
							$wcm = "Error: Unexpected values provided";
						}
					}elseif ($mas == 25) {
						if ($sp == 1) {
							$wcm = $wcratio[79];
						}else{
							$wcm = "Error: Unexpected values provided";
						}
					}
				}
			}
		 return $wcm;

		}

#where w/cm > 0.45, the minimum value of 0.45 will be used
$wcratio = array(0.50,0.45,0.48,0.45,0.45,0.45,0.45,0.45,0.55,0.46,0.52,0.45,0.48,0.45,0.46,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.48,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45,0.45);
	
		if(isset($_GET['submit'])){
			$acs = $_GET['acs'];
			if (isset($_GET['mas'])) {
				$mas = $_GET['mas'];
			}
			if (isset($_GET['days'])) {
				$days = $_GET['days'];
			}
			if (isset($_GET['sp'])) {
				$sp = $_GET['sp'];
			}

			# call the function. Here is when the function code is executed.
			# provide all values it needs.

			$watercementratio =WatertoCement($acs,$sp,$mas,$days,$wcratio);
			/* echo "The water cement ratio:";
			 echo $watercementratio; */
			
		}
			# echo "<br>";

		function CementitousContent($watercementratio,$waterRequired)
		{
			$tc = $waterRequired/$watercementratio;
			return $tc;
		}

		$cementRequired =CementitousContent($watercementratio,$waterRequired);
			/*echo "The cement content is:";
			echo $cementRequired;	
			echo "<br>";*/


function getvca($mas, $vcoarse)
		{
			# Above are the function parameters  ^			^				^
			# They can take any name. Varaiables within this the bounds/scope of the function can
			# only be accessed within this function.
			# To get a value out of the function, use the 'return $variable_name'.
			if ($mas == 10) {
				$volumeofcoarse = $vcoarse[0]; 
				# you probably want to avoid naming your variables the same name as a function.
			}elseif ($mas == 12.5) {
				$volumeofcoarse = $vcoarse[1];
			}elseif ($mas == 20) {
				$volumeofcoarse = $vcoarse[2];
			}elseif ($mas == 25) {
				$volumeofcoarse = $vcoarse[3];
			}else{
				$volumeofcoarse = "Error: Unexpected values provided"; 
				# Handles the case where nothing matched, probably due to unexpected input.
				# A simple message can be returned.
			}
			return $volumeofcoarse;
			# A returned value. This is how you get values out of the function scope
		}
		# ------- end of fn ------ #

		# code execution starts here.
		$vcoarse = array(0.65, 0.68, 0.72, 0.75);
		if(isset($_GET['submit'])){
			$mas = $_GET['mas'];

			# call the function. Here is when the function code is executed.
			# provide all values it needs.
			$coarse = getvca($mas, $vcoarse);
			 /*echo "<br>";
			 echo "The VCA:";
			 echo $coarse;*/
		}
			#echo "<br>";

#mass of coarse aggregate
		function getmassofcoarse($mdd, $coarse)
		{
			$coarsecontent = $coarse * $mdd;
			return $coarsecontent;
		}
		if(isset($_GET['submit'])){
			$mdd = $_GET['mdd'];
			$coarsemass = getmassofcoarse($mdd, $coarse);
			 /*echo "<br>";
			 echo "The mass of coarse:";
			 echo $coarsemass;
			 echo "<br>";*/
		}

#mass of fine aggregate
	function FinesContent($mdd, $aggregatedensity, $waterRequired, $cementRequired, $coarsemass, $cementDensity, $airContent)
		{
			$fc = (1-($coarsemass/$aggregatedensity)-($cementRequired/$cementDensity)-($waterRequired/1000)-($airContent/100))*$aggregatedensity;
			return $fc;
		}

		if(isset($_GET['submit'])){
				$mdd= $_GET['mdd'];
				$aggregatedensity= $_GET['aggregatedensity'];
				if (isset($_GET['cementDensity'])) {
					$cementDensity = $_GET['cementDensity'];
				}
				$fineAggregate = FinesContent($mdd, $aggregatedensity, $waterRequired, $cementRequired, $coarsemass, $cementDensity, $airContent);
				 //echo "Fine aggregate content:";
				 //echo $fineAggregate;
				 //echo "<br>";
		}

#mass of silica fume
		function silicaContent($silica,$cementRequired)
		{
			$sc = $silica*$cementRequired;
			return $sc;
		}

		if(isset($_GET['submit'])){
				$silica= $_GET['silica'];
				$SilicaFume = silicaContent($silica,$cementRequired);
				 //echo "Silica Content:";
				 //echo $SilicaFume;
				 //echo "<br>";
		}

#resultant mass of cement after partial replacement with silica fume
		function ResultantCement($SilicaFume,$cementRequired)
		{
			$ResCem = $cementRequired - $SilicaFume;
			return $ResCem;
		}

		if(isset($_GET['submit'])){
				$silica= $_GET['silica'];
				$Cementtobeadded = ResultantCement($SilicaFume,$cementRequired);
				 //echo "Cement to be added:";
				 //echo $Cementtobeadded;
				 //echo "<br>";
		}	

#superplasticizer to be added
 		function getSuperplasticizer($cementRequired, $dosage, $sp)
		{
			if ($sp == 1) {
				$superplast = $cementRequired*$dosage/1000;
			}else{
				$superplast = 0;
			}
			
			return $superplast;
		}

		if(isset($_GET['submit'])){
			if (isset($_GET['sp'])) {
				$sp = $_GET['sp'];
			}
				$waterReduction = $_GET['waterReduction'];
				$dosage = $_GET['dosage'];
				$waterreducer = getSuperplasticizer($cementRequired, $dosage, $sp);
				 //echo "The water reducer content:";
				 //echo $waterreducer;
				 //echo "<br>";
		}

 #water to be added
	function getWaterValue($waterRequired, $waterReduction)
	{
		$wta = $waterRequired*(1-$waterReduction/100);
		return $wta;
	}
		
		 if(isset($_GET['submit'])){
			 if (isset($_GET['waterReduction'])) {
					$waterReduction = $_GET['waterReduction'];
				}
				$watertobeAdded = getWaterValue($waterRequired, $waterReduction);
				 //echo "The water to be added:";
				 //echo $watertobeAdded;
				 //echo "<br>";
		 }

 #cost of components

$theCostofCement = 0;
$theCostofWater = 0;
$theCostofcoarseAggregate = 0;
$theCostofFineAggregate = 0;
$wrCost = 0;
$theCostofSilica  = 0;

#COST OF WATER
 function getWaterCost($watertobeAdded, $costofWater)
	{
		$cow = $watertobeAdded * $costofWater;
		return $cow;
	}
		if(isset($_GET['submit'])){
			$costofWater= $_GET['costofWater'];
			$theCostofWater = getWaterCost($watertobeAdded, $costofWater);
			 //echo "The cost of water is:";
			 //echo $theCostofWater;
			 //echo "<br>";
		}

#COST OF COARSE AGGREGATE
	 function getCoarseAggregateCost($coarsemass , $costofCoarse)
	{
		$cAc = $coarsemass * $costofCoarse;
		return $cAc;
	}
		if(isset($_GET['submit'])){
			$costofCoarse= $_GET['costofCoarse'];
			$theCostofcoarseAggregate = getCoarseAggregateCost($coarsemass , $costofCoarse);
			 #echo "The cost of coarse aggregate is:";
			 #echo $theCostofcoarseAggregate;
			 #echo "<br>";
		}

#COST OF FINE AGGREGATE
	function getFineAggregateCost($fineAggregate , $costofFines)
	{
		$fAc = $fineAggregate * $costofFines;
		return $fAc;
	} 	
		if(isset($_GET['submit'])){
			$costofFines= $_GET['costofFines'];
			$theCostofFineAggregate = getFineAggregateCost($fineAggregate, $costofFines);
			 #echo "The cost of fine aggregate is:";
			 #echo $theCostofFineAggregate;
			 #echo "<br>";
		}

#COST OF CEMENT
	function getCementCost($Cementtobeadded, $costofCement)
	{
		$CoC = $Cementtobeadded * $costofCement;
		return $CoC;
	}
		if(isset($_GET['submit'])){
			$costofCement= $_GET['costofCement'];
			$theCostofCement = getCementCost($Cementtobeadded, $costofCement);
			 #echo "The cost of cement is:";
			 #echo $theCostofCement;
			 #echo "<br>";
		}

#COST OF SILICA FUME
	function getSilicaCost($SilicaFume , $costofSilica)
	{
		$Cos = $SilicaFume  * $costofSilica;
		return $Cos;
	}
		if(isset($_GET['submit'])){
			if(isset($_GET['costofSilica'])){
				$costofSilica= $_GET['costofSilica'];
			}
			$theCostofSilica = getSilicaCost($SilicaFume , $costofSilica);
			 #echo "The cost of silica is:";
			 #echo $theCostofSilica;
			 #echo "<br>";
		}

#COST OF WATER REDUCER
		function getWRcost($waterreducer, $costofwr)
		{
			$cwr = $waterreducer * $costofwr;
			return $cwr;
		}

		if(isset($_GET['submit'])){
				$costofwr= $_GET['costofwr'];
				$wrCost = getWRcost($waterreducer, $costofwr);
				// echo "The cost of Water reducer is:";
				// echo $wrCost;
				// echo "<br>";
		}

#TOTAL COST
	function getTotalCost($theCostofCement, $theCostofWater, $theCostofcoarseAggregate, $theCostofFineAggregate, $wrCost,$theCostofSilica)
	{
		$Tcost = $theCostofWater + $theCostofCement + $theCostofcoarseAggregate + $theCostofFineAggregate + $wrCost + $theCostofSilica; 
		return $Tcost;
	}
		$theTotalCost = getTotalCost($theCostofCement, $theCostofWater, $theCostofcoarseAggregate, $theCostofFineAggregate, $wrCost,$theCostofSilica);
			//echo "The cost of concrete per cubic metre is:";
		    //echo $theTotalCost;
			//echo "<br>";	
	?>

<? php #PRESENTATION OF RESULTS ?>
<lt>
	<table class="table">
		<tr class="td">
			<th class="td">Component</th>
			<th class="td">Quantity (kgs per cubic metre)</th>
			<th class="td">Cost (per cubic metre)</th>
		</tr>
		<tr class="td">
			<th class="td">Water to be added</th>
			<th class="td"><?php echo number_format($watertobeAdded, 1); ?> </th>
			<th class="td"><?php echo number_format($theCostofWater, 1); ?> </th>
		</tr>
		<tr class="td">
			<th class="td">Cement</th>
			<th class="td"><?php echo number_format($Cementtobeadded, 1); ?></th>
			<th class="td"><?php echo number_format($theCostofCement, 1); ?></th>
		</tr>
		<tr class="td">
			<th class="td">Silica Fume</th>
			<th class="td"><?php echo number_format($SilicaFume, 1); ?></th>
			<th class="td"><?php echo number_format($theCostofSilica, 1); ?></th>
		</tr>
		<tr class="td">
			<th class="td">Coarse Aggregate</th>
			<th class="td"><?php echo number_format($coarsemass, 1); ?></th>
			<th class="td"><?php echo number_format($theCostofcoarseAggregate, 1); ?></th>
		</tr>
		<tr class="td">
			<th class="td">Fine Aggregate</th>
			<th class="td"><?php echo number_format($fineAggregate, 1); ?></th>
			<th class="td"><?php echo number_format($theCostofFineAggregate, 1); ?></th>
		</tr>
		<tr class="td">
			<th class="td">Water reducer</th>
			<th class="td"><?php echo number_format($waterreducer, 1); ?></th>
			<th class="td"><?php echo number_format($wrCost, 1); ?></th>
		</tr>
		<tr class="td">
			<th class="td">Total</th>
			<th></th>
			<th><?php echo number_format($theTotalCost, 1); ?></th>
		</tr>
	</table>
</lt>
<?php include_once 'footer.php'; ?>