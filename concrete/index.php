<?php include_once 'header.php'; ?>

<form method="POST">
		<div class="selecter">
			<div class="slect">
			 <p>Concrete Specification:</p>
				<select name="concreteSpecification">
					<option value="">--select--</option>
			 		<option value="1" name="1">Non-air entrained</option>
			 		<option value="2" name="2">Air entrained</option>
				</select>
			  	<br>
			  	<br>
			  	<p>Required Compressive Strength (Mpa):</p>
				<select name="compressiveStrength">
					<option>--select--</option>
					<option value="45">45</option>
					<option value="40">40</option>
					<option value="35">35</option>
					<option value="30">30</option>
					<option value="25">25</option>
					<option value="20">20</option>
					<option value="15">15</option>
				</select>	
			 	<br>
			 	<br>
			 	<p>Level of Exposure:</p>
				<select name="exposure">
					<option value="">--select--</option>
			 		<option value="1" name="1">Mild</option>
			 		<option value="2" name="2">Moderate</option>
			 		<option value="2" name="2">Severe</option>
				</select>
				<br>
				<br>
			 	<p>Slump:</p>
				<select name="Slump">
					<option value="">--select--</option>
			 		<option value="3" name="3">25-50mm</option>
			 		<option value="4" name="4">75-100mm</option>
			 		<option value="5" name="5">150-175mm</option>
				</select>
			 		<br>
			 		<br>
			 	<p>Cost of Water per litre</p>
			 			<input type="number" step="0.01" name="costofWater">
			 	<br>
			 	<br>
			 	<h4 class="heading">CEMENT PROPERTIES</h4>
			 	<br>
						<p>Cement density (kgs per cubic metre)</p>
			 			<input type="number" step="0.01" name="cementDensity">
			 			<br>
			 			<br>
			 			<p>Cost of Cement(per kg)</p>
			 			<input type="number" step="0.01" name="costofCement">
			 	<br>
			 	<br>
			 	<h4 class="heading">COARSE AGGREGATE</h4>
			 	<br>
			 			<p>Nominal Maximum Aggregate Size:</p>
						<select name="nominalmaximumAggregatesize">
							<option value="">--select--</option>
			 				<option value="9.5" name="9.5">9.5mm</option>
			 				<option value="12.5" name="12.5">12.5mm</option>
			 				<option value="19" name="19">19mm</option>
			 				<option value="25" name="25">25mm</option>
			 				<option value="37.5" name="37.5">37.5mm</option>
						</select>
			 			<br>
			 			<br>
			 			<p>Dry Relative Density</p>
			 			<input type="number" step="0.01" name="drySpecificDensity">
			 			<br>
			 			<br>
			 			<p>Bulk Specific Gravity (kgs per cubic metre)</p>
			 			<input type="number"  name="bulkSgofCoarse">
			 			<br>
			 			<br>
			 			<p>Moisture content (%)</p>
			 			<input type="number" step="0.01" name="mcofCoarse">
			 			<br>
			 			<br>
			 			<p>Water absorption (%)</p>
			 			<input type="number" step="0.01" name="waofCoarse">
			 			<br>
			 			<br>
			 			<p>Cost (per kg)</p>
			 			<input type="number" step="0.01" name="costofCoarse">
			 			<br>
			 			<br>
			 	<h4 class="heading">FINE AGGREGATE</h4>
			 	<br>
			 			<p>Dry Relative Density</p>
			 			<input type="number" step="0.01" name="bulkSgofFines">
			 			<br>
			 			<br>
			 			<p>Fineness Modulus:</p>
						<select name="finenessModulus">
							<option value="">--select--</option>
			 				<option value="2.4" name="2.4">2.4</option>
			 				<option value="2.6" name="2.6">2.6</option>
			 				<option value="2.8" name="2.8">2.8</option>
			 				<option value="3.0" name="3.0">3.0</option>
						</select>
			 			<br>
			 			<br>
			 			<p>Moisture content of Fine Aggregate (%)</p>
			 			<input type="number" step="0.01" name="mcofFines">
			 			<br>
			 			<br>
			 			<p>Water absorption of Fine Aggregate (%)</p>
			 			<input type="number" step="0.01" name="waofFines">
			 			<br>
			 			<br>
			 			<p>Cost of Fine aggregate(per kg)</p>
			 			<input type="number" step="0.01" name="costofFines">
			 	<br>
			 	<br>
			 	<h4 class="heading">WATER REDUCER</h4>
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
	<button type="submit" name="submit" value="submit">Calculate</button>
</form>
<?php

  $cementRatio  = 1;
  $waterRequired = 0;
  $maximumAggregatesize = "";
  $finenessModulus = "";
  $drySpecificDensity = 1;
  $bulkRatio = 0;
  $wetFineaggregate  = 0;
  $wetCoarseaggregate  = 1;
  $fineAggregate = 0;
  $waterReduction = 0;
  $theCostofCement = 0;
  $theCostofWater = 0;
  $theCostofcoarseAggregate = 0;
  $theCostofFineAggregate = 0;
  $wrCost = 0;
  $gravel = 0;
  $waterreducer = 0;
  $bulkSgofCoarse = 0; 
  $airentrainment = 0;
  $waterReduction = 1;
		# Code inside functions is not executed untill called.
		# A good convention is to name functions with verbs (the action the function will do)
		# ------- start of function ------#
		function getCementRatio($compressiveStrength, $concreteSpec, $waterToCementValues)
		{
			# Above are the function parameters  ^			^				^
			# They can take any name. Varaiables within this the bounds/scope of the function can
			# only be accessed within this function.
			# To get a value out of the function, use the 'return $variable_name'.
			if ($compressiveStrength == 45 && $concreteSpec == 1) {
				$cr = $waterToCementValues[0]; 
	
			}elseif ($compressiveStrength == 40 && $concreteSpec == 1) {
				$cr = $waterToCementValues[1];
			}elseif ($compressiveStrength == 35 && $concreteSpec == 1) {
				$cr = $waterToCementValues[2];
			}elseif ($compressiveStrength == 30 && $concreteSpec == 1) {
				$cr = $waterToCementValues[3];
			}elseif ($compressiveStrength == 25 && $concreteSpec == 1) {
				$cr = $waterToCementValues[4];
			}elseif ($compressiveStrength == 20 && $concreteSpec == 1) {
				$cr = $waterToCementValues[5];
			}elseif ($compressiveStrength == 15 && $concreteSpec == 1) {
				$cr = $waterToCementValues[6];
			}elseif ($compressiveStrength == 45 && $concreteSpec == 2) {
				$cr = $waterToCementValues[7];
			}elseif ($compressiveStrength == 40 && $concreteSpec == 2) {
				$cr = $waterToCementValues[8];
			}elseif ($compressiveStrength == 35 && $concreteSpec == 2) {
				$cr = $waterToCementValues[9];
			}elseif ($compressiveStrength == 30 && $concreteSpec == 2) {
				$cr = $waterToCementValues[10];
			}elseif ($compressiveStrength == 25 && $concreteSpec == 2) {
				$cr = $waterToCementValues[11];
			}elseif ($compressiveStrength == 20 && $concreteSpec == 2) {
				$cr = $waterToCementValues[12];
			}elseif ($compressiveStrength == 15 && $concreteSpec == 2) {
				$cr = $waterToCementValues[13];
			}else{
				$cr = "Error: Unexpected values provided"; 
				# Handles the case where nothing matched, probably due to unexpected input.
				# A simple message can be returned.
			}
			return $cr;
			# A returned value. This is how you get values out of the function scope
		}
		# ------- end of fn ------ #

		# code execution starts here.
		$watertocement = array(0.38, 0.42, 0.47, 0.54, 0.61, 0.69, 0.79,0.30, 0.34, 0.39, 0.45, 0.52, 0.60, 0.70);
		if(isset($_GET['submit'])){
			$compressiveStrength = $_GET['compressiveStrength'];
			if (isset($_GET['concreteSpecification'])) {
				$concreteSpecification = $_GET['concreteSpecification'];
			}
			# call the function. Here is when the function code is executed.
			# provide all values it needs.
			$cementRatio = getCementRatio($compressiveStrength, $concreteSpecification, $watertocement);
			// echo "The water to cement ratio:";
			// echo $cementRatio;
		}
			// echo "<br>";
		function getAirentrained($maximumAggregatesize, $exposure, $concreteSpecification, $aircontent)
	{
		if ($concreteSpecification == 1) {
			if ($exposure == 1 or $exposure == 2 or $exposure == 3) {
				if ($maximumAggregatesize == 9.5) {
					$ae = $aircontent[0];
				}elseif ($maximumAggregatesize == 12.5) {
					$ae = $aircontent[1];
				}else if ($maximumAggregatesize == 19) {
					$ae = $aircontent[2];
				}elseif ($maximumAggregatesize == 25) {
					$ae = $aircontent[3];
				}elseif ($maximumAggregatesize == 37.5) {
					$ae = $aircontent[4];
				}
			}
		}
		if ($concreteSpecification == 2) {
			if ($exposure == 1 ) {
				if ($maximumAggregatesize == 9.5) {
					$ae = $aircontent[5];
				}elseif ($maximumAggregatesize == 12.5) {
					$ae = $aircontent[6];
				}elseif ($maximumAggregatesize == 19) {
					$ae = $aircontent[7];
				}elseif ($maximumAggregatesize == 25) {
					$ae = $aircontent[8];
				}elseif ($maximumAggregatesize == 37.5) {
					$ae = $aircontent[9];
				}
			}
			if ($exposure == 2) {
				if ($maximumAggregatesize == 9.5) {
					$ae = $aircontent[10];
				}elseif ($maximumAggregatesize == 12.5) {
					$ae = $aircontent[11];
				}elseif ($maximumAggregatesize == 19) {
					$ae = $aircontent[12];
				}elseif ($maximumAggregatesize == 25) {
					$ae = $aircontent[13];
				}elseif ($maximumAggregatesize == 37.5) {
					$ae = $aircontent[14];
				}
			}
			if ($exposure == 3) {
				if ($maximumAggregatesize == 9.5) {
					$ae = $aircontent[15];
				}elseif ($maximumAggregatesize == 12.5) {
					$ae = $aircontent[16];
				}elseif ($maximumAggregatesize == 19) {
					$ae = $aircontent[17];
				}elseif ($maximumAggregatesize == 25) {
					$ae = $aircontent[18];
				}elseif ($maximumAggregatesize == 37.5) {
					$ae = $aircontent[19];
				}
			}
		}
		return $ae;
	}

	$aircontent = array(3, 2.5, 2, 1.5, 1, 4.5, 4.0, 3.5, 3.0, 2.5, 6.0, 5.5, 5.0, 4.5, 4.5, 7.5, 7.0, 6.0, 6.0, 5.5);
	if(isset($_GET['submit'])){
			$exposure= $_GET['exposure'];
			$concreteSpecification= $_GET['concreteSpecification'];
			if (isset($_GET['nominalmaximumAggregatesize'])) {
				$maximumAggregatesize = $_GET['nominalmaximumAggregatesize'];
			}
			$airentrainment = getAirentrained($maximumAggregatesize, $exposure, $concreteSpecification, $aircontent);
			// echo "The air content:";
			// echo $airentrainment;
			// echo "<br>";
		}

		function getWaterRequirement($watercontent, $maximumAggregatesize, $slump, $concreteSpecification)
		{
			if ($concreteSpecification == 1) {
					if($slump == 3) {
						if($maximumAggregatesize == 9.5){
							$wr = $watercontent [0];
						}elseif ($maximumAggregatesize == 12.5) {
							$wr = $watercontent [1];
						}elseif ($maximumAggregatesize == 19) {
							$wr = $watercontent [2];
						}elseif ($maximumAggregatesize == 25) {
							$wr = $watercontent [3];
						}elseif ($maximumAggregatesize == 37.5) {
							$wr = $watercontent [4];
						}
					}
					if($slump == 4) {
						if($maximumAggregatesize == 9.5){
							$wr = $watercontent [5];
						}elseif ($maximumAggregatesize == 12.5) {
							$wr = $watercontent [6];
						}elseif ($maximumAggregatesize == 19) {
							$wr = $watercontent [7];
						}elseif ($maximumAggregatesize == 25) {
							$wr = $watercontent [8];
						}elseif ($maximumAggregatesize == 37.5) {
							$wr = $watercontent [9];
						}
					}
					if($slump == 5) {
						if($maximumAggregatesize == 9.5){
							$wr = $watercontent [10];
						}elseif ($maximumAggregatesize == 12.5) {
							$wr = $watercontent [11];
						}elseif ($maximumAggregatesize == 19) {
							$wr = $watercontent [12];
						}elseif ($maximumAggregatesize == 25) {
							$wr = $watercontent [13];
						}elseif ($maximumAggregatesize == 37.5) {
							$wr = $watercontent [14];
						}
					}	
			}
			if ($concreteSpecification == 2) {
				if($slump == 3) {
					if($maximumAggregatesize == 9.5){
						$wr = $watercontent [15];
					}elseif ($maximumAggregatesize == 12.5) {
						$wr = $watercontent [16];
					}elseif ($maximumAggregatesize == 19) {
						$wr = $watercontent [17];
					}elseif ($maximumAggregatesize == 25) {
						$wr = $watercontent [18];
					}elseif ($maximumAggregatesize == 37.5) {
						$wr = $watercontent [19];
					}
				}
				if($slump == 4) {
					if($maximumAggregatesize == 9.5){
						$wr = $watercontent [20];
					}elseif ($maximumAggregatesize == 12.5) {
						$wr = $watercontent [21];
					}elseif ($maximumAggregatesize == 19) {
						$wr = $watercontent [22];
					}elseif ($maximumAggregatesize == 25) {
						$wr = $watercontent [23];
					}elseif ($maximumAggregatesize == 37.5) {
						$wr = $watercontent [24];
					}
				}
				if($slump == 5) {
					if($maximumAggregatesize == 9.5){
						$wr = $watercontent [25];
					}elseif ($maximumAggregatesize == 12.5) {
						$wr = $watercontent [26];
					}elseif ($maximumAggregatesize == 19) {
						$wr = $watercontent [27];
					}elseif ($maximumAggregatesize == 25) {
						$wr = $watercontent [28];
					}elseif ($maximumAggregatesize == 37.5) {
						$wr = $watercontent [29];
					}else{
						$wr = "Error: Unexpected values provided"; 
					}
				}	
			}
			return $wr;
		}	



		$watercontent = array(207, 199, 190, 179, 166, 228, 216, 205, 193, 181, 243, 228, 216, 202, 190, 181, 175, 168, 160, 150, 202, 193, 184, 175, 165, 216, 205, 197, 184, 174);
		if(isset($_GET['submit'])){
			$slump= $_GET['Slump'];
			$concreteSpecification= $_GET['concreteSpecification'];
			if (isset($_GET['nominalmaximumAggregatesize'])) {
				$maximumAggregatesize = $_GET['nominalmaximumAggregatesize'];
			}
			$waterRequired = getWaterRequirement($watercontent, $maximumAggregatesize, $slump, $concreteSpecification);
			// echo "The water required:";
			// echo $waterRequired;
		}
			// echo "<br>";
		function getCementContent($cementRatio, $waterRequired)
		{
			$cc = $waterRequired/$cementRatio;
			return $cc;
		}
			$cementRequired = getCementContent($cementRatio, $waterRequired);
			// echo "The cement content is:";
			// echo $cementRequired;	
			// echo "<br>";

		function getCoarsecontent($maximumAggregatesize, $finenessModulus, $bulkVolume)
				{
					if ($finenessModulus == 2.4) {
						if ($maximumAggregatesize == 9.5) {
							$gravel = $bulkVolume[0];
						}elseif ($maximumAggregatesize == 12.5) {
							$gravel = $bulkVolume[1];
						}elseif ($maximumAggregatesize == 19) {
							$gravel = $bulkVolume [2];
						}elseif ($maximumAggregatesize == 25) {
							$gravel= $bulkVolume[3];
						}elseif ($maximumAggregatesize == 37.5) {
							$gravel = $bulkVolume[4];
						}else{
							$gravel = "Error: Unexpected values provided";
						}
					}
					if ($finenessModulus == 2.6) {
						if ($maximumAggregatesize == 9.5) {
							$gravel = $bulkVolume[5];
						}elseif ($maximumAggregatesize == 12.5) {
							$gravel = $bulkVolume[6];
						}elseif ($maximumAggregatesize == 19) {
							$gravel = $bulkVolume [7];
						}elseif ($maximumAggregatesize == 25) {
							$gravel = $bulkVolume[8];
						}elseif ($maximumAggregatesize == 37.5) {
							$gravel= $bulkVolume[9];
						}else{
							$gravel = "Error: Unexpected values provided";
						}
					}
					if ($finenessModulus == 2.8) {
						if ($maximumAggregatesize == 9.5) {
							$gravel= $bulkVolume[10];
						}elseif ($maximumAggregatesize == 12.5) {
							$gravel = $bulkVolume[11];
						}elseif ($maximumAggregatesize == 19) {
							$gravel = $bulkVolume [12];
						}elseif ($maximumAggregatesize == 25) {
							$gravel = $bulkVolume[13];
						}elseif ($maximumAggregatesize == 37.5) {
							$gravel = $bulkVolume[14];
						}else{
							$gravel = "Error: Unexpected values provided";
						}
					}
					if ($finenessModulus == 3.0) {
						if ($maximumAggregatesize == 9.5) {
							$gravel = $bulkVolume[15];
						}elseif ($maximumAggregatesize == 12.5) {
							$gravel = $bulkVolume[16];
						}elseif ($maximumAggregatesize == 19) {
							$gravel = $bulkVolume [17];
						}elseif ($maximumAggregatesize == 25) {
							$gravel = $bulkVolume[18];
						}elseif ($maximumAggregatesize == 37.5) {
							$gravel = $bulkVolume[19];
						}else{
							$gravel = "Error: Unexpected values provided";
						}
					}
					return $gravel;
				}	
				
				$bulkVolume = array(0.50, 0.59, 0.66, 0.71, 0.75, 0.48, 0.57, 0.64, 0.69, 0.73, 0.46, 0.55, 0.62, 0.67, 0.71, 0.44, 0.53, 0.60, 0.65, 0.69);
				if(isset($_GET['submit'])){
					if (isset($_GET['finenessModulus'])){
						$finenessModulus= $_GET['finenessModulus'];
					}
					if (isset($_GET['nominalmaximumAggregatesize'])) {
						$maximumAggregatesize = $_GET['nominalmaximumAggregatesize'];
					}
					$bulkRatio = getCoarsecontent($maximumAggregatesize, $finenessModulus, $bulkVolume);
				
				}
				// echo "The bulk Volume of Coarse aggregate is:";
				// echo $bulkRatio;	
				// echo "<br>";
		function getCoarseaggregateMass($bulkRatio, $bulkSgofCoarse)
		{
			$cam = $bulkRatio* $bulkSgofCoarse;
			return $cam;
		}
			if (isset($_GET['drySpecificDensity'])) {
				$bulkSgofCoarse = $_GET['bulkSgofCoarse'];
			}
			$coarseaggregates = getCoarseaggregateMass($bulkRatio, $bulkSgofCoarse);
			// echo "The Coarse aggregate content is:";
			// echo $coarseaggregates;
			// echo "<br>";

			$waterReduction = 1;
		function getFinesContent($bulkSgofFines, $waterRequired, $waterReduction, $cementRequired, $cementDensity, $coarseaggregates, $drySpecificDensity, $airentrainment)
		{
			$fc = $bulkSgofFines*(1000-($waterRequired*(1-$waterReduction/100) + ($cementRequired/$cementDensity) + ($coarseaggregates/$drySpecificDensity) + 10*$airentrainment));

			return $fc;
		}

		if(isset($_GET['submit'])){
				$drySpecificDensity= $_GET['drySpecificDensity'];
				$bulkSgofFines= $_GET['bulkSgofFines'];
				if (isset($_GET['cementDensity'])) {
					$cementDensity = $_GET['cementDensity'];
				}
				$fineAggregate = getFinesContent($bulkSgofFines, $waterRequired, $waterReduction, $cementRequired, $cementDensity, $coarseaggregates, $drySpecificDensity, $airentrainment);
				// echo "Fine aggregate content:";
				// echo $fineAggregate;
				// echo "<br>";
		}

		function getSuperplasticizer($cementRequired, $dosage)
		{
			$sp = $cementRequired*$dosage/1000;
			return $sp;
		}

		if(isset($_GET['submit'])){
				$waterReduction= $_GET['waterReduction'];
				$dosage = $_GET['dosage'];
				$waterreducer = getSuperplasticizer($cementRequired, $dosage);
				// echo "The water reducer content:";
				// echo $waterreducer;
				// echo "<br>";
		}
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
		function getWetCoarse($mcofCoarse, $waofCoarse, $coarseaggregates)
		{
			$wca = $coarseaggregates*(1 + ($mcofCoarse - $waofCoarse)/100);
				return $wca;
		}

		if(isset($_GET['submit'])){
				$mcofCoarse= $_GET['mcofCoarse'];
				$waofCoarse= $_GET['waofCoarse'];
				$wetCoarseaggregate = getWetCoarse($mcofCoarse, $waofCoarse, $coarseaggregates);
		}
	function getWetFines($mcofFines, $waofFines, $fineAggregate)
	{
		$wfa = $fineAggregate*(1 + ($mcofFines - $waofFines)/100);
		return $wfa;
	}
		if(isset($_GET['submit'])){
			$mcofFines= $_GET['mcofFines'];
			$waofFines= $_GET['waofFines'];
			$wetFineaggregate = getWetFines($mcofFines, $waofFines, $fineAggregate);
		}

	function getWaterValue($wetFineaggregate, $wetCoarseaggregate, $waterRequired, $fineAggregate, $coarseaggregates, $waterReduction)
	{
		$wta = $waterRequired*(1-$waterReduction/100) - (($wetCoarseaggregate - $coarseaggregates) +($wetFineaggregate - $fineAggregate));
		return $wta;
	}
		$watertobeAdded = getWaterValue($wetFineaggregate, $wetCoarseaggregate, $waterRequired, $fineAggregate, $coarseaggregates, $waterReduction);
		// echo "The water to be added:";
		// echo $watertobeAdded;
		// echo "<br>";
	function getWaterCost($watertobeAdded, $costofWater)
	{
		$cow = $watertobeAdded * $costofWater;
		return $cow;
	}
		if(isset($_GET['submit'])){
			$costofWater= $_GET['costofWater'];
			$theCostofWater = getWaterCost($watertobeAdded, $costofWater);
			// echo "The cost of water is:";
			// echo $theCostofWater;
			// echo "<br>";
		}
	function getCoarseAggregateCost($coarseaggregates, $costofCoarse)
	{
		$cAc = $coarseaggregates * $costofCoarse;
		return $cAc;
	}
		if(isset($_GET['submit'])){
			$costofCoarse= $_GET['costofCoarse'];
			$theCostofcoarseAggregate = getCoarseAggregateCost($coarseaggregates, $costofCoarse);
			// echo "The cost of coarse aggregate is:";
			// echo $theCostofcoarseAggregate;
			// echo "<br>";
		}
	function getFineAggregateCost($fineAggregate, $costofFines)
	{
		$fAc = $fineAggregate * $costofFines;
		return $fAc;
	} 	
		if(isset($_GET['submit'])){
			$costofFines= $_GET['costofFines'];
			$theCostofFineAggregate = getFineAggregateCost($fineAggregate, $costofFines);
			// echo "The cost of fine aggregate is:";
			// echo $theCostofFineAggregate;
			// echo "<br>";
		}
	function getCementCost($cementRequired, $costofCement)
	{
		$CoC = $cementRequired * $costofCement;
		return $CoC;
	}
		if(isset($_GET['submit'])){
			$costofCement= $_GET['costofCement'];
			$theCostofCement = getCementCost($cementRequired, $costofCement);
			// echo "The cost of cement is:";
			// echo $theCostofCement;
			// echo "<br>";
		}
	function getTotalCost($theCostofCement, $theCostofWater, $theCostofcoarseAggregate, $theCostofFineAggregate, $wrCost)
	{
		$Tcost = $theCostofWater + $theCostofCement + $theCostofcoarseAggregate + $theCostofFineAggregate + $wrCost; 
		return $Tcost;
	}
		$theTotalCost = getTotalCost($theCostofCement, $theCostofWater, $theCostofcoarseAggregate, $theCostofFineAggregate, $wrCost);
			// echo "The cost of concrete per cubic metre is:";
			// echo $theTotalCost;
			// echo "<br>";
	?>
<lt>
	<table class="tableone">
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
			<th class="td"><?php echo number_format($cementRequired, 1); ?></th>
			<th class="td"><?php echo number_format($theCostofCement, 1); ?></th>
		</tr>
		<tr class="td">
			<th class="td">Coarse Aggregate</th>
			<th class="td"><?php echo number_format($coarseaggregates, 1); ?></th>
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
			<th class="td">Air Content</th>
			<th class="td"><?php echo number_format($airentrainment, 1); ?></th>
			<th class="td"><?php echo number_format(0, 1); ?></th>
		</tr>
		<tr class="td">
			<th class="td">Total</th>
			<th></th>
			<th><?php echo number_format($theTotalCost, 1); ?></th>
		</tr>
	</table>
</lt>
<?php include_once 'footer.php'; ?>
