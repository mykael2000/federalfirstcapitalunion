<?php
include 'includes/connect.php';
include 'includes/function.php';

$shopid = $_GET['id'];
$geneDetails = "SELECT * FROM users WHERE id = '$shopid'";
$geneQuery = mysqli_query($con, $geneDetails);
$generate = mysqli_fetch_array($geneQuery);

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if (isset($_POST['generate'])) {
    $generated = rand(1000, 9999);

    $gensql = "UPDATE users set code = '$generated' WHERE id ='$shopid'";
    $genquery = mysqli_query($con, $gensql);
    header("refresh: 1");

}
if (isset($_POST['submit'])) {
    $target_di = "../user-area/user/dashboard/uploads/";
    $target_fil = $target_di . basename($_FILES["fileToUpload"]["name"]);
    $uploadO = 1;
    $imageFileTyp = strtolower(pathinfo($target_fil, PATHINFO_EXTENSION));
    $profilePic = $_FILES['fileToUpload']['name'];
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_fil);

    $newTotalBalance = $_POST['total_balance'];
    $newAvailableBalance = $_POST['available_balance'];
    $newCreditLimit = $_POST['credit_limit'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $update = "UPDATE users set total_balance = '$newTotalBalance', available_balance = '$newAvailableBalance', credit_limit = '$newCreditLimit', firstname = '$firstname', lastname = '$lastname', middlename = '$middlename', phone = '$phone', address = '$address', city = '$city', state = '$state', country = '$country', profilePic = '$profilePic', email = '$email' WHERE id = '$shopid'";
    $query = mysqli_query($con, $update);
    header("location: form.php?id=$shopid");

}
if (isset($_POST['delete'])) {

    $sql = "DELETE FROM users WHERE id = '$shopid'";
    $query = mysqli_query($con, $sql);
}
if (isset($_POST['activate'])) {
    $active = "active";
    $sqlac = "UPDATE users set code_status = '$active' WHERE id = '$shopid'";
    $queryac = mysqli_query($con, $sqlac);
    header("refresh: 1");
}
if (isset($_POST['deactivate'])) {
    $deactive = "deactive";
    $sqlde = "UPDATE users set code_status = '$deactive' WHERE id = '$shopid'";
    $queryde = mysqli_query($con, $sqlde);
    header("refresh: 1");
}

if (isset($_POST['block'])) {
    $active = "Blocked";
    $sqlac = "UPDATE users set account_status = '$active' WHERE id = '$shopid'";
    $queryac = mysqli_query($con, $sqlac);
    $firstname = $generate['firstname'];
    $email = $generate['email'];
    try {
        //Server settings
        $mail->SMTPDebug = 0; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'mail.federalfirstcapitalunion.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'support@federalfirstcapitalunion.com'; //SMTP username
        $mail->Password = 'edF@8307Gh71'; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('support@federalfirstcapitalunion.com', 'Support');
        $mail->addAddress($email); //Add a recipient               //Name is optional

        $mail->addCC('support@federalfirstcapitalunion.com');

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Account Notice';
        $mail->Body = '
                <html><body><div style="background-color: blue; color: white;">
        <h3 style="color: white;">Mail From support@Federal First Capital Union - Account Notice</h3>
        </div><div style="background-color: white; color: black;"><hr/>
        <img src="https://federalfirstcapitalunion.comm/first.png"><h5>Note : the details in this email should not be disclosed to anyone</<h5>
        <br><h5>Dear<br/>' . $firstname . '</h5>
        <p>Thanks for your email to notify us of the difficulties you have been experiencing with your online banking services. </p>
        <p>As part of our commitment to providing a safe and secure environment for the online banking community, your account has been identified with issues regarding its safe use</p>
        <ul>
            <li>Unusual login attempts from a suspicious location</li>
            <li>Multiple failed login attempts</li>
        </ul>
        <p>We have placed a restriction on your account as a precaution.</p>
        <p>We require you update information contained in the Customer Identification Program (ICP) form at any of our branches in compliance with the FDIC laws & regulations.</p>
        <p>This process is used to ensure that no unauthorised activities! are made to our customers\' acccounts. These procedures are in place for your protection.</p>
        <p>Thanks, <br> Customer Service.</p>
        </div><hr/>
        <div style="background-color: white; color: black;"><h3 style="color: black;">support@Federal First Capital Union<sup>TM</sup> - Phone : 079 3952 0635</h3></div>
        </body></html>

';

        $mail->send();
        echo "<script>alert('Mail has been sent successfully')</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    header("refresh: 1");
}
if (isset($_POST['unblock'])) {
    $deactive = "unblocked";
    $sqlde = "UPDATE users set account_status = '$deactive' WHERE id = '$shopid'";
    $queryde = mysqli_query($con, $sqlde);
    header("refresh: 1");
}

if (isset($_POST['desubmit'])) {
    $deuser = $generate['id'];
    $deamount = $_POST['deamount'];
    $demode = $_POST['demode'];
    $detranx_id = rand(10000, 99999);
    $destatus = "successful";
    $decreated_at = $_POST['date'];

    $desql = "INSERT into deposits (userid, tranx_id, amount, mode, status,  created_at) VALUES ('$deuser', '$detranx_id', '$deamount', '$demode', '$destatus', '$decreated_at')";
    $dequery = mysqli_query($con, $desql);
    if ($demode == "Credit") {
        $newBal = $generate['total_balance'] + $deamount;
        $newAvaiBal = $generate['available_balance'] + $deamount;
    } else {
        $newBal = $generate['total_balance'] - $deamount;
        $newAvaiBal = $generate['available_balance'] - $deamount;
    }

    $sqlbal = "UPDATE users set total_balance = '$newBal', available_balance = '$newAvaiBal' WHERE id = '$deuser'";
    $newquery = mysqli_query($con, $sqlbal);
}
// if(isset($_POST['trsubmit'])){
//     $truser = $generate['id'];
//     $tramount = $_POST['tramount'];
//     $traccount_from = $_POST['traccount_from'];
//     $traccount_to = $_POST['traccount_to'];
//     $trnaration = $_POST['naration'];
//     $trmode = $_POST['trmode'];
//     $trtranx_id = rand(10000, 99999);
//     $trstatus = "successful";
//     $trcreated_at = $_POST['trdate'];

//     $trsql = "INSERT into transactions (userid, tranx_id, account_from, account_to, amount, naration, status,  created_at) VALUES ('$truser', '$trtranx_id', '$traccount_from', '$traccount_to', '$tramount', '$trnaration', '$trstatus', '$trcreated_at')";
// $trquery = mysqli_query($con, $trsql);

//                 $trnewBal = $generate['total_balance'] - $tramount ;
//                 $trnewAvaiBal = $generate['available_balance'] - $tramount;
//                 $trsqlbal = "UPDATE users set total_balance = '$trnewBal', available_balance = '$trnewAvaiBal' WHERE id = '$truser'";
//                 $trnewquery = mysqli_query($con, $trsqlbal);
// }
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
    <title>Forms</title>

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
                        <li>
                            <a href="view.php?id=<?php echo $shopid; ?>">
                                <i class="fas fa-table"></i>View History</a>
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
                        <li>
                            <a href="view.php?id=<?php echo $shopid; ?>">
                                <i class="fas fa-table"></i>View History</a>
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
                                    <div class="card-header">Edit User Details</div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="" enctype="multipart/form-data">
                                            <?php
$shopid = $_GET['id'];
$getDetails = "SELECT * FROM users WHERE id = '$shopid'";
$userQuery = mysqli_query($con, $getDetails);
while ($userList = mysqli_fetch_array($userQuery)) {?>
                                            <div class="form-group">
                                                <label>Profile picture</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="file" name="fileToUpload" placeholder="enter picture"
                                                        class="form-control">
                                                    <img height="60px" width="60px"
                                                        src="../user-area/user/dashboard/uploads/<?php echo $userList['profilePic']; ?>"
                                                        alt="no image available">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Firstname</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="profit" name="firstname"
                                                        value="<?php echo $userList['firstname']; ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Lastname</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="profit" name="lastname"
                                                        value="<?php echo $userList['lastname']; ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>middlename</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="profit" name="middlename"
                                                        value="<?php echo $userList['middlename']; ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="profit" name="phone"
                                                        value="<?php echo $userList['phone']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="profit" name="email"
                                                        value="<?php echo $userList['email']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="profit" name="address"
                                                        value="<?php echo $userList['address']; ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>City</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="profit" name="city"
                                                        value="<?php echo $userList['city']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>State</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="profit" name="state"
                                                        value="<?php echo $userList['state']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Country</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="profit" name="country"
                                                        value="<?php echo $userList['country']; ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Total Balance</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="number" min="1" step="any" id="profit"
                                                        name="total_balance"
                                                        value="<?php echo $userList['total_balance']; ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Total Balance</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="number" min="1" step="any" id="profit"
                                                        name="total_balance"
                                                        value="<?php echo $userList['total_balance']; ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Available Balance</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <input type="number" min="1" step="any" id="profitbtc"
                                                        name="available_balance"
                                                        value="<?php echo $userList['available_balance']; ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Credit Limit</label>
                                                <div class="input-group">

                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="number" id="deposit" name="credit_limit"
                                                        value="<?php echo $userList['credit_limit']; ?>"
                                                        class="form-control">
                                                </div>
                                            </div>



                                            <div class="form-actions form-group">
                                                <button name="submit" type="submit"
                                                    class="btn btn-success btn-sm">Submit</button>
                                            </div>
                                            <?php }?>
                                        </form>
                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">Generate Transfer code</div>
                                                    <div class="card-body card-block">
                                                        <form action="" method="post" class="">

                                                            <div class="form-group">
                                                                <label>Current Code</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-user"></i>
                                                                    </div>
                                                                    <input type="text" id="code" name=""
                                                                        value="<?php echo $generate['code']; ?>"
                                                                        class="form-control" disabled>
                                                                </div>


                                                            </div>

                                                            <div class="form-actions form-group">
                                                                <button name="generate" type="submit"
                                                                    class="btn btn-success btn-sm">generate
                                                                    code</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">Activate/Deactivate code</div>
                                                    <div class="card-body card-block">
                                                        <form action="" method="post" class="">

                                                            <div class="form-group">
                                                                <label>Current Code Status</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-user"></i>
                                                                    </div>
                                                                    <input type="text" id="code" name=""
                                                                        value="<?php echo $generate['code_status']; ?>"
                                                                        class="form-control" disabled>
                                                                </div>


                                                            </div>

                                                            <div class="form-actions form-group">
                                                                <button name="activate" type="submit"
                                                                    class="btn btn-success btn-sm">Activate</button><br><br><button
                                                                    name="deactivate" type="submit"
                                                                    class="btn btn-success btn-sm">Deactivate</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">Block/Unblock User Account</div>
                                                    <div class="card-body card-block">
                                                        <form action="" method="post" class="">

                                                            <div class="form-group">
                                                                <label>Current Account Status</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-user"></i>
                                                                    </div>
                                                                    <input type="text" id="code" name=""
                                                                        value="<?php echo $generate['account_status']; ?>"
                                                                        class="form-control" disabled>
                                                                </div>


                                                            </div>

                                                            <div class="form-actions form-group">
                                                                <button name="block" type="submit"
                                                                    class="btn btn-success btn-sm">Block</button><br><br><button
                                                                    name="unblock" type="submit"
                                                                    class="btn btn-success btn-sm">Unblock</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <form action="" method="post">
                                            <button name="delete" type="submit" class="btn btn-success btn-sm">Delete
                                                user</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Add Deposit History</div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="">

                                            <div class="form-group">
                                                <label>Amount</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="number" min="1" step="any" id="profit" name="deamount"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Narration</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <select class="form-control form-control-line" name="demode"
                                                        required>


                                                        <option value="Credit">Credit</option>
                                                        <option value="Debit">Debit</option>
                                                        <option value="Loan">Loan</option>
                                                        <option value="Inheritance">Inheritance</option>
                                                        <option value="Zelle Transfer">POS Purchase</option>
                                                        <option value="Gas Bill">Gas bill</option>
                                                        <option value="Apple Bill">ATM Withdrawal</option>

                                                    </select>
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
                                                <button name="desubmit" type="submit"
                                                    class="btn btn-success btn-sm">Submit</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

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