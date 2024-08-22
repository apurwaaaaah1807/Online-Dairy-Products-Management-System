<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $con = pg_connect(
        'host=localhost port=5432 dbname=dairy user=postgres password=root'
    );

    pg_query(
        $con,
        "INSERT into contact(name,email,message) VALUES('$name','$email','$message')"
    );

    echo "<script>alert('Your valuable feedback is submitted successfully. Thank You.')</script>";
    echo "<script>window.location.href = 'index.php'</script>";
} ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<title> Contact Us </title>
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/contact.css">
<!-- Fontawesome CDN Link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php include_once 'navbar.php'; ?>
<br>

<div class="container">
<div class="content">
<div class="left-side">
<div class="address details">
<i class="fas fa-map-marker-alt"></i>
<div class="topic">Address</div>
<div class="text-one">Pune</div>
<div class="text-two">Maharashtra</div>
</div>
<div class="phone details">
<i class="fas fa-phone-alt"></i>
<div class="topic">Phone</div>
<div class="text-one">020 23456789</div>
<div class="text-two">020 98765434</div>
</div>
<div class="email details">
<i class="fas fa-envelope"></i>
<div class="topic">Email</div>
<div class="text-one">ABC@gmail.com</div>
<div class="text-two">XYZ@gmail.com</div>
</div>
</div>
<div class="right-side">
<div class="topic-text">Send us a message</div>
<p>If you have any queries, you can send message from here. It's our pleasure to help you.</p>
<form method="post">
<div class="input-box">
<input type="text" placeholder="Enter your name" name="name" required>
</div>
<div class="input-box">
<input type="text" placeholder="Enter your email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
</div>
<div class="input-box message-box">
<input type="text" placeholder="Enter your message" name="message" required>
</div>
<div class="button">
<input type="submit" value="Send Now" name="submit">
</div>
</form>
</div>
</div>
</div>
</body>
</html>


