document.addEventListener("DOMContentLoaded", () => {
  const datetimePicker = flatpickr("#datetimepicker", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
  });
  const endDatetimePicker = flatpickr("#endDatetimePicker", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
  });

  function setDateTime() {
    const endDatetime = new Date();
    const startDatetime = new Date(endDatetime);
    startDatetime.setHours(endDatetime.getHours() - 1); // Set startDatetime to one hour before endDatetime

    datetimePicker.setDate(startDatetime);
    endDatetimePicker.setDate(endDatetime);
  }

  // Set the datetime values on button click
  const buttonDateTime = document.getElementById("buttonDateTime");
  buttonDateTime.addEventListener("click", setDateTime);
});
function setCurrentShift() {
  const currentDate = new Date();
  const currentHour = currentDate.getHours();
  let startHour, endHour;

  if (currentHour >= 7 && currentHour < 15) {
    // First shift: 07:00 to 14:59
    startHour = 14;
    endHour = 21;
  } else if (currentHour >= 15 && currentHour < 23) {
    // Second shift: 15:00 to 22:59
    startHour = 22;
    endHour = 29;
  } else {
    // Third shift: 23:00 to 06:59 (next day)
    startHour = 30;
    endHour = 37;
    // If it's before 7:00 AM, set the date to the next day
    if (currentHour < 7) {
      currentDate.setDate(currentDate.getDate() + 1);
    }
  }

  // Set the start time
  const startDatetime = new Date(
    currentDate.getFullYear(),
    currentDate.getMonth(),
    currentDate.getDate(),
    startHour,
    0,
    0
  )
    .toISOString()
    .substring(0, 16)
    .replace("T", " ");

  // Set the end time
  const endDatetime = new Date(
    currentDate.getFullYear(),
    currentDate.getMonth(),
    currentDate.getDate(),
    endHour,
    59,
    0
  )
    .toISOString()
    .substring(0, 16)
    .replace("T", " ");

  document.getElementById("datetimepicker").value = startDatetime;
  document.getElementById("endDatetimePicker").value = endDatetime;
}
