<?php

session_start();
$mysqli = new mysqli("localhost", "root", "", "acm") or die(mysqli_error($mysqli));

if(isset($_POST['save'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $position = $_POST['position'];
    $event = $_POST['event'];

    $mydate=getdate(date("U"));
    $dateNow =  "$mydate[month] $mydate[mday], $mydate[year]";

    $mysqli->query("INSERT INTO users (firstName, lastName, event, position, date) 
                    VALUES('$firstName', '$lastName', '$event', '$position', '$dateNow')") or die($mysqli->error);

    $_SESSION['message'] = "Record ha been saved!";
    $_SESSION['msg_type'] = 'success';

    header('location: index.php');

}
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
if(isset($_POST['validate'])){
    $cert_id = $_POST['cert_id'];

    $result = $mysqli->query("SELECT * FROM users where cert_id = '$cert_id'") or die($mysqli->error);
    // $mysqli->query("INSERT INTO users (firstName, lastName, event, position) 
    //                 VALUES('$firstName', '$lastName', '$event', '$position')") or die($mysqli->error);

    $result = $result->fetch_assoc();
    // echo $result['firstname'];
    $_SESSION['message'] = "Validation Successful";
    $_SESSION['msg_type'] = 'success';
    $_SESSION['name'] = $result['firstname']." ".$result['lastname'];
    $_SESSION['event'] = $result['event'];
    $_SESSION['position'] = $result['position'];
    $_SESSION['date'] = $result['date'];


    // echo $_SESSION['name'];

        header('location: certificate.php');

}