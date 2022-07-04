<?php 
    session_start();
    require 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Login Admin</title>
</head>
<body style="background-color: #799E6C ;">
    <div class="container w-50 p-5 ms-auto mt-5" style="background-color: white ;">
        <h1 class="text-center"><a style="text-decoration: none; color:#799E6C;" href="index.php">Japenta-Mart</a></h1>
        <h3>Login</h3>
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Login">
        </form>
    </div>
</body>
</html>

<?php 
    require 'connect.php';
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($mysqli, "SELECT * FROM login_admin WHERE username = '$username'");
        $hash = md5($password);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);

            if($hash == $row['psw']){

                $_SESSION['login'] = true;

                header("Location:admin.php");
                exit;
            }
        }
        echo "Error";
    }
?>