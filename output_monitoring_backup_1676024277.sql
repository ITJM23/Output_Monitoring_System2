

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
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4;

INSERT INTO line_output VALUES("2","44","12356578","Employee Name","234234","123123","Day Shift","2022-12-08","13:54:33","1");
INSERT INTO line_output VALUES("2","53","","","","","Night Shift","2022-12-09","07:52:58","1");
INSERT INTO line_output VALUES("2","54","UBA-10 / 134114","A. Serrano","","","Day Shift","2022-12-09","07:53:02","1");
INSERT INTO line_output VALUES("2","55","134114/UBA 10 SS 500","Razell Pelagio","","","Night Shift","2022-12-09","19:28:21","1");
INSERT INTO line_output VALUES("2","56","UBA-10 / 134114","Alfred Serrano","","","Day Shift","2022-12-10","07:06:47","1");
INSERT INTO line_output VALUES("2","57","UBA-10 / 134114","Razell Pelagio","","","Night Shift","2022-12-10","19:27:08","1");
INSERT INTO line_output VALUES("1","58","","","","","Day Shift","2023-01-16","09:19:22","1");
INSERT INTO line_output VALUES("1","59","","","","","Night Shift","2023-02-08","07:30:15","1");
INSERT INTO line_output VALUES("1","60","Lorem Ipsum Dolor","A. Alcabasa","123456789101te1","12345678912","Day Shift","2023-02-08","07:30:19","1");
INSERT INTO line_output VALUES("3","61","Sample text_DS","","123456789101te14","12345678911","Day Shift","2023-02-08","09:51:24","1");
INSERT INTO line_output VALUES("2","62","Sample text_DS3","RAZELLE PELAGIO","123456789101te1","","Day Shift","2023-02-08","10:09:13","1");
INSERT INTO line_output VALUES("1","63","","","","","Night Shift","2023-02-09","07:29:14","1");
INSERT INTO line_output VALUES("1","64","Sample text_DS","Employee Name_DS3","","","Day Shift","2023-02-09","07:30:19","1");
INSERT INTO line_output VALUES("3","65","","","","","Night Shift","2023-02-09","07:31:04","1");
INSERT INTO line_output VALUES("3","66","","","","","Day Shift","2023-02-09","07:32:02","1");
INSERT INTO line_output VALUES("2","67","","","","","Night Shift","2023-02-09","07:32:16","1");
INSERT INTO line_output VALUES("2","68","","","","","Day Shift","2023-02-09","07:32:19","1");
INSERT INTO line_output VALUES("1","72","Sample text_DS3","A. Alcabasa","123456789101te14","123456789123","Day Shift","2023-02-10","10:35:17","1");
INSERT INTO line_output VALUES("1","74","Lorem Ipsum NSS","R.TUBAC","123456789101te14","","Night Shift","2023-02-10","18:14:51","1");



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
) ENGINE=InnoDB AUTO_INCREMENT=292 DEFAULT CHARSET=utf8mb4;

INSERT INTO output_records VALUES("172","77","28","","","91","44","2022-12-08","14:12:27","1");
INSERT INTO output_records VALUES("173","20","28","","","91","44","2022-12-08","14:12:54","1");
INSERT INTO output_records VALUES("174","77","27","","","78","44","2022-12-08","14:13:04","1");
INSERT INTO output_records VALUES("180","5","49","","","10","54","2022-12-09","13:49:49","1");
INSERT INTO output_records VALUES("181","13","50","","","20","54","2022-12-09","13:49:53","1");
INSERT INTO output_records VALUES("182","17","51","","","30","54","2022-12-09","13:49:58","1");
INSERT INTO output_records VALUES("184","30","53","","","40","54","2022-12-09","13:50:13","1");
INSERT INTO output_records VALUES("185","38","30","","","50","54","2022-12-09","13:50:20","1");
INSERT INTO output_records VALUES("186","17","52","","","30","54","2022-12-09","13:50:38","1");
INSERT INTO output_records VALUES("193","51","27","","","60","54","2022-12-09","14:01:35","1");
INSERT INTO output_records VALUES("194","55","28","","","67","54","2022-12-09","14:59:58","1");
INSERT INTO output_records VALUES("195","73","29","","","77","54","2022-12-09","15:57:44","1");
INSERT INTO output_records VALUES("196","80","54","","","87","54","2022-12-09","16:58:31","1");
INSERT INTO output_records VALUES("197","97","6","","","97","54","2022-12-09","17:55:40","1");
INSERT INTO output_records VALUES("198","103","55","","","105","54","2022-12-09","18:10:11","1");
INSERT INTO output_records VALUES("203","3","49","","","10","55","2022-12-09","22:59:48","1");
INSERT INTO output_records VALUES("204","10","50","","","20","55","2022-12-09","23:00:11","1");
INSERT INTO output_records VALUES("205","20","51","","","30","55","2022-12-09","23:00:31","1");
INSERT INTO output_records VALUES("208","20","52","","","30","55","2022-12-09","23:02:38","1");
INSERT INTO output_records VALUES("212","45","30","","","50","55","2022-12-10","00:58:43","1");
INSERT INTO output_records VALUES("213","30","53","","","40","55","2022-12-10","00:58:58","1");
INSERT INTO output_records VALUES("216","57","27","","","60","55","2022-12-10","01:57:10","1");
INSERT INTO output_records VALUES("217","67","28","","","67","55","2022-12-10","02:54:59","1");
INSERT INTO output_records VALUES("218","77","29","","","77","55","2022-12-10","03:55:53","1");
INSERT INTO output_records VALUES("219","87","54","","","87","55","2022-12-10","05:03:43","1");
INSERT INTO output_records VALUES("220","93","6","","","97","55","2022-12-10","06:05:23","1");
INSERT INTO output_records VALUES("221","93","55","","","105","55","2022-12-10","06:29:00","1");
INSERT INTO output_records VALUES("222","0","49","","","10","56","2022-12-10","07:58:46","1");
INSERT INTO output_records VALUES("223","0","49","","","10","57","2022-12-10","19:53:00","1");
INSERT INTO output_records VALUES("224","5","50","","","20","57","2022-12-10","20:57:11","1");
INSERT INTO output_records VALUES("225","16","51","","","30","57","2022-12-10","21:56:21","1");
INSERT INTO output_records VALUES("226","16","52","","","30","57","2022-12-10","22:57:33","1");
INSERT INTO output_records VALUES("227","18","53","","","40","57","2022-12-10","23:51:05","1");
INSERT INTO output_records VALUES("228","28","30","","","50","57","2022-12-11","01:12:45","1");
INSERT INTO output_records VALUES("230","48","28","","","67","57","2022-12-11","03:20:59","1");
INSERT INTO output_records VALUES("237","60","29","","","77","57","2022-12-11","06:08:56","1");
INSERT INTO output_records VALUES("238","60","54","","","87","57","2022-12-11","06:09:13","1");
INSERT INTO output_records VALUES("239","60","6","","","97","57","2022-12-11","06:09:32","1");
INSERT INTO output_records VALUES("240","60","55","","","105","57","2022-12-11","06:09:53","1");
INSERT INTO output_records VALUES("241","38","27","","","60","57","2022-12-11","06:11:12","1");
INSERT INTO output_records VALUES("242","38","10","","","39","58","2023-01-16","09:19:38","1");
INSERT INTO output_records VALUES("243","27","2","","","26","58","2023-01-16","09:19:51","1");
INSERT INTO output_records VALUES("244","15","1","","","13","60","2023-02-08","07:30:46","1");
INSERT INTO output_records VALUES("245","28","2","","","26","60","2023-02-08","09:11:21","1");
INSERT INTO output_records VALUES("249","43","10","Lorem Ipsum Dolor Sit Amet Con Estas Dach Gedach
","","39","60","2023-02-08","09:47:58","1");
INSERT INTO output_records VALUES("250","15","16","","","13","61","2023-02-08","09:58:43","1");
INSERT INTO output_records VALUES("252","38","18","","","39","61","2023-02-08","09:59:01","1");
INSERT INTO output_records VALUES("253","27","17","Lorem Ipsum Dolor Sit Amet Con Estas Dach Gedach","","26","61","2023-02-08","09:59:46","1");
INSERT INTO output_records VALUES("254","17","49","","","10","62","2023-02-08","10:09:48","1");
INSERT INTO output_records VALUES("255","23","50","","","20","62","2023-02-08","10:09:56","1");
INSERT INTO output_records VALUES("256","33","51","Lorem Ipsum Dolor Sit Amet Con Estas
","","30","62","2023-02-08","10:10:13","1");
INSERT INTO output_records VALUES("257","53","3","","","52","60","2023-02-08","10:59:32","1");
INSERT INTO output_records VALUES("258","53","5","","","52","60","2023-02-08","11:59:02","1");
INSERT INTO output_records VALUES("259","67","11","","","65","60","2023-02-08","12:58:57","1");
INSERT INTO output_records VALUES("260","80","9","","","78","60","2023-02-08","13:42:43","1");
INSERT INTO output_records VALUES("261","93","12","","","91","60","2023-02-08","14:35:51","1");
INSERT INTO output_records VALUES("262","103","13","","","101","60","2023-02-08","15:22:38","1");
INSERT INTO output_records VALUES("263","114","14","Late Input
","","114","60","2023-02-08","17:15:00","1");
INSERT INTO output_records VALUES("264","17","1","","","13","64","2023-02-09","07:30:36","1");
INSERT INTO output_records VALUES("265","28","2","","","26","64","2023-02-09","11:18:49","1");
INSERT INTO output_records VALUES("266","42","10","Addtnl note","","39","64","2023-02-09","11:19:19","1");
INSERT INTO output_records VALUES("267","53","3","","","52","64","2023-02-09","11:19:37","1");
INSERT INTO output_records VALUES("268","53","5","","","52","64","2023-02-09","11:19:44","1");
INSERT INTO output_records VALUES("269","68","11","","","65","64","2023-02-09","13:00:37","1");
INSERT INTO output_records VALUES("270","80","9","","","78","64","2023-02-09","13:11:53","1");
INSERT INTO output_records VALUES("271","93","12","Middle Input","","91","64","2023-02-09","14:34:41","1");
INSERT INTO output_records VALUES("272","15","2","","","26","70","2023-02-10","08:14:16","1");
INSERT INTO output_records VALUES("273","15","1","","","13","70","2023-02-10","08:14:33","1");
INSERT INTO output_records VALUES("274","12","2","","","26","70","2023-02-10","08:14:57","1");
INSERT INTO output_records VALUES("275","43","10","","","39","70","2023-02-10","10:32:52","1");
INSERT INTO output_records VALUES("276","55","3","","","52","70","2023-02-10","10:33:10","1");
INSERT INTO output_records VALUES("277","17","1","","","13","72","2023-02-10","10:35:41","1");
INSERT INTO output_records VALUES("278","28","2","","","26","72","2023-02-10","10:37:09","1");
INSERT INTO output_records VALUES("281","43","10","Lorem Ipsum / Dolor Sit Amet, Con Estas","","39","72","2023-02-10","15:44:50","1");
INSERT INTO output_records VALUES("282","53","3","","","52","72","2023-02-10","16:35:31","1");
INSERT INTO output_records VALUES("283","53","5","","","52","72","2023-02-10","16:35:36","1");
INSERT INTO output_records VALUES("284","65","11","","","65","72","2023-02-10","16:38:06","1");
INSERT INTO output_records VALUES("285","78","9","","","78","72","2023-02-10","16:38:15","1");
INSERT INTO output_records VALUES("286","93","12","","","91","72","2023-02-10","16:38:25","1");
INSERT INTO output_records VALUES("287","103","13","","","101","72","2023-02-10","16:38:36","1");
INSERT INTO output_records VALUES("288","120","14","","","114","72","2023-02-10","16:38:56","1");
INSERT INTO output_records VALUES("289","127","7","Transition to new model","","125","72","2023-02-10","17:10:48","1");
INSERT INTO output_records VALUES("291","143","15","UBA Pro = 44/50

Total = 70","","140","72","2023-02-10","18:07:14","1");



CREATE TABLE `prod_lines` (
  `Line_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Line_name` int(11) NOT NULL,
  `Password` text NOT NULL,
  `Date_added` date NOT NULL,
  `Time_added` time NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`Line_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO prod_lines VALUES("1","3","$2y$12$YAmEgOzI7XnLssKKhyfRD.V.WvWRcABOGmdX.3Q5A1Z59Doe73wrm","2022-11-10","17:18:42","1");
INSERT INTO prod_lines VALUES("2","1","$2y$12$to6YQYKjUg21UUiAVSu0Y.EOHNf8BeLfZVh4C8zk7isXuhBeU3y/K","2022-11-10","17:27:32","1");
INSERT INTO prod_lines VALUES("3","2","$2y$12$HXHS35HqlHQK.yqrB9ZjD.raMzWAUbMYQEx4vga2g0UNFmyts1WD2","2022-11-10","17:31:13","1");
INSERT INTO prod_lines VALUES("4","4","$2y$12$l6gJg2iGROuRtm5kOI5AEeDkVjjkwX73UElg9ffPNHP/6NSXkZHTS","2022-11-11","08:55:15","1");
INSERT INTO prod_lines VALUES("5","5","$2y$12$TXKKAKxzQ1FSRLouaUKCxuZ.9nc5FWIkiPNxIEFfvJAR8VZeIS03.","2022-11-11","08:55:39","1");
INSERT INTO prod_lines VALUES("6","6","$2y$12$0Hh1dLmL97WHxIJ64wYt2uMuHh12kx7XeawPWe1b96UYhgIe0qOIq","2022-11-11","08:55:51","1");
INSERT INTO prod_lines VALUES("7","7","$2y$12$zqUS9uRCQKLuVDuqz41WU.kOQ3JSoN1Dsk6g6ajpm7IaRN0OyMaCW","2022-11-11","08:56:04","1");
INSERT INTO prod_lines VALUES("8","8","$2y$12$1tJdN5KlIIfLF8og0bAFg.McngcJFGr8s9gluRPBti.GQTJCWhG.q","2022-11-11","08:56:21","1");
INSERT INTO prod_lines VALUES("10","9","$2y$12$enwtUjVG9QaecKGn0UEFIO2QQ.9KY1/mvaeisWNc2ByUuY3rHn/qa","2022-11-15","13:35:59","1");
INSERT INTO prod_lines VALUES("11","10","$2y$12$cJf7RLHTXe7/iirfP8IPGO1DRJD7DZ0Ajd/OP4suzvyow/4Mam0We","2022-11-29","14:24:48","1");



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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;

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
INSERT INTO time_targets VALUES("31","4","9","78","0","2022-11-23","14:16:10","1");
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

INSERT INTO users VALUES("1","$2y$12$P5ll8.Ix9C0mSUAr.kooh.E7QeLQUA3Zh/Ub3Fw8oMxsoAiXCeGjS","Administrator","1","2022-11-23","15:28:13","1");

