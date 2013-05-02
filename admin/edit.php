<!DOCTYPE html>
<html>
	<head>
		<title>Edit Info</title>
		<script src="jquery.js" type="text/javascript"></script>
		<script src="update.js" type="text/javascript"></script>
		<link rel="stylesheet" href="test.css">
	</head>
	<body>
		<div id="navbar"><a href="../"><img src="cacsmlogo.gif"></a>
				<a href="../imagesindex.html"><img src="images2hi.gif"></a>
				<a href="../mapsindex.html"><img src="maps2hi.gif"></a>
				<a href="../designindex.html"><img src="design2hi.gif"></a>
				<a href="../topicsindex.html"><img src="topics2hi.gif"></a>
				<a href="../vocabindex.html"><img src="vocab2hi.gif"></a>
				<a href="../siteindex.html"><img src="siteinfo2hi.gif"></a>
				<span class="stretch"></span>
		</div>
		<div id="main">
			<form id="update_form">
			<?php
				require_once('orm/Image.php');

				if(is_null($_GET['file'])){

				} else{
					$file = $_GET['file'];
					$image = Image::findByFile($file); //get image
					//get data
					$title = $image->getTitle();
					$type = $image->getType();
					$material = $image->getMaterial();
					$period = $image->getPeriod();
					$find = $image->getFind();
					$country = $image->getCountry();
					$date = $image->getDate();
					$collection = $image->getCollection();
					
					//define dropdown boxes
					$type_dropdown = '<select name="type" class="input" size=1>
													<option value="' . $type . '">' . $type . '
													<option value="Architecture">Architecture</option>                                                                                                                                                                                                             
													<option value="Armor and  Weapons">Armor and  Weapons</option>
													<option value="Book Arts">Book Arts </option>
													<option value="Burials (general)">Burials (general)</option>
													<option value="Celticism">Celticism</option>
													<option value="Chariots and Wagons">Chariots and Wagons</option>
													<option value="Coins and Medallions">Coins and Medallions</option>
													<option value="Cult objects">Cult objects</option>
													<option value="Jewelry">Jewelry </option>
													<option value="Maps/Landscape/Plans">Maps/Landscape/Plans</option>
													<option value="Mirrors ">Mirrors </option>
													<option value="Mounts and Fittings">Mounts and Fittings</option>
													<option value="Sculpture">Sculpture</option>
													<option value="Tools and Utensils">Tools and Utensils</option>
													<option value="Vessels (ceramic)">Vessels (ceramic)</option>
													<option value="Vessels (metalwork)">Vessels (metalwork)</option> 
												</select>';
					$material_dropdown = '<select name="material" class="input" size=1>
												<option value="' . $material . '">' . $material . '
												<option value="Bone">Bone</option>
												<option value="Bronze">Bronze</option>
												<option value="Clay">Clay</option>
												<option value="Copper-alloy">Copper-alloy</option>
												<option value="Glass">Glass</option>
												<option value="Gold">Gold</option>
												<option value="Iron">Iron</option>
												<option value="Metal">Metal</option>
												<option value="Misc">Miscellaneous</option>
												<option value="Paint">Paint</option>
												<option value="Silver">Silver</option>
												<option value="Stone">Stone</option>
												<option value="Textile">Textile</option>
												<option value="Wood">Wood</option>
												<option value="Other">Other</option> 
										</select>';							
					$period_dropdown = '<select name="period" id="period" class="input" size=1>
												<option value="' . $period . '">' . $period . '
												<option value="Bronze Age Europe">Bronze Age Europe</option>
												<option value="Celtic Revival">Celtic Revival</option>
												<option value="Collateral">Collateral</option>
												<option value="Early Medieval, Celtic">Early Medieval, Celtic</option>
												<option value="Early Medieval, Pictish">Early Medieval, Pictish</option>
												<option value="Greek/Etruscan">Greek/Etruscan</option>
												<option value="Hallstatt">Hallstatt</option>
												<option value="Insular Bronze Age">Insular Bronze Age</option>
												<option value="Insular La Tène">Insular La Tène</option>
												<option value="La Tène">La Tène</option>
												<option value="Romano-Celtic">Romano-Celtic</option>
										</select>';				
					$country_dropdown = '<select name="country" id="country" class="input" size=1>
												<option value="' . $country . '">' . $country . '
												<option value="Austria">Austria
												<option value="Belgium">Belgium
												<option value="Czechoslovakia (Bohemia)">Czechoslovakia (Bohemia)
												<option value="Denmark">Denmark
												<option value="England and Wales">England and Wales
												<option value="Europe">Europe
												<option value="former Yugoslavia">former Yugoslavia
												<option value="France">France
												<option value="Germany">Germany
												<option value="Hungary">Hungary
												<option value="Ireland">Ireland
												<option value="Italy">Italy
												<option value="Moravia">Moravia
												<option value="Netherlands">Netherlands
												<option value="Romania">Romania
												<option value="Scotland">Scotland
												<option value="Spain">Spain
												<option value="Switzerland">Switzerland
												<option value="Other">Other
											</select>';
					//print html (same as upload form but with stored data already filled in)
					print("<label class='left'><strong><em>Title: </em><input type='text' id='title' name='title' class='input' value='" . $title . "'></strong></label><div id='right'>");
					print("<div class='right'><em>Type of Object: </em>" . $type_dropdown . "</div>");
					print("<div class='right'><em>Material: </em>" . $material_dropdown . "</div>");
					print("<div class='right'><em>Period: </em>" . $period_dropdown . "</div>");
					print("<div class='right'><em>Country: </em>" . $country_dropdown . "</div>");
					print("<div class='right'><em>Find Spot: </em><input type='text' id='find' name='find' class='input' value='" . $find . "'></div>");
					print("<div class='right'><em>Date: </em><input type='text' id='date' name='date' class='input' value='" . $date . "'></div>");
					print("<div class='right'><em>Collection: </em><input type='text' id='collection' name='collection' class='input' value='" . $collection . "'></div>");
					print("<div class='right'><input type='submit' name='submit' value='Update' id='button' class='upload'></div></form>");
					print("</div><div id='image'><img src='../images/" . $file . "' id='" . $file . "'></div>");
					print("<button class='delete' id='delete'>Delete</button>");
				}
			?>
			<div id="response"></div> 
		</div>
	</body>
</html>