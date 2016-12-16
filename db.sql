-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2016 at 10:48 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `sustainable_valley_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Category 1'),
(2, 'Category 2'),
(3, 'Category 3'),
(4, 'Category 4'),
(5, 'Category 5');

-- --------------------------------------------------------

--
-- Table structure for table `idea`
--

CREATE TABLE `idea` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(600) NOT NULL,
  `report_url` varchar(50) NOT NULL,
  `image_url` varchar(100) NOT NULL DEFAULT 'green-valley-5.jpg'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `idea`
--

INSERT INTO `idea` (`id`, `title`, `description`, `report_url`, `image_url`) VALUES
(1, 'God idé 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi erat lacus, luctus sed molestie in, tincidunt sed libero. Vestibulum non elit velit. Nam sagittis, arcu eget efficitur semper, leo tortor sagittis erat, id auctor lorem arcu sed enim. Sed leo nunc, aliquet eu sagittis a, fringilla non nisi. Duis et malesuada enim. Vestibulum turpis velit, eleifend vitae dui a, consectetur consectetur sapien. Donec nec ante non elit aliquet dictum ut non leo.', '', 'green-valley-5.jpg'),
(2, 'God idé 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi erat lacus, luctus sed molestie in, tincidunt sed libero. Vestibulum non elit velit. Nam sagittis, arcu eget efficitur semper, leo tortor sagittis erat, id auctor lorem arcu sed enim. Sed leo nunc, aliquet eu sagittis a, fringilla non nisi. Duis et malesuada enim. Vestibulum turpis velit, eleifend vitae dui a, consectetur consectetur sapien. Donec nec ante non elit aliquet dictum ut non leo.', '', 'image1.jpg'),
(3, 'God idé 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi erat lacus, luctus sed molestie in, tincidunt sed libero. Vestibulum non elit velit. Nam sagittis, arcu eget efficitur semper, leo tortor sagittis erat, id auctor lorem arcu sed enim. Sed leo nunc, aliquet eu sagittis a, fringilla non nisi. Duis et malesuada enim. Vestibulum turpis velit, eleifend vitae dui a, consectetur consectetur sapien. Donec nec ante non elit aliquet dictum ut non leo.', '', 'image2.jpg'),
(4, 'God idé 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi erat lacus, luctus sed molestie in, tincidunt sed libero. Vestibulum non elit velit. Nam sagittis, arcu eget efficitur semper, leo tortor sagittis erat, id auctor lorem arcu sed enim. Sed leo nunc, aliquet eu sagittis a, fringilla non nisi. Duis et malesuada enim. Vestibulum turpis velit, eleifend vitae dui a, consectetur consectetur sapien. Donec nec ante non elit aliquet dictum ut non leo.', '', 'image3.jpg'),
(5, 'God idé 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi erat lacus, luctus sed molestie in, tincidunt sed libero. Vestibulum non elit velit. Nam sagittis, arcu eget efficitur semper, leo tortor sagittis erat, id auctor lorem arcu sed enim. Sed leo nunc, aliquet eu sagittis a, fringilla non nisi. Duis et malesuada enim. Vestibulum turpis velit, eleifend vitae dui a, consectetur consectetur sapien. Donec nec ante non elit aliquet dictum ut non leo.', '', 'image4.jpg'),
(6, 'God idé 6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi erat lacus, luctus sed molestie in, tincidunt sed libero. Vestibulum non elit velit. Nam sagittis, arcu eget efficitur semper, leo tortor sagittis erat, id auctor lorem arcu sed enim. Sed leo nunc, aliquet eu sagittis a, fringilla non nisi. Duis et malesuada enim. Vestibulum turpis velit, eleifend vitae dui a, consectetur consectetur sapien. Donec nec ante non elit aliquet dictum ut non leo.', '', 'image5.jpg'),
(7, 'God idé 7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi erat lacus, luctus sed molestie in, tincidunt sed libero. Vestibulum non elit velit. Nam sagittis, arcu eget efficitur semper, leo tortor sagittis erat, id auctor lorem arcu sed enim. Sed leo nunc, aliquet eu sagittis a, fringilla non nisi. Duis et malesuada enim. Vestibulum turpis velit, eleifend vitae dui a, consectetur consectetur sapien. Donec nec ante non elit aliquet dictum ut non leo.', '', 'image6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `idea_has_category`
--

CREATE TABLE `idea_has_category` (
  `idea_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `idea_has_category`
--

INSERT INTO `idea_has_category` (`idea_id`, `category_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 3),
(4, 2),
(4, 5),
(5, 1),
(5, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `longitude` int(20) NOT NULL,
  `latitude` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `cookie` varchar(50) NOT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `cookie`, `ip`, `location_id`) VALUES
(10, '', '50ed97d9-ef85-07f0-5847-1f1d99268777', NULL, NULL),
(11, '', '1e1589b9-cef5-4875-23ba-044e9f4ad569', NULL, NULL),
(12, '', 'ca6d68ed-0b45-11ea-e90e-3c6826b10108', NULL, NULL),
(13, '', 'cc5c3cee-110c-b7e5-aa0d-e0e10dd739f6', NULL, NULL),
(14, '', '66ba0b76-cb76-1ff8-428d-7902ed3f8098', NULL, NULL),
(18, '', 'fa4bf101-0c5d-9c6d-c9e7-f52a566c7987', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_likes`
--

CREATE TABLE `user_likes` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `idea_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_likes`
--

INSERT INTO `user_likes` (`user_id`, `idea_id`) VALUES
(18, 1),
(18, 2),
(18, 3),
(18, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `idea`
--
ALTER TABLE `idea`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `idea_has_category`
--
ALTER TABLE `idea_has_category`
  ADD PRIMARY KEY (`idea_id`,`category_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_likes`
--
ALTER TABLE `user_likes`
  ADD PRIMARY KEY (`user_id`,`idea_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `idea`
--
ALTER TABLE `idea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
