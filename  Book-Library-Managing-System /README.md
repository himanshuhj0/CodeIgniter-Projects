- System for managing book library. Add users, books, tracking what books are used and from who.. etc....
- Database Structure:
```SQL
CREATE TABLE `admins` (
  `id` tinyint(3) unsigned NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `books` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `year` int(10) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `available` smallint(5) unsigned NOT NULL,
  `available_now` smallint(5) unsigned NOT NULL,
  `cover` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

CREATE TABLE `used_books` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `book_id` int(11) unsigned NOT NULL,
  `date_give` int(10) unsigned NOT NULL,
  `date_for_back` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `family` varchar(20) NOT NULL,
  `phone_number` int(10) unsigned NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;


ALTER TABLE `used_books`
  ADD CONSTRAINT `used_books_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `used_books_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
```
- Tracking Time:

![alt tag](https://raw.githubusercontent.com/kirilkirkov/Book-Library-Managing-System/master/time_tracking.png)

- Screen:

![alt tag](https://raw.githubusercontent.com/kirilkirkov/Book-Library-Managing-System/master/screen.png)
