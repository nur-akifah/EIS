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
?>
<!-- === SHOW DATA FROM RA100 === -->
<?php
if (isset($_POST['for_ra100'])) {
?>
    <!-- <span class="font-weight-bold"> Start : </span><?php echo $start; ?>
    <span class="font-weight-bold"> End : </span><?php echo $end; ?> -->
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display" style="width:100%">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Process Code</th>
                <th>Process Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA100 
            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' 
            AND ProcessCode <> '0' ORDER BY DateTimeOut ");
            while ($row = sqlsrv_fetch_array($query)) {
                echo "<tr>"
            ?>
                <th class="text-primary"><?php echo $row['Cell'] ?></th>
            <?php echo "
                <td>" . $row['DateTimeIn'] . "</td>
                <td>" . $row['DateTimeOut'] . "</td>
                <td>" . $row['ProcessCode'] . "</td>
                <td>" . $row['ProcessDescription'] . "</td>
                </tr>";
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

<!-- === SHOW DATA FROM RA101 === -->
<?php
if (isset($_POST['for_ra101'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display" style="width:100%">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 1 Number</th>
                <th>Carrier 1 Position</th>
                <th>Process Code</th>
                <th>Process Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA101 
            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' 
            AND ProcessCode <> '0' AND ProcessCode > '10000' ORDER BY DateTimeOut");
            while ($row = sqlsrv_fetch_array($stmt)) {
                echo "<tr>"
            ?>
                <th class="text-primary"><?php echo $row['Cell'] ?></th>
            <?php echo "
            <td>" . $row['DateTimeIn'] . "</td>
            <td>" . $row['DateTimeOut'] . "</td>
            <td>" . $row['Carrier1_No'] . "</td>
            <td>" . $row['Carrier1_Pos'] . "</td>
            <td>" . $row['ProcessCode'] . "</td>
            <td>" . $row['ProcessDescription'] . "</td>
            </tr>";
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

<!-- === SHOW DATA FROM RA102 === -->
<?php
if (isset($_POST['for_ra102'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display" style="width:100%">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 1 Number</th>
                <th>Carrier 1 Position</th>
                <th>Carrier 2 Number</th>
                <th>Carrier 2 Position</th>
                <th>Process Code</th>
                <th>Process Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA102 
            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' 
            AND ProcessCode <> '0' AND ProcessCode > '20000' ORDER BY DateTimeOut");
            while ($row = sqlsrv_fetch_array($query)) {
                echo "<tr>"
            ?>
                <th class="text-primary"><?php echo $row['Cell'] ?></th>
            <?php echo "
            <td>" . $row['DateTimeIn'] . "</td>
            <td>" . $row['DateTimeOut'] . "</td>
            <td>" . $row['Carrier1_No'] . "</td>
            <td>" . $row['Carrier1_Pos'] . "</td>
            <td>" . $row['Carrier2_No'] . "</td>
            <td>" . $row['Carrier2_Pos'] . "</td>
            <td>" . $row['ProcessCode'] . "</td>
            <td>" . $row['ProcessDescription'] . "</td>
            </tr>";
            }
            ?>
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

<!-- === SHOW DATA FROM RA103 === -->
<?php
if (isset($_POST['for_ra103'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display" style="width:100%">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 2 Number</th>
                <th>Carrier 2 Position</th>
                <th>Process Code</th>
                <th>Process Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA103 
            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' 
            AND ProcessCode <> '0' AND ProcessCode > '30000' ORDER BY DateTimeOut");
            while ($row = sqlsrv_fetch_array($query)) {
                echo "<tr>"
            ?>
                <th class="text-primary"><?php echo $row['Cell'] ?></th>
            <?php echo "
                <td>" . $row['DateTimeIn'] . "</td>
                <td>" . $row['DateTimeOut'] . "</td>
                <td>" . $row['Carrier2_No'] . "</td>
                <td>" . $row['Carrier2_Pos'] . "</td>
                <td>" . $row['ProcessCode'] . "</td>
                <td>" . $row['ProcessDescription'] . "</td>
                </tr>";
            }
            ?>
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

<!-- === SHOW DATA FROM RA104 === -->
<?php
if (isset($_POST['for_ra104'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display" style="width:100%">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 2 Number</th>
                <th>Carrier 2 Position</th>
                <th>Carrier 3 Number</th>
                <th>Carrier 3 Positionition</th>
                <th>Holder No</th>
                <th>Process Code</th>
                <th>Process Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA104 
            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' 
            AND ProcessCode <> '0' AND ProcessCode > '40000' ORDER BY DateTimeOut");
            while ($row = sqlsrv_fetch_array($query)) {
                echo "<tr>"
            ?>
                <th class="text-primary"><?php echo $row['Cell'] ?></th>
            <?php echo "
                <td>" . $row['DateTimeIn'] . "</td>
                <td>" . $row['DateTimeOut'] . "</td>
                <td>" . $row['Carrier2_No'] . "</td>
                <td>" . $row['Carrier2_Pos'] . "</td>
                <td>" . $row['Carrier3_No'] . "</td>
                <td>" . $row['Carrier3_Pos'] . "</td>
                <td>" . $row['Holder_No'] . "</td>
                <td>" . $row['ProcessCode'] . "</td>
                <td>" . $row['ProcessDescription'] . "</td>
                </tr>";
            }
            ?>
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

<!-- === SHOW DATA FROM RA105 === -->
<?php
if (isset($_POST['for_ra105'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display " style="width:100%">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 3 Number</th>
                <th>Carrier 3 Position</th>
                <th>Process Code</th>
                <th>Process Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA105 
            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' 
            AND ProcessCode <> '0' AND ProcessCode > '50000' ORDER BY DateTimeOut");
            while ($row = sqlsrv_fetch_array($query)) {
                echo "<tr>"
            ?>
                <th class="text-primary"><?php echo $row['Cell'] ?></th>
            <?php echo "
                    <td>" . $row['DateTimeIn'] . "</td>
                    <td>" . $row['DateTimeOut'] . "</td>
                    <td>" . $row['Carrier3_No'] . "</td>
                    <td>" . $row['Carrier3_Pos'] . "</td>
                    <td>" . $row['ProcessCode'] . "</td>
                    <td>" . $row['ProcessDescription'] . "</td>                             
            </tr>";
            }
            ?>
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

<!-- === SHOW DATA FROM RA106 === -->
<?php
if (isset($_POST['for_ra106'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display" style="width:100%">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 3 Number</th>
                <th>Carrier 3 Position</th>
                <th>Process Code</th>
                <th>Process Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA106 
            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' 
            AND ProcessCode <> '0' AND ProcessCode > '60000' ORDER BY DateTimeOut");
            while ($row = sqlsrv_fetch_array($query)) {
                echo "<tr>"
            ?>
                <th class="text-primary"><?php echo $row['Cell'] ?></th>
            <?php echo "
                <td>" . $row['DateTimeIn'] . "</td>
                <td>" . $row['DateTimeOut'] . "</td>
                <td>" . $row['Carrier3_No'] . "</td>
                <td>" . $row['Carrier3_Pos'] . "</td>
                <td>" . $row['ProcessCode'] . "</td>
                <td>" . $row['ProcessDescription'] . "</td>
                </tr>";
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

<!-- === SHOW DATA FROM RA108 === -->
<?php
if (isset($_POST['for_ra108'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display" style="width:100%">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 3 Number</th>
                <th>Carrier 3 Position</th>
                <th>Nest Number</th>
                <th>Nest Position</th>
                <th>Process Code</th>
                <th>Process Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA108 
            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' 
            AND ProcessCode <> '0' AND ProcessCode > '80000' ORDER BY DateTimeOut");
            while ($row = sqlsrv_fetch_array($query)) {
                echo "<tr>"
            ?>
                <th class="text-primary"><?php echo $row['Cell'] ?></th>
            <?php echo "
                <td>" . $row['DateTimeIn'] . "</td>
                <td>" . $row['DateTimeOut'] . "</td>
                <td>" . $row['Carrier3_No'] . "</td>
                <td>" . $row['Carrier3_Pos'] . "</td>
                <td>" . $row['Nest_No'] . "</td>
                <td>" . $row['Nest_Pos'] . "</td>
                <td>" . $row['ProcessCode'] . "</td>
                <td>" . $row['ProcessDescription'] . "</td>
                </tr>";
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