<!DOCTYPE html>
<html>
<head>
<title>Accounts</title>
    <link rel="stylesheet" href="assets/css/bg.css"> <!-- Background -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- //// -->

    <style>
  .hide-data {
    display: none;
  }
  th:first-child {
        display: none;
    }
</style>
</head>

<body>
    
 <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> <!-- Edit Modal --> 
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Edit Details </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="Edit_acc" method="POST">

                            <div class="modal-body">

                                <input type="hidden" name="id" id="id">

                                <div class="form-group">
                                    <label> First Name </label>
                                    <input type="text" name="firstname" id="firstname" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label> Middle Name </label>
                                    <input type="text" name="midlename" id="midlename" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label> Last Name </label>
                                    <input type="text" name="lastname" id="lastname" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label> User Name </label>
                                    <input type="text" name="user_name" id="user_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Password </label>
                                    <input type="text" name="passw" id="passw" class="form-control">
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="radio1" name="branch" value="Branch-A" checked>Branch A
                                    <label class="form-check-label" for="radio1"></label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="radio2" name="branch" value="Branch-B">Branch-B
                                    <label class="form-check-label" for="radio2"></label>
                                 </div>
                                 <div class="form-check">
                                    <input type="radio" class="form-check-input" id="radio3" name="branch" value="disabled">DISABLE
                                    <label class="form-check-label" for="radio3"></label>
                                 </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="update_acc" class="btn btn-primary">Update Data</button>
                            </div>
                        </form>

                    </div>
                </div>
</div>
   

<div class="container p-5 my-5 bg-dark text-white rounded-top"><!-- View Accounts -->
  <h1 style="text-align:center; ">Accounts!</h1>
  <div class="btn-group">
  <a class="btn btn-success"  href="/Home"  >Home</a>  
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createmodal">
                        Create Account
                    </button>
  
</div>
        
  <div class="card" style=" margin-top: 1px;"> <!-- Accounts Table -->
                <div class="card-body" >

            <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'system_db');

                $query = "SELECT * FROM accounts";
                $query_run = mysqli_query($connection, $query);
            ?>
                    <table id="datatableid" class="table table-bordered table-dark table-hovee">
                        <thead>
                            <tr>
                            <th scope="col"> id </th>
                                <th scope="col">First Name</th>
                                <th scope="col">Middle Name</th>
                                <th scope="col">Last Name </th>
                                <th scope="col"> User Name </th>
                                <th scope="col"> Password </th>
                                <th scope="col"> Branch </th>
                                <th scope="col"> Tools </th>
                               
                            </tr>
                        </thead>
                        <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
                         ?>
                        <tbody> <!-- table from database -->
                            <tr>
                            <td class='hide-data'> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['firstname']; ?> </td>
                                <td> <?php echo $row['midlename']; ?> </td>
                                <td> <?php echo $row['lastname']; ?> </td>
                                <td> <?php echo $row['user_name']; ?> </td>
                                <td> <?php echo $row['passw']; ?> </td>
                                <td> <?php echo $row['branch']; ?> </td>
                               
                                <td>
                                    <button type="button" class="btn btn-outline-success editbtn"> EDIT</button>
                                
                                    <button type="button" class="btn btn-outline-danger deletebtn"> DISABLE </button>
                                </td>
                            </tr>
                        </tbody>
                        <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>
                    </table>
                </div>
            </div>
  
</div>
<div class="modal fade" id="createmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> <!-- Create account modal -->
        
    <div class="modal-dialog" role="document">
        
            <div class="modal-content">
            
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insert Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    
                        <form action="Add_acc" method="POST">
                            <div class="modal-body  text-black">
                                <div class="from-group">
                                    <label for="firstname" class="form-label">First Name:</label>
                                    <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname" required>
                                </div>
                                <div class="from-group">
                                    <label for="midlename" class="form-label">Middle Name:</label>
                                    <input type="text" class="form-control" id="midlename" placeholder="Middle Name" name="midlename" >
                                </div>
                                <div class="from-group">
                                    <label for="lastname" class="form-label">Last Name:</label>
                                    <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname" required>
                                </div>
                                <div class="from-group">
                                    <label for="user_name" class="form-label">Username:</label>
                                    <input type="text" class="form-control" id="user_name" placeholder="User Name" name="user_name" required>
                                </div>
                                <div class="from-group">
                                    <label for="passw" class="form-label">Password:</label>
                                    <input type="password" class="form-control" id="passw" placeholder="Enter password" name="passw" required>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="radio1" name="branch" value="Branch-A" checked>Branch-A
                                    <label class="form-check-label" for="radio1"></label>
                                    </div>
                                    <div class="form-check">
                                    <input type="radio" class="form-check-input" id="radio2" name="branch" value="Branch-B">Branch-B
                                    <label class="form-check-label" for="radio2"></label>
                                </div>
                            
                                <button type="submit" name="add_account" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>


<script>  //For Edit button to change info
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#id').val(data[0]);
                $('#firstname').val(data[1]);
                $('#midlename').val(data[2]);
                $('#lastname').val(data[3]);
                $('#user_name').val(data[4]);
                $('#passw').val(data[5]);
                $('#branch').val(data[6]);
            });
        });
    </script>






<script> //For Delete button to remove from database

        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>



</body>

</html>