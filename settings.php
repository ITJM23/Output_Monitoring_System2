<?php

    session_start();

    include "includes/sessions_admin.php";

?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>OMS | Settings</title>

        <link rel="shortcut icon" href="assets/images/Logo//favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-web/css/all.min.css">

        <link rel="stylesheet" href="assets/css/shards.min.css">
        
        <link rel="stylesheet" href="assets/css/select2.min.css">

        <link rel="stylesheet" href="assets/css/toastr.min.css">

        <link rel="stylesheet" href="assets/css/app.css">

    </head>

    <body class="bg-white">

        <!-- =================== Navbar ====================== -->
            <?php include('includes/navbar.php'); ?>
        <!-- =================== Navbar END ================== -->

        <div class="container"><br>

            <div>
                <h4 class="font-weight-bold text-uppercase"><span class="fa fa-cog"></span> &nbspSettings</h4>
            </div>

            <hr><br>

            <div class="row">

                <!-- <div class="col-lg-4">
                    <div class="card pointer-cursor">
                        <div class="card-body d-flex align-items-center">
                            <h1><span class="fa fa-user mr-4"></span></h1>
                            <div>
                                <h4 class="font-weight-bold">Users</h4>
                                <p>Manage users accounts</p>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="col-lg-4">
                    <div class="card pointer-cursor" onclick="location.href='lines.php';">
                        <div class="card-body d-flex align-items-center">
                            <h1><span class="fa fa-tv mr-4"></span></h1>
                            <div>
                                <h4 class="font-weight-bold">Lines</h4>
                                <p>Manage production lines</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card pointer-cursor" onclick="location.href='timetables.php';">
                        <div class="card-body d-flex align-items-center">
                            <h1><span class="fa fa-clock mr-4"></span></h1>
                            <div>
                                <h4 class="font-weight-bold">Timetables</h4>
                                <p>Manage output timetable</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card pointer-cursor" onclick="location.href='db_backup.php';">
                        <div class="card-body d-flex align-items-center">
                            <h1><span class="fa fa-database mr-4"></span></h1>
                            <div>
                                <h4 class="font-weight-bold">Backup DB</h4>
                                <p>Generate a backup database file</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                

            </div>

           

            

        </div>
        
        <div class="container"><br>
            <div class="row">

            <div class="col-lg-4">
                    <div class="card pointer-cursor" onclick="location.href='sub_leaders.php';">
                        <div class="card-body d-flex align-items-center">
                            <h1><span class="fa fa-users mr-4"></span></h1>
                            <div>
                                <h4 class="font-weight-bold">Sub Leader</h4>
                                <p>Manage Line leaders </p>
                            </div>
                        </div>
                    </div>
                </div>
                    

            </div>
        </div>

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/shards.min.js"></script>
        <script src="assets/js/select2.min.js"></script>
        <script src="assets/js/toastr.min.js"></script>
        
    </body>

</html>