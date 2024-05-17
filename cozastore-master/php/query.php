<?php
session_start();
include('dbcon.php');
if(isset($_POST['register'])){
    $userName = $_POST['name'];
    $userPassword = $_POST['password'];
    $userEmail = $_POST['email'];
    $userNumber = $_POST['ContactNumber'];
    $query= $pdo->prepare("insert into user(FullName,Password,Email,Number)VALUES(:un,:up,:ue,:unum)");
    $query->bindParam("un",$userName);
    $query->bindParam("ue",$userEmail);
    $query->bindParam("up",$userPassword);
    $query->bindParam("unum",$userNumber);
    $query->execute();
echo "<script>alert('User added successfully')
location.assign('login.php')
</script>";


}
// login
if (isset($_POST['login'])){
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];
    $query = $pdo->prepare("select * from user where
    Email=:ue && Password=:up");
    $query->bindParam("ue", $userEmail);
    $query->bindParam("up", $userPassword);

    $query->execute();
    $userData = $query->fetch(PDO::FETCH_ASSOC);
//    var_dump($userData);
//    die();
    if ($userData) {
//         // echo "<script>alert('logged in
//               var_dump($userData);
//    die();
        // </script>";
        // die();
        $_SESSION['sessionEmail'] = $userData['Email'];
        $_SESSION['sessionName'] = $userData['FullName'];
        $_SESSION['sessionPassword'] = $userData['Password'];
        $_SESSION['sessionRole'] = $userData['role'];
      
        if ($_SESSION['sessionRole'] == "admin") {
            echo "<script>alert('logged in successfully');
            location.assign('../dashmin/index.php')
            </script>";
        } else {
            echo "<script>alert('logged in');</script>";
            

            

        }
    }
}
?>