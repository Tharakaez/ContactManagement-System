// Image size validation
function validateImageFile(input) {
  const file = input.files[0];
  const fileError = document.getElementById("fileError");

  if (file) {
    const allowedImageTypes = ["image/jpeg", "image/png", "image/gif", "image/bmp"]; // Add more image types as needed

    if (!allowedImageTypes.includes(file.type)) {
      fileError.textContent = "Please choose a valid image file (JPEG, PNG, GIF, BMP, etc).";
      input.value = ''; // Clear the input
    } else if (file.size > 1024 * 1024) { // 1MB in bytes
      fileError.textContent = "Image size exceeds 1MB. Please choose a smaller image.";
      input.value = ''; // Clear the input
    } else {
      fileError.textContent = ""; // Clear the error message if the file is valid
    }
  }
}

//image size validation for edit
function validateEditImageFile(input) {
  const file = input.files[0];
  const fileError = document.getElementById("editFileError");

  if (file) {
    const allowedImageTypes = ["image/jpeg", "image/png", "image/gif", "image/bmp"]; // Add more image types as needed

    if (!allowedImageTypes.includes(file.type)) {
      fileError.textContent = "Please choose a valid image file (JPEG, PNG, GIF, BMP, etc).";
      input.value = ''; // Clear the input
    } else if (file.size > 1024 * 1024) { // 1MB in bytes
      fileError.textContent = "Image size exceeds 1MB. Please choose a smaller image.";
      input.value = ''; // Clear the input
    } else {
      fileError.textContent = ""; // Clear the error message if the file is valid
    }
  }
}

// Phon number validation
function validatePhone(input) {
  const phone = input.value;
  const phoneError = document.getElementById("phoneError");

  if (phone.length > 10) {
    input.value = phone.slice(0, 10); // Truncate to a maximum of 10 characters
  }

  if (phone.length < 10) {
    phoneError.textContent = "This must be exactly 10 digits.";
    input.setCustomValidity("This must be exactly 10 digits.");
  } else {
    phoneError.textContent = "";
    input.setCustomValidity("");
  }
}

// Phone number validation for edit
function validateEditPhone(input) {
  const phone = input.value;
  const phoneError = document.getElementById("editPhoneError");

  if (phone.length > 10) {
    input.value = phone.slice(0, 10); // Truncate to a maximum of 10 characters
  }

  if (phone.length < 10) {
    phoneError.textContent = "This must be exactly 10 digits.";
    input.setCustomValidity("This must be exactly 10 digits.");
  } else {
    phoneError.textContent = "";
    input.setCustomValidity("");
  }
}

// Email validation
function validateEmail(input) {
  const email = input.value;
  const emailError = document.getElementById("emailError");

  // Regular expression for basic email format validation
  const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  if (!emailPattern.test(email)) {
    emailError.textContent = "Please enter a valid email address.";
    input.setCustomValidity("Invalid email address");
  } else {
    emailError.textContent = "";
    input.setCustomValidity("");
  }
}

// Email validation for edit
function validateEditEmail(input) {
  const email = input.value;
  const emailError = document.getElementById("editEmailError");

  // Regular expression for basic email format validation
  const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  if (!emailPattern.test(email)) {
    emailError.textContent = "Please enter a valid email address.";
    input.setCustomValidity("Invalid email address");
  } else {
    emailError.textContent = "";
    input.setCustomValidity("");
  }
}