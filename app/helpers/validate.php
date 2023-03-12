<?php


  function validateFirstName($firstName) {
    // Check if the first name only contains letters
    if (!preg_match("/^[a-zA-Z]+$/", $firstName)) {
      return 'first name should only contain letters';
    }
    
    // Check if the length of the first name is between 2 and 50 characters
    if (strlen($firstName) < 2 || strlen($firstName) > 50) {
      return 'first name must be between 2 and 50 characters';
    }
    
    // If all checks pass, return true
    return "true";
  }

  function validateLastName($lastName) {
    // Check if the last name only contains letters
    if (!preg_match("/^[a-zA-Z]+$/", $lastName)) {
      return 'last name should only contain letters';
    }
    
    // Check if the length of the last name is between 2 and 50 characters
    if (strlen($lastName) < 2 || strlen($lastName) > 50) {
      return 'last name must be between 2 and 50 characters';
    }
    
    // If all checks pass, return true
    return true;
  }

  
  function validateContactNumber($contactNumber) {
    // Remove any non-digit characters
    $contactNumber = preg_replace('/\D/', '', $contactNumber);
    
    // Check if the number is exactly 10 digits long
    if (strlen($contactNumber) != 10) {
      return 'contact number should be exactly 10 digits long';
    }
    
    // Check if the number starts with "0"
    if (substr($contactNumber, 0, 1) != "0") {
      return 'contact number should start with 0';
    }
    
    // If all checks pass, return true
    return "true";
  }

  function validateEmail($email) {
    // Check if the email address is valid using PHP's built-in filter_var() function
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return "email is not valid";
    }
    
    // If all checks pass, return true
    return "true";
  }

  
  function validatePassword($password) {
    // Check if the password is at least 8 characters long
    if (strlen($password) < 8) {
      return "Password must be at least 8 characters long";
    }
    
    // Check if the password contains at least one uppercase letter, one lowercase letter, and one digit
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $password)) {
      return "Password should contains at least one uppercase letter, one lowercase letter, and one digit";
    }
    
    // If all checks pass, return true
    return "true";
  }


  function validateCity($city) {
    // Check if the city name contains only letters and spaces
    if (!preg_match('/^[A-Za-z\s]+$/', $city)) {
      return "city name should contains only letters and spaces";
    }
    
    // If all checks pass, return true
    return "true";
  }

  function validateSlmcRegisterNumber($registerNumber) {
    // Remove any non-digit characters
    $registerNumber = preg_replace('/\D/', '', $registerNumber);
    
    // Check if the number is exactly 7 digits long
    if (strlen($registerNumber) != 7) {
      return "slmc reg number should be 7 digits long";
    }
    
    // Check if the number starts with "1" or "2"
    if (substr($registerNumber, 0, 1) != "1" && substr($registerNumber, 0, 1) != "2") {
      return "slmc reg number should start with 1 or 2";
    }
    
    // If all checks pass, return true
    return "true";
  }

  function validateSpecialization($specialization) {
    // Check if the specialization name contains only letters and spaces
    if (!preg_match('/^[A-Za-z\s]+$/', $specialization)) {
      return "specialization name should contains only letters and spaces";
    }
    
    // If all checks pass, return true
    return "true";
  }

  function validateBankName($bankName) {
    // Check if the bank name contains only letters and spaces
    if (!preg_match('/^[A-Za-z\s]+$/', $bankName)) {
       return "bank name should contains only letters and spaces";
 
    }
    
    // If all checks pass, return true
    return "true";
  }

  function validateAccountHolderName($name) {
    // Check if the name contains only letters and spaces
    if (!preg_match('/^[A-Za-z\s]+$/', $name)) {
      return "account holder name should contains only letters and spaces";
    }
    
    // If all checks pass, return true
    return "true";
  }

  function validateBankBranch($branch) {
    // Check if the branch name contains only letters, numbers and spaces
    if (!preg_match('/^[A-Za-z0-9\s]+$/', $branch)) {
      return "branch name should contains only letters, numbers and spaces";
    }
    
    // If all checks pass, return true
    return "true";
  }

  
  function validateAccountNumber($accountNumber) {
    // Check if the account number is numeric
    if (!is_numeric($accountNumber)) {
      return "account number should be numeric";
    }
    
    // Check if the account number is 10 digits long
    if (strlen($accountNumber) != 10) {
      return "account number should be 10 digits long";
    }
    
    // If all checks pass, return true
    return "true";
  }

  function validateAddress($address) {
    // Check if the address contains only letters, numbers, spaces and common special characters
    if (!preg_match('/^[A-Za-z0-9\s.,#\-\/\(\)]+$/', $address)) {
      return "address must only contain letters, numbers, spaces, and common special characters";
    }
    
    // If all checks pass, return true
    return "true";
  }

  function validateFee($fee) {
    // Check if the fee is numeric and positive
    if (!is_numeric($fee) || $fee <= 0) {
      return "fee must be a positive number";
    }
    
    // If all checks pass, return true
    return "true";
  }

  function validateTitle($title) {
    // Check if the title contains only letters, numbers and spaces
    if (!preg_match('/^[A-Za-z0-9\s]+$/', $title)) {
      return "title should contains only letters, numbers and spaces";
    }
    
    // If all checks pass, return true
    return "true";
  }


  function validateMaxParticipants($maxParticipants) {
    // Check if the maxParticipants is numeric and positive
    if (!is_numeric($maxParticipants) || $maxParticipants <= 0) {
      return "maximum Participants must be a positive number";
    }
    
    // If all checks pass, return true
    return "true";
  }

  function validateDescription($description) {
    // Check if the description contains only letters, numbers, spaces and common special characters
    if (!preg_match('/^[A-Za-z0-9\s.,#\-\/\(\)]+$/', $description)) {
      return "Description contains invalid characters.";
    }
    
    // If all checks pass, return true
    return "true";
  }
  

 ?>
