


USE `skyleve2_lilovat`;



CREATE TABLE IF NOT EXISTS `training` (
  `adid` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  
  
  `email` text NOT NULL,
    `phone` text NOT NULL,
    `location` text NOT NULL,
       
   
 
  
    PRIMARY KEY (`adid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;