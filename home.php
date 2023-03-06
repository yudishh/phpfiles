
<?php 
	
	error_reporting(E_ERROR | E_PARSE | E_NOTICE);
	include("bookFunctions.php");
	
	//***CHECK FOR EMPTYNESS
	if(empty($_GET['title']) && empty($_GET['year']) && empty($_GET['author'])  && empty($_GET['category'])
	&& empty($_GET['category2']) && empty($_GET['author2']) && empty($_GET['author3']) && empty($_GET['year1'])
	
	){
		echo '<style>#code { display: none; }</style>';
		echo '<style>#code2 { display: none; }</style>';		
	?>
	<div class="containerDATA">
		<div class="middlebox">RESPONSE:<br>{"status":400,"status_message":"Bad Request","data":null}<br></div>
	</div>
	<?php	
	}
	
	//<!--Check emptiness for Paired search Author and category-->
	if(empty($_GET['author2']) && !empty($_GET['category2'])) {
		echo '<style>#code { display: none; }</style>';
		echo '<style>#code2 { display: none; }</style>';		
	?>
	<div class="containerDATA">
		<div class="middlebox">RESPONSE:<br>{"status":400,"status_message":"Bad Request, Provide Category with Author Name","data":null}<br></div>
	</div>
	<?php	
	}
	
	if(!empty($_GET['author2']) && empty($_GET['category2'])) {
		echo '<style>#code { display: none; }</style>';
		echo '<style>#code2 { display: none; }</style>';		
	?>
	<div class="containerDATA">
		<div class="middlebox">RESPONSE:<br>{"status":400,"status_message":"Bad Request, Provide, Author with Category Name","data":null}<br></div>
	</div>
	<?php	
	}
	
	//********************************************************
	//<!--Check emptiness for Paired search Author and year-->
	if(empty($_GET['author3']) && !empty($_GET['year1'])) {
		echo '<style>#code { display: none; }</style>';
		echo '<style>#code2 { display: none; }</style>';		
	?>
	<div class="containerDATA">
		<div class="middlebox">RESPONSE:<br>{"status":400,"status_message":"Bad Request, Provide Publication year with Author Name","data":null}<br></div>
	</div>
	<?php	
	}
	
	if(!empty($_GET['author3']) && empty($_GET['year1'])) {
		echo '<style>#code { display: none; }</style>';
		echo '<style>#code2 { display: none; }</style>';		
	?>
	<div class="containerDATA">
		<div class="middlebox">RESPONSE:<br>{"status":400,"status_message":"Bad Request, Provide, Author with Publication year Name","data":null}<br></div>
	</div>
	<?php	
	}
	
	
	
	
	
	//***** SEARCH BY BOOK TITLE AND FORMAT****************
	if((!empty($_GET['title']))){
		$title = getAllDetails($_GET['title']); 
		$year = getBookByYear($_GET['year']); 
		$format = ($_GET['f']);			
		
		
		if(empty($title)){
			deliver_responseJSON('200', 'No Book Found by title '.$_GET['title'], null);
			//echo ($myArr."\n\n"); // display error "no book found".
			echo '<style>#code { display: none; }</style>';
			echo '<style>#code2 { display: none; }</style>';
			
		?>
		<div class="containerDATA">
			<div class="middlebox">RESPONSE:<br><br><?php echo ($myArr); ?></div>
		</div>
		<?php
			
		}
		
		elseif (!empty($title) && $format == 'json'){
			deliver_responseJSON('200', 'Book found', $title);
			//echo ($myArr."\n\n"); // output data the json.
			echo '<style>#code { color: blue; }</style>';
			echo '<style>#code2 { display: none; }</style>';
			
		?>
		<div class="containerDATA">
			<div class="middlebox">RESPONSE:<br><br><?php echo ($myArr); ?></div>
		</div>
		<?php
			
			deliver_responseXML($title); // will trigger the xml to display
			
		}
		elseif(!empty($title) && $format == 'xml'){
			deliver_responseXML($title);
			echo '<style>#code2 { display: none; }</style>';
		?>		
		<div class="containerDATA">
			<div class="middlebox">RESPONSE:<br><br><?php echo $xml_data; ?></div>
		</div>
		<?php
			
		}
		
	}	
	
	//***** SEARCH BY YEAR AND FORMAT********************
	if((!empty($_GET['year']))){
		$year = getBookByYear($_GET['year']); 
		$format = ($_GET['f']);			
		
		
		if(empty($year)){
			deliver_responseJSON('200', 'No Book Found by year '.$_GET['year'], null);
			//echo ($myArr."\n\n"); // display error "no book found".
			echo '<style>#code { display: none; }</style>';
			echo '<style>#code2 { display: none; }</style>';
			echo '<style>.containerDATA2 { 
			position: absolute;
			bottom: 20px;
			left: 50%;
			top:1400px;
			transform: translateX(-50%);
			width: 80%;
			}</style>';	
			
		?>
		<div class="containerDATA2">
			<div class="middlebox">RESPONSE:<br><br><?php echo ($myArr); ?></div>
		</div>
		<?php
			
		}
		elseif (!empty($year) && $format == 'json'){
			deliver_responseJSON('200', 'Book found', $year);
			//echo ($myArr."\n\n"); // output data the json.
			echo '<style>#code2 { color: blue; }</style>';
			echo '<style>#code { display: none; }</style>';	
			
			echo '<style>.containerDATA2 { 
			position: absolute;
			bottom: 20px;
			left: 50%;
			top:1400px;
			transform: translateX(-50%);
			width: 80%;
			}</style>';			
			
		?>
		<div class="containerDATA2">
			<div class="middlebox">RESPONSE:<br><br><?php echo ($myArr); ?></div>
		</div>
		<?php
			
			deliver_responseXML($year); // will trigger the xml to display
			
		}
		elseif(!empty($year) && $format == 'xml'){
			deliver_responseXML($year);
			echo '<style>#code2 { color: blue; }</style>';
			echo '<style>#code { display: none; }</style>';	
			
			echo '<style>.containerDATA2 { 
			position: absolute;
			bottom: 20px;
			left: 50%;
			top:1400px;
			transform: translateX(-50%);
			width: 80%;
			}</style>';	
		?>		
		<div class="containerDATA2">
			<div class="middlebox">RESPONSE:<br><br><?php echo $xml_data; ?></div>
		</div>
		<?php
			
		}
		
	}
	
	//***** SEARCH BY author********************
	if((!empty($_GET['author']))){
		$author = getBookByauthor($_GET['author']); 
		$format = ($_GET['f']);			
		
		
		if(empty($author)){
			deliver_responseJSON('200', 'No Book Found by author '.$_GET['author'], null);
			//echo ($myArr."\n\n"); // display error "no book found".
			echo '<style>#code { display: none; }</style>';
			echo '<style>#code2 { display: none; }</style>';
			
			echo '<style>.containerDATA2 { 
			position: absolute;
			bottom: 20px;
			left: 50%;
			top:1400px;
			transform: translateX(-50%);
			width: 80%;
			}</style>';	
			
			
		?>
		<div class="containerDATA2">
			<div class="middlebox">RESPONSE:<br><br><?php echo ($myArr); ?></div>
		</div>
		<?php
			
		}
		elseif (!empty($author) && $format == 'json'){
			deliver_responseJSON('200', 'Book found', $author);
			//echo ($myArr."\n\n"); // output data the json.
			echo '<style>#code2 { color: blue; }</style>';
			echo '<style>#code { display: none; }</style>';	
			
			echo '<style>.containerDATA2 { 
			position: absolute;
			bottom: 20px;
			left: 50%;
			top:1400px;
			transform: translateX(-50%);
			width: 80%;
			}</style>';	
			
			
		?>
		<div class="containerDATA2">
			<div class="middlebox">RESPONSE:<br><br><?php echo ($myArr); ?></div>
		</div>
		<?php
			
			deliver_responseXML($author); // will trigger the xml to display
			
		}
		elseif(!empty($author) && $format == 'xml'){
			deliver_responseXML($author);
			echo '<style>#code2 { color: blue; }</style>';
			echo '<style>#code { display: none; }</style>';	
			
			echo '<style>.containerDATA2 { 
			position: absolute;
			bottom: 20px;
			left: 50%;
			top:1400px;
			transform: translateX(-50%);
			width: 80%;
			}</style>';	
		?>		
		<div class="containerDATA2">
			<div class="middlebox">RESPONSE:<br><br><?php echo $xml_data; ?></div>
		</div>
		<?php
			
		}
		
	}
	
	//***** SEARCH BY CATEGORY********************
	if((!empty($_GET['category']))){
		$category = getBookBycategory($_GET['category']); 
		$format = ($_GET['f']);			
		
		
		if(empty($category)){
			deliver_responseJSON('200', 'No Book Found by category '.$_GET['category'], null);
			//echo ($myArr."\n\n"); // display error "no book found".
			echo '<style>#code { display: none; }</style>';
			echo '<style>#code2 { display: none; }</style>';
			
			echo '<style>.containerDATA2 { 
			position: absolute;
			bottom: 20px;
			left: 50%;
			top:1400px;
			transform: translateX(-50%);
			width: 80%;
			}</style>';	
			
		?>
		<div class="containerDATA2">
			<div class="middlebox">RESPONSE:<br><br><?php echo ($myArr); ?></div>
		</div>
		<?php
			
		}
		elseif (!empty($category) && $format == 'json'){
			deliver_responseJSON('200', 'Book found', $category);
			//echo ($myArr."\n\n"); // output data the json.
			echo '<style>#code2 { color: blue; }</style>';
			echo '<style>#code { display: none; }</style>';	
			
			echo '<style>.containerDATA2 { 
			position: absolute;
			bottom: 20px;
			left: 50%;
			top:1400px;
			transform: translateX(-50%);
			width: 80%;
			}</style>';	
			
			
		?>
		<div class="containerDATA2">
			<div class="middlebox">RESPONSE:<br><br><?php echo ($myArr); ?></div>
		</div>
		<?php
			
			deliver_responseXML($category); // will trigger the xml to display
			
		}
		elseif(!empty($category) && $format == 'xml'){
			deliver_responseXML($category);
			echo '<style>#code2 { color: blue; }</style>';
			echo '<style>#code { display: none; }</style>';	
			
			/*echo '<style>.containerDATA { position: absolute;		
				top:1400px;
				left: 50%;
			transform: translate; }</style>';*/
			echo '<style>.containerDATA2 { 
			position: absolute;
			bottom: 20px;
			left: 50%;
			top:1400px;
			transform: translateX(-50%);
			width: 80%;
			}</style>';	
		?>		
		<div class="containerDATA2">
			<div class="middlebox">RESPONSE:<br><br><?php echo $xml_data; ?></div>
		</div>
		<?php
			
		}
		
	}
	
	//*******************************
	//******************************* PAIRED/GROUPED SEARCH
	//***** SEARCH BY author and category********************
		
	if((!empty($_GET['author2'])) && (!empty($_GET['category2']))){
		$authorCat = getBookByauthorAndCategory(($_GET['author2']),($_GET['category2'])); 
		$format = ($_GET['f']);			
		
		
		if(empty($authorCat)){
			deliver_responseJSON('200', 'No Book Found by author '.$_GET['author2'].' and category '.$_GET['category2'], null);
			//echo ($myArr."\n\n"); // display error "no book found".
			echo '<style>#code { display: none; }</style>';
			echo '<style>#code2 { display: none; }</style>';
			
			echo '<style>.containerDATA2 { 
			position: absolute;
			bottom: 20px;
			left: 50%;
			top:1400px;
			transform: translateX(-50%);
			width: 80%;
			}</style>';	
			
		?>
		<div class="containerDATA2">
			<div class="middlebox">RESPONSE:<br><br><?php echo ($myArr); ?></div>
		</div>
		<?php
			
		}
		elseif (!empty($authorCat) && $format == 'json'){
			deliver_responseJSON('200', 'Book found', $authorCat);
			//echo ($myArr."\n\n"); // output data the json.
			echo '<style>#code2 { color: blue; }</style>';
			echo '<style>#code { display: none; }</style>';	
			
			echo '<style>.containerDATA2 { 
			position: absolute;
			bottom: 20px;
			left: 50%;
			top:1000px;
			transform: translateX(-50%);
			width: 80%;
			}</style>';	
			
			
		?>
		<div class="containerDATA2">
			<div class="middlebox">RESPONSE:<br><br><?php echo ($myArr); ?></div>
		</div>
		<?php
			
			deliver_responseXML($authorCat); // will trigger the xml to display
			
		}
		elseif(!empty($authorCat) && $format == 'xml'){
			deliver_responseXML($authorCat);
			echo '<style>#code2 { color: blue; }</style>';
			echo '<style>#code { display: none; }</style>';	
			
			/*echo '<style>.containerDATA { position: absolute;		
				top:1400px;
				left: 50%;
			transform: translate; }</style>';*/
			echo '<style>.containerDATA2 { 
			position: absolute;
			bottom: 20px;
			left: 50%;
			top:1000px;
			transform: translateX(-50%);
			width: 80%;
			}</style>';	
		?>		
		<div class="containerDATA2">
			<div class="middlebox">RESPONSE:<br><br><?php echo $xml_data; ?></div>
		</div>
		<?php
			
		}
		
	}
	
	//***** SEARCH BY author and year********************
		
	if((!empty($_GET['author3'])) && (!empty($_GET['year1']))){
		$authorYear = getBookByauthorAndYear(($_GET['author3']),($_GET['year1'])); 
		$format = ($_GET['f']);			
		
		
		if(empty($authorYear)){
			deliver_responseJSON('200', 'No Book Found by author '.$_GET['author3'].' and Publication year '.$_GET['year1'], null);
			//echo ($myArr."\n\n"); // display error "no book found".
			echo '<style>#code { display: none; }</style>';
			echo '<style>#code2 { display: none; }</style>';
			
			echo '<style>.containerDATA2 { 
			position: absolute;
			bottom: 20px;
			left: 50%;
			top:1400px;
			transform: translateX(-50%);
			width: 80%;
			}</style>';	
			
		?>
		<div class="containerDATA2">
			<div class="middlebox">RESPONSE:<br><br><?php echo ($myArr); ?></div>
		</div>
		<?php
			
		}
		elseif (!empty($authorYear) && $format == 'json'){
			deliver_responseJSON('200', 'Book found', $authorYear);
			//echo ($myArr."\n\n"); // output data the json.
			echo '<style>#code2 { color: blue; }</style>';
			echo '<style>#code { display: none; }</style>';	
			
			echo '<style>.containerDATA2 { 
			position: absolute;
			bottom: 20px;
			left: 50%;
			top:1000px;
			transform: translateX(-50%);
			width: 80%;
			}</style>';	
			
			
		?>
		<div class="containerDATA2">
			<div class="middlebox">RESPONSE:<br><br><?php echo ($myArr); ?></div>
		</div>
		<?php
			
			deliver_responseXML($authorYear); // will trigger the xml to display
			
		}
		elseif(!empty($authorYear) && $format == 'xml'){
			deliver_responseXML($authorYear);
			echo '<style>#code2 { color: blue; }</style>';
			echo '<style>#code { display: none; }</style>';	
			
			/*echo '<style>.containerDATA { position: absolute;		
				top:1400px;
				left: 50%;
			transform: translate; }</style>';*/
			echo '<style>.containerDATA2 { 
			position: absolute;
			bottom: 20px;
			left: 50%;
			top:1000px;
			transform: translateX(-50%);
			width: 80%;
			}</style>';	
		?>		
		<div class="containerDATA2">
			<div class="middlebox">RESPONSE:<br><br><?php echo $xml_data; ?></div>
		</div>
		<?php
			
		}
		
	}
	
	
	//*********************** JSON RESPONSE VERSION *********************//
	function deliver_responseJSON($status, $statusMessage, $data){
		header("HTTP/1.1 $status $statusMessage");
		
		
		$response['status']=$status;
		$response['status_message']=$statusMessage;
		$response['data']=$data;
		
		$json_response=json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK); 
		
		global $myArr; // declare a global variable.
		$myArr = $json_response;  //assign JSON result in global variable.
	}	
	
	//*********************** XML RESPONSE VERSION *********************//
	function deliver_responseXML($title){
		
		$xml = new SimpleXMLElement('<root/>');
		array_walk_recursive($title, function($value, $key) use ($xml) {
			$xml->addChild($key, $value);
		});
		$xml_output = htmlspecialchars($xml->asXML());
		
		global $xml_data;  // declare a global variable.
		$xml_data=$xml_output; //assign XML result in global variable.		
		//echo $xml_data;
		
		
	}
	
	
	
	
?>

<!--*************************-------------HTML--------------------****--->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>OBDM Platform 2023</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- -->
	</head>
	<style>
		table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
		
		}
		th, td {
		padding: 5px;
		text-align: left;
		font-size:20px;
		font-weight: 500;
		background-color:white;
		}
		
		td {
		background-color:gold;
		}
		
		input[type=text] {
		width: 25%;
		box-sizing: border-box;
		border: 2px solid #ccc;
		border-radius: 4px;
		font-size: 16px;
		background-color: white;
		background-image: url('searchicon.png');
		background-position: 10px 10px; 
		background-repeat: no-repeat;
		padding: 12px 20px 12px 40px;
		}
		#year{
		width: 10%;
		}
		
		.button {
		display: inline-block;
		padding: 15px 25px;
		font-size: 15px;
		cursor: pointer;
		text-align: center;
		text-decoration: none;
		outline: none;
		color: #fff;
		background-color: #4CAF50;
		border: none;
		border-radius: 15px;
		box-shadow: 0 9px #999;
		}
		
		.middlebox {
		display: inline-block;
		padding: 15px 25px;
		font-size: 15px;
		cursor: pointer;
		text-align: center;
		text-decoration: none;
		outline: none;
		color: #fff;
		background-color: brown;
		border: none;
		border-radius: 15px;
		box-shadow: 0 9px #999;
		}
		
		.button:hover {background-color: #3e8e41}
		
		.button:active {
		background-color: #3e8e41;
		box-shadow: 0 5px #666;
		transform: translateY(4px);
		}
		
		.center {
		margin-left: auto;
		margin-right: auto;
		
		}
		aside {
		width: 17%;
		padding-left: 15px;
		margin-left: 15px;
		float: left;
		font-style: italic;
		background-color: lightgray;
		}
		
		label {
        font-size: 20px;
		background-color: lightgray;
        font-weight: 700;
        color: black;
		}
		#plot{
		background-color: lightgray
		font-size: 20px;
		}
		
		<!--.containerDATA {
			position: absolute;
			bottom: 20px;
			left: 50%;
			transform: translateX(-50%);
			width: 80%;
		}-->
		.containerDATA {
		position: absolute;		
		top:1000px;
		left: 50%;
		transform: translate;
		}
		
		
		
	</style>
	
	<body style="background-image: url('wallpaperfilm.jpg');">
		
		<!--WELCOME TITLE -->
		<h1 id="txt-Header" style="background-color:green">Book Store Platform 2023 by yudishh👒</h1>
		
		<!--TEXTBOX AND BUTTON FOR INDIVIDUAL SEARCH-->		
		<form id="myForm" action="home.php" method="get">
			<label for="lbldesc">Book title:</label> 
			<input type="text" name="title" id="name" placeholder="🔎Search...">			
			<label for="lbldesc">Year:</label> 
			<input type="text" name="year" id="year">			
			<label for="lbldesc">Authors:</label> 
			<input type="text" name="author" id="year">			
			<label for="lbldesc">Category:</label> 
			<input type="text" name="category" id="year">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label style="color:red; font-size:20px; background-color:black;" for="lbldesc">(Individual search)</label> 
			<!---->
			
			<hr>
			<!--TEXTBOX AND BUTTON FOR PAIRED/GROUP SEARCH AUTHOR AND CATEGORY-->	
			<label for="lbldesc">Author name:</label> 
			<input type="text" name="author2" id="name" placeholder="🔎Search Author and...">			
			<label for="lbldesc">Category name:</label> 
			<input type="text" name="category2" id="year" placeholder="🔎by Category">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label style="color:red; font-size:20px; background-color:black;" for="lbldesc">(Paired/grouped search)</label> 
			<hr>
			<br>
			
			<!--TEXTBOX AND BUTTON FOR PAIRED/GROUP SEARCH AUTHOR AND CATEGORY-->	
			<label for="lbldesc">Author name:</label> 
			<input type="text" name="author3" id="name" placeholder="🔎Search Author and...">			
			<label for="lbldesc">Publication year:</label> 
			<input type="text" name="year1" id="year" placeholder="🔎by Year">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;
			<label style="color:red; font-size:20px; background-color:black;" for="lbldesc">(Paired/grouped search)</label> 
			<hr>
			<br>
			<!---->
			<label for="lbldesc">Search options:</label> <!-- PLOT OPTION -->
			<select name="f" style="width: 125px; height: 26px;">
				<option value="json">json</option>
				<option value="xml">xml</option>
				
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button class="button" id="myButton" onclick="onSubmit()">Get Details</button>
			<button style="background-color:blue;" class="button" id="myButton2" onclick="onRefresh()">refresh</button>
		</form>
		<br>			
		
		<br><br>
		</br></br>
		
		<?php 
			if (isset($xml_data)){
				$xmlDoc =$xml_data;
				//echo ($xmlDoc);
				
				$dataXML = html_entity_decode($xmlDoc);			
				$xml = new SimpleXMLElement($dataXML);	
			}			
		?>
		
		
		<!--DISPLAY POSTER -->
		<div id="code">
			<aside id="data-output2">
				<tr><th>Book Cover</th><td><img src="<?php echo ($xml->cover_photo_url)?>"></td></tr>
				
			</aside>
			
			<!--START OF TABLE -->
			<div id="wrapper_Search" class="hoverTable">
				
				<br>
				<table style="width:100%" id="data-output" class="center"> 		
					<!--TABLE BODY -->
					<tbody id="data-output">   
						
						<tr><th>The Book Title:</th><td><?php echo $xml->book_title; ?></td></tr>
						<tr><th>Author/s:</th><td><?php echo $xml->authors; ?></td></tr>
						<tr><th>Publication Year:</th><td><?php echo $xml->publication_year; ?></td></tr>
						<tr><th>Description:</th><td><?php echo $xml->description; ?></td></tr>
						<tr><th>Language:</th><td><?php echo $xml->language; ?></td></tr>
						<tr><th>ISBN:</th><td><?php echo $xml->ISBN; ?></td></tr>
						<tr><th>Reviews:</th><td><?php echo $xml->reviews; ?> ⭐⭐⭐</td></tr>
						<tr><th>Best Seller:</th><td><?php echo $xml->best_seller; ?></td></tr>
						<tr><th>Category:</th><td><?php echo $xml->category; ?></td></tr>					
					</tbody>
				</table>	
				
			</div>
		</div>
		
		
		<div id="code2">		
			<?php
				if (isset($xml_data)){
					$xmlDoc =$xml_data;
					//echo ($xmlDoc);
					
					$dataXML = html_entity_decode($xmlDoc);			
					$xml = new SimpleXMLElement($dataXML);	
					
					$xml2 = $xmlDoc;
					
					$xml3 = '<pre>' . htmlspecialchars($xml2) . '</pre>';
					
					//$books = $xml3;
					// loop through each book
					foreach ($xml->children() as $element) {
						echo '<div id="wrapper_Search" class="hoverTable">
						<table style="width:100%" id="data-output" class="center"> 
						<tbody id="data-output">
						<tr><th>'
						.$element->getName() . ':</th>' .'<td>'. $element . 
						'</td></tr>
						</tbody>
						</table>
						</div>';
						
						if($element->getName()=='category'){
							echo '<br>';
						}
						
					}
				}
			?>
			<div>
				
				<!--START OF JAVASCRIPT-->
				<script>
					document.body.style.zoom = "80%";
				</script>
				
				
				
				<script>
					function onRefresh() {
						
						setTimeout(function(){
							window.location.reload(1);
						}, 1000);
					}
				</script>
			</body>
		</html>						