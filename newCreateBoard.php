<?php
    $errors = [];
    if(isset($_POST['submit'])) {
        $errors = registerUser($_POST);

        if(count($errors) === 0) {
            header('Location: index.php');
            exit();
        }
    }
?>

<?php require_once('createboardvalidation.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Assignment 3, "Create board" feature</title>
  </head>

  <style>
        .login-container{
        margin-top: 5%;
        margin-bottom: 5%;
        }
        .login-form-1{
            padding: 5%;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
        }
        .login-form-1 h3{
            text-align: center;
            color: #333;
        }
        .login-form-2{
            padding: 5%;
            background: #D3D3D3;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
        }
        .login-form-2 h3{
            text-align: center;
            color: #fff;
        }
        .login-container form{
            padding: 10%;
        }
        .btnSubmit
        {
            width: 50%;
            border-radius: 1rem;
            padding: 1.5%;
            border: none;
            cursor: pointer;
        }
        .login-form-1 .btnSubmit{
            font-weight: 600;
            color: #fff;
            background-color: #0062cc;
        }
        .login-form-2 .btnSubmit{
            font-weight: 600;
            color: #0062cc;
            background-color: #fff;
        }
        .login-form-2 .ForgetPwd{
            color: #fff;
            font-weight: 600;
            text-decoration: none;
        }
        .login-form-1 .ForgetPwd{
            color: #0062cc;
            font-weight: 600;
            text-decoration: none;
        }
  </style>

<?php
/*
//team discussion about this area
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "myDB";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO Scrumboard details (teamname, colourboard, optionalcomment, invitedmemberlist)
    VALUES ('teamname', 'colourboard', 'optionalcomment', 'invitedmemberlist')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    */
?>

  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
    <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Let's create your board</h3>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Team name*" value="" />
                        </div>
                       
                        <label for="comment">Choose your board colour</label>
                        <!-- Group of material radios - Yellow -->
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="yellow" name="colourboard"value = "yellow">
                            <label class="form-check-label" for="materialGroupExample1">Yellow</label>
                        </div>

                        <!-- Group of material radios - Red -->
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="red" name="colourboard" value = "red">
                            <label class="form-check-label" for="materialGroupExample2">Red</label>
                        </div>

                        <!-- Group of material radios - Blue -->
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="blue" name="colourboard" value = "blue">
                            <label class="form-check-label" for="materialGroupExample3">Blue</label>
                        </div>

                         <!-- Group of material radios - Green -->
                         <div class="form-check">
                            <input type="radio" class="form-check-input" id="green" name="colourboard" value = "green">
                            <label class="form-check-label" for="materialGroupExample3">Green</label>
                        </div>

                         <!-- Group of material radios - Orange -->
                         <div class="form-check">
                            <input type="radio" class="form-check-input" id="orange" name="colourboard"value = "orange">
                            <label class="form-check-label" for="materialGroupExample3">Orange</label>
                        </div>

                         <!-- Group of material radios - Purple -->
                         <div class="form-check">
                            <input type="radio" class="form-check-input" id="purple" name="colourboard"value = "purple">
                            <label class="form-check-label" for="materialGroupExample3">Purple</label>
                        </div>

                        <div class="form-group">
                            <label for="comment"></label>
                            <textarea class="form-control" rows="5" id="optionalcomment" name = "optionalcomment" placeholder="Optional *" ></textarea>
                        </div>

                    </form>
                </div>


                <div class="col-md-6 login-form-2">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email *" value="" />
                        </div>

                        <div class="form-group">
                            <label for="comment">Invited members</label>
                            <textarea class="form-control" rows="5" id="invitedmemberlist" name ="invitedmemberlist" placeholder="Emails sent to*" ></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Create Board" />
                        </div>

                    </form>
                </div>
            </div>
        </div>
  </body>

</html>