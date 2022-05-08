<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Homepage</title>
    <meta name="description" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/tab_icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    html {
        height: 100%;
        width: 100%;
        margin: 0;
        padding: 0px;
        font-family: 'Poppins', sans-serif;
    }

    body {
        height: 90%;
        width: 90%;
        margin: 5%;
    }

    input:focus,
    select:focus,
    textarea:focus,
    button:focus {
        outline: none;
    }
    </style>
</head>

<?php

$link = mysqli_connect('localhost','root','');
mysqli_select_db($link,"diskobre");

session_start();



$username = $_SESSION['uname'];


?>

<body style="background: white;">
    <div id="back_container" style="width: 100%;height: 3rem;display: block;display: none">
        <img src="assets/back_btn.svg" alt="back_btn.svg" style="height:3rem;width:3rem" onclick="return_back()" />
    </div>

    <div style="width: 100%;height: auto;display: block;">

        <div
            style="border: 1.32353px solid #E4E4E4;box-sizing: border-box;border-radius: 8.14793px;display: flex;padding: 0.7rem;">
            <img src="assets/search_icon.svg" alt="search_icon.svg" style="height:1.5rem;" />

            <form action="" method="POST">
                <input type="text" style="flex: 50%;background: none;border: none;font-size: 1.2rem;" minlength="3"
                    maxlength="99" required name="search" />
            </form>
        </div>
    </div>
    <br>
    <br>
    <div style="width: 100%;height: auto;display: block;">
        <div style="margin:auto; display: flex;flex-wrap: wrap;">
            <span style="color: #313035;font-size: 1.6rem;flex: 100%;font-weight: 700">Hi, <?php echo $username?>!
            </span>
            <span style="color: #181E2E;font-size: 0.8rem;flex: 100%;font-weight: 500">Have a safe trip to your
                destination. Amping!
            </span>
        </div>
    </div>
    <br>
    <div style="width: 100%;height: auto;display: block;">
        <div style="margin:auto; display: flex;flex-wrap: wrap;">
            <span style="color: #313035;font-size: 1.6rem;flex: 100%;font-weight: 500">Categories
            </span>
        </div>
    </div>

    <!-- Categories Container -->
    <!-- ? Missing 
        pill_icon.svg
        bank_icon.svg
        train_icon.svg
        store_icon.svg restaurant_icon
    
         <a href="#" class="cat-item w-inline-block"><img src="images/Group-111.svg" loading="lazy" alt=""></a>
        <a href="#" class="cat-item w-inline-block"><img src="images/Group-107.svg" loading="lazy" alt=""></a>
        <a href="#" class="cat-item w-inline-block"><img src="images/Group-112.svg" loading="lazy" alt=""></a>
        <a href="#" class="cat-item w-inline-block"><img src="images/Group-108.svg" loading="lazy" alt=""></a>
        <a href="#" class="cat-item w-inline-block"><img src="images/Group-109.svg" loading="lazy" alt=""></a>
        <a href="#" class="cat-item w-inline-block"><img src="images/Group-110.svg" loading="lazy" alt=""></a>
    
    -->
    <br>
    <div style="display: block;height: auto;">
   
        <div style="display: flex;flex-wrap: wrap;justify-content: space-between;font-weight: 500;">
                <?php    
                
                // if(isset($_POST['search'])) {

                //     $searched = $_POST['search']);
                //     $getCategory = mysqli_query($link, "SELECT  estcat as establish from category");
                // }
                if(isset($_POST['search'])) {
                    $searched = $_POST['search'];

                    $getCategory = mysqli_query($link, "SELECT estcat as establish from category WHERE estcat='{$searched}'");
                }
                else {
                    $getCategory = mysqli_query($link, "SELECT  estcat as establish from category");
                }
                    if(mysqli_num_rows($getCategory) > 0){
                    while($s = mysqli_fetch_array($getCategory)){ ?>
                   
                        <div style="border: 1.32353px solid #ECECEC; width: 32%;;margin-bottom: 2%;position: relative;border-radius: 8.14793px;">
                            <a href="navigation.php?category=<?php echo($s['establish'])?>">
                                <div style="display: flex;margin:auto;flex-wrap: wrap;text-align: center;">

                                    <?php
                                       
                                        $estabToLower = strtolower($s['establish']);

                                        if($estabToLower == 'laundry shops') {  ?>
                                        <img src="images/Group-111.svg" alt="hospital_icon.svg"
                                        style="height:6rem;margin: auto;display: flex;" /> 

                                    <?php } if($estabToLower == 'remittances') {  ?>
                                            <img src="images/Group-107.svg" alt="hospital_icon.svg"
                                        style="height:6rem;margin: auto;display: flex;" />

                                    <?php }  if($estabToLower == 'veterinary clinics') {  ?>
                                            <img src="images/Group-112.svg" alt="hospital_icon.svg"
                                        style="height:6rem;margin: auto;display: flex;" /> 
                                        <?php } if($estabToLower == 'grocery stores') {  ?>
                                            <img src="images/Group-108.svg" alt="hospital_icon.svg" style="height:6rem;margin: auto;display: flex;"> 
                                        <?php } if($estabToLower == 'water station') {  ?>
                                            <img src="images/Group-109.svg" alt="hospital_icon.svg" style="height:6rem;margin: auto;display: flex;"> <?php } if($estabToLower == 'post office') {  ?>
                                            <img src="images/Group-110.svg" alt="hospital_icon.svg" style="height:6rem;margin: auto;display: flex;"> <?php }  ?>
                                                
                                </div>
                            <div
                                style="color: #033F40;display: block;margin:auto;flex-wrap: wrap;text-align: center;font-size: 1rem;padding: 0.3rem;">
                                <?php echo($s['establish'])?>
                            </div>
                            </a>
                        </div>
                  
                  <?php  }
                    }
                
                ?>
           

            <!-- <div
                style="border: 1.32353px solid #ECECEC; width: 32%;;margin-bottom: 2%;position: relative;border-radius: 8.14793px;">
                <div style="display: flex;margin:auto;flex-wrap: wrap;text-align: center;">
                    <img src="assets/restaurant_icon.svg" alt="restaurant_icon.svg"
                        style="height:6rem;margin: auto;display: flex;" />
                </div>
                <div
                    style="color: #033F40;display: block;margin:auto;flex-wrap: wrap;text-align: center;font-size: 1rem;padding: 0.3rem;">
                    Restaurant
                </div>
            </div>

            <div
                style="border: 1.32353px solid #ECECEC; width: 32%;;margin-bottom: 2%;position: relative;border-radius: 8.14793px;">
                <div style="display: flex;margin:auto;flex-wrap: wrap;text-align: center;">
                    <img src="assets/hotel_icon.svg" alt="hotel_icon.svg"
                        style="height:6rem;margin: auto;display: flex;" />
                </div>
                <div
                    style="color: #033F40;display: block;margin:auto;flex-wrap: wrap;text-align: center;font-size: 1rem;padding: 0.3rem;">
                    Apartment
                </div>
            </div>

            <div
                style="border: 1.32353px solid #ECECEC; width: 32%;;margin-bottom: 2%;position: relative;border-radius: 8.14793px;">
                <div style="display: flex;margin:auto;flex-wrap: wrap;text-align: center;">
                    <img src="assets/cart_icon.svg" alt="cart_icon.svg"
                        style="height:6rem;margin: auto;display: flex;" />
                </div>
                <div
                    style="color: #033F40;display: block;margin:auto;flex-wrap: wrap;text-align: center;font-size: 1rem;padding: 0.3rem;">
                    Supermarket
                </div>
            </div>

            <div
                style="border: 1.32353px solid #ECECEC; width: 32%;;margin-bottom: 2%;position: relative;border-radius: 8.14793px;">
                <div style="display: flex;margin:auto;flex-wrap: wrap;text-align: center;">
                    <img src="assets/gas_icon.svg" alt="gas_icon.svg" style="height:6rem;margin: auto;display: flex;" />
                </div>
                <div
                    style="color: #033F40;display: block;margin:auto;flex-wrap: wrap;text-align: center;font-size: 1rem;padding: 0.3rem;">
                    Gas Station
                </div>
            </div>

            <div
                style="border: 1.32353px solid #ECECEC; width: 32%;;margin-bottom: 2%;position: relative;border-radius: 8.14793px;">
                <div style="display: flex;margin:auto;flex-wrap: wrap;text-align: center;">
                    <img src="assets/store_icon.svg" alt="store_icon.svg"
                        style="height:6rem;margin: auto;display: flex;" />
                </div>
                <div
                    style="color: #033F40;display: block;margin:auto;flex-wrap: wrap;text-align: center;font-size: 1rem;padding: 0.3rem;">
                    Convinience Store
                </div>
            </div>

            <div
                style="border: 1.32353px solid #ECECEC; width: 32%;;margin-bottom: 2%;position: relative;border-radius: 8.14793px;">
                <div style="display: flex;margin:auto;flex-wrap: wrap;text-align: center;">
                    <img src="assets/pill_icon.svg" alt="pill_icon.svg"
                        style="height:6rem;margin: auto;display: flex;" />
                </div>
                <div
                    style="color: #033F40;display: block;margin:auto;flex-wrap: wrap;text-align: center;font-size: 1rem;padding: 0.3rem;">
                    Pharmacy
                </div>
            </div>
            <div
                style="border: 1.32353px solid #ECECEC; width: 32%;;margin-bottom: 2%;position: relative;border-radius: 8.14793px;">
                <div style="display: flex;margin:auto;flex-wrap: wrap;text-align: center;">
                    <img src="assets/bank_icon.svg" alt="bank-icon.svg"
                        style="height:6rem;margin: auto;display: flex;" />
                </div>
                <div
                    style="color: #033F40;display: block;margin:auto;flex-wrap: wrap;text-align: center;font-size: 1rem;padding: 0.3rem;">
                    Bank
                </div>
            </div>
            <div
                style="border: 1.32353px solid #ECECEC; width: 32%;;margin-bottom: 2%;position: relative;border-radius: 8.14793px;">
                <div style="display: flex;margin:auto;flex-wrap: wrap;text-align: center;">
                    <img src="assets/train_icon.svg" alt="train_icon.svg"
                        style="height:6rem;margin: auto;display: flex;" />
                </div>
                <div
                    style="color: #033F40;display: block;margin:auto;flex-wrap: wrap;text-align: center;font-size: 0.8rem;padding: 0.3rem;">
                    Public Transportation
                </div>
            </div>
            <div
                style="border: 1.32353px solid #ECECEC; width: 32%;;margin-bottom: 2%;position: relative;border-radius: 8.14793px;">
                <div style="display: flex;margin:auto;flex-wrap: wrap;text-align: center;">
                    <img src="assets/police_icon.svg" alt="police_icon.svg"
                        style="height:6rem;margin: auto;display: flex;" />
                </div>
                <div
                    style="color: #033F40;display: block;margin:auto;flex-wrap: wrap;text-align: center;font-size: 1rem;padding: 0.3rem;">
                    Police Station
                </div>
            </div>
            <div
                style="border: 1.32353px solid #ECECEC; width: 32%;;margin-bottom: 2%;position: relative;border-radius: 8.14793px;">
                <div style="display: flex;margin:auto;flex-wrap: wrap;text-align: center;">
                    <img src="assets/train_icon.svg" alt="train_icon.svg"
                        style="height:6rem;margin: auto;display: flex;" />
                </div>
                <div
                    style="color: #033F40;display: block;margin:auto;flex-wrap: wrap;text-align: center;font-size: 1rem;padding: 0.3rem;">
                    Health Care
                </div>
            </div>
            <div
                style="border: 1.32353px solid #ECECEC; width: 32%;;margin-bottom: 2%;position: relative;border-radius: 8.14793px;">
                <div style="display: flex;margin:auto;flex-wrap: wrap;text-align: center;">
                    <img src="assets/store_icon.svg" alt="store_icon.svg"
                        style="height:6rem;margin: auto;display: flex;" />
                </div>
                <div
                    style="color: #033F40;display: block;margin:auto;flex-wrap: wrap;text-align: center;font-size: 1rem;padding: 0.3rem;">
                    Public Market
                </div>

            </div> -->
        </div>
        <br>
        <br>
        <br>
    </div>

</body>
<script>
function submit_login() {
    console.log("Submit Registration Pressed.");
    if (localStorage.getItem("new_user") == "0") {
        window.location.href = "onboarding.php";
    } else if (localStorage.getItem("new_user") == "1") {
        window.location.href = "home.php";
    }
}

function return_back() {

    console.log("Returning.");
    window.location.href = "initial_registration.php";

}
</script>

</html>