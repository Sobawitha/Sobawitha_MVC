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
    return true;
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
    return true;
  }

  function validateEmail($email) {
    // Check if the email address is valid using PHP's built-in filter_var() function
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return "email is not valid";
    }
    
    // If all checks pass, return true
    return true;
  }

  
  function validatePassword($password) {
    // Check if the password is at least 8 characters long
    if (strlen($password) < 8) {
        return "Password must be at least 8 characters long";
    }
    
    // Check if the password contains at least one uppercase letter, one lowercase letter, one digit, and one special character
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).+$/', $password)) {
        return "Password should contain at least one uppercase letter, one lowercase letter, one digit, and one special character";
    }
    
    // If all checks pass, return true
    return true;
}



  function validateCity($city) {
    // Check if the city name contains only letters and spaces
    if (!preg_match('/^[A-Za-z\s]+$/', $city)) {
      return "city name should contains only letters and spaces";
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
    return true;
  }

  function validateAccountHolderName($name) {
    // Check if the name contains only letters and spaces
    if (!preg_match('/^[A-Za-z\s]+$/', $name)) {
      return "account holder name should contains only letters and spaces";
    }
    
    // If all checks pass, return true
    return true;
  }

  function validateBankBranch($branch) {
    // Check if the branch name contains only letters, numbers and spaces
    if (!preg_match('/^[A-Za-z0-9\s]+$/', $branch)) {
      return "branch name should contains only letters, numbers and spaces";
    }
    
    // If all checks pass, return true
    return true;
  }

  
  function validateAccountNumber($accountNumber) {
    // Check if the account number only contains hyphens and digits
    if (!preg_match("/^[0-9\-]+$/", $accountNumber)) {
        return "Account number should only contain hyphens and digits";
    }
    
    // Check if the account number is between 10 and 20 digits long
    if (strlen($accountNumber) < 8 || strlen($accountNumber) > 20) {
        return "Account number should be between 10 and 20 digits long";
    }
    
    // If all checks pass, return true
    return true;
}

  function validateAddress($address) {
    // Check if the address contains only letters, numbers, spaces and common special characters
    if (!preg_match('/^[A-Za-z0-9\s.,#\-\/\(\)]+$/', $address)) {
      return "address must only contain letters, numbers, spaces, and common special characters";
    }
    
    // If all checks pass, return true
    return true;
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



  function validateDescription($description) {
    // Check if the description contains only letters, numbers, spaces and common special characters
    if (!preg_match('/^[A-Za-z0-9\s.,#\-\/\(\)]+$/', $description)) {
      return "Description contains invalid characters.";
    }
    
    // If all checks pass, return true
    return "true";
  }

  function validateNIC($nic) {
    // Check if the length of the NIC number is between 10 and 12 characters
    $nicLength = strlen($nic);
    if ($nicLength < 10 || $nicLength > 12) {
        return "NIC number must have 10 or 12 characters";
    }

    // If the NIC number is 10 characters long, the last character must be a letter and the others must be digits
    if ($nicLength === 10) {
        if (!preg_match('/^[0-9]{9}[a-zA-Z]$/', $nic)) {
            return "NIC number must have 9 digits followed by a letter";
        }
    }
    
        // If the NIC number is 11 characters long, it is invalid
        if ($nicLength === 11) {
          return 'NIC number must have 10 or 12 characters';
      }
  
    // If the NIC number is 12 characters long, all characters must be digits
    if ($nicLength === 12) {
        if (!preg_match('/^[0-9]{12}$/', $nic)) {
            return "NIC number must have 12 digits";
        }
    }

    // If all checks pass, return true
    return true;
}

function validateBirthDate($birthDate) {
  // Convert the birth date to a timestamp
  $birthTimestamp = strtotime($birthDate);
  
  // Get the current timestamp
  $currentTimestamp = time();
  
  // Compare the birth timestamp with the current timestamp
  if ($birthTimestamp > $currentTimestamp) {
    return "Birth date cannot be a future date";
  }
  
  // If the birth date is valid, return true
  return true;
}
  

 ?>
