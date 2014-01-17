-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 01 月 17 日 09:07
-- 服务器版本: 5.5.31
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `raysmond`
--
CREATE DATABASE IF NOT EXISTS `raysmond` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `raysmond`;

-- --------------------------------------------------------

--
-- 表的结构 `rays_counter`
--

CREATE TABLE IF NOT EXISTS `rays_counter` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `daycount` int(11) NOT NULL DEFAULT '0',
  `totalcount` bigint(20) NOT NULL DEFAULT '0',
  `post_pid` int(11) NOT NULL,
  `type_tid` int(11) NOT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cid`),
  KEY `fk_rays_counter_rays_post1_idx` (`post_pid`),
  KEY `fk_rays_counter_rays_type1_idx` (`type_tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `rays_post`
--

CREATE TABLE IF NOT EXISTS `rays_post` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` mediumtext,
  `summary` text,
  `content_type` varchar(45) NOT NULL DEFAULT 'html',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`),
  KEY `fk_rays_post_rays_type_idx` (`type_id`),
  KEY `fk_rays_post_rays_user1_idx` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `rays_post`
--

INSERT INTO `rays_post` (`pid`, `uid`, `type_id`, `title`, `content`, `summary`, `content_type`, `create_time`, `update_time`, `status`) VALUES
(3, 1, 1, 'HelloWorld', '<h2>HelloWorld</h2>\n\n<ul>\n<li>hello</li>\n<li>world</li>\n<li>raysmond</li>\n</ul>\n\n<p>Welcome to <a href="http://raysmond.com">Raysmond</a>.</p>\n', NULL, 'html', '2014-01-01 05:24:25', '2014-01-01 05:24:25', 1),
(4, 1, 1, 'This is a page!', 'This is a page!\r\nHello\r\n* item1\r\n* item2\r\n\r\n[raysmond](http://raysmond.com)\r\n', NULL, 'html', '2014-01-01 05:37:57', '2014-01-01 17:09:36', 1),
(5, 1, 1, 'About Raysmond', 'Hi, I''m Raysmond and my real name is Jiankun Lei (雷建坤). I was born in year 1991 in Guangdong province, China. Now I''m a college student in [Fudan University](http://www.fudan.edu.cn) and my Major is Computer Science and Technology.\r\n\r\nI love Computer Science and I love the Internet which changes our lives significantly. I believe programming can make a better life.\r\n\r\n## The website\r\nThis''s a personal website about my introduction, projects, thoughts, programming, and etc... And this web application is powered by [Rays](https://github.com/Raysmond/Rays) framework (one of my interest project) and the blog sub-site is powered by [Drupal](https://drupal.org) CMS. The website was developed first back to year 2011 and it''s been some versions since then. \r\n', NULL, 'markdown', '2014-01-01 06:13:34', '2014-01-09 18:31:04', 1),
(6, 1, 1, 'Test page', 'test page\r\n\r\n* test1\r\n* test2\r\n\r\n[hello](http://www.baidu.com)', NULL, 'markdown', '2014-01-01 17:10:19', '2014-01-09 12:01:42', 1),
(7, 1, 1, 'Raysmond', 'I''m Raysmond and Jiankun Lei is my real name. I''m an undergraduate in [Fudan Unversity](http://www.fudan.edu.cn), majoring in Computer Science, and expecting graduation in July 2014. I''m going to pursue an master degree in Computer Software and Theory in Fudan Unversity. I''ve been studying and developing programs at Web & Service Computing Laboratory since 2013.<br/>\r\n<div class="mylinks">\r\n    <ul>\r\n        <li><a href="https://github.com/Raysmond">Github</a></li>\r\n        <li><a href="http://raysmond.com/project">Projects</a></li>\r\n        <li><a href="http://raysmond.com/contact">Contact</a></li>\r\n        <li><a href="https://twitter.com/jiankunlei">Twitter</a></li>\r\n        <li><a href="http://weibo.com/leijiankun">Weibo</a></li>\r\n    </ul>\r\n</div>', NULL, 'markdown', '2014-01-03 19:22:24', '2014-01-03 19:38:39', 1),
(8, 1, 1, 'My Projects', 'Most of my projects can be accessed on my Github page [Raysmond](https://github.com/Raysmond).\r\n\r\n## There''re some latest projects\r\n### [Rays](https://github.com/Raysmond/Rays)\r\n* Year: 2013\r\n* It''s a light-weight MVC framework implemented in PHP language. It''s easy and fast.\r\n***\r\n\r\n### [HangzhouMemory](http://www.hangzhoumemory.com)\r\n* Year: 2013\r\n* Website: [http://www.hangzhoumemory.com](http://www.hangzhoumemory.com)\r\n* It''s a website developed based on [Drupal](http://drupal.org). The website is almost totally open and users can contribute content like buildings, persons, historical events and their complex relationships, for example spatial and genetic relationships and etc. \r\n\r\n***\r\n\r\n### [EnWikiIndexing](https://github.com/Raysmond/EnWikiIndexing)\r\n* Year: 2013\r\n* A simple program to create inverted indexes for English Wikipedia dump (XML) using Hadoop. Three types of inverted indexes are supported.   \r\n 1. Normal indexes: TF + DF\r\n 2. Indexes with term weighting: TF + IDF\r\n 3. Positional indexes: TF + DF + positions\r\n \r\n By the way, this''s my final project for Distributed System course 2013 in Fudan University.\r\n\r\n***\r\n### [Rita-Player](https://github.com/Raysmond/Rita-Player)\r\n* Year: 2012\r\n* It''s a MP3 music player implemented in JAVA and it''s my final project for JAVA course 2012.\r\n\r\n***\r\n\r\n### [FDUGroup](https://github.com/Raysmond/FDUGroup)\r\n* Year: 2013\r\n* It''s interest group website project developed by a team and powered by [Rays](https://github.com/Raysmond/Rays). It''s also a my course project for Software Engineering Practice course 2013.\r\n\r\n***\r\n### [RPhoto](https://github.com/Raysmond/RPhoto)\r\n* Year: 2013\r\n* It''s a simple photos management website implemented in JAVA  using Java EE technologies. Besides, it''s my first Java EE project and it''s for learning purpose mainly.\r\n\r\n***\r\n### [xksystem](https://github.com/Raysmond/xksystem)\r\n* Year: 2013\r\n* It''s a JAVA project for Object-Oriented Technology (OOT) course 2013 and the main goal is to implement a college course elective system using OOT(mainly Hibernate).\r\n', NULL, 'markdown', '2014-01-03 21:39:24', '2014-01-09 12:33:02', 1);

-- --------------------------------------------------------

--
-- 表的结构 `rays_post_has_tag`
--

CREATE TABLE IF NOT EXISTS `rays_post_has_tag` (
  `pid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  PRIMARY KEY (`pid`,`tid`),
  KEY `fk_rays_post_has_rays_tag_rays_tag1_idx` (`tid`),
  KEY `fk_rays_post_has_rays_tag_rays_post1_idx` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `rays_tag`
--

CREATE TABLE IF NOT EXISTS `rays_tag` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`tid`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  KEY `fk_rays_tag_rays_tag1_idx` (`pid`),
  KEY `fk_rays_tag_rays_type1_idx` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `rays_type`
--

CREATE TABLE IF NOT EXISTS `rays_type` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`tid`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `rays_type`
--

INSERT INTO `rays_type` (`tid`, `name`) VALUES
(2, 'article'),
(1, 'page');

-- --------------------------------------------------------

--
-- 表的结构 `rays_url_alias`
--

CREATE TABLE IF NOT EXISTS `rays_url_alias` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(255) NOT NULL,
  `alias_url` varchar(255) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `rays_url_alias`
--

INSERT INTO `rays_url_alias` (`aid`, `source`, `alias_url`) VALUES
(2, 'page/view/6', 'test-page'),
(4, 'page/view/15', 'test-page-0'),
(5, 'page/view/14', 'test-page-2014-01-09-20-17-27'),
(6, 'page/view/8', 'projects'),
(7, 'page/view/5', 'about');

-- --------------------------------------------------------

--
-- 表的结构 `rays_user`
--

CREATE TABLE IF NOT EXISTS `rays_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `rays_user`
--

INSERT INTO `rays_user` (`uid`, `role`, `name`, `email`, `password`, `status`, `create_time`, `last_login_time`) VALUES
(1, 'admin', 'Raysmond', 'jiankunlei@126.com', '96e79218965eb72c92a549dd5a330112', 1, '2014-01-01 02:16:18', NULL),
(2, 'authenticated', 'hello', 'hello@126.com', '96e79218965eb72c92a549dd5a330112', 1, '2014-01-01 02:25:49', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `rays_variable`
--

CREATE TABLE IF NOT EXISTS `rays_variable` (
  `name` varchar(255) NOT NULL,
  `value` blob NOT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rays_variable`
--

INSERT INTO `rays_variable` (`name`, `value`) VALUES
('site_configuration', 0x59546f354f6e747a4f6a6b36496e4e7064475666626d46745a534937637a6f344f694a5359586c7a625739755a434937637a6f784d446f6963326c305a56396c6257467062434937637a6f784f446f69616d6c68626d7431626d786c615541784d6a597559323974496a747a4f6a457a4f694a68596d3931644639775957646c58326c6b496a747a4f6a413649694937637a6f784e446f695933567a6447397458334a7664585270626d63694f334d364e7a6b36496d46696233563050584e706447557659574a766458514e436d4e76626e52685933513963326c305a53396a6232353059574e3044517077636d39715a574e30637a317a6158526c4c3342796232706c5933527a445170696247396e50584276633351766157356b5a5867694f334d364d546b36496d5a7962323530583342685a32566661573530636d3966615751694f334d364d546f694e794937637a6f784e446f6963484a76616d566a583342685a325666615751694f334d364d446f69496a747a4f6a45314f694a77636d39715a574e30583342685a325666615751694f334d364d546f694f434937637a6f784d446f696447567a644639725a586c664d534937637a6f794d446f69566d4673645755675a6d39794948526c6333526661325635587a45694f334d364e7a6f6961325635643239795a434937637a6f784d544136496c4a6865584e746232356b4c43424b61574675613356754945786c61537767365a753335627536355a326b4c4344706d37666c7537726c6e61546b754b726b7572726e765a486e71356b7349474e76625842316447567949484e6a61575675593255734948646c5969426b5a585a6c624739776257567564437767634768774c43427159585a684c43426b636e567759577733496a7439),
('site_email', 0x637a6f784f446f69616d6c68626d7431626d786c615541784d6a597559323974496a733d),
('site_name', 0x637a6f344f694a5359586c7a625739755a434937);

--
-- 限制导出的表
--

--
-- 限制表 `rays_counter`
--
ALTER TABLE `rays_counter`
  ADD CONSTRAINT `fk_rays_counter_rays_post1` FOREIGN KEY (`post_pid`) REFERENCES `rays_post` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rays_counter_rays_type1` FOREIGN KEY (`type_tid`) REFERENCES `rays_type` (`tid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `rays_post`
--
ALTER TABLE `rays_post`
  ADD CONSTRAINT `fk_rays_post_rays_type` FOREIGN KEY (`type_id`) REFERENCES `rays_type` (`tid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rays_post_rays_user1` FOREIGN KEY (`uid`) REFERENCES `rays_user` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `rays_post_has_tag`
--
ALTER TABLE `rays_post_has_tag`
  ADD CONSTRAINT `fk_rays_post_has_rays_tag_rays_post1` FOREIGN KEY (`pid`) REFERENCES `rays_post` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rays_post_has_rays_tag_rays_tag1` FOREIGN KEY (`tid`) REFERENCES `rays_tag` (`tid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `rays_tag`
--
ALTER TABLE `rays_tag`
  ADD CONSTRAINT `fk_rays_tag_rays_tag1` FOREIGN KEY (`pid`) REFERENCES `rays_tag` (`tid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rays_tag_rays_type1` FOREIGN KEY (`type_id`) REFERENCES `rays_type` (`tid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
