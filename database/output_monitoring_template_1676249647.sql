

CREATE TABLE `line_output` (
  `Line_Id` int(11) NOT NULL,
  `Line_Output_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Model_code` varchar(255) NOT NULL,
  `Sub_leader` varchar(255) NOT NULL,
  `Start_serial` varchar(255) NOT NULL,
  `End_serial` varchar(255) NOT NULL,
  `Shift` varchar(255) NOT NULL,
  `Date_added` date NOT NULL,
  `Time_added` time NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`Line_Output_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `output_records` (
  `Rec_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Output_count` int(11) NOT NULL,
  `Time_Target_ID` int(11) NOT NULL,
  `Description` text NOT NULL,
  `PIC` varchar(255) NOT NULL,
  `Target_val` int(11) NOT NULL,
  `Line_Output_Id` int(11) NOT NULL,
  `Date_added` date NOT NULL,
  `Time_added` time NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`Rec_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=303 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `prod_lines` (
  `Line_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Line_name` int(11) NOT NULL,
  `Password` text NOT NULL,
  `Date_added` date NOT NULL,
  `Time_added` time NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`Line_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO prod_lines VALUES("1","3","$2y$12$YAmEgOzI7XnLssKKhyfRD.V.WvWRcABOGmdX.3Q5A1Z59Doe73wrm","2022-11-10","17:18:42","1");
INSERT INTO prod_lines VALUES("2","1","$2y$12$to6YQYKjUg21UUiAVSu0Y.EOHNf8BeLfZVh4C8zk7isXuhBeU3y/K","2022-11-10","17:27:32","1");
INSERT INTO prod_lines VALUES("3","2","$2y$12$HXHS35HqlHQK.yqrB9ZjD.raMzWAUbMYQEx4vga2g0UNFmyts1WD2","2022-11-10","17:31:13","1");
INSERT INTO prod_lines VALUES("4","4","$2y$12$l6gJg2iGROuRtm5kOI5AEeDkVjjkwX73UElg9ffPNHP/6NSXkZHTS","2022-11-11","08:55:15","1");
INSERT INTO prod_lines VALUES("5","5","$2y$12$TXKKAKxzQ1FSRLouaUKCxuZ.9nc5FWIkiPNxIEFfvJAR8VZeIS03.","2022-11-11","08:55:39","1");
INSERT INTO prod_lines VALUES("6","6","$2y$12$0Hh1dLmL97WHxIJ64wYt2uMuHh12kx7XeawPWe1b96UYhgIe0qOIq","2022-11-11","08:55:51","1");
INSERT INTO prod_lines VALUES("7","7","$2y$12$zqUS9uRCQKLuVDuqz41WU.kOQ3JSoN1Dsk6g6ajpm7IaRN0OyMaCW","2022-11-11","08:56:04","1");
INSERT INTO prod_lines VALUES("8","8","$2y$12$1tJdN5KlIIfLF8og0bAFg.McngcJFGr8s9gluRPBti.GQTJCWhG.q","2022-11-11","08:56:21","1");
INSERT INTO prod_lines VALUES("10","9","$2y$12$enwtUjVG9QaecKGn0UEFIO2QQ.9KY1/mvaeisWNc2ByUuY3rHn/qa","2022-11-15","13:35:59","1");
INSERT INTO prod_lines VALUES("11","11","$2y$12$kO4flBs7nQ4Gb5B4fd8Pduap9gEL1gUB/3QNxy2ygyBA.zLc40GiG","2022-11-29","14:24:48","1");
INSERT INTO prod_lines VALUES("12","11","$2y$12$uTXYewPft7Vc95lw6UNShu77n0/cTxGdWVVnSLGI3vhq9nkgamx42","2023-02-13","08:49:47","0");



CREATE TABLE `time_table` (
  `Time_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Time_val` varchar(255) NOT NULL,
  `Time_val2` time NOT NULL,
  `Time_val3` time NOT NULL,
  `Date_added` date NOT NULL,
  `Time_added` time NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`Time_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

INSERT INTO time_table VALUES("1","10:00 - 11:00","10:00:00","22:00:00","2022-11-10","14:08:14","1");
INSERT INTO time_table VALUES("3","08:00 - 09:00","08:00:00","20:00:00","2022-11-10","14:34:28","1");
INSERT INTO time_table VALUES("4","07:00 - 08:00","07:00:00","19:00:00","2022-11-10","14:34:58","1");
INSERT INTO time_table VALUES("5","11:00 - 12:00","11:00:00","23:00:00","2022-11-10","14:43:04","1");
INSERT INTO time_table VALUES("6","12:00 - 13:00","12:00:00","00:00:00","2022-11-15","16:12:04","1");
INSERT INTO time_table VALUES("7","17:00 - 18:00","17:00:00","05:00:00","2022-11-15","17:09:36","1");
INSERT INTO time_table VALUES("8","13:00 - 14:00","13:00:00","01:00:00","2022-11-16","13:01:34","1");
INSERT INTO time_table VALUES("9","14:00 - 15:00","14:00:00","02:00:00","2022-11-16","13:18:04","1");
INSERT INTO time_table VALUES("10","15:00 - 16:00","15:00:00","03:00:00","2022-11-16","13:19:09","1");
INSERT INTO time_table VALUES("11","16:00 - 17:00","16:00:00","04:00:00","2022-11-16","13:19:21","1");
INSERT INTO time_table VALUES("27","18:00 - 19:00","18:00:00","06:00:00","2022-11-16","13:58:09","1");
INSERT INTO time_table VALUES("41","09:00 - 10:00","09:00:00","21:00:00","2022-11-16","17:34:36","1");



CREATE TABLE `time_targets` (
  `Time_Target_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Line_Id` int(11) NOT NULL,
  `Time_Id` int(11) NOT NULL,
  `Target_val` varchar(255) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Date_added` date NOT NULL,
  `Time_added` time NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`Time_Target_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;

INSERT INTO time_targets VALUES("1","1","4","13","0","2022-11-11","16:10:13","1");
INSERT INTO time_targets VALUES("2","1","3","26","0","2022-11-11","16:13:12","1");
INSERT INTO time_targets VALUES("3","1","1","52","0","2022-11-11","18:09:28","1");
INSERT INTO time_targets VALUES("4","1","2","49","0","2022-11-11","18:09:40","0");
INSERT INTO time_targets VALUES("5","1","5","52","0","2022-11-15","13:35:20","1");
INSERT INTO time_targets VALUES("6","2","7","97","0","2022-11-15","17:10:12","1");
INSERT INTO time_targets VALUES("7","1","7","125","0","2022-11-15","17:22:45","1");
INSERT INTO time_targets VALUES("8","3","5","52","0","2022-11-16","11:01:17","1");
INSERT INTO time_targets VALUES("9","1","8","78","0","2022-11-16","13:01:48","1");
INSERT INTO time_targets VALUES("10","1","41","39","0","2022-11-23","08:02:40","1");
INSERT INTO time_targets VALUES("11","1","6","65","0","2022-11-23","08:02:52","1");
INSERT INTO time_targets VALUES("12","1","9","91","0","2022-11-23","08:03:03","1");
INSERT INTO time_targets VALUES("13","1","10","101","0","2022-11-23","08:03:12","1");
INSERT INTO time_targets VALUES("14","1","11","114","0","2022-11-23","08:03:20","1");
INSERT INTO time_targets VALUES("15","1","27","140","0","2022-11-23","08:03:27","1");
INSERT INTO time_targets VALUES("16","3","4","13","0","2022-11-23","13:56:04","1");
INSERT INTO time_targets VALUES("17","3","3","26","0","2022-11-23","13:56:08","1");
INSERT INTO time_targets VALUES("18","3","41","39","0","2022-11-23","13:56:13","1");
INSERT INTO time_targets VALUES("19","3","1","52","0","2022-11-23","13:56:19","1");
INSERT INTO time_targets VALUES("20","3","6","65","0","2022-11-23","13:56:34","1");
INSERT INTO time_targets VALUES("21","3","8","78","0","2022-11-23","13:56:38","1");
INSERT INTO time_targets VALUES("22","3","9","91","0","2022-11-23","13:56:47","1");
INSERT INTO time_targets VALUES("23","3","10","101","0","2022-11-23","13:56:51","1");
INSERT INTO time_targets VALUES("24","3","11","114","0","2022-11-23","13:56:56","1");
INSERT INTO time_targets VALUES("25","3","7","127","0","2022-11-23","13:57:03","1");
INSERT INTO time_targets VALUES("26","3","27","140","0","2022-11-23","13:57:09","1");
INSERT INTO time_targets VALUES("27","2","8","60","0","2022-11-23","13:57:51","1");
INSERT INTO time_targets VALUES("28","2","9","67","0","2022-11-23","13:58:22","1");
INSERT INTO time_targets VALUES("29","2","10","77","0","2022-11-23","14:10:20","1");
INSERT INTO time_targets VALUES("30","2","6","50","0","2022-11-23","14:10:31","1");
INSERT INTO time_targets VALUES("31","4","9","91","0","2022-11-23","14:16:10","1");
INSERT INTO time_targets VALUES("32","7","9","96","0","2022-11-23","14:23:14","1");
INSERT INTO time_targets VALUES("33","5","4","13","0","2022-11-29","08:10:01","1");
INSERT INTO time_targets VALUES("34","5","3","26","0","2022-11-29","08:10:07","1");
INSERT INTO time_targets VALUES("35","5","41","39","0","2022-11-29","08:10:13","1");
INSERT INTO time_targets VALUES("36","5","1","52","0","2022-11-29","08:10:19","1");
INSERT INTO time_targets VALUES("37","5","5","52","0","2022-11-29","08:10:24","1");
INSERT INTO time_targets VALUES("38","5","6","65","0","2022-11-29","08:10:29","1");
INSERT INTO time_targets VALUES("39","5","8","78","0","2022-11-29","08:10:34","1");
INSERT INTO time_targets VALUES("40","5","9","91","0","2022-11-29","08:10:40","1");
INSERT INTO time_targets VALUES("41","5","10","101","0","2022-11-29","08:10:45","1");
INSERT INTO time_targets VALUES("42","5","11","114","0","2022-11-29","08:10:52","1");
INSERT INTO time_targets VALUES("43","5","7","127","0","2022-11-29","08:10:59","1");
INSERT INTO time_targets VALUES("44","5","27","140","0","2022-11-29","08:11:07","1");
INSERT INTO time_targets VALUES("45","11","4","13","0","2022-11-29","14:25:12","1");
INSERT INTO time_targets VALUES("46","11","3","26","0","2022-11-29","14:25:20","1");
INSERT INTO time_targets VALUES("47","11","9","91","0","2022-11-29","14:27:16","1");
INSERT INTO time_targets VALUES("48","11","10","101","0","2022-11-29","14:27:22","1");
INSERT INTO time_targets VALUES("49","2","4","10","0","2022-12-08","14:10:44","1");
INSERT INTO time_targets VALUES("50","2","3","20","0","2022-12-08","14:10:51","1");
INSERT INTO time_targets VALUES("51","2","41","30","0","2022-12-08","14:11:13","1");
INSERT INTO time_targets VALUES("52","2","1","30","0","2022-12-08","14:11:18","1");
INSERT INTO time_targets VALUES("53","2","5","40","0","2022-12-08","14:11:28","1");
INSERT INTO time_targets VALUES("54","2","11","87","0","2022-12-08","14:11:37","1");
INSERT INTO time_targets VALUES("55","2","27","105","0","2022-12-08","14:11:44","1");
INSERT INTO time_targets VALUES("56","4","4","13","0","2023-02-11","12:50:17","1");
INSERT INTO time_targets VALUES("57","4","3","26","0","2023-02-11","12:50:23","1");
INSERT INTO time_targets VALUES("58","4","41","39","0","2023-02-11","12:50:33","1");
INSERT INTO time_targets VALUES("59","4","1","52","0","2023-02-11","12:50:39","1");
INSERT INTO time_targets VALUES("60","4","5","52","0","2023-02-11","12:50:49","1");
INSERT INTO time_targets VALUES("61","4","6","65","0","2023-02-11","12:50:57","1");
INSERT INTO time_targets VALUES("62","4","8","78","0","2023-02-11","12:51:14","1");
INSERT INTO time_targets VALUES("63","4","10","101","0","2023-02-11","12:51:26","1");
INSERT INTO time_targets VALUES("64","4","11","114","0","2023-02-11","12:51:33","1");
INSERT INTO time_targets VALUES("65","4","7","127","0","2023-02-11","12:51:40","1");
INSERT INTO time_targets VALUES("66","4","27","140","0","2023-02-11","12:51:48","1");



CREATE TABLE `user_level` (
  `User_lvl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_level` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`User_lvl_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO user_level VALUES("1","Administrator","1");



CREATE TABLE `users` (
  `User_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Password` text NOT NULL,
  `Username` varchar(255) NOT NULL,
  `User_lvl_Id` int(11) NOT NULL,
  `Date_added` date NOT NULL,
  `Time_added` time NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`User_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("1","$2y$12$uTXYewPft7Vc95lw6UNShu77n0/cTxGdWVVnSLGI3vhq9nkgamx42","Administrator","1","2022-11-23","15:28:13","1");

