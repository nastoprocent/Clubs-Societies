CREATE DATABASE clubsandsocs;
USE clubsandsocs;

CREATE TABLE users(
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO users (userID, userName, userEmail, userPass) VALUES (1, 'Admin', 'admin@student.ncirl.ie', 'administraction');

CREATE TABLE Search(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `description` TEXT NOT NULL,
  `url` TEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO Search( id, title, description, url)
VALUES 
(1, 'Basketball', 'Welcome to our basketball Club!!', 'basketball.php'), 
(2, 'Pool', 'Come and join our Pool Club', 'pool.php'), 
(3, 'Gaming', 'Passion in Gaming? Come and join US!', 'gaming.php'), 
(4, 'Music', 'Share with us your favourite Music! Lets hear it!', 'music.php'),
(5, 'Anime', 'Learn Japanese with us', 'Anime.php'),
(6, 'NetSoc', 'Come build your network here!', 'netSoc.php');

CREATE TABLE `details` (
 `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , 
 `name` VARCHAR(30) NOT NULL ,
 `email` VARCHAR(30) NOT NULL ,
 `phone` INT(15) NOT NULL ,
 `society` VARCHAR(15) NOT NULL ,
 `dateofbirth` DATE NOT NULL 
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `events` (
`id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Block'
) 
ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `events` (`id`, `title`, `date`, `created`, `modified`, `status`) VALUES
(1, 'Music Society: Music Soc Band Auditions', '2016-12-10', '2016-12-09 06:15:17', '2016-12-09 06:15:17', 1),
(2, 'Music Society: The Quays Music Video Debut!', '2016-12-15', '2016-12-09 06:15:17', '2016-12-09 06:15:17', 1),
(3, 'Music Society: NCIs Got Talent First Round Auditions', '2016-12-18', '2016-12-09 06:15:17', '2016-12-09 06:15:17', 1),
(4, 'Music Society: SEMI FINALS of NCIs Got Talent!', '2016-12-22', '2016-12-09 06:15:17', '2016-12-09 06:15:17', 1),
(5, 'Gaming Society: Fifa Tournament Konckout', '2016-12-25', '2016-12-09 06:15:17', '2016-12-09 06:15:17', 1),
(6, 'Gaming Society: G-Series7', '2016-12-9', '2016-12-09 06:15:17', '2016-12-09 06:15:17', 1),
(7, 'Gaming Society: COD & FIFA WC Tournament', '2016-12-2', '2016-12-09 06:15:17', '2016-12-09 06:15:17', 1),
(8, 'Basketball Club: Varsities ', '2016-12-07', '2016-12-09 06:15:17', '2016-12-09 06:15:17', 1),
(9, 'Basketball Club: Nci 37- ITT 37', '2016-12-07', '2016-12-09 06:15:17', '2016-12-09 06:15:17', 1);

ALTER TABLE `events`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `events`
MODIFY `id` int (11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;

CREATE TABLE`shoutboxgaming` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

CREATE TABLE `shoutboxpool` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

CREATE TABLE`shoutboxmusic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

CREATE TABLE `shoutboxbasketball` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

CREATE TABLE `contact`(
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` VARCHAR(20) NOT NULL,
`email` VARCHAR(30) NOT NULL,
`phone` INT(15) NOT NULL,
`comment` VARCHAR(200) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM;