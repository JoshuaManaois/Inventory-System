<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'system_db');

if(isset($_POST['delete_acc']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM accounts WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:Accounts");
        exit;
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>