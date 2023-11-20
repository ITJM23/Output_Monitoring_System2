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

        <title>OMS | Output Form</title>

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

        <link rel="stylesheet" href="assets/css/app.css">

    </head>

    <body class="bg-white">

        <!-- =================== Navbar ====================== -->
            <?php include('includes/navbar.php'); ?>
        <!-- =================== Navbar END ================== -->

        <div class="container-fluid">

            <div class="row"><br>

                <div class="col-lg-9"><br>

                    <div class="row">

                        <div class="col-lg-6">
                            <h3 class="text-uppercase font-weight-bold">
                                <span class="fa fa-file"></span> 
                                &nbsp Monitoring Details
                            </h3>
                            <input 
                                type="hidden" 
                                name="line_output_Id" 
                                id="line_output_Id">
                        </div>

                        <div class="col-lg-6">

                            <div class="d-flex align-items-center" style="justify-content:right;">


                                <button type="button" class="btn btn-dark btn-squared font-weight-bold" onclick="Line_Status_modal()"> <!--jm-->
                                    <span class="fa fa-line-chart"></span> Line Status
                                </button> &nbsp 

                                <button 
                                    type="button" 
                                    class="btn btn-light btn-squared font-weight-bold"
                                    onclick="openShiftLogs()"> <!--jm-->
                                    <span class="fa fa-clock"></span> Shift Logs
                                </button> &nbsp
                        
                                <!-- <button type="button" class="btn btn-dark btn-squared font-weight-bold" onclick="changeShift()">
                                    <span class="fa fa-refresh"></span> Change Shift
                                </button> &nbsp -->

                                 

                                <button type="button" class="btn btn-info btn-squared font-weight-bold" id="edit_btn" onclick="editLineInfo()">
                                    <span class="fa fa-pencil-alt"></span> Edit
                                </button>

                                <div id="edit_section" style="display:none;">

                                    <button 
                                        type="button" 
                                        class="btn btn-success btn-squared font-weight-bold" 
                                        onclick="editLineOutpt()">
                                        <span class="fa fa-check"></span> 
                                        Save
                                    </button>
                                    
                                    <button 
                                        type="button" 
                                        class="btn btn-secondary btn-squared font-weight-bold" 
                                        onclick="editLineInfo()">
                                        Cancel
                                    </button>
                                
                                </div>

                            </div>

                        </div>

                    </div>

                    <br><hr><br>

                    <!-- ================= Monitoring Details Table ================== -->
                        <table class="table bg-light" style="font-size:20px;">

                            <tbody class="table-bordered">

                                <tr>
                                    <td class="font-weight-bold text-secondary">Shift:</td>
                                    <td id="shift_info" class="text-success font-weight-bold text-uppercase">---</td>
                                    <input type="hidden" name="shift_val" id="shift_val">
                                    <td class="font-weight-bold text-secondary">Date:</td>
                                    <td id="date_info" class="text-success font-weight-bold text-uppercase">---</td>
                                </tr>

                                <tr>

                                    <td class="font-weight-bold text-secondary">Model / Item Code: </td>
                                    <td id="item_code" class="text-primary font-weight-bold text-uppercase">---</td>
                                    <td id="edit_i_1" style="display:none;">
                                       
                                           


                                            <select class="form-control js-example-basic-multiple" name="e_itemcode" id="e_itemcode">
                                            <option value="model 1">model 1</option>
                                            <option value="model 2">model 2</option>
                                            <option value="model 3">model 3</option>
                                            <!-- Add more options as needed -->
                                        </select>


                                           
                                    </td>
                                    
                                    <td class="font-weight-bold text-secondary">Start Serial: </td>
                                    <td id="start_serial" class="font-weight-bold text-uppercase">---</td>
                                    <td id="edit_i_2" style="display:none;"><input type="text" class="form-control" name="e_start_serial" id="e_start_serial" placeholder="Input start serial here"></td>
                                
                                </tr>

                                <tr>

                                    <td class="font-weight-bold text-secondary">Sub Leader:</td>
                                    <td id="sub_leader" class="font-weight-bold text-uppercase">---</td>
                                    <td id="edit_i_3" style="display:none;"> <!--jm-->
                                        <select class="form-control js-example-basic-multiple" name="subleader" id="e_subleader">
                                            <option value="employee1">Employee 1</option>
                                            <option value="employee2">Employee 2</option>
                                            <option value="employee3">Employee 3</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </td>
                                    
                                    <td class="font-weight-bold text-secondary">End Serial: </td>
                                    <td id="end_serial" class="font-weight-bold text-uppercase">---</td>
                                    <td id="edit_i_4" style="display:none;"><input type="text" class="form-control" name="e_end_serial" id="e_end_serial" placeholder="Input end serial here"></td>
                                
                                </tr>

                            </tbody>

                        </table>
                    <!-- ================= Monitoring Details Table END ============== -->

                    <br><hr>


                    <!-- ================= Monitoring Table ====================== -->       
                        <table class="table table-striped table-hover" style="font-size:20px;" id="output_tbl">

                            <thead class="bg-secondary text-white text-uppercase">
                                <tr>
                                    <th>Time</th>
                                    <th>Target</th>
                                    <th>Output</th>
                                    <th>Percentage (%)</th>
                                </tr>
                            </thead>

                            <tbody class="table-bordered"></tbody>

                        </table>
                    <!-- ================= Monitoring Table END ================== -->

                </div>

                <div class="col-lg"><br>

                    <form method="POST" id="outputForm">
                    
                        <div class="card bg-white">

                            <div class="card-header bg-white d-flex align-items-center" style="justify-content:space-between;">
                                <h4 class="text-uppercase font-weight-bold">Output Form</h4>
                                <span class="fa fa-pencil-alt" onclick="$('#time_fil').toggle('slideDown')"></span>
                            </div>

                            <div class="card-body" style="font-size:20px;">
                                
                                <div class="form-group" id="time_fil" style="display:none;">
                                    <p><b>Time <span class="text-danger">(*)</span></b></p>
                                    <select 
                                        class="form-control font-weight-bold" 
                                        style="font-size:30px; height:80px;" 
                                        name="time_dd" 
                                        id="time_dd">
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <p><b>Output <span class="text-danger">(*)</span></b></p>
                                    <input 
                                        type="number" 
                                        class="form-control font-weight-bold" 
                                        style="font-size:30px; height:80px;" 
                                        name="total_count" 
                                        id="total_count" 
                                        onkeypress="return isNumberKey(event)"
                                        placeholder="Please input total here" required>
                                </div>

                                <div class="form-group">
                                    <p><b>Note <em>(optional)</em></b></p>
                                    <textarea 
                                        class="form-control" 
                                        name="description" 
                                        id="description" 
                                        cols="1" 
                                        rows="3"
                                        style="font-size:30px;"></textarea>
                                </div>

                                <!-- <div class="form-group">
                                    <p><b>PIC <span class="text-danger">(*)</span></b></p>
                                    <input type="text" class="form-control" name="pic_name" id="pic_name" placeholder="Please employee name here" required>
                                </div> -->

                            </div>

                            <div class="card-footer text-right bg-white">
                                <button type="submit" class="btn btn-success btn-squared font-weight-bold"> <span class="fa fa-check"></span> Submit</button>
                                <button type="button" class="btn btn-secondary btn-squared font-weight-bold">Clear</button>
                            </div>

                        </div>

                    </form>

                </div>

                <!-- =================== Shift Log Modal ================= -->
                    <div class="modal fade" id="shiftLogMod">

                        <div class="modal-dialog modal-lg">

                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title font-weight-bold text-uppercase">Shift Logs</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    
                                    <div class="text-right">
                                        <button type="button" class="btn btn-dark btn-squared font-weight-bold" onclick="changeShift()">
                                            <span class="fa fa-refresh"></span> Change Shift
                                        </button> &nbsp
                                    </div>

                                    <hr>

                                    <table class="table table-hover table-striped" style="font-size:20px;">
                                        <thead class="bg-secondary text-white font-weight-bold text-uppercase">
                                            <tr>
                                                <th>Date</th>
                                                <th>Shift</th>
                                                <!-- <th>Status</th> -->
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-bordered" id="shiftlog_tbl">
                                            <!-- <tr>
                                                <td class="font-weight-bold">Feb 10, 2023 | 06:53 AM</td>
                                                <td class="font-weight-bold text-success text-uppercase">Day Shift</td>
                                                <td>
                                                    <button 
                                                        type="button" 
                                                        class="btn btn-danger btn-squared font-weight-bold">
                                                        <span class="fa fa-trash"></span>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                    </table>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-squared font-weight-bold" data-dismiss="modal">Close</button>
                                </div>

                            </div>

                        </div>

                    </div>
                <!-- =================== Shift Log Modal END ============= -->

                <!-- =================== jm LineStatusMod Modal END ============= -->


                <div class="modal fade" id="LineStatusMod">

                        <div class="modal-dialog modal-lg">

                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title font-weight-bold text-uppercase">Update Line Status</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Display Message:</label>
                                    <textarea class="form-control" id="message-text"></textarea>
                                </div>
                                </div>

                                <div class="modal-footer">
                                <button type="button" class="btn btn-success" onclick="updatelinestatus('normal')">PRODUCTION</button>
                                    <button type="button" class="btn btn-primary" onclick="updatelinestatus('BREAKTIME')">BREAKTIME</button>
                                    <button type="button" class="btn btn-primary" onclick="updatelinestatus('LINE_STOP')">LINE STOP</button>
                                    <button type="button" class="btn btn-primary" onclick="updatelinestatus('NO_PRODUCTION')">NO PRODUCTION</button>
                                </div>
                            
                            </div>
                        </div>
                </div>



                <!-- =================== LineStatusMod Modal END ============= -->

            </div>

        </div>

        <?php include "includes/footer.php"; ?>

        <script src="assets/js/jquery.min.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>

        <script src="assets/js/shards.min.js"></script>

        <script src="assets/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="assets/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/js/dataTables.responsive.min.js"></script>

        <!-- <script src="assets/sweetalert2/sweetalert2.all.min.js"></script> -->
        <script src="assets/sweetalert2/sweetalert2.min.js"></script>

        <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

        <script src="assets/js/select2.min.js"></script>

        <script src="assets/js/toastr.min.js"></script>

        <script>

            $(document).ready(function () {

                lineOutputInfo()
                
                $('#total_count').focus()

                timeDD('time_dd')

                setTimeout(function(){
                    
                    timeTables('output_tbl')

                }, 1000)


                $('#outputForm').on('submit', function(aa){

                    aa.preventDefault()

                    var lineoutput_Id   = $('#line_output_Id').val()
                    var shift_val       = $('#shift_val').val()
                    var time_dd         = $('#time_dd').val()

                    var data = $('#outputForm').serializeArray()

                    data.push(
                        { name:'lineout_Id',value:lineoutput_Id },
                        { name:'shift_val', value:shift_val},
                        { name:'time_dd', value:time_dd },
                        { name:'action', value:'new_output'}
                    )

                    $.ajax({
                        type: "POST",
                        url: "exec/insert.php",
                        data: data,
                        dataType: "JSON",
                        success: function (response) {

                            // console.log(response)
                            
                            if(response == '1'){

                                $('#outputForm')[0].reset()

                                $('#output_tbl').DataTable().destroy()

                                timeTables('output_tbl')

                                toastr.success('You added a new output record', 'Successfully Added', { "progressBar": true });

                                $('#total_count').focus()
                            }

                            else if(response == '2' || response == '3'){

                                toastr.error('Please contact your developer', 'Something went wrong', { "progressBar": true });
                            }

                            else if(response == '4'){

                                toastr.info('Please try other entry', 'Already Exists', { "progressBar": true });
                            }
                        }
                    })
                })  
            })


            // ==================== Not Allowing "-" or other characters but numbers =================
                function isNumberKey(evt) {

                    var charCode = (evt.which) ? evt.which : evt.keyCode

                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                        return false;
                    return true;
                }
            // ==================== Not Allowing "-" or other characters but numbers END =============

            //jm update line status

            function updatelinestatus(value){

                const jmmessage = document.getElementById('message-text').value;

                

                $.ajax({
                    type: "POST",
                    url: "exec/insert.php",
                    data: {
                        action: value,
                        remarks: jmmessage
                    },
                    dataType: "JSON",
                    success: function (response) {

                        alert ("changed");

                    }
                })

            
            }

            //jm


            



            function editLineInfo(){

                $('#edit_i_1').toggle()
                $('#edit_i_2').toggle()
                $('#edit_i_3').toggle()
                $('#edit_i_4').toggle()

                $('#item_code').toggle()
                $('#start_serial').toggle()
                $('#sub_leader').toggle()
                $('#end_serial').toggle()

                $('#edit_section').toggle()
                $('#edit_btn').toggle()

            }

            

            function timeTables(id){

                var lineout_Id = $('#line_output_Id').val()

                var dataTable = $('#'+id).DataTable({

                    "responsive": true,
                    "processing": true,
                    "serverSide": true,
                    "bSort": true,
                    "bInfo":false,
                    "searching": true,
                    "columnDefs": [
                        { orderable: false, targets: 3 }
                    ],
                    "order": [[0, 'desc']],
                    "ajax" : {
                        url:"datatables/output_tbl.php",
                        type: "POST",
                        data:{
                            lineoutid:lineout_Id
                        }
                    },
                    dom: 'Bfrtip',
                })
            }

            

            function lineOutputInfo(){  

                $.ajax({
                    type: "POST",
                    url: "exec/fetch.php",
                    data: {
                        action:"active_line_output"
                    },
                    dataType: "JSON",
                    success: function (response) {

                        if(response.LO_ID == null){

                            $('#edit_btn').hide()
                        }

                        else{

                            $('#edit_btn').show()
                            $('#line_output_Id').val(response.LO_ID)
                            $('#shift_info').html(response.ShiftVal)
                            $('#shift_val').val(response.ShiftVal)
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

                    }
                })
            }

            

            function timeDD(id){

                $.ajax({
                    type: "POST",
                    url: "exec/fetch.php",
                    data: {
                        action:"time_dd"
                    },
                    dataType: "JSON",
                    success: function (response) {

                        // var output=''

                        // output+='<option value="">Select time here</option>'
                        
                        // $.each(response, function(key, value){

                        //     output+='<option value="'+ key +'">'+ value +'</option>'
                        
                        // })

                        $('#'+id).html(response)
                    }
                })
            }



            function editLineOutpt(){

                var line_output = $('#line_output_Id').val()
                var item_code   = $('#e_itemcode').val()
                var start_serial= $('#e_start_serial').val()
                var sub_leader  = $('#e_subleader').val()
                var end_serial  = $('#e_end_serial').val()

                $.ajax({
                    type: "POST",
                    url: "exec/update.php",
                    data: {
                        lineoutid:line_output,
                        itemcode:item_code,
                        sserial:start_serial,
                        subleader:sub_leader,
                        eserial:end_serial,
                        action:"update_line_output"
                    },
                    dataType: "JSON",
                    success: function (response) {
                    
                        if(response == '1'){

                            editLineInfo()

                            lineOutputInfo()

                            toastr.success('You updated some information', 'Successfully Updated', { "progressBar": true });
                        }

                        else if(response == '2'){
                            toastr.error('Please contact your developer', 'Something went wrong', { "progressBar": true });
                        }

                        else if(response == '3'){
                            toastr.info('Please contact your developer', 'Something went wrong', { "progressBar": true });

                        }
                    }
                })
            }

            

            function changeShift(){

                Swal.fire({
                    title: 'Do you want to change shift?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {

                    if (result.isConfirmed) {

                        $.ajax({
                            type: "POST",
                            url: "exec/insert.php",
                            data: {
                                action:"change_shift"
                            },
                            dataType: "JSON",
                            success: function (response) {
                                
                                if(response == '1'){

                                    lineOutputInfo()

                                    Swal.fire('Successfully Changed', '', 'success')

                                    setTimeout(function(){

                                        location.href='index.php'

                                        // $('#output_tbl').DataTable().destroy()
    
                                        // timeTables('output_tbl')

                                    }, 1000)

                                }

                                else if(response == '2' || response == '3'){

                                    toastr.error('Please contact your developer', 'Something went wrong', { "progressBar": true });
                                }

                                else if(response == '4'){

                                    toastr.info('Only two shifts per day allowed', 'Cannot change shift', { "progressBar": true });
                                }
                            }
                        })
                    }

                })
            }



            function openShiftLogs(){

                $('#shiftLogMod').modal('show')

                shiftLogTbl('shiftlog_tbl')
            }

            function Line_Status_modal(){ //jm

                $('#LineStatusMod').modal('show')


            }



            function shiftLogTbl(id){

                var output=''

                var lineoutput_Id   = $('#line_output_Id').val()

                $.ajax({
                    type: "POST",
                    url: "exec/fetch.php",
                    data: {
                        action:"shiftlogs_tbl"
                    },
                    dataType: "JSON",
                    success: function (response) {
                        
                        $.each(response, function(key, value){

                            output+='<tr>'
                            output+='<td class="font-weight-bold">'+ value.Date_added +' | '+ value.Time_added +'</td>'
                            output+='<td class="font-weight-bold text-success text-uppercase">'+ value.Shift_val +'</td>'
                            output+='<td>'
                            output+='<button type="button" class="btn btn-danger btn-squared font-weight-bold" onclick="deleteShiftLog(`'+ value.Lineout_Id +'`)">'
                            output+='<span class="fa fa-trash"></span>'
                            output+=' Delete'
                            output+='</button>'
                            output+='</td>'
                            output+='</tr>'
                        })

                        $('#'+id).html(output)
                    }
                })
            }



            function deleteShiftLog(lineout_id){

                Swal.fire({
                    title: 'Do you want to remove shift?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',        
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {

                    if (result.isConfirmed) {

                        $.ajax({
                            type: "POST",
                            url: "exec/delete.php",
                            data: {
                                lineoutid:lineout_id,
                                action:"delete_shift_log"
                            },
                            dataType: "JSON",
                            success: function (response) {
                                
                                if(response == '1'){

                                    Swal.fire('Successfully Removed', '', 'success')

                                    setTimeout(function(){

                                        location.href='index.php'

                                    }, 500)
                                }

                                else if(response == '2'){

                                    toastr.error('Please contact your developer', 'Something went wrong', { "progressBar": true });
                                }

                                else if(response == '3') {

                                    toastr.info('Please try again', 'Item has been missing', { "progressBar": true });
                                }
                            }
                        })
                    }

                })
            }

        </script>
        
    </body>

</html>