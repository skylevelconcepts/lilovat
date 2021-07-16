


USE `skyleve2_lilovat`;



CREATE TABLE IF NOT EXISTS `admin` (
   
  `uniqueid` varchar(100)
    

) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;
INSERT INTO `admin` (`uniqueid`) Values 

('5e9d8f48d7c24');
CREATE TABLE `attempt` (
  `adid` int(11) NOT NULL,
  `id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE IF NOT EXISTS `user` (
  `adid` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `address` text NOT NULL,
    `password` text NOT NULL,
  `email` text NOT NULL,
    `phone` text NOT NULL,
       `education` text NOT NULL,
   
 
  
    PRIMARY KEY (`adid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `products` (
  `adid` int(11) NOT NULL AUTO_INCREMENT, 
  `name` text NOT NULL,
    `image` text NOT NULL,
  `price` text NOT NULL,
    `oldprice` text NOT NULL,
    `category` text NOT NULL,
    `uniqueid` text NOT NULL,
    PRIMARY KEY (`adid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `contact` (
  `adid` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `subject` text NOT NULL,
    `message` text NOT NULL,
    `email` text NOT NULL,
    `phone` text NOT NULL,
    PRIMARY KEY (`adid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `courses` (
  `adid` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
    `uniqueid` text NOT NULL,
  `price` text NOT NULL,
    `teacher` text NOT NULL,
    `category` text NOT NULL,
    `duration` text NOT NULL,
    `hoursperday` text NOT NULL,
    `lectures` text NOT NULL,
    `studentstrained` text NOT NULL,
    `image` text NOT NULL,
    `overview` text NOT NULL,
    `courseproject` text NOT NULL,
    `review` text NOT NULL,
    
    
    PRIMARY KEY (`adid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `instructor` (
  `adid` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `job` text NOT NULL,
    `description` text NOT NULL,
    `courseid` text NOT NULL,
    `facebook` text NOT NULL,
    `instagram` text NOT NULL,
    `twitter` text NOT NULL,
    `image` text NOT NULL,
    PRIMARY KEY (`adid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `curriculum` (
  `adid` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `id` text NOT NULL,
    `description` text NOT NULL,
    `courseid` text NOT NULL,
    PRIMARY KEY (`adid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `cart` (
  `adid` int(11) NOT NULL AUTO_INCREMENT,
  `product` text NOT NULL,
  `price` text NOT NULL,
    `quantity` text NOT NULL,
    `userid` text NOT NULL,
    
    
    PRIMARY KEY (`adid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `transactiondetails` (
  `adid` int(11) NOT NULL AUTO_INCREMENT,
  `product` text NOT NULL,
  `price` text NOT NULL,
    `quantity` text NOT NULL,
    `userid` text NOT NULL,
    `transactionid` text NOT NULL,
    PRIMARY KEY (`adid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `transaction` (
  `adid` int(11) NOT NULL AUTO_INCREMENT,
    `orderno` int(11) NOT NULL,
  `userid` text NOT NULL,
    `total` text NOT NULL,
  `paymentmethod` text NOT NULL,
    `date` text NOT NULL,
    `status` text NOT NULL,
    
    PRIMARY KEY (`adid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `billing` (
  `adid` int(11) NOT NULL AUTO_INCREMENT,

  `userid` text NOT NULL,
    
    `name` text NOT NULL,
`email` text NOT NULL,
`company` text NOT NULL,
`phone` text NOT NULL,
`address` text NOT NULL,
`landmark` text NOT NULL,
`billingemail` text NOT NULL,
    
    PRIMARY KEY (`adid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `courses`(`name`,`price`,`teacher`,`category`,`duration`,`hoursperday`,`lectures`,`studentstrained`,`image`,`overview`,`courseproject`,`review`,`uniqueid`) Values                                                                              
('Online Free Training','','','','','','','','images/course/cu-1.jpg','','','','dkjkjldf12'),
('Solar Free Training','','','','','','','','images/course/cu-2.jpg','','','','dkjkjldf13'),
('Solar Weekday Training','','','','','','','','images/course/cu-3.jpg','','','','dkjkjldf11'),
('Solar Weekend Training','','','','','','','','images/course/cu-4.jpg','','','','dkjkjldf14'),
('Solar Masters Class Training','30000','Engr. Tosin Olofin
','Weekend','5 Days','07','05','250','images/course/cu-5.jpg','','','5','dkjkjldf15'),
('Online Weekend Training','','','','','','','','images/course/cu-6.jpg','','','','dkjkjldf16');


INSERT INTO `products`(`name`,`price`,`oldprice`,`category`,`image`) Values                                                                              
('Solar kits','14000','','','images/b1.jpg'),
('Solar Fenced Light','19,000','','','images/b2.jpg'),
('Solar Charge controller – MPPT','8,500','','','images/b3.jpg'),
('100AH Proton Battery','57,000','59,000','','images/1.jpg'),
('100W Solar Flood Light','54,000','62,000','','images/2.jpg'),
('150W Solar Street Light','56,000','62,000','','images/3.jpg'),
('1 kva Eastman Inverter','49,000','55,000','','images/4.jpg'),
('1kva Eastman Inverter','48,000','54,000','','images/5.jpg'),
('200Ah Gel Battery','125,000','145,000','','images/6.jpg'),
('200AH Inverter Battery','95,000','105,000','','images/7.jpg'),
('200AH Kstar Battery','105,000','115,000','','images/8.jpg'),
('2kva Hybrid Inverter','135,000','160,000','','images/9.jpg'),
('5kva, 48v Inverter','195,000','215,000','','images/10.jpg'),
('300w Quality Mono Panels','45,000','50,000','','images/11.jpg'),
('5kva, 48v Power Inverter Mercury','380,000','420,000','','images/12.jpg'),
('60 Watt Solar Street Light','67,000','72,000','','images/13.jpg'),
('60W Solar Street Light','23,000','27,000','','images/14.jpg'),
('All in One Solar Street Light','21,000','25,000','','images/15.jpg'),
('Mercury Stabilizer','0','','','images/16.jpg'),
('Solar Cooker','25,000','29,000','','images/17.jpg'),
('Super Strong MPPT Solar Charge Controller','77,000','85,000','','images/18.jpg');

