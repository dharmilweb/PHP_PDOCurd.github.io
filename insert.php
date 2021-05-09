<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> pdo curd </title>

    <?php include_once "link.php"; ?>

</head>
<body>
    
    <!-- View Files :-  -->

    <!-- header part Start -->
    <?php include_once "header.php"; ?>
    <!-- Header Part End -->

    <div class="container">

        <div class="row">

            <div class="col-md-12 mx-auto">
            
                <h2 class="text-center text-warning bg-light mt-5"> PHP PDO CURD Operation  </h2>
                <h4 class="text-center text-primary bg-light mb-5">Using Bootstrap 4, AJAX, DataTable & SweetAlert 2, PDO-MySQL, PHP-OPP</h4>

                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="text-warning mt-3"> All Users in Database... </h4>
                    </div>
                    <div class="col-lg-6">
                        <button class="btn btn-success m-1 float-right" type="button" data-toggle="modal" data-target="#Add_User_Model"> 
                            <i class="fa fa-user-plus" aria-hidden="true"></i> Add New User 
                        </button>
                        <a href="#" class="btn btn-warning m-1 float-right"> 
                            <i class="fa fa-table" aria-hidden="true"></i> Export To Excel
                        </a>
                    </div>
                </div>

                <hr class="my-2">
                <div class="row">
                
                    <div class="col-lg-12">

                        <div class="table-responsive my-3" id="Show_TableUsers">
                        

                        </div>

                    </div>

                </div>
            </div>
        
        </div>

    </div>

    <!-- Add New User Model -->

<!-- Modal -->
    <div class="modal fade" id="Add_User_Model" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Add_User_ModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"> Add New User </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <form action="" method="post" id="Form_Data">
                        
                        <div class="form-group">
                            <input type="text" placeholder="first name" name="m_fname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Last name" name="m_lname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="asd@gmail.com" name="m_email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Phone No." name="m_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for=""> Gender </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="Gen_M" name="m_Gen" value="male">
                                <label for="" class="form-check-label"> Male </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="Gen_F" name="m_Gen" value="female">
                                <label for="" class="form-check-label"> Female </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Language </label>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="F_Lang1" name="m_Sel[]" value="Gujarati">
                                <label for="F_Lang" class="form-check-label"> Gujarati </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="F_Lang2" name="m_Sel[]" value="Hindi">
                                <label for="F_Lang" class="form-check-input"> Hindi </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="F_Lang3" name="m_Sel[]" value="English">
                                <label for="F_Lang" class="form-check-label"> English </label>
                            </div>
                        </div>

                        <button type="button" class="btn btn-secondary m-1 float-right" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary m-1 float-right" name="insert" id="Insert_Data"> Add User </button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    
    <!-- Edit User Model -->

    <!-- Modal -->
    <div class="modal fade" id="Action_EditModel" data-dismiss="modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Action_EditModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"> Edit User </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <form action="" method="post" id="Edit_Form_Data">
                        
                        <input type="hidden" name="edit_id" id="Edit_Ids">

                        <div class="form-group">
                            <input type="text" name="up_fname" class="form-control" id="edit_fname" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="up_lname" class="form-control" id="edit_lname" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="up_email" class="form-control" id="edit_email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="up_number" class="form-control" id="edit_number" required>
                        </div>
                        <div class="form-group">
                            <label for=""> Gender </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="Edit_GenM" name="up_Gen" value="male">
                                <label for="" class="form-check-label"> Male </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="Edit_GenF" name="up_Gen" value="female">
                                <label for="" class="form-check-label"> Female </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Language </label>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="Edit_Lang1" name="up_Sel[]" value="Gujarati">
                                <label for="F_Lang" class="form-check-label"> Gujarati </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="Edit_Lang2" name="up_Sel[]" value="Hindi">
                                <label for="F_Lang" class="form-check-input"> Hindi </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="Edit_Lang3" name="up_Sel[]" value="English">
                                <label for="F_Lang" class="form-check-label"> English </label>
                            </div>
                        </div>

                        <button type="button" class="btn btn-secondary m-1 float-right" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary m-1 float-right" name="edit_Btn" id="Edit_Data"> Update User Data </button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <script>

        // AJAX Start
        $(document).ready(function(){

            // DataTable() function is implement work because It's Link is Present in Project // link.php Page
            // $("table").DataTable();

            showAllUsers();

            function showAllUsers(){
                $.ajax({
                    url: "database/action.php",
                    type: "POST",
                    data: {action:"view"},success:function(response){
                        // console.log(response);
                        $("#Show_TableUsers").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }
            
            // Insert AJAX Requiest :-
           $("#Insert_Data").click(function(e){
                
                if($("#Form_Data")[0].checkValidity()){
                    e.preventDefault();
                    $.ajax({

                        url:"database/action.php",
                        type: "POST",
                        data: $("#Form_Data").serialize()+"&action=Inserted",success:function(response){
                             console.log(response);
                            Swal.fire({
                                icon: 'success',
                                title: "User Successfully Add",
                                text: 'This Data is Successfully Send!',
                                footer: '<a href>Why do I have this issue?</a>'
                            });
                            $("#Add_User_Model").modal("hide");
                            $("#Form_Data")[0].reset();

                            showAllUsers();
                        }
                    });
                }
           });
    
           // Update User Select AJAX Request :-

           $("body").on("click",".Action_EditBtn",function(e){

                // Check Action_EditBtn Button click event working or not 
                //console.log("Edit Button Working");

                e.preventDefault();
                Edit_Form_Data = $(this).attr("id");
                
                // Check id Print inside console Successfull or not through Edit_Form_Data
                //console.log(Edit_Form_Data);

                $.ajax({
                    url:"database/action.php",
                    type:"POST",
                    data:{Edit_Form_Data:Edit_Form_Data},success:function(response){
                        
                        // Check Id all data print in console by json formate
                        //console.log(response);

                        $Edit_Data = JSON.parse(response);
                        
                        // Check Edit_Data JSON encode data print into console
                        //console.log($Edit_Data);

                        $("#Edit_Ids").val($Edit_Data.id);
                        $("#edit_fname").val($Edit_Data.first_name);
                        $("#edit_lname").val($Edit_Data.last_name);
                        $("#edit_email").val($Edit_Data.email);
                        $("#edit_number").val($Edit_Data.phone);
                        
                    }
                });

           });
    
           // Update Insert AJAX Request :-
           $("#Edit_Data").click(function(e){

                if($("#Edit_Form_Data")[0].checkValidity()){
                    e.preventDefault();

                    $.ajax({
                        url:"database/action.php",
                        type:"POST",
                        data:$("#Edit_Form_Data").serialize()+"&action=Update_Insert",success:function(response){
                            console.log(response);
                            Swal.fire({
                                icon: "success",
                                title: "Updated Data Successfull",
                                text: "Updated Data Successfully Send!"

                            })

                            $("#Action_EditModel").modal("hide");
                            $("#Edit_Form_Data")[0].reset();
                            showAllUsers();
                        }
                    });
                }
           });
           
           // Delete AJAX Request :-
           $("body").on("click",".Action_DeleteBtn",function(e){

                e.preventDefault();
                // e.preventDefault;  It's function using to stop refresh the hall page[pura page].
                var tr = $(this).closest("tr");
                del_id = $(this).attr("id");
                
                Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                            
                        }).then((result) => {
                            if (result.value) {

                                $.ajax({
                                    url:"database/action.php",
                                    type:"POST",
                                    data: {del_id:del_id},success:function(response){
                                
                                        console.log(response);
                                        tr.css("backgroud-color","#ff6666");
                                
                                        Swal.fire(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                        )
                                        showAllUsers();   
                                    }
                                });

                                
                            }
                        })
           });

        });
    
    </script>


</body>
</html>