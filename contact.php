<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
<?php require 'base.php'?>
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email=$_POST['emailval'];
        $value=$_POST['nameval'];
        $back=$_POST['feedval'];
        //Connecting to database
        $servername="localhost";
        $username="root";
        $password="";
        $database="gamingblog";
        //Creating a connection
        $conn=mysqli_connect($servername,$username,$password,$database);
        if(!$conn){
            die("Sorry we failed to connect".mysqli_connect_error($conn));
        }
        else{
    // Submit these to a database
        // Sql query to be executed 
        $sql = "INSERT INTO `contact` (`email`, `name`, `feedback`) VALUES ('$email', '$value','$back')";
        $result = mysqli_query($conn, $sql);
            if(!$result){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>';
             }
            else{
                echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your entry has been submitted successfully!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>';
             }
        }
     }
?>
    <!-- Contact Us -->
    <div class="container">
        <h2 style="text-align: center;">CONTACT US</h2>
        <form action="/Bootstrap/contact.php" method="POST">
            <div class="mb-3 mt-3">
                <label for="exampleInputEmail3" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail3" name="emailval" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword5" class="form-label">Name</label>
                <input type="text" class="form-control"  id="exampleName"  name="nameval">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Feedback</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="feedval" ></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
    <?php require 'footer.php'?>
</body>
<!-- //Backend code -->


</html>