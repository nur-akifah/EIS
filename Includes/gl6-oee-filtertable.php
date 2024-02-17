<?php
if (isset($_POST['datetimepicker']) && isset($_POST['endDatetimePicker'])) {

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
// Filter Line Output
if (isset($_POST['line_output'])) {
?>

    <!-- <span class="font-weight-bold"> Start : </span><?php echo $start; ?>
    <span class="font-weight-bold"> End : </span><?php echo $end; ?> -->
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Date Time </th>
                <th>Total Good Output</th>
                <th>Total Bad Output</th>
            </tr>
        </thead>
        <tbody>
            <!-- ==== Write PHP Code here === -->
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.OeeDataGL6 WHERE DateTime >= '$start' AND DateTime <= '$end'
            AND PlanDT < '01:00:00' ORDER BY DateTime ASC");
            while ($row = sqlsrv_fetch_array($query)) {
            ?>
                <tr>
                    <!-- <th class="text-primary"><?php echo $row['Cell'] ?></th> -->
                    <td><?php echo $row['DateTime'] ?></td>
                    <td><?php echo $row['GoodOutput'] ?></td>
                    <td><?php echo $row['BadOutput'] ?></td>
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
            scrollY: 350,
            paging: false,
            buttons: [{
                extend: 'copy',
                text: 'Copy to clipboard'
            }]
        });
    </script>
<?php } ?>

<!-- Filter OEE Data RA100 -->
<?php
if (isset($_POST['oee_ra100'])) {
?>
    <!-- <span class="font-weight-bold"> Start : </span><?php echo $start; ?>
    <span class="font-weight-bold"> End : </span><?php echo $end; ?> -->
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
                <th>Plan DT</th>
                <th>Target Output</th>
                <th>Unplan DT</th>
                <th>Good Output</th>
                <th>Bad Output</th>
                <th>Availability</th>
                <th>Performance</th>
                <th>Quality</th>
                <th>OEE</th>
            </tr>
        </thead>
        <tbody>
            <!-- ==== Write PHP Code here === -->
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.OeeDataRA100 WHERE DateTime >= '$start' AND DateTime <= '$end'
            AND PlanDT < '01:00:00' ORDER BY DateTime ASC");
            while ($row = sqlsrv_fetch_array($query)) {
            ?>
                <tr>
                    <th class="text-primary"><?php echo $row['Cell'] ?></th>
                    <td><?php echo $row['DateTime'] ?></td>
                    <td><?php echo $row['PlanDT'] ?></td>
                    <td><?php echo $row['TargetOutput'] ?></td>
                    <td><?php echo $row['UnplanDT'] ?></td>
                    <td><?php echo $row['GoodOutput'] ?></td>
                    <td><?php echo $row['BadOutput'] ?></td>
                    <td><?php echo $row['Availability'] ?></td>
                    <td><?php echo $row['Performance'] ?></td>
                    <td><?php echo $row['Quality'] ?></td>
                    <td><?php echo $row['OEE'] ?></td>
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
            scrollY: 350,
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

<!-- Filter Machine OEE Data RA101 -->
<?php
if (isset($_POST['oee_ra101'])) {
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
                <th>Plan DT</th>
                <th>Target Output</th>
                <th>Unplan DT</th>
                <th>Good Output</th>
                <th>Bad Output</th>
                <th>Availability</th>
                <th>Performance</th>
                <th>Quality</th>
                <th>OEE</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.OeeDataRA101 WHERE DateTime >= '$start' AND DateTime <= '$end'
            AND PlanDT < '01:00:00' ORDER BY DateTime ASC ");
            while ($row = sqlsrv_fetch_array($query)) {
            ?>
                <tr>
                    <th class="text-primary"><?php echo $row['Cell'] ?></th>
                    <td><?php echo $row['DateTime'] ?></td>
                    <td><?php echo $row['PlanDT'] ?></td>
                    <td><?php echo $row['TargetOutput'] ?></td>
                    <td><?php echo $row['UnplanDT'] ?></td>
                    <td><?php echo $row['GoodOutput'] ?></td>
                    <td><?php echo $row['BadOutput'] ?></td>
                    <td><?php echo $row['Availability'] ?></td>
                    <td><?php echo $row['Performance'] ?></td>
                    <td><?php echo $row['Quality'] ?></td>
                    <td><?php echo $row['OEE'] ?></td>
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
            scrollY: 350,
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

<!-- Filter Machine OEE Data RA102 -->
<?php
if (isset($_POST['oee_ra102'])) {
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
                <th>Plan DT</th>
                <th>Target Output</th>
                <th>Unplan DT</th>
                <th>Good Output</th>
                <th>Bad Output</th>
                <th>Availability</th>
                <th>Performance</th>
                <th>Quality</th>
                <th>OEE</th>
            </tr>
        </thead>
        <?php
        ?>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.OeeDataRA102 WHERE DateTime >= '$start' AND DateTime <= '$end'
            AND PlanDT < '01:00:00' ORDER BY DateTime ASC ");
            while ($row = sqlsrv_fetch_array($query)) {
            ?>
                <tr>
                    <th class="text-primary"><?php echo $row['Cell'] ?></th>
                    <td><?php echo $row['DateTime'] ?></td>
                    <td><?php echo $row['PlanDT'] ?></td>
                    <td><?php echo $row['TargetOutput'] ?></td>
                    <td><?php echo $row['UnplanDT'] ?></td>
                    <td><?php echo $row['GoodOutput'] ?></td>
                    <td><?php echo $row['BadOutput'] ?></td>
                    <td><?php echo $row['Availability'] ?></td>
                    <td><?php echo $row['Performance'] ?></td>
                    <td><?php echo $row['Quality'] ?></td>
                    <td><?php echo $row['OEE'] ?></td>
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
            scrollY: 350,
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

<!-- Filter Machine OEE Data RA103 -->
<?php
if (isset($_POST['oee_ra103'])) {
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
                <th>Plan DT</th>
                <th>Target Output</th>
                <th>Unplan DT</th>
                <th>Good Output</th>
                <th>Bad Output</th>
                <th>Availability</th>
                <th>Performance</th>
                <th>Quality</th>
                <th>OEE</th>
            </tr>
        </thead>
        <tbody>
            <!-- ==== Write PHP Code here === -->
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.OeeDataRA103 WHERE DateTime >= '$start' AND DateTime <= '$end'
            AND PlanDT < '01:00:00' ORDER BY DateTime ASC ");
            while ($row = sqlsrv_fetch_array($query)) {
            ?>
                <tr>
                    <th class="text-primary"><?php echo $row['Cell'] ?></th>
                    <td><?php echo $row['DateTime'] ?></td>
                    <td><?php echo $row['PlanDT'] ?></td>
                    <td><?php echo $row['TargetOutput'] ?></td>
                    <td><?php echo $row['UnplanDT'] ?></td>
                    <td><?php echo $row['GoodOutput'] ?></td>
                    <td><?php echo $row['BadOutput'] ?></td>
                    <td><?php echo $row['Availability'] ?></td>
                    <td><?php echo $row['Performance'] ?></td>
                    <td><?php echo $row['Quality'] ?></td>
                    <td><?php echo $row['OEE'] ?></td>
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
            scrollY: 350,
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

<!-- Filter Machine OEE Data RA104 -->
<?php
if (isset($_POST['oee_ra104'])) {
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
                <th>Plan DT</th>
                <th>Target Output</th>
                <th>Unplan DT</th>
                <th>Good Output</th>
                <th>Bad Output</th>
                <th>Availability</th>
                <th>Performance</th>
                <th>Quality</th>
                <th>OEE</th>
            </tr>
        </thead>
        <?php
        ?>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.OeeDataRA104 WHERE DateTime >= '$start' AND DateTime <= '$end'
            AND PlanDT < '01:00:00' ORDER BY DateTime ASC");
            while ($row = sqlsrv_fetch_array($query)) {
            ?>
                <tr>
                    <th class="text-primary"><?php echo $row['Cell'] ?></th>
                    <td><?php echo $row['DateTime'] ?></td>
                    <td><?php echo $row['PlanDT'] ?></td>
                    <td><?php echo $row['TargetOutput'] ?></td>
                    <td><?php echo $row['UnplanDT'] ?></td>
                    <td><?php echo $row['GoodOutput'] ?></td>
                    <td><?php echo $row['BadOutput'] ?></td>
                    <td><?php echo $row['Availability'] ?></td>
                    <td><?php echo $row['Performance'] ?></td>
                    <td><?php echo $row['Quality'] ?></td>
                    <td><?php echo $row['OEE'] ?></td>
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
            scrollY: 340,
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

<!-- Filter Machine OEE Data RA105 -->
<?php
if (isset($_POST['oee_ra105'])) {
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
                <th>Plan DT</th>
                <th>Target Output</th>
                <th>Unplan DT</th>
                <th>Good Output</th>
                <th>Bad Output</th>
                <th>Availability</th>
                <th>Performance</th>
                <th>Quality</th>
                <th>OEE</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.OeeDataRA105 WHERE DateTime >= '$start' AND DateTime <= '$end'
            AND PlanDT < '01:00:00' ORDER BY DateTime ASC");
            while ($row = sqlsrv_fetch_array($query)) {
            ?>
                <tr>
                    <th class="text-primary"><?php echo $row['Cell'] ?></th>
                    <td><?php echo $row['DateTime'] ?></td>
                    <td><?php echo $row['PlanDT'] ?></td>
                    <td><?php echo $row['TargetOutput'] ?></td>
                    <td><?php echo $row['UnplanDT'] ?></td>
                    <td><?php echo $row['GoodOutput'] ?></td>
                    <td><?php echo $row['BadOutput'] ?></td>
                    <td><?php echo $row['Availability'] ?></td>
                    <td><?php echo $row['Performance'] ?></td>
                    <td><?php echo $row['Quality'] ?></td>
                    <td><?php echo $row['OEE'] ?></td>
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
            scrollY: 350,
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

<!-- Filter Machine OEE Data RA106 -->
<?php
if (isset($_POST['oee_ra106'])) {
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
                <th>Plan DT</th>
                <th>Target Output</th>
                <th>Unplan DT</th>
                <th>Good Output</th>
                <th>Bad Output</th>
                <th>Availability</th>
                <th>Performance</th>
                <th>Quality</th>
                <th>OEE</th>
            </tr>
        </thead>
        <?php
        ?>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.OeeDataRA106 WHERE DateTime >= '$start' AND DateTime <= '$end'
            AND PlanDT < '01:00:00' ORDER BY DateTime ASC");
            while ($row = sqlsrv_fetch_array($query)) {
            ?>
                <tr>
                    <th class="text-primary"><?php echo $row['Cell'] ?></th>
                    <td><?php echo $row['DateTime'] ?></td>
                    <td><?php echo $row['PlanDT'] ?></td>
                    <td><?php echo $row['TargetOutput'] ?></td>
                    <td><?php echo $row['UnplanDT'] ?></td>
                    <td><?php echo $row['GoodOutput'] ?></td>
                    <td><?php echo $row['BadOutput'] ?></td>
                    <td><?php echo $row['Availability'] ?></td>
                    <td><?php echo $row['Performance'] ?></td>
                    <td><?php echo $row['Quality'] ?></td>
                    <td><?php echo $row['OEE'] ?></td>
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
            scrollY: 350,
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


<!-- Filter Machine OEE Data RA108 -->
<?php
if (isset($_POST['oee_ra108'])) {
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
                <th>Plan DT</th>
                <th>Target Output</th>
                <th>Unplan DT</th>
                <th>Good Output</th>
                <th>Bad Output</th>
                <th>Availability</th>
                <th>Performance</th>
                <th>Quality</th>
                <th>OEE</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.OeeDataRA108 WHERE DateTime >= '$start' AND DateTime <= '$end'
            AND PlanDT < '01:00:00' ORDER BY DateTime ASC");
            while ($row = sqlsrv_fetch_array($query)) {
            ?>
                <tr>
                    <th class="text-primary"><?php echo $row['Cell'] ?></th>
                    <td><?php echo $row['DateTime'] ?></td>
                    <td><?php echo $row['PlanDT'] ?></td>
                    <td><?php echo $row['TargetOutput'] ?></td>
                    <td><?php echo $row['UnplanDT'] ?></td>
                    <td><?php echo $row['GoodOutput'] ?></td>
                    <td><?php echo $row['BadOutput'] ?></td>
                    <td><?php echo $row['Availability'] ?></td>
                    <td><?php echo $row['Performance'] ?></td>
                    <td><?php echo $row['Quality'] ?></td>
                    <td><?php echo $row['OEE'] ?></td>
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
            scrollY: 350,
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