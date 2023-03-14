<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/css/bg.css">
<!-- Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- //// -->
<title>Request Form B to A</title>
</head>
<body>
    <div class="card"> <!-- Branch B Inventory Preview -->
        <div class="card-header">Request Form</div>
            <div class="card-body">

                <div class="container mt-3">
                    <h3>Branch A Inventory</h3>
                
                <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'system_db');

                $query = "SELECT * FROM brancha";
                $query_run = mysqli_query($connection, $query);
                ?>
                    <table id="datatableid" class="table table-bordered table-hover " style="background-image: linear-gradient(to right, snow , whitesmoke );" >
                        <thead>
                            <tr>
                            <th scope="col">...</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product id</th>
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
                                <td> <?php echo $row['id']; ?> </td>
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
   
    <div class="container p-5 my-5 bg-dark text-white"> <!-- For sending Item request to Branch B -->
    <form action="Sent_BA" method="POST">
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
                            <input type="number" name="Quan" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer"> 
                        <!-- Buttons to add Data to Database -->
                        <a class="btn btn-outline-success"  href="/BranchB"  >Return</a> 
                        <button type="submit" name="reqa" class="btn btn-primary">Send Request</button> 
                        
                    </div>
                </form>
    </div>






<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>