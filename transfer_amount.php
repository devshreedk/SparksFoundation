<?php include 'configure.php'; ?>
<?php 

    $from_user_result = mysqli_query($conn, "SELECT * FROM customers where UID=" . $_POST['from_user']);
    $from_user = mysqli_fetch_array($from_user_result);

    $to_user_result = mysqli_query($conn, "SELECT * FROM customers where UID=" . $_POST['to_user']);
    $to_user = mysqli_fetch_array($to_user_result);


    if ($_POST['amount'] > $from_user["balance"]) {
        die("Amount is greater than current balance");
    }
    
    $new_balance = $from_user["balance"] - $_POST['amount'];
    
    // Update from user amount

    $query = "UPDATE customers SET balance=". $new_balance . " where UID=". $from_user['UID'];
    
    mysqli_query($conn, $query);

    // Update to user amount
    
    $new_balance = $to_user['balance'] + $_POST['amount'];

    $query = "UPDATE customers SET balance=". $new_balance . " where UID=". $to_user['UID'];

    mysqli_query($conn, $query);

    // Insert record in transaction history table
    $query = "INSERT INTO transactions (from_user, to_user, amount) VALUES ('". $from_user['Name'] . "', '". $to_user['Name'] . "', " . $_POST['amount'] . ")";

    mysqli_query($conn, $query);

    header("Location: http://localhost/devshree/transaction_history.php");




?>