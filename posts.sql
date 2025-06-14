-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2025 at 03:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serverside`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`) VALUES
(10, '5 Tips for Staying Productive at Home”', 'Working from home has its perks, but distractions abound. Here are five habits that will supercharge your focus.', '2025-06-14 00:40:15'),
(11, '“Why PHP Still Matters in 2025”', 'From Laravel to WordPress, PHP powers a huge chunk of the web. Let’s explore why it remains relevant today.', '2025-06-14 00:47:31'),
(12, '“A Beginner’s Guide to CSS Grid”', 'Learn how CSS Grid layouts work—complete with code snippets you can drop into your next project.', '2025-06-14 00:47:43'),
(15, 'Quick Morning Stretch Routine', 'A simple 5-minute sequence of shoulder rolls, side bends, and forward folds can wake up your body and clear your mind—perfect before you dive into a busy day.', '2025-06-14 00:56:03'),
(16, 'Why I Love Dark Mode', 'Switching to dark mode reduces eye strain in low-light environments and gives my code editor a sleek, modern look. Plus, it just feels cooler.', '2025-06-14 00:56:18'),
(17, '5-Minute Pomodoro Break Ideas', 'Grab a glass of water\r\n\r\nStretch your neck and arms\r\n\r\nStep outside for fresh air\r\n\r\nJot down any random thoughts\r\nEach mini-break recharges you for the next work sprint.', '2025-06-14 00:58:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
