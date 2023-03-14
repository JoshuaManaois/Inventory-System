<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'system_db');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['id'];
        
        $Product = $_POST['Product'];
        $Prod_id = $_POST['Prod_id'];
        $Brand = $_POST['Brand'];
        $Quan = $_POST['Quan'];
    

        $query = "UPDATE brancha SET Product='$Product', Prod_id='$Prod_id', Brand='$Brand', Quan=' $Quan' WHERE id='$id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:BranchA");
            exit;
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>