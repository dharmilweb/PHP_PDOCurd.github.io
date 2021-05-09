<?php

    // Controller Files
    // --------------------
    require_once "db.php";
    $db = new Database();

    if(isset($_POST["action"]) && $_POST["action"] == "view"){
        
        $Output = "";
        $Data = $db->Read_Data();
        // print_r($Data);

        if($db->TotalrowCount()>0){
            $Output .= '<table class="table table-bordered table-striped">
                         
                            <thead>
                                <tr class="text-center">
                                    <th> ID </th>
                                    <th> First Name </th>
                                    <th> Last Name </th>
                                    <th> Email </th>
                                    <th> Phone </th>
                                    <th> Gender </th>
                                    <th> Language </th>
                                    <!-- <th> Birth Date </th> -->
                                    <th> Action </th>
                                    
                                </tr>
                            </thead>
                            <tbody>';

                        foreach($Data as $Rows){
                            $Output .= '<tr class="text-center text-secondery">
                                            <td> '.$Rows["id"].' </td>
                                            <td> '.$Rows["first_name"].' </td>
                                            <td> '.$Rows["last_name"].' </td>
                                            <td> '.$Rows["email"].' </td>
                                            <td> '.$Rows["phone"].' </td>
                                            <td> '.$Rows["gender"].' </td>
                                            <td> '.$Rows["language"].' </td>
                                            <td>    
                                                <a href="#" title="This is My Info Icon" class="text-success Action_InfoBtn" id=" '.$Rows["id"].'">
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i> 
                                                </a>&nbsp;&nbsp;
                                                
                                                <a href="#" title="This is My Edit Icon" class="text-primary Action_EditBtn" data-toggle="modal" data-target="#Action_EditModel" id=" '.$Rows["id"].'">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>&nbsp;&nbsp;
                                                
                                                <a href="#" title="This is My Delete Icon" class=" text-danger Action_DeleteBtn" id=" '.$Rows["id"].'">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>';
                        }
                        $Output .= '</tbody>
                                        </table>';
                        echo $Output;
        }else{
            echo "NO any User Data";
        }
    }

    if(isset($_POST["action"]) && $_POST["action"] == "Inserted"){

        $Model_FName = $_POST["m_fname"];
        $Model_LName = $_POST["m_lname"];
        $Model_Email = $_POST["m_email"];
        $Model_Num = $_POST["m_number"];
        $Model_Gen = $_POST["m_Gen"];
        
        $Sel = $_POST["m_Sel"];
        $Model_Sel = implode(", " , $Sel);

        $db->Insert($Model_FName, $Model_LName, $Model_Email, $Model_Num, $Model_Gen, $Model_Sel);
        //echo "$Model_FName, $Model_LName, $Model_Email, $Model_Num, $Model_Gen, $Model_Sel" ;

    }else{

    }

    if(isset($_POST["Edit_Form_Data"])){
        $id = $_POST["Edit_Form_Data"];

        $Rows= $db->GetUserById($id);
        echo json_encode($Rows);
    }

    if(isset($_POST["action"]) && $_POST["action"] == "Update_Insert"){
        
        $id = $_POST["edit_id"];
        $Update_FName = $_POST["up_fname"];
        $Update_LName = $_POST["up_lname"];
        $Update_Email = $_POST["up_email"];
        $Update_Num = $_POST["up_number"];
        $Update_Gen = $_POST["up_Gen"];
        
        $Up_Sel = $_POST["up_Sel"];
        $Update_Sel = implode(", " , $Up_Sel);

        $db->Update_Data($id,$Update_FName,$Update_LName,$Update_Email,$Update_Num,$Update_Gen,$Update_Sel);
        //print_r($id,$Update_FName,$Update_LName,$Update_Email,$Update_Num,$Update_Gen,$Update_Sel);
    }else{
        
        //$db->Update_Data(4,"Grate Marvel","True Leader","marvels@gmail.com","1562374809","male","gujrati,english,hindi");

    }

    if(isset($_POST["del_id"])){

        $id=$_POST["del_id"];
        $db->Delete($id);
    }

?>