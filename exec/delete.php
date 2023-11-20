<?php

    include "../includes/db.php";
    include "../includes/functions.php";

    if(isset($_POST['action'])){

        

        if($_POST['action'] == 'delete_log'){

            if(isset($_POST['recid'])){

                $record_Id = $_POST['recid'];

                $query  = "DELETE FROM output_records WHERE Rec_Id = '$record_Id' ";
                $remove = mysqli_query($con, $query);

                if($remove){

                    echo json_encode('1');
                }

                else{

                    echo json_encode('2');
                }
            }
        }



        else if($_POST['action'] == 'delete_line'){

            if(isset($_POST['lineid'])){

                $line_Id = $_POST['lineid'];

                $query  = "UPDATE prod_lines SET `Status` = 0 ";
                $query .="WHERE Line_Id = '$line_Id' ";

                $remove = mysqli_query($con, $query);

                if($remove){

                    echo json_encode('1');
                }

                else{

                    echo json_encode('2');
                }
            }

            else{

                echo json_encode('3');
            }
        }



        else if($_POST['action'] == 'delete_time'){

            if(isset($_POST['timeid'])){

                $time_Id = $_POST['timeid'];

                $query = "UPDATE time_table SET `Status` = 0 ";
                $query .="WHERE Time_Id = '$time_Id' ";

                $remove = mysqli_query($con, $query);

                if($remove){

                    echo json_encode('1');
                }

                else{

                    echo json_encode('2');
                }
            }

            else{

                echo json_encode('3');
            }
        }



        else if($_POST['action'] == 'delete_shift_log'){

            if($_POST['lineoutid'] != ''){

                $lineout_Id = $_POST['lineoutid'];

                $query = "DELETE FROM line_output WHERE Line_Output_Id = '$lineout_Id' ";

                $remove = mysqli_query($con, $query);

                if($remove){

                    $query2 = "DELETE FROM output_records WHERE Line_Output_Id = '$lineout_Id' ";

                    $remove2 = mysqli_query($con, $query2);

                    if($remove2){

                        echo json_encode('1');
                    }

                    else{

                        echo json_encode('2');
                    }
                }

                else{

                    echo json_encode('2');
                }
            }

            else{

                echo json_encode('3');
            }

        }
        
    }

?>