<?php
session_start();
// include("includes/checklogin.php");
// check_login();

	
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="Networth calculator by Team Heracles">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="dashboard.css">
        
    </head>
    <body onload = "callName();get_networth();get_items();">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>&& $_SESSION["loggedin"] == true
        <![endif]-->
<?php if (isset($_SESSION["loggedin"])): ?>
        <main class="container-fluid" style = 'padding-left:0;padding-right:0;'>
        <header class="nav-header" style = 'left:0px;'>
        <!-- This is used to store the user_id DO NOT REMOVE -->
                <input type="hidden" id="userid" name="userid" value="<?=$_SESSION['id']?>">
                <!-- <span><a href="#">Heracles</a></span> -->
                <!-- <span  id = 'user'><a href="#"> <?php echo $_SESSION['name']?></a></span> -->
                <div class="summary" >
                        <div class="networth"  >
                            <p class ='box'>Your Net worth</p>
                            <span id="_networth">00.00</span>
                        </div>
                        <div class="assets">
                            <p class = 'box'>Your Assets</p>
                            <span id="assetSum">00.00</span>
                        </div>
                        <div class="liability">
                            <p class='box'>Your Liability</p>
                            <span id="liabilitySum">-00.00</span>
                        </div>
                </div>
        </header>
                <div class='small_device'>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Options
                    </button>
                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div class="dropdown-item " onclick="_reset()"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337224/turn-on_yb5bkw.svg" alt="home" width="30" height="30"></span>reset</div>
                    <!-- <a class="dropdown-item" href="settings.php"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337223/settings_ffgo0r.svg" alt="home" width="30" height="30"></span>Settings</a> -->
                    <a class="dropdown-item" href="includes/logout.inc.php"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337223/logout_jimglg.svg" alt="home" width="30" height="30"></span>Log out</a>
                </div>
            </div>
            </div>

            <div class="dashboard-contain">
                <section class="nav-left">
                    <div class="nav-links">
                        <!-- <a href="settings.php"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337223/settings_ffgo0r.svg" alt="home" width="30" height="30"></span>Settings</a> -->
                        <a href="includes/logout.inc.php"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337223/logout_jimglg.svg" alt="home" width="30" height="30"></span>Log out</a>
                        <div class="reset" onclick="_reset()"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337224/turn-on_yb5bkw.svg" alt="home" width="30" height="30"></span>reset</div>
                    </div>
                    </div>
                </section>
                <section class="dashboard-header clear_bg">
                    <div class="header">
                    <?php
                 if (isset($_GET["error"])) {
                    if ($_GET['error']=='Logged_In_successfully') {
                        //  echo '<center><h1> Successfully LoggedIn</h1><center>';
                        }else{
                        //  echo '<center><h1> You are already LoggedIn</h1><center>';

                        }  
                     }
                    ?>
                        <!-- <span>
                            <p>
                            <img src="https://res.cloudinary.com/benjee/image/upload/v1569337224/home-icon-silhouette_vzxxtu.svg" alt="home" width="30" height="30">
                            Home
                            </p>
                        </span> -->
                        <span id = 'animate_name' class=''>Welcome, <?php echo $_SESSION['name']?></span>

                    </div>
                    <!-- <div class="summary">
                            <div class="networth">
                                <p>Your Net worth</p>
                                <span>00.00</span>
                            </div>
                            <div class="assets">
                                <p>Your Assets</p>
                                <span id="assetSum">00.00</span>
                            </div>
                            <div class="liability">
                                <p>Your Liability</p>
                                <span>- 00.00</span>
                            </div>
                        </div> -->
                    </section>
                    <section class='dashboard-header'>
                        <!-- <div class="dashboard-content"> -->
                            <div>
                                <h5 class="assets-header">Assets</h5>
                            </div>
                                <div class="row">
                                        <!-- <div class=""> -->
                                            <div class="col-xs col-sm col-d col-lg sub-heading">
                                                <p>Cash</p>
                                                <label for="checking-account">Checking Account</label>
                                                 <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" onkeyup = 'inputValidate();displayNetworth()'   name="checking-account"  >
                                                <label for="savings-account">Savings Account</label>
                                                 <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" onkeyup = 'inputValidate();displayNetworth()'   name="savings-account"  >
                                                <label for="savings-bonds">Savings Bonds</label>
                                                 <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" onkeyup = 'inputValidate();displayNetworth()'   name="savings-bonds"  >
                                                <label for="cds">CDs</label>
                                                 <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" onkeyup = 'inputValidate();displayNetworth()'   name="cds"  >
                                                <label for="other-cash">Other</label>
                                                 <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" onkeyup = 'inputValidate();displayNetworth()'   name="other-cash"  >
                                            </div>

                                        <div class="col-xs col-sm col-d col-lg sub-heading">
                                            <p>Insurance</p>
                                            <label for="insurance">Insurance Value</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" onkeyup = 'inputValidate();displayNetworth()'   name="insurance"  >
                                            <p>Market value of Home(s)</p>
                                            <label for="primary-residence">Primary Residence</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" onkeyup = 'inputValidate();displayNetworth()'   name="primary-residence"  >
                                            <label for="rental">Rental/Vacation properties</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" onkeyup = 'inputValidate();displayNetworth()'   name="rental"  >
                                            <p>Retirement Savings</p>
                                            <label for="pensions">Pensions</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" onkeyup = 'inputValidate();displayNetworth()'   name="pensions"  >
                                             
                                        </div>

                                        <div class="col-xs col-sm col-d col-lg sub-heading">
                                            <p>Property</p>
                                            <label for="cars">Automobiles</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" onkeyup = 'inputValidate();displayNetworth()'   name="cars"  >
                                            <label for="house-furnishing">House Furnishing</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" onkeyup = 'inputValidate();displayNetworth()'   name="house-furnishing"  >
                                            <label for="jewellery">Jewellery</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" onkeyup = 'inputValidate();displayNetworth()'   name="jewellery"  >
                                            <label for="other-property">Other</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" onkeyup = 'inputValidate();displayNetworth()'   name="other-property"  >
                                             <label for="value-of-business" id="business-value">Value of Business you own</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" onkeyup = 'inputValidate();displayNetworth()'   name="value-of-business"  >
                                        </div>
                                        
                                        <div class="col-xs col-sm col-d col-lg sub-heading">
                                            <p>Other Investments</p>
                                            <label for="stocks">Stocks</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" onkeyup = 'inputValidate();displayNetworth()'   name="stocks"  >
                                            <label for="mutual-funds">Mutual Funds</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" onkeyup = 'inputValidate();displayNetworth()'   name="mutual-funds"  >
                                            <label for="others-investments">Others</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" onkeyup = 'inputValidate();displayNetworth()'   name="others-investments"  >
                                            
                                        </div>
                                    <!-- </div> -->
                            </div>
                </section>  
        

            <section class="dashboard-header">
                <div>
                    <h5 class="assets-header">Liability</h5>
                </div>
                <div class="row">
                    <div class="col-xs col-sm col-md col-lg sub-heading">
                        <div>
                            Balance due on debt
                        </div>
                        <div>
                            <label for="student-loan">Student loan</label><br>
                            <input type = 'number' class ='_liability' onchange="store_networth();store_item(event)" onkeyup = 'liabilityValidate() ; displayNetworth()' name="student-loan"  >
                        </div>
                        <div>
                            <label for="mortage">Mortages</label><br>
                            <input type = 'number'class ='_liability' onchange="store_networth();store_item(event)" onkeyup = 'liabilityValidate() ; displayNetworth()' name="mortage"  >
                        </div>
                        <div>
                            <label for="other-loans">Other loans</label><br>
                            <input type = 'number'class ='_liability' onchange="store_networth();store_item(event)" onkeyup = 'liabilityValidate() ; displayNetworth()' name="other-loans"  >
                        </div>
                        <div>
                            <label for="home-equity-loan">Home equity loans</label><br>
                            <input type = 'number'class ='_liability' onchange="store_networth();store_item(event)" onkeyup = 'liabilityValidate() ; displayNetworth()'  name="home-equity-loan"  >
                        </div>
                        <div>
                            <label for="auto-loans">Auto loans</label><br>
                            <input type = 'number'class ='_liability' onchange="store_networth();store_item(event)" onkeyup = 'liabilityValidate() ; displayNetworth()' name="auto-loans"  >
                        </div>
                    </div>
                    <div class="col-xs col-sm col-md col-lg sub-heading">
                        <div>    
                            Bills due
                        </div>
                        <div>
                            <label for="house-hold-utility">House hold utility</label><br>
                            <input type = 'number'class ='_liability' onchange="store_networth();store_item(event)" onkeyup = 'liabilityValidate() ; displayNetworth()' name="house-hold-utility"  >
                        </div>
                        <div>
                            <label for="taxes-due">Taxes due</label><br>
                            <input type = 'number'class ='_liability' onchange="store_networth();store_item(event)" onkeyup = 'liabilityValidate() ; displayNetworth()' name="taxes-due"  >
                        </div>
                    </div>
                </div>
            </section>
            
    </main>
<?php else:?>
<h1>You are not logged in, Please <a href="signin.php">signin</a> to Access this page</h1>
        
        <?php endif;?>
        <!-- <script src="" async defer></script> -->
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/networth.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" -->
        <!-- integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="dashboard/dashboard.js"></script>
    </body>
</html>
