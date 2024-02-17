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
    <p><span class='dots'>●</span> Double click 'Current Hour' or 'Current Shift' or define 'Start Date - End Date'
    <span class='limit'>
    < 24 hours </span>
    </p>
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
        .limit {
            color: red;
        }
    </style>
    ";
}

if (isset($_POST['filter_ra100'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table name="item" id="item" class="table align-items-center table-flush table-hover table-striped display" width="100%" cellspacing="0">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Timestamp</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Process Code</th>
                <th>Process Description</th>
                <th>Buffer Index</th>
                <th>Guard Counter</th>
                <th>Batch Reel</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA100 WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut ");
            while ($row = sqlsrv_fetch_array($query)) {
                echo "<tr>"
            ?>
                <th class="text-primary"><?php echo $row['Cell'] ?></th>
            <?php echo "<td>" . $row['TimeStamp'] . "</td>
                <td>" . $row['DateTimeIn'] . "</td>
                <td>" . $row['DateTimeOut'] . "</td>
                <td>" . $row['ProcessCode'] . "</td>
                <td>" . $row['ProcessDescription'] . "</td>
                <td>" . $row['BufferIndex'] . "</td>
                <td>" . $row['GuardCounter'] . "</td>
                <td>" . $row['Batch_Reel'] . "</td>
                </tr>";
            } ?>
        </tbody>
    </table>

    <script>
        $('#item').DataTable({
            dom: 'Bfrtip',
            paging: false,
            buttons: [
                'copy'
            ]
        });
    </script>
<?php
}
?>

<!-- === SHOW DATA FROM RA101 === -->
<?php
if (isset($_POST['filter_ra101'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table name="item" id="item" class="table align-items-center table-flush table-hover table-striped display" width="100%" cellspacing="0">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Timestamp</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 1 Number</th>
                <th>Carrier 1 Position</th>
                <th>DMC</th>
                <th>Process Code</th>
                <th>Process Description</th>
                <th>Buffer Index</th>
                <th>Guard Counter</th>
                <th>Batch Reel</th>
                <th>Batch Plastic</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Cell</th>
                <th>Timestamp</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 1 Number</th>
                <th>Carrier 1 Position</th>
                <th>DMC</th>
                <th>Process Code</th>
                <th>Process Description</th>
                <th>Buffer Index</th>
                <th>Guard Counter</th>
                <th>Batch Reel</th>
                <th>Batch Plastic</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            $stmt = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA101  WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
            while ($row = sqlsrv_fetch_array($stmt)) {
                echo "<tr>"
            ?>
                <th class="text-primary"><?php echo $row['Cell'] ?></th>
            <?php echo "<td>" . $row['TimeStamp'] . "</td>
            <td>" . $row['DateTimeIn'] . "</td>
            <td>" . $row['DateTimeOut'] . "</td>
            <td>" . $row['Carrier1_No'] . "</td>
            <td>" . $row['Carrier1_Pos'] . "</td>
            <td>" . $row['DMC'] . "</td>
            <td>" . $row['ProcessCode'] . "</td>
            <td>" . $row['ProcessDescription'] . "</td>
            <td>" . $row['BufferIndex'] . "</td>
            <td>" . $row['GuardCounter'] . "</td>
            <td>" . $row['Batch_Reel'] . "</td>
            <td>" . $row['Batch_Plastic'] . "</td>
            </tr>";
            } ?>
        </tbody>
    </table>

    <style>
        tfoot {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
            /* display: table-header-group; */
        }
    </style>
    <script>
        // Setup - add a text input to each footer cell
        $('#item tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });

        // DataTable
        var otable = $('#item').DataTable({
            dom: 'Bfrtip',
            bAutoWidth: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 500,
            paging: false,

            buttons: [{
                extend: 'copy',
                text: 'Copy to clipboard'
            }]
        });


        // Apply the search
        otable.columns().every(function() {

            var that = this;
            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    </script>
<?php
}
?>


<!-- === SHOW DATA FROM RA102 === -->
<?php
if (isset($_POST['filter_ra102'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table name="item" id="item" class="table align-items-center table-flush table-hover table-striped display" width="100%" cellspacing="0">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Timestamp</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 1 Number</th>
                <th>Carrier 1 Position</th>
                <th>Carrier 2 Number</th>
                <th>Carrier 2 Position</th>
                <th>DMC</th>
                <th>Process Code</th>
                <th>Process Description</th>
                <th>Buffer Index</th>
                <th>Buffer Type</th>
                <th>Vision Result</th>
                <th>Open Anchor</th>
                <th>Over Flow</th>
                <th>TotalMeanSlotWidth</th>
                <th>MeanSlotDistanceTop</th>
                <th>MeanSlotDistanceBottom</th>
                <th>TotalDeviationSlotWidth</th>
                <th>NumberBlockedTopSlot</th>
                <th>NumberBlockedBottomSlot</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Cell</th>
                <th>Timestamp</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 1 Number</th>
                <th>Carrier 1 Position</th>
                <th>Carrier 2 Number</th>
                <th>Carrier 2 Position</th>
                <th>DMC</th>
                <th>Process Code</th>
                <th>Process Description</th>
                <th>Buffer Index</th>
                <th>Buffer Type</th>
                <th>Vision Result</th>
                <th>Open Anchor</th>
                <th>Over Flow</th>
                <th>TotalMeanSlotWidth</th>
                <th>MeanSlotDistanceTop</th>
                <th>MeanSlotDistanceBottom</th>
                <th>TotalDeviationSlotWidth</th>
                <th>NumberBlockedTopSlot</th>
                <th>NumberBlockedBottomSlot</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA102  WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
            while ($row = sqlsrv_fetch_array($query)) {
                echo "<tr>"
            ?>
                <th class="text-primary"><?php echo $row['Cell'] ?></th>
            <?php echo "
            <td>" . $row['TimeStamp'] . "</td>
            <td>" . $row['DateTimeIn'] . "</td>
            <td>" . $row['DateTimeOut'] . "</td>
            <td>" . $row['Carrier1_No'] . "</td>
            <td>" . $row['Carrier1_Pos'] . "</td>
            <td>" . $row['Carrier2_No'] . "</td>
            <td>" . $row['Carrier2_Pos'] . "</td>
            <td>" . $row['DMC'] . "</td>
            <td>" . $row['ProcessCode'] . "</td>
            <td>" . $row['ProcessDescription'] . "</td>
            <td>" . $row['BufferIndex'] . "</td>
            <td>" . $row['BufferType'] . "</td>
            <td>" . $row['VisionResult'] . "</td>
            <td>" . $row['OpenAnchor'] . "</td>
            <td>" . $row['OverFlow'] . "</td>
            <td>" . $row['TotalMeanSlotWidth'] . "</td>
            <td>" . $row['MeanSlotDistanceTop'] . "</td>
            <td>" . $row['MeanSlotDistanceBottom'] . "</td>
            <td>" . $row['TotalDeviationSlotWidth'] . "</td>
            <td>" . $row['NumberBlockedTopSlot'] . "</td>
            <td>" . $row['NumberBlockedBottomSlot'] . "</td>
            </tr>";
            }
            ?>
        </tbody>
    </table>

    <style>
        tfoot {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
            /* display: table-header-group; */
        }
    </style>
    <script>
        // Setup - add a text input to each footer cell
        $('#item tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });

        // DataTable
        var otable = $('#item').DataTable({
            dom: 'Bfrtip',
            bAutoWidth: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 500,
            paging: false,
            columnDefs: [{
                targets: 1,
                className: 'noVis'
            }],
            buttons: [{
                    extend: 'copy',
                    text: 'Copy to clipboard',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ],
        });


        // Apply the search
        otable.columns().every(function() {

            var that = this;
            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    </script>
<?php
}
?>

<!-- === SHOW DATA FROM RA103 === -->

<?php
if (isset($_POST['filter_ra103'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table name="item" id="item" class="table align-items-center table-flush table-hover table-striped display" width="100%" cellspacing="0">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Timestamp</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 2 Number</th>
                <th>Carrier 2 Position</th>
                <th>DMC</th>
                <th>Process Code</th>
                <th>Process Description</th>
                <th>Buffer Index</th>
                <th>End Distance</th>
                <th>End Force</th>
                <th>Max Force</th>
                <th>Max Force Distance</th>
                <th>Batch Cutter</th>
                <th>Batch Island</th>
                <th>Batch DB</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Cell</th>
                <th>Timestamp</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 2 Number</th>
                <th>Carrier 2 Position</th>
                <th>DMC</th>
                <th>Process Code</th>
                <th>Process Description</th>
                <th>Buffer Index</th>
                <th>End Distance</th>
                <th>End Force</th>
                <th>Max Force</th>
                <th>Max Force Distance</th>
                <th>Batch Cutter</th>
                <th>Batch Island</th>
                <th>Batch DB</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA103 WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
            while ($row = sqlsrv_fetch_array($query)) {
                echo "<tr>"
            ?>
                <th class="text-primary"><?php echo $row['Cell'] ?></th>
            <?php echo "
                <td>" . $row['TimeStamp'] . "</td>
                <td>" . $row['DateTimeIn'] . "</td>
                <td>" . $row['DateTimeOut'] . "</td>
                <td>" . $row['Carrier2_No'] . "</td>
                <td>" . $row['Carrier2_Pos'] . "</td>
                <td>" . $row['DMC'] . "</td>
                <td>" . $row['ProcessCode'] . "</td>
                <td>" . $row['ProcessDescription'] . "</td>
                <td>" . $row['BufferIndex'] . "</td>
                <td>" . $row['EndDist'] . "</td>
                <td>" . $row['EndForce'] . "</td>
                <td>" . $row['MaxForce'] . "</td>
                <td>" . $row['MaxForceDist'] . "</td>
                <td>" . $row['Batch_Cutter'] . "</td>
                <td>" . $row['Batch_Island'] . "</td>
                <td>" . $row['Batch_DB'] . "</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

    <style>
        tfoot {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
            /* display: table-header-group; */
        }
    </style>
    <script>
        // Setup - add a text input to each footer cell
        $('#item tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });

        // DataTable
        var otable = $('#item').DataTable({
            dom: 'Bfrtip',
            bAutoWidth: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 500,
            paging: false,
            columnDefs: [{
                targets: 1,
                className: 'noVis'
            }],
            buttons: [{
                    extend: 'copy',
                    text: 'Copy to clipboard',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ],
        });

        // Apply the search
        otable.columns().every(function() {

            var that = this;
            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    </script>
<?php
}
?>


<!-- === SHOW DATA FROM RA104 === -->
<?php
if (isset($_POST['filter_ra104'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table name="item" id="item" class="table align-items-center table-flush table-hover table-striped display" width="100%" cellspacing="0">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Timestamp</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 2 Number</th>
                <th>Carrier 2 Position</th>
                <th>Carrier 3 Number</th>
                <th>Carrier 3 Position</th>
                <th>Holder Number</th>
                <th>DMC</th>
                <th>Process Code</th>
                <th>Process Description</th>
                <th>Buffer Index</th>
                <th>MVS1RL</th>
                <th>MVS1RR</th>
                <th>MVS1TL</th>
                <th>MVS1TR</th>
                <th>MVS3L</th>
                <th>MVS3R</th>
                <th>MVS71SL</th>
                <th>MVS71SR</th>
                <th>MVS71FL</th>
                <th>MVS71FR</th>
                <th>MVS3ECLUL</th>
                <th>MVS3ECLDL</th>
                <th>MVS3ECLUR</th>
                <th>MVS3ECLDR</th>
                <th>MVS3CUL</th>
                <th>MVS3CUR</th>
                <th>MVS3GUL</th>
                <th>MVS3GUR</th>
                <th>MVS6PTL</th>
                <th>MVS6PTR</th>
                <th>OUT</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Cell</th>
                <th>Timestamp</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 2 Number</th>
                <th>Carrier 2 Position</th>
                <th>Carrier 3 Number</th>
                <th>Carrier 3 Position</th>
                <th>Holder Number</th>
                <th>DMC</th>
                <th>Process Code</th>
                <th>Process Description</th>
                <th>Buffer Index</th>
                <th>MVS1RL</th>
                <th>MVS1RR</th>
                <th>MVS1TL</th>
                <th>MVS1TR</th>
                <th>MVS3L</th>
                <th>MVS3R</th>
                <th>MVS71SL</th>
                <th>MVS71SR</th>
                <th>MVS71FL</th>
                <th>MVS71FR</th>
                <th>MVS3ECLUL</th>
                <th>MVS3ECLDL</th>
                <th>MVS3ECLUR</th>
                <th>MVS3ECLDR</th>
                <th>MVS3CUL</th>
                <th>MVS3CUR</th>
                <th>MVS3GUL</th>
                <th>MVS3GUR</th>
                <th>MVS6PTL</th>
                <th>MVS6PTR</th>
                <th>OUT</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA104  WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
            while ($row = sqlsrv_fetch_array($query)) {
                echo "<tr>"
            ?>
                <th class="text-primary"><?php echo $row['Cell'] ?></th>
            <?php echo "
                <td>" . $row['TimeStamp'] . "</td>
                <td>" . $row['DateTimeIn'] . "</td>
                <td>" . $row['DateTimeOut'] . "</td>
                <td>" . $row['Carrier2_No'] . "</td>
                <td>" . $row['Carrier2_Pos'] . "</td>
                <td>" . $row['Carrier3_No'] . "</td>
                <td>" . $row['Carrier3_Pos'] . "</td>
                <td>" . $row['Holder_No'] . "</td>
                <td>" . $row['DMC'] . "</td>
                <td>" . $row['ProcessCode'] . "</td>
                <td>" . $row['ProcessDescription'] . "</td>
                <td>" . $row['BufferIndex'] . "</td>
                <td>" . $row['mvs1rl'] . "</td>
                <td>" . $row['mvs1rr'] . "</td>
                <td>" . $row['mvs1tl'] . "</td>
                <td>" . $row['mvs1tr'] . "</td>
                <td>" . $row['mvs3l'] . "</td>
                <td>" . $row['mvs3r'] . "</td>
                <td>" . $row['mvs71sl'] . "</td>
                <td>" . $row['mvs71sr'] . "</td>
                <td>" . $row['mvs71fl'] . "</td>
                <td>" . $row['mvs71fr'] . "</td>
                <td>" . $row['mvs3eclul'] . "</td>
                <td>" . $row['mvs3ecldl'] . "</td>
                <td>" . $row['mvs3eclur'] . "</td>
                <td>" . $row['mvs3ecldr'] . "</td>
                <td>" . $row['mvs3cul'] . "</td>
                <td>" . $row['mvs3cur'] . "</td>
                <td>" . $row['mvs3gul'] . "</td>
                <td>" . $row['mvs3gur'] . "</td>
                <td>" . $row['mvs6ptl'] . "</td>
                <td>" . $row['mvs6ptr'] . "</td>
                <td>" . $row['out'] . "</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

    <style>
        tfoot {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
            /* display: table-header-group; */
        }
    </style>
    <script>
        // Setup - add a text input to each footer cell
        $('#item tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });

        // DataTable
        var otable = $('#item').DataTable({
            dom: 'Bfrtip',
            bAutoWidth: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 500,
            paging: false,
            columnDefs: [{
                targets: 1,
                className: 'noVis'
            }],
            buttons: [{
                    extend: 'copy',
                    text: 'Copy to clipboard',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ],
        });

        // Apply the search
        otable.columns().every(function() {

            var that = this;
            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    </script>
<?php
}
?>


<!-- === SHOW DATA FROM RA105 === -->
<?php
if (isset($_POST['filter_ra105'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table name="item" id="item" class="table align-items-center table-flush table-hover table-striped display" width="100%" cellspacing="0">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Timestamp</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 3 Number</th>
                <th>Carrier 3 Position</th>
                <th>DMC</th>
                <th>Process Code</th>
                <th>Process Description</th>
                <th>Buffer Index</th>
                <th>Vision 1 Score</th>
                <th>Vision 2 Score</th>
                <th>Vision 3 Score</th>
                <th>Vision 4 Score</th>
                <th>Act Temp 1</th>
                <th>Act Temp 2</th>
                <th>Act Humidity</th>
                <th>Batch Ink 1</th>
                <th>Batch Ink 2</th>
                <th>Batch Hardener</th>
                <th>Batch Thinner</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Cell</th>
                <th>Timestamp</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 3 Number</th>
                <th>Carrier 3 Position</th>
                <th>DMC</th>
                <th>Process Code</th>
                <th>Process Description</th>
                <th>Buffer Index</th>
                <th>Vision 1 Score</th>
                <th>Vision 2 Score</th>
                <th>Vision 3 Score</th>
                <th>Vision 4 Score</th>
                <th>Act Temp 1</th>
                <th>Act Temp 2</th>
                <th>Act Humidity</th>
                <th>Batch Ink 1</th>
                <th>Batch Ink 2</th>
                <th>Batch Hardener</th>
                <th>Batch Thinner</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA105 WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
            while ($row = sqlsrv_fetch_array($query)) {
                echo "<tr>"
            ?>
                <th class="text-primary"><?php echo $row['Cell'] ?></th>
            <?php echo "
                    <td>" . $row['TimeStamp'] . "</td>
                    <td>" . $row['DateTimeIn'] . "</td>
                    <td>" . $row['DateTimeOut'] . "</td>
                    <td>" . $row['Carrier3_No'] . "</td>
                    <td>" . $row['Carrier3_Pos'] . "</td>
                    <td>" . $row['DMC'] . "</td>
                    <td>" . $row['ProcessCode'] . "</td>
                    <td>" . $row['ProcessDescription'] . "</td>
                    <td>" . $row['BufferIndex'] . "</td>
                    <td>" . $row['Vision1_Score'] . "</td>
                    <td>" . $row['Vision2_Score'] . "</td>
                    <td>" . $row['Vision3_Score'] . "</td>
                    <td>" . $row['Vision4_Score'] . "</td>
                    <td>" . $row['ActTemp1'] . "</td>
                    <td>" . $row['ActTemp2'] . "</td>
                    <td>" . $row['ActHumidity'] . "</td>
                    <td>" . $row['Batch_Ink1'] . "</td>
                    <td>" . $row['Batch_Ink2'] . "</td>
                    <td>" . $row['Batch_Hardener'] . "</td>
                    <td>" . $row['Batch_Thinner'] . "</td>                                    
            </tr>";
            }
            ?>
        </tbody>
    </table>

    <style>
        tfoot {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
            /* display: table-header-group; */
        }
    </style>
    <script>
        // Setup - add a text input to each footer cell
        $('#item tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });

        // DataTable
        var otable = $('#item').DataTable({
            dom: 'Bfrtip',
            bAutoWidth: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 500,
            paging: false,

            buttons: [{
                extend: 'copy',
                text: 'Copy to clipboard'
            }]
        });

        // Apply the search
        otable.columns().every(function() {

            var that = this;
            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    </script>
<?php } ?>


<!-- === SHOW DATA FROM RA106 === -->
<?php
if (isset($_POST['filter_ra106'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table name="item" id="item" class="table align-items-center table-flush table-hover table-striped display" width="100%" cellspacing="0">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Timestamp</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 3 Number</th>
                <th>Carrier 3 Position</th>
                <th>DMC</th>
                <th>Process Code</th>
                <th>Process Description</th>
                <th>Buffer Index</th>
                <th>Vision 5 Score</th>
                <th>Vision 6 Score</th>
                <th>Act Temp 1</th>
                <th>Act Temp 2</th>
                <th>Act Humidity</th>
                <th>Batch Ink 3</th>
                <th>Batch Ink 4</th>
                <th>Batch Thinner</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Cell</th>
                <th>Timestamp</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 3 Number</th>
                <th>Carrier 3 Position</th>
                <th>DMC</th>
                <th>Process Code</th>
                <th>Process Description</th>
                <th>Buffer Index</th>
                <th>Vision 5 Score</th>
                <th>Vision 6 Score</th>
                <th>Act Temp 1</th>
                <th>Act Temp 2</th>
                <th>Act Humidity</th>
                <th>Batch Ink 3</th>
                <th>Batch Ink 4</th>
                <th>Batch Thinner</th>
            </tr>
        </tfoot>
        <tbody>

            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA106 WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
            while ($row = sqlsrv_fetch_array($query)) {
                echo "<tr>"
            ?>
                <th class="text-primary"><?php echo $row['Cell'] ?></th>
            <?php echo "<td>" . $row['TimeStamp'] . "</td>
                <td>" . $row['DateTimeIn'] . "</td>
                <td>" . $row['DateTimeOut'] . "</td>
                <td>" . $row['Carrier3_No'] . "</td>
                <td>" . $row['Carrier3_Pos'] . "</td>
                <td>" . $row['DMC'] . "</td>
                <td>" . $row['ProcessCode'] . "</td>
                <td>" . $row['ProcessDescription'] . "</td>
                <td>" . $row['BufferIndex'] . "</td>
                <td>" . $row['Vision5_Score'] . "</td>
                <td>" . $row['Vision6_Score'] . "</td>
                <td>" . $row['ActTemp1'] . "</td>
                <td>" . $row['ActTemp2'] . "</td>
                <td>" . $row['ActHumidity'] . "</td>
                <td>" . $row['Batch_Ink3'] . "</td>
                <td>" . $row['Batch_Ink4'] . "</td>
                <td>" . $row['Batch_Thinner'] . "</td>
                </tr>";
            } ?>

        </tbody>
    </table>

    <style>
        tfoot {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
            /* display: table-header-group; */
        }
    </style>
    <script>
        // Setup - add a text input to each footer cell
        $('#item tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });

        // DataTable
        var otable = $('#item').DataTable({
            dom: 'Bfrtip',
            bAutoWidth: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 500,
            paging: false,

            buttons: [{
                extend: 'copy',
                text: 'Copy to clipboard'
            }]
        });

        // Apply the search
        otable.columns().every(function() {

            var that = this;
            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    </script>
<?php
}
?>


<!-- === SHOW DATA FROM RA108 === -->
<?php
if (isset($_POST['filter_ra108'])) {
?>
    <nav class="navbar navbar-light mb-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Table View
        </span>
    </nav>
    <table name="item" id="item" class="table align-items-center table-flush table-hover table-striped display" width="100%" cellspacing="0">
        <thead class="text-light" style="background-color:#2c2c2c;">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Timestamp</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 3 Number</th>
                <th>Carrier 3 Position</th>
                <th>Nest Number</th>
                <th>Nest Position</th>
                <th>Output Stack Code</th>
                <th>DMC</th>
                <th>Process Code</th>
                <th>Process Description</th>
                <th>Buffer Index</th>
                <th>Vision Result</th>
                <th>Measurement_SilverX</th>
                <th>Measurement_SilverY</th>
                <th>Measurement_SilverR</th>
                <th>Measurement_BlackX</th>
                <th>Measurement_BlackY</th>
                <th>Measurement_BlackR</th>
                <th>Measurement_Dist_Left</th>
                <th>Measurement_Dist_Right</th>
                <th>Measurement_Dist_X</th>
                <th>Measurement_Dist_Y</th>
                <th>Torque Without Load</th>
                <th>Torque WithLoad</th>
                <th>Batch Oil</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Cell</th>
                <th>Timestamp</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Carrier 3 Number</th>
                <th>Carrier 3 Position</th>
                <th>Nest Number</th>
                <th>Nest Position</th>
                <th>OutputStackCode</th>
                <th>DMC</th>
                <th>Process Code</th>
                <th>Process Description</th>
                <th>Buffer Index</th>
                <th>Vision Result</th>
                <th>Measurement_SilverX</th>
                <th>Measurement_SilverY</th>
                <th>Measurement_SilverR</th>
                <th>Measurement_BlackX</th>
                <th>Measurement_BlackY</th>
                <th>Measurement_BlackR</th>
                <th>Measurement_Dist_Left</th>
                <th>Measurement_Dist_Right</th>
                <th>Measurement_Dist_X</th>
                <th>Measurement_Dist_Y</th>
                <th>Torque WithoutLoad</th>
                <th>Torque WithLoad</th>
                <th>Batch Oil</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA108 WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
            while ($row = sqlsrv_fetch_array($query)) {
                echo "<tr>"
            ?>
                <th class="text-primary"><?php echo $row['Cell'] ?></th>
            <?php echo "
                <td>" . $row['TimeStamp'] . "</td>
                <td>" . $row['DateTimeIn'] . "</td>
                <td>" . $row['DateTimeOut'] . "</td>
                <td>" . $row['Carrier3_No'] . "</td>
                <td>" . $row['Carrier3_Pos'] . "</td>
                <td>" . $row['Nest_No'] . "</td>
                <td>" . $row['Nest_Pos'] . "</td>
                <td>" . $row['OutputStackCode'] . "</td>
                <td>" . $row['DMC'] . "</td>
                <td>" . $row['ProcessCode'] . "</td>
                <td>" . $row['ProcessDescription'] . "</td>
                <td>" . $row['BufferIndex'] . "</td>
                <td>" . $row['VisionResult'] . "</td>
                <td>" . $row['Measurement_SilverX'] . "</td>
                <td>" . $row['Measurement_SilverY'] . "</td>
                <td>" . $row['Measurement_SilverR'] . "</td>
                <td>" . $row['Measurement_BlackX'] . "</td>
                <td>" . $row['Measurement_BlackY'] . "</td>
                <td>" . $row['Measurement_BlackR'] . "</td>
                <td>" . $row['Measurement_Dist_Left'] . "</td>
                <td>" . $row['Measurement_Dist_Right'] . "</td>
                <td>" . $row['Measurement_Dist_X'] . "</td>
                <td>" . $row['Measurement_Dist_Y'] . "</td>
                <td>" . $row['Torque_WithoutLoad'] . "</td>
                <td>" . $row['Torque_WithLoad'] . "</td>
                <td>" . $row['Batch_Oil'] . "</td>
                </tr>";
            } ?>
        </tbody>

    </table>

    <style>
        tfoot {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }
    </style>
    <script>
        // Setup - add a text input to each footer cell
        $('#item tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });

        // DataTable
        var otable = $('#item').DataTable({
            dom: 'Bfrtip',
            bAutoWidth: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 500,
            paging: false,
            columnDefs: [{
                targets: 1,
                className: 'noVis'
            }],
            buttons: [{
                    extend: 'copy',
                    text: 'Copy to clipboard',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ],
        });

        // Apply the search
        otable.columns().every(function() {

            var that = this;
            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    </script>
<?php
}
?>