<?php
session_start();
// $mysqli = new mysqli("localhost", "dduchost_dduchost", "dducsanjuonline1", "dduchost_certificates") or die(mysqli_error($mysqli));
$mysqli = new mysqli("localhost", "root", "", "acm") or die(mysqli_error($mysqli));
if(isset($_POST['save'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $position = $_POST['position'];
    $event = $_POST['event'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $date = $_POST['date'];

    $mydate=getdate(date("U"));
    $dateNow =  "$mydate[month] $mydate[mday], $mydate[year]";

    $pos = 'p'.rand(1,9);
    if(strtolower($position) == "first"){
    	$pos = 'a1';
    }else if(strtolower($position) == "second"){
        $pos = 'a2';
    }else if(strtolower($position) == "third"){
   		$pos = 'a3';
    }
   	
    $certificateNo = strtoupper(str_ireplace(' ', '', $event).'-'.$firstName[0].$lastName[0].$pos).rand(10, 99);

    $mysqli->query("INSERT INTO users (firstName, lastName, event, position, date, certificateNo, course, year)
                    VALUES('$firstName', '$lastName', '$event', '$position', '$date', '$certificateNo', '$course', '$year')") or die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = 'success';

    header('location: addCertificate.php');

}
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
if(isset($_POST['validate'])){
    $certificateNo = $_POST['certificateNo'];

    $result = $mysqli->query("SELECT * FROM users where certificateNo = '$certificateNo'") or die($mysqli->error);
    // $mysqli->query("INSERT INTO users (firstName, lastName, event, position) 
    //                 VALUES('$firstName', '$lastName', '$event', '$position')") or die($mysqli->error);
    
    $result = $result->fetch_assoc();
    if(empty($result)){
        $_SESSION['message'] = "Validation Failed! Oops no data found check for typos";
        $_SESSION['msg_type'] = 'warning';
        header('location: index.php');
    }else{
                echo $result;
        $_SESSION['message'] = "Validation Successful";
        $_SESSION['msg_type'] = 'success';
        $_SESSION['name'] = ucfirst($result['firstname'])." ".ucfirst($result['lastname']);
        $_SESSION['event'] = ucfirst($result['event']);
        $_SESSION['position'] = ucfirst($result['position']);
        $_SESSION['date'] = $result['date'];
        $_SESSION['certificateNo'] = $result['certificateNo'];
        $_SESSION['course'] = $result['course'];
        $_SESSION['year'] = $result['year'];
            header('location: index.php');
    }

}