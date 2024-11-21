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
            confirmButtonColor: "#d02c24",
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
            window.location.href = "/update-profile";
        }
    });
}
