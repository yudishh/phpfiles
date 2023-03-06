
<style>
	
	th 
	{
	border: 1px solid black;
    }
	
	td 
	{
	border: 1px  solid black;
    }
	
</style>

<?php 
	//$xmlDoc = simplexml_load_file("XmlData.xml");	
	
	
	
	session_start();
	$xmlDoc = $_SESSION['xmlData'];
	echo ($xmlDoc);
	
	
	$dataXML = html_entity_decode($xmlDoc);
	$xml = new SimpleXMLElement($dataXML);
	
	echo $xml->book_title;
	
	
	
	
?>

<table id="example" style="left"  class="hover">
	<thead>
		<tr>
			<th>title</th>
			<th>actors</th>
			<th>year</th>
			<th>description</th>
			<th>poster</th>		
		</tr>
	</thead>
	
	
	
	<tbody>
	<tr>
		<td style="border: 1px solid black;"><?php echo $xml->book_title ?></td>
		<td><?php echo $xml->actors; ?></td>
		<td><?php echo $xml->year; ?></td>
		<td><?php echo $xml->description; ?></td>
		<td><img src="<?php echo  mb_substr($xml->poster, 54, 50)?>"></td>
		
		
	<tr>
	
	</tbody>
	
	</table>