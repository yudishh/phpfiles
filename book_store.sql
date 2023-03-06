-- phpMyAdmin SQL Dump
	-- version 4.8.2
	-- https://www.phpmyadmin.net/
	--
	-- Host: 127.0.0.1
	-- Generation Time: Jul 27, 2020 at 10:27 AM
	-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
	-- Database: `book_store`
--

-- --------------------------------------------------------

--
	-- Table structure for table `books`
--
CREATE DATABASE bookDatabase;

USE bookDatabase;

CREATE TABLE `books` (
	`book_id` int(11) NOT NULL,
	`book_title` varchar(255) NOT NULL,
	`authors` varchar(255) NOT NULL,
	`publication_year` int(11) NOT NULL,
	`description` text,
	`language` varchar(255),
	`ISBN` varchar(255),
	`reviews` float(2,1),
	`best_seller` varchar(3),
	`cover_photo_url` text NOT NULL,
	`category` varchar(255),
	PRIMARY KEY (book_id)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
	-- Dumping data for table `books`
--http://localhost:8080/myNewWebApp/lec12prac/movie_api/img/titanic.jpg

INSERT INTO `books` (`book_id`, `book_title`, `authors`, `publication_year`, `description`, `language`,`ISBN`,`reviews`,`best_seller`,`cover_photo_url`,`category`) VALUES
(1,'To Kill a Mockingbird', 'Harper Lee', '1960', 'To Kill a Mockingbird is a novel by Harper Lee published in 1960. It was immediately successful, winning the Pulitzer Prize, and has become a classic of modern American literature.', 'English','9780061120084','4.3','Yes','To_Kill_a_Mockingbird.jpg','Fiction'),


(2,'The Hitchhiker''s Guide to the Galaxy', 'Douglas Adams', '1979', 'The Hitchhiker''s Guide to the Galaxy is a comedy science fiction series created by Douglas Adams.', 'English', '9780345391803', '4.5', 'Yes', 'The_Hitchhiker''s.jpg', 'Science Fiction'),

(3,'Harry Potter and the Philosopher''s Stone', 'J.K. Rowling', '1997', 'Harry Potter and the Philosopher''s Stone is a fantasy novel by J.K. Rowling, published in 1997.', 'English', '9781408855652', '4.8', 'Yes', 'and_the_Philosopher_Stone_banner.jpg', 'Fantasy'),

(4,'The Da Vinci Code', 'Dan Brown', '2003', 'The Da Vinci Code is a mystery-thriller novel by Dan Brown, published in 2003.', 'English', '9780307474278', '3.7', 'Yes', 'mg/DaVinciCode.jpg', 'Mystery'),

(5,'The Alchemist', 'Paulo Coelho', '1988', 'The Alchemist is a novel by Brazilian author Paulo Coelho, published in 1988.', 'English', '9780062315007', '4.7', 'Yes', 'TheAlchemist.jpg','Fiction'),

(6,'The Lord of the Rings', 'J.R.R. Tolkien', '1954', 'The Lord of the Rings is an epic fantasy novel by J.R.R. Tolkien, published in 1954.', 'English', '9780544445789', '4.9', 'Yes', '_Lord_of_the_Rings.jpg','Fantasy'),

(7,'The Hunger Games', 'Suzanne Collins', '2008', 'The Hunger Games is a dystopian novel by American author Suzanne Collins, published in 2008.', 'English', '9780439023481', '4.3', 'Yes', '_Hunger_Games.jpg','Science Fiction')


;

--
	-- Indexes for dumped tables
--

--
	-- Indexes for table `books`
--
ALTER TABLE `books`
ADD PRIMARY KEY (`book_id`);

--
	-- AUTO_INCREMENT for dumped tables
--

--
	-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
