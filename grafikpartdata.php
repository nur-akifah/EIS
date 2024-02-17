<?php include 'connection.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <!-- <script src="    https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script> -->
    <script src="    https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="    https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
</head>

<body>
    <div id="chartContainer" style="height: 45vh; width: 100%;" class="chart-display"></div>
    <!-- <div id="demo-output" style="margin-bottom: 1em;" class="chart-display"></div> -->
    <table id="example" class="display" style="width:100%">
        <thead class="text-light" style="background-color:#ECA927;">
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
            $query = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA108 WHERE DateTimeOut >= '2023-12-04 13:00:00' AND DateTimeOut <= '2023-12-04 13:30:00' ORDER BY DateTimeOut");
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
    <script>
        var table = $('#example').DataTable({
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
            dom: 'Bfrtip',
            bAutoWidth: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 500,
            paging: false,
        });

        var chart = new CanvasJS.Chart('chartContainer', {
            chart: {
                type: 'line',
                styledMode: true
            },
            title: {
                text: 'Measurement Silver X'
            },
            series: [{
                data: chartData(table)
            }]
        });

        table.on('draw', function() {
            chart.options.data = [{
                type: 'line',
                dataPoints: chartData(table)
            }];
            chart.render();
        });

        function chartData(table) {
            var counts = {};
            table
                .column(4, {
                    search: 'applied'
                })
                .data()
                .each(function(val) {
                    if (counts[val]) {
                        counts[val] += 1;
                    } else {
                        counts[val] = 1;
                    }
                });

            // And map it to the format highcharts uses
            return $.map(counts, function(val, key) {
                return {
                    name: key,
                    y: val
                };
            });
        }
    </script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>

</html>