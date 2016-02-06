CREATE TABLE IF NOT EXISTS `users`(
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `email` varchar(255) NOT NULL UNIQUE,
 `password` varchar(255) NOT NULL,
 `sign_up_date` date NOT NULL,
 `activated` enum('0','1') NOT NULL,
 `g_name` varchar(255) NOT NULL,
 PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

