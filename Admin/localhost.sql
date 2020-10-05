

USE `lilovat`;




CREATE TABLE IF NOT EXISTS `admin` (
   
  `uniqueid` varchar(100)
    

) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;
INSERT INTO `admin` (`uniqueid`) Values 

('5e9d8f48d7c24');
CREATE TABLE `attempt` (
  `adid` int(11) NOT NULL,
  `id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;