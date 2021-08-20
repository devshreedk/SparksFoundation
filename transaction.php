<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>

</head>

<body>
    <?php include 'configure.php'; ?>
    <?php include 'navbar.php'; ?>


    <?php

    $uid = $_GET['userId'];
    $sql = "SELECT * FROM customers where UID=" . $uid;
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $row = mysqli_fetch_array($result);

    $sql1 = "SELECT * FROM customers where UID!=" . $uid;
    $result1 = mysqli_query($conn, $sql1);
    if (!$result1) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    $result1 = mysqli_fetch_all($result1);

    ?>

    <h2 class="text-center display-4 p-3"> <?php echo $row['Name'] ?> </h2>
    <div class="w-50 m-auto shadow-lg p-5">
        <form action="/devshree/transfer_amount.php" method="POST">



            <input type="hidden" name="from_user" value="<?php echo $row['UID'] ?>">

            <div class="form-control">
                <label for="user" class="form-label"> Transfer To</label>
                <select id="user" name="to_user" class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <?php foreach ($result1 as $row) { ?>
                        <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                    <?php   }  ?>
                </select> <br>

                <label>Amount:</label>
                <input type="number" class="form-control" name="amount">

                <div class="text-center mt-5">
                    <button class="btn mt-3 btn-outline-primary" type="submit" id="myBtn">Transfer</button>
                </div>
            </div>



        </form>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>