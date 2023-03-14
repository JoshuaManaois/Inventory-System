<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'system_db');

    if(isset($_POST['updatedata_B']))
    {   
        $id = $_POST['id'];
        
        $Product = $_POST['Product'];
        $Prod_id = $_POST['Prod_id'];
        $Brand = $_POST['Brand'];
        $Quan = $_POST['Quan'];
    

        $query = "UPDATE branchb SET Product='$Product', Prod_id='$Prod_id', Brand='$Brand', Quan=' $Quan' WHERE id='$id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:BranchB");
            exit;
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>