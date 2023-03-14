<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'system_db');

if(isset($_POST['add_account']))
{
    $firstname = $_POST['firstname'];
    $midlename = $_POST['midlename'];
    $lastname = $_POST['lastname'];
    $user_name = $_POST['user_name'];
    $passw = $_POST['passw'];
    $branch = $_POST['branch'];

    $query = "INSERT INTO accounts (`firstname`,`midlename`,`lastname`,`user_name`,`passw`,`branch`) VALUES ('$firstname','$midlename','$lastname','$user_name','$passw','$branch')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: Accounts');
        exit;
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }

}



?>