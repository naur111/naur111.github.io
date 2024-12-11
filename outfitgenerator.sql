-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 11, 2024 at 04:01 AM
-- Server version: 5.7.44
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssense`
--

-- --------------------------------------------------------

--
-- Table structure for table `outfitgenerator`
--

CREATE TABLE `outfitgenerator` (
  `ProductName` varchar(400) NOT NULL,
  `Category` varchar(200) NOT NULL,
  `Sequence` int(11) NOT NULL,
  `Image` text NOT NULL,
  `URL` text NOT NULL,
  `TemperatureRange` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `outfitgenerator`
--

INSERT INTO `outfitgenerator` (`ProductName`, `Category`, `Sequence`, `Image`, `URL`, `TemperatureRange`) VALUES
('Études Navy Recycled Wool Turtleneck', 'Sweater', 2, 'https://img.ssensemedia.com/images/f_auto/242647F099000_1/etudes-navy-recycled-wool-turtleneck.jpg', 'https://www.ssense.com/en-ca/women/product/etudes/navy-recycled-wool-turtleneck/16202091', 'fall'),
('GANNI White Peach T-Shirt', 'Shirt', 2, 'https://img.ssensemedia.com/images/f_auto/242144F110030_1/ganni-white-peach-t-shirt.jpg', 'https://www.ssense.com/en-ca/women/product/ganni/white-peach-t-shirt/16250381', 'spring'),
('GUIZIO Pink Square Neck Camisole', 'Tank', 2, 'https://img.ssensemedia.com/images/f_auto,c_limit,h_2800,w_1725/241897F111010_1/guizio-pink-square-neck-camisole.jpg', 'https://www.ssense.com/en-ca/women/product/danielle-guizio/pink-square-neck-camisole/14949851', 'summer'),
('ACNE STUDIOS Brown Coated Faux-Leather Bomber Jacket', 'jacket', 2, 'https://img.ssensemedia.com/images/f_auto,c_limit,h_2800,w_1725/242129F058004_1/acne-studios-brown-coated-faux-leather-bomber-jacket.jpg', 'https://www.ssense.com/en-ca/women/product/acne-studios/brown-coated-faux-leather-bomber-jacket/16220951', 'winter'),
('MONCLER GRENOBLE Pink Rolled Beanie', 'beanie', 1, 'https://img.ssensemedia.com/images/f_auto,c_limit,h_2800,w_1725/232826F014002_1/moncler-grenoble-pink-rolled-beanie.jpg', 'https://www.ssense.com/en-ca/women/product/moncler-grenoble/pink-rolled-beanie/13378801', 'winter'),
('ANINE BING Blue Manon Jeans', 'jeans', 3, 'https://img.ssensemedia.com/images/f_auto,c_limit,h_2800,w_1725/251092F069002_1/anine-bing-blue-manon-jeans.jpg', 'https://www.ssense.com/en-ca/women/product/anine-bing/blue-manon-jeans/17017511', 'winter'),
('SIMONE ROCHA Black Bias-Cut Maxi Skirt', 'maxi skirt', 3, 'https://img.ssensemedia.com/images/f_auto,c_limit,h_2800,w_1725/242405F093000_1/simone-rocha-black-bias-cut-maxi-skirt.jpg', 'https://www.ssense.com/en-ca/women/product/simone-rocha/black-bias-cut-maxi-skirt/16589561', 'spring'),
('RAG & BONE Green Frills Rollable Bucket Hat', 'Bucket Hat', 1, 'https://img.ssensemedia.com/images/f_auto,c_limit,h_2800,w_1725/232055F017007_1/rag-and-bone-green-frills-rollable-bucket-hat.jpg', 'https://www.ssense.com/en-ca/women/product/rag-and-bone/green-frills-rollable-bucket-hat/13305191', 'summer'),
('BAPE White & Black New Era Edition 9Forty STA Cap', 'Cap', 1, 'https://img.ssensemedia.com/images/f_auto,c_limit,h_2800,w_1725/241546F016006_1/bape-white-and-black-new-era-edition-9forty-sta-cap.jpg', 'https://www.ssense.com/en-ca/women/product/bape/white-and-black-new-era-edition-9forty-sta-cap/15485631\r\n', 'spring'),
('SHUSHU/TONG SSENSE Work Capsule – Gray Bow Heeled Sandals', 'heeled sandals', 4, 'https://img.ssensemedia.com/images/f_auto,c_limit,h_2800,w_1725/232901F125000_1/shushu-tong-ssense-work-capsule--gray-bow-heeled-sandals.jpg', 'https://www.ssense.com/en-ca/women/product/shushu-tong/ssense-work-capsule-gray-bow-heeled-sandals/13629601', 'summer'),
('HEREU Brown Armenta Boots', 'boots', 4, 'https://img.ssensemedia.com/images/f_auto,c_limit,h_2800,w_1725/242991F113008_1/hereu-brown-armenta-boots.jpg', 'https://www.ssense.com/en-ca/women/product/hereu/brown-armenta-boots/16660731', 'winter'),
('CHOPOVA LOWENA Black & Brown Stefanie Boots', 'boots', 4, 'https://img.ssensemedia.com/images/f_auto,c_limit,h_2800,w_1725/242529F115000_1/chopova-lowena-black-and-brown-stefanie-boots.jpg', 'https://www.ssense.com/en-ca/women/product/chopova-lowena/black-and-brown-stefanie-boots/16190891', 'winter'),
('NIKE Green Air Force 1 \'07 Premium Sneakers', 'sneakers', 4, 'https://img.ssensemedia.com/images/f_auto,c_limit,h_2800,w_1725/242011F128153_1/nike-green-air-force-1-07-premium-sneakers.jpg', 'https://www.ssense.com/en-ca/women/product/nike/green-air-force-1-07-premium-sneakers/15936911', 'spring'),
('BALMAIN Blue Faded Denim Miniskirt', 'mini skirt', 3, 'https://img.ssensemedia.com/images/f_auto,c_limit,h_2800,w_1725/231251F090044_1/balmain-blue-faded-denim-miniskirt.jpg', 'https://www.ssense.com/en-ca/women/product/balmain/blue-faded-denim-miniskirt/11927531', 'summer'),
('LE17SEPTEMBRE Beige Drawstring Trousers\r\n', 'trousers', 3, 'https://img.ssensemedia.com/images/f_auto,c_limit,h_2800,w_1725/242495F087007_1/le17septembre-beige-drawstring-trousers.jpg', 'https://www.ssense.com/en-ca/women/product/le17septembre/beige-drawstring-trousers/16561851', 'spring'),
('PROENZA SCHOULER Navy Proenza Schouler White Label Suede Minetta Bag', 'shoulder bag', 5, 'https://img.ssensemedia.com/images/f_auto,c_limit,h_2800,w_1725/242288F048010_1/proenza-schouler-navy-proenza-schouler-white-label-suede-minetta-bag.jpg', 'https://www.ssense.com/en-ca/women/product/proenza-schouler/navy-proenza-schouler-white-label-suede-minetta-bag/16749981', 'fall'),
('SIMONE ROCHA Off-White Micro Egg Bag', 'evening bag', 5, 'https://img.ssensemedia.com/images/f_auto,c_limit,h_2800,w_1725/242405F048001_1/simone-rocha-off-white-micro-egg-bag.jpg', 'https://www.ssense.com/en-ca/women/product/simone-rocha/off-white-micro-egg-bag/16587621', 'summer'),
('SEE BY CHLOÉ Pink Hana Half-Moon Bag', 'shoulder bag', 5, 'https://img.ssensemedia.com/images/f_auto,c_limit,h_2800,w_1725/241373F048022_1/see-by-chloe-pink-hana-half-moon-bag.jpg', 'https://www.ssense.com/en-ca/women/product/see-by-chloe/pink-hana-half-moon-bag/14565871', 'spring'),
('COPERNI Black Mini Bucket Swipe Bag', 'bucket bag', 5, 'https://img.ssensemedia.com/images/f_auto,c_limit,h_2800,w_1725/242325F049014_1/coperni-black-mini-bucket-swipe-bag.jpg', 'https://www.ssense.com/en-ca/women/product/coperni/black-mini-bucket-swipe-bag/16622971', 'winter');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
