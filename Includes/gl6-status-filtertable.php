<?php
if (isset($_POST['datetimepicker']) && isset($_POST['endDatetimePicker'])) {
    // Membuat objek DateTime hanya jika kunci ada
    $datetimepicker = new DateTime($_POST['datetimepicker']);
    $endDatetimePicker = new DateTime($_POST['endDatetimePicker']);

    // Format DateTime to format "Y-m-d H:i:s"
    $start = $datetimepicker->format('Y-m-d H:i:s');
    $end = $endDatetimePicker->format('Y-m-d H:i:s');
} else {

    echo "
    <h4 class='mt-2'>Instructions :</h4>
    <p><span class='dots'>●</span> Double click 'Current Hour' or 'Current Shift' or define 'Start Date - End Date'</p>
    <p><span class='dots'>●</span> Select 'Cell'</p>
    <p><span class='dots'>●</span> Click 'Search' button</p>
    <style>
        h4 {
            color: #394EEA;
            font-weight: bold;
        }
        .dots {
            color: #394EEA;
        }
        p {
            color: #002b5c;
            font-weight: bold;
        }
    </style>    
    ";
}

if (isset($_POST['status_ra100'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <div id="demo-output" style="margin-bottom: 1em;" class="chart-display"></div>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Date Time Start</th>
                <th>Date Time End</th>
                <th>Duration</th>
                <th>Status Code</th>
                <th>Status Text</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.StatusDataRA100 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'  order by DateTimeStart");
            while ($row = sqlsrv_fetch_array($query)) {
            ?>
                <tr>
                    <th class="text-primary"><?php echo $row['Cell'] ?></th>
                    <td><?php echo $row['DateTimeStart'] ?></td>
                    <td><?php echo $row['DateTimeEnd'] ?></td>
                    <td><?php echo $row['Duration'] ?></td>
                    <td><?php echo $row['StatusCode'] ?></td>
                    <td><?php echo $row['StatusText'] ?></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>

    <script>
        $('#example').DataTable({
            dom: 'Bfrtip',
            bAutoWidth: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 590,
            paging: false,
            buttons: [{
                extend: 'copy',
                text: 'Copy to clipboard'
            }]
        });
    </script>

<?php } ?>

<!-- RA101 -->
<?php
if (isset($_POST['status_ra101'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Date Time Start</th>
                <th>Date Time End</th>
                <th>Duration</th>
                <th>Status Code</th>
                <th>Status Text</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.StatusDataRA101 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'  order by DateTimeStart");
            while ($row = sqlsrv_fetch_array($query)) {
            ?>
                <tr>
                    <th class="text-primary"><?php echo $row['Cell'] ?></th>
                    <td><?php echo $row['DateTimeStart'] ?></td>
                    <td><?php echo $row['DateTimeEnd'] ?></td>
                    <td><?php echo $row['Duration'] ?></td>
                    <td><?php echo $row['StatusCode'] ?></td>
                    <td><?php echo $row['StatusText'] ?></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>

    <script>
        $('#example').DataTable({
            dom: 'Bfrtip',
            bAutoWidth: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 590,
            paging: false,
            buttons: [{
                extend: 'copy',
                text: 'Copy to clipboard'
            }]
        });
    </script>
<?php } ?>


<!-- RA102 -->
<?php
if (isset($_POST['status_ra102'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr>
                <th>Cell</th>
                <th>Date Time Start</th>
                <th>Date Time End</th>
                <th>Duration</th>
                <th>Status Code</th>
                <th>Status Text</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.StatusDataRA102 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'  order by DateTimeStart");
            while ($row = sqlsrv_fetch_array($query)) {
            ?>
                <tr>
                    <th class="text-primary"><?php echo $row['Cell'] ?></th>
                    <td><?php echo $row['DateTimeStart'] ?></td>
                    <td><?php echo $row['DateTimeEnd'] ?></td>
                    <td><?php echo $row['Duration'] ?></td>
                    <td><?php echo $row['StatusCode'] ?></td>
                    <td><?php echo $row['StatusText'] ?></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>

    <script>
        $('#example').DataTable({
            dom: 'Bfrtip',
            bAutoWidth: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 590,
            paging: false,
            buttons: [{
                extend: 'copy',
                text: 'Copy to clipboard'
            }]
        });
    </script>
<?php } ?>


<!-- RA103 -->
<?php
if (isset($_POST['status_ra103'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Date Time Start</th>
                <th>Date Time End</th>
                <th>Duration</th>
                <th>Status Code</th>
                <th>Status Text</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.StatusDataRA103 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'  order by DateTimeStart");
            while ($row = sqlsrv_fetch_array($query)) {
            ?>
                <tr>
                    <th class="text-primary"><?php echo $row['Cell'] ?></th>
                    <td><?php echo $row['DateTimeStart'] ?></td>
                    <td><?php echo $row['DateTimeEnd'] ?></td>
                    <td><?php echo $row['Duration'] ?></td>
                    <td><?php echo $row['StatusCode'] ?></td>
                    <td><?php echo $row['StatusText'] ?></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>

    <script>
        $('#example').DataTable({
            dom: 'Bfrtip',
            bAutoWidth: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 590,
            paging: false,
            buttons: [{
                extend: 'copy',
                text: 'Copy to clipboard'
            }]
        });
    </script>
<?php } ?>


<!-- RA104 -->
<?php
if (isset($_POST['status_ra104'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Date Time Start</th>
                <th>Date Time End</th>
                <th>Duration</th>
                <th>Status Code</th>
                <th>Status Text</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.StatusDataRA104 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'  order by DateTimeStart");
            while ($row = sqlsrv_fetch_array($query)) {
            ?>
                <tr>
                    <th class="text-primary"><?php echo $row['Cell'] ?></th>
                    <td><?php echo $row['DateTimeStart'] ?></td>
                    <td><?php echo $row['DateTimeEnd'] ?></td>
                    <td><?php echo $row['Duration'] ?></td>
                    <td><?php echo $row['StatusCode'] ?></td>
                    <td><?php echo $row['StatusText'] ?></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>

    <script>
        $('#example').DataTable({
            dom: 'Bfrtip',
            bAutoWidth: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 590,
            paging: false,
            buttons: [{
                extend: 'copy',
                text: 'Copy to clipboard'
            }]
        });
    </script>
<?php } ?>


<!-- RA105 -->
<?php
if (isset($_POST['status_ra105'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Date Time Start</th>
                <th>Date Time End</th>
                <th>Duration</th>
                <th>Status Code</th>
                <th>Status Text</th>
            </tr>
        </thead>
        <tbody>
            <!-- ==== Write PHP Code here === -->
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.StatusDataRA105 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'  order by DateTimeStart");
            while ($row = sqlsrv_fetch_array($query)) {
            ?>
                <tr>
                    <th class="text-primary"><?php echo $row['Cell'] ?></th>
                    <td><?php echo $row['DateTimeStart'] ?></td>
                    <td><?php echo $row['DateTimeEnd'] ?></td>
                    <td><?php echo $row['Duration'] ?></td>
                    <td><?php echo $row['StatusCode'] ?></td>
                    <td><?php echo $row['StatusText'] ?></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>

    <script>
        $('#example').DataTable({
            dom: 'Bfrtip',
            // bAutoWidth: false,
            // scrollCollapse: true,
            scrollX: true,
            scrollY: 590,
            paging: false,
            buttons: [{
                extend: 'copy',
                text: 'Copy to clipboard'
            }]
        });
    </script>
<?php } ?>


<!-- RA106 -->
<?php
if (isset($_POST['status_ra106'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Date Time Start</th>
                <th>Date Time End</th>
                <th>Duration</th>
                <th>Status Code</th>
                <th>Status Text</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.StatusDataRA106 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'  order by DateTimeStart");
            while ($row = sqlsrv_fetch_array($query)) {
            ?>
                <!-- <tr align="center" id="table"> -->
                <tr>
                    <th class="text-primary"><?php echo $row['Cell'] ?></th>
                    <td><?php echo $row['DateTimeStart'] ?></td>
                    <td><?php echo $row['DateTimeEnd'] ?></td>
                    <td><?php echo $row['Duration'] ?></td>
                    <td><?php echo $row['StatusCode'] ?></td>
                    <td><?php echo $row['StatusText'] ?></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>

    <script>
        $('#example').DataTable({
            dom: 'Bfrtip',
            bAutoWidth: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 590,
            paging: false,
            buttons: [{
                extend: 'copy',
                text: 'Copy to clipboard'
            }]
        });
    </script>
<?php } ?>


<!-- RA108 -->
<?php
if (isset($_POST['status_ra108'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Date Time Start</th>
                <th>Date Time End</th>
                <th>Duration</th>
                <th>Status Code</th>
                <th>Status Text</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.StatusDataRA108 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'  order by DateTimeStart");
            while ($row = sqlsrv_fetch_array($query)) {
            ?>
                <tr>
                    <th class="text-primary"><?php echo $row['Cell'] ?></th>
                    <td><?php echo $row['DateTimeStart'] ?></td>
                    <td><?php echo $row['DateTimeEnd'] ?></td>
                    <td><?php echo $row['Duration'] ?></td>
                    <td><?php echo $row['StatusCode'] ?></td>
                    <td><?php echo $row['StatusText'] ?></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>

    <script>
        $('#example').DataTable({
            dom: 'Bfrtip',
            bAutoWidth: false,
            scrollCollapse: false,
            scrollX: true,
            scrollY: 590,
            paging: false,
            buttons: [{
                extend: 'copy',
                text: 'Copy to clipboard'
            }]
        });
    </script>
<?php } ?>


<!-- ===== Show Status Data Overall Not Finished ===== -->
<?php
if (isset($_POST['status_gl6'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Date Time Start</th>
                <th>Date Time End</th>
                <th>Duration</th>
                <th>Status Code</th>
                <th>Status Text</th>
            </tr>
        </thead>
        <?php
        ?>
        <tbody>
            <?php
            // Change Database to DB GL6 Status Data
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.StatusDataGL6 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'  order by DateTimeStart");
            while ($row = sqlsrv_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $row['DateTimeStart'] ?></td>
                    <td><?php echo $row['DateTimeEnd'] ?></td>
                    <td><?php echo $row['Duration'] ?></td>
                    <td><?php echo $row['StatusCode'] ?></td>
                    <td><?php echo $row['StatusText'] ?></td>
                </tr>

            <?php
            } ?>
        </tbody>
    </table>

    <script>
        $('#example').DataTable({
            dom: 'Bfrtip',
            bAutoWidth: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 590,
            paging: false,
            buttons: [{
                extend: 'copy',
                text: 'Copy to clipboard'
            }]
        });
    </script>
<?php
}
?>