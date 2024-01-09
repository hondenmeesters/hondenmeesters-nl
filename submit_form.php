<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecting form data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST["phone"]);
    $dog_name = trim($_POST["dog_name"]);
    $dog_breed = trim($_POST["dog_breed"]);
    $dog_birthdate = trim($_POST["dog_birthdate"]);
    $dog_origin = trim($_POST["dog_origin"]);
    $problems = trim($_POST["problems"]);
    $location = trim($_POST["location"]);
    $address = trim($_POST["address"]);

    // Validate the data (e.g., ensure that required fields are not empty)
    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle the error appropriately
        echo "Please fill in all required fields.";
        exit;
    }

    // Recipient email (where the form data will be sent)
    $recipient = "hondenmeesters@gmail.com";

    // Email subject
    $subject = "New lead: $name | $dog_name";

    // Email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n";
    $email_content .= "Dog Name: $dog_name\n";
    $email_content = "Dog Breed: $dog_breed\n";
    $email_content .= "Dog Birthdate: $dog_birthdate\n";
    $email_content .= "Dog Origin: $dog_origin\n";
    $email_content .= "Problems: $problems\n";
    $email_content .= "Place: $location\n";
    $email_content .= "Address: $address\n";



    // Email headers
    $email_headers = "From: $name <$email>";

    // Sending the email
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        echo "Thank you for your submission!";
    } else {
        echo "Oops! Something went wrong, we couldn't send your message.";
    }
}
?>
