-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2017 at 10:49 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(100) NOT NULL,
  `author_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_name`) VALUES
(1, 'Charles Dicken'),
(2, 'J.K.Rowlings'),
(3, 'Chetan Bhagat'),
(4, 'William Shakespeare'),
(5, 'R.N.Tagore'),
(6, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `pii_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Adventure'),
(2, 'Fiction'),
(3, 'Literature'),
(4, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(20) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(15) NOT NULL,
  `customer_address` varchar(50) NOT NULL,
  `customer_city` text NOT NULL,
  `customer_number` int(20) NOT NULL,
  `customer_ip` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_address`, `customer_city`, `customer_number`, `customer_ip`) VALUES
(4, 'Hitesh', 'hitesh@gmail.com', '123', 'Unr', 'unr', 2147483647, 0),
(5, 'Hitesh', 'h@gmail.com', '125', 'mumbai', 'mumbai', 65845744, 0),
(6, 'Hitesh', 'h@gmail.com', '125', 'mumbai', 'mumbai', 65845744, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(100) NOT NULL,
  `p_category` int(100) NOT NULL,
  `p_author` int(100) NOT NULL,
  `p_title` varchar(255) NOT NULL,
  `p_price` int(100) NOT NULL,
  `p_descript` text NOT NULL,
  `p_image` text NOT NULL,
  `p_keywords` text NOT NULL,
  `p_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_category`, `p_author`, `p_title`, `p_price`, `p_descript`, `p_image`, `p_keywords`, `p_quantity`) VALUES
(6, 3, 5, 'Gitanjali', 14, 'This deluxe edition of the Tagore classic features the manuscripts of the original Bengali poems. The English translation done by the poet himself appear on the right hand pages. The book also includes: Introduction by W.B. Yeats; the English translation of the Introduction to the French edition; photographs of the medal and citation of the Nobel Prize awarded to Tagore; a selection of newspaper clippings; Tagore\'s Nobel Prize acceptance speech.\r\n', 'git.jpg ', 'gitanjali', 6),
(7, 1, 2, 'Harry Potter', 25, 'Harry Potter and the Philosopher\'s Stone is the first novel in the Harry Potter series and J. K. Rowling\'s debut novel, first published in 1997 by Bloomsbury. It was published in the United States as Harry Potter and the Sorcerer\'s Stone by Scholastic Corporation in 1998. The plot follows Harry Potter, a young wizard who discovers his magical heritage as he makes close friends and a few enemies in his first year at the Hogwarts School of Witchcraft and Wizardry', 'harry.png', 'adventure book', 3),
(8, 1, 2, 'Fantastic Beats', 18, 'Inspired by the original Hogwarts textbook by Newt Scamander, Fantastic Beasts and Where to Find Them: The Original Screenplay marks the screenwriting debut of J.K. Rowling, author of the beloved and internationally bestselling Harry Potter books. A feat of imagination and showcasing a cast of remarkable characters, this is epic, adventure-packed storytelling at its very best. Whether an existing fan or new to the wizarding world, this is a perfect addition to any film lover\'s or reader\'s bookshelf.', 'fantastic.jpg ', 'adventure', 8),
(9, 2, 3, 'One Indian Girl', 12, 'One Indian Girl is the story of Radhika Mehta, a worker at the Distressed Debt group of Goldman Sachs, an investment bank. While in goa for an arranged marriage with Brijesh Gulati, who works with Facebook. She was a nerd throughout her academic career and her parents and friends believe her to be too reserved. However she lived a totally different life during her professional projects in New York and Hong Kong. She is contacted by two of her ex-boyfriends, Debu and Neel,few days prior to her grands destination wedding and both ask her to elope with them respectively. Radhika must choose between the three of them and must come to terms with her past in New York and Hong Kong, while also maintaining her good, nerdy girl personality for her family\'s image.', 'one.jpg ', 'one indian girl', 8),
(10, 2, 2, 'Snape', 17, 'In this examination of J.K. Rowling\'s most enigmatic character, Lorrie Kim shows us how to sort through the illusions and lies to the man who dared to spy on Voldemort. In his final moments, he asks Harry, and the reader, to \"Look at me.\" This book does just that.', 'Snape.jpg ', 'snape', 8),
(11, 4, 6, 'I Contain Multitudes', 25, 'best ipad ever..\r\nNETWORK	Technology	\r\nGSM / CDMA / HSPA / EVDO / LTE\r\nLAUNCH	Announced	2015, September\r\nStatus	Available. Released 2015, November\r\nBODY	Dimensions	305.7 x 220.6 x 6.9 mm (12.04 x 8.69 x 0.27 in)\r\nWeight	713 g (Wi-Fi) / 723 g (LTE) (1.57 lb)\r\nSIM	Nano-SIM/ Electronic SIM card (e-SIM)\r\n 	- Stylus\r\nDISPLAY	Type	LED-backlit IPS LCD, capacitive touchscreen, 16M colors\r\nSize	12.9 inches (~77.0% screen-to-body ratio)\r\nResolution	2048 x 2732 pixels (~264 ppi pixel density)\r\nMultitouch	Yes\r\nProtection	Scratch-resistant glass, oleophobic coating\r\nPLATFORM	OS	iOS 9, upgradable to iOS 10.0.2\r\nChipset	Apple A9X\r\n', 'multitudes.png', 'multitudes', 8),
(12, 2, 1, 'Oliver Twists', 22, 'Oliver Twist, or The Parish Boy\'s Progress, is the second novel by English author Charles Dickens and was first published as a serial 1837–39. The story is of the orphan Oliver Twist, who is born in a workhouse and is then sold into apprenticeship with an undertaker. He escapes from there and travels to London, where he meets the Artful Dodger, a member of a gang of juvenile pickpockets led by the elderly criminal, Fagin.', 'oliver.jpg ', 'oliver', 8),
(13, 4, 6, 'Java', 48, 'The Deitels’ groundbreaking How to Program series offers unparalleled breadth and depth of object-oriented programming concepts and intermediate-level topics for further study. Their Live Code Approach features thousands of lines of code in hundreds of complete working programs. This enables readers  to confirm that programs run as expected. Java How to Program (Early Objects) 9e contains an optional extensive OOD/UML 2 case study on developing and implementing the software for an automated teller machine.This edition covers both Java SE7 and SE6.', 'j.jpg ', 'java', 8),
(14, 3, 4, 'Routledge Guide', 40, 'Demystifying and contextualising Shakespeare for the twenty-first century, this book offers both an introduction to the subject for beginners as well as an invaluable resource for more experienced Shakespeareans.\r\n\r\nIn this friendly, structured guide, Robert Shaughnessy:\r\n\r\nintroduces Shakespeare’s life and works in context, providing crucial historical background\r\nlooks at each of Shakespeare’s plays in turn, considering issues of historical context, contemporary criticism and performance history\r\nprovides detailed discussion of twentieth-century Shakespearean criticism, exploring the theories, debates and discoveries that shape our understanding of Shakespeare today\r\nlooks at contemporary performances of Shakespeare on stage and screen\r\nprovides further critical reading by play\r\noutlines detailed chronologies of Shakespeare’s life and works and also of twentieth-century criticism', 'r.jpg ', 'routledge', 8),
(15, 1, 2, 'harry-3', 15, 'harry potter return', 'harry.png ', 'harry potter', 8),
(16, 1, 6, 'Game Of Thrones', 50, 'best', 'got.jpg ', 'got', 8),
(17, 1, 2, 'deathly hallows', 30, 'best', 'Justin M. Maller  Wallpaper  Helmetica.jpg ', 'hp', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`pii_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`),
  ADD UNIQUE KEY `customer_id_2` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
