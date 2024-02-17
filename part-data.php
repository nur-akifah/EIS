<?php
include 'connection.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machine Part Data</title>
    <link href="./Images/aja.png" rel="icon" sizes="32x32">
    <link href="./css/ruang-admin.min.css" rel="stylesheet">
    <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <link href="./vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="./css/loader.css" rel="stylesheet" type="text/css">
    <link href="cobalagi.css" rel="stylesheet" type="text/css">
    <!-- DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <!-- DateTimePicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.6/flatpickr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.6/flatpickr.min.js"></script>
    <!-- Set DateTimePicker Current Hour-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.6/flatpickr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.6/flatpickr.min.js"></script>
    <!-- Set DateTimePicker Current Shift -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>



<body id=" page-top">
    <!-- Start Page Loading -->
    <!-- <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div> -->
    <!-- End Page Loading -->
    <div id="wrapper" class="">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center " href="index.php">
                <div class="sidebar-brand-icon ">
                    <img src="Images\PhilipsLogo.png">
                </div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="GL6_Landing.php">
                    <i class="fa-solid fa-industry"></i>
                    <span> Guard Line 6</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <!-- <div class="sidebar-heading">
                GL Database System
            </div> -->

            <li class="nav-item">
                <a class="nav-link" href="oee.php">
                    <i class="fa-solid fa-square-poll-vertical"></i>
                    <span>Machine OEE Data</span>
                </a>
            </li>

            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Machine OEE Data</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="GL6_filter_Table.php">Table View</a>
                    <a class="dropdown-item" href=" GL6_filter_Chart.php">Chart</a>
                </div>
            </li> -->

            <li class="nav-item">
                <a class="nav-link" href="GL6_for.php">
                    <i class="fa-regular fa-circle-xmark"></i>
                    <span>Machine FOR Data</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="status-data.php">
                    <i class="fa-solid fa-signal"></i>
                    <span>Machine Status Data</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="part-data.php">
                    <i class="fa-solid fa-circle-info"></i>
                    <span>Machine Part Data</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="batch.php">
                    <i class="fa-solid fa-folder-open"></i>
                    <span>Machine Batch Data</span>
                </a>
            </li>

            <hr class="sidebar-divider">

        </ul>

        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column ">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light  topbar mb-4 sticky-navbar " style="background-color: #002b5c;">
                    <h1 class="h3 mb-0  text-light">Equipment Information System 23.02
                        - MG Equipment Team </h1>
                    <!-- <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button> -->

                    <!-- <h1 class="h3 mb-0  text-light">
                        <div class="header_time" id="timeshow"> </div>
                    </h1> -->
                    <ul class="navbar-nav ml-auto">

                        <h1 class="h3 mb-0  text-light">
                            <div class="header_time" id="timeshow"> </div>
                        </h1>

                        <!-- <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="images/boy.png" style="max-width: 60px">
                                <span class="ml-3 d-none d-lg-inline text-white large">User</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li> -->
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid position-sticky" id="container-wrapper">

                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <!-- Simple Tables -->
                            <div class="card">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <br>
                                    <h5 class="m-0 font-weight-bold text-primary">Machine Part Data</h5><br>
                                </div>
                                <!-- FORM SORTING PART DATA USING DATE RANGE AND SELECT CELL -->
                                <form id="redirectForm" action="#" method="POST">
                                    <center>
                                        <div class="container">
                                            <div class="row justify-content-center ">
                                                <div class="col-sm-12 col-md-4 col-lg-2">
                                                    <button type="button" id="buttonDateTime" class="btn btn-secondary btn-block" data-toggle="button" onclick="setDateTime()">Current Hour</button>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-2">
                                                    <button type="button" id="buttonCurrentShift" class="btn btn-secondary btn-block mt-2 mt-md-0" data-toggle="button" onclick="setCurrentShift()">Current Shift</button>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-2 mt-2 mt-md-0">
                                                    <input name="datetimepicker" type="datetime-local" id="datetimepicker" class="form-control" placeholder="yyyy-mm-ddTHH:mm" aria-label="From" required>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-2 mt-2 mt-md-0">
                                                    <input name="endDatetimePicker" type="datetime-local" id="endDatetimePicker" class="form-control" placeholder="yyyy-mm-ddTHH:mm" aria-label="Till" required>
                                                </div>

                                                <div class="col-sm-12 col-md-4 col-lg-2 mt-2 mt-md-0">
                                                    <select class="form-control" id="cell" name="cell" onchange="updateButtonName()" required>
                                                        <option selected>Select Cell</option>
                                                        <option value="filter_ra100">RA100</option>
                                                        <option value="filter_ra101">RA101</option>
                                                        <option value="filter_ra102">RA102</option>
                                                        <option value="filter_ra103">RA103</option>
                                                        <option value="filter_ra104">RA104</option>
                                                        <option value="filter_ra105">RA105</option>
                                                        <option value="filter_ra106">RA106</option>
                                                        <option value="filter_ra108">RA108</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-12 col-md-4 col-lg-2 mt-2 mt-md-0">
                                                    <input type="submit" value="Search" id="submitButton" class="btn btn-primary btn-block mt-2 mt-md-0" name="">
                                                </div>
                                            </div>
                                        </div>
                                    </center>
                                </form>
                                <br>

                            </div>

                            <!-- === Table dan Chart === -->

                            <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="instruction-tab" data-toggle="tab" href="#instruction" role="tab" aria-controls="instruction" aria-selected="false">Instruction</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Table</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="instruction" role="tabpanel" aria-labelledby="instruction-tab">
                                    <h3>Instruction</h3>
                                    <p>To search data please click Current Hour or Current Shift or manual select DateTime, then select cell, and the last click "Search" Button.</p>
                                </div>
                                <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab"> -->
                            <?php include 'Includes/gl6-part-filtertable.php' ?>
                            <!-- </div>
                            </div> -->



                            <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Table</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                 
                                </div>
                            </div> -->
                        </div>

                        <!-- Modal Logout -->
                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabelLogout"></h5>

                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to logout?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                        <a href="routers/logout.php" class="btn btn-danger">Yes</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!---Container Fluid-->
                    </div>
                </div>
            </div>
            <!-- <footer class="sticky-footer" style="background-color: #002b5c;">
                <div class="container my-auto ">
                    <div class="copyright text-center my-auto text-white">
                        <span>Equipment Information System 23.02
                            - MG Equipment Team </span>
                    </div>
                </div>
            </footer> -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- STYLE CSS -->
    <style>
        .nav-item.active {
            background-color: #CCCCCC;
            /* Warna latar belakang ketika aktif */
        }
    </style>

    <script src="js/datatables.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>

    <script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>


    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap-select.min.css">

    <script src="vendor/bootstrap/js/bootstrap-select.min.js" type="text/javascript"></script>


    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>

    <!-- --------------------------------------------------------- -->
    <script type='text/javascript'>
        //================== JS for Timer ==================//
        var myVar = setInterval(myTimer, 400);
        var number = 1;
        var reload_counter = 1;
        var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var datetime = new Date();
        initial_hour = datetime.getHours();
        var data_output = ' ';

        if (initial_hour < 10) {
            initial_hour = '0' + initial_hour
        };

        function myTimer() {
            var d = new Date();
            var day = days[d.getDay()];
            var date = d.getDate();
            var month = months[d.getMonth()];
            hour = d.getHours();
            minute = d.getMinutes();
            seconds = d.getSeconds();

            if (day < 10) {
                day = '0' + day
            }
            if (hour < 10) {
                hour = '0' + hour
            }
            if (minute < 10) {
                minute = '0' + minute
            }
            if (seconds < 10) {
                seconds = '0' + seconds
            }

            var timeshow = hour + ':' + minute + ':' + seconds;
            dateshow = day + ', ' + date + ' ' + ' ' + month + ' '; //+ d.getFullYear();

            document.getElementById('timeshow').innerHTML = dateshow + ' ' + timeshow + ' ' + data_output;

            number++;
            reload_counter++;

            if (hour != initial_hour) {
                //location.reload();
            } else if (reload_counter > 100) {
                //location.reload();
            }

        }
    </script>

    <script type="text/javascript">
        /* This method will delete a row */
        function deleteRow(ele) {
            var table = document.getElementById('materials');
            var rowCount = table.rows.length;
            if (rowCount <= 1) {
                alert("There is no row available to delete!");
                return;
            }
            if (ele) {
                //delete specific row
                ele.parentNode.parentNode.remove();
            } else {
                //delete last row
                table.deleteRow(rowCount - 1);
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#line-dropdown').on('change', function() {
                var line_id = this.value;
                $.ajax({
                    url: "output-by-line.php",
                    type: "POST",
                    data: {
                        line_id: line_id
                    },
                    cache: false,
                    success: function(result) {
                        $("#output-dropdown").html(result);
                    }
                });
            });
        });
    </script>

    <!-- Direct to Selected Page -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var cellSelect = document.getElementById("cell");
            var button = document.getElementById("submitButton");

            // Function to update the button name
            function updateButtonName() {
                var selectedValue = cellSelect.value;
                // Update the button name or perform any other actions with the selected value
                // For example, updating the button name
                if (button) {
                    button.name = selectedValue;
                }
            }

            // Function to save the selected value to localStorage
            function saveSelectedValue() {
                var selectedValue = cellSelect.value;
                localStorage.setItem("selectedCellValue", selectedValue);
            }

            // Function to load the selected value from localStorage on page load
            function loadSelectedValue() {
                var selectedValue = localStorage.getItem("selectedCellValue");
                if (selectedValue) {
                    cellSelect.value = selectedValue;
                    updateButtonName();
                }
            }

            // Attach event listener to the select element
            cellSelect.addEventListener("change", function() {
                updateButtonName();
                saveSelectedValue();
            });

            // Load selected value on page load
            loadSelectedValue();
        });
    </script>

    <!-- Current Hour & Current Shift Auto Save When Page Close or Refresh -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const datetimePicker = document.getElementById("datetimepicker");
            const endDatetimePicker = document.getElementById("endDatetimePicker");

            // Retrieve and set datetime values from localStorage on page load
            const savedStartDatetime = localStorage.getItem("startDatetime");
            const savedEndDatetime = localStorage.getItem("endDatetime");

            if (savedStartDatetime && savedEndDatetime) {
                datetimePicker.value = savedStartDatetime;
                endDatetimePicker.value = savedEndDatetime;
            }

            // Add event listeners to datetime inputs for manual changes
            datetimePicker.addEventListener("change", () => {
                saveToLocalStorage();
            });

            endDatetimePicker.addEventListener("change", () => {
                saveToLocalStorage();
            });

            // Function to save datetime values to localStorage
            function saveToLocalStorage() {
                const startDatetimeValue = datetimePicker.value;
                const endDatetimeValue = endDatetimePicker.value;

                localStorage.setItem("startDatetime", startDatetimeValue);
                localStorage.setItem("endDatetime", endDatetimeValue);
            }
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            function setDateTime() {
                const datetimePicker = flatpickr('#datetimepicker', {
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                });
                const endDatetimePicker = flatpickr('#endDatetimePicker', {
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                });

                const endDatetime = new Date();
                const startDatetime = new Date(endDatetime);
                startDatetime.setHours(endDatetime.getHours() - 1);

                datetimePicker.setDate(startDatetime);
                endDatetimePicker.setDate(endDatetime);

                // Save selected datetime values to localStorage
                saveToLocalStorage();
            }

            function setCurrentShift() {
                const currentDate = new Date();
                const currentHour = currentDate.getHours();
                let startHour, endHour;

                if (currentHour >= 7 && currentHour < 15) {
                    startHour = 14;
                    endHour = 21;
                } else if (currentHour >= 15 && currentHour < 23) {
                    startHour = 22;
                    endHour = 29;
                } else {

                    // startHour = -18;
                    // endHour = -11;
                    startHour = 6;
                    endHour = 13;

                    // if (currentHour < 7) {
                    //     currentDate.setDate(currentDate.getDate() + 1);
                    // }
                }

                // Format the date for datetime-local input
                const formattedStartDatetime = formatDatetimeLocal(new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), startHour, 0, 0).toISOString().substring(0, 16).replace('T', ' '));
                const formattedEndDatetime = formatDatetimeLocal(new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), endHour, 59, 0).toISOString().substring(0, 16).replace('T', ' '));

                // Set values directly to datetime-local inputs
                document.getElementById("datetimepicker").value = formattedStartDatetime;
                document.getElementById("endDatetimePicker").value = formattedEndDatetime;

                // Save selected datetime values to localStorage
                saveToLocalStorage();
            }

            function formatDatetimeLocal(date) {
                // If the input is already a Date object, convert it to a string
                if (date instanceof Date) {
                    date = date.toISOString().slice(0, 16);
                }

                return date;
            }

            function saveToLocalStorage() {
                const startDatetimeValue = document.getElementById("datetimepicker").value;
                const endDatetimeValue = document.getElementById("endDatetimePicker").value;

                localStorage.setItem("startDatetime", startDatetimeValue);
                localStorage.setItem("endDatetime", endDatetimeValue);
            }

            // Retrieve and set datetime values from localStorage on page load
            const savedStartDatetime = localStorage.getItem("startDatetime");
            const savedEndDatetime = localStorage.getItem("endDatetime");

            if (savedStartDatetime && savedEndDatetime) {
                document.getElementById("datetimepicker").value = savedStartDatetime;
                document.getElementById("endDatetimePicker").value = savedEndDatetime;
            }

            // Set the datetime values on button click
            const buttonDateTime = document.getElementById("buttonDateTime");
            buttonDateTime.addEventListener("click", setDateTime);
            const buttonCurrentShift = document.getElementById("buttonCurrentShift");
            buttonCurrentShift.addEventListener("click", setCurrentShift);
        });
    </script>

    <script>
        // function updateButtonName() {
        //     // Dapatkan nilai yang dipilih dari dropdown
        //     var selectedValue = document.getElementById("cell").value;

        //     // Dapatkan tombol berdasarkan ID
        //     var button = document.getElementById("submitButton");

        //     // Ubah atribut name pada tombol berdasarkan nilai dropdown yang dipilih
        //     button.name = selectedValue;
        // }
    </script>

    <!-- Current Hour -->
    <script>
        // document.addEventListener('DOMContentLoaded', () => {
        //     const datetimePicker = flatpickr('#datetimepicker', {
        //         enableTime: true,
        //         dateFormat: "Y-m-d H:i",
        //     });
        //     const endDatetimePicker = flatpickr('#endDatetimePicker', {
        //         enableTime: true,
        //         dateFormat: "Y-m-d H:i",
        //     });

        //     function setDateTime() {
        //         const endDatetime = new Date();
        //         const startDatetime = new Date(endDatetime);
        //         startDatetime.setHours(endDatetime.getHours() - 1); // Set startDatetime to one hour before endDatetime

        //         datetimePicker.setDate(startDatetime);
        //         endDatetimePicker.setDate(endDatetime);
        //     }

        //     // Set the datetime values on button click
        //     const buttonDateTime = document.getElementById('buttonDateTime');
        //     buttonDateTime.addEventListener('click', setDateTime);
        // });
    </script>

    <!-- Current Shift -->
    <script>
        // function setCurrentShift() {
        //     const currentDate = new Date();
        //     const currentHour = currentDate.getHours();
        //     let startHour, endHour;

        //     if (currentHour >= 7 && currentHour < 15) {
        //         // First shift: 07:00 to 14:59
        //         startHour = 14;
        //         endHour = 21;
        //     } else if (currentHour >= 15 && currentHour < 23) {
        //         // Second shift: 15:00 to 22:59
        //         startHour = 22;
        //         endHour = 29;
        //     } else {
        //         // Third shift: 23:00 to 06:59 (next day)
        //         startHour = 30;
        //         endHour = 37;
        //         // If it's before 7:00 AM, set the date to the next day
        //         if (currentHour < 7) {
        //             currentDate.setDate(currentDate.getDate() + 1);
        //         }
        //     }

        //     // Set the start time
        //     const startDatetime = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), startHour, 0, 0).toISOString().substring(0, 16).replace('T', ' ');

        //     // Set the end time
        //     const endDatetime = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), endHour, 59, 0).toISOString().substring(0, 16).replace('T', ' ');

        //     document.getElementById('datetimepicker').value = startDatetime;
        //     document.getElementById('endDatetimePicker').value = endDatetime;
        // }
    </script>



</body>

</html>