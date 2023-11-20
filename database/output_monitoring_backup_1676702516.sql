

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
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4;

INSERT INTO line_output VALUES("3","88","UBA-10-SS/134114","L. ALIWALAS","23021652296","","Day Shift","2023-02-15","10:53:38","1");
INSERT INTO line_output VALUES("2","89","UBA--10-SS / 134114","L.ALIWALAS","No. 1777","No.1876","Day Shift","2023-02-15","13:38:02","1");
INSERT INTO line_output VALUES("1","90","","","","","Day Shift","2023-02-14","14:28:53","1");
INSERT INTO line_output VALUES("4","93","UBA-500-SS / 284241","L. ALIWALAS","No. 798","No. 900","Day Shift","2023-02-15","10:14:20","1");
INSERT INTO line_output VALUES("2","98","134114/UBA-10-SS 500-10-020FO USA-03 BULK R","D. Parungao","No.1981","No.2080","Day Shift","2023-02-16","06:45:51","1");
INSERT INTO line_output VALUES("3","99","134114/UBA-10-SS 500-10-020F0 USA03 BULK R","D.PARUNGAO","23021652498","","Day Shift","2023-02-16","06:48:21","1");
INSERT INTO line_output VALUES("4","100","UBA-500-SS / 284241","L. ALIWALAS","No. 1001","No.1101","Day Shift","2023-02-16","07:09:37","1");
INSERT INTO line_output VALUES("1","106","284241/ UBA-500-SS 500-20 OOOPO-EUR","A.Alcabasa","23022936515","","Day Shift","2023-02-16","10:01:50","1");
INSERT INTO line_output VALUES("2","111","134114/UBA-10-SS 500-10-020FO USA-03 BULK R","D. Parungao","2181","2300","Day Shift","2023-02-17","06:43:17","1");
INSERT INTO line_output VALUES("3","112","134114/UBA-10-SS 500-10-020F0 USA03 BULK R","D.PARUNGAO","23021652694","23021652813","Day Shift","2023-02-17","07:04:56","1");
INSERT INTO line_output VALUES("1","113","134114-UBA-10-SS USA/ 284241- UBA 500 SS 500 20 000P0 EUR","R.PELAGIO","23022976218","","Day Shift","2023-02-17","07:28:27","1");
INSERT INTO line_output VALUES("4","114","UBA-500-SS / 284241","L. ALIWALAS","No. 1,201","N0.1.300","Day Shift","2023-02-17","07:39:37","1");
INSERT INTO line_output VALUES("2","116","134114/UBA-10-SS 500-10-020FO USA-03 BULK R","M.SEBASTIAN ","2301","2401","Night Shift","2023-02-18","19:28:57","1");
INSERT INTO line_output VALUES("3","117","134114/UBA-10-SS 500-10-020F0 USA03 BULK R","M.SEBASTIAN","23021652814","23021652911","Night Shift","2023-02-18","19:29:57","1");
INSERT INTO line_output VALUES("4","118","UBA-500-SS RQ / 292782","J.DAVATOS","1","100","Night Shift","2023-02-18","19:46:53","1");
INSERT INTO line_output VALUES("1","119","292782- UBA 500 SS RQ 800 20 010R100 EUR PH MP2/ UBA 500 SS RQ 800 20 110R021 DNE-283117","E.DICHOSO","23022974209","23022974299","Night Shift","2023-02-18","00:28:04","1");
INSERT INTO line_output VALUES("2","120","","","","","Day Shift","2023-02-18","09:58:21","1");
INSERT INTO line_output VALUES("1","121","","","","","Day Shift","2023-02-18","10:36:30","1");
INSERT INTO line_output VALUES("3","122","","","","","Day Shift","2023-02-18","13:48:32","1");
INSERT INTO line_output VALUES("4","123","","","","","Day Shift","2023-02-18","13:56:21","1");
INSERT INTO line_output VALUES("5","124","UBA-500-SS-RQ / 292782","L. ALIWALAS","2302038195","","Day Shift","2023-02-18","14:01:34","1");
INSERT INTO line_output VALUES("6","125","","","","","Day Shift","2023-02-18","14:12:35","1");
INSERT INTO line_output VALUES("8","126","","","","","Day Shift","2023-02-18","14:16:04","1");



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
) ENGINE=InnoDB AUTO_INCREMENT=711 DEFAULT CHARSET=utf8mb4;

INSERT INTO output_records VALUES("305","10","49","","","10","89","2023-02-15","09:53:49","1");
INSERT INTO output_records VALUES("306","10","50","","","20","89","2023-02-15","09:54:04","1");
INSERT INTO output_records VALUES("307","10","50","","","20","89","2023-02-15","09:54:41","1");
INSERT INTO output_records VALUES("309","27","51","","","30","89","2023-02-15","10:02:19","1");
INSERT INTO output_records VALUES("310","10","56","","","13","93","2023-02-15","10:18:42","1");
INSERT INTO output_records VALUES("312","16","57","","","20","93","2023-02-15","10:21:59","1");
INSERT INTO output_records VALUES("314","21","58","","","30","93","2023-02-15","10:23:07","1");
INSERT INTO output_records VALUES("319","13","16","","","13","88","2023-02-15","10:43:23","1");
INSERT INTO output_records VALUES("320","20","17","","","26","88","2023-02-15","10:43:32","1");
INSERT INTO output_records VALUES("321","23","18","","","39","88","2023-02-15","10:43:50","1");
INSERT INTO output_records VALUES("322","21","59","","","30","93","2023-02-15","11:03:56","1");
INSERT INTO output_records VALUES("327","27","52","","","30","89","2023-02-15","11:08:31","1");
INSERT INTO output_records VALUES("328","23","19","","","52","88","2023-02-15","11:11:20","1");
INSERT INTO output_records VALUES("329","43","53","","","40","89","2023-02-15","11:57:17","1");
INSERT INTO output_records VALUES("330","36","8","","","52","88","2023-02-15","11:59:12","1");
INSERT INTO output_records VALUES("331","30","60","","","40","93","2023-02-15","12:18:08","1");
INSERT INTO output_records VALUES("332","50","20","","","65","88","2023-02-15","12:55:20","1");
INSERT INTO output_records VALUES("333","54","30","","","50","89","2023-02-15","12:56:48","1");
INSERT INTO output_records VALUES("336","41","61","","","50","93","2023-02-15","13:03:05","1");
INSERT INTO output_records VALUES("338","60","27","","","60","89","2023-02-15","13:57:39","1");
INSERT INTO output_records VALUES("339","62","21","","","60","88","2023-02-15","13:58:38","1");
INSERT INTO output_records VALUES("342","60","62","","","60","93","2023-02-15","14:09:35","1");
INSERT INTO output_records VALUES("345","65","22","","","67","88","2023-02-15","14:53:48","1");
INSERT INTO output_records VALUES("346","67","28","","","67","89","2023-02-15","14:54:25","1");
INSERT INTO output_records VALUES("349","60","31","","","67","93","2023-02-15","15:06:55","1");
INSERT INTO output_records VALUES("350","77","29","","","77","89","2023-02-15","15:57:54","1");
INSERT INTO output_records VALUES("351","81","63","","","77","93","2023-02-15","16:38:31","1");
INSERT INTO output_records VALUES("355","76","23","","","77","88","2023-02-15","16:39:58","1");
INSERT INTO output_records VALUES("357","90","24","","","87","88","2023-02-15","16:56:55","1");
INSERT INTO output_records VALUES("360","87","54","","","87","89","2023-02-15","17:05:41","1");
INSERT INTO output_records VALUES("361","87","64","","","87","93","2023-02-15","17:05:43","1");
INSERT INTO output_records VALUES("363","105","25","","","97","88","2023-02-15","17:41:29","1");
INSERT INTO output_records VALUES("365","97","65","","","97","93","2023-02-15","17:45:06","1");
INSERT INTO output_records VALUES("370","100","6","","","97","89","2023-02-15","17:54:15","1");
INSERT INTO output_records VALUES("463","5","16","","","10","99","2023-02-16","07:52:48","1");
INSERT INTO output_records VALUES("465","0","56","","","10","100","2023-02-16","08:00:17","1");
INSERT INTO output_records VALUES("467","11","17","","","20","99","2023-02-16","08:55:37","1");
INSERT INTO output_records VALUES("468","11","50","","","20","98","2023-02-16","08:57:36","1");
INSERT INTO output_records VALUES("469","0","49","no wip from table 3 to table 10","","10","98","2023-02-16","09:04:10","1");
INSERT INTO output_records VALUES("470","0","57","","","20","100","2023-02-16","09:10:26","1");
INSERT INTO output_records VALUES("474","20","18","","","30","99","2023-02-16","09:50:34","1");
INSERT INTO output_records VALUES("477","25","51","","","30","98","2023-02-16","09:55:42","1");
INSERT INTO output_records VALUES("479","5","1","","","13","106","2023-02-16","10:02:31","1");
INSERT INTO output_records VALUES("480","15","2","","","26","106","2023-02-16","10:03:11","1");
INSERT INTO output_records VALUES("481","25","10","","","39","106","2023-02-16","10:03:55","1");
INSERT INTO output_records VALUES("482","25","52","","","30","98","2023-02-16","11:08:15","1");
INSERT INTO output_records VALUES("484","40","3","","","52","106","2023-02-16","11:10:59","1");
INSERT INTO output_records VALUES("485","40","5","","","52","106","2023-02-16","11:32:42","1");
INSERT INTO output_records VALUES("486","0","19","BREAK TIME","","30","99","2023-02-16","11:32:55","1");
INSERT INTO output_records VALUES("487","30","8","","","40","99","2023-02-16","11:53:37","1");
INSERT INTO output_records VALUES("488","34","53","","","40","98","2023-02-16","11:57:44","1");
INSERT INTO output_records VALUES("494","0","57","","","20","100","2023-02-16","12:12:40","1");
INSERT INTO output_records VALUES("495","20","58","","","30","100","2023-02-16","12:13:03","1");
INSERT INTO output_records VALUES("496","20","59","","","30","100","2023-02-16","12:13:39","1");
INSERT INTO output_records VALUES("497","25","60","","","40","100","2023-02-16","12:14:03","1");
INSERT INTO output_records VALUES("498","45","20","","","50","99","2023-02-16","12:51:27","1");
INSERT INTO output_records VALUES("499","50","30","","","50","98","2023-02-16","12:56:57","1");
INSERT INTO output_records VALUES("500","60","11","","","65","106","2023-02-16","13:01:16","1");
INSERT INTO output_records VALUES("501","35","61","","","50","100","2023-02-16","13:03:44","1");
INSERT INTO output_records VALUES("502","48","21","","","60","99","2023-02-16","13:54:44","1");
INSERT INTO output_records VALUES("503","60","27","","","60","98","2023-02-16","13:55:53","1");
INSERT INTO output_records VALUES("504","45","62","","","60","100","2023-02-16","14:01:29","1");
INSERT INTO output_records VALUES("505","80","9","","","78","106","2023-02-16","14:21:55","1");
INSERT INTO output_records VALUES("506","56","22","","","67","99","2023-02-16","14:54:46","1");
INSERT INTO output_records VALUES("507","67","28","","","67","98","2023-02-16","14:58:04","1");
INSERT INTO output_records VALUES("508","55","31","","","67","100","2023-02-16","15:05:01","1");
INSERT INTO output_records VALUES("509","70","23","","","77","99","2023-02-16","15:45:52","1");
INSERT INTO output_records VALUES("511","91","12","","","91","106","2023-02-16","15:48:02","1");
INSERT INTO output_records VALUES("512","77","29","","","77","98","2023-02-16","15:55:58","1");
INSERT INTO output_records VALUES("514","65","63","","","77","100","2023-02-16","16:05:02","1");
INSERT INTO output_records VALUES("515","87","54","","","87","98","2023-02-16","16:34:32","1");
INSERT INTO output_records VALUES("516","78","24","","","87","99","2023-02-16","16:46:51","1");
INSERT INTO output_records VALUES("517","101","13","","","101","106","2023-02-16","16:57:22","1");
INSERT INTO output_records VALUES("518","114","14","","","114","106","2023-02-16","16:57:48","1");
INSERT INTO output_records VALUES("522","80","64","","","87","100","2023-02-16","17:08:06","1");
INSERT INTO output_records VALUES("523","97","25","","","97","99","2023-02-16","17:51:54","1");
INSERT INTO output_records VALUES("524","30","19","","","30","99","2023-02-16","17:55:54","1");
INSERT INTO output_records VALUES("525","90","65","","","97","100","2023-02-16","18:01:29","1");
INSERT INTO output_records VALUES("526","97","6","","","97","98","2023-02-16","18:02:18","1");
INSERT INTO output_records VALUES("527","140","15","","","140","106","2023-02-16","18:02:38","1");
INSERT INTO output_records VALUES("528","102","55","","","100","98","2023-02-16","18:02:47","1");
INSERT INTO output_records VALUES("529","125","7","","","125","106","2023-02-16","18:03:08","1");
INSERT INTO output_records VALUES("530","105","26","","","105","99","2023-02-16","18:09:17","1");
INSERT INTO output_records VALUES("531","100","66","","","100","100","2023-02-16","18:12:58","1");
INSERT INTO output_records VALUES("588","8","16","","","10","112","2023-02-17","07:53:07","1");
INSERT INTO output_records VALUES("589","3","49","","","10","111","2023-02-17","07:59:59","1");
INSERT INTO output_records VALUES("590","0","56","","","10","114","2023-02-17","08:04:26","1");
INSERT INTO output_records VALUES("591","11","17","","","20","112","2023-02-17","08:50:46","1");
INSERT INTO output_records VALUES("592","19","50","","","20","111","2023-02-17","09:01:26","1");
INSERT INTO output_records VALUES("593","5","57","","","20","114","2023-02-17","09:01:36","1");
INSERT INTO output_records VALUES("594","10","1","","","13","113","2023-02-17","09:10:08","1");
INSERT INTO output_records VALUES("595","20","2","","","26","113","2023-02-17","09:10:37","1");
INSERT INTO output_records VALUES("596","28","18","","","30","112","2023-02-17","09:45:24","1");
INSERT INTO output_records VALUES("597","32","51","","","30","111","2023-02-17","09:54:48","1");
INSERT INTO output_records VALUES("598","20","58","","","30","114","2023-02-17","10:01:40","1");
INSERT INTO output_records VALUES("599","35","10","","","39","113","2023-02-17","10:02:11","1");
INSERT INTO output_records VALUES("600","0","19","break time","","30","112","2023-02-17","11:08:29","1");
INSERT INTO output_records VALUES("601","20","59","","","30","114","2023-02-17","11:22:54","1");
INSERT INTO output_records VALUES("602","48","3","","","52","113","2023-02-17","11:51:16","1");
INSERT INTO output_records VALUES("603","48","5","","","52","113","2023-02-17","11:51:37","1");
INSERT INTO output_records VALUES("604","36","8","","","40","112","2023-02-17","11:56:22","1");
INSERT INTO output_records VALUES("606","32","52","","","30","111","2023-02-17","11:57:47","1");
INSERT INTO output_records VALUES("607","43","53","","","40","111","2023-02-17","11:58:01","1");
INSERT INTO output_records VALUES("608","30","60","","","40","114","2023-02-17","12:10:50","1");
INSERT INTO output_records VALUES("609","55","30","","","50","111","2023-02-17","12:55:43","1");
INSERT INTO output_records VALUES("610","50","20","","","50","112","2023-02-17","12:59:29","1");
INSERT INTO output_records VALUES("611","40","61","","","50","114","2023-02-17","13:02:41","1");
INSERT INTO output_records VALUES("612","60","11","","","65","113","2023-02-17","13:09:06","1");
INSERT INTO output_records VALUES("613","61","21","","","60","112","2023-02-17","13:55:39","1");
INSERT INTO output_records VALUES("615","68","27","","","60","111","2023-02-17","13:58:26","1");
INSERT INTO output_records VALUES("616","60","62","","","60","114","2023-02-17","14:00:26","1");
INSERT INTO output_records VALUES("617","69","22","","","67","112","2023-02-17","14:58:30","1");
INSERT INTO output_records VALUES("618","80","28","","","67","111","2023-02-17","15:01:32","1");
INSERT INTO output_records VALUES("619","70","31","","","67","114","2023-02-17","15:02:18","1");
INSERT INTO output_records VALUES("621","87","23","","","77","112","2023-02-17","15:57:07","1");
INSERT INTO output_records VALUES("623","77","63","","","77","114","2023-02-17","16:02:04","1");
INSERT INTO output_records VALUES("624","92","29","","","77","111","2023-02-17","16:14:20","1");
INSERT INTO output_records VALUES("625","96","24","","","87","112","2023-02-17","16:26:38","1");
INSERT INTO output_records VALUES("626","100","54","","","87","111","2023-02-17","16:55:45","1");
INSERT INTO output_records VALUES("627","87","64","","","87","114","2023-02-17","17:03:10","1");
INSERT INTO output_records VALUES("628","78","9","","","78","113","2023-02-17","17:12:24","1");
INSERT INTO output_records VALUES("629","91","12","","","91","113","2023-02-17","17:13:08","1");
INSERT INTO output_records VALUES("630","101","13","","","101","113","2023-02-17","17:13:26","1");
INSERT INTO output_records VALUES("631","114","14","","","114","113","2023-02-17","17:14:09","1");
INSERT INTO output_records VALUES("632","110","6","","","97","111","2023-02-17","17:47:14","1");
INSERT INTO output_records VALUES("634","121","25","","","97","112","2023-02-17","17:55:42","1");
INSERT INTO output_records VALUES("635","125","7","","","125","113","2023-02-17","17:57:01","1");
INSERT INTO output_records VALUES("636","140","15","","","140","113","2023-02-17","17:57:16","1");
INSERT INTO output_records VALUES("637","97","65","","","97","114","2023-02-17","18:03:55","1");
INSERT INTO output_records VALUES("638","120","55","","","100","111","2023-02-17","18:08:33","1");
INSERT INTO output_records VALUES("639","100","66","","","100","114","2023-02-17","18:12:00","1");
INSERT INTO output_records VALUES("640","10","56","","","10","118","2023-02-17","19:50:11","1");
INSERT INTO output_records VALUES("641","1","49","2181 from repair","","10","116","2023-02-17","19:55:55","1");
INSERT INTO output_records VALUES("642","4","16","","","10","117","2023-02-17","20:03:32","1");
INSERT INTO output_records VALUES("643","11","50","","","20","116","2023-02-17","20:59:00","1");
INSERT INTO output_records VALUES("644","14","17","","","20","117","2023-02-17","21:04:22","1");
INSERT INTO output_records VALUES("645","21","51","","","30","116","2023-02-17","21:57:04","1");
INSERT INTO output_records VALUES("646","24","18","","","30","117","2023-02-17","21:58:54","1");
INSERT INTO output_records VALUES("647","20","57","","","20","118","2023-02-17","22:34:39","1");
INSERT INTO output_records VALUES("648","30","58","","","30","118","2023-02-17","22:34:44","1");
INSERT INTO output_records VALUES("649","40","59","","","30","118","2023-02-17","22:34:53","1");
INSERT INTO output_records VALUES("650","21","52","","","30","116","2023-02-17","22:58:09","1");
INSERT INTO output_records VALUES("651","36","53","","","40","116","2023-02-17","23:53:40","1");
INSERT INTO output_records VALUES("652","36","8","","","40","117","2023-02-18","00:14:56","1");
INSERT INTO output_records VALUES("656","6","1","START UP","","13","119","2023-02-18","00:30:42","1");
INSERT INTO output_records VALUES("657","20","2","","","26","119","2023-02-18","00:31:00","1");
INSERT INTO output_records VALUES("658","30","10","","","39","119","2023-02-18","00:31:15","1");
INSERT INTO output_records VALUES("659","40","3","","","52","119","2023-02-18","00:31:38","1");
INSERT INTO output_records VALUES("660","40","5","","","52","119","2023-02-18","00:31:49","1");
INSERT INTO output_records VALUES("661","-4","2","","","26","119","2023-02-18","00:32:52","1");
INSERT INTO output_records VALUES("662","45","30","","","50","116","2023-02-18","00:59:20","1");
INSERT INTO output_records VALUES("663","-10","59","","","30","118","2023-02-18","01:04:05","1");
INSERT INTO output_records VALUES("664","40","60","","","40","118","2023-02-18","01:04:12","1");
INSERT INTO output_records VALUES("665","50","61","","","50","118","2023-02-18","01:04:19","1");
INSERT INTO output_records VALUES("666","60","11","","","65","119","2023-02-18","01:08:14","1");
INSERT INTO output_records VALUES("667","45","20","","","50","117","2023-02-18","01:09:17","1");
INSERT INTO output_records VALUES("668","2","60","","","40","118","2023-02-18","01:51:21","1");
INSERT INTO output_records VALUES("669","-2","57","","","20","118","2023-02-18","01:52:14","1");
INSERT INTO output_records VALUES("670","55","27","1 NG- CRACK ON LENS GUIDE C","","60","116","2023-02-18","01:58:18","1");
INSERT INTO output_records VALUES("671","60","21","","","60","117","2023-02-18","02:16:52","1");
INSERT INTO output_records VALUES("672","60","61","","","50","118","2023-02-18","02:49:57","1");
INSERT INTO output_records VALUES("673","67","62","","","60","118","2023-02-18","02:50:20","1");
INSERT INTO output_records VALUES("674","-60","61","","","50","118","2023-02-18","02:50:49","1");
INSERT INTO output_records VALUES("675","-7","62","","","60","118","2023-02-18","02:51:06","1");
INSERT INTO output_records VALUES("676","67","31","","","67","118","2023-02-18","02:51:17","1");
INSERT INTO output_records VALUES("677","77","31","","","67","118","2023-02-18","02:51:24","1");
INSERT INTO output_records VALUES("678","-77","31","","","67","118","2023-02-18","02:51:36","1");
INSERT INTO output_records VALUES("679","60","28","","","67","116","2023-02-18","03:05:27","1");
INSERT INTO output_records VALUES("680","67","22","","","67","117","2023-02-18","03:07:20","1");
INSERT INTO output_records VALUES("681","77","63","","","77","118","2023-02-18","03:29:55","1");
INSERT INTO output_records VALUES("682","73","9","","","78","119","2023-02-18","03:49:41","1");
INSERT INTO output_records VALUES("683","82","12","","","91","119","2023-02-18","03:50:27","1");
INSERT INTO output_records VALUES("684","90","13","","","101","119","2023-02-18","03:50:48","1");
INSERT INTO output_records VALUES("685","73","23","Waiting for unit.","","77","117","2023-02-18","03:51:22","1");
INSERT INTO output_records VALUES("686","77","24","Waiting for unit, still at Aging process.","","87","117","2023-02-18","04:24:30","1");
INSERT INTO output_records VALUES("687","75","29","","","77","116","2023-02-18","04:31:26","1");
INSERT INTO output_records VALUES("688","34","19","","","30","117","2023-02-18","04:31:40","1");
INSERT INTO output_records VALUES("689","-10","19","","","30","117","2023-02-18","04:31:54","1");
INSERT INTO output_records VALUES("690","100","14","","","114","119","2023-02-18","04:53:06","1");
INSERT INTO output_records VALUES("691","112","7","","","125","119","2023-02-18","05:07:31","1");
INSERT INTO output_records VALUES("692","85","54","","","87","116","2023-02-18","05:36:56","1");
INSERT INTO output_records VALUES("693","85","64","","","87","118","2023-02-18","05:55:26","1");
INSERT INTO output_records VALUES("694","95","65","","","97","118","2023-02-18","05:55:40","1");
INSERT INTO output_records VALUES("695","120","15","","","140","119","2023-02-18","06:00:19","1");
INSERT INTO output_records VALUES("696","90","25","","","97","117","2023-02-18","06:01:07","1");
INSERT INTO output_records VALUES("697","97","26","","","105","117","2023-02-18","06:01:16","1");
INSERT INTO output_records VALUES("698","95","6","","","97","116","2023-02-18","06:05:31","1");
INSERT INTO output_records VALUES("700","100","55","2 NG- Crack on lens guide C","","100","116","2023-02-18","06:08:06","1");
INSERT INTO output_records VALUES("701","100","66","","","100","118","2023-02-18","06:13:03","1");
INSERT INTO output_records VALUES("702","2","64","","","87","118","2023-02-18","06:16:34","1");
INSERT INTO output_records VALUES("703","2","65","","","97","118","2023-02-18","06:16:44","1");
INSERT INTO output_records VALUES("704","13","33","","","13","124","2023-02-18","14:12:04","1");
INSERT INTO output_records VALUES("705","26","34","","","26","124","2023-02-18","14:12:13","1");
INSERT INTO output_records VALUES("706","39","35","","","39","124","2023-02-18","14:12:18","1");
INSERT INTO output_records VALUES("707","52","36","","","52","124","2023-02-18","14:12:23","1");
INSERT INTO output_records VALUES("708","52","37","","","52","124","2023-02-18","14:12:30","1");
INSERT INTO output_records VALUES("709","65","38","","","65","124","2023-02-18","14:12:52","1");
INSERT INTO output_records VALUES("710","78","39","","","78","124","2023-02-18","14:13:05","1");



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
INSERT INTO prod_lines VALUES("11","11","$2y$12$kO4flBs7nQ4Gb5B4fd8Pduap9gEL1gUB/3QNxy2ygyBA.zLc40GiG","2022-11-29","14:24:48","0");
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
INSERT INTO time_table VALUES("11","16:00 - 16:30","16:00:00","04:00:00","2022-11-16","13:19:21","1");
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
INSERT INTO time_targets VALUES("8","3","5","40","0","2022-11-16","11:01:17","1");
INSERT INTO time_targets VALUES("9","1","8","78","0","2022-11-16","13:01:48","1");
INSERT INTO time_targets VALUES("10","1","41","39","0","2022-11-23","08:02:40","1");
INSERT INTO time_targets VALUES("11","1","6","65","0","2022-11-23","08:02:52","1");
INSERT INTO time_targets VALUES("12","1","9","91","0","2022-11-23","08:03:03","1");
INSERT INTO time_targets VALUES("13","1","10","101","0","2022-11-23","08:03:12","1");
INSERT INTO time_targets VALUES("14","1","11","114","0","2022-11-23","08:03:20","1");
INSERT INTO time_targets VALUES("15","1","27","140","0","2022-11-23","08:03:27","1");
INSERT INTO time_targets VALUES("16","3","4","10","0","2022-11-23","13:56:04","1");
INSERT INTO time_targets VALUES("17","3","3","20","0","2022-11-23","13:56:08","1");
INSERT INTO time_targets VALUES("18","3","41","30","0","2022-11-23","13:56:13","1");
INSERT INTO time_targets VALUES("19","3","1","30","0","2022-11-23","13:56:19","1");
INSERT INTO time_targets VALUES("20","3","6","50","0","2022-11-23","13:56:34","1");
INSERT INTO time_targets VALUES("21","3","8","60","0","2022-11-23","13:56:38","1");
INSERT INTO time_targets VALUES("22","3","9","67","0","2022-11-23","13:56:47","1");
INSERT INTO time_targets VALUES("23","3","10","77","0","2022-11-23","13:56:51","1");
INSERT INTO time_targets VALUES("24","3","11","87","0","2022-11-23","13:56:56","1");
INSERT INTO time_targets VALUES("25","3","7","97","0","2022-11-23","13:57:03","1");
INSERT INTO time_targets VALUES("26","3","27","105","0","2022-11-23","13:57:09","1");
INSERT INTO time_targets VALUES("27","2","8","60","0","2022-11-23","13:57:51","1");
INSERT INTO time_targets VALUES("28","2","9","67","0","2022-11-23","13:58:22","1");
INSERT INTO time_targets VALUES("29","2","10","77","0","2022-11-23","14:10:20","1");
INSERT INTO time_targets VALUES("30","2","6","50","0","2022-11-23","14:10:31","1");
INSERT INTO time_targets VALUES("31","4","9","67","0","2022-11-23","14:16:10","1");
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
INSERT INTO time_targets VALUES("55","2","27","100","0","2022-12-08","14:11:44","1");
INSERT INTO time_targets VALUES("56","4","4","10","0","2023-02-11","12:50:17","1");
INSERT INTO time_targets VALUES("57","4","3","20","0","2023-02-11","12:50:23","1");
INSERT INTO time_targets VALUES("58","4","41","30","0","2023-02-11","12:50:33","1");
INSERT INTO time_targets VALUES("59","4","1","30","0","2023-02-11","12:50:39","1");
INSERT INTO time_targets VALUES("60","4","5","40","0","2023-02-11","12:50:49","1");
INSERT INTO time_targets VALUES("61","4","6","50","0","2023-02-11","12:50:57","1");
INSERT INTO time_targets VALUES("62","4","8","60","0","2023-02-11","12:51:14","1");
INSERT INTO time_targets VALUES("63","4","10","77","0","2023-02-11","12:51:26","1");
INSERT INTO time_targets VALUES("64","4","11","87","0","2023-02-11","12:51:33","1");
INSERT INTO time_targets VALUES("65","4","7","97","0","2023-02-11","12:51:40","1");
INSERT INTO time_targets VALUES("66","4","27","100","0","2023-02-11","12:51:48","1");



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

