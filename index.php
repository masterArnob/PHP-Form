<?php
include("database.php");
$email =  $name = $subject = $query = "";
$emailError = $nameError = $subjectError = $queryError = "";

if (isset($_POST["submit"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameError = "*Name is required";
        }
        if (empty($_POST["email"])) {
            $emailError = "*Email is required";
        }
        if (empty($_POST["query"])) {
            $queryError = "*Query is required";
        } else {
            $email = $_POST["email"];
            $name = $_POST["name"];
            $subject = $_POST["subject"];
            $query = $_POST["query"];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = "Invalid email format";
            } else if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameError = "Only letters and white space allowed";
            } else {
                $sql = "INSERT INTO form(email, name, subject, query) 
                         VALUES('$email' , '$name' , '$subject' , '$query')";

                try {

                    mysqli_query($con, $sql);
                    echo "data is saved";
                } catch (mysqli_sql_exception) {
                    echo "Error : " . $sql . "<br>" . $con->error;
                }
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>





    <section id="contact">
        <div class="container-lg">
            <div class="text-center">
                <h2>Get in Touch</h2>
                <p class="lead">Question to ask? Fill out the form to contact me directly.</p>
            </div>

            <div class="row justify-content-center my-5">
                <div class="col-lg-6">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                        <label for="email" class="form-label">Email address:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa-sharp fa-solid fa-envelope"></i>
                            </span>
                            <input type="email" name="email" class="form-control" placeholder="e.g mario@example.com">
                        </div>
                        <p class="text-danger"><?php echo $emailError ?></p>




                        <label for="name" class="form-label">Name :</label>
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <input type="text" name="name" placeholder="e.g Mario" class="form-control">
                        </div>
                        <p class="text-danger"><?php echo $nameError ?></p>



                        <label for="subject" class="form-label">What is your question about?</label>


                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <i class="fa-solid fa-message"></i>
                            </div>
                            <select class="form-select" name="subject">
                                <option value="pricing" selected>pricing</option>
                                <option value="content">content</option>
                                <option value="others">others</option>
                            </select>
                        </div>



                        <div class="form-floating mb-4 mt-5">
                            <textarea name="query" style="height:140px" class="form-control"></textarea>
                            <label for="comment" class="form-label">Your query</label>
                        </div>
                        <p class="text-danger"><?php echo $queryError ?></p>









                        <div class="text-center mb-4">
                            <button type="submit" class="btn btn-danger" name="submit">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>