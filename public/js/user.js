// == NAVBAR ==
const profileBtn = document.querySelector("#profile-btn");
const popUpProfile = document.querySelector("#pop-up-profile");

if (profileBtn) {
   profileBtn.addEventListener("click", (e) => {
      profileBtn.classList.toggle("profile-active");
   });

   document.addEventListener("click", (e) => {
      if (!popUpProfile.contains(e.target) && !profileBtn.contains(e.target)) {
         profileBtn.classList.remove("profile-active");
      }
   });
}
// != NAVBAR =!

// == SIDEBAR ==
const toggleSidebarBtn = document.querySelector("#toggle-sidebar-btn");

if (toggleSidebarBtn) {
   toggleSidebarBtn.addEventListener("click", function (e) {
      document.body.classList.toggle("toggle-sidebar");
   });
}
// != SIDEBAR =!

// == CALENDAR ==
function generateCalendar(year, month) {
   const calendarElement = document.getElementById("calendar");
   const currentMonthElement = document.getElementById("currentMonth");

   if (calendarElement) {
      // Create a date object for the first day of the specified month
      const firstDayOfMonth = new Date(year, month, 1);
      const daysInMonth = new Date(year, month + 1, 0).getDate();

      // Clear the calendar
      calendarElement.innerHTML = "";

      // Set the current month text
      const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
      currentMonthElement.innerText = `${monthNames[month]} ${year}`;

      // Calculate the day of the week for the first day of the month (0 - Sunday, 1 - Monday, ..., 6 - Saturday)
      const firstDayOfWeek = firstDayOfMonth.getDay();

      // Create headers for the days of the week
      const daysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
      daysOfWeek.forEach((day) => {
         const dayElement = document.createElement("div");
         dayElement.className = "text-center sm:p-3 py-3 px-0 font-semibold bg-[#D4DDF9] rounded-md";
         dayElement.innerText = day;
         calendarElement.appendChild(dayElement);
      });

      // Create empty boxes for days before the first day of the month
      for (let i = 0; i < firstDayOfWeek; i++) {
         const emptyDayElement = document.createElement("div");
         calendarElement.appendChild(emptyDayElement);
      }

      // Create boxes for each day of the month
      for (let day = 1; day <= daysInMonth; day++) {
         const dayElement = document.createElement("div");
         dayElement.className = "text-center py-3 rounded-md border cursor-pointer hover:bg-slate-300";
         dayElement.innerText = day;

         // Check if this date is the current date
         const currentDate = new Date();
         if (year === currentDate.getFullYear() && month === currentDate.getMonth() && day === currentDate.getDate()) {
            dayElement.classList.add("bg-[#4A5B92]", "text-white"); // Add classes for the indicator
         }

         calendarElement.appendChild(dayElement);
      }
   }
}

// Initialize the calendar with the current month and year
const currentDate = new Date();
let currentYear = currentDate.getFullYear();
let currentMonth = currentDate.getMonth();
generateCalendar(currentYear, currentMonth);

const prevMonth = document.getElementById("prevMonth");
const nextMonth = document.getElementById("nextMonth");

if (prevMonth && nextMonth) {
   // Event listeners for previous and next month buttons
   prevMonth.addEventListener("click", () => {
      currentMonth--;
      if (currentMonth < 0) {
         currentMonth = 11;
         currentYear--;
      }
      generateCalendar(currentYear, currentMonth);
   });

   nextMonth.addEventListener("click", () => {
      currentMonth++;
      if (currentMonth > 11) {
         currentMonth = 0;
         currentYear++;
      }
      generateCalendar(currentYear, currentMonth);
   });
}
// != CALENDAR =!

// == THUMBNAIL CLASS ==
const radioThumbnail = document.querySelectorAll("[name=upload-thumbnail]");
const thumbnailSection = document.getElementById("thumbnail-class");

if (radioThumbnail && thumbnailSection) {
   radioThumbnail.forEach((radio, i) => {
      radio.addEventListener("change", (e) => {
         if (e.target.id === "upload-new-thumbnail") {
            thumbnailSection.classList.remove("hidden");
            thumbnailSection.setAttribute("required", "");
         } else {
            thumbnailSection.classList.add("hidden");
            thumbnailSection.removeAttribute("required");
         }
      });
   });
}
// != THUMBNAIL CLASS =!

// == ADD CONTENT BUTTON ==
const addContentButton = document.getElementById("addContentButton");
const dropdown = document.getElementById("dropdownAddContent");

if (addContentButton && dropdown) {
   addContentButton.addEventListener("click", (e) => {
      e.stopPropagation();
      if (dropdown.classList.contains("invisible")) {
         dropdown.classList.remove("invisible");
      } else {
         dropdown.classList.add("invisible");
      }
   });

   // Close dropdown
   document.addEventListener("click", (e) => {
      if (!addContentButton.contains(e.target) && !dropdown.contains(e.target)) {
         dropdown.classList.add("invisible");
      }
   });
}
// != ADD CONTENT BUTTON =!
