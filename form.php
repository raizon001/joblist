<?php
include('config.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = ''; // Variable to store the pop-up message

if (isset($_POST['submit'])) {
    $JobPosition = $_POST['JobPosition'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $dateofbirth = $_POST['dob'];
    $phone = $_POST['phone'];
    $educationattainment = $_POST['education'];

    $add_product_query = mysqli_query($conn, "INSERT INTO curdoperation (jobposition, name, email, address, dateofbirth, phone, educationattainment) 
        VALUES ('$JobPosition', '$name', '$email', '$address', '$dateofbirth', '$phone', '$educationattainment')");

    if ($add_product_query) {
        $message = "Data inserted successfully";
    } else {
        $message = "There was an error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleform.css" />
    <title>Application Form</title>
</head>

<body>

    <main>
        <h2> APPLICATION FORM </h2>
        <div class="Form-box">
            <form method="post" action="form.php" class="application-form">

                <div class="input-box">
                    <label for="Position">Job Position:</label>
                    <textarea id="Position" name="JobPosition" placeholder="Job Position"></textarea>
                </div>

                <div class="input-box">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name">
                </div>

                <div class="input-box">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email">
                </div>

                <div class="input-box">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" placeholder="Enter your address"></textarea>
                </div>

                <div class="input-box">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob">
                </div>

                <div class="input-box">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number">
                </div>

                <div class="input-box">
                    <label for="education">Education Attainment:</label>
                    <input type="text" id="education" name="education" placeholder="Education Attainment">
                </div>

                <div class="input-box">
                    <label for="comments">Additional Comments:</label>
                    <textarea id="comments" name="comments" placeholder="Enter any additional comments or information"></textarea>
                </div>

                <button type="submit" class="submit-btn" name="submit">Submit</button>
            </form>

            <div class="goback-buttons">
                <a href="index.html" class="goback-button">Go Back</a>
            </div>

            <?php if (!empty($message)) : ?>
                <script>alert('<?php echo $message; ?>');</script>
            <?php endif; ?>
        </div>
    </main>

</body>

</html>
