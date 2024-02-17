<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machine Batch Data</title>
    <link href="./Images/aja.png" rel="icon" sizes="32x32">
    <link href="./css/ruang-admin.min.css" rel="stylesheet">
    <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <link href="./vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="./css/loader.css" rel="stylesheet" type="text/css">
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

</head>

<body id="page-top">
    <!-- Start Page Loading -->
    <!-- <div id="loader-wrapper">
        <div id="loader"></div>
    </div> -->
    <!-- End Page Loading -->
    <div id="wrapper" class="">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center " href="GL6_Landing.php">
                <div class="sidebar-brand-icon ">
                    <img src="Images\PhilipsLogo.png">
                </div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="GL6_Landing.php">
                    <i class="fa-solid fa-industry"></i>
                    <span>Guard Line 6</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="GL6_OEE_Data.php">
                    <i class="fa-solid fa-square-poll-vertical"></i>
                    <span>Machine OEE Data</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="GL6_FOR_Data.php">
                    <i class="fa-regular fa-circle-xmark"></i>
                    <span>Machine FOR Data</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="GL6_Status_Data.php">
                    <i class="fa-solid fa-signal"></i>
                    <span>Machine Status Data</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="GL6_Part_Data.php">
                    <i class="fa-solid fa-circle-info"></i>
                    <span>Machine Part Data</span>
                </a>
            </li>

            <li class="nav-item active active-hover">
                <a class="nav-link" href="GL6_Batch_Data.php">
                    <i class="fa-solid fa-folder-open"></i>
                    <span>Machine Batch Data</span>
                </a>
            </li>


            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-industry"></i>
                    <span>Guard Line 5</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-industry"></i>
                    <span>Guard Line 7</span>
                </a>
            </li>

            <hr class="sidebar-divider">

        </ul>

        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column ">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light  topbar mb-4 sticky-navbar " style="background-color: #002b5c;">
                    <h1 class="h3 mb-0  text-light">Equipment Information System
                        - MG Equipment Team </h1>
                    <ul class="navbar-nav ml-auto">

                        <h1 class="h3 mb-0  text-light">
                            <div class="header_time" id="timeshow"> </div>
                        </h1>

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
                                    <h5 class="m-0 font-weight-bold text-primary">Machine Batch Data</h5><br><br>
                                </div>
                                <br>
                                <div class="container">
                                    <form action="" method="POST">
                                        <div class="form-group row">
                                            <label for="material12nc" class="col-sm-2 col-form-label">Type Selection</label>
                                            <div class="col-sm-2">
                                                <select id="item" class="form-control" name="item" aria-label="Default select example" onchange="updateButtonName()">
                                                    <!-- <option selected="">Select Material</option> -->
                                                    <option value="" selected>Select Material</option>
                                                    <option value="batch_gr">Guard Reel</option>
                                                    <option value="batch_pc">Plastic</option>
                                                    <option value="batch_cr">Cutter Reel</option>
                                                    <option value="batch_id">Island</option>
                                                    <option value="batch_db">Driving Bridge</option>
                                                    <option value="batch_i1">Ink 1</option>
                                                    <option value="batch_i2">Ink 2</option>
                                                    <option value="batch_i3">Ink 3</option>
                                                    <option value="batch_i4">Ink 4</option>
                                                    <option value="batch_hr">Hardener</option>
                                                    <option value="batch_tr">Thinner</option>
                                                    <option value="batch_ol">Oil</option>
                                                    <!-- <option value="batch_sn">Stacking Number</option> -->
                                                    <option value="batch_dmc">DMC</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="material12nc" class="col-sm-2 col-form-label">Insert Code</label>
                                            <div class="col-sm-2">
                                                <input type="text" name="query" id="query" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="submit" id="submitButton" class="btn btn-primary mb-2">Search</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <br>
                                <!-- TABLE -->
                                <div class="table-responsive">
                                    <?php include 'Includes/gl6-batch-filtertable.php' ?>
                                </div>
                            </div>
                            <h6 class="mt-3">*From Date </h6>
                            <p>*Till Date </p>
                            <!-- === End of Card === -->
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
            <!-- footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- STYLE CSS -->
    <style>
        .nav-item.active.active-hover {
            background-color: #bedcff;
        }
    </style>

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

    <!-- Direct to Selected Page -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var cellSelect = document.getElementById("item");
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

</body>

</html>