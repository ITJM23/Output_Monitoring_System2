<?php

    // session_start();

    // include "includes/sessions.php";
?>

<!DOCTYPE html> 

<html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>OMS | Output Logs</title>

        <link rel="shortcut icon" href="assets/images/Logo//favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-web/css/all.min.css">

        <link rel="stylesheet" href="assets/DataTables-1.10.16/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="assets/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="assets/css/responsive.dataTables.min.css">

        <link rel="stylesheet" href="assets/css/shards.min.css">

        <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">
        
        <link rel="stylesheet" href="assets/css/select2.min.css">

        <link rel="stylesheet" href="assets/css/toastr.min.css">

    </head>

    <body class="bg-white">

        <!-- =================== Navbar ====================== -->
            <?php //include('includes/navbar.php'); ?>

            <?php 

                if(isset($_GET['lineoutid']) && isset($_GET['lineid'])){

                    $the_line_Id    = $_GET['lineid'];
                    $the_lineout_Id = $_GET['lineoutid'];
                }

            ?>
        <!-- =================== Navbar END ================== -->

        <div class="container-fluid"><br>

            <div>
                <h3 class="font-weight-bold text-uppercase">
                    <span class="fa fa-list"></span> 
                    &nbsp <span class="text-info">Line <?php echo $the_line_Id; ?></span> - <span id="shift_info"></span>
                </h3>
            </div>

            <hr><br>

            <div class="row">

                <div class="col-lg-12"><br>

                    <input type="hidden" name="line_output_Id" id="line_output_Id" value="<?php echo $the_lineout_Id; ?>">
                    
                    <div class="row">

                        <div class="col-lg-6">

                            <table class="table table-bordered" style="font-size:20px;">

                                <tbody>
                                    <tr>
                                        <td class="font-weight-bold text-secondary">MODEL / ITEM CODE</td>
                                        <td class="font-weight-bold text-uppercase text-primary" id="item_code">---</td>
                                        <td class="font-weight-bold text-secondary">START SERIAL</td>
                                        <td class="font-weight-bold text-uppercase" id="start_serial text-uppercase">---</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold text-secondary">SUB LEADER</td>
                                        <td class="font-weight-bold text-uppercase" id="sub_leader">---</td>
                                        <td class="font-weight-bold text-secondary">END SERIAL</td>
                                        <td class="font-weight-bold text-uppercase" id="end_serial">---</td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>

                    </div>

                    <table class="table table-striped table-hover table-bordered" style="font-size:20px;" id="logs_tbl">

                        <thead class="bg-secondary text-white text-uppercase">
                            <tr>
                                <th>Date Added</th>
                                <th>Time</th>
                                <th>Target</th>
                                <th>Output</th>
                                <th>Description</th>
                                <!-- <th></th> -->
                            </tr>
                        </thead>

                        <tbody></tbody>

                    </table>

                </div>

            </div>

            <?php include "includes/footer.php"; ?>

        </div>

        <script src="assets/js/jquery.min.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>

        <script src="assets/js/shards.min.js"></script>

        <script src="assets/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="assets/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/js/dataTables.responsive.min.js"></script>

        <script src="assets/sweetalert2/sweetalert2.min.js"></script>

        <script src="assets/js/select2.min.js"></script>

        <script src="assets/js/toastr.min.js"></script>

        <script>

            $(document).ready(function () {
                
                lineOutputInfo()
                logsTbl('logs_tbl')

                // setTimeout(function(){


                // }, 1000)

            })

            

            function logsTbl(id){

                var line_output_Id = $('#line_output_Id').val()

                var dataTable = $('#'+id).DataTable({

                    "responsive": true,
                    "processing": true,
                    "serverSide": true,
                    "bSort": true,
                    "bInfo":false,
                    "searching": true,
                    "columnDefs": [
                        { orderable: false, targets: [4] }
                    ],
                    "order": [[0, 'desc']],
                    "ajax" : {
                        url:"datatables/logs_tbl2.php",
                        type: "POST",
                        data:{
                            lineoutid:line_output_Id
                        }
                    },
                    dom: 'Bfrtip',
                })
            }



            async function lineOutputInfo(){  

                var line_output_Id = $('#line_output_Id').val()

                await $.ajax({
                    type: "POST",
                    url: "exec/fetch.php",
                    data: {
                        lineoutid:line_output_Id,
                        action:"line_output_info"
                    },
                    dataType: "JSON",
                    success: function (response) {

                        // $('#line_output_Id').val(response.LO_ID)
                        $('#shift_info').html(response.ShiftVal)
                        // $('#date_info').html(response.DateAdded)
                        $('#item_code').html(response.ModelCode)
                        $('#start_serial').html(response.StrtSerial)
                        $('#sub_leader').html(response.Subleader)
                        $('#end_serial').html(response.EndSerial)
                    }
                })
            }



        </script>
        
    </body>

</html>