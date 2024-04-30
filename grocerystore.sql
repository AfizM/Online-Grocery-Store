-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 02:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12




/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocerystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE DATABASE grocerystore;
use grocerystore;

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `product_name` varchar(20) DEFAULT NULL,
  `unit_price` float(8,2) DEFAULT NULL,
  `unit_quantity` varchar(15) DEFAULT NULL,
  `in_stock` int(10) UNSIGNED DEFAULT NULL,
  `category` varchar(35) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `unit_price`, `unit_quantity`, `in_stock`, `category`, `img`) VALUES
(1000, 'Fish Fingers', 2.55, '500 gram', 500, 'Frozen', 'fish500.jpg'),
(1001, 'Fish Fingers', 5.00, '1000 gram', 0, 'Frozen', '1000g.png'),
(1002, 'Hamburger Patties', 2.35, 'Pack 10', 704, 'Frozen', 'burgers.png'),
(1003, 'Shelled Prawns', 6.90, '250 gram', 0, 'Frozen', 'prawn.png'),
(1004, 'Tub Ice Cream', 1.80, 'I Litre', 800, 'Frozen', '1litre.jpg'),
(1005, 'Tub Ice Cream', 3.40, '2 Litre', 1200, 'Frozen', '2l.png'),
(2000, 'Panadol', 3.00, 'Pack 24', 2000, 'Medicine', '24p.png'),
(2001, 'Panadol', 5.50, 'Pack 50', 1000, 'Medicine', '50p.png'),
(2002, 'Bath Soap', 2.60, 'Pack 6', 500, 'Household', 'bath.png'),
(2003, 'Garbage Bags Small', 1.50, 'Pack 10', 499, 'Household', '10g.png'),
(2004, 'Garbage Bags Large', 5.00, 'Pack 50', 300, 'Household', '50gb.png'),
(2005, 'Washing Powder', 4.00, '1000 gram', 800, 'Household', 'wash.png'),
(3000, 'Cheddar Cheese', 8.00, '500 gram', 1000, 'Dairy', 'c500.png'),
(3001, 'Cheddar Cheese', 15.00, '1000 gram', 999, 'Dairy', 'c1000.png'),
(3003, 'Navel Oranges', 3.99, 'Bag 20', 200, 'Fruit', 'o.png'),
(3004, 'Bananas', 1.49, 'Kilo', 399, 'Fruit', 'b.png'),
(3005, 'Peaches', 2.99, 'Kilo', 500, 'Fruit', 'p.png'),
(3006, 'Grapes', 3.50, 'Kilo', 200, 'Fruit', 'g.png'),
(3007, 'Apples', 1.99, 'Kilo', 500, 'Fruit', 'a.png'),
(4000, 'Earl Grey Tea Bags', 2.49, 'Pack 25', 1200, 'Beverages', 'e25.png'),
(4001, 'Earl Grey Tea Bags', 7.25, 'Pack 100', 1200, 'Beverages', 'e50.png'),
(4002, 'Earl Grey Tea Bags', 13.00, 'Pack 200', 800, 'Beverages', 'e100.png'),
(4003, 'Instant Coffee', 2.89, '200 gram', 0, 'Beverages', 'co500.png'),
(4004, 'Instant Coffee', 5.10, '500 gram', 500, 'Beverages', 'co1000.png'),
(5000, 'Dry Dog Food', 5.95, '5 kg Pack', 395, 'Pet Food', 'df1.png'),
(5001, 'Dry Dog Food', 1.95, '1 kg Pack', 400, 'Pet Food', 'df5.png'),
(5002, 'Bird Food', 3.99, '500g packet', 200, 'Pet Food', 'bf500.png'),
(5003, 'Cat Food', 2.00, '500g tin', 200, 'Pet Food', 'cf500.png'),
(5004, 'Fish Food', 3.00, '500g packet', 200, 'Pet Food', 'ff500.png'),
(2006, 'Laundry Bleach', 3.55, '2 Litre Bottle', 500, 'Household', '2lb.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
