<?php

include("db.php");

if (empty($_POST['name']) ||
        empty($_POST['email']) ||
        empty($_POST['phone']) ||
        empty($_POST['message']) ||
        !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "No arguments Provided!";
    return false;
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

////////////////////////////////////////////////////////////////////////////////
if( $_POST ) {
    $conn = new PDO("mysql:host=$servername;dbname=WebsiteDB", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO contact_info (name, email, phone) VALUES ('$name', '$email', '$phone')";
    $conn->exec($sql);
}
/////////////////////////////////////jjjj//
$to = 'bbrody45@gmail.com';
$email_subject = "Contact From: $name";
$email_body = "New message from: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: bbrody45@gmail.com\n";
$headers .= "Reply-To: $email_address";
mail($to, $email_subject, $email_body, $headers);
return true;
?>
