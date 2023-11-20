
            <nav class="navbar navbar-expand-lg navbar-dark bg-secondary mb-4">

                <img src="assets/images/Tsukiden_Transparent_White.png" class="mr-2" height="30">

                <!-- <a class="navbar-brand" href="#">Shards</a>  -->
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown-6" aria-controls="navbarNavDropdown-6" aria-expanded="false" aria-label="Toggle navigation" style="">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse mr-auto" id="navbarNavDropdown-6">

                    <ul class="navbar-nav mr-auto font-weight-bold">


                        <?php

                            if(isset($_COOKIE['OMS_admin_Id'])){

                                ?>

                                <li class="nav-item text-uppercase">
                                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                                </li>

                                <?php
                            
                            }

                        ?>



                        <?php 

                            if(isset($_COOKIE['OMS_line_Id'])){

                                ?>

                                <li class="nav-item text-uppercase">
                                    <a class="nav-link" href="index.php">Form <span class="sr-only">(current)</span></a>
                                </li>

                                <li class="nav-item text-uppercase">
                                    <a class="nav-link" href="graph_light.php" target="_blank">Graph</a> 
                                </li>

                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-uppercase" href="https://designrevision.com" id="navbarDropdownMenuLink-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Graph</a>
                                    

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink-2">
                                        <a class="dropdown-item" href="graph_light.php" target="_blank">Light Mode</a> 
                                        <a class="dropdown-item" href="graph_dark.php" target="_blank">Dark Mode</a>
                                    </div>
                                </li> -->

                                <li class="nav-item text-uppercase">
                                    <a class="nav-link" href="output_logs.php">Logs</a>
                                </li>




                                </li>


                                <?php
                            }

                        ?>

                            

                        <?php

                            if(isset($_COOKIE['OMS_admin_Id'])){

                                ?>

                                <li class="nav-item text-uppercase">
                                    <a class="nav-link" href="settings.php">Settings</a>
                                </li>

                                <?php
                           
                            }

                        ?>

                    </ul>

                    <ul class="navbar-nav font-weight-bold">
                        <li class="nav-item">
                            <a class="nav-link" href="#">

                                <?php  

                                    if(isset($_COOKIE['OMS_line_Id'])){   

                                        echo "Line ".$line_name;
                                    }

                                    else{

                                        echo "Administrator";
                                    }
                                ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="includes/logout.php"><i class="fa fa-power-off"></i></a>
                        </li>
                    </ul>

                </div>

            </nav>