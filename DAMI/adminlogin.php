<?php 
// LOG IN 

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dami";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['adminlogin'])) {
    
    $adminusername=$_POST['adminusername'];
    $adminpassword=$_POST['adminpassword'];
    $adminpassword_hash=(sha1($adminpassword));
  

    $query = "SELECT * FROM admin WHERE username= '$adminusername' && password ='$adminpassword_hash' ";
    $data =  mysqli_query($conn, $query);
    $total =  mysqli_num_rows($data);
    
 
    $row=mysqli_fetch_array($data);
    $_SESSION['adminusername']=$row['username']; 


   if($total == 1){
           
  
       $_SESSION['adminusername'] = $adminusername;
       
       header("location:adminpage.php");
      

    //   }
          
   }
   else{
       
    header("location:adminlogin.php");
   
    
    //    echo "<script type>document.getElementById('wrong').modal('show');</script>";

   }


  

}
if(isset($_SESSION['adminusername'])){
    
    header("location:adminpage.php");
    
    }else{

    }



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
   
    <style>
        #overlay {
            position: fixed;
            top: 0;
            z-index: 100;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);

        }

        .cv-spinner {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        body {
            background-image: url("preloader/images/admin.svg");
            background-repeat: no-repeat;

        }

        .back {
            font-size: 1.4rem;
            padding-left: 1.5rem;
            padding-top: 1.5rem;
            
           


        }

        .title {
            font-size: 2.2rem;
             color: #444;
             margin-bottom: 10px;
}
    </style>


    <head>

        <!-- LINKS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  


        <link rel="stylesheet" href="style.css" />

    </head>
</head>

<body>


    
    

    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

 
    <div class="forms-container">
    <!-- Modal HTML -->

    

    <h1 class="back">back <a href="index.php"> <i class="fa fa-arrow-left" style="color:#5995fd" aria-hidden="true"></i></a>
  
    </h1>
    <div class="signin-signup">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="sign-in-form" method="post">

            <h2 class="title" ><b>Admin</b></h2>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="adminusername" required />
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="adminpassword" required />
            </div>
            <input type="submit" value="Login" class="btn solid" name="adminlogin" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
                <a href="#" class="social-icon">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </form>
    </div>
</form>












    <div id="overlay">
        <div class="cv-spinner">
            <div class="spinner">
                <img src="preloader/images/cool.svg" alt="">
                <!--use other image-->
            </div>
        </div>
    </div>



    <script src="preloader/js/jquery-latest.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".btn-danger").click(function(event) {
                $("#overlay").fadeIn("fast", function() {
                    $("#overlay").delay(2000).fadeOut("slow");
                });
            });

            //will do on page load now
            $("#overlay").delay(2000).fadeOut("slow");

        })
    </script>
</body>

</html>