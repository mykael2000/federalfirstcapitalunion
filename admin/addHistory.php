<?php
include 'includes/connect.php';
include 'includes/function.php';

$geneDetails = "SELECT * FROM users";
$geneQuery = mysqli_query($con, $geneDetails);
$generate = mysqli_fetch_array($geneQuery);

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $getidsql = "SELECT * FROM users WHERE email = '$email'";
    $getidquery = mysqli_query($con, $getidsql);
    $fetch = mysqli_fetch_array($getidquery);
    $deuser = $fetch['id'];

    $deamount = $_POST['amount'];
    $demode = $_POST['type'];
    $details = $_POST['details'];
    $description = $_POST['description'];
    $detranx_id = rand(10000, 99999);
    $destatus = $_POST['status'];
    $decreated_at = $_POST['date'];

    $desql = "INSERT into deposits (userid, email, tranx_id, amount, mode, status, details, description,  created_at) VALUES ('$deuser', '$email', '$detranx_id', '$deamount', '$demode', '$destatus', '$details', '$description', '$decreated_at')";
    $dequery = mysqli_query($con, $desql);
    if ($demode == "Credit") {
        $newBal = $fetch['total_balance'] + $deamount;
        $newAvaiBal = $fetch['available_balance'] + $deamount;
    } else {
        $newBal = $fetch['total_balance'] - $deamount;
        $newAvaiBal = $fetch['available_balance'] - $deamount;
    }

    $sqlbal = "UPDATE users set total_balance = '$newBal', available_balance = '$newAvaiBal' WHERE id = '$deuser'";
    $newquery = mysqli_query($con, $sqlbal);

    echo "<script>alert('Transaction Added successfully')</script>";
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Debit/Credit Users</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.php">Dashboard 1</a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="table.php">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.php">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="create.php">
                                <i class="fas fa-table"></i>Add user</a>
                        </li>
                        <li>
                            <a href="addHistory.php">
                                <i class="fas fa-table"></i>Debit/Credit user</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="index.php">Dashboard 1</a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="table.php">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li class="active">
                            <a href="form.php">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="create.php">
                                <i class="fas fa-table"></i>Add user</a>
                        </li>
                        <li>
                            <a href="addHistory.php">
                                <i class="fas fa-table"></i>Debit/Credit user</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Debit/Credit User</div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="">
                                            <?php

$getDetails = "SELECT * FROM users";
$userQuery = mysqli_query($con, $getDetails);
?>
                                            <div class="form-group">
                                                <label>Amount</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="number" min="1" step="any" id="profit" name="amount"
                                                        placeholder="Enter Amount" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>To/From</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="profit" name="details"
                                                        placeholder="Enter transaction to or from details"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Transaction Type</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <select class="form-control form-control-line" name="type" required>
                                                        <option value="">--Choose--</option>
                                                        <option value="Debit">Debit</option>
                                                        <option value="Credit">Credit</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Transaction Status</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <select class="form-control form-control-line" name="status"
                                                        required>
                                                        <option value="">--Choose--</option>
                                                        <option value="pending">pending</option>
                                                        <option value="completed">completed</option>
                                                        <option value="cancelled">cancelled</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Select Account</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <select class="form-control form-control-line" name="email"
                                                        required>
                                                        <option value="">--Choose--</option>
                                                        <?php while ($userList = mysqli_fetch_array($userQuery)) {?>
                                                        <option value="<?php echo $userList['email']; ?>">
                                                            <?php echo $userList['email']; ?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Enter Transaction Description</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <input type="text" id="profitbtc" name="description"
                                                        placeholder="Enter Description" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Date</label>
                                                <div class="input-group">
                                                    <input type="date" name="date" class="form-control"
                                                        placeholder="dd/mm/yy" required="" value="">
                                                </div>

                                            </div>
                                            <div class="form-actions form-group">
                                                <button name="submit" type="submit"
                                                    class="btn btn-success btn-sm">Submit</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->