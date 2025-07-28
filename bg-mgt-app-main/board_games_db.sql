-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2025 at 02:30 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `board_games_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `board_games`
--

CREATE TABLE `board_games` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board_games`
--

INSERT INTO `board_games` (`id`, `name`, `description`, `price`, `created_at`) VALUES
(1, 'Catan', 'A trading and strategy board game.', '35.99', '2025-06-08 21:06:37'),
(2, 'Ticket to Ride', 'A railway-building adventure game.', '29.99', '2025-06-08 21:07:18'),
(3, 'Risk', 'A strategy game of global domination.', '39.99', '2025-06-08 21:07:18'),
(6, 'Pandemic', 'A cooperative game where players fight global outbreaks.', '36.99', '2025-06-08 21:07:18'),
(7, 'Splendor', 'A game of gem-trading and economic strategy.', '30.49', '2025-06-08 21:07:18'),
(8, '7 Wonders', 'A civilization-building card game.', '41.99', '2025-06-08 21:07:18'),
(9, 'Dominion', 'A deck-building game with medieval themes.', '34.99', '2025-06-08 21:07:18'),
(10, 'A Game of Thrones: The Board Game (2nd Edition)', 'Make alliancesâ€”and break them!â€”as you strive to both unite and conquer Westeros.', '64.95', '2025-06-08 22:13:56'),
(13, 'Gloomhaven', 'Vanquish monsters with strategic cardplay. Fulfill your quest to leave your legacy!', '139.99', '2025-06-11 04:27:46'),
(16, 'Carcassonne', 'Tile-laying game where players build medieval landscapes.', '35.00', '2025-07-26 23:27:57'),
(18, '7 Wonders Duel', 'Two-player civilization-building card game.', '30.00', '2025-07-26 23:27:57'),
(19, 'Azul', 'Draft tiles to create beautiful mosaics.', '40.00', '2025-07-26 23:27:57'),
(21, 'Wingspan', 'Engine-building game about attracting birds to habitats.', '60.00', '2025-07-26 23:27:57'),
(23, 'Love Letter', 'Quick deduction game of courtly intrigue.', '12.00', '2025-07-26 23:27:57'),
(24, 'The Mind', 'Play cards in silence and sync with your team.', '15.00', '2025-07-26 23:27:57'),
(25, 'Patchwork', 'Two-player game about building a quilt with puzzle pieces.', '25.00', '2025-07-26 23:27:57'),
(26, 'Blokus', 'Strategic tile placement game for up to four players.', '30.00', '2025-07-26 23:27:57'),
(27, 'Sushi Go!', 'Fast-paced card drafting game with adorable sushi.', '15.00', '2025-07-26 23:27:57'),
(28, 'Kingdomino', 'Build a kingdom using domino-style tiles.', '20.00', '2025-07-26 23:27:57'),
(29, 'Codenames', 'Word association game for teams of spies.', '20.00', '2025-07-26 23:27:57'),
(30, 'The Game of Life', 'Classic family game about careers, kids, and retirement.', '25.00', '2025-07-26 23:27:57'),
(31, 'Monopoly', 'Buy, trade, and bankrupt your opponents in this classic.', '20.00', '2025-07-26 23:27:57'),
(32, 'Clue', 'Solve the mystery of who committed the crime.', '20.00', '2025-07-26 23:27:57'),
(33, 'Sorry!', 'Slide, bump, and race your pawns to victory.', '20.00', '2025-07-26 23:27:57'),
(34, 'Connect 4', 'Drop discs to get four in a row.', '15.00', '2025-07-26 23:27:57'),
(35, 'Battleship', 'Strategic guessing game of naval warfare.', '20.00', '2025-07-26 23:27:57'),
(36, 'Guess Who?', 'Deduction game to identify your opponent’s character.', '20.00', '2025-07-26 23:27:57'),
(37, 'Trouble', 'Pop the dice and race your pegs around the board.', '15.00', '2025-07-26 23:27:57'),
(38, 'Yahtzee', 'Roll dice to score combos and beat your opponents.', '15.00', '2025-07-26 23:27:57'),
(39, 'Twister', 'Physical party game of tangled limbs and laughter.', '20.00', '2025-07-26 23:27:57'),
(40, 'Uno', 'Colorful card game of matching and action cards.', '10.00', '2025-07-26 23:27:57'),
(41, 'Exploding Kittens', 'Chaotic card game of feline destruction.', '20.00', '2025-07-26 23:27:57'),
(42, 'Betrayal at House on the Hill', 'Explore a haunted mansion with a twist mid-game.', '45.00', '2025-07-26 23:27:57'),
(43, 'Scythe', 'Alternate-history strategy game with mechs and farming.', '80.00', '2025-07-26 23:27:57'),
(44, 'Terraforming Mars', 'Compete to make Mars habitable through science.', '70.00', '2025-07-26 23:27:57'),
(45, 'Root', 'Asymmetric woodland warfare with cute animal factions.', '60.00', '2025-07-26 23:27:57'),
(46, 'Gloomhaven: Jaws of the Lion', 'Co-op dungeon crawler with tactical combat.', '50.00', '2025-07-26 23:27:57'),
(47, 'Decrypto', 'Team-based code-breaking game with clever clues.', '20.00', '2025-07-26 23:27:57'),
(48, 'Just One', 'Co-op party game of giving unique clues.', '25.00', '2025-07-26 23:27:57'),
(49, 'The Resistance: Avalon', 'Hidden role game set in Arthurian legend.', '20.00', '2025-07-26 23:27:57'),
(50, 'Point Salad', 'Draft veggies and scoring cards for maximum points.', '15.00', '2025-07-26 23:27:57'),
(51, 'Quacks of Quedlinburg', 'Push-your-luck potion brewing game.', '55.00', '2025-07-26 23:27:57'),
(52, 'Calico', 'Quilt-building game with cats and patterns.', '35.00', '2025-07-26 23:27:57'),
(53, 'Parks', 'Hike through national parks and collect memories.', '50.00', '2025-07-26 23:27:57'),
(54, 'Forbidden Island', 'Co-op game to recover treasures before the island sinks.', '20.00', '2025-07-26 23:27:57'),
(55, 'Santorini', 'Abstract strategy game with 3D building mechanics.', '30.00', '2025-07-26 23:27:57'),
(56, 'Star Realms', 'Deck-building space combat game.', '15.00', '2025-07-26 23:27:57'),
(57, 'Hanabi', 'Co-op card game where you see everyone’s hand but your own.', '10.00', '2025-07-26 23:27:57'),
(58, 'Wits & Wagers', 'Trivia game where betting on answers wins points.', '20.00', '2025-07-26 23:27:57'),
(59, 'The Crew', 'Co-op trick-taking game with mission-based challenges.', '15.00', '2025-07-26 23:27:57'),
(60, 'Fox in the Forest', 'Two-player trick-taking game with fairy tale themes.', '15.00', '2025-07-26 23:27:57'),
(61, 'Rhino Hero', 'Dexterity stacking game with a superhero rhino.', '15.00', '2025-07-26 23:27:57'),
(62, 'Oh My Goods!', 'Card game about medieval production chains.', '15.00', '2025-07-26 23:27:57'),
(63, 'Arboretum', 'Strategic tree path-building game.', '20.00', '2025-07-26 23:27:57'),
(64, 'Cover Your Assets', 'Fast-paced set collection game with stealing mechanics.', '15.00', '2025-07-26 23:27:57'),
(65, 'Trails', 'Hike through national parks collecting resources.', '20.00', '2025-07-26 23:27:57'),
(66, 'Dumb Ways to Die', 'Silly survival game based on the viral franchise.', '20.00', '2025-07-26 23:27:57'),
(67, 'Balderdash', 'Bluffing game of fake definitions and trivia.', '20.00', '2025-07-26 23:27:57'),
(68, 'Spyfall', 'Social deduction game with hidden roles and locations.', '20.00', '2025-07-26 23:27:57'),
(69, 'Welcome to the Dungeon', 'Push-your-luck dungeon crawl with minimal gear.', '15.00', '2025-07-26 23:27:57'),
(70, 'Cat Tower', 'Dexterity game about stacking cats.', '15.00', '2025-07-26 23:27:57'),
(71, 'One Night Ultimate Werewolf', 'Quick hidden role game with bluffing and deduction.', '20.00', '2025-07-26 23:27:57'),
(72, 'Flip City', 'Deck-building city simulation with push-your-luck.', '15.00', '2025-07-26 23:27:57'),
(73, 'No Thanks!', 'Simple card game of risk and reward with chip bidding.', '10.00', '2025-07-26 23:27:57'),
(74, 'Kittens', 'kittens and cats', '10.00', '2025-07-27 00:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`) VALUES
(1, 'poptart', 'sir.zach.kahler@email.com', 'O071@mth@1is!'),
(2, 'admin1', 'admin1@example.com', 'hashed_pw1'),
(3, 'admin2', 'admin2@example.com', 'hashed_pw2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board_games`
--
ALTER TABLE `board_games`
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
-- AUTO_INCREMENT for table `board_games`
--
ALTER TABLE `board_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
