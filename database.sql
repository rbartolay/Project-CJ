-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2012 at 02:39 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hummer`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `company_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `website` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `name`, `description`, `address`, `website`, `logo`, `date_created`, `date_modified`, `active`, `flag`) VALUES
(1, 'First Data', '', '', '', '', '2012-06-16 17:48:28', '0000-00-00 00:00:00', 1, 0),
(2, 'Technosoft Corporation', '', '', '', '', '2012-06-16 17:48:28', '0000-00-00 00:00:00', 1, 0),
(3, 'Compunnel Software Group', '', '', '', '', '2012-06-16 17:48:28', '0000-00-00 00:00:00', 1, 0),
(4, 'Geographic Information Services, Inc.', '', '', '', '', '2012-06-16 17:48:28', '0000-00-00 00:00:00', 1, 0),
(5, 'Federal Reserve Bank of Minneapolis', '', '', '', '', '2012-06-16 17:48:28', '0000-00-00 00:00:00', 1, 0),
(6, 'JPMorgan Chase', 'JPMorgan (www.jpmorgan.com) is the investment banking arm of JPMorgan Chase & Co. (NYSE: JPM), a leading global financial services firm with assets of $1.5 trillion and operations in more than 50 countries. The firm is a leader in investment banking, financial services for consumers, small business and commercial banking, financial transaction processing, asset and wealth management, and private equity. A component of the Dow Jones Industrial Average, JPMorgan Chase serves millions of consumers in the United States and many of the world''s most prominent corporate, institutional and government clients under its JPMorgan and Chase brands.', '277 Park Avenue Floor 39\r\nNew York, New York 10172\r\nUnited States', 'www.jpmorgan.com', '6.jpg', '2012-06-16 17:48:28', '0000-00-00 00:00:00', 1, 0),
(7, 'New Breed Logistics', '', '', '', '', '2012-06-16 17:48:28', '0000-00-00 00:00:00', 1, 0),
(8, 'Deloitte', '', '', '', '', '2012-06-16 17:48:28', '0000-00-00 00:00:00', 1, 0),
(9, 'Jacobs Technology', '', '', '', '', '2012-06-16 17:48:28', '0000-00-00 00:00:00', 1, 0),
(10, 'OPTiMO IT', '', '', '', '', '2012-06-16 17:48:28', '0000-00-00 00:00:00', 1, 0),
(11, 'UpStream Global Services', '', '', '', '', '2012-06-16 17:48:28', '0000-00-00 00:00:00', 1, 0),
(12, 'Blue Cross Blue Shield of Massachusetts', '', '', '', '', '2012-06-16 17:48:28', '0000-00-00 00:00:00', 1, 0),
(13, 'Associated Bank', '', '', '', '', '2012-06-16 17:48:28', '0000-00-00 00:00:00', 1, 0),
(14, 'AZZ Incorporated', '', '', '', '', '2012-06-16 17:48:29', '0000-00-00 00:00:00', 1, 0),
(15, 'KBACE Technologies', '', '', '', '', '2012-06-16 17:48:29', '0000-00-00 00:00:00', 1, 0),
(16, 'Merced Systems', '', '', '', '', '2012-06-16 17:48:29', '0000-00-00 00:00:00', 1, 0),
(17, 'Yellow Book USA', 'Established in 1930, Yellow Book USA is the oldest and largest independent yellow pages publisher in the nation. In recent years, Yellow Book has made a number of strategic acquisitions and entered scores of new markets. With the recent acquisition of TransWestern Publishing, Yellow Book will publish approximately 900 directories in 46 states, plus the District of Columbia with a distribution of over 100 million directories.', '2560 Renaissance Blvd\r\nKing Of Prussia, Pennsylvania 19406\r\nUnited States', 'www.yellowbook.com', '17.jpg', '2012-06-16 17:48:29', '0000-00-00 00:00:00', 1, 0),
(18, 'Harvard University', '', '', '', '18.jpg', '2012-06-16 17:48:29', '0000-00-00 00:00:00', 1, 0),
(19, 'Harte-Hanks, Inc.', '', '', '', '', '2012-06-16 20:43:31', '0000-00-00 00:00:00', 1, 0),
(20, 'Burns&McDonnell', '', '', '', '', '2012-06-16 20:43:32', '0000-00-00 00:00:00', 1, 0),
(21, 'Verizon Wireless', '', '', '', '21.jpg', '2012-06-16 20:43:32', '0000-00-00 00:00:00', 1, 0),
(22, 'L-3 Communications', '', '', '', '', '2012-06-16 20:43:32', '0000-00-00 00:00:00', 1, 0),
(23, 'QinetiQ North America', '', '', '', '', '2012-06-16 20:43:32', '0000-00-00 00:00:00', 1, 0),
(24, 'Harris Corporation', '', '', '', '', '2012-06-16 20:43:33', '0000-00-00 00:00:00', 1, 0),
(25, 'DriveTime', '', '', '', '', '2012-06-16 20:43:33', '0000-00-00 00:00:00', 1, 0),
(26, 'General Dynamics - IT', '', '', '', '', '2012-06-16 20:43:33', '0000-00-00 00:00:00', 1, 0),
(27, 'Tyco International', '', '', '', '', '2012-06-24 09:58:54', '0000-00-00 00:00:00', 1, 0),
(28, 'Evraz Inc. NA', '', '', '', '', '2012-06-24 09:58:54', '0000-00-00 00:00:00', 1, 0),
(29, 'SA Technologies, Inc.', '', '', '', '', '2012-06-24 09:58:54', '0000-00-00 00:00:00', 1, 0),
(30, 'Manthan Data Solutions', '', '', '', '', '2012-06-24 09:58:54', '0000-00-00 00:00:00', 1, 0),
(31, 'CIBER', '', '', '', '', '2012-06-24 09:58:54', '0000-00-00 00:00:00', 1, 0),
(32, 'Rural Sourcing Inc.', '', '', '', '', '2012-06-24 09:58:54', '0000-00-00 00:00:00', 1, 0),
(33, '', '', '', '', '', '2012-06-24 09:58:54', '0000-00-00 00:00:00', 1, 0),
(34, 'Tervis Tumbler', '', '', '', '', '2012-06-24 09:58:54', '0000-00-00 00:00:00', 1, 0),
(35, 'CSC', '', '', '', '', '2012-06-24 09:58:55', '0000-00-00 00:00:00', 1, 0),
(36, 'IBM', '', '', '', '', '2012-06-24 09:58:55', '0000-00-00 00:00:00', 1, 0),
(37, 'Northrop Grumman', '', '', '', '', '2012-06-24 09:58:55', '0000-00-00 00:00:00', 1, 0),
(38, 'Xerox Services', '', '', '', '', '2012-06-24 09:58:55', '0000-00-00 00:00:00', 1, 0),
(39, 'University of Notre Dame', '', '', '', '', '2012-06-24 09:58:55', '0000-00-00 00:00:00', 1, 0),
(40, 'Trizetto', '', '', '', '', '2012-06-24 09:58:55', '0000-00-00 00:00:00', 1, 0),
(41, 'ConocoPhillips', '', '', '', '', '2012-06-24 09:58:55', '0000-00-00 00:00:00', 1, 0),
(42, 'XO Group Inc.', '', '', '', '', '2012-06-24 09:58:55', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `api_source_id` int(11) NOT NULL DEFAULT '0',
  `jobtitle` text NOT NULL,
  `company_id` varchar(100) NOT NULL,
  `city` varchar(45) NOT NULL,
  `state` varchar(10) NOT NULL,
  `country` varchar(10) CHARACTER SET latin1 NOT NULL,
  `location` text NOT NULL,
  `source` varchar(45) CHARACTER SET latin1 NOT NULL,
  `date_posted` datetime NOT NULL,
  `snippet` text CHARACTER SET latin1 NOT NULL,
  `url` text CHARACTER SET latin1 NOT NULL,
  `website` text CHARACTER SET latin1 NOT NULL,
  `latitude` varchar(45) CHARACTER SET latin1 NOT NULL,
  `longitude` varchar(45) CHARACTER SET latin1 NOT NULL,
  `jobkey` text CHARACTER SET latin1 NOT NULL,
  `sponsored` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `date_created` datetime NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `api_source_id`, `jobtitle`, `company_id`, `city`, `state`, `country`, `location`, `source`, `date_posted`, `snippet`, `url`, `website`, `latitude`, `longitude`, `jobkey`, `sponsored`, `expired`, `date_created`, `flag`) VALUES
(1, 1, 'Application Developer', '1', 'Coral Springs', 'FL', 'US', '', 'First Data', '2012-06-10 05:48:00', 'developer to work in java environment - skillset includes the following -   Oracle 10g&amp; 11gÂ database   PL/SQL   Linux, Unix, AIX   Java, Jsp, JQuery, HTML, CSS...', 'http://www.indeed.com/viewjob?jk=eba9feb9fdce2ed8&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qXEIWlm7stjVBXPvL54DU30cXtj0YObBD_26Z3spuwqXR6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqb2jgb0g317lp', '', '26.26923', '-80.26923', 'eba9feb9fdce2ed8', 0, 0, '2012-06-16 17:48:28', 0),
(2, 1, 'Application Developer', '1', 'Atlanta', 'GA', 'US', '', 'First Data', '2012-06-09 12:16:00', 'development and design with experience, VB.Net. And Oracle 10g pl/sql   Also working knowledge of any/all... with experience, VB.Net. And Oracle 10g pl/sql  Also...', 'http://www.indeed.com/viewjob?jk=df8ab88407041a40&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qXEIWlm7stjVBXPvL54DU30cXtj0YObBD_26Z3spuwqXR6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqb2jgb0g317lp', '', '33.747253', '-84.38461', 'df8ab88407041a40', 0, 0, '2012-06-16 17:48:28', 0),
(3, 1, 'Oracle PL/SQL developer', '2', 'Phoenix', 'AZ', 'US', '', 'Technosoft Corporation', '2012-06-14 08:17:13', 'has an opening for aâ€œOracle PL/SQL developerâ€ for... Position: Oracle PL/SQL developer Duration: 6 Months Location: Phoenix, AZ Â  Required Skills: Oracle PL...', 'http://www.indeed.com/viewjob?jk=673d72ed86c35c6f&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '33.447803', '-112.07143', '673d72ed86c35c6f', 0, 0, '2012-06-16 17:48:28', 0),
(4, 1, 'Oracle Developer', '3', 'Bethpage', 'NY', 'US', '', 'Compunnel Software Group', '2012-06-14 11:11:18', 'Job title:- PL/SQL Developer Required skill:- - Experience in SQL/PLSQL - Experience in ETL/Data Warehousing world', 'http://www.indeed.com/viewjob?jk=6a771a9c1b2b2fd4&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '40.741756', '-73.47802', '6a771a9c1b2b2fd4', 0, 0, '2012-06-16 17:48:28', 0),
(5, 1, 'Oracle PL/SQL Developer', '2', 'Bethpage', 'NY', 'US', '', 'Technosoft Corporation', '2012-06-14 02:46:02', 'has an opening for aâ€œOracle pl/sql Developerâ€ for... a plus) Â· SQL*Loader Â· TOAD Â  Project: Develop Oracle backend for a Microstrategy reporting system...', 'http://www.indeed.com/viewjob?jk=b9c1876e33dda2d4&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '40.741756', '-73.47802', 'b9c1876e33dda2d4', 0, 0, '2012-06-16 17:48:28', 0),
(6, 1, 'Application Developer', '1', 'Melville', 'NY', 'US', '', 'First Data', '2012-06-04 06:36:00', 'developer to work in java environment - skillset includes the following -   Oracle 10G database   PL/SQL   Unix AIX   java   Web Services  Experience with...', 'http://www.indeed.com/viewjob?jk=913cfec3b2aee5cc&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '40.802197', '-73.4011', '913cfec3b2aee5cc', 0, 0, '2012-06-16 17:48:28', 0),
(7, 1, 'Oracle Database Administrator', '4', 'Alexandria', 'VA', 'US', '', 'Geographic Information Services, Inc.', '2012-06-15 06:25:33', 'Oracle CPUs, performing Oracle upgrades (e.g. 10gR2 to 11gR2)- knowledgeable in administering Oracle RAC... Oracle Certification (e.g. Oracle Database vX...', 'http://www.indeed.com/viewjob?jk=9e2fd3aef5ab11af&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '38.802197', '-77.04395', '9e2fd3aef5ab11af', 0, 0, '2012-06-16 17:48:28', 0),
(8, 1, 'Oracle PL/SQL Developer', '5', 'Minneapolis', 'MN', 'US', '', 'Federal Reserve Bank of Minneapolis', '2012-06-14 07:31:41', 'management systems (Oracle, MS SQL Server, etc... practices Data warehousing and Oracle 10g/11g experience Strong Oracle PL/SQL programming skills In...', 'http://www.indeed.com/viewjob?jk=34e417b63c9cce13&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '44.978024', '-93.26373', '34e417b63c9cce13', 0, 0, '2012-06-16 17:48:28', 0),
(9, 1, 'Applications Developer', '6', 'New York', 'NY', 'US', '', 'JPMorgan Chase', '2012-06-15 03:04:00', 'Skills required: Must have experience developing and optimizing queries with Sybase/Oracle. Must have knowledge of enterprise database schemas, including index...', 'http://www.indeed.com/viewjob?jk=f769ce6317ff4fbf&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '40.71154', '-74.00549', 'f769ce6317ff4fbf', 0, 0, '2012-06-16 17:48:28', 0),
(10, 1, 'Oracle Developer', '7', 'High Point', 'NC', 'US', '', 'New Breed Logistics', '2012-06-12 11:50:00', 'growth, we are seeking an Oracle Developer at our... years experience developing applications for Oracle databases using moderately complex PL/SQL procedures...', 'http://www.indeed.com/viewjob?jk=f21c22966f03ae4b&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '36.01099', '-80.0', 'f21c22966f03ae4b', 0, 0, '2012-06-16 17:48:28', 0),
(11, 1, 'Oracle Database Administrator', '8', '', '', 'US', '', 'Deloitte', '2012-06-15 04:37:35', 'Information Management Oracle Package Technologies... Skills... Experience installing and maintain Oracle eBS R12â€¢ experience with Apps DBA activities...', 'http://www.indeed.com/viewjob?jk=32346cb689b2c5ae&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '', '', '32346cb689b2c5ae', 0, 0, '2012-06-16 17:48:28', 0),
(12, 1, 'Oracle Developer', '9', 'Huntsville', 'AL', 'US', '', 'Jacobs Technology', '2012-06-13 10:54:54', 'customers. Responsibilities: Required Skills:  This position will require proficiency in Oracle 10g database design and relationships  Proficiency in PL/SQL...', 'http://www.indeed.com/viewjob?jk=7ed16bfbb241ecec&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '34.728024', '-86.58242', '7ed16bfbb241ecec', 0, 0, '2012-06-16 17:48:28', 0),
(13, 1, 'Oracle Developer', '10', 'Wilkes-Barre', 'PA', 'US', '', 'OPTiMO IT', '2012-06-11 11:04:13', 'day activities of the Oracle Development for a high... Must have previous Oracle development experience Must be skilled in Oracle Foms and Reports Must be...', 'http://www.indeed.com/viewjob?jk=bc080808db20e094&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '41.244507', '-75.87912', 'bc080808db20e094', 0, 0, '2012-06-16 17:48:28', 0),
(14, 1, 'Applications Developer', '6', 'Jersey City', 'NJ', 'US', '', 'JPMorgan Chase', '2012-06-14 02:47:00', 'with a relational database Strong SQL knowledge Preferred Skills: Oracle experience (PL-SQL or SQL-J) Spring Framework Mule (or other ESB technologies...', 'http://www.indeed.com/viewjob?jk=95b56f7cc6dadf0a&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '40.728024', '-74.07692', '95b56f7cc6dadf0a', 0, 0, '2012-06-16 17:48:28', 0),
(15, 1, 'Oracle PL/SQL Developer', '11', 'Boston', 'MA', 'US', '', 'UpStream Global Services', '2012-06-13 07:05:00', 'Oracle PL/SQL Developer We have an immediate opportunity for an Oracle PL/SQL Developer for in the Boston... CASE tools like Oracle Designer or PowerDesigner...', 'http://www.indeed.com/viewjob?jk=578259176804f2f2&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '42.357143', '-71.05495', '578259176804f2f2', 0, 0, '2012-06-16 17:48:28', 0),
(16, 1, 'Database Developer', '12', 'Boston', 'MA', 'US', '', 'Blue Cross Blue Shield of Massachusetts', '2012-06-15 05:51:42', 'detailed knowledge of SQL, UNIX Korn shell scripting; ETL programming using Oracle Data Integrator, and modeling data warehouse solutions (including star schema...', 'http://www.indeed.com/viewjob?jk=6dc4bd22e4555ca6&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '42.357143', '-71.05495', '6dc4bd22e4555ca6', 0, 0, '2012-06-16 17:48:28', 0),
(17, 1, 'Oracle Database Administrator', '13', 'Milwaukee', 'WI', 'US', '', 'Associated Bank', '2012-06-13 06:16:32', '4. Install and deploy databases (SQL Server, Oracle, Pervasive, Sybase) . 5. Maintain database... Bachelorâ€™s degree. Oracle Certified Professional (OCP...', 'http://www.indeed.com/viewjob?jk=cc00f196a6dd05d8&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '43.03846', '-87.9011', 'cc00f196a6dd05d8', 0, 0, '2012-06-16 17:48:28', 0),
(18, 1, 'Applications Developer', '6', 'Tampa', 'FL', 'US', '', 'JPMorgan Chase', '2012-06-13 07:15:00', 'with .NET, VB and Java is required. Experience with database like SQL Server&amp; Oracle is required. Unix&amp; Windows OS skills are required. Exposure to BPM...', 'http://www.indeed.com/viewjob?jk=7ddcd3f04d31cf4f&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qXEIWlm7stjVBXPvL54DU30cXtj0YObBD_26Z3spuwqXR6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqb2jgb0g317lp', '', '27.945055', '-82.45605', '7ddcd3f04d31cf4f', 0, 0, '2012-06-16 17:48:29', 0),
(19, 1, 'Oracle Database Administrator', '14', 'Fort Worth', 'TX', 'US', '', 'AZZ Incorporated', '2012-06-13 10:13:32', 'in an Oracle DBA role. Specialized Knowledge and Skills: Oracle DBA, strong Middleware knowledge, experience with debugging, using SQL (DML, DDL) for Oracle...', 'http://www.indeed.com/viewjob?jk=149ccc571c6009e5&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qXEIWlm7stjVBXPvL54DU30cXtj0YObBD_26Z3spuwqXR6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqb2jgb0g317lp', '', '32.725273', '-97.31868', '149ccc571c6009e5', 0, 0, '2012-06-16 17:48:29', 0),
(20, 1, 'Oracle Developer', '15', 'Nashua', 'NH', 'US', '', 'KBACE Technologies', '2012-06-12 09:52:20', 'of the fastest growing Oracle Consulting companies in... set and experience as an Oracle developer (PL/SQL, knowledge of Oracle Payroll is ideal). The Developer''s...', 'http://www.indeed.com/viewjob?jk=974e6b2352d6de8c&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qXEIWlm7stjVBXPvL54DU30cXtj0YObBD_26Z3spuwqXR6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqb2jgb0g317lp', '', '42.763737', '-71.46703', '974e6b2352d6de8c', 0, 0, '2012-06-16 17:48:29', 0),
(21, 1, 'Oracle DBA', '16', 'Richardson', 'TX', 'US', '', 'Merced Systems', '2012-06-15 04:52:48', 'environment with Oracle, Microsoft SQL, and Postgres database servers. The position requires a deep background in configuring and maintaining Oracle database...', 'http://www.indeed.com/viewjob?jk=dd1fcb4b9d55ec98&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qXEIWlm7stjVBXPvL54DU30cXtj0YObBD_26Z3spuwqXR6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqb2jgb0g317lp', '', '32.947803', '-96.72527', 'dd1fcb4b9d55ec98', 0, 0, '2012-06-16 17:48:29', 0),
(22, 1, 'Oracle DBA', '17', 'King of Prussia', 'PA', 'US', '', 'Yellow Book USA', '2012-06-15 09:35:00', 'matter expert in either Oracle or MS SQL Server RDBMS... duties as assigned. Requirements: Oracle proficiencies: Oracle RAC clustering and ASM RMAN backup and...', 'http://www.indeed.com/viewjob?jk=8dffd48f1848b98e&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qXEIWlm7stjVBXPvL54DU30cXtj0YObBD_26Z3spuwqXR6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqb2jgb0g317lp', '', '40.087914', '-75.39561', '8dffd48f1848b98e', 0, 0, '2012-06-16 17:48:29', 0),
(23, 1, 'Application Developer', '6', 'Gahanna', 'OH', 'US', '', 'JPMorgan Chase', '2012-06-15 03:10:00', 'flow for managing complex page. Expertise in Oracle, SQL, PL/SQL, Oracle Packages, Stored Procedures, Functions. Expertise in Oracle database schema and use...', 'http://www.indeed.com/viewjob?jk=dd3bd896b853c502&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qXEIWlm7stjVBXPvL54DU30cXtj0YObBD_26Z3spuwqXR6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqb2jgb0g317lp', '', '40.01923', '-82.87912', 'dd3bd896b853c502', 0, 0, '2012-06-16 17:48:29', 0),
(24, 1, 'Oracle DBA', '3', 'Charlotte', 'NC', 'US', '', 'Compunnel Software Group', '2012-06-14 11:10:46', 'Location: Charlotte, nc Targeted Skills&amp; Competencies: Possess a broad understanding of DBMS software and the current IT infrastructure, process, and...', 'http://www.indeed.com/viewjob?jk=8d523cfb7ad75c6c&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qXEIWlm7stjVBXPvL54DU30cXtj0YObBD_26Z3spuwqXR6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqb2jgb0g317lp', '', '35.225273', '-80.84066', '8d523cfb7ad75c6c', 0, 0, '2012-06-16 17:48:29', 0),
(25, 1, 'Oracle DBA', '18', 'Boston', 'MA', 'US', '', 'Harvard University', '2012-06-14 06:57:01', 'release management. Oracle 11g support requires... as an Oracle DBA.  Additional Qualifications - Master''s Degree in Computer Science - Oracle DBA 10g/11g...', 'http://www.indeed.com/viewjob?jk=3d85f8a862b510cc&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qXEIWlm7stjVBXPvL54DU30cXtj0YObBD_26Z3spuwqXR6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqb2jgb0g317lp', '', '42.357143', '-71.05495', '3d85f8a862b510cc', 0, 0, '2012-06-16 17:48:29', 0),
(26, 1, 'Oracle Developer', '19', 'Langhorne', 'PA', 'US', '', 'Harte-Hanks, Inc.', '2012-06-16 06:36:00', 'Summary: The Oracle Developer is responsible for... concerns Requirements:â€¢ 5+ years working with Oracle 8/9i and/or MS SQL Server 2005/2008 â€¢ 5+ years...', 'http://www.indeed.com/viewjob?jk=3933a08d4d3cc52e&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '40.173077', '-74.91758', '3933a08d4d3cc52e', 0, 0, '2012-06-16 20:43:31', 0),
(27, 1, 'Oracle Developer', '20', 'Kansas City', 'MO', 'US', '', 'Burns&McDonnell', '2012-06-16 06:41:00', 'for Oracle Applications (SQL, PL/SQL, Oracle Forms... Bi Publisher   Oracle SQL in Oracle RDBMS 10g and 11g   Oracle PL/SQL in Oracle RDBMS 10g and 11g   Oracle...', 'http://www.indeed.com/viewjob?jk=c16a20f7edb76c0e&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '39.0989', '-94.57692', 'c16a20f7edb76c0e', 0, 0, '2012-06-16 20:43:32', 0),
(28, 1, 'Oracle Pl/SQL developer', '21', 'Orangeburg', 'NY', 'US', '', 'Verizon Wireless', '2012-06-16 08:18:00', 'and bring your strong Oracle PL/SQL skills to help us... data in Oracle) (3 to 5 years for each... Secondary Skills: messaging experience (Oracle AQ) Bachelor...', 'http://www.indeed.com/viewjob?jk=2fc9a70c83239b61&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '41.043957', '-73.94505', '2fc9a70c83239b61', 0, 0, '2012-06-16 20:43:32', 0),
(29, 1, 'Oracle Database Administrator', '22', 'Springfield', 'VA', 'US', '', 'L-3 Communications', '2012-06-16 06:34:00', 'Strategies Knowledge of Oracle TCA or Oracle Customer Data Hub, CRM and Service modulesÂ  Knowledge of Oracle HTML Tech Stack and Oracle Forms Tech stack...', 'http://www.indeed.com/viewjob?jk=22494593d5370fba&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '38.78846', '-77.18681', '22494593d5370fba', 0, 0, '2012-06-16 20:43:32', 0),
(30, 1, 'Oracle Database Administrator', '23', 'Columbia', 'MD', 'US', '', 'QinetiQ North America', '2012-06-16 06:24:00', 'Oracle Database Administrator with Oracle Real App Clustering (RAC). Responsibilities : Must have Oracle... such as SQL, PL/SQL, Oracle, etc.  Experience working...', 'http://www.indeed.com/viewjob?jk=1d69922558bbb2b2&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '39.23901', '-76.83517', '1d69922558bbb2b2', 0, 0, '2012-06-16 20:43:32', 0),
(31, 1, 'Database Developer', '24', 'Dulles', 'VA', 'US', '', 'Harris Corporation', '2012-06-16 06:33:00', 'system software to possibly include Microsoft SQL Server; MySQL software; Oracle softwareÂ· Development environment software to possibly include IBM Rational...', 'http://www.indeed.com/viewjob?jk=c1a2a0acc1fae050&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '39.085163', '-77.64286', 'c1a2a0acc1fae050', 0, 0, '2012-06-16 20:43:33', 0),
(32, 1, 'Database Developer', '22', 'Washington', 'DC', 'US', '', 'L-3 Communications', '2012-06-16 06:34:00', 'developmentÂ· Experience with relational database design Â· Experience with Oracle, SQL, Sybase, or other enterprise database system Â· Experience with...', 'http://www.indeed.com/viewjob?jk=fde7cb84b7019827&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '38.892857', '-77.03297', 'fde7cb84b7019827', 0, 0, '2012-06-16 20:43:33', 0),
(33, 1, 'Database Developer', '25', 'Phoenix', 'AZ', 'US', '', 'DriveTime', '2012-06-16 01:19:00', 'R2 solutions OR another relational database (such as Oracle) Advanced grasp of Relational database design... engine (eg. MSSQL, Oracle, Sybase etc.) 1+ years...', 'http://www.indeed.com/viewjob?jk=952320362c52970d&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '33.447803', '-112.07143', '952320362c52970d', 0, 0, '2012-06-16 20:43:33', 0),
(34, 1, 'Oracle DBA', '24', 'Arlington', 'VA', 'US', '', 'Harris Corporation', '2012-06-16 06:28:00', 'Experience in Oracle 8/9/10Â• Knowledge of SQL... with a minimum of 4 years experience supporting Oracle DBA requirements Â• Required Certifications: 8570...', 'http://www.indeed.com/viewjob?jk=7db1182a02903bee&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '38.87912', '-77.0989', '7db1182a02903bee', 0, 0, '2012-06-16 20:43:33', 0),
(35, 1, 'Oracle DBA', '26', 'Fort Detrick', 'MD', 'US', '', 'General Dynamics - IT', '2012-06-16 05:17:00', 'Good experience with Oracle databases tuning and... performing Oracle quarterly critical updates on database and OFMâ€¢	Solid skills with Oracle Data Guard...', 'http://www.indeed.com/viewjob?jk=0de823c956bfce34&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qWb3llSxOlsUfQYdarfhCVPQg8tnB-r2zGLqaePgqFOpB6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=16vqluv9d0g3110j', '', '39.43956', '-77.42308', '0de823c956bfce34', 0, 0, '2012-06-16 20:43:33', 0),
(36, 1, 'Material Handler, Home Health Security Services', '27', 'Chatsworth', 'CA', 'US', '', 'Tyco International', '2012-06-19 09:22:01', 'and carry boxes up to 50 pounds.Â  Familiarity with FedEx shipping operations. Oracle Business Suite experience ADT Fast Facts World''s largest electronic...', 'http://www.indeed.com/viewjob?jk=4d02c86f14e47a37&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '34.255493', '-118.5989', '4d02c86f14e47a37', 0, 0, '2012-06-24 09:58:54', 0),
(37, 1, 'Oracle Applications Developer', '28', '', '', 'US', '', 'Evraz Inc. NA', '2012-06-22 02:03:11', 'support of the current Oracle E-Business environment... Oracle Applications 11i or R12 Supply Chain, Financial, and/or Manufacturing modules; knowledge of Oracle...', 'http://www.indeed.com/viewjob?jk=dd36c0d25fb924d2&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '', '', 'dd36c0d25fb924d2', 0, 0, '2012-06-24 09:58:54', 0),
(38, 1, 'Oracle Developer', '29', 'Kansas City', 'MO', 'US', '', 'SA Technologies, Inc.', '2012-06-22 11:47:21', 'client is hiring for Sr Oracle ProjectsÂ r12 high... modify code, Â troubleshoot issue... Position: Â  Oracle Developer  Location: Kansas City, MO  Duration...', 'http://www.indeed.com/viewjob?jk=34165d8f883ba487&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '39.0989', '-94.57692', '34165d8f883ba487', 0, 0, '2012-06-24 09:58:54', 0),
(39, 1, 'Oracle Applications Developer', '30', 'San Jose', 'CA', 'US', '', 'JobHost', '2012-06-21 10:49:35', 'positions open for Oracle Applications Developer... Experience with Oracle applications - preferably 11i -Familiarity with any Oracle application module...', 'http://www.indeed.com/viewjob?jk=5185a58433b68a56&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '37.332417', '-121.89011', '5185a58433b68a56', 0, 0, '2012-06-24 09:58:54', 0),
(40, 1, 'Oracle Developer', '31', 'Woonsocket', 'RI', 'US', '', 'CIBER', '2012-06-22 12:43:00', 'CIBER is searching for an Oracle DeveloperÂ with experience in the following: Unix, SQL, PL/SQL Oracle, Java Stored Procedures&amp; Java ( experience with Web...', 'http://www.indeed.com/viewjob?jk=a35909f8c08d59b5&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '42.002747', '-71.51099', 'a35909f8c08d59b5', 0, 0, '2012-06-24 09:58:54', 0),
(41, 1, 'Oracle PL/SQL Developer', '11', 'Westlake', 'TX', 'US', '', 'UpStream Global Services', '2012-06-21 11:22:29', 'database development, predominantly in Oracle (experience in Oracle 11g is an advantage) :	Knowledge of... predominantly in Oracle (experience in Oracle 11g is...', 'http://www.indeed.com/viewjob?jk=907a72654352eeb0&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '32.98901', '-97.19231', '907a72654352eeb0', 0, 0, '2012-06-24 09:58:54', 0),
(42, 1, 'Oracle Developer', '32', 'Augusta', 'GA', 'US', '', 'Rural Sourcing Inc.', '2012-06-21 10:06:34', 'successful delivery of Oracle Application development... team on Oracle implementation projects. Responsibilities: Code application logic code in Oracle PL/Sql...', 'http://www.indeed.com/viewjob?jk=64d9599623c58d91&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '33.46978', '-81.97253', '64d9599623c58d91', 0, 0, '2012-06-24 09:58:54', 0),
(43, 1, 'Technology Services&Support Director', '33', '', 'NC', 'US', '', 'North Carolina Office of State Personnel', '2012-06-22 09:36:15', 'RHEL, MS Exchange, Oracle/SQL Server to assist...&amp; hardware sizing for J2EE applications, SAN, and Oracle/SQL DB   Demonstrated experience in managing IT...', 'http://www.indeed.com/viewjob?jk=178a88442fdf1a17&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '35.782967', '-78.63187', '178a88442fdf1a17', 0, 0, '2012-06-24 09:58:54', 0),
(44, 1, 'Oracle Developer', '3', 'Baltimore', 'MD', 'US', '', 'Compunnel Software Group', '2012-06-19 09:14:14', 'Oracle SQL and PL/SQL coding style and application tuning.Â· 3+years of Oracle Forms9i development is required. Â· Strong development experience with Oracle PL...', 'http://www.indeed.com/viewjob?jk=60370b4bb217a2ef&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '39.28846', '-76.60989', '60370b4bb217a2ef', 0, 0, '2012-06-24 09:58:54', 0),
(45, 1, 'Oracle Developer', '34', 'Venice', 'FL', 'US', '', 'Tervis Tumbler', '2012-06-19 07:10:24', 'Knowledge of Oracle development tools including: Oracle Forms 6i, Oracle Reports 6i and Oracle Discoverer... of Oracle APIs. Strong working knowledge of Oracle...', 'http://www.indeed.com/viewjob?jk=892af8f5aec44249&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '27.098902', '-82.45055', '892af8f5aec44249', 0, 0, '2012-06-24 09:58:54', 0),
(46, 1, 'Database Developer', '35', 'Hanover', 'MD', 'US', '', 'CSC', '2012-06-22 08:12:58', 'database software using Oracle, SQL Server, or Sybase... private databases dynamically loading data to an Oracle database from XML Candidates Must possess an...', 'http://www.indeed.com/viewjob?jk=aab164c2c0453448&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '39.192307', '-76.71978', 'aab164c2c0453448', 0, 0, '2012-06-24 09:58:55', 0),
(47, 1, 'Oracle Database Administrator', '36', 'Hampton', 'VA', 'US', '', 'IBM', '2012-06-22 12:06:00', 'software from IBM and/or Oracle, we''d like to meet... global leader. Join us. Advanced experience in Oracle database administration, performance tuning and...', 'http://www.indeed.com/viewjob?jk=c6ed70dd2ffef6fe&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '37.027473', '-76.34066', 'c6ed70dd2ffef6fe', 0, 0, '2012-06-24 09:58:55', 0),
(48, 1, 'Oracle Database Administrator', '36', '', 'MD', 'US', '', 'IBM', '2012-06-22 12:15:00', 'us as we make the world a smarter planet. IBM is looking for Oracle Database Administrators to support Oracle, MS Access, Sharepoint and SQL Servers. Database...', 'http://www.indeed.com/viewjob?jk=16f504d47669e1f8&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '', '', '16f504d47669e1f8', 0, 0, '2012-06-24 09:58:55', 0),
(49, 1, 'Oracle Database Administrator', '22', 'Colorado Springs', 'CO', 'US', '', 'L-3 Communications', '2012-06-22 12:16:00', 'Description Seeking an Oracle DBA with experience in... Oracle desired)â€¢ Experience with backup and recovery (RMAN desired) â€¢ Experience with Oracle database...', 'http://www.indeed.com/viewjob?jk=2d0423a7358ca78e&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '38.832417', '-104.81868', '2d0423a7358ca78e', 0, 0, '2012-06-24 09:58:55', 0),
(50, 1, 'Oracle Developer', '37', 'Monterey', 'CA', 'US', '', 'Northrop Grumman', '2012-06-18 02:18:00', 'Oracle 10G or higherâ€¢Cognos Experience is highly desirable â€¢Masters degree in Computer Science (or similar disciplines) â€¢Oracle Certified Associate â€¢Oracle...', 'http://www.indeed.com/viewjob?jk=f6e1c792fa72c0d6&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '36.5989', '-121.89011', 'f6e1c792fa72c0d6', 0, 0, '2012-06-24 09:58:55', 0),
(51, 1, 'Oracle DBA', '38', 'Houston', 'TX', 'US', '', 'Xerox Corporation', '2012-06-23 03:17:29', 'Xerox Corporation is a $22 billion leading global enterprise for business process and document management. Through its broad portfolio of technology and...', 'http://www.indeed.com/viewjob?jk=143719abf2e83ce0&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '29.760988', '-95.36264', '143719abf2e83ce0', 0, 0, '2012-06-24 09:58:55', 0),
(52, 1, 'Data Analyst', '39', 'Notre Dame', 'IN', 'US', '', 'University of Notre Dame', '2012-06-22 05:25:14', 'complicated database, especially client server - Preferred experience with Oracle database, PL/SQL, Business Objects, or other query tools. - Demonstrated...', 'http://www.indeed.com/viewjob?jk=b7acd457a11d5e3b&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '41.692307', '-86.23627', 'b7acd457a11d5e3b', 0, 0, '2012-06-24 09:58:55', 0),
(53, 1, 'Oracle DBA', '40', 'Greenwood Village', 'CO', 'US', '', 'Trizetto', '2012-06-22 09:45:01', 'recovery of Oracle databases. Performing Database refreshes. Upgrading of existing Oracle databases to... Oracle 9i, 10g, and 11g. Experience upgrading Oracle...', 'http://www.indeed.com/viewjob?jk=22de11a5016a5321&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '39.615383', '-104.95055', '22de11a5016a5321', 0, 0, '2012-06-24 09:58:55', 0),
(54, 1, 'Data Analyst', '41', 'Farmington', 'NM', 'US', '', 'ConocoPhillips', '2012-06-22 12:14:00', 'skills including the development of macros using VBA Direct experience with Oracle, SQL server or Access using various data manipulation tools Experience with...', 'http://www.indeed.com/viewjob?jk=ea6313b698d84561&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '36.728024', '-108.21429', 'ea6313b698d84561', 0, 0, '2012-06-24 09:58:55', 0),
(55, 1, 'Data Analyst', '42', 'Los Angeles', 'CA', 'US', '', 'XO Group Inc.', '2012-06-22 11:32:18', 'of data structures and query optimization in an Oracle environment. This position must possess the ability... Experience working with Oracle Databases   2+ Writing...', 'http://www.indeed.com/viewjob?jk=6b08ab09cbf5726f&qd=1fiEaqupQkxIkuETWoMjwiD-_T54Bdsi7sLrkW414qUmUFXHJr-eOnBFvE3-pOVFn9wSiI6nwL78jNirJSfS0x6nojn63AzuMLy1372sZMY&indpubnum=3181266314692699&atk=170e3cpab0g0h72i', '', '34.052197', '-118.24176', '6b08ab09cbf5726f', 0, 0, '2012-06-24 09:58:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');
