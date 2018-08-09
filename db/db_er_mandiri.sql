-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 01, 2018 at 01:21 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_er_mandiri`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas_docs`
--

CREATE TABLE `berkas_docs` (
  `berkas_id` int(10) NOT NULL,
  `p_email` varchar(100) NOT NULL,
  `berkas_nama` varchar(255) NOT NULL,
  `berkas_file` varchar(100) NOT NULL,
  `berkas_status` enum('verified','unverified') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berkas_docs`
--

INSERT INTO `berkas_docs` (`berkas_id`, `p_email`, `berkas_nama`, `berkas_file`, `berkas_status`) VALUES
(1, 'dwi_ar@gmail.com', 'Resume dwi_ar@gmail.com', '236808_CV Sample.docx', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `info_karir`
--

CREATE TABLE `info_karir` (
  `k_id` int(5) NOT NULL,
  `skk_id` int(5) NOT NULL,
  `k_title` varchar(100) NOT NULL,
  `k_slug` varchar(150) NOT NULL,
  `k_desc` text NOT NULL,
  `k_requirements` text NOT NULL,
  `k_publish` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_karir`
--

INSERT INTO `info_karir` (`k_id`, `skk_id`, `k_title`, `k_slug`, `k_desc`, `k_requirements`, `k_publish`) VALUES
(1, 2, 'Officer Development Program - Khusus IT', 'officer-development-program-khusus-it', '<p style=\"-webkit-font-smoothing: antialiased; margin-bottom: 1em; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(104, 114, 119);\">This program prepares you for leadership positions across many levels in Mandiri. By joining the program, you will be trained by highly experienced bankers, professionals and leaders in various aspects of banking and leadership. The program starts off with intensive in-class education followed by on-the-job training and rotation across different parts of the Bank.</p><p style=\"-webkit-font-smoothing: antialiased; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(104, 114, 119); margin-bottom: 0px !important;\">In addition to this comprehensive training package, you will get to be coached by the bank’s top talent who will help you achieve your fullest potential and have a better understanding of your strengths. You will also have access to our top leaders and closely work with senior managers in projects that will develop your critical skills.</p>', '<ol style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-bottom: 0px; margin-left: 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 13px; line-height: inherit; font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif; vertical-align: baseline; list-style-position: initial; list-style-image: initial; color: rgb(80, 88, 92);\"><li style=\"-webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(104, 114, 119);\">Local/International graduates (S1) and postgraduates (S2) from relevant fields of studies</li><li style=\"-webkit-font-smoothing: antialiased; margin: 1em 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(104, 114, 119);\">Grade Point Average<ol style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-left: 20px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; list-style-position: initial; list-style-image: initial;\"><li style=\"-webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Graduate (S1): a minimum of 3.00 or equivalent</li><li style=\"-webkit-font-smoothing: antialiased; margin: 1em 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Postgraduate (S2): a minimum of 3.20 or equivalent</li></ol></li><li style=\"-webkit-font-smoothing: antialiased; margin: 1em 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(104, 114, 119);\">Maximum age for selection:<ol style=\"-webkit-font-smoothing: antialiased; margin-right: 0px; margin-left: 20px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; list-style-position: initial; list-style-image: initial;\"><li style=\"-webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">25 years old for Graduates (S1)</li><li style=\"-webkit-font-smoothing: antialiased; margin: 1em 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">27 years old for Postgraduates (S2)</li></ol></li><li style=\"-webkit-font-smoothing: antialiased; margin: 1em 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(104, 114, 119);\">Fluent in English for both written and verbal communication</li><li style=\"-webkit-font-smoothing: antialiased; margin: 1em 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(104, 114, 119);\">Unmarried</li><li style=\"-webkit-font-smoothing: antialiased; margin: 1em 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(104, 114, 119);\">Willing to be relocated all over Indonesia</li></ol>', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_karir`
--

CREATE TABLE `kategori_karir` (
  `kk_id` int(5) NOT NULL,
  `kk_title` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kk_slug` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kk_desc` text COLLATE latin1_general_ci NOT NULL,
  `kk_pict` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kategori_karir`
--

INSERT INTO `kategori_karir` (`kk_id`, `kk_title`, `kk_slug`, `kk_desc`, `kk_pict`) VALUES
(1, 'Officer Development Program', 'officer-development-program', '<p style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif;\">This program prepares you for leadership positions across many levels in Mandiri. By joining the program, you will be trained by highly experienced bankers, professionals and leaders in various aspects of banking and leadership. The program starts off with intensive in-class education followed by on-the-job training and rotation across different parts of the Bank.</p><p style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif;\">In addition to this comprehensive training package, you will get to be coached by the bank’s top talent who will help you achieve your fullest potential and have a better understanding of your strengths. You will also have access to our top leaders and closely work with senior managers in projects that will develop your critical skills.</p>', 'cat_708535odp_job.png'),
(2, 'Experienced Hires', 'experienced-hires', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif;\">In Mandiri we develop talented and experienced executives to join our firm. Throughout our organization, we provide career advancement and leadership opportunities that enable highly-motivated individuals to grow and succeed.</span><br></p>', 'cat_631011image-experienced_hire.jpg'),
(3, 'Banking Staff', 'banking-staff', '<p style=\"margin-bottom: 1em; -webkit-font-smoothing: antialiased; padding: 0px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(104, 114, 119);\"><span style=\"color: rgb(0, 0, 0);\">Challenge your abilities and further develop your skills at Mandiri, be a part of the journey to be Indonesia Best, ASEAN Prominent by 2020 and get involved in prospering the nation</span></p><p style=\"margin-bottom: 1em; -webkit-font-smoothing: antialiased; padding: 0px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(104, 114, 119);\"><span style=\"color: rgb(0, 0, 0);\"><br></span><span style=\"color: rgb(0, 0, 0);\">Key Job Responsibilities will include:</span></p><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 20px; -webkit-font-smoothing: antialiased; padding: 0px; border: 0px; font-stretch: inherit; line-height: 19.5px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13px; vertical-align: baseline; color: rgb(80, 88, 92);\"><li style=\"-webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 14px; vertical-align: baseline; color: rgb(104, 114, 119);\"><span style=\"color: rgb(0, 0, 0);\">Providing service excellent to customers to do banking transactions</span></li><li style=\"-webkit-font-smoothing: antialiased; margin: 1em 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 14px; vertical-align: baseline; color: rgb(104, 114, 119);\"><span style=\"color: rgb(0, 0, 0);\">Collecting information related to clients or potential clients and analyzing their needs</span></li><li style=\"-webkit-font-smoothing: antialiased; margin: 1em 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 14px; vertical-align: baseline; color: rgb(104, 114, 119);\"><span style=\"color: rgb(0, 0, 0);\">Providing explanation of banking products according to customer needs</span></li><li style=\"-webkit-font-smoothing: antialiased; margin: 1em 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 14px; vertical-align: baseline; color: rgb(104, 114, 119);\"><span style=\"color: rgb(0, 0, 0);\">Responding to customer complaints to resolve the problem</span></li></ul><p style=\"margin-top: 1em; margin-bottom: 0px; font-family: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; -webkit-font-smoothing: antialiased; padding: 0px; border: 0px; font-stretch: inherit; line-height: inherit; vertical-align: baseline; color: rgb(104, 114, 119);\">&nbsp;</p><p style=\"margin-top: 1em; margin-bottom: 0px; font-family: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; -webkit-font-smoothing: antialiased; padding: 0px; border: 0px; font-stretch: inherit; line-height: inherit; vertical-align: baseline; color: rgb(104, 114, 119);\"><span style=\"color: rgb(0, 0, 0);\">And also:</span></p><p style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif;\">·&nbsp; Day-to-day office management</p><p style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif;\">·&nbsp; Maintain administrative tasks such as filing and processing documents</p><p style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif;\">·&nbsp; Perform ad-hoc administrative support functions / office management tasks</p><p style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif;\">·&nbsp; Perform data management to support business unit operations</p><p style=\"margin-top: 1em; -webkit-font-smoothing: antialiased; padding: 0px; border: 0px; font-stretch: inherit; line-height: inherit; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(104, 114, 119); margin-bottom: 0px !important;\"><span style=\"color: rgb(0, 0, 0);\">Requirement:</span></p><ol style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif;\"><li style=\"line-height: 1.4em; margin-top: 0px; margin-bottom: 0px;\"><span style=\"color: rgb(0, 0, 0);\">Minimum&nbsp;</span>Diploma 3 or graduates (S1)&nbsp;<span style=\"color: rgb(0, 0, 0);\">with minimum of 2.75 from relevant fields of studies</span></li><li style=\"line-height: 1.4em; margin-top: 5px; margin-bottom: 0px;\"><span style=\"color: rgb(0, 0, 0);\">Maximum age of 24 years old for fresh graduates and 26 years old with 2 years relevant experience</span></li><li style=\"line-height: 1.4em; margin-top: 5px; margin-bottom: 0px;\"><span style=\"color: rgb(0, 0, 0);\">Unmarried</span></li><li style=\"line-height: 1.4em; margin-top: 5px; margin-bottom: 0px;\"><span style=\"color: rgb(0, 0, 0);\">Presentable and good communication skills</span></li></ol>', 'cat_43204banking_staff.png');

-- --------------------------------------------------------

--
-- Table structure for table `pelamar_kerja`
--

CREATE TABLE `pelamar_kerja` (
  `p_id` int(11) NOT NULL,
  `p_ktp` varchar(20) NOT NULL,
  `p_npwp` varchar(20) NOT NULL,
  `p_email` varchar(100) NOT NULL,
  `p_nama_lengkap` varchar(255) NOT NULL,
  `p_tmpt_lahir` varchar(100) NOT NULL,
  `p_tgl_lahir` date NOT NULL,
  `p_jkel` enum('L','P') NOT NULL,
  `p_alamat` text NOT NULL,
  `p_no_hp` varchar(36) NOT NULL,
  `p_headline` text NOT NULL,
  `k_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelamar_kerja`
--

INSERT INTO `pelamar_kerja` (`p_id`, `p_ktp`, `p_npwp`, `p_email`, `p_nama_lengkap`, `p_tmpt_lahir`, `p_tgl_lahir`, `p_jkel`, `p_alamat`, `p_no_hp`, `p_headline`, `k_id`) VALUES
(1, '1101011310780010', '357691724502000', 'dwi_ar@gmail.com', 'Dwi Aryanto', 'Jakarta', '1990-12-07', 'L', 'Jakarta Pusat', '081289898766', 'I have very good command over C, HTML, CSS ,  Java,  and Dot NET.  I believe and am confident that my academic scores will be compensated  with good programming skills. I am looking for a position where I can work and also learn.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `reg_id` varchar(8) NOT NULL,
  `reg_date` date NOT NULL,
  `p_email` varchar(100) NOT NULL,
  `reg_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:process,2:file_verified,3:pass,4:not_pass'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`reg_id`, `reg_date`, `p_email`, `reg_status`) VALUES
('R1807001', '2018-07-01', 'dwi_ar@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `site_pages`
--

CREATE TABLE `site_pages` (
  `pg_id` int(11) NOT NULL,
  `pg_title` varchar(100) NOT NULL,
  `pg_slug` varchar(250) NOT NULL,
  `pg_content` text NOT NULL,
  `pg_publish` enum('Y','N') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_pages`
--

INSERT INTO `site_pages` (`pg_id`, `pg_title`, `pg_slug`, `pg_content`, `pg_publish`) VALUES
(1, 'tentang kami', 'tentang-kami', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori_karir`
--

CREATE TABLE `sub_kategori_karir` (
  `skk_id` int(5) NOT NULL,
  `kk_id` int(5) NOT NULL,
  `skk_title` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `skk_slug` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `skk_desc` text COLLATE latin1_general_ci NOT NULL,
  `skk_publish` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `sub_kategori_karir`
--

INSERT INTO `sub_kategori_karir` (`skk_id`, `kk_id`, `skk_title`, `skk_slug`, `skk_desc`, `skk_publish`) VALUES
(1, 1, 'Officer Development Program General', 'officer-development-program-general', '<p>Officer Development Program General<br></p>', 'Y'),
(2, 1, 'Officer Development Program Khusus IT', 'officer-development-program-khusus-it', '<p>Officer Development Program Khusus IT<br></p>', 'Y'),
(3, 2, 'Risk Management Development Program', 'risk-management-development-program', '<p helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(104,=\"\" 114,=\"\" 119);=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" style=\"margin-bottom: 1em; color: rgb(85, 85, 85); line-height: inherit; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; -webkit-font-smoothing: antialiased; padding: 0px; border: 0px; font-stretch: inherit;\">We are looking for new graduates from fields related to Risk Management to be able to work and build nation through Risk Management Development Program (RMDP)</p><p helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(104,=\"\" 114,=\"\" 119);=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" style=\"margin-bottom: 1em; color: rgb(85, 85, 85); line-height: inherit; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; -webkit-font-smoothing: antialiased; padding: 0px; border: 0px; font-stretch: inherit;\">This program prepares you for leadership positions across many levels in Mandiri. By joining the program, you will be trained by highly experienced bankers, professionals and leaders in various aspects of banking and leadership. The program starts off with intensive in-class education followed by on-the-job training and rotation across different parts of the Bank.</p><p helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(104,=\"\" 114,=\"\" 119);=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" style=\"margin-bottom: 1em; color: rgb(85, 85, 85); line-height: inherit; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; -webkit-font-smoothing: antialiased; padding: 0px; border: 0px; font-stretch: inherit;\">By joining this program, you will be trained by highly experience bankers &amp; Risk Professional to be a professionals and leaders in various aspect of Risk Management and Leadership.</p>', 'Y'),
(4, 3, 'Officer Development Program Programmer BPR Project', 'officer-development-program-programmer-bpr-project', '<p>Officer Development Program Programmer BPR Project<br></p>', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_keyname` varchar(50) NOT NULL,
  `user_keypass` varchar(64) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `role_id` int(5) NOT NULL,
  `user_status` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_keyname`, `user_keypass`, `user_fullname`, `user_email`, `role_id`, `user_status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin@domain.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `role_id` int(2) NOT NULL,
  `role_name` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`role_id`, `role_name`) VALUES
(1, 'administrator'),
(2, 'staff'),
(3, 'applicants');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas_docs`
--
ALTER TABLE `berkas_docs`
  ADD PRIMARY KEY (`berkas_id`);

--
-- Indexes for table `info_karir`
--
ALTER TABLE `info_karir`
  ADD PRIMARY KEY (`k_id`);

--
-- Indexes for table `kategori_karir`
--
ALTER TABLE `kategori_karir`
  ADD PRIMARY KEY (`kk_id`);

--
-- Indexes for table `pelamar_kerja`
--
ALTER TABLE `pelamar_kerja`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_email` (`p_email`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `site_pages`
--
ALTER TABLE `site_pages`
  ADD PRIMARY KEY (`pg_id`);

--
-- Indexes for table `sub_kategori_karir`
--
ALTER TABLE `sub_kategori_karir`
  ADD PRIMARY KEY (`skk_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas_docs`
--
ALTER TABLE `berkas_docs`
  MODIFY `berkas_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `info_karir`
--
ALTER TABLE `info_karir`
  MODIFY `k_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori_karir`
--
ALTER TABLE `kategori_karir`
  MODIFY `kk_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelamar_kerja`
--
ALTER TABLE `pelamar_kerja`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_pages`
--
ALTER TABLE `site_pages`
  MODIFY `pg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_kategori_karir`
--
ALTER TABLE `sub_kategori_karir`
  MODIFY `skk_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `role_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
