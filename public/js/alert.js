// === Student Page ===
// Update Student Profile
const updateProfileForm = document.getElementById("update-profile-form");
if (updateProfileForm) {
   updateProfileForm.addEventListener("submit", (e) => {
      e.preventDefault();

      Swal.fire({
         title: "Double Check Your Information",
         text: "Do you want to continue with the updates to your profile?",
         icon: "warning",
         showCancelButton: true,
         confirmButtonText: "Update",
         reverseButtons: true,
         cancelButtonText: "Cancel",
      }).then((result) => {
         if (result.isConfirmed) {
            updateProfileForm.submit();
         }
      });
   });
}

// Complete Student Profile
const completeProfileForm = document.getElementById("complete-profile-form");
if (completeProfileForm) {
   completeProfileForm.addEventListener("submit", (e) => {
      e.preventDefault();

      Swal.fire({
         title: "Confirm Your Information",
         text: "Please confirm that your profile information is correct before proceeding.",
         icon: "warning",
         showCancelButton: true,
         confirmButtonText: "Complete",
         reverseButtons: true,
         cancelButtonText: "Cancel",
      }).then((result) => {
         if (result.isConfirmed) {
            completeProfileForm.submit();
         }
      });
   });
}

// Logout
const logoutForm = document.getElementById("logout-form");
if (logoutForm) {
   logoutForm.addEventListener("submit", (e) => {
      e.preventDefault();

      Swal.fire({
         title: "Leaving so soon?",
         text: "We'll miss you! Don't forget to come back soon",
         icon: "warning",
         showCancelButton: true,
         confirmButtonText: "Logout",
         confirmButtonColor: "#4A5B92",
         reverseButtons: true,
         cancelButtonText: "Cancel",
      }).then((result) => {
         if (result.isConfirmed) {
            logoutForm.submit();
         }
      });
   });
}

// Success Alert
function successAlert(text) {
   Swal.fire({
      title: "Success!",
      text,
      icon: "success",
   });
}

// Complete Profile Alert
function completeProfileAlert(text) {
   Swal.fire({
      title: "Profile Not Complete",
      text,
      icon: "warning",
      confirmButtonText: "Complete Profile",
      allowOutsideClick: false,
      allowEscapeKey: false,
      allowEnterKey: false,
   }).then((result) => {
      if (result.isConfirmed) {
         // Redirect to the form page
         window.location.href = "/complete-profile";
      }
   });
}

// Confirmation Create Class
const createClassForm = document.getElementById("create-class-form");
if (createClassForm) {
   createClassForm.addEventListener("submit", (e) => {
      e.preventDefault();

      Swal.fire({
         title: "Verify Your Class Details",
         text: "Please ensure that all the information about your class is correct before submitting.",
         icon: "warning",
         showCancelButton: true,
         confirmButtonText: "Create",
         reverseButtons: true,
         cancelButtonText: "Cancel",
      }).then((result) => {
         if (result.isConfirmed) {
            createClassForm.submit();
         }
      });
   });
}

// No Class Alert
function noClassAlert(text) {
   Swal.fire({
      title: "No Class Assigned",
      text,
      icon: "error",
   });
}
