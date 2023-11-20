<?php

    session_start();

    include "includes/sessions.php";
?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>OMS | Graph</title>

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="assets/js/c3/c3.min.css">

        <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-web/css/all.min.css">

        <link rel="stylesheet" href="assets/css/shards.min.css">
        
        <link rel="stylesheet" href="assets/css/toastr.min.css">

        <style>
            .c3-line {
                stroke-width: 3px;
            }
            .c3-circle {
                fill: yellow !important;
            }

            path.domain { stroke: white; }
            .tick text { stroke: yellow; }
            .c3-legend-item text { stroke: grey; }

        </style>

    </head>

    <body class="bg-dark">

        <!-- =================== Navbar ====================== -->
            <?php //include('includes/navbar.php'); ?>
        <!-- =================== Navbar END ================== -->

        <div class="container-fluid"><br>

            <div class="row"><br>

                <div class="col-lg-12">

                    <div class="text-center">
                        <h3 class="font-weight-bold text-info text-uppercase">Day Shift Output Monitoring</h3><br>
                    </div>

                    <br>

                    <div class="row">

                        <div class="col-lg-6">

                            <table class="table">

                                <tbody class="table-bordered" style="font-size:17px;">

                                    <input type="hidden" name="line_output_Id" id="line_output_Id">

                                    <tr>
                                        <td class="font-weight-bold text-success text-uppercase">Line:</td>
                                        <td class="text-uppercase font-weight-bold text-white">3</td>
                                        <td class="font-weight-bold text-success text-uppercase">Date:</td>
                                        <td class="text-uppercase font-weight-bold text-white" id="date_info"><?php echo date('M d, Y', strtotime("now")); ?></td>
                                    </tr>

                                    <tr>

                                        <td class="font-weight-bold text-success text-uppercase">Model / Item Code: </td>
                                        <td class="text-uppercase font-weight-bold text-white" id="item_code">UBA S3 CASHBOX MP6 R C12 8689</td>
                                        <td id="edit_i_1" style="display:none;"><input type="text" class="form-control" name="e_itemcode" id="e_itemcode" placeholder="Input item code here"></td>
                                        
                                        <td class="font-weight-bold text-success text-uppercase">Start Serial: </td>
                                        <td class="text-uppercase font-weight-bold text-white" id="start_serial">2112961188</td>
                                        <td id="edit_i_2" style="display:none;"><input type="text" class="form-control" name="e_start_serial" id="e_start_serial" placeholder="Input start serial here"></td>
                                    
                                    </tr>

                                    <tr>

                                        <td class="font-weight-bold text-success text-uppercase">Sub Leader:</td>
                                        <td class="text-uppercase font-weight-bold text-white" id="sub_leader">A. Alcabasa</td>
                                        <td id="edit_i_3" style="display:none;"><input type="text" class="form-control" name="e_subleader" id="e_subleader" placeholder="Input sub-leader here"></td>
                                        
                                        <td class="font-weight-bold text-success text-uppercase">End Serial: </td>
                                        <td class="text-uppercase font-weight-bold text-white" id="end_serial">2112961323</td>
                                        <td id="edit_i_4" style="display:none;"><input type="text" class="form-control" name="e_end_serial" id="e_end_serial" placeholder="Input end serial here"></td>
                                    
                                    </tr>

                                </tbody>

                            </table>

                        </div>

                        <div class="col-lg-6 text-right">

                            <p><b>Legends: </b></p>

                            <div class="d-flex align-items-center" style="justify-content:right;">
                                <h4 class="font-weight-bold text-white mr-3"><span class="fa fa-circle text-success"></span> TARGET</h4>
                                <h4 class="font-weight-bold text-white"><span class="fa fa-circle text-primary"></span> OUTPUT</h4>
                            </div>

                        </div>

                    </div>

                    <br><hr>

                    <div id="output_chart" style="margin-left:170px; margin-right:70px;"></div>

                    <table class="table table-hover table-bordered text-center">

                        <thead class="bg-info text-white text-uppercase">

                            <tr id="timetable_loop">
                            </tr>

                        </thead>

                        <tbody class="font-weight-bold">

                            <tr id="target_loop">
                            </tr>

                            <tr id="output_loop">
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <script src="assets/js/jquery.min.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>

        <script src="assets/js/c3/d3.min.js"></script>
        <script src="assets/js/c3/c3.min.js"></script>

        <script src="assets/js/shards.min.js"></script>

        <script src="assets/js/toastr.min.js"></script>

        <script>

            $(document).ready(function () {

                lineOutputInfo()

                setTimeout(function(){

                    tblTimeTable()

                    setInterval(function(){

                        lineOutputInfo()

                        tblTimeTable()

                    }, 10000)

                }, 1000)

            })



            function lineOutputInfo(){  

                $.ajax({
                    type: "POST",
                    url: "exec/fetch.php",
                    data: {
                        action:"active_line_output"
                    },
                    dataType: "JSON",
                    success: function (response) {

                        $('#line_output_Id').val(response.LO_ID)
                        $('#shift_info').html(response.ShiftVal)
                        $('#date_info').html(response.DateAdded)
                        $('#item_code').html(response.ModelCode)
                        $('#start_serial').html(response.StrtSerial)
                        $('#sub_leader').html(response.Subleader)
                        $('#end_serial').html(response.EndSerial)

                        $('#e_itemcode').val(response.ModelCode)
                        $('#e_start_serial').val(response.StrtSerial)
                        $('#e_subleader').val(response.Subleader)
                        $('#e_end_serial').val(response.EndSerial)
                    }
                })
            }


            // ================ Output Chart ===================
                function outputChart(id){

                    var line_output_Id = $('#line_output_Id').val()

                    $.ajax({
                        type: "POST",
                        url: "exec/fetch.php",
                        data: {
                            lineoutid:line_output_Id,
                            action:"timetable_loop2"
                        },
                        dataType: "JSON",
                        success: function (response) {

                            console.log(response)

                            var stackedColumnChart = c3.generate({

                                bindto: '#'+id,

                                size: { height: 500 },

                                color: {
                                    pattern: ['#22c6ab', '#1c7fe0', '#3d3d3d' , '#f62d51']
                                },

                                data: {

                                    // x:'x',

                                    columns: response,

                                    labels:true,

                                    // groups: [
                                    //     ['Target', 'Actual']
                                    // ]
                                },

                                // axis: {
                                //     x: {
                                //         type: 'category' // this needed to load string x value
                                //     }
                                // },

                                grid: {
                                    y: {
                                        show: true
                                    }
                                },
                                legend: {
                                    hide: true
                                    //or hide: 'data1'
                                    //or hide: ['data1', 'data2']
                                }

                            })

                        }

                    })
                }
            // ================ Output Chart END ===============



            // ================ Output Table ===================
                function tblTimeTable(){

                    var line_output_Id = $('#line_output_Id').val()

                    $.ajax({
                        type: "POST",
                        url: "exec/fetch.php",
                        data: {
                            lineoutid:line_output_Id,
                            action:"timetable_loop"
                        },
                        dataType: "JSON",
                        success: function (response) {

                            var output=''
                            var output2=''
                            var output3=''

                            // ==================== Timetable ======================
                                output+='<th style="width:7%;">Time</th>'
                            
                                $.each(response.TimeTbl, function(key, value){

                                    output+='<th style="width:7%; font-size:13px;">'+ value +'</th>'
                                })

                                $('#timetable_loop').html(output)
                            // ==================== Timetable END ==================

                            // ==================== Targets ========================
                                output2+='<th style="width:7%;" class="font-weight-bold text-white">Target</th>'
                                
                                $.each(response.Targets, function(key, value){
                                    
                                    output2+='<td><h4 class="font-weight-bold text-white">'+ value +'</h4></td>'
                                })
                                
                                $('#target_loop').html(output2)
                            // ==================== Targets END ====================

                            // ==================== Outputs ========================
                                output3+='<th style="width:7%;" class="font-weight-bold text-white">Output</th>'
                                
                                $.each(response.Outputs, function(key, value){

                                    if(value == null){

                                        value='---'
                                    }
                                    
                                    output3+='<td><h3 class="font-weight-bold" style="color:violet">'+ value +'</h3></td>'
                                })
                                
                                $('#output_loop').html(output3)
                            // ==================== Outputs END ====================

                            // console.log(response)

                            outputChart('output_chart')
                        }
                    })
                }
            // ================ Output Table END ===============



        </script>
        
    </body>

</html>