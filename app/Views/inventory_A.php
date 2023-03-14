

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="assets/css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title > Branch A Inventory </title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"> -->
    <!-- Icons -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- /// -->
    <!-- Side Bar links -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- /// -->
    <!-- Bootstrap -->
 <link rel="stylesheet" href="assets/css/bootstrap.min.css">
 <style>
  .hide-data {
    display: none;
  }
  th:first-child {
        display: none;
    }
</style>

 
    <!-- //// -->
   
</head>

<body >


<?php
  // Start session
  session_start();

  // If the user is not logged in, redirect to the login page
  if (!isset($_SESSION['user_name'])) {
    header('Location: Login');
    exit();
  }

  // If the logout button is clicked, destroy the session and redirect to the login page
  if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: Login');
    exit();
  }
?>



<!-- Modal For Adding Item to database-->
    <div class="modal fade" id="itemsmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true"> 
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insert Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="Database_A" method="POST">
                    <!-- Tables to Add data  -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Product </label>
                            <input type="text" name="Product" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label> Product ID</label>
                            <input type="text" name="Prod_id" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label> Brand </label>
                            <input type="text" name="Brand" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label> Quantity</label>
                            <input type="number" name="Quan" class="form-control" >
                        </div>
                    </div>
                    <div class="modal-footer"> 
                        <!-- Buttons to add Data to Database -->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button> 
                        
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////// -->

       
<!-- (EDIT FORM) to open edit form -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Details </h5>
                    
                </div>

                <form action="Update_A" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="id" id="id">

                        <div class="form-group">
                            <label> Product Name </label>
                            <input type="text" name="Product" id="Product" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Product ID </label>
                            <input type="text" name="Prod_id" id="Prod_id" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Brand </label>
                            <input type="text" name="Brand" id="Brand" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Quantity </label>
                            <input type="text" name="Quan" id="Quan" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- DELETE  FORM to show confirm delete action--> 

    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete  Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="Delete_A" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h6>
                        <img src="https://78.media.tumblr.com/141af0cfa8838aa353225aa361bae07f/tumblr_nt5jqoKTlQ1sfyp69o1_540.gif" class="mx-auto d-block">
                        </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-danger"> YES </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
        <!-- ////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!-- Sent Request modal -->
                    <div id="sentmodal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Sent Request</h4>
                            
                        </div>
                        <div class="modal-body">
                        <?php
                    $connection = mysqli_connect("localhost","root","");
                    $db = mysqli_select_db($connection, 'system_db');

                    $query = "SELECT * FROM sent_ab";
                    $query_run = mysqli_query($connection, $query);
                ?>
                    <table id="datatableid" class="table table-bordered table-hover " style="background-image: linear-gradient(to right, snow , whitesmoke );" >
                        <thead>
                            <tr>
                          
                                <th scope="col">Product Name</th>
                                <th scope="col">Product ID</th>
                                <th scope="col">Brand </th>
                                <th scope="col" > Quantity </th>
                                <th scope="col" >Date Sent</th>
                               
                               
                            </tr>
                            
                        </thead>
                        <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                        <tbody>
                            <tr>
                               
                                <td> <?php echo $row['Product']; ?> </td>
                                <td> <?php echo $row['Prod_id']; ?> </td>
                                <td> <?php echo $row['Brand']; ?> </td>
                                <td> <?php echo $row['Quan']; ?> </td>
                                <td> <?php echo $row['Date/Time']; ?> </td>
                                
                                
                                
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        </div>

                    </div>
                    </div>
            <!-- /////////////////////// -->
<!-- Item Request modal -->
        <div id="req" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Item Request</h4>
                                    
                                </div>
                                <div class="modal-body">
                                <?php
                            $connection = mysqli_connect("localhost","root","");
                            $db = mysqli_select_db($connection, 'system_db');

                            $query = "SELECT * FROM sent_ba";
                            $query_run = mysqli_query($connection, $query);
                        ?>
                            <table id="datatableid" class="table table-bordered table-hover " style="background-image: linear-gradient(to right, snow , whitesmoke );" >
                                <thead>
                                    <tr>
                                
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Product ID</th>
                                        <th scope="col">Brand </th>
                                        <th scope="col" > Quantity </th>
                                        <th scope="col" >Date Sent</th>
                                    
                                    
                                    </tr>
                                    
                                </thead>
                                <?php
                        if($query_run)
                        {
                            foreach($query_run as $row)
                            {
                    ?>
                                <tbody>
                                    <tr>
                                    
                                        <td> <?php echo $row['Product']; ?> </td>
                                        <td> <?php echo $row['Prod_id']; ?> </td>
                                        <td> <?php echo $row['Brand']; ?> </td>
                                        <td> <?php echo $row['Quan']; ?> </td>
                                        <td> <?php echo $row['Date/Time']; ?> </td>
                                        
                                        
                                        
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                </div>

                            </div>
                            </div>
            <!-- /////////////////////// -->
<!-- Modal to check Inventory B -->


    <div class="modal fade" id="inv_B" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true"> 
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Branch B Inventory</h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">CLOSE&times;</span>
                    </button>
                    
                </div>
                <?php
        if ($_SESSION['branch'] == 'admin') {
            echo '';
        } else {
            echo ' <a class="btn btn-outline-success"  href="/ReqForm_AB"  >Send Request</a>  ';
        }
        ?>
               

                <form action="Database_A" method="POST" >

                    <div class="modal-body" >  <!-- ADD inventory Table here -->
                        
                    <div class="card" > <!-- Inventory Table -->
                
                    <div class="card-body"  >

                    <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'system_db');

                $query = "SELECT * FROM branchb";
                $query_run = mysqli_query($connection, $query);
            ?>
                    <table id="datatableid" class="table table-bordered table-hover " style="background-image: linear-gradient(to right, snow , whitesmoke );" >
                        <thead>
                            <tr>
                            <th scope="col" > id </th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product ID</th>
                                <th scope="col">Brand </th>
                                <th scope="col" > Quantity </th>
                               
                               
                            </tr>
                            
                        </thead>
                        <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                        <tbody>
                            <tr>
                            <td class='hide-data'> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['Product']; ?> </td>
                                <td> <?php echo $row['Prod_id']; ?> </td>
                                <td> <?php echo $row['Brand']; ?> </td>
                                <td> <?php echo $row['Quan']; ?> </td>
                                
                                
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
                    <div class="modal-footer">
                        <!-- For Buttons -->
                    </div>
                </form>

            </div>
        </div>
    </div>
                <!-- //////////////////////////////////////////////////////////////// -->
<!-- Main Table Inventory A-->
                    <!-- Side Bar -->
        <div class="w3-sidebar w3-bar-block"  style=" text-align: center; border-radius: 10px;  background-color:lightcyan ; margin: width:200px">
                   
                <div >
                        <h3 class="w3-bar-item">Menu</h3>
                                <a href="#" class="w3-bar-item w3-button"  data-toggle="modal" data-target="#sentmodal" >Your Request</a>
                                <a href="#" class="w3-bar-item w3-button" data-toggle="modal" data-target="#req" >Item Request</a>
                                <a href="#" class="w3-bar-item w3-button" >Generate Report</a>
         
                </div>
         
         </div>  
        <!-- //side bar  -->
         <div class="container" style="margin-top: 10px; margin-left: 200px;"> <!-- Main Page Container -->
            
        <div class="jumbotron">
        
        <div class="card">
    <h2 style="text-align:center;"> Branch A Inventory</h2>
</div>

<div class="card" style="margin-top: 1px;">
    <div class="card-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#itemsmodal">
            Add Item
        </button>
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#inv_B">
            Inventory B
        </button>
        
        <?php
        if ($_SESSION['branch'] == 'admin') {
            echo '<a class="btn btn-outline-success" href="/Home">Home</a>';
        } else {
            echo '<form method="POST" action="/logout">';
            echo '<button type="submit" class="btn btn-outline-danger">Logout</button>';
            echo '</form>';
        }
        ?>
    </div>
</div>


            </div>


            <div class="card" style=" margin-top: 1px;"> <!-- Inventory Table -->
                <div class="card-body" >

                    <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'system_db');

                $query = "SELECT * FROM brancha";
                $query_run = mysqli_query($connection, $query);
            ?>
                    <table id="datatableid" class="table table-bordered table-dark table-hovee">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                                <th scope="col">Product name</th>
                                <th scope="col">Product ID</th>
                                <th scope="col">Brand </th>
                                <th scope="col"> Quantity </th>
                                <th scope="col"> Option </th>
                               
                            </tr>
                        </thead>
                        <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                        <tbody>
                            <tr>
                            <td class='hide-data'> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['Product']; ?> </td>
                                <td> <?php echo $row['Prod_id']; ?> </td>
                                <td> <?php echo $row['Brand']; ?> </td>
                                <td> <?php echo $row['Quan']; ?> </td>
                                
                                <td>
                                    <button type="button" class="btn btn-outline-success editbtn"> EDIT </button>
                                
                                    <!-- <button type="button" class="btn btn-outline-danger deletebtn"> DELETE </button> --> <!-- DISABLES DELETE -->
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
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <!-- <script>
        $(document).ready(function () {

            $('.viewbtn').on('click', function () {
                $('#viewmodal').modal('show');
                $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "display.php",
                    dataType: "html", //expect html to be returned                
                    success: function (response) {
                        $("#responsecontainer").html(response);
                        //alert(response);
                    }
                });
            });

        });
    </script> -->


   

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
                    $('#Product').val(data[1]);
                    $('#Prod_id').val(data[2]);
                    $('#Brand').val(data[3]);
                    $('#Quan').val(data[4]);
            });
        });
    </script>
    
    <!-- <script>  //For Edit button to change info
        $(document).ready(function () {

            $('.reqbtn').on('click', function () {

                $('#reqmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#id').val(data[0]);
                $('#Product').val(data[1]);
                $('#Prod_id').val(data[2]);
                $('#Brand').val(data[3]);
                $('#Quan').val(data[4]);
            });
        });
    </script> -->



<script src="assets/js/bootstrap.min.js"></script>


</body>
</html>