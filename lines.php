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

        <title>OMS | Lines</title>

        <link rel="shortcut icon" href="assets/images/Logo//favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-web/css/all.min.css">

        <link rel="stylesheet" href="assets/css/shards.min.css">

        <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">
        
        <link rel="stylesheet" href="assets/DataTables-1.10.16/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="assets/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="assets/css/responsive.dataTables.min.css">
        
        <link rel="stylesheet" href="assets/css/select2.min.css">

        <link rel="stylesheet" href="assets/css/toastr.min.css">

        <link rel="stylesheet" href="assets/css/app.css">

    </head>

    <body class="bg-white">

        <!-- =================== Navbar ====================== -->
            <?php include('includes/navbar.php'); ?>
        <!-- =================== Navbar END ================== -->

        <div class="container-fluid">

            <div>
                <h4 class="font-weight-bold text-uppercase">
                    <button 
                        type="button" 
                        class="btn btn-dark btn-squared" 
                        onclick="location.href='settings.php';"
                    >
                    <span class="fa fa-arrow-left"></span></button>
                    Lines
                </h4>
            </div>

            <hr>

            <div class="row">

                <div class="col-lg-8">

                    <table 
                        class="table table-striped table-hover table-bordered display nowrap" 
                        cellspacing="0" 
                        style="width:100%; font-size:20px;" 
                        id="lines_tbl">

                        <thead class="bg-secondary text-white text-uppercase">
                            <tr>
                                <th>Line</th>
                                <th>Targets</th>
                                <th>Date Added</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody></tbody>

                    </table>

                </div>

                <div class="col-lg">

                    <!-- ===================== Add New Form ====================== -->
                        <form method="POST" id="newLineForm" style="font-size:20px;">
                            
                            <div class="card bg-white">

                                <div class="card-header bg-white">
                                    <h4 class="text-uppercase font-weight-bold">Add New Line</h4>
                                </div>

                                <div class="card-body">

                                    <div class="form-group">
                                        <p><b>Line <span class="text-danger">(*)</span></b></p>
                                        <input type="number" class="form-control" name="line_val" id="line_val" placeholder="Please input line name here" required>
                                    </div>

                                    <div class="form-group">
                                        <p><b>Password <span class="text-danger">(*)</span></b></p>
                                        <input type="password" class="form-control" name="line_pass" id="line_pass" placeholder="Please input password here" required>
                                    </div>

                                    <div class="form-group">
                                        <p><b>Retype Password <span class="text-danger">(*)</span></b></p>
                                        <input type="password" class="form-control" name="repass" id="repass" placeholder="Please re-type password" required>
                                    </div>

                                </div>

                                <div class="card-footer text-right bg-white">
                                    <button type="submit" class="btn btn-success btn-squared font-weight-bold"> <span class="fa fa-check"></span> Submit</button>
                                    <button type="button" class="btn btn-secondary btn-squared font-weight-bold" onclick="$('#newLineForm')[0].reset()">Clear</button>
                                </div>

                            </div>

                        </form>
                    <!-- ===================== Add New Form END ================== -->

                    <!-- ===================== Edit Form ==================== -->
                        <form method="POST" id="editLineForm" style="display:none; font-size:20px;">
                            
                            <div class="card bg-white">

                                <div class="card-header bg-white">
                                    <h4 class="text-uppercase font-weight-bold">Edit Line</h4>
                                </div>

                                <div class="card-body">

                                    <input type="hidden" name="e_line_Id2" id="e_line_Id2">

                                    <div class="form-group">
                                        <p><b>Line <span class="text-danger">(*)</span></b></p>
                                        <input type="text" class="form-control" name="e_line_val2" id="e_line_val2" placeholder="Please input time here" required>
                                    </div>

                                    <div class="form-group">
                                        <p><b>Password <span class="text-danger">(*)</span></b></p>
                                        <input type="password" class="form-control" name="e_line_pass2" id="e_line_pass2" placeholder="Please input password here" required>
                                    </div>

                                    <div class="form-group">
                                        <p><b>Retype Password <span class="text-danger">(*)</span></b></p>
                                        <input type="password" class="form-control" name="e_repass2" id="e_repass2" placeholder="Please retype password here">
                                    </div>

                                </div>

                                <div class="card-footer text-right bg-white">   
                                    <button type="submit" class="btn btn-info btn-squared font-weight-bold"> <span class="fa fa-check"></span> Save</button>
                                    <button type="button" class="btn btn-secondary btn-squared font-weight-bold" onclick="cancelBtn()">Cancel</button>
                                </div>

                            </div>

                        </form>
                    <!-- ===================== Edit Form END ================ -->

                    <!-- ===================== Line Targets ===================== -->
                        <div class="card bg-white" id="lineTargetCard" style="display:none; font-size:20px;">

                            <div class="card-header bg-white d-flex align-items-center justify-content-between">
                                <h4 class="text-uppercase font-weight-bold"> <span id="line_txt">Line n</span> - Targets</h4>
                                <h3><span class="fa fa-close" onclick="closeTargetCard()"></span></h3>
                            </div>

                            <div class="card-body">

                                <table class="table table-bordered display nowrap" cellspacing="0" style="width:100%;" id="line_targets_tbl">

                                    <thead class="bg-secondary text-white text-uppercase font-weight-bold">
                                        <tr>
                                            <th>Time</th>
                                            <th>Target</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody></tbody>

                                </table>

                            </div>

                            <!-- <div class="card-footer text-right bg-white">
                                <button type="button" class="btn btn-secondary font-weight-bold" onclick="closeTargetCard()">Close</button>
                            </div> -->

                        </div>
                    <!-- ===================== Line Targets END ================= -->

                    <!-- ===================== Targets Modal ==================== -->
                        <div class="modal fade show" id="editTargetMod">

                            <div class="modal-dialog">

                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title font-weight-bold text-uppercase">Edit Target</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <form method="POST" id="editTargetForm">

                                        <div class="modal-body">

                                            <input type="hidden" name="e_time_id" id="e_time_id">

                                            <input type="hidden" name="e_line_id" id="e_line_id">

                                            <h5 class="font-weight-bold">Time: &nbsp<span class="text-info" id="time_val_txt"></span></h5>

                                            <br>

                                            <div class="form-group">
                                                <input type="number" class="form-control" name="e_target_val" id="e_target_val" placeholder="Input target here" required>
                                            </div>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-squared font-weight-bold"> <span class="fa fa-check"></span> Submit</button>
                                            <button type="button" class="btn btn-secondary btn-squared font-weight-bold" data-dismiss="modal">Close</button>
                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>
                    <!-- ===================== Targets Modal END ================ -->

                </div>

            </div>

        </div>

        <?php include "includes/footer.php"; ?>

        <script src="assets/js/jquery.min.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>

        <script src="assets/js/shards.min.js"></script>

        <!-- <script src="assets/js/datatables.min.js"></script> -->

        
        <script src="assets/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="assets/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/js/dataTables.responsive.min.js"></script>

        <script src="assets/sweetalert2/sweetalert2.min.js"></script>

        <script src="assets/js/select2.min.js"></script>

        <script src="assets/js/toastr.min.js"></script>


        <script>

            $(document).ready(function () {
                
                $('#line_val').focus()

                linesTbl('lines_tbl')

                $('#newLineForm').on('submit', function(aa){

                    aa.preventDefault()

                    var line_val    = $('#line_val').val()
                    var line_pass   = $('#line_pass').val()
                    var repass      = $('#repass').val()

                    if(line_pass != repass){

                        $('#line_pass').addClass('is-invalid')
                        $('#repass').addClass('is-invalid')

                        toastr.error('Please try again', 'Password Not Matched', { "progressBar": true });
                    }

                    else if(line_pass.length < 8){

                        $('#line_pass').addClass('is-invalid')
                        $('#repass').addClass('is-invalid')

                        toastr.error('Please input minimum of 8 characters', 'Password is weak', { "progressBar": true });
                    }

                    else{

                        $('#line_pass').removeClass('is-invalid')
                        $('#repass').removeClass('is-invalid')

                        $.ajax({
                            type: "POST",
                            url: "exec/insert.php",
                            data: {
                                lineval:line_val,
                                linepass:line_pass,
                                action:'new_line'
                            },
                            dataType: "JSON",
                            success: function (response) {
                                
                                if(response == '1'){

                                    $('#newLineForm')[0].reset()

                                    $('#lines_tbl').DataTable().ajax.reload()
                                    
                                    toastr.success('You added a new line', 'Successfully Added', { "progressBar": true });
                                }

                                else if(response == '2' || response == '3'){
                                    
                                    toastr.error('Please contact your developer', 'Something went wrong', { "progressBar": true });
                                }

                                else if(response == '4'){
                                    
                                    toastr.info('Please try other entry', 'Already Exists', { "progressBar": true });
                                }
                            }
                        })
                    }
                })

                $('#editLineForm').on('submit', function(ad){

                    ad.preventDefault()

                    var line_Id2     = $('#e_line_Id2').val()
                    var line_val2    = $('#e_line_val2').val()
                    var line_pass2   = $('#e_line_pass2').val()
                    var repass2      = $('#e_repass2').val()

                    if(line_pass2 != repass2){

                        $('#e_line_pass2').addClass('is-invalid')
                        $('#e_repass2').addClass('is-invalid')

                        toastr.error('Please try again', 'Password not matched', { "progressBar": true });
                    }

                    else{

                        $('#e_line_pass2').removeClass('is-invalid')
                        $('#e_repass2').removeClass('is-invalid')

                        $('#e_line_pass2').addClass('is-valid')
                        $('#e_repass2').addClass('is-valid')

                        $.ajax({
                            type: "POST",
                            url: "exec/update.php",
                            data: {
                                lineid2:line_Id2,
                                lineval:line_val2,
                                linepass:line_pass2,
                                action:"edit_line"
                            },
                            dataType: "JSON",
                            success: function (response) {
                                
                                if(response == '1'){

                                    $('#e_line_pass2').removeClass('is-invalid')
                                    $('#e_repass2').removeClass('is-invalid')

                                    $('#e_line_pass2').addClass('is-valid')
                                    $('#e_repass2').addClass('is-valid')

                                    $('#lines_tbl').DataTable().ajax.reload()

                                    $('#editLineForm').hide()
                                    $('#newLineForm').show()

                                    toastr.success('You updated a line', 'Successfully Updated', { "progressBar": true });
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

                })

                $('#editTimeForm').on('submit', function(ab){

                    ab.preventDefault()

                    var time_val_Id = $('#time_val_Id').val()
                    var e_time_val  = $('#e_time_val').val()

                    $.ajax({
                        type: "POST",
                        url: "exec/update.php",
                        data: {
                            timeid:time_val_Id,
                            timeval:e_time_val,
                            action:"edit_timetable"
                        },
                        dataType: "JSON",
                        success: function (response) {
                            
                            if(response == '1'){

                                $('#editTimeForm')[0].reset()

                                $('#timetable_tbl').DataTable().ajax.reload()

                                $('#editTimeForm').hide() 
                                $('#newTimeForm').show()

                                toastr.success('You updated a timetable', 'Successfully Updated', { "progressBar": true });
                            }

                            else if(response == '2' || response == '3'){

                                toastr.error('Please contact your developer', 'Something went wrong', { "progressBar": true });
                            }
                        }
                    })
                })

                $('#editTargetForm').on('submit', function(ac){

                    ac.preventDefault()

                    var data = $('#editTargetForm').serializeArray()

                    data.push({
                        name:'action',
                        value:'new_target'
                    })

                    $.ajax({
                        type: "POST",
                        url: "exec/insert.php",
                        data: data,
                        dataType: "JSON",
                        success: function (response) {
                            
                            if(response == '1'){

                                $('#editTargetMod').modal('hide')

                                $('#lines_tbl').DataTable().ajax.reload()

                                $('#line_targets_tbl').DataTable().ajax.reload()

                                toastr.success('You updated a target', 'Successfully Updated', { "progressBar": true });
                            }

                            else if(response == '2' || response == '3'){

                                toastr.error('Please contact your developer', 'Something went wrong', { "progressBar": true });
                            }
                        }
                    })
                })

            })



            function linesTbl(id){

                var dataTable = $('#'+id).DataTable({

                    "responsive": true,
                    "processing": true,
                    "serverSide": true,
                    "bSort": true,
                    "bInfo":false,
                    "searching": true,
                    "columnDefs": [
                        { orderable: false, targets: [1, 3] }
                    ],
                    "order": [[0, 'asc']],
                    "ajax" : {
                        url:"datatables/lines_tbl.php",
                        type: "POST",
                    },
                    dom: 'Bfrtip',
                })
            }



            function editTime(time_Id, time_val){

                $('#newTimeForm').hide()
                $('#editTimeForm').show()

                $('#time_val_Id').val(time_Id)
                $('#e_time_val').val(time_val)
            }



            function cancelBtn(){

                $('#editLineForm').hide() 
                $('#newLineForm').show()
            }



            function targetsCard(line_Id, line_name){

                $('#newLineForm').hide()
                $('#editLineForm').hide()
                $('#lineTargetCard').show()

                $('#line_txt').html('line '+line_name)

                $('#line_targets_tbl').DataTable().destroy()

                lineTargetsTbl('line_targets_tbl', line_Id)
                
            }

            

            function closeTargetCard(){

                $('#lineTargetCard').hide()
                $('#newLineForm').show()
            }



            function lineTargetsTbl(id, line_Id){

                var dataTable = $('#'+id).DataTable({

                    "processing" : true,
                    "serverSide" : true,
                    "bSort": true,
                    "bInfo":false,
                    "searching": false,
                    "columnDefs": [
                        { orderable: false, targets: [1, 2] }
                    ],
                    "order": [[0, 'asc']],
                    "ajax" : {
                        url:"datatables/line_targets_tbl.php",
                        method:"POST",
                        data:{
                            lineid:line_Id
                        }
                    },
                    dom: 'Bfrtip',
                })

            }



            function editTargetMod(time_Id, time_val, line_Id, target_val){

                $('#editTargetMod').modal('show')

                $('#e_time_id').val(time_Id)
                $('#e_line_id').val(line_Id)
                
                $('#e_target_val').val(target_val)
                
                $('#time_val_txt').html(time_val)
            }



            function editLine(line_Id){

                $('#lineTargetCard').hide()
                $('#newLineForm').hide()
                $('#editLineForm').show()

                $('#e_line_Id2').val(line_Id)

                $.ajax({
                    type: "POST",
                    url: "exec/fetch.php",
                    data: {
                        lineid:line_Id,
                        action:"line_info"
                    },
                    dataType: "JSON",
                    success: function (response) {

                        $('#e_line_pass2').removeClass('is-valid is-invalid')
                        $('#e_repass2').removeClass('is-valid is-invalid')
                        
                        $('#e_line_val2').val(response)

                        $('#e_line_pass2').val('')
                        $('#e_repass2').val('')
                    }
                })
            }



            function deleteLine(line_Id){

                Swal.fire({
                    title: 'Do you want to delete?',
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
                                lineid:line_Id,
                                action:"delete_line"
                            },
                            dataType: "JSON",
                            success: function (response) {
                                
                                if(response == '1'){

                                    $('#lines_tbl').DataTable().ajax.reload()

                                    Swal.fire('Successfully Removed', '', 'success')
                                }

                                else if(response == '2' || response == '3'){

                                    toastr.error('Please contact your developer', 'Something went wrong', { "progressBar": true });
                                }
                            }
                        })

                    }

                })
            }



        </script>
        
    </body>

</html>