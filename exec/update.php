<?php

    include "../includes/db.php";
    include "../includes/functions.php";
    


    if(isset($_COOKIE['OMS_line_Id'])){

        $line_Id = $_COOKIE['OMS_line_Id'];
    }

    else{

        $line_Id = "";

    }




    if(isset($_POST['action'])){

        

        if($_POST['action'] == 'edit_timetable'){

            if( isset($_POST['timeid']) && 
                isset($_POST['timeval']) && 
                isset($_POST['timeval2']) ){

                $time_Id    = $_POST['timeid'];
                $time_val   = $_POST['timeval'];
                $time_val2  = $_POST['timeval2'];

                $time_arr = array(
                    '01' => '13',
                    '02' => '14',
                    '03' => '15',
                    '04' => '16',
                    '05' => '17',
                    '06' => '18',
                    '07' => '19',
                    '08' => '20',
                    '09' => '21',
                    '10' => '22',
                    '11' => '23',
                    '12' => '00',
                    '13' => '01',
                    '14' => '02',
                    '15' => '03',
                    '16' => '04',
                    '17' => '05',
                    '18' => '06',
                    '19' => '07',
                    '20' => '08',
                    '21' => '09',
                    '22' => '10',
                    '23' => '11',
                    '24' => '00',
                );

                $time_trimmed = substr($time_val2, 0,2);

                if($time_trimmed > 12){

                    $time_val3 = date('h:i a', strtotime($time_val2));
                }

                else{

                    $time_key = array_search($time_trimmed, $time_arr);

                    $time_val3 = $time_key.":00:00";
                }

                $query = "UPDATE time_table SET Time_val = '$time_val', Time_val2 = '$time_val2', Time_val3 = '$time_val3' ";
                $query .="WHERE Time_Id = '$time_Id' ";

                $update = mysqli_query($con, $query);

                if($update){

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
        
        

        else if($_POST['action'] == 'update_line_output'){

            if( isset($_POST['lineoutid']) && 
                isset($_POST['itemcode']) && 
                isset($_POST['sserial']) && 
                isset($_POST['subleader']) && 
                isset($_POST['eserial']) ){

                $line_out_Id    = $_POST['lineoutid'];
                $item_code      = $_POST['itemcode'];
                $start_serial   = $_POST['sserial'];
                $sub_leader     = $_POST['subleader'];
                $end_serial     = $_POST['eserial'];

                $query = "UPDATE 
                            line_output ";

                $query .="SET 
                            Model_code = '$item_code', 
                            Sub_leader = '$sub_leader', 
                            Start_serial = '$start_serial', 
                            End_serial = '$end_serial' ";

                $query .="WHERE 
                            Line_Output_Id = '$line_out_Id' ";   

                $update = mysqli_query($con, $query);

                if($update){

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

        

        else if($_POST['action'] == 'edit_line'){

            if(isset($_POST['lineid2']) && isset($_POST['lineval']) && isset($_POST['linepass'])){

                $e_line_Id  = $_POST['lineid2'];
                $line_val   = $_POST['lineval'];
                $line_pass  = $_POST['linepass'];

                $line_pass = password_hash($line_pass, PASSWORD_BCRYPT, array('cost' => 12));

                $query = "UPDATE prod_lines SET Line_name = '$line_val', ";
                $query .="Password = '$line_pass' ";
                $query .="WHERE Line_Id = '$e_line_Id' ";

                $update = mysqli_query($con, $query);

                if($update){

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


        
    }

?>