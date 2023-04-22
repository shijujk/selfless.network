<?php

// Function to sanitize form data
function sanitize_data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Sanitize form data
  $name = sanitize_data($_POST['name']);
  $age = sanitize_data($_POST['age']);
  $email = sanitize_data($_POST['email']);
  $q1 = sanitize_data($_POST['question-1']);
  $q2 = isset($_POST['question-2']) ? implode(", ", $_POST['question-2']) : '';
  $q3 = sanitize_data($_POST['question-3']);
  $q4 = isset($_POST['question-4']) ? implode(", ", $_POST['question-4']) : '';
  $q5 = sanitize_data($_POST['question-5']);
  $q6 = isset($_POST['question-6']) ? implode(", ", $_POST['question-6']) : '';
  $q7 = sanitize_data($_POST['question-7']);
  $q8 = isset($_POST['question-8']) ? implode(", ", $_POST['question-8']) : '';
  $q9 = sanitize_data($_POST['question-9']);
  $q10 = isset($_POST['question-10']) ? implode(", ", $_POST['question-10']) : '';

  // Open file for appending
  $file = fopen('responses.txt', 'a');

  // Write form data to file
  fwrite($file, "Name: $name\n");
  fwrite($file, "Age: $age\n");
  fwrite($file, "Email: $email\n");
  fwrite($file, "Q1: $q1\n");
  fwrite($file, "Q2: $q2\n");
  fwrite($file, "Q3: $q3\n");
  fwrite($file, "Q4: $q4\n");
  fwrite($file, "Q5: $q5\n");
  fwrite($file, "Q6: $q6\n");
  fwrite($file, "Q7: $q7\n");
  fwrite($file, "Q8: $q8\n");
  fwrite($file, "Q9: $q9\n");
  fwrite($file, "Q10: $q10\n");
  fwrite($file, "-------------------------\n");

  // Close file
  fclose($file);

  // Redirect to thank you page
  header('Location: thank-you.html');
  exit();

} else {
  // Redirect to form page
  header('Location: slow-fashion-form.html');
  exit();
}
