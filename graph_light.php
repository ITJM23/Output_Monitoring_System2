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

        <link rel="shortcut icon" href="assets/images/Logo//favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="assets/js/c3/c3.min.css">

        <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-web/css/all.min.css">

        <link rel="stylesheet" href="assets/css/shards.min.css">
        
        <link rel="stylesheet" href="assets/css/toastr.min.css">

        <link rel="stylesheet" href="assets/css/hidebutton.css"><!--jm-->

        <style>

            .c3-line {
                stroke-width: 3px;
            }
            .c3-circle {
                fill: yellow !important;
            }

            .c3-axis-y text {
                font-size:20px; //change the size of the fonts
            }

            .c3-axis-x text {
                font-size: 20px; //change the size of the fonts
            }
            .c3-chart-text text  { 
                  font-size: 20px; //change the size of the fonts jm

            }


        </style>

    </head>

    <body>

        <!-- =================== Navbar ====================== -->
            <?php //include('includes/navbar.php'); ?>
        <!-- =================== Navbar END ================== -->

        <div class="container-fluid" id="graphDiv"><br><!--jm-->

            <div class="row"><br>

                <div class="col-lg-12">

                    <div class="text-center">
                        <h3 
                            class="font-weight-bold text-info text-uppercase" id="shift_txt_val">
                            ---
                        </h3><br>
                    </div>

                    <br>

                    <div class="row">

                        <div class="col-lg-6">

                            <table class="table">

                                <tbody class="table-bordered" style="font-size:17px;">

                                    <?php

                                        // if(isset($_GET['lineoutid'])){

                                        //     $the_lineout_Id = $_GET['lineoutid'];
                                        // }

                                        // else{

                                            
                                        // }

                                    ?>

                                    <input type="hidden" name="line_output_Id" id="line_output_Id">

                                    <tr>
                                        <td>
                                            <h3 class="font-weight-bold text-success text-uppercase">Line:</h3>
                                        </td>

                                        <td id="line_no_txt">

                                            <h3 class="text-uppercase font-weight-bold text-dark">

                                                <?php 

                                                    if(isset($_COOKIE['OMS_line_Id'])){

                                                        echo $line_name; //jm line no. identifier
                                                    }

                                                ?>

                                            </h3>

                                        </td>

                                        <td class="font-weight-bold text-success text-uppercase">Date:</td>
                                        <td class="text-uppercase font-weight-bold text-dark" id="date_info">
                                            ---
                                        </td>
                                    </tr>

                                    <tr>

                                        <td class="font-weight-bold text-success text-uppercase">Model / Item Code: </td>
                                        <td class="text-uppercase font-weight-bold text-primary" id="item_code">---</td>
                                        <td id="edit_i_1" style="display:none;"><input type="text" class="form-control" name="e_itemcode" id="e_itemcode" placeholder="Input item code here"></td>
                                        
                                        
                                        
                                        <td class="font-weight-bold text-success text-uppercase">Start Serial: </td>
                                        <td class="text-uppercase font-weight-bold text-dark" id="start_serial">---</td>
                                        <td id="edit_i_2" style="display:none;"><input type="text" class="form-control" name="e_start_serial" id="e_start_serial" placeholder="Input start serial here"></td>
                                    
                                    </tr>

                                    <tr>

                                        <td class="font-weight-bold text-success text-uppercase">Sub Leader:</td>
                                        <td class="text-uppercase font-weight-bold text-dark" id="sub_leader">---</td>
                                        <td id="edit_i_3" style="display:none;"><input type="text" class="form-control" name="e_subleader" id="e_subleader" placeholder="Input sub-leader here"></td>
                                        
                                        <td class="font-weight-bold text-success text-uppercase">End Serial: </td>
                                        <td class="text-uppercase font-weight-bold text-dark" id="end_serial">---</td>
                                        <td id="edit_i_4" style="display:none;"><input type="text" class="form-control" name="e_end_serial" id="e_end_serial" placeholder="Input end serial here"></td>
                                    
                                    </tr>

                                </tbody>

                            </table>

                        </div>

                        <div class="col-lg-6">

                            

                            <table class="table">

                                <tbody class="table-bordered" style="font-size:17px;">
                                        <tr>
                                            <td class="font-weight-bold text-success text-uppercase"> Target : </td> 
                                            <td class="font-weight-bold text-dark mr-3" id= "variance_target"> --- </td>
                                        </tr>
                                    
                                    
                                        <tr>
                                        <td class="font-weight-bold text-success text-uppercase"> Remaining : </td> 
                                        <td class="font-weight-bold text-dark mr-3" id= "variance_output"> --- </td> 
                                        </tr>
                                </tbody>
                            </table>
                            
                            
                            <p style="text-align: right;"><b>Legends: </b></p>

                            <div class="d-flex align-items-center" style="justify-content:right;">
                                <h4 class="font-weight-bold text-dark mr-3"><span class="fa fa-circle text-success"></span> TARGET</h4>
                                <h4 class="font-weight-bold text-dark"><span class="fa fa-circle text-primary"></span> ACTUAL</h4>
                                
                            
                                
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
         <!--jm displays here-->                                           
        <div id="breaktime_div">
            <h1> BREAK TIME</h1>
            <?php
                if(isset($_COOKIE['OMS_line_Id'])){
                    echo '<p id="line_name">Line name is: ' . $line_name . '</p>'; // jm line no. identifier
                }
            ?>

        <p>Remarks : </p>
        <p id='BREAKTIME_remarks'></p>
        


        </div>

        <div id="linestop_div">
            <h1> LINE STOP</h1>
            <?php
                if(isset($_COOKIE['OMS_line_Id'])){
                    echo '<p id="line_name">Line name is: ' . $line_name . '</p>'; // jm line no. identifier
                }
            ?>
        <p>Remarks : </p>
        <h5 id='LINE_STOP_remarks'></h5>

        </div>

        <div id="noproduction_div">
            <h1> NO PRODUCTION</h1>
            <?php
                if(isset($_COOKIE['OMS_line_Id'])){
                    echo '<p id="line_name">Line name is: ' . $line_name . '</p>'; // jm line no. identifier
                }
            ?>
        <p>Remarks : </p>
        <h5 id='NO_PRODUCTION_remarks'></h5>
        </div>

        <!--these divs are hidden bu default. found in hidebutton.css-->
        <!--jm displays here-->                                              




        <script src="assets/js/jquery.min.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>

        <script src="assets/js/c3/d3.min.js"></script>
        <script src="assets/js/c3/c3.min.js"></script>

        <script src="assets/js/shards.min.js"></script>

        <script src="assets/js/toastr.min.js"></script>

        <script>

            $(document).ready(function () {

                

                graph_status() //jm

                lineOutputInfo()

                setTimeout(function(){

                    tblTimeTable()

                    setInterval(function(){

                        lineOutputInfo()

                        tblTimeTable()

                    }, 10000)

                }, 1000)

                setInterval(function(){
                    graph_status() //jm
                }, 1000)
                /*
                    // Add a click event handler to the button
                $("#hideButton").click(function() {
                    // Use the .hide() method to hide the div
                    $("#graphDiv").hide();
                    $("#breaktimediv").show();
                })

                $("#showButton").click(function() {
                    // Use the .hide() method to hide the div
                    $("#graphDiv").show();
                    $("#breaktimediv").hide();
                })
                */

            })

            // graph display ---------------------------------------
            function graph_status() {
            
    $.ajax({
        type: "POST",
        url: "exec/fetch.php",
        data: {
            action: "graph_status",
        
        
        },
        dataType: "json",
        success: function (response) {
            var jsLineName = "<?php echo $line_name; ?>"; //assign the php variable to js variable
            //if (response === '1') {
              //  $("#graphDiv").hide();
                //$("#breaktimediv").show();
            //} else {
              //  $("#graphDiv").show();
                //$("#breaktimediv").hide();
            //


            

            //Line Identifier
            // Hide all divs initially
                $("#graphDiv").show();
                $("#breaktime_div").hide();
                $("#linestop_div").hide();
                $("#noproduction_div").hide();
                
                for (var i = 0; i < response.length; i++) {
                    if (response[i].Line_name === jsLineName) {
                        if (response[i].graph_display === "BREAKTIME") {
                        $("#breaktime_div").show();
                        $("#graphDiv").hide();
                        var remarks = response[i].remarks;  // Use "var" or "let" to declare a variable

                        // Display the remarks in the <h5> element with id "displayremarks"
                        $("#BREAKTIME_remarks").text(remarks);
                    }

                        else if (response[i].graph_display === "LINE_STOP") {
                            $("#linestop_div").show();
                            $("#graphDiv").hide();
                            var remarks = response[i].remarks;  // Use "var" or "let" to declare a variable

                        // Display the remarks in the <h5> element with id "displayremarks"
                        $("#LINE_STOP_remarks").text(remarks);
                            
                        } else if (response[i].graph_display === "NO_PRODUCTION") {
                            $("#noproduction_div").show();
                            $("#graphDiv").hide();
                            var remarks = response[i].remarks;  // Use "var" or "let" to declare a variable

                        // Display the remarks in the <h5> element with id "displayremarks"
                        $("#NO_PRODUCTION_remarks").text(remarks);
                        } else {
                            $("#graphDiv").show();
                        }
                    }
                }
                

            //Line Identifier





        
        },
        error: function () {
            console.error("Error fetching graph status.");
        }
    });
}

            // graph display ---------------------------------------






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
                        $('#shift_txt_val').html(response.ShiftVal + " Output Monitoring")
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
function outputChart(id) {
    var line_output_Id = $('#line_output_Id').val();

    $.ajax({
        type: "POST",
        url: "exec/fetch.php",
        data: {
            lineoutid: line_output_Id,
            action: "timetable_loop2"
        },
        dataType: "JSON",
        success: function (response) {

            var stackedColumnChart = c3.generate({

                bindto: '#' + id,

                size: { height: 490 }, 

                color: {
                    pattern: ['#22c6ab', '#1c7fe0', '#3d3d3d', '#f62d51']
                },

                data: {
                    columns: response,
                    labels: true,
                },

                grid: {
                    y: {
                        show: true
                    }
                },
                legend: {
                    hide: true
                },

                //jm added code============================================
                //jm added code============================================

                data: {
                    columns: response,
                    labels: true,
                    
                    colors: {
                        Actual: function(d) {
                            if (d.x === 0) {
                                if(response[2][1] != "---"){

                                return 'red'; // Change color for points where x = 0
                            }


                            } else if (d.x === 1 ) {
                                if(response[2][2] != "---"){
                                return 'red'; // Use default color for other points
                                }
                            
                            } else if (d.x === 2 ) {
                                if(response[2][3] != "---"){
                                return 'red'; // Use default color for other points
                                }

                            } else if (d.x === 3 ) {
                                if(response[2][4] != "---"){
                                return 'red'; // Use default color for other points
                                }
                            
                            } else if (d.x === 3 ) {
                                if(response[2][4] != "---"){
                                return 'red'; // Use default color for other points
                                }

                            } else if (d.x === 4 ) {
                                if(response[2][5] != "---"){
                                return 'red'; // Use default color for other points
                                }
                            
                            } else if (d.x === 5 ) {
                                if(response[2][6] != "---"){
                                return 'red'; // Use default color for other points
                                }

                            } else if (d.x === 6 ) {
                                if(response[2][7] != "---"){
                                return 'red'; // Use default color for other points
                                }

                            } else if (d.x === 7 ) {
                                if(response[2][8] != "---"){
                                return 'red'; // Use default color for other points
                                }

                            } else if (d.x === 8 ) {
                                if(response[2][9] != "---"){
                                return 'red'; // Use default color for other points
                                }
                            } else if (d.x === 9 ) {
                                if(response[2][10] != "---"){
                                return 'red'; // Use default color for other points
                                }

                            } else if (d.x === 10 ) {
                                if(response[2][11] != "---"){
                                return 'red'; // Use default color for other points
                                }

                            } else if (d.x === 11 ) {
                                if(response[2][12] != "---"){
                                return 'red'; // Use default color for other points
                                }

                            } else if (d.x === 12 ) {
                                if(response[2][13] != "---"){
                                return 'red'; // Use default color for other points
                                }

                            } else if (d.x === 13 ) {
                                if(response[2][14] != "---"){
                                return 'red'; // Use default color for other points
                                }
                            } else if (d.x === 14 ) {
                                if(response[2][15] != "---"){
                                return 'red'; // Use default color for other points
                                }
                            } else if (d.x === 15 ) {
                                if(response[2][16] != "---"){
                                return 'red'; // Use default color for other points
                                }
                            


                            } else {
                                return 'blue'; // Use default color for other points
                            }
                        }
                    }
                },

                
                tooltip: {
                    show: true,
                    contents: function (d, defaultTitleFormat, defaultValueFormat, color) {
                        var tooltipText = "<div class='c3-tooltip'>" +
                            
                            
                            


                            "<table class='c3-tooltip-value'>" +
                            "<tr><th colspan ='2'>" + defaultTitleFormat(d[0].x) + "</th></tr>" +
                            "<tr><td class='name'><span style='background-color:" + color(d[0].id) + "'></span>Target</td>" +
                            "<td class='value'>" + defaultValueFormat(d[0].value) + "</td></tr>" +
                            "<tr><td class='name'><span style='background-color:" + color(d[1].id) + "'></span>Output</td>" +
                            "<td class='value'>" + defaultValueFormat(d[1].value) + "</td></tr>" +
                            "</table>";

                            

                        
              
                        
                        if (d[0].x == 0){
                            tooltipText += '<div class="tooltip-remarks">' + response[2][1] + '</div>'; // Remarks text
                        }
                        else if (d[0].x == 1){
                            tooltipText += '<div class="tooltip-remarks">' + response[2][2] + '</div>'; // Remarks text
                        }
                        else if (d[0].x == 2){
                            tooltipText += '<div class="tooltip-remarks">' + response[2][3] + '</div>'; // Remarks text
                        }
                        else if (d[0].x == 3){
                            tooltipText += '<div class="tooltip-remarks">' + response[2][4] + '</div>'; // Remarks text
                        }
                        else if (d[0].x == 4){
                            tooltipText += '<div class="tooltip-remarks">' + response[2][5] + '</div>'; // Remarks text
                        }
                        else if (d[0].x == 5){
                            tooltipText += '<div class="tooltip-remarks">' + response[2][6] + '</div>'; // Remarks text
                        }
                        else if (d[0].x == 6){
                            tooltipText += '<div class="tooltip-remarks">' + response[2][7] + '</div>'; // Remarks text
                        }
                        else if (d[0].x == 7){
                            tooltipText += '<div class="tooltip-remarks">' + response[2][8] + '</div>'; // Remarks text
                        }
                        else if (d[0].x == 8){
                            tooltipText += '<div class="tooltip-remarks">' + response[2][9] + '</div>'; // Remarks text
                        }
                        else if (d[0].x == 9){
                            tooltipText += '<div class="tooltip-remarks">' + response[2][10] + '</div>'; // Remarks text
                        }
                        else if (d[0].x == 10){
                            tooltipText += '<div class="tooltip-remarks">' + response[2][11] + '</div>'; // Remarks text
                        }
                        else if (d[0].x == 11){
                            tooltipText += '<div class="tooltip-remarks">' + response[2][12] + '</div>'; // Remarks text
                        }
                        else if (d[0].x == 12){
                            tooltipText += '<div class="tooltip-remarks">' + response[2][13] + '</div>'; // Remarks text
                        }
                        else if (d[0].x == 13){
                            tooltipText += '<div class="tooltip-remarks">' + response[2][14] + '</div>'; // Remarks text
                        }
                        else if (d[0].x == 14){
                            tooltipText += '<div class="tooltip-remarks">' + response[2][15] + '</div>'; // Remarks text
                        }
                        else if (d[0].x == 15){
                            tooltipText += '<div class="tooltip-remarks">' + response[2][16] + '</div>'; // Remarks text
                        }




                        return tooltipText;
                    }
                }
                //jm added code============================================
                //jm added code============================================
            });

        }
    });
}
// ================ Output Chart END ===============





            // ================ Output Table ===================
                function tblTimeTable(){

                    var line_output_Id = $('#line_output_Id').val()//jm

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
                                output2+='<th style="width:7%;" class="font-weight-bold text-dark">TARGET</th>'
                                
                                $.each(response.Targets, function(key, value){
                                    
                                    output2+='<td><h4 class="font-weight-bold text-dark">'+ value +'</h4></td>'
                                })

                                let variance_Target = response.Targets[response.Targets.length - 1]; // Accessing the last value
                                $('#variance_target').html(variance_Target); // Set the variance target value
                                

                                $('#target_loop').html(output2) 

                                

                               
                            // ==================== Targets END ====================

                            // ==================== Outputs ========================
                                output3+='<th style="width:7%;" class="font-weight-bold text-dark">OUTPUT</th>'
                                
                                $.each(response.Outputs, function(key, value){

                                    if(value == null){

                                        value='---'
                                    }
                                    
                                    output3+='<td><h3 class="font-weight-bold" style="color:blue">'+ value +'</h3></td>'
                                })

                                //let variance_output = response.Outputs[response.Outputs.length - 1]; // Accessing the last value
                                //$('#variance_output').html(variance_output); // Set the variance target value

                                const lastNonNullValue = (response.Outputs || [])
                                .slice()
                                .reverse()
                                .find(value => value !== null);

                                console.log(lastNonNullValue); // This will log the last non-null value

                                
                                let remaining = variance_Target - lastNonNullValue

                                if (remaining <= 0){
                                    $('#variance_output').html('0'); // Set the variance target value
                                }
                                else{
                                    $('#variance_output').html(remaining); // Set the variance target value
                                }

                               

                                
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