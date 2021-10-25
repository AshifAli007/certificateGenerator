<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Generator</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<script src='./html2canvas.min.js'></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="./script.js"></script>
<link rel="stylesheet" href="./certificate.css"/>

</head>
<body>
<?php require_once 'process.php'; ?>
<?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php echo $_SESSION['message'] ?>
    </div>
        <?php
            if($_SESSION['msg_type'] == 'success'):

                $name = $_SESSION['name'];
                $event = $_SESSION['event'];
                $position = $_SESSION['position'];
                $date = $_SESSION['date'];
        ?>
    <div id="certificate">
            <!-- <h1 class="heading1">Certificate</h1> -->
            <!-- <h2 class="heading2">Of Appreciation</h2> -->
            <h3 class="app1">This Certificate is Proudly Presented to </h3>
            <h1 class="name"><?php echo $name ?></h1>
            <!-- <hr class="accessory"> -->
            <h4 class="ending1">For achieving <?php echo $position ?> position in the event '<?php echo $event ?>'</h4>
            <h4 class="ending1">organized by ACM</h4>
            <h5 class='date'><?php echo $date?></h5>

        </div>
        <script type="text/javascript">
            generatePDF();
        </script>
    <?php 
            endif;
            endif;
            unset($_SESSION['message']);
    ?>
    <div class="container">
        <form action="process.php" method='POST'>

            <div class="input-group mb-3">
            <!-- <label for="button-addon2" class="form-control">Get Certificate Details</label> -->
                <input name="cert_id" type="text" autocomplete="on" class="form-control" placeholder="Certificate ID" aria-label="Certificate ID" aria-describedby="button-addon2">
                <button class="btn btn-outline-info" name="validate" type="submit" id="button-addon2">Validate</button>
            </div>

        </form>

    </div>

</body>

</html>