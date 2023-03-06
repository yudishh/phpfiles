<?php 
	
	//define are constant.
	//TO open A CONNECTIOn.
	DEFINE ('DB_USER', 'root'); 
	DEFINE ('DB_PASSWORD', '');
	DEFINE ('DB_HOST', 'localhost');
	DEFINE ('DB_NAME', 'book_store');
	//verify your database name
	
	//*********function for title
	//Submit a title of the book, if it exist, return all the details.
	function getAllDetails($title){
		//connection object $conn holds the connection to the Database.
		//connection string.
		$conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
		
		$title = strtolower($title); //convert to lower case.
		
		$query = "select * from books where book_title='".$title."'"; //query in the database.
		$result = mysqli_query($conn, $query); //execute the query.
		
		$book_details = null; //A variable an ARRAY to store the results.
		
		//LOOP IF THERE IS A RESULT SET
		if($result){ 
			while ($row = mysqli_fetch_array($result)){
				$book_details['book_title']=$row['book_title'];
				$book_details['authors']=$row['authors'];
				$book_details['publication_year']=$row['publication_year'];
				$book_details['description']=$row['description'];
				$book_details['language']=$row['language'];
				$book_details['ISBN']=$row['ISBN'];
				$book_details['reviews']=$row['reviews'];
				$book_details['best_seller']=$row['best_seller'];
				$book_details['cover_photo_url']=$row['cover_photo_url'];
				$book_details['category']=$row['category'];
				
				
			} 
			//conn.close(); //close the connection
			return $book_details;
		}		
	}	
	
	//*********function for publication year
	function getBookByYear($year){
		//connection object $conn holds the connection to the Database
		$conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
		
		//get movie by year, year is numeric so no single quote
		$query = "select * from books where publication_year='".$year."'";
		$result = mysqli_query($conn, $query); //execute the query.
		$book_details_array = array(); //initialize an empty array to hold book details.
		
		//LOOP THROUGH THE RESULT SET AND ADD TO THE ARRAY
		while ($row = mysqli_fetch_array($result)){
			$book_details = array();
			$book_details['book_title']=$row['book_title'];
			$book_details['authors']=$row['authors'];
			$book_details['publication_year']=$row['publication_year'];
			$book_details['description']=$row['description'];
			$book_details['language']=$row['language'];
			$book_details['ISBN']=$row['ISBN'];
			$book_details['reviews']=$row['reviews'];
			$book_details['best_seller']=$row['best_seller'];
			$book_details['cover_photo_url']=$row['cover_photo_url'];
			$book_details['category']=$row['category'];	
			
			//add the book details to the array
			$book_details_array[] = $book_details;
		}
		
		//close the database connection
		mysqli_close($conn);
		
		//return the array of book details
		return $book_details_array;		
	}


    //*********function for authors
	function getBookByauthor($author){
		//connection object $conn holds the connection to the Database
		$conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
		
		//get movie by year, year is numeric so no single quote
		$query = "select * from books where authors='".$author."'";
		$result = mysqli_query($conn, $query); //execute the query.
		$book_details_array = array(); //initialize an empty array to hold book details.
		
		//LOOP THROUGH THE RESULT SET AND ADD TO THE ARRAY
		while ($row = mysqli_fetch_array($result)){
			$book_details = array();
			$book_details['book_title']=$row['book_title'];
			$book_details['authors']=$row['authors'];
			$book_details['publication_year']=$row['publication_year'];
			$book_details['description']=$row['description'];
			$book_details['language']=$row['language'];
			$book_details['ISBN']=$row['ISBN'];
			$book_details['reviews']=$row['reviews'];
			$book_details['best_seller']=$row['best_seller'];
			$book_details['cover_photo_url']=$row['cover_photo_url'];
			$book_details['category']=$row['category'];	
			
			//add the book details to the array
			$book_details_array[] = $book_details;
		}
		
		//close the database connection
		mysqli_close($conn);
		
		//return the array of book details
		return $book_details_array;		
	}
	
	//*********function for category
	function getBookBycategory($category){
		//connection object $conn holds the connection to the Database
		$conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
		
		//get movie by year, year is numeric so no single quote
		$query = "select * from books where category='".$category."'";
		$result = mysqli_query($conn, $query); //execute the query.
		$book_details_array = array(); //initialize an empty array to hold book details.
		
		//LOOP THROUGH THE RESULT SET AND ADD TO THE ARRAY
		while ($row = mysqli_fetch_array($result)){
			$book_details = array();
			$book_details['book_title']=$row['book_title'];
			$book_details['authors']=$row['authors'];
			$book_details['publication_year']=$row['publication_year'];
			$book_details['description']=$row['description'];
			$book_details['language']=$row['language'];
			$book_details['ISBN']=$row['ISBN'];
			$book_details['reviews']=$row['reviews'];
			$book_details['best_seller']=$row['best_seller'];
			$book_details['cover_photo_url']=$row['cover_photo_url'];
			$book_details['category']=$row['category'];	
			
			//add the book details to the array
			$book_details_array[] = $book_details;
		}
		
		//close the database connection
		mysqli_close($conn);
		
		//return the array of book details
		return $book_details_array;		
	}
	
	//************* PAIRED/GROUPED SEARCH*/***************////
	//*********function for authors and category
	function getBookByauthorAndCategory($author,$category){
		//connection object $conn holds the connection to the Database
		$conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
		
		//get movie by year, year is numeric so no single quote
		$query = "SELECT * FROM books WHERE category='".$category."' AND authors='".$author."'";
		$result = mysqli_query($conn, $query); //execute the query.
		$book_details_array = array(); //initialize an empty array to hold book details.
		
		//LOOP THROUGH THE RESULT SET AND ADD TO THE ARRAY
		while ($row = mysqli_fetch_array($result)){
			$book_details = array();
			$book_details['book_title']=$row['book_title'];
			$book_details['authors']=$row['authors'];
			$book_details['publication_year']=$row['publication_year'];
			$book_details['description']=$row['description'];
			$book_details['language']=$row['language'];
			$book_details['ISBN']=$row['ISBN'];
			$book_details['reviews']=$row['reviews'];
			$book_details['best_seller']=$row['best_seller'];
			$book_details['cover_photo_url']=$row['cover_photo_url'];
			$book_details['category']=$row['category'];	
			
			//add the book details to the array
			$book_details_array[] = $book_details;
		}
		
		//close the database connection
		mysqli_close($conn);
		
		//return the array of book details
		return $book_details_array;		
	}
	
		//*********function for authors and publication year
	function getBookByauthorAndYear($author,$year){
		//connection object $conn holds the connection to the Database
		$conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
		
		//get movie by year, year is numeric so no single quote
		$query = "SELECT * FROM books WHERE publication_year='".$year."' AND authors='".$author."'";
		$result = mysqli_query($conn, $query); //execute the query.
		$book_details_array = array(); //initialize an empty array to hold book details.
		
		//LOOP THROUGH THE RESULT SET AND ADD TO THE ARRAY
		while ($row = mysqli_fetch_array($result)){
			$book_details = array();
			$book_details['book_title']=$row['book_title'];
			$book_details['authors']=$row['authors'];
			$book_details['publication_year']=$row['publication_year'];
			$book_details['description']=$row['description'];
			$book_details['language']=$row['language'];
			$book_details['ISBN']=$row['ISBN'];
			$book_details['reviews']=$row['reviews'];
			$book_details['best_seller']=$row['best_seller'];
			$book_details['cover_photo_url']=$row['cover_photo_url'];
			$book_details['category']=$row['category'];	
			
			//add the book details to the array
			$book_details_array[] = $book_details;
		}
		
		//close the database connection
		mysqli_close($conn);
		
		//return the array of book details
		return $book_details_array;		
	}
	
	
	
?>
