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

        <title>OMS | Timetables</title>

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
                    Timetables
                </h4>
            </div>

            <hr>

            <div class="row">

                <div class="col-lg-8">

                    <table 
                        class="table table-striped table-hover table-bordered" 
                        id="timetable_tbl"
                        style="font-size:20px;">

                        <thead class="bg-secondary text-white text-uppercase">
                            <tr>
                                <th>Time</th>
                                <th>Date Added</th>
                                <!-- <th>Added by</th> -->
                                <th></th>
                            </tr>
                        </thead>

                        <tbody></tbody>

                    </table>

                </div>

                <div class="col-lg">

                    <!-- ===================== Add New Form ====================== -->
                        <form method="POST" id="newTimeForm" style="font-size:20px;">
                            
                            <div class="card bg-white">

                                <div class="card-header bg-white">
                                    <h4 class="text-uppercase font-weight-bold">Add New Time</h4>
                                </div>

                                <div class="card-body">

                                    <div class="form-group">
                                        <p><b>Time Name <span class="text-danger">(*)</span></b></p>
                                        <input type="text" class="form-control" name="time_val" id="time_val" placeholder="Please input time here" required>
                                    </div>

                                    <div class="form-group">
                                        <p><b>Time <span class="text-danger">(*)</span></b></p>
                                        <input type="time" class="form-control" name="time_val2" id="time_val2" min="07:00" max="19:00" required>
                                    </div>

                                </div>

                                <div class="card-footer text-right bg-white">
                                    <button type="submit" class="btn btn-success btn-squared font-weight-bold"> <span class="fa fa-check"></span> Submit</button>
                                    <button type="button" class="btn btn-secondary btn-squared font-weight-bold">Clear</button>
                                </div>

                            </div>

                        </form>
                    <!-- ===================== Add New Form END ================== -->

                    <!-- ===================== Edit Form ==================== -->
                        <form method="POST" id="editTimeForm" style="display:none; font-size:20px;">
                            
                            <div class="card bg-white">

                                <div class="card-header bg-white">
                                    <h4 class="text-uppercase font-weight-bold">Edit Time</h4>
                                </div>

                                <div class="card-body">

                                    <input type="hidden" name="time_val_Id" id="time_val_Id">

                                    <div class="form-group">
                                        <p><b>Time Name <span class="text-danger">(*)</span></b></p>
                                        <input type="text" class="form-control" name="e_time_val" id="e_time_val" placeholder="Please input time here" required>
                                    </div>

                                    <div class="form-group">
                                        <p><b>Time <span class="text-danger">(*)</span></b></p>
                                        <input type="time" class="form-control" name="e_time_val2" id="e_time_val2" required>
                                    </div>

                                </div>

                                <div class="card-footer text-right bg-white">
                                    <button type="submit" class="btn btn-info btn-squared font-weight-bold"> <span class="fa fa-check"></span> Save</button>
                                    <button type="button" class="btn btn-secondary btn-squared font-weight-bold" onclick="cancelBtn()">Cancel</button>
                                </div>

                            </div>

                        </form>
                    <!-- ===================== Edit Form END ================ -->

                </div>

            </div>

        </div>

        <?php include "includes/footer.php"; ?>

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
                
                $('#time_val').focus()

                timeTbl('timetable_tbl')

                $('#newTimeForm').on('submit', function(aa){

                    aa.preventDefault()

                    var time_val    = $('#time_val').val()
                    var time_val2   = $('#time_val2').val()

                    // alert(time_val2.substring(0,2))

                    $.ajax({
                        type: "POST",
                        url: "exec/insert.php",
                        data: {
                            timeval:time_val,
                            timeval2:time_val2,
                            action:'new_timetable'
                        },
                        dataType: "JSON",
                        success: function (response) {
                            
                            if(response == '1'){

                                $('#newTimeForm')[0].reset()

                                $('#timetable_tbl').DataTable().ajax.reload()
                                
                                toastr.success('You added a new timetable', 'Successfully Added', { "progressBar": true });

                                $('#time_val').focus()
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

                $('#editTimeForm').on('submit', function(ab){

                    ab.preventDefault()

                    var time_val_Id = $('#time_val_Id').val()
                    var e_time_val  = $('#e_time_val').val()
                    var e_time_val2 = $('#e_time_val2').val()

                    $.ajax({
                        type: "POST",
                        url: "exec/update.php",
                        data: {
                            timeid:time_val_Id,
                            timeval:e_time_val,
                            timeval2:e_time_val2,
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

            })



            function timeTbl(id){

                var dataTable = $('#'+id).DataTable({

                    "responsive": true,
                    "processing": true,
                    "serverSide": true,
                    "bSort": true,
                    "bInfo":false,
                    "searching": true,
                    "columnDefs": [
                        { orderable: false, targets: 2 }
                    ],
                    "order": [[0, 'asc']],
                    "ajax" : {
                        url:"datatables/timetables_tbl.php",
                        type: "POST",
                    },
                    dom: 'Bfrtip',
                })
            }



            function editTime(time_Id, time_val, time_val2){

                $('#newTimeForm').hide()
                $('#editTimeForm').show()

                $('#time_val_Id').val(time_Id)
                $('#e_time_val').val(time_val)
                $('#e_time_val2').val(time_val2)
            }



            function cancelBtn(){

                $('#editTimeForm').hide() 
                $('#newTimeForm').show()
            }



            function deleteTimeTbl(time_Id){

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
                                timeid:time_Id,
                                action:"delete_time"
                            },
                            dataType: "JSON",
                            success: function (response) {
                                
                                if(response == '1'){

                                    $('#timetable_tbl').DataTable().ajax.reload()

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