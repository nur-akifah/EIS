<?php
if (isset($_POST['datetimepicker']) && isset($_POST['endDatetimePicker'])) {

    $datetimepicker = new DateTime($_POST['datetimepicker']);
    $endDatetimePicker = new DateTime($_POST['endDatetimePicker']);

    // Format DateTime to format "Y-m-d H:i:s"
    $start = $datetimepicker->format('Y-m-d H:i:s');
    $end = $endDatetimePicker->format('Y-m-d H:i:s');
} else {

    echo "";
}
// Line Output
if (isset($_POST['line_output'])) {
?>
    <!-- <span class="font-weight-bold"> Start : </span><?php echo $start; ?>
    <span class="font-weight-bold"> End : </span><?php echo $end; ?> -->
    <nav class="navbar navbar-light mb-1 mt-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Chart View
        </span>
    </nav>
    <script type="text/javascript">
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Line Performance",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 25
                },
                axisX: {
                    valueFormatString: "HH:mm:ss",
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true
                    }
                },
                axisY: {
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    includeZero: true,
                    crosshair: {
                        enabled: true
                    }
                },
                toolTip: {
                    shared: true,
                    labelFontFamily: "Nunito",
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    horizontalAlign: "left",
                    dockInsidePlotArea: true,
                    itemclick: toogleDataSeries,
                },
                data: [{
                        type: "line",
                        showInLegend: true,
                        name: "Total Good Hourly",
                        color: "#228C22", //forest green
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT GoodOutput, DateTime FROM dbo.OeeDataGL6
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $GoodOutput = $row['GoodOutput'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $GoodOutput ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Total Bad Hourly",
                        color: "red",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT BadOutput, DateTime FROM dbo.OeeDataGL6
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $BadOutput = $row['BadOutput'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $BadOutput ?>
                                },
                            <?php } ?>
                        ]
                    },
                ]
            });
            chart.render();

            function toogleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }
        }
    </script>
    <div id="chartContainer" style="height: 45vh; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<?php } ?>

<?php
// RA100
if (isset($_POST['oee_ra100'])) {
?>
    <!-- <span class="font-weight-bold"> Start : </span><?php echo $start; ?>
    <span class="font-weight-bold"> End : </span><?php echo $end; ?> -->
    <nav class="navbar navbar-light mb-1 mt-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Chart View
        </span>
    </nav>
    <script type="text/javascript">
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Line Performance",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 25
                },
                axisX: {
                    valueFormatString: "HH:mm:ss",
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true
                    }
                },
                axisY: {
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    includeZero: true,
                    crosshair: {
                        enabled: true
                    }
                },
                toolTip: {
                    shared: true,
                    labelFontFamily: "Nunito",
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    horizontalAlign: "left",
                    dockInsidePlotArea: true,
                    itemclick: toogleDataSeries,
                },
                data: [{
                        type: "line",
                        showInLegend: true,
                        name: "Availability",
                        color: "#0504AA", //royal blue
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Availability, DateTime FROM dbo.OeeDataRA100
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Availability = $row['Availability'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Availability ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Performance",
                        color: "#d22628",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Performance, DateTime FROM dbo.OeeDataRA100
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Performance = $row['Performance'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Performance ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Quality",
                        color: "#32CD32", //lime green
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Quality, DateTime FROM dbo.OeeDataRA100
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Quality = $row['Quality'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Quality ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "OEE",
                        // color: "#CFB53B", //gold
                        color: "#FFBF00",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT OEE, DateTime FROM dbo.OeeDataRA100
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $OEE = $row['OEE'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $OEE ?>
                                },
                            <?php } ?>
                        ]
                    },
                ]
            });
            chart.render();

            function toogleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }
        }
    </script>
    <div id="chartContainer" style="height: 45vh; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<?php } ?>

<!-- RA101 -->
<?php
if (isset($_POST['oee_ra101'])) {
?>
    <nav class="navbar navbar-light mb-1 mt-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Chart View
        </span>
    </nav>
    <script type="text/javascript">
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Line Performance",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 25
                },
                axisX: {
                    valueFormatString: "HH:mm:ss",
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true
                    }
                },
                axisY: {
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    includeZero: true,
                    crosshair: {
                        enabled: true
                    }
                },
                toolTip: {
                    shared: true,
                    labelFontFamily: "Nunito",
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    horizontalAlign: "left",
                    dockInsidePlotArea: true,
                    itemclick: toogleDataSeries,
                },
                data: [{
                        type: "line",
                        showInLegend: true,
                        name: "Availability",
                        // markerType: "square",
                        color: "#0504AA", //royal blue
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Availability, DateTime FROM dbo.OeeDataRA101
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Availability = $row['Availability'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Availability ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Performance",
                        // lineDashType: "dash",
                        color: "#d22628",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Performance, DateTime FROM dbo.OeeDataRA101
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Performance = $row['Performance'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Performance ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Quality",
                        color: "#32CD32", //lime green
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Quality, DateTime FROM dbo.OeeDataRA101
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Quality = $row['Quality'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Quality ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "OEE",
                        color: "#FFBF00",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT OEE, DateTime FROM dbo.OeeDataRA101
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $OEE = $row['OEE'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $OEE ?>
                                },
                            <?php } ?>
                        ]
                    },
                ]
            });
            chart.render();

            function toogleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }
        }
    </script>
    <div id="chartContainer" style="height: 45vh; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<?php } ?>

<!-- RA102 -->
<?php
if (isset($_POST['oee_ra102'])) {
?>
    <nav class="navbar navbar-light mb-1 mt-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Chart View
        </span>
    </nav>
    <script type="text/javascript">
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Line Performance",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 25
                },
                axisX: {
                    valueFormatString: "HH:mm:ss",
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true
                    }
                },
                axisY: {
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    includeZero: true,
                    crosshair: {
                        enabled: true
                    }
                },
                toolTip: {
                    shared: true,
                    labelFontFamily: "Nunito",
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    horizontalAlign: "left",
                    dockInsidePlotArea: true,
                    itemclick: toogleDataSeries,
                },
                data: [{
                        type: "line",
                        showInLegend: true,
                        name: "Availability",
                        // markerType: "square",
                        color: "#0504AA", //royal blue
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Availability, DateTime FROM dbo.OeeDataRA102
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Availability = $row['Availability'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Availability ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Performance",
                        color: "#d22628",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Performance, DateTime FROM dbo.OeeDataRA102
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Performance = $row['Performance'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Performance ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Quality",
                        color: "#32CD32", //lime green
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Quality, DateTime FROM dbo.OeeDataRA102
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Quality = $row['Quality'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Quality ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "OEE",
                        color: "#FFBF00",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT OEE, DateTime FROM dbo.OeeDataRA102
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $OEE = $row['OEE'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $OEE ?>
                                },
                            <?php } ?>
                        ]
                    },
                ]
            });
            chart.render();

            function toogleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }
        }
    </script>
    <div id="chartContainer" style="height: 45vh; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<?php } ?>

<!-- RA103 -->
<?php
if (isset($_POST['oee_ra103'])) {
?>
    <nav class="navbar navbar-light mb-1 mt-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Chart View
        </span>
    </nav>
    <script type="text/javascript">
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Line Performance",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 25
                },
                axisX: {
                    valueFormatString: "HH:mm:ss",
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true
                    }
                },
                axisY: {
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    includeZero: true,
                    crosshair: {
                        enabled: true
                    }
                },
                toolTip: {
                    shared: true,
                    labelFontFamily: "Nunito",
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    horizontalAlign: "left",
                    dockInsidePlotArea: true,
                    itemclick: toogleDataSeries,
                },
                data: [{
                        type: "line",
                        showInLegend: true,
                        name: "Availability",
                        // markerType: "square",
                        color: "#0504AA", //royal blue
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Availability, DateTime FROM dbo.OeeDataRA103
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Availability = $row['Availability'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Availability ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Performance",
                        color: "#d22628",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Performance, DateTime FROM dbo.OeeDataRA103
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Performance = $row['Performance'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Performance ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Quality",
                        color: "#32CD32", //lime green
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Quality, DateTime FROM dbo.OeeDataRA103
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Quality = $row['Quality'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Quality ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "OEE",
                        color: "#FFBF00",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT OEE, DateTime FROM dbo.OeeDataRA103
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $OEE = $row['OEE'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $OEE ?>
                                },
                            <?php } ?>
                        ]
                    },
                ]
            });
            chart.render();

            function toogleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }
        }
    </script>
    <div id="chartContainer" style="height: 45vh; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<?php } ?>

<!-- RA104 -->
<?php
if (isset($_POST['oee_ra104'])) {
?>
    <nav class="navbar navbar-light mb-1 mt-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Chart View
        </span>
    </nav>
    <script type="text/javascript">
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Line Performance",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 25
                },
                axisX: {
                    valueFormatString: "HH:mm:ss",
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true
                    }
                },
                axisY: {
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    includeZero: true,
                    crosshair: {
                        enabled: true
                    }
                },
                toolTip: {
                    shared: true,
                    labelFontFamily: "Nunito",
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    horizontalAlign: "left",
                    dockInsidePlotArea: true,
                    itemclick: toogleDataSeries,
                },
                data: [{
                        type: "line",
                        showInLegend: true,
                        name: "Availability",
                        // markerType: "square",
                        color: "#0504AA", //royal blue
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Availability, DateTime FROM dbo.OeeDataRA104
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Availability = $row['Availability'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Availability ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Performance",
                        color: "#d22628",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Performance, DateTime FROM dbo.OeeDataRA104
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Performance = $row['Performance'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Performance ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Quality",
                        color: "#32CD32", //lime green
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Quality, DateTime FROM dbo.OeeDataRA104
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Quality = $row['Quality'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Quality ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "OEE",
                        color: "#FFBF00",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT OEE, DateTime FROM dbo.OeeDataRA104
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $OEE = $row['OEE'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $OEE ?>
                                },
                            <?php } ?>
                        ]
                    },
                ]
            });
            chart.render();

            function toogleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }
        }
    </script>
    <div id="chartContainer" style="height: 45vh; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<?php } ?>

<!-- RA105 -->
<?php
if (isset($_POST['oee_ra105'])) {
?>
    <nav class="navbar navbar-light mb-1 mt-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Chart View
        </span>
    </nav>
    <script type="text/javascript">
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Line Performance",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 25
                },
                axisX: {
                    valueFormatString: "HH:mm:ss",
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true
                    }
                },
                axisY: {
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    includeZero: true,
                    crosshair: {
                        enabled: true
                    }
                },
                toolTip: {
                    shared: true,
                    labelFontFamily: "Nunito",
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    horizontalAlign: "left",
                    dockInsidePlotArea: true,
                    itemclick: toogleDataSeries,
                },
                data: [{
                        type: "line",
                        showInLegend: true,
                        name: "Availability",
                        // markerType: "square",
                        color: "#0504AA", //royal blue
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Availability, DateTime FROM dbo.OeeDataRA105
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Availability = $row['Availability'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Availability ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Performance",
                        color: "#d22628",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Performance, DateTime FROM dbo.OeeDataRA105
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Performance = $row['Performance'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Performance ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Quality",
                        color: "#32CD32", //lime green
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Quality, DateTime FROM dbo.OeeDataRA105
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Quality = $row['Quality'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Quality ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "OEE",
                        color: "#FFBF00",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT OEE, DateTime FROM dbo.OeeDataRA105
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $OEE = $row['OEE'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $OEE ?>
                                },
                            <?php } ?>
                        ]
                    },
                ]
            });
            chart.render();

            function toogleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }
        }
    </script>
    <div id="chartContainer" style="height: 45vh; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<?php } ?>

<!-- RA106 -->
<?php
if (isset($_POST['oee_ra106'])) {
?>
    <nav class="navbar navbar-light mb-1 mt-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Chart View
        </span>
    </nav>
    <script type="text/javascript">
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Line Performance",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 25
                },
                axisX: {
                    valueFormatString: "HH:mm:ss",
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true
                    }
                },
                axisY: {
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    includeZero: true,
                    crosshair: {
                        enabled: true
                    }
                },
                toolTip: {
                    shared: true,
                    labelFontFamily: "Nunito",
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    horizontalAlign: "left",
                    dockInsidePlotArea: true,
                    itemclick: toogleDataSeries,
                },
                data: [{
                        type: "line",
                        showInLegend: true,
                        name: "Availability",
                        // markerType: "square",
                        color: "#0504AA", //royal blue
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Availability, DateTime FROM dbo.OeeDataRA106
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Availability = $row['Availability'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Availability ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Performance",
                        color: "#d22628",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Performance, DateTime FROM dbo.OeeDataRA106
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Performance = $row['Performance'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Performance ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Quality",
                        color: "#32CD32", //lime green
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Quality, DateTime FROM dbo.OeeDataRA106
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Quality = $row['Quality'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Quality ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "OEE",
                        color: "#FFBF00",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT OEE, DateTime FROM dbo.OeeDataRA106
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $OEE = $row['OEE'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $OEE ?>
                                },
                            <?php } ?>
                        ]
                    },
                ]
            });
            chart.render();

            function toogleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }
        }
    </script>
    <div id="chartContainer" style="height: 45vh; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<?php } ?>

<!-- RA108 -->
<?php
if (isset($_POST['oee_ra108'])) {
?>
    <nav class="navbar navbar-light mb-1 mt-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Chart View
        </span>
    </nav>
    <script type="text/javascript">
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Line Performance",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 25
                },
                axisX: {
                    valueFormatString: "HH:mm:ss",
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true
                    }
                },
                axisY: {
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    includeZero: true,
                    crosshair: {
                        enabled: true
                    }
                },
                toolTip: {
                    shared: true,
                    labelFontFamily: "Nunito",
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    horizontalAlign: "left",
                    dockInsidePlotArea: true,
                    itemclick: toogleDataSeries,
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    horizontalAlign: "left",
                    dockInsidePlotArea: true,
                    itemclick: toogleDataSeries
                },
                data: [{
                        type: "line",
                        showInLegend: true,
                        name: "Availability",
                        // markerType: "square",
                        color: "#0504AA", //royal blue
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Availability, DateTime FROM dbo.OeeDataRA108
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Availability = $row['Availability'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Availability ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Performance",
                        color: "#d22628",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Performance, DateTime FROM dbo.OeeDataRA108
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Performance = $row['Performance'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Performance ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Quality",
                        color: "#32CD32", //lime green
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Quality, DateTime FROM dbo.OeeDataRA108
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Quality = $row['Quality'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Quality ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "OEE",
                        color: "#FFBF00",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT OEE, DateTime FROM dbo.OeeDataRA108
                            WHERE DateTime >= '$start' AND DateTime <= '$end' AND PlanDT < '01:00:00' ORDER BY DateTime");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $OEE = $row['OEE'];
                                $DateTime = date('H:i:s', strtotime($row['DateTime'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $OEE ?>
                                },
                            <?php } ?>
                        ]
                    },
                ]
            });
            chart.render();

            function toogleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }
        }
    </script>
    <div id="chartContainer" style="height: 45vh; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<?php } ?>