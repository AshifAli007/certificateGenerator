<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php crud</title>
    <!-- JavaScript Bundle with Popper -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="addCertificate.css";
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
                    <input name="event" type="text" autocomplete="no" class="form-control" id="floatingInput" placeholder="Event Name">
                    <label for="floatingInput">Event</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="position" type="text" autocomplete="no" class="form-control" id="floatingInput" placeholder="Position">
                    <label for="floatingInput">Position</label>
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
    // $mysqli = new mysqli("localhost", "dduchost_dduchost", "dducsanjuonline1", "dduchost_certificates") or die(mysqli_error($mysqli));
    $mysqli = new mysqli("localhost", "root", "", "acm") or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM users") or die($mysqli->error);
        // pre_r($result);
        // pre_r($result->fetch_assoc());
    ?>
    <div class="container">
    <div class='row justify-content-center'>
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
                <tr>
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