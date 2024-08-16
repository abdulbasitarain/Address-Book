-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 04:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `address_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pprice` float NOT NULL,
  `pqyt` int(20) NOT NULL,
  `ipaddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `pid`, `pprice`, `pqyt`, `ipaddress`) VALUES
(68, 24, 199, 19, '::1'),
(69, 3, 1999, 0, '::1'),
(70, 9, 2999, 0, '::1'),
(71, 4, 499, 0, '::1'),
(72, 17, 69, 0, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `parent_id`) VALUES
(2, 'Cosmetics', 0),
(3, 'Jewellery', 0),
(4, 'Eyes', 2),
(5, 'Nails', 2),
(6, 'Lips', 2),
(7, 'Makeup Tools', 2),
(8, 'Rings', 3),
(9, 'Ear Rings', 3),
(10, 'Necklace', 3),
(13, 'Bracelet', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `workphone` int(11) NOT NULL,
  `cellphone` int(11) NOT NULL,
  `birthdate` text NOT NULL,
  `category` varchar(20) NOT NULL,
  `remarks` text NOT NULL,
  `orderproduct` text NOT NULL,
  `orderprice` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fname`, `lname`, `address`, `email`, `workphone`, `cellphone`, `birthdate`, `category`, `remarks`, `orderproduct`, `orderprice`) VALUES
(9, 'Ali', 'Azem', 'Malir', 'aa@gmail.com', 213215123, 213215123, '2023-07-01', 'Cosmetics', 'Product B stands out with its affordability and exceptional value for money. It has gained significant popularity due to its user-friendly design and positive customer feedback.\"', 'Addict Lip Glow Lip Balm (3) ', '642'),
(11, 'Shujaat', 'Hussain', 'Quaidabad', 'SSS@gamil.com', 2147483647, 312589523, '2023-07-28', 'Cosmetics', '\"Highly innovative and reliable, Product A is our best-selling product. It offers cutting-edge features and exceptional performance, exceeding customer expectations.\"', 'Expressie FX Nail Polish (3) , Hypnôse Buildable Volume Mascara (4) ', '483'),
(12, 'Sami', 'Aktar', 'Model Colony', 'sami@gmail.com', 1245124512, 2147483647, '2023-06-08', 'Cosmetics', 'Product B stands out with its affordability and exceptional value for money. It has gained significant popularity due to its user-friendly design and positive customer feedback.\"', 'Expressie FX Nail Polish (3) , Hypnôse Buildable Volume Mascara (4) ', '483'),
(13, 'Basit', 'Ahmed', 'Saddar', 'bas@gmail.com', 2147483647, 2147483647, '2023-07-06', 'Cosmetics', 'Best-selling product. It offers cutting-edge features and exceptional performance, exceeding customer expectations.\"', 'Morphe X Ariel Signature Face 5-Piece Face Brush S (1) ', '199'),
(14, 'Rayyan', 'Mughal', 'Malir', 'rayyan@gmail.com', 2147483647, 2147483647, '1995-07-15', 'Jewellery', 'It has gained significant popularity due to its user-friendly design and positive customer feedback.\"', 'Diamond Double Frame Stud Earrings (3) ', '150'),
(15, 'Tamioor', 'Khan', 'Gulshan', 't@gmail.com', 2121321322, 852456951, '2008-06-15', 'Cosmetics', 'Highly innovative and reliable. It offers cutting-edge features and exceptional performance, exceeding customer expectations.', 'Hypnôse Buildable Volume Mascara (1) ', '99'),
(17, 'Haider', 'Ali', 'Model Colony', 'ali@gmail.com', 312122122, 265564656, '2010-07-07', 'Cosmetics', 'Exceptional performance, exceeding customer expectations', 'Lash Idôle Volumizing Mascara (4) ', '80'),
(19, 'Taha', 'Khan', 'Model Colony', 'khan@gmail.com', 2121212121, 2147483647, '2023-07-01', 'Cosmetics', 'Best-selling product. It offers cutting-edge features and exceptional performance, exceeding customer expectations.\"', 'Lipstick Matte (1) ', '69'),
(20, 'Ismail', 'Khan', 'Rafay Am', 'is@gmail.com', 2147483647, 2147483647, '2023-06-30', 'Cosmetics', ' It has gained significant popularity due to its user-friendly design and positive customer feedback.', 'GrandeLASH Enhancing Serum (2) ', '60'),
(22, 'Zain', 'Ali', 'Quaidabad', 'zain@gmail.com', 21020120, 2147483647, '2023-08-02', 'Jewellery', 'Best-selling product. It offers cutting-edge features and exceptional performance, exceeding customer expectations.\"', 'Diamond Double Frame Stud Earrings (1) ', '50');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `idd` int(11) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_des` text DEFAULT NULL,
  `product_price` float(10,0) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_img` text DEFAULT NULL,
  `product_status` varchar(50) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`idd`, `product_name`, `product_des`, `product_price`, `product_quantity`, `product_img`, `product_status`, `cat_id`) VALUES
(3, 'Diamond Bypass Ring in 14K White Gold', 'This item is electroplated with rhodium or finished with an e-coating. These finishes may wear off with frequent use. Ask a jewelry consultant for details.', 1999, 5, 'r2.png', 'In stock', 3),
(4, 'Diamond Frame Engagement Ring', 'This item is electroplated with rhodium or finished with an e-coating. These finishes may wear off with frequent use. Ask a jewelry consultant for details.', 499, 5, 'r3.png', 'In stock', 3),
(7, 'Diamond Hoop Earrings', 'This item is electroplated with rhodium or finished with an e-coating. These finishes may wear off with frequent use. Ask a jewelry consultant for details.', 2999, 3, 'e3.png', 'In stock', 3),
(8, 'Diamond Double Frame Pendant', 'This item is electroplated with rhodium or finished with an e-coating. These finishes may wear off with frequent use. Ask a jewelry consultant for details.', 6599, 10, 'n2.webp', 'In stock', 3),
(9, 'Diamond Lattice Necklace Charm', 'This item is electroplated with rhodium or finished with an e-coating. These finishes may wear off with frequent use. Ask a jewelry consultant for details.', 2999, 5, 'n1.jpg', 'In stock', 3),
(10, 'Solid Curb Chain Necklace ', 'This item is electroplated with rhodium or finished with an e-coating. These finishes may wear off with frequent use. Ask a jewelry consultant for details.', 4999, 3, 'n3.png', 'In stock', 3),
(11, 'Diamond Tennis Bolo Bracelet', 'This item is electroplated with rhodium or finished with an e-coating. These finishes may wear off with frequent use. Ask a jewelry consultant for details.', 9999, 3, 'b1.jpg', 'In stock', 3),
(12, 'Diamond-Cut Beveled Bracelet', 'This item is electroplated with rhodium or finished with an e-coating. These finishes may wear off with frequent use. Ask a jewelry consultant for details.', 3999, 3, 'b2.jpg', 'In stock', 3),
(13, 'White Lab-Created Sapphire Bolo Bracelet', 'This item is electroplated with rhodium or finished with an e-coating. These finishes may wear off with frequent use. Ask a jewelry consultant for details.', 6599, 10, 'b3.png', 'In stock', 3),
(16, 'Hypnôse Buildable Volume Mascara', 'Hypnôse Buildable Volume Mascara by Lancôme offers tiny, barely-there lashes controllable, custom volume thanks to a POWERFULL brush that thickens lashes from root to tip.', 99, 5, 'ee3.png', 'In stock', 2),
(17, 'Lipstick Matte', 'MAC Lipstick Matte is a creamy, rich lipstick formula with high-color payoff in a matte finish.', 69, 3, 'l2.png', 'In stock', 2),
(18, 'Addict Lip Glow Lip Balm', 'The iconic Dior Addict Lip Glow Lip Balm with 97% natural-origin ingredients that awakens the natural color of lips with a custom glow and 24h hydration.', 99, 5, 'l1.png', 'In stock', 2),
(19, 'Addict Lipstick', 'Dior Addict Lipstick is reinvented with a refillable couture case. The 90% natural-origin* formula offers 24-hour** hydration, 6-hour color and shine.', 159, 10, 'l3.png', 'In stock', 2),
(20, 'Expressie FX Nail Polish', 'Get maximum expression with minimum effort by pairing any essie expressie quick dry nail color shade with expressie FX quick dry top coats to instantly transform your manicure.', 29, 3, 'p1.png', 'In stock', 2),
(21, 'Nail Lacquer with Hardeners', 'China Glaze is a professional-level nail enamel made with a special balance of polymers and resins that combine to create a nail lacquer that is long lasting, chip-resistant and resistant to color and shine fading.', 99, 10, 'p3.png', 'In stock', 2),
(22, 'Nail Lacquer', 'Zoya Nail Polish is the first Big 10 Free, breathable nail polish created specifically for long wear on natural nails.', 199, 5, 'p2.png', 'In stock', 2),
(23, 'Everyday Essentials Makeup Brush & Sponge Set', 'The 5-piece Real Techniques Everyday Essentials Set is a go-to for pro-styled looks. Use with foundation, concealer, blush, highlighter, and shadow makeup.', 119, 3, 'm1.png', 'In stock', 2),
(24, 'Morphe X Ariel Signature Face 5-Piece Face Brush S', 'Celebrity makeup artist Ariel is known for his signature look: stunning eyes, seamless blends, perfect lines, and face-defining highlights and contours. Using his expertise, he meticulously developed, tested, and perfected the Morphe X Ariel Signature Face 5-Piece Face Brush Set.', 199, 5, 'm3.png', 'In stock', 2),
(26, 'Eye Essentials Makeup Brush Set', 'Real Techniques Everyday Eye Essentials Makeup Brush Set has every brush you need to create flawless eye looks from natural to glam.', 299, 5, 'm2.png', 'In stock', 2),
(27, 'Diamond Double Frame Stud Earrings', 'This item is electroplated with rhodium or finished with an e-coating. These finishes may wear off with frequent use. Ask a jewelry consultant for details.', 50, 3, 'e1.png', 'In stock', 3),
(28, 'Multi-Diamond Stud Earrings', 'This item is electroplated with rhodium or finished with an e-coating. These finishes may wear off with frequent use. Ask a jewelry consultant for details.', 60, 5, 'e2.png', 'In stock', 3),
(29, 'Lash Idôle Volumizing Mascara', 'Lash Enhancing Serum	Promote the appearance of naturally longer, thicker looking lashes in 4-6 weeks with GrandeLASH-MD Lash Enhancing Serum by Grande Cosmetics.', 20, 10, 'ee1.png', 'In stock', 2),
(30, 'GrandeLASH Enhancing Serum', 'Promote the appearance of naturally longer, thicker looking lashes in 4-6 weeks with GrandeLASH-MD Lash Enhancing Serum by Grande Cosmetics.', 30, 20, 'ee2.png', 'In stock', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(30, 'asad', 'asad@gmail.com', '064d8356f9904297d74368b3637e93b3', 1),
(31, 'Basit', 'admin@.com', '1d92a5e695956ee3b11b2719833d497c', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idd`),
  ADD KEY `Fk_CatPrd` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `Fk_CatPrd` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
