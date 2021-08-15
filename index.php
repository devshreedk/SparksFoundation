<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparks Bank</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container">
        <div class="mt-5 w-100 d-flex flex-row justify-content-center">
            <div class="card d-inline w-50 m-2 shadow-sm">
                <img src="img/b2.jpg" class="card-img-top">
                <div class="card-body">
                    <a href="customers.php" class="btn btn-primary">All Customers</a>
                </div>
            </div>

            <div class="card d-inline w-50 m-2 shadow-sm">
                <img src="img/b1.jpg" class="card-img-top">
                <div class="card-body">
                    <a href="/devshree/transaction_history.php" class="btn btn-primary">Transaction History</a>
                </div>
            </div>
        </div>
    </div>

    </div>


</body>

</html>