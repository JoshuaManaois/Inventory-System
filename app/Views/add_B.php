<!-- PHP to Add Data to Database From Inventory B -->

<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'system_db');

if(isset($_POST['insertdata_B']))
{
    $Product = $_POST['Product'];
    $Prod_id = $_POST['Prod_id'];
    $Brand = $_POST['Brand'];
    $Quan = $_POST['Quan'];

    $query = "INSERT INTO branchb (`Product`,`Prod_id`,`Brand`,`Quan`) VALUES ('$Product','$Prod_id','$Brand','$Quan')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: BranchB');
        exit;
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }

}



?>