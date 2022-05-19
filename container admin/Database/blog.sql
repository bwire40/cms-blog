-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 08:42 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `aname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `headline` varchar(50) NOT NULL,
  `bio` varchar(2000) NOT NULL,
  `image` varchar(60) NOT NULL DEFAULT 'user.png',
  `addedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `datetime`, `username`, `aname`, `password`, `headline`, `bio`, `image`, `addedby`) VALUES
(7, 'February-19-2022 08:34:38', 'bwire40', 'Emmanuel Bwire', '$2y$10$DqjQKEDX6SeV7VYhwh9nSO8kxq9tQd.miX8II66M9RMSvBufdjrNO', 'Software Engineer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem. Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus sapien porta porta. Pellentesque consectetur dui id libero molestie, at lobortis quam interdum. Donec diam leo, congue consectetur augue sit amet, vulputate tristique elit. Aliquam et iaculis urna, vitae dictum magna. Praesent consectetur velit at ullamcorper pulvinar. Mauris sit amet maximus purus, hendrerit vestibulum magna. Nullam eu odio enim. Mauris ullamcorper arcu vel condimentum venenatis. Suspendisse ipsum nibh, euismod ut pellentesque a, venenatis nec velit. Quisque rhoncus porttitor risus. Nunc congue turpis eu lobortis volutpat. Integer ultrices ipsum non augue tincidunt imperdiet. Nulla vel magna et nisi maximus sollicitudin.', 'girl_hood.jpg', 'Manu');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `datetime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `author`, `datetime`) VALUES
(26, 'Technology', 'bwire40', 'February-19-2022 08:36:26'),
(27, 'News', 'bwire40', 'February-19-2022 08:36:35'),
(28, 'Sports', 'bwire40', 'February-19-2022 08:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL,
  `approvedby` varchar(50) NOT NULL,
  `post_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(100) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `title` varchar(300) NOT NULL,
  `category` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `datetime`, `title`, `category`, `author`, `image`, `content`) VALUES
(39, 'February-19-2022 08:38:03', 'WHEN THE OLD DAYS ARE GONE', 'News', 'bwire40', 'm-judah.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem. Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus sapien porta porta. Pellentesque consectetur dui id libero molestie, at lobortis quam interdum. Donec diam leo, congue consectetur augue sit amet, vulputate tristique elit. Aliquam et iaculis urna, vitae dictum magna. Praesent consectetur velit at ullamcorper pulvinar. Mauris sit amet maximus purus, hendrerit vestibulum magna. Nullam eu odio enim. Mauris ullamcorper arcu vel condimentum venenatis. Suspendisse ipsum nibh, euismod ut pellentesque a, venenatis nec velit. Quisque rhoncus porttitor risus. Nunc congue turpis eu lobortis volutpat. Integer ultrices ipsum non augue tincidunt imperdiet. Nulla vel magna et nisi maximus sollicitudin. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem. Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus sapien porta porta. Pellentesque consectetur dui id libero molestie, at lobortis quam interdum. Donec diam leo, congue consectetur augue sit amet, vulputate tristique elit. Aliquam et iaculis urna, vitae dictum magna. Praesent consectetur velit at ullamcorper pulvinar. Mauris sit amet maximus purus, hendrerit vestibulum magna. Nullam eu odio enim. Mauris ullamcorper arcu vel condimentum venenatis. Suspendisse ipsum nibh, euismod ut pellentesque a, venenatis nec velit. Quisque rhoncus porttitor risus. Nunc congue turpis eu lobortis volutpat. Integer ultrices ipsum non augue tincidunt imperdiet. Nulla vel magna et nisi maximus sollicitudin.'),
(40, 'February-19-2022 08:39:39', 'WHAT IS PROGRAMMING?', 'Technology', 'bwire40', 'austin-distel-tLZhFRLj6nY-unsplash.jpg', '<h1>What really is programming?</h1>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem. Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus sapien porta porta. Pellentesque consectetur dui id libero molestie, at lobortis quam interdum. Donec diam leo, congue consectetur augue sit amet, vulputate tristique elit. Aliquam et iaculis urna, vitae dictum magna. Praesent consectetur velit at ullamcorper pulvinar. Mauris sit amet maximus purus, hendrerit vestibulum magna. Nullam eu odio enim. Mauris ullamcorper arcu vel condimentum venenatis. Suspendisse ipsum nibh, euismod ut pellentesque a, venenatis nec velit. Quisque rhoncus porttitor risus. Nunc congue turpis eu lobortis volutpat. Integer ultrices ipsum non augue tincidunt imperdiet. Nulla vel magna et nisi maximus sollicitudin.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem. Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus sapien porta porta. Pellentesque consectetur dui id libero molestie, at lobortis quam interdum. Donec diam leo, congue consectetur augue sit amet, vulputate tristique elit. Aliquam et iaculis urna, vitae dictum magna. Praesent consectetur velit at ullamcorper pulvinar. Mauris sit amet maximus purus, hendrerit vestibulum magna. Nullam eu odio enim. Mauris ullamcorper arcu vel condimentum venenatis. Suspendisse ipsum nibh, euismod ut pellentesque a, venenatis nec velit. Quisque rhoncus porttitor risus. Nunc congue turpis eu lobortis volutpat. Integer ultrices ipsum non augue tincidunt imperdiet. Nulla vel magna et nisi maximus sollicitudin.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem. Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus sapien porta porta. Pellentesque consectetur dui id libero molestie, at lobortis quam interdum. Donec diam leo, congue consectetur augue sit amet, vulputate tristique elit. Aliquam et iaculis urna, vitae dictum magna. Praesent consectetur velit at ullamcorper pulvinar. Mauris sit amet maximus purus, hendrerit vestibulum magna. Nullam eu odio enim. Mauris ullamcorper arcu vel condimentum venenatis. Suspendisse ipsum nibh, euismod ut pellentesque a, venenatis nec velit. Quisque rhoncus porttitor risus. Nunc congue turpis eu lobortis volutpat. Integer ultrices ipsum non augue tincidunt imperdiet. Nulla vel magna et nisi maximus sollicitudin.'),
(41, 'February-19-2022 10:20:34', 'WELCOME TO MANU TAKES', 'Technology', 'bwire40', 'blog3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem. Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus sapien porta porta. Pellentesque consectetur dui id libero molestie, at lobortis quam interdum. Donec diam leo, congue consectetur augue sit amet, vulputate tristique elit. Aliquam et iaculis urna, vitae dictum magna. Praesent consectetur velit at ullamcorper pulvinar. Mauris sit amet maximus purus, hendrerit vestibulum magna. Nullam eu odio enim. Mauris ullamcorper arcu vel condimentum venenatis. Suspendisse ipsum nibh, euismod ut pellentesque a, venenatis nec velit. Quisque rhoncus porttitor risus. Nunc congue turpis eu lobortis volutpat. Integer ultrices ipsum non augue tincidunt imperdiet. Nulla vel magna et nisi maximus sollicitudin.'),
(42, 'February-19-2022 10:20:49', 'THE OLD AGE', 'News', 'bwire40', 'blog2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem. Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus sapien porta porta. Pellentesque consectetur dui id libero molestie, at lobortis quam interdum. Donec diam leo, congue consectetur augue sit amet, vulputate tristique elit. Aliquam et iaculis urna, vitae dictum magna. Praesent consectetur velit at ullamcorper pulvinar. Mauris sit amet maximus purus, hendrerit vestibulum magna. Nullam eu odio enim. Mauris ullamcorper arcu vel condimentum venenatis. Suspendisse ipsum nibh, euismod ut pellentesque a, venenatis nec velit. Quisque rhoncus porttitor risus. Nunc congue turpis eu lobortis volutpat. Integer ultrices ipsum non augue tincidunt imperdiet. Nulla vel magna et nisi maximus sollicitudin.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem. Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus sapien porta porta. Pellentesque consectetur dui id libero molestie, at lobortis quam interdum. Donec diam leo, congue consectetur augue sit amet, vulputate tristique elit. Aliquam et iaculis urna, vitae dictum magna. Praesent consectetur velit at ullamcorper pulvinar. Mauris sit amet maximus purus, hendrerit vestibulum magna. Nullam eu odio enim. Mauris ullamcorper arcu vel condimentum venenatis. Suspendisse ipsum nibh, euismod ut pellentesque a, venenatis nec velit. Quisque rhoncus porttitor risus. Nunc congue turpis eu lobortis volutpat. Integer ultrices ipsum non augue tincidunt imperdiet. Nulla vel magna et nisi maximus sollicitudin.'),
(43, 'February-19-2022 10:21:11', 'THE OLD AGE AGAIN', 'Sports', 'bwire40', 'empty_cart.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem. Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus sapien porta porta. Pellentesque consectetur dui id libero molestie, at lobortis quam interdum. Donec diam leo, congue consectetur augue sit amet, vulputate tristique elit. Aliquam et iaculis urna, vitae dictum magna. Praesent consectetur velit at ullamcorper pulvinar. Mauris sit amet maximus purus, hendrerit vestibulum magna. Nullam eu odio enim. Mauris ullamcorper arcu vel condimentum venenatis. Suspendisse ipsum nibh, euismod ut pellentesque a, venenatis nec velit. Quisque rhoncus porttitor risus. Nunc congue turpis eu lobortis volutpat. Integer ultrices ipsum non augue tincidunt imperdiet. Nulla vel magna et nisi maximus sollicitudin.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem. Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus sapien porta porta. Pellentesque consectetur dui id libero molestie, at lobortis quam interdum. Donec diam leo, congue consectetur augue sit amet, vulputate tristique elit. Aliquam et iaculis urna, vitae dictum magna. Praesent consectetur velit at ullamcorper pulvinar. Mauris sit amet maximus purus, hendrerit vestibulum magna. Nullam eu odio enim. Mauris ullamcorper arcu vel condimentum venenatis. Suspendisse ipsum nibh, euismod ut pellentesque a, venenatis nec velit. Quisque rhoncus porttitor risus. Nunc congue turpis eu lobortis volutpat. Integer ultrices ipsum non augue tincidunt imperdiet. Nulla vel magna et nisi maximus sollicitudin.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem. Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus sapien porta porta. Pellentesque consectetur dui id libero molestie, at lobortis quam interdum. Donec diam leo, congue consectetur augue sit amet, vulputate tristique elit. Aliquam et iaculis urna, vitae dictum magna. Praesent consectetur velit at ullamcorper pulvinar. Mauris sit amet maximus purus, hendrerit vestibulum magna. Nullam eu odio enim. Mauris ullamcorper arcu vel condimentum venenatis. Suspendisse ipsum nibh, euismod ut pellentesque a, venenatis nec velit. Quisque rhoncus porttitor risus. Nunc congue turpis eu lobortis volutpat. Integer ultrices ipsum non augue tincidunt imperdiet. Nulla vel magna et nisi maximus sollicitudin.'),
(44, 'February-19-2022 10:21:27', 'SPENCER', 'Technology', 'bwire40', 'blog1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem. Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus sapien porta porta. Pellentesque consectetur dui id libero molestie, at lobortis quam interdum. Donec diam leo, congue consectetur augue sit amet, vulputate tristique elit. Aliquam et iaculis urna, vitae dictum magna. Praesent consectetur velit at ullamcorper pulvinar. Mauris sit amet maximus purus, hendrerit vestibulum magna. Nullam eu odio enim. Mauris ullamcorper arcu vel condimentum venenatis. Suspendisse ipsum nibh, euismod ut pellentesque a, venenatis nec velit. Quisque rhoncus porttitor risus. Nunc congue turpis eu lobortis volutpat. Integer ultrices ipsum non augue tincidunt imperdiet. Nulla vel magna et nisi maximus sollicitudin.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem. Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus sapien porta porta. Pellentesque consectetur dui id libero molestie, at lobortis quam interdum. Donec diam leo, congue consectetur augue sit amet, vulputate tristique elit. Aliquam et iaculis urna, vitae dictum magna. Praesent consectetur velit at ullamcorper pulvinar. Mauris sit amet maximus purus, hendrerit vestibulum magna. Nullam eu odio enim. Mauris ullamcorper arcu vel condimentum venenatis. Suspendisse ipsum nibh, euismod ut pellentesque a, venenatis nec velit. Quisque rhoncus porttitor risus. Nunc congue turpis eu lobortis volutpat. Integer ultrices ipsum non augue tincidunt imperdiet. Nulla vel magna et nisi maximus sollicitudin.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem. Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus sapien porta porta. Pellentesque consectetur dui id libero molestie, at lobortis quam interdum. Donec diam leo, congue consectetur augue sit amet, vulputate tristique elit. Aliquam et iaculis urna, vitae dictum magna. Praesent consectetur velit at ullamcorper pulvinar. Mauris sit amet maximus purus, hendrerit vestibulum magna. Nullam eu odio enim. Mauris ullamcorper arcu vel condimentum venenatis. Suspendisse ipsum nibh, euismod ut pellentesque a, venenatis nec velit. Quisque rhoncus porttitor risus. Nunc congue turpis eu lobortis volutpat. Integer ultrices ipsum non augue tincidunt imperdiet. Nulla vel magna et nisi maximus sollicitudin.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `headline` varchar(50) NOT NULL,
  `bio` varchar(2000) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'user.png',
  `approvedby` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `subscription` varchar(50) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `datetime`, `name`, `email`, `username`, `password`, `headline`, `bio`, `image`, `approvedby`, `status`, `subscription`) VALUES
(9, 'February-19-2022 08:31:56', 'Cynthia Wamahiga', 'Cynthia@mail.com', 'cynthia', '$2y$10$.fOb0E/.j/UlU4h8ph2hnOjks/7CtxEFxXSH/Wifyl7sS512LpdzO', 'Blogger', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem. Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus sapien porta porta. Pellentesque consectetur dui id libero molestie, at lobortis quam interdum. Donec diam leo, congue consectetur augue sit amet, vulputate tristique elit. Aliquam et iaculis urna, vitae dictum magna. Praesent consectetur velit at ullamcorper pulvinar. Mauris sit amet maximus purus, hendrerit vestibulum magna.', 'm-girl.jpg', '', 'Pending', 'none'),
(10, 'February-19-2022 09:00:51', 'Tom Kay', 'Tom@email.com', 'Tom', '$2y$10$TaFwlCjdUQQQENLVeVd5K.8VXVLKiPvf7pgN5d.ArGDVISs/Fk4Re', '', '', 'user.png', '', 'Pending', 'none');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
