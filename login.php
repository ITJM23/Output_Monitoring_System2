<?php 

    session_start(); 

    include "includes/authenticate.php";
    
?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>OMS | Login</title>

        <link rel="shortcut icon" href="assets/images/Logo//favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="assets/fontawesome-free-6.0.0-web/css/all.min.css">

        <link rel="stylesheet" href="assets/css/shards.min.css">
    
        <link rel="stylesheet" href="assets/css/toastr.min.css">

        <link rel="stylesheet" href="assets/css/app.css">

    </head>

    <body>

        <div class="container"><br>

            <div class="row">

                <div class="col-lg-3"></div>

                <div class="col-lg-6"><br>

                    <div class="d-flex align-items-center justify-content-center">
                        <img src="assets/images/Logo/output_logo_3.png" height="50" alt="">
                        <h4 class="font-weight-bold text-uppercase ml-4">Output Monitoring System</h4>
                    </div>

                    <br>

                    <div class="text-center">
                        <h5>Choose a line</h5>
                    </div>
                    
                    <hr>

                    <div class="row" id="line_cards"></div>

                </div>

                <div class="col-lg-3"></div>

            </div>

            <hr>

            <div class="row">

                <div class="col-lg-3"></div>

                <div class="col-lg-2">
                    <div class="card pointer-cursor" title="Output panel view" onclick="location.href='output_panel.php';">
                        <div class="card-body d-flex align-items-center" style="justify-content: space-between;">
                            <!-- <div class="d-flex align-items-center"> -->
                                <h3><span class="fa-solid fa-table-cells mr-4 text-info"></span></h3>
                            <!-- </div> -->
                            <h5>Panel</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card pointer-cursor" title="Login as Administrator" data-toggle="modal" data-target="#admLoginMod">
                        <div class="card-body d-flex align-items-center" style="justify-content: space-between;">
                            <div class="d-flex align-items-center">
                                <h3><span class="fa fa-user mr-4 text-success"></span></h3>
                                <h5>Administrator Login</h5>
                            </div>
                            <h4<span class="fa fa-chevron-right"></span></h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3"></div>

            </div>


            <!-- ====================== Line Login =================== -->
                <div class="modal fade show" id="loginMod">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title font-weight-bold text-uppercase">Please Enter Password</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <form method="POST" id="loginForm">

                                <div class="modal-body">

                                    <h5 class="font-weight-bold">Line: <span class="text-info" id="line_txt"></span></h5><br>

                                    <input type="hidden" name="line_id" id="line_id">

                                    <input type="hidden" name="line_name" id="line_name">

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="line_pass" id="line_pass" placeholder="Input password here" required>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btn-squared font-weight-bold"> <span class="fa fa-check"></span> Submit</button>
                                    <button type="button" class="btn btn-secondary btn-squared font-weight-bold" data-dismiss="modal">Close</button>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>
            <!-- ====================== Line Login END =============== -->

            <!-- ====================== Administrator Login ================== -->
                <div class="modal fade show" id="admLoginMod">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title font-weight-bold text-uppercase">Please Enter Password</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <form method="POST" id="admLoginForm">

                                <div class="modal-body">

                                    <p><b>Username</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="admin_usrname" id="admin_usrname" placeholder="Input username here" required>
                                    </div>

                                    <p><b>Password</b></p>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="admin_pass" id="admin_pass" placeholder="Input password here" required>
                                    </div>

                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btn-squared font-weight-bold"> <span class="fa fa-check"></span> Submit</button>
                                    <button type="button" class="btn btn-secondary btn-squared font-weight-bold" data-dismiss="modal">Close</button>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>
            <!-- ====================== Administrator Login END ============== -->

            <br>

            <?php include "includes/footer.php"; ?>

        </div>

        <script src="assets/js/jquery.min.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>

        <script src="assets/js/shards.min.js"></script>

        <script src="assets/js/toastr.min.js"></script>

        <script>

            $(document).ready(function () {
                
                lineCards('line_cards')

                $('#loginForm').on('submit', function(aa){

                    aa.preventDefault()

                    var line_Id     = $('#line_id').val()
                    var line_pass   = $('#line_pass').val()

                    $.ajax({
                        type: "POST",
                        url: "exec/fetch.php",
                        data: {
                            lineid:line_Id,
                            linepass:line_pass,
                            action:'login'
                        },
                        dataType: "JSON",
                        success: function (response) {
                            
                            if(response == '1'){

                                location.href='index.php';
                            }

                            else if(response == '2'){

                                toastr.error('Please try again', 'Invalid Password', { "progressBar": true });
                            }

                            else if(response == '3'){

                                toastr.error('Please contact your developer', 'Something went wrong', { "progressBar": true });
                            }

                            else if(response == '4'){

                                toastr.error('Please contact your developer', 'Something went wrong', { "progressBar": true });
                            }
                        }
                    })
                })

                $('#admLoginForm').on('submit', function(ab){

                    ab.preventDefault()

                    var data = $('#admLoginForm').serializeArray()

                    data.push({
                        name:'action',
                        value:'login_admin'
                    })

                    $.ajax({
                        type: "POST",
                        url: "exec/fetch.php",
                        data: data,
                        dataType: "JSON",
                        success: function (response) {
                            
                            if(response == '1'){

                                location.href='dashboard.php';
                            }

                            else if(response == '2'){

                                toastr.error('Please try again', 'Invalid Password', { "progressBar": true });
                            }

                            else if(response == '3'){

                                toastr.error('Please contact your developer', 'Something went wrong', { "progressBar": true });
                            }

                            else if(response == '4'){

                                alert('You don\'t have an account')

                                toastr.error('Please register', 'You don\'t have an account', { "progressBar": true });
                            }
                        }
                    })
                })
            })  



            function loginForm(line_name, line_Id){

                $('#loginMod').modal('show')

                $('#line_id').val(line_Id)
                $('#line_name').val(line_name)
                $('#line_txt').html(line_name)
            }

            

            function lineCards(id){

                $.ajax({
                    type: "POST",
                    url: "exec/fetch.php",
                    data: {
                        action:"line_cards"
                    },
                    dataType: "JSON",
                    success: function (response) {

                        // console.log(response)

                        // var output =''
                        
                        // $.each(response, function(key, value){

                        //     output+='<div class="col-lg-4">'
                        //     output+='<div class="card m-1 pointer-cursor" onclick="loginForm('+ value +', '+ key +')">'
                        //     output+='<div class="card-body text-center">'
                        //     output+='<h1>'+ value +'</h1>'
                        //     output+='</div>'
                        //     output+='</div>'
                        //     output+='</div>'
                        // })

                        $('#'+id).html(response)
                    }
                })
            }

        </script>
        
    </body>

</html>