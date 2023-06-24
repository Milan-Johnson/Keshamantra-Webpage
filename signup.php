<section class="signup-form">
<h2>Sign up</h2>
    <form action="includes/signup-inc.php" method="post">
        <input type="text" name="userid" placeholder="User Name">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password-repeat" placeholder="Repeat Password ">
        <button type="submit" name="submit" >Sign Up</button>
    </form>

    <?php
    if (isset($_GET["error"])) {
        if($_GET["error"] == "user_id_required") {
            echo "User Id Required";
        }
        if($_GET["error"] == "no_8_char") {
            echo "Minimum 8 character required of Password";
        }
        if($_GET["error"] == "no_letter") {
            echo "Minimum 1 letter is required of Password";
        }
        if($_GET["error"] == "no_number") {
            echo "Minimum 1 number is required of Password";
        }
        if($_GET["error"] == "psd_not_match") {
            echo "Password Doesn't match";
        }
        if($_GET["error"] == "user_name_taken") {
            echo "User Name already taken";
        }
        if($_GET["error"] == "stmt_failed") {
            echo "Something went Wrong,Try again!";
        }
        if($_GET["error"] == "none") {
            echo "User created Successfully";
        }
    }
    ?>

</section>

