-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2019 at 11:20 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marvel_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `government_officials`
--

CREATE TABLE `government_officials` (
  `profile_entry_no` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(256) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `img_url` varchar(256) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `alternative_email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `position_` varchar(255) NOT NULL,
  `owner_id` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `government_officials`
--

INSERT INTO `government_officials` (`profile_entry_no`, `first_name`, `middle_name`, `last_name`, `img_url`, `id_no`, `alternative_email`, `phone_no`, `county`, `region`, `area`, `description`, `role`, `position_`, `owner_id`) VALUES
(1, 'SAM', 'KARU', 'ngugi', '', '4582258654', 'me.mer@me.com', '855645416854', '646486468464846', '84654684646', 'yftfufgugug', '\r\n                tdctydcycdtycvutfvufvtutufgufvyu', 'hhghfhf', 'ig7uigugigigiuggig', 'f620f4647fb816073c9152a284245e64');

-- --------------------------------------------------------

--
-- Table structure for table `marvel_clergy`
--

CREATE TABLE `marvel_clergy` (
  `profile_entry_no` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(256) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `img_url` varchar(256) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `alternative_email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `owner_id` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marvel_clergy`
--

INSERT INTO `marvel_clergy` (`profile_entry_no`, `first_name`, `middle_name`, `last_name`, `img_url`, `id_no`, `alternative_email`, `phone_no`, `county`, `region`, `area`, `description`, `religion`, `location`, `role`, `owner_id`) VALUES
(16, 'samuel', 'gjdgvkvbvx', 'vjdzxgkuvbcx', 'uploads/projo.jpg', '05', '', '4', 'jhjdgjkdgjf', 'kbdjvbjh', 'idftyfyds', '\r\n                ', 'tyftydfyts', 'ysfdytefsfsd', 'fgsfdugfyudsfg', '5ecd3c5d2c8f20336d66b4db307df5a9');

-- --------------------------------------------------------

--
-- Table structure for table `marvel_donation_table`
--

CREATE TABLE `marvel_donation_table` (
  `entry_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `description` text NOT NULL,
  `request_process` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `owner_id` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marvel_donation_table`
--

INSERT INTO `marvel_donation_table` (`entry_id`, `title`, `img_url`, `category`, `quantity`, `description`, `request_process`, `date`, `owner_id`) VALUES
(1, 'cvd', 'ddd', 'sanitary_pads', 100, '\r\n                                ', 'defedfe', '2019-04-05 15:02:07', '4bd99dec314d82cbb4b0d50e4b354ee0');

-- --------------------------------------------------------

--
-- Table structure for table `marvel_organization_profile`
--

CREATE TABLE `marvel_organization_profile` (
  `no` int(11) NOT NULL,
  `org_name` varchar(256) NOT NULL,
  `portal` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `middle_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `phone` int(255) NOT NULL,
  `alternative_email` varchar(256) NOT NULL,
  `img_url` varchar(256) NOT NULL,
  `owner_id` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marvel_organization_profile`
--

INSERT INTO `marvel_organization_profile` (`no`, `org_name`, `portal`, `address`, `first_name`, `middle_name`, `last_name`, `phone`, `alternative_email`, `img_url`, `owner_id`) VALUES
(1, 'dcdnlkvn', 'iubc uodsvbos', 'bkudusbvubvds', 'dvbgudbuv', 'udgvuodsouv', 'vjdsviuvuh', 5474849, '', 'uploads/webmd.jpg', 'ff2f48c871e78892e9337baaade8a226'),
(2, 'bkjbvfl', 'fkbilnbo;f', 'flbl', 'bfkhilfhvbios', 'fvbskbvlbfslb', 'vfbviobfvpsbv', 6890808, '', 'uploads/matte2_48.jpg', '6f231820f0735ca496143ae6411846db'),
(3, 'kilifi church', 'udgcuidsg', 'bkcdubksj[', 'iuugedfi', 'djvjfdsgfk', 'jdssgfjgfs', 8646, '', 'uploads/WebMD 1.jpg', '52a0d313329104107aed27e651038601');

-- --------------------------------------------------------

--
-- Table structure for table `marvel_others_profile`
--

CREATE TABLE `marvel_others_profile` (
  `profile_entry_no` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(256) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `img_url` varchar(256) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `alternative_email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `field` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `position_` varchar(255) NOT NULL,
  `owner_id` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marvel_others_profile`
--

INSERT INTO `marvel_others_profile` (`profile_entry_no`, `first_name`, `middle_name`, `last_name`, `img_url`, `id_no`, `alternative_email`, `phone_no`, `county`, `region`, `area`, `description`, `field`, `role`, `position_`, `owner_id`) VALUES
(1, 'ejvfjevf', 'fegfvejgf', 'fefgbukegvf', '', '6439649631', 'gjdgekf@jvf.fjugf', '275485494', 'gggfjgjd', 'sdjgjegfds', 'jygskdg\'', 'gfxgxgxhtch\r\n                ', 'jdksfgyjgs', 'jdsvjsjdsgjsd', 'jfdyjdsfjsgdj', '18c99b2faf609e9ca44df4756fed2fb8');

-- --------------------------------------------------------

--
-- Table structure for table `marvel_request_table`
--

CREATE TABLE `marvel_request_table` (
  `entry_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img_url` varchar(256) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `description` text NOT NULL,
  `regestration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `owner_id` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marvel_request_table`
--

INSERT INTO `marvel_request_table` (`entry_id`, `title`, `img_url`, `category`, `quantity`, `description`, `regestration_date`, `owner_id`) VALUES
(1, 'sasad', 'images/happy1.jpeg', 'underpants', 1234, '0', '2019-04-05 14:41:42', '13180cf9b5a98e075fa937e9e47bc413'),
(2, 'we need you', 'images/nduthi.jpg', 'sanitary_pads', 100000, 'qwerty nlfnl bksddshfi bkfhoifoh hfloh', '2019-04-05 19:22:29', '99c8daaf28955caf8af2c3197107eabe'),
(3, '<p style="color:green"></p>', 'images/happy1.jpeg', 'sanitary_pads', 2000, 'bkugbvkufgbvukf', '2019-04-05 20:55:40', '99c8daaf28955caf8af2c3197107eabe'),
(4, 'underWear', 'uploads/37809294-medical-isometric-infographics-with-doctor-nurse-pharmacist-and-hospital-building-3d-symbols-vector-.jpg', 'underpants', 100000, 'gigigfiugiugogohosgohoshohofh', '2019-04-07 22:57:33', 'sayona'),
(5, 'xxxxxx', 'uploads/doc.jpg', 'underpants', 10000000, 'lsxh;pshjxojp<div>[kq\'kc\'pjchjvcvcuohwiojoj[oqo[j[jc[</div>', '2019-04-08 14:58:31', 'sayona'),
(6, 'arqreqtrwtwyt', 'uploads/itrage.jpg', 'underpants', 10000000, '54w5tsydyfuytgi7y', '2019-04-24 08:31:47', 'sayona');

-- --------------------------------------------------------

--
-- Table structure for table `marvel_users_auth`
--

CREATE TABLE `marvel_users_auth` (
  `entry_id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_type` text NOT NULL,
  `user_category` varchar(256) NOT NULL,
  `user_id` varchar(256) NOT NULL,
  `regestration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marvel_users_auth`
--

INSERT INTO `marvel_users_auth` (`entry_id`, `user_name`, `user_password`, `user_type`, `user_category`, `user_id`, `regestration_date`) VALUES
(58, 'karu21@gmail.com', '$2y$10$4YcArH87e6vEecBxqdArEOiOCLGzkNOSvSpR04tfDDsLAG40G8CNm', 'donor', 'NGO', '8ce142c32f0fd4f25ad2277fcd3743d7', '2019-04-24 14:19:21'),
(59, 'qwerty@gmail.com', '$2y$10$b8M/JbLyli5UTIFPw1SZLO0J4TolBZzU2b.z.0lHkRHbQPIOZFRtq', 'donor', 'church', '52a0d313329104107aed27e651038601', '2019-04-24 15:32:04'),
(57, 'karu2@gmail.com', '$2y$10$uMAEqs3x19uSynbrREaZN.hzBuoV9xRJ3Rx7S/mPzUhp0kZt9NvC2', 'request', 'clergy', '1f153a9111cd188b99f70edc61df758b', '2019-04-24 13:46:28'),
(56, 'karu1@gmail.com', '$2y$10$W0eLgYHsciY4juTxNB3Rj.STxCBTslJQgHa.63VmdOhTjNMFjCbdm', 'request', 'clergy', '5ecd3c5d2c8f20336d66b4db307df5a9', '2019-04-24 13:33:21'),
(55, 'karu@gmail.com', '$2y$10$3AGOaagd9MOkEjz1CD1F6uIQmMzcPH1HJalPmiJbby6YxscILjLlm', 'request', 'clergy', 'ee83f53cef725e7490476297032dbee9', '2019-04-24 13:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `marvel_verification`
--

CREATE TABLE `marvel_verification` (
  `no` int(11) NOT NULL,
  `user_id` varchar(256) NOT NULL,
  `file_path` varchar(256) NOT NULL,
  `verification_status` varchar(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marvel_verification`
--

INSERT INTO `marvel_verification` (`no`, `user_id`, `file_path`, `verification_status`, `user_name`, `reg_date`) VALUES
(1, 'XXXXXXXYTTFUTFUTGITOIOGUG', 'XXXXXXX', 'VERIFIED', '', '2019-04-25 04:48:26'),
(2, '5ecd3c5d2c8f20336d66b4db307df5a9', 'uploads/NativeUI.zip', 'VERIFIED', 'karu1@gmail.com', '2019-04-27 10:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `marvel_well_wishers`
--

CREATE TABLE `marvel_well_wishers` (
  `profile_entry_no` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(256) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `img_url` varchar(256) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `alternative_email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `owner_id` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `government_officials`
--
ALTER TABLE `government_officials`
  ADD PRIMARY KEY (`profile_entry_no`);

--
-- Indexes for table `marvel_clergy`
--
ALTER TABLE `marvel_clergy`
  ADD PRIMARY KEY (`profile_entry_no`);

--
-- Indexes for table `marvel_donation_table`
--
ALTER TABLE `marvel_donation_table`
  ADD PRIMARY KEY (`entry_id`);

--
-- Indexes for table `marvel_organization_profile`
--
ALTER TABLE `marvel_organization_profile`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `marvel_others_profile`
--
ALTER TABLE `marvel_others_profile`
  ADD PRIMARY KEY (`profile_entry_no`);

--
-- Indexes for table `marvel_request_table`
--
ALTER TABLE `marvel_request_table`
  ADD PRIMARY KEY (`entry_id`);

--
-- Indexes for table `marvel_users_auth`
--
ALTER TABLE `marvel_users_auth`
  ADD PRIMARY KEY (`entry_id`);

--
-- Indexes for table `marvel_verification`
--
ALTER TABLE `marvel_verification`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `marvel_well_wishers`
--
ALTER TABLE `marvel_well_wishers`
  ADD PRIMARY KEY (`profile_entry_no`),
  ADD KEY `ower_id` (`owner_id`);
ALTER TABLE `marvel_well_wishers` ADD FULLTEXT KEY `description` (`description`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `government_officials`
--
ALTER TABLE `government_officials`
  MODIFY `profile_entry_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `marvel_clergy`
--
ALTER TABLE `marvel_clergy`
  MODIFY `profile_entry_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `marvel_donation_table`
--
ALTER TABLE `marvel_donation_table`
  MODIFY `entry_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `marvel_organization_profile`
--
ALTER TABLE `marvel_organization_profile`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `marvel_others_profile`
--
ALTER TABLE `marvel_others_profile`
  MODIFY `profile_entry_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `marvel_request_table`
--
ALTER TABLE `marvel_request_table`
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `marvel_users_auth`
--
ALTER TABLE `marvel_users_auth`
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `marvel_verification`
--
ALTER TABLE `marvel_verification`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `marvel_well_wishers`
--
ALTER TABLE `marvel_well_wishers`
  MODIFY `profile_entry_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
