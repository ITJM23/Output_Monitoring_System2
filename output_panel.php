<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>OMS | Output Panel</title>

        <link rel="shortcut icon" href="assets/images/Logo//favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="assets/js/c3/c3.min.css">

        <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-web/css/all.min.css">

        <link rel="stylesheet" href="assets/css/shards.min.css">
        
        <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">

        <link rel="stylesheet" href="assets/css/app.css">

        <style>

            .c3-line {
                stroke-width: 3px;
            }
            .c3-circle {
                fill: yellow !important;
            }

            .c3-tooltip th,
            .c3-tooltip td {
                font-size:35px;
                font-weight: bold;
            }

        </style>

    </head>

    <body class="bg-white">
        
        <div class="container-fluid"><br>   

            <div class="row">

                <div class="col-lg-4">

                    <div class="d-flex align-items-center">

                        <img 
                            src="assets/images/Logo/output_logo_3.png" 
                            class="pointer-cursor" 
                            height="55" 
                            alt=""
                            onclick="location.href='login.php';">

                        <h4 class="text-uppercase font-weight-bold ml-4">Output Monitoring System</h4>

                    </div>

                </div>

            </div>

            <hr>
            
            <div class="row">
            
                <div class="col-lg-4">
                    <!-- <p><b>Filter by date</b></p>
                    <input type="date" class="form-control" name="" id=""> -->
                    <button type="button" class="btn btn-light btn-squared font-weight-bold" data-toggle="modal" data-target="#filterMod">
                        <span class="fa fa-calendar"></span>
                        &nbsp Filter by     
                    </button>
                </div>

                <div class="col-lg-4 text-center">
                    <h5 class="font-weight-bold"><span id="date_fil_txt"><?php echo date('F d, Y', strtotime("now")); ?></span> - <span class="text-info" id="shift_fil_txt">Day Shift</span></h5>
                </div>

                <div class="col-lg-4">
                    
                </div>

            </div>
            
            <hr><br>

            <div class="row" id="chart_list"><br>

                <div class="col-lg-4">
                    <div id="output_chart"></div>
                </div>

            </div>

            <!-- =================== Filter Modal ================= -->
                <div class="modal fade" id="filterMod" style="font-size:20px;">

                    <form method="POST" id="filterForm">

                        <div class="modal-dialog">

                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title font-weight-bold text-uppercase">Filter By</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    
                                    <div class="form-group">
                                        <p><b>Date</b></p>
                                        <input type="date" class="form-control" name="date_filter" id="date_filter" required>
                                    </div>

                                    <div class="form-group">
                                        <p><b>Shift</b></p>
                                        <select class="form-control" name="shift_fil" id="shift_fil" required>
                                            <option value="">Select shift here</option>
                                            <option value="Day Shift">Day Shift</option>
                                            <option value="Night Shift">Night Shift</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-squared font-weight-bold"><span class="fa fa-check"></span> Apply</button>
                                    <button type="button" class="btn btn-secondary btn-squared font-weight-bold" data-dismiss="modal">Close</button>
                                </div>

                            </div>

                        </div>

                    </form>

                </div>
            <!-- =================== Filter Modal END ============= -->

            
        </div>

        <?php include "includes/footer.php"; ?>
        
        <script src="assets/js/jquery.min.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>

        <script src="assets/js/c3/d3.min.js"></script>
        <script src="assets/js/c3/c3.min.js"></script>

        <script src="assets/js/shards.min.js"></script>

        <script src="assets/sweetalert2/sweetalert2.min.js"></script>

        <script src="assets/js/functions.js"></script>

        <script>

            $(document).ready(function () {

                lineList('chart_list', '', '')

                setTimeout(function(){

                    executeGraphs('', '')

                    setInterval(function(){

                        var date_fil    = $('#date_filter').val()
                        var shift_fil   = $('#shift_fil').val()

                        executeGraphs(date_fil, shift_fil)
                        
                    }, 10000)

                }, 1000)



                $('#filterForm').on('submit', function(aa){

                    aa.preventDefault() 

                    var date_fil    = $('#date_filter').val()
                    var shift_fil   = $('#shift_fil').val()

                    $('#date_fil_txt').html(formatDate(date_fil))
                    $('#shift_fil_txt').html(shift_fil)

                    // console.log(date_fil + " | " + shift_fil)

                    lineList('chart_list', date_fil, shift_fil)

                    setTimeout(function(){

                        executeGraphs(date_fil, shift_fil)

                    }, 1000)

                    $('#filterMod').modal('hide')

                })
            })



            function lineList(id, date_fil, shift_fil){

                $.ajax({
                    type: "POST",
                    url: "exec/fetch.php",
                    data: {
                        datefil:date_fil,
                        shiftfil:shift_fil,
                        action:"admin_prod_line_graphs"
                    },
                    dataType: "JSON",
                    success: function (response) {
                        
                        var output=''

                        $.each(response, function(key, value){

                            output+='<div class="col-lg-4 border border-light"><br>'
                            output+='<div class="d-flex align-items-center" style="justify-content:space-between;">'
                            output+='<h4 class="font-weight-bold text-uppercase">Line '+ value.Line_name +'</h4>'

                            if(value.Line_Out_Id != 0){

                                output+='<div>'
                                output+='<a class="btn btn-light btn-squared font-weight-bold" title="View graph" href="line_output_details.php?lineoutid='+ value.Line_Out_Id +'&lineid='+ value.Line_name +'" target="_blank"><span class="fa fa-chart-line text-primary"></span> Graph</a> '
                                output+='<a class="btn btn-light btn-squared font-weight-bold" title="View logs" href="line_output_logs.php?lineoutid='+ value.Line_Out_Id +'&lineid='+ value.Line_name +'" target="_blank"><span class="fa fa-list text-success"></span> Logs</a>'
                                output+='</div>'
                            }

                            output+='</div>'
                            output+='<br>'
                            output+='<div id="output_chart'+ key +'"></div>'
                            output+='</div>'
                            
                        })
                        
                        // console.log(response)
                        $('#'+id).html(output)
                    }
                })
            }



            function executeGraphs(date_fil, shift_fil){

                $.ajax({
                    type: "POST",
                    url: "exec/fetch.php",
                    data: {
                        datefil:date_fil,
                        shiftfil:shift_fil,
                        action:"prod_line_graphs"
                    },
                    dataType: "JSON",
                    success: function (response) {

                        $.each(response, function(key, value){

                            outputChart("output_chart"+ key, value.Line_Id, value.Line_Out_Id)
                            
                        })
                    }
                })
            }



            function outputChart(id, line_Id, line_output_Id){

                $.ajax({    
                    type: "POST",
                    url: "exec/fetch.php",
                    data: {
                        lineid:line_Id,
                        lineoutid:line_output_Id,
                        action:"timetable_loop3"
                    },
                    dataType: "JSON",
                    success: function (response) {

                        var stackedColumnChart = c3.generate({

                            bindto: '#'+id,

                            size: { height: 250 },

                            color: {
                                pattern: ['#22c6ab', '#1c7fe0', '#3d3d3d' , '#f62d51']
                            },

                            data: {

                                x:'x',

                                columns: response,

                                labels:true,

                                // groups: [
                                //     ['Target', 'Actual']
                                // ]
                            },

                            axis: {
                                x: {
                                    type: 'category' // this needed to load string x value
                                }
                            },

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

        </script>
        
    </body>

</html>