<?php

include 'configure.php';

if (isset($_POST['submit'])) {
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * FROM customers where id=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query);

    if (($amount) < 0) {
        echo '<script type = "text/javascript>';
        echo 'alert("Negative values are not allowed")';
        echo '</script>';
    } else if ($amount == 0) {
        echo '<script type = "text/javascript>';
        echo 'alert("Please, enter non zero values")';
        echo '</script>';
    } else if ($amount > $sql1['balance']) {
        echo '<script type = "text/javascript>';
        echo 'alert("Your balance is insufficient")';
        echo '</script>';
    } else {
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE users set balance = $newbalance where id=$from";
        mysqli_query($conn, $sql);

        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE users set balance = $newbalance where id=$to ";
        mysqli_query($conn, $sql);

        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transaction('sender', 'receiver', 'balance') VALUES ('$sender', '$receiver', ''$amount')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script> alert('Transaction Successful');
                            window.location = 'transfer.php';
                </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="./css/styles.css">
    <style type="text/css">
        button {
            border: none;
            background: coral;
        }

        button:hover {
            background-color: #FF4848;
            transform: scale(1.1);
            color: white;
        }
    </style>

</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h2 class="text-center pt-4">Transactions</h2>
        <?php


        $sql = "SELECT * FROM customers";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        //$rows = mysqli_fetch_assoc($result);
        ?>

        <table class="table table-striped table-hover  table-light">

            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Balance</th>
                <th class="text-center">Details</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()) { ?>


                <tr>
                    <td class="py-2 text-center"><?php echo $row['UID'] ?></td>
                    <td class="py-2 text-center"><?php echo $row['Name'] ?></td>
                    <td class="py-2 text-center"><?php echo $row['Email'] ?></td>
                    <td class="py-2 text-center"><?php echo $row['balance'] ?></td>
                    <td class="py-2 text-center">
                        <a class="btn btn-outline-primary" href="/devshree/transaction.php?userId=<?php echo $row['UID'] ?>">Transfer
                            Amount
                        </a>
                    </td>
                </tr>

            <?php } ?>

        </table>

    </div>
    <?php include("footer.php"); ?>
</body>

</html>