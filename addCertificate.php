<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Certificate</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- JavaScript Bundle with Popper -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="./scripts/addCertificate.js"></script>
    <link rel="stylesheet" href="./css/addCertificate.css";

</head>
        <body>
        <div class="row justify-content-center">
            <form class="add" action="process.php" method="POST">
                <div class="form-floating mb-3">
                    <input name="firstName" autocomplete="no" type="text" class="form-control" id="floatingInput" placeholder="Enter First Name">
                    <label for="floatingInput">First Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="lastName" autocomplete="no" type="text" class="form-control" id="floatingInput" placeholder="Enter Last Name">
                    <label for="floatingInput">Last Name</label>
                </div>
                <div class="form-floating mb-3">
                    <select id="event" class="form-control" name="event">
                        <option value="NIL">Select Event</option>
                        <option value="Choices">Choices</option>
                        <option value="Mind Tribe">Mind Tribe</option>
                        <option value="to be added">to be added</option>
                        <option value="to be added">to be added</option>
                    </select>
                    <label for="event">Event</label>

                </div>
                <div class="form-floating mb-3">
                    <select id="position" class="form-control" name="position">
                        <option value="Participation">Select Position</option>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                        <option value="Participation">Participation</option>
                    </select>
                    <label for="position">Position</label>

                </div>
                <div class="form-floating mb-3">
                        <select id="course" class="form-control" name="course">
                            <option value="NIL">Select Course</option>
                            <option value="Bsc(H) Computer Science">Bsc(H) Computer Science</option>
                            <option value="Bsc(H) Physics">Bsc(H) Physics</option>
                            <option value="Bsc(H) Physical Science">Bsc(H) Physical Science</option>
                            <option value="Bsc(H) Mathematics">Bsc(H) Mathematics</option>
                        </select>
                        <label for="course">Course</label>
                </div>
                <div class="form-floating mb-3">
                    <select id="year" class="form-control" name="year">
                        <option value="NIL">Select Year</option>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                        <option value="4th">4th</option>
                    </select>
                    <label for="year">Year</label>

                </div>
                <div class="form-floating mb-3">
                    <select id="date" class="form-control" name="date">
                        <option value="NIL">Select Event Date</option>
                        <option value="November 8th, 2021">November 8th, 2021</option>
                        <option value="to be added">to be added</option>
                        <option value="to be added">to be added</option>
                        <option value="to be added">to be added</option>
                    </select>
                    <label for="date">Date</label>

                </div>
                    <button class="btn btn-primary" type="submit" name="save">Save</button>
            </form>
        </div>
    <?php require_once 'process.php'; ?>
    <?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif; ?>
    <?php
    $mysqli = new mysqli("localhost", "dduchost_dduchost", "dducsanjuonline1", "dduchost_certificates") or die(mysqli_error($mysqli));
    // $mysqli = new mysqli("localhost", "root", "", "acm") or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM users") or die($mysqli->error);
        // pre_r($result);
        // pre_r($result->fetch_assoc());
    ?>
    <div class="container">
    <div class='row justify-content-center'>
        <select name="" id="eventName" onChange="showEvent()" class="form-control">
            <option value="NILl2">Events</option>
            <option value="choices">Choices</option>
            <option value="mindtribe">Mind Tribe</option>
        </select>
        <table class='table'>
            <thead>
                <th>Name</th>
                <th>Event</th>
                <th>Position</th>
                <th>Certificate ID</th>
                <th>Date</th>
            </thead>
            <?php
                while($row = $result->fetch_assoc()): ?>
                <tr class="<?php echo strtolower(str_ireplace(' ', '',$row['event'])); ?>">
                    <td><?php echo $row['firstname'], " ", $row['lastname']; ?></td>
                    <td><?php echo $row['event']; ?></td>
                    <td><?php echo $row['position']; ?></td>
                    <td><?php echo $row['certificateNo']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                </tr>
                <?php endwhile; ?>
        </table>
    </div>
    <?php
        function pre_r( $array ) {
            echo '</pre>';
            print_r($array);
            echo '</pre>';
        }

    ?>


    </div> 
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>