

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

INSERT INTO line_output VALUES("1","1","Lorem Ipsum","","","","Day Shift","2022-11-14","14:16:30","1");
INSERT INTO line_output VALUES("1","2","Sample text","Employee Name","12345678910","12345678911","Night Shift","2022-11-15","14:21:51","1");
INSERT INTO line_output VALUES("3","3","Lorem Ipsum","Employee Name","12435678910","12345678912","Night Shift","2022-11-14","14:23:10","1");
INSERT INTO line_output VALUES("3","5","Sample text_DS3","Employee Name_DS3","123456789101te13","123456789123","Day Shift","2022-11-16","11:00:34","1");
INSERT INTO line_output VALUES("1","6","","","","","Night Shift","2022-11-17","07:14:47","1");
INSERT INTO line_output VALUES("1","7","Sample text_DS4","Employee Name_DS4","123456789101te14","123456789124","Day Shift","2022-11-17","07:14:49","1");
INSERT INTO line_output VALUES("1","8","","","","","Night Shift","2022-11-23","07:11:08","1");
INSERT INTO line_output VALUES("1","9","Lorem Ipsum Dolor5","Employee Name_DS5","123456789101te15","123456789125","Day Shift","2022-11-23","07:11:10","1");
INSERT INTO line_output VALUES("2","14","Lorem Ipsum Dolor1","Employee Name_DS1","123456789101te11","123456789121","Day Shift","2022-11-23","14:20:00","1");
INSERT INTO line_output VALUES("7","15","","","","","Day Shift","2022-11-23","14:22:54","1");
INSERT INTO line_output VALUES("1","16","","","","","Night Shift","2022-11-24","07:09:55","1");
INSERT INTO line_output VALUES("1","17","Lorem Ipsum Dolor7","Employee Name_DS7","123456789101te7","123456789127","Day Shift","2022-11-24","07:09:59","1");
INSERT INTO line_output VALUES("1","18","","","","","Night Shift","2022-11-24","18:24:41","1");
INSERT INTO line_output VALUES("1","19","","","","","Day Shift","2022-11-25","07:12:19","1");
INSERT INTO line_output VALUES("1","20","","","","","Night Shift","2022-11-25","07:28:30","1");
INSERT INTO line_output VALUES("1","21","Sample text_DS8","Employee Name_DS8","123456789101te8","123456789128","Day Shift","2022-11-25","07:28:33","1");
INSERT INTO line_output VALUES("1","24","","","","","Night Shift","2022-11-28","07:25:32","1");
INSERT INTO line_output VALUES("1","25","Sample text_DS9","Employee Name_DS9","123456789101te19","1234567891279","Day Shift","2022-11-28","07:25:36","1");
INSERT INTO line_output VALUES("3","26","","","","","Night Shift","2022-11-28","18:03:41","1");
INSERT INTO line_output VALUES("3","27","Lorem Ipsum Dolor","Employee Name_DS","123456789101te13","12345678912","Day Shift","2022-11-28","18:03:48","1");
INSERT INTO line_output VALUES("1","28","","","","","Night Shift","2022-11-29","07:10:02","1");
INSERT INTO line_output VALUES("1","29","Sample text_DS10kj","Employee Name_DS12kj","123456789101te110khfd","12345678912087","Day Shift","2022-11-29","07:10:05","1");
INSERT INTO line_output VALUES("3","30","","","","","Night Shift","2022-11-29","07:10:35","1");
INSERT INTO line_output VALUES("3","31","","","","","Day Shift","2022-11-29","07:10:38","1");
INSERT INTO line_output VALUES("5","32","Lorem Ipsum N5SS","Employee NameLine5","123456789101te15","1234567891235","Day Shift","2022-11-29","08:08:57","1");
INSERT INTO line_output VALUES("11","33","Lorem Ipsum NSS","Employee Name","123456789101te13","12345678911","Day Shift","2022-11-29","14:26:19","1");
INSERT INTO line_output VALUES("1","35","","","","","Night Shift","2022-11-30","14:47:40","1");
INSERT INTO line_output VALUES("1","36","Lorem Ipsum Dolor14","Employee Name14","123456789101te114","14","Day Shift","2022-11-30","14:47:43","1");
INSERT INTO line_output VALUES("1","37","","","","","Night Shift","2022-12-01","07:24:55","1");
INSERT INTO line_output VALUES("1","38","Sample text","Employee Name_DS","123456789101te15","12345678911","Day Shift","2022-12-01","07:24:57","1");
INSERT INTO line_output VALUES("1","39","","","","","Night Shift","2022-12-02","14:16:53","1");
INSERT INTO line_output VALUES("1","40","","","","","Day Shift","2022-12-02","14:16:56","1");



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
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8mb4;

INSERT INTO output_records VALUES("1","123","3","","","0","2","2022-11-15","17:10:29","1");
INSERT INTO output_records VALUES("13","15","8","","","45","5","2022-11-16","11:21:56","1");
INSERT INTO output_records VALUES("14","10","8","","","45","5","2022-11-16","11:23:04","1");
INSERT INTO output_records VALUES("17","5","5","","","52","4","2022-11-16","11:42:03","1");
INSERT INTO output_records VALUES("18","10","5","","","52","4","2022-11-16","11:42:10","1");
INSERT INTO output_records VALUES("19","20","5","","","52","4","2022-11-16","11:44:57","1");
INSERT INTO output_records VALUES("20","17","5","","","52","4","2022-11-16","11:46:50","1");
INSERT INTO output_records VALUES("21","60","9","","","64","4","2022-11-16","13:01:53","1");
INSERT INTO output_records VALUES("22","4","9","","","64","4","2022-11-16","13:06:57","1");
INSERT INTO output_records VALUES("23","10","1","","","33","7","2022-11-17","07:15:35","1");
INSERT INTO output_records VALUES("28","10","1","","","33","7","2022-11-17","07:18:14","1");
INSERT INTO output_records VALUES("29","10","1","","","33","7","2022-11-17","07:24:10","1");
INSERT INTO output_records VALUES("30","10","1","","","33","9","2022-11-23","07:12:41","1");
INSERT INTO output_records VALUES("31","15","1","","","33","9","2022-11-23","07:41:30","1");
INSERT INTO output_records VALUES("34","23","2","","","52","9","2022-11-23","08:36:52","1");
INSERT INTO output_records VALUES("35","23","10","","","30","9","2022-11-23","09:10:46","1");
INSERT INTO output_records VALUES("36","7","10","","","30","9","2022-11-23","09:38:47","1");
INSERT INTO output_records VALUES("37","10","10","","","39","9","2022-11-23","09:52:09","1");
INSERT INTO output_records VALUES("38","30","3","","","52","9","2022-11-23","10:22:47","1");
INSERT INTO output_records VALUES("39","10","3","","","52","9","2022-11-23","10:31:00","1");
INSERT INTO output_records VALUES("40","12","3","","","52","9","2022-11-23","10:40:40","1");
INSERT INTO output_records VALUES("41","10","5","","","52","9","2022-11-23","11:01:46","1");
INSERT INTO output_records VALUES("42","30","5","","","52","9","2022-11-23","11:14:45","1");
INSERT INTO output_records VALUES("43","12","5","","","52","9","2022-11-23","11:20:11","1");
INSERT INTO output_records VALUES("45","68","9","","","78","9","2022-11-23","13:03:42","1");
INSERT INTO output_records VALUES("46","10","9","","","78","9","2022-11-23","13:34:32","1");
INSERT INTO output_records VALUES("48","85","12","","","91","9","2022-11-23","14:14:12","1");
INSERT INTO output_records VALUES("50","69","28","","","91","14","2022-11-23","14:20:14","1");
INSERT INTO output_records VALUES("51","21","28","","","91","14","2022-11-23","14:20:28","1");
INSERT INTO output_records VALUES("52","88","32","","","96","15","2022-11-23","14:23:22","1");
INSERT INTO output_records VALUES("53","1","28","","","91","14","2022-11-23","14:35:38","1");
INSERT INTO output_records VALUES("54","6","12","","","91","9","2022-11-23","14:48:02","1");
INSERT INTO output_records VALUES("55","100","13","","","101","9","2022-11-23","15:04:50","1");
INSERT INTO output_records VALUES("56","1","13","","","101","9","2022-11-23","15:31:29","1");
INSERT INTO output_records VALUES("57","100","14","","","114","9","2022-11-23","16:02:54","1");
INSERT INTO output_records VALUES("58","14","14","","","114","9","2022-11-23","16:34:10","1");
INSERT INTO output_records VALUES("60","125","7","","","125","9","2022-11-23","17:33:40","1");
INSERT INTO output_records VALUES("61","3","7","","","125","9","2022-11-23","17:47:24","1");
INSERT INTO output_records VALUES("62","100","15","","","140","9","2022-11-23","18:00:52","1");
INSERT INTO output_records VALUES("63","20","15","","","140","9","2022-11-23","18:11:18","1");
INSERT INTO output_records VALUES("64","20","15","","","140","9","2022-11-23","18:18:38","1");
INSERT INTO output_records VALUES("65","7","1","","","13","17","2022-11-24","07:11:56","1");
INSERT INTO output_records VALUES("66","3","1","","","13","17","2022-11-24","07:13:50","1");
INSERT INTO output_records VALUES("67","16","2","","","26","17","2022-11-24","08:09:38","1");
INSERT INTO output_records VALUES("68","5","2","","","26","17","2022-11-24","08:28:42","1");
INSERT INTO output_records VALUES("69","35","10","","","39","17","2022-11-24","09:28:33","1");
INSERT INTO output_records VALUES("70","75","12","","","91","17","2022-11-24","14:01:20","1");
INSERT INTO output_records VALUES("71","14","12","","","91","17","2022-11-24","14:07:36","1");
INSERT INTO output_records VALUES("72","99","14","","","114","17","2022-11-24","16:07:12","1");
INSERT INTO output_records VALUES("73","10","14","","","114","17","2022-11-24","16:14:22","1");
INSERT INTO output_records VALUES("74","3","14","","","114","17","2022-11-24","16:42:49","1");
INSERT INTO output_records VALUES("77","120","7","","","125","17","2022-11-24","17:00:55","1");
INSERT INTO output_records VALUES("78","99","13","","","101","17","2022-11-24","17:07:05","1");
INSERT INTO output_records VALUES("79","3","7","","","125","17","2022-11-24","17:07:30","1");
INSERT INTO output_records VALUES("80","50","3","","","52","17","2022-11-24","17:08:09","1");
INSERT INTO output_records VALUES("81","50","5","","","52","17","2022-11-24","17:08:28","1");
INSERT INTO output_records VALUES("82","63","11","","","65","17","2022-11-24","17:08:37","1");
INSERT INTO output_records VALUES("83","75","9","","","78","17","2022-11-24","17:08:46","1");
INSERT INTO output_records VALUES("84","2","9","","","78","17","2022-11-24","17:22:44","1");
INSERT INTO output_records VALUES("85","138","15","","","140","17","2022-11-24","18:12:09","1");
INSERT INTO output_records VALUES("86","10","1","","","13","21","2022-11-25","07:28:57","1");
INSERT INTO output_records VALUES("88","23","2","","","26","21","2022-11-25","08:20:52","1");
INSERT INTO output_records VALUES("89","1","2","","","26","21","2022-11-25","08:37:16","1");
INSERT INTO output_records VALUES("90","1","1","","","13","21","2022-11-25","08:37:29","1");
INSERT INTO output_records VALUES("91","36","10","","","39","21","2022-11-25","09:06:58","1");
INSERT INTO output_records VALUES("93","75","9","","","78","21","2022-11-25","13:08:38","1");
INSERT INTO output_records VALUES("94","1","9","","","78","21","2022-11-25","13:09:25","1");
INSERT INTO output_records VALUES("95","48","3","","","52","21","2022-11-25","13:26:31","1");
INSERT INTO output_records VALUES("97","48","5","","","52","21","2022-11-25","13:27:23","1");
INSERT INTO output_records VALUES("98","63","11","","","65","21","2022-11-25","13:27:55","1");
INSERT INTO output_records VALUES("105","88","12","","","91","21","2022-11-25","14:33:41","1");
INSERT INTO output_records VALUES("106","10","1","","","13","25","2022-11-28","07:26:47","1");
INSERT INTO output_records VALUES("107","2","1","","","13","25","2022-11-28","07:42:16","1");
INSERT INTO output_records VALUES("108","23","2","","","26","25","2022-11-28","08:30:44","1");
INSERT INTO output_records VALUES("109","38","10","","","39","25","2022-11-28","09:32:53","1");
INSERT INTO output_records VALUES("110","50","3","","","52","25","2022-11-28","10:22:27","1");
INSERT INTO output_records VALUES("111","51","5","","","52","25","2022-11-28","11:05:12","1");
INSERT INTO output_records VALUES("113","63","11","","","65","25","2022-11-28","13:10:32","1");
INSERT INTO output_records VALUES("114","76","9","","","78","25","2022-11-28","13:10:47","1");
INSERT INTO output_records VALUES("116","89","12","","","91","25","2022-11-28","14:21:02","1");
INSERT INTO output_records VALUES("117","100","13","","","101","25","2022-11-28","15:08:22","1");
INSERT INTO output_records VALUES("118","110","14","","","114","25","2022-11-28","16:34:50","1");
INSERT INTO output_records VALUES("119","123","7","","","125","25","2022-11-28","17:05:25","1");
INSERT INTO output_records VALUES("120","126","25","","","127","5","2022-11-28","17:58:29","1");
INSERT INTO output_records VALUES("121","138","26","","","140","27","2022-11-28","18:04:16","1");
INSERT INTO output_records VALUES("122","138","15","","","140","25","2022-11-28","18:04:50","1");
INSERT INTO output_records VALUES("124","10","1","","","13","29","2022-11-29","07:10:14","1");
INSERT INTO output_records VALUES("125","11","16","","","13","31","2022-11-29","07:10:48","1");
INSERT INTO output_records VALUES("126","2","1","","","13","29","2022-11-29","07:25:34","1");
INSERT INTO output_records VALUES("127","20","34","","","26","32","2022-11-29","08:11:38","1");
INSERT INTO output_records VALUES("128","10","33","","","13","32","2022-11-29","08:11:46","1");
INSERT INTO output_records VALUES("129","24","17","","","26","31","2022-11-29","08:30:54","1");
INSERT INTO output_records VALUES("130","23","2","","","26","29","2022-11-29","08:31:23","1");
INSERT INTO output_records VALUES("131","37","10","","","39","29","2022-11-29","09:32:00","1");
INSERT INTO output_records VALUES("132","50","3","","","52","29","2022-11-29","10:12:37","1");
INSERT INTO output_records VALUES("133","50","5","","","52","29","2022-11-29","11:03:52","1");
INSERT INTO output_records VALUES("134","34","18","","","39","31","2022-11-29","11:10:23","1");
INSERT INTO output_records VALUES("135","50","19","","","52","31","2022-11-29","11:10:42","1");
INSERT INTO output_records VALUES("136","50","8","","","52","31","2022-11-29","11:11:02","1");
INSERT INTO output_records VALUES("137","34","35","","","39","32","2022-11-29","11:11:36","1");
INSERT INTO output_records VALUES("138","51","36","","","52","32","2022-11-29","11:11:55","1");
INSERT INTO output_records VALUES("139","51","37","","","52","32","2022-11-29","11:11:57","1");
INSERT INTO output_records VALUES("142","22","9","","","78","29","2022-11-29","13:41:30","1");
INSERT INTO output_records VALUES("143","63","11","","","65","29","2022-11-29","13:42:18","1");
INSERT INTO output_records VALUES("145","86","12","","","91","29","2022-11-29","14:22:54","1");
INSERT INTO output_records VALUES("146","4","12","","","91","29","2022-11-29","14:33:27","1");
INSERT INTO output_records VALUES("149","75","12","","","91","36","2022-11-30","14:48:16","1");
INSERT INTO output_records VALUES("150","75","9","","","78","36","2022-11-30","14:48:51","1");
INSERT INTO output_records VALUES("151","50","5","","","52","36","2022-11-30","14:49:16","1");
INSERT INTO output_records VALUES("152","50","3","","","52","36","2022-11-30","14:49:34","1");
INSERT INTO output_records VALUES("153","36","10","","","39","36","2022-11-30","14:50:39","1");
INSERT INTO output_records VALUES("154","28","2","","","26","36","2022-11-30","14:50:55","1");
INSERT INTO output_records VALUES("155","15","1","","","13","36","2022-11-30","14:51:10","1");
INSERT INTO output_records VALUES("156","11","1","","","13","38","2022-12-01","07:25:17","1");
INSERT INTO output_records VALUES("157","1","1","","","13","38","2022-12-01","07:26:46","1");
INSERT INTO output_records VALUES("158","2","1","","","13","38","2022-12-01","07:27:03","1");
INSERT INTO output_records VALUES("159","1","1","","","13","38","2022-12-01","07:27:42","1");
INSERT INTO output_records VALUES("160","6","1","","","13","38","2022-12-01","07:28:04","1");
INSERT INTO output_records VALUES("161","25","2","","","26","38","2022-12-01","08:20:26","1");
INSERT INTO output_records VALUES("162","36","10","","","39","38","2022-12-01","09:22:51","1");
INSERT INTO output_records VALUES("163","50","3","","","52","38","2022-12-01","10:58:25","1");
INSERT INTO output_records VALUES("164","50","5","","","52","38","2022-12-01","11:12:53","1");
INSERT INTO output_records VALUES("165","75","9","","","78","38","2022-12-01","13:04:11","1");
INSERT INTO output_records VALUES("166","63","11","","","65","38","2022-12-01","13:04:41","1");
INSERT INTO output_records VALUES("167","98","13","","","101","40","2022-12-02","15:21:40","1");
INSERT INTO output_records VALUES("168","115","14","","","114","40","2022-12-02","16:06:25","1");
INSERT INTO output_records VALUES("169","123","7","","","125","40","2022-12-02","17:34:11","1");
INSERT INTO output_records VALUES("170","138","15","","","140","40","2022-12-02","18:06:24","1");



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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

INSERT INTO time_targets VALUES("1","1","4","13","0","2022-11-11","16:10:13","1");
INSERT INTO time_targets VALUES("2","1","3","26","0","2022-11-11","16:13:12","1");
INSERT INTO time_targets VALUES("3","1","1","52","0","2022-11-11","18:09:28","1");
INSERT INTO time_targets VALUES("4","1","2","49","0","2022-11-11","18:09:40","0");
INSERT INTO time_targets VALUES("5","1","5","52","0","2022-11-15","13:35:20","1");
INSERT INTO time_targets VALUES("6","2","7","127","0","2022-11-15","17:10:12","1");
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
INSERT INTO time_targets VALUES("27","2","8","78","0","2022-11-23","13:57:51","1");
INSERT INTO time_targets VALUES("28","2","9","91","0","2022-11-23","13:58:22","1");
INSERT INTO time_targets VALUES("29","2","10","101","0","2022-11-23","14:10:20","1");
INSERT INTO time_targets VALUES("30","2","6","65","0","2022-11-23","14:10:31","1");
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

