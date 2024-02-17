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
?>
<?php
if (isset($_POST['filter_ra102'])) {
?>
    <nav class="navbar navbar-light mb-1 mt-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Chart View
        </span>
    </nav>
    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Slot Width",
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
                    title: "(um)",
                    lineColor: "#674e41",
                    tickColor: "#674e41",
                    labelFontColor: "#674e41",
                    titleFontColor: "#674e41",
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    crosshair: {
                        enabled: true
                    },
                    // maximum: 20000,
                    // minimum: 13000,
                    // stripLines: [{
                    //         color: "black",
                    //         fontWeight: "bold",
                    //         value: 16500,
                    //     },
                    //     {
                    //         color: "#0504AA", //royal blue
                    //         fontWeight: "bold",
                    //         value: 20000,
                    //     },
                    //     {
                    //         color: "#0504AA", //royal blue
                    //         fontWeight: "bold",
                    //         value: 13000,
                    //     }
                    // ]
                },

                axisY2: {
                    title: "(um)",
                    lineColor: "#296d98",
                    tickColor: "#296d98",
                    labelFontColor: "#296d98",
                    titleFontColor: "#296d98",
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    crosshair: {
                        enabled: true
                    },
                    // maximum: 20000,
                    // minimum: 13000,
                    // stripLines: [{
                    //         color: "black",
                    //         fontWeight: "bold",
                    //         value: 16500,
                    //     },
                    //     {
                    //         color: "#0504AA", //royal blue
                    //         fontWeight: "bold",
                    //         value: 20000,
                    //     },
                    //     {
                    //         color: "#0504AA", //royal blue
                    //         fontWeight: "bold",
                    //         value: 13000,
                    //     }
                    // ]
                },
                toolTip: {
                    shared: true
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    dockInsidePlotArea: false,
                    itemclick: function(e) {
                        toggleDataSeries(e, chart);
                    },
                },
                data: [{
                        type: "line",
                        name: "TotalMeanSlotWidth",
                        color: "#bf9983",
                        showInLegend: true,
                        axisYIndex: 1,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT TotalMeanSlotWidth, DateTimeOut FROM dbo.PartDataRA102
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $TotalMeanSlotWidth = $row['TotalMeanSlotWidth'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $TotalMeanSlotWidth ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        name: "MeanSlotDistanceTop",
                        color: "#ddaa9e",
                        showInLegend: true,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT MeanSlotDistanceTop, DateTimeOut FROM dbo.PartDataRA102
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $MeanSlotDistanceTop = $row['MeanSlotDistanceTop'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $MeanSlotDistanceTop ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        name: "MeanSlotDistanceBottom",
                        color: "#9b736b",
                        showInLegend: true,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT MeanSlotDistanceBottom, DateTimeOut FROM dbo.PartDataRA102
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $MeanSlotDistanceBottom = $row['MeanSlotDistanceBottom'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $MeanSlotDistanceBottom ?>
                                },
                            <?php } ?>
                        ]
                    }
                ]
            });
            chart.render();

            function toggleDataSeries(e, chart) {
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
if (isset($_POST['filter_ra103'])) {
?>
    <nav class="navbar navbar-light mb-1 mt-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Chart View
        </span>
    </nav>
    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Slide In",
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
                    title: "Force (N)",
                    lineColor: "#ec5578",
                    tickColor: "#ec5578",
                    labelFontColor: "#ec5578",
                    titleFontColor: "#ec5578",
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    crosshair: {
                        enabled: true
                    }
                },

                axisY2: {
                    title: "Distance (mm)",
                    lineColor: "#296d98",
                    tickColor: "#296d98",
                    labelFontColor: "#296d98",
                    titleFontColor: "#296d98",
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    crosshair: {
                        enabled: true
                    }
                },
                toolTip: {
                    shared: true
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    dockInsidePlotArea: false,
                    itemclick: toogleDataSeries,
                },
                data: [{
                        type: "line",
                        showInLegend: true,
                        name: "EndDist",
                        color: "#86989e", //lime green
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT EndDist, DateTimeOut FROM dbo.PartDataRA103
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $EndDist = $row['EndDist'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $EndDist ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "EndForce",
                        color: "#fc4c4e",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT EndForce, DateTimeOut FROM dbo.PartDataRA103
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $EndForce = $row['EndForce'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $EndForce ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "MaxForce",
                        color: "#Fe7d6a",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT MaxForce, DateTimeOut FROM dbo.PartDataRA103
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $MaxForce = $row['MaxForce'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $MaxForce ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "MaxForceDist",
                        axisYType: "secondary",
                        color: "#003152",
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT MaxForceDist, DateTimeOut FROM dbo.PartDataRA103
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $EndForce = $row['MaxForceDist'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $EndForce ?>
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
if (isset($_POST['filter_ra104'])) {
?>
    <nav class="navbar navbar-light mb-1 mt-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Chart View
        </span>
    </nav>
    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Adjustment",
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
                    title: "ECL (um)",
                    lineColor: "#234f1e",
                    tickColor: "#234f1e",
                    labelFontColor: "#234f1e",
                    titleFontColor: "#234f1e",
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    crosshair: {
                        enabled: true
                    },
                },

                axisY2: {
                    title: "Protrusion (um)",
                    lineColor: "#520160",
                    tickColor: "#520160",
                    labelFontColor: "#520160",
                    titleFontColor: "#520160",
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    crosshair: {
                        enabled: true
                    },
                    maximum: 400,
                    minimum: 100,
                    stripLines: [{
                            color: "black",
                            fontWeight: "bold",
                            value: 250,
                        },
                        {
                            color: "#0504AA",
                            fontWeight: "bold",
                            value: 400,
                        },
                        {
                            color: "#0504AA",
                            fontWeight: "bold",
                            value: 100,
                        }
                    ]
                },
                toolTip: {
                    shared: true
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    dockInsidePlotArea: false,
                    itemclick: function(e) {
                        toggleDataSeries(e, chart);
                    },
                },
                data: [
                    // ECL
                    {
                        type: "line",
                        name: "ECL Top Right",
                        color: "#8b0000",
                        showInLegend: true,
                        axisYIndex: 1,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT mvs3eclur, DateTimeOut FROM dbo.PartDataRA104
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $mvs3eclur = $row['mvs3eclur'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $mvs3eclur ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        name: "ECL Top Left",
                        color: "#FFBF00",
                        axisYIndex: 0,
                        showInLegend: true,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT mvs3eclul, DateTimeOut FROM dbo.PartDataRA104
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $mvs3eclul = $row['mvs3eclul'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $mvs3eclul ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        name: "ECL Bottom Right",
                        color: "#25a35a",
                        showInLegend: true,
                        axisYIndex: 1,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT mvs3ecldr, DateTimeOut FROM dbo.PartDataRA104
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $mvs3ecldr = $row['mvs3ecldr'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $mvs3ecldr ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        name: "ECL Bottom Left",
                        color: "#d0312d",
                        axisYIndex: 0,
                        showInLegend: true,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT mvs3ecldl, DateTimeOut FROM dbo.PartDataRA104
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $mvs3ecldl = $row['mvs3ecldl'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $mvs3ecldl ?>
                                },
                            <?php } ?>
                        ]
                    },

                    // Protrusion
                    {
                        type: "line",
                        name: "Protrusion Right",
                        color: "#9e02b8",
                        axisYType: "secondary",
                        showInLegend: true,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT mvs6ptr, DateTimeOut FROM dbo.PartDataRA104
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $mvs6ptr = $row['mvs6ptr'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $mvs6ptr ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        name: "Protrusion Left",
                        color: "#f1aafd",
                        axisYType: "secondary",
                        showInLegend: true,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT mvs6ptl, DateTimeOut FROM dbo.PartDataRA104
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $mvs6ptl = $row['mvs6ptl'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $mvs6ptl ?>
                                },
                            <?php } ?>
                        ]
                    }
                ]
            });
            chart.render();

            function toggleDataSeries(e, chart) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }

            var chart1 = new CanvasJS.Chart("chartContainer1", {
                title: {
                    text: "Force",
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
                    title: "Force (mN)",
                    lineColor: "#d10000",
                    tickColor: "#d10000",
                    labelFontColor: "#d10000",
                    titleFontColor: "#d10000",
                    includeZero: true,

                    labelFontFamily: "Nunito",
                    crosshair: {
                        enabled: true
                    },
                    maximum: 24000,
                    minimum: -24000,
                    stripLines: [{
                            color: "black",
                            fontWeight: "bold",
                            value: 0,
                        },
                        {
                            color: "#0504AA",
                            fontWeight: "bold",
                            value: 24000,
                        },
                        {
                            color: "#0504AA",
                            fontWeight: "bold",
                            value: -24000,
                        }
                    ]
                },

                axisY2: {
                    title: "Distance (mm)",
                    lineColor: "#672d3f",
                    tickColor: "#672d3f",
                    labelFontColor: "#672d3f",
                    titleFontColor: "#672d3f",
                    includeZero: true,

                    labelFontFamily: "Nunito",
                    crosshair: {
                        enabled: true
                    },
                },
                toolTip: {
                    shared: true
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    dockInsidePlotArea: false,
                    itemclick: function(e) {
                        toggleDataSeries(e, chart1);
                    },
                },
                data: [
                    // Force Right & Force Left
                    {
                        type: "line",
                        name: "Force Right",
                        color: "#c21807",
                        showInLegend: true,
                        axisYIndex: 1,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT mvs71fr, DateTimeOut FROM dbo.PartDataRA104
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $mvs71fr = $row['mvs71fr'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $mvs71fr ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        name: "Force Left",
                        color: "#FFBF00",
                        axisYIndex: 0,
                        showInLegend: true,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT mvs71fl, DateTimeOut FROM dbo.PartDataRA104
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $mvs71fl = $row['mvs71fl'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $mvs71fl ?>
                                },
                            <?php } ?>
                        ]
                    },

                    // Silver R & Black R
                    {
                        type: "line",
                        name: "Distance Right",
                        color: "#e59196",
                        axisYType: "secondary",
                        showInLegend: true,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT mvs71sr, DateTimeOut FROM dbo.PartDataRA104
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $mvs71sr = $row['mvs71sr'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $mvs71sr ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        name: "Distance Left",
                        color: "#c36f89",
                        axisYType: "secondary",
                        showInLegend: true,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT mvs71sl, DateTimeOut FROM dbo.PartDataRA104
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $mvs71sl = $row['mvs71sl'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $mvs71sl ?>
                                },
                            <?php } ?>
                        ]
                    }
                ]
            });
            chart1.render();

            function toggleDataSeries(e, chart1) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart1.render();
            }

        }
    </script>
    <div id="display" style="display: flex;">
        <div style="flex: 1; ">
            <div id="chartContainer" style="height: 45vh; width: 100%;"></div>
        </div>
        <div style="flex: 1; ">
            <div id="chartContainer1" style="height: 45vh; width: 100%;"></div>
        </div>
    </div>

    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<?php } ?>

<!-- ===== RA108 ===== -->
<?php
if (isset($_POST['filter_ra108'])) {
?>
    <nav class="navbar navbar-light mb-1 mt-1 content-center" style="background-color: #002b5c;">
        <span class="navbar-brand mb-0 h1 content-center text-center text-light" style="text-align: center;">
            Chart View
        </span>
    </nav>
    <script type="text/javascript">
        window.onload = function() {
            // Torque
            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Torque",
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
                    title: "(mNm)",
                    lineColor: "#234f1e",
                    tickColor: "#234f1e",
                    labelFontColor: "#234f1e",
                    titleFontColor: "#234f1e",
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    crosshair: {
                        enabled: true
                    },
                    maximum: 0.35,
                    minimum: 0.02,
                    stripLines: [{
                            color: "black",
                            fontWeight: "bold",
                            value: 0.185,
                        },
                        {
                            color: "#0504AA",
                            fontWeight: "bold",
                            value: 0.35,
                        },
                        {
                            color: "#0504AA",
                            fontWeight: "bold",
                            value: 0.02,
                        }
                    ]
                },

                axisY2: {
                    title: "(mNm)",
                    lineColor: "#234f1e",
                    tickColor: "#234f1e",
                    labelFontColor: "#234f1e",
                    titleFontColor: "#234f1e",
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    crosshair: {
                        enabled: true
                    },
                    maximum: 0.35,
                    minimum: 0.02,
                    stripLines: [{
                            color: "black",
                            fontWeight: "bold",
                            value: 0.185,
                        },
                        {
                            color: "#0504AA",
                            fontWeight: "bold",
                            value: 0.35,
                        },
                        {
                            color: "#0504AA",
                            fontWeight: "bold",
                            value: 0.02,
                        }
                    ]
                },
                toolTip: {
                    shared: true
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    dockInsidePlotArea: false,
                    itemclick: function(e) {
                        toggleDataSeries(e, chart);
                    },
                },
                data: [{
                        type: "line",
                        name: "Torque With Load",
                        color: "#32CD32",
                        showInLegend: true,
                        axisYIndex: 1,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Torque_WithLoad, DateTimeOut FROM dbo.PartDataRA108 
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut ");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Torque_WithLoad = $row['Torque_WithLoad'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Torque_WithLoad ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        name: "Torque Without Load",
                        color: "#0b6623",
                        showInLegend: true,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Torque_WithoutLoad, DateTimeOut FROM dbo.PartDataRA108 
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut ");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Torque_WithoutLoad = $row['Torque_WithoutLoad'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Torque_WithoutLoad ?>
                                },
                            <?php } ?>
                        ]
                    }
                ]
            });
            chart.render();

            function toggleDataSeries(e, chart) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }

            // Silver Position
            var chart1 = new CanvasJS.Chart("chartContainer1", {
                title: {
                    text: "Print Position",
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
                    title: "Silver XY & Black XY (mm)",
                    lineColor: "#d10000",
                    tickColor: "#d10000",
                    labelFontColor: "#d10000",
                    titleFontColor: "#d10000",
                    includeZero: true,

                    labelFontFamily: "Nunito",
                    crosshair: {
                        enabled: true
                    },
                    maximum: 200,
                    minimum: -200,
                    stripLines: [{
                            color: "black",
                            fontWeight: "bold",
                            value: 0,
                        },
                        {
                            color: "#0504AA",
                            fontWeight: "bold",
                            value: 200,
                        },
                        {
                            color: "#0504AA",
                            fontWeight: "bold",
                            value: -200,
                        }
                    ]
                },

                axisY2: {
                    title: "Silver R & Black R (u˚)",
                    lineColor: "#672d3f",
                    tickColor: "#672d3f",
                    labelFontColor: "#672d3f",
                    titleFontColor: "#672d3f",
                    includeZero: true,

                    labelFontFamily: "Nunito",
                    crosshair: {
                        enabled: true
                    },
                    maximum: 500,
                    minimum: -500,
                    stripLines: [{
                            color: "black",
                            fontWeight: "bold",
                            value: 0,
                        },
                        {
                            color: "#0504AA",
                            fontWeight: "bold",
                            value: 500,
                        },
                        {
                            color: "#0504AA",
                            fontWeight: "bold",
                            value: -500,
                        }
                    ]
                },
                toolTip: {
                    shared: true
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    dockInsidePlotArea: false,
                    itemclick: function(e) {
                        toggleDataSeries(e, chart1);
                    },
                },
                data: [
                    // Silver XY & Black XY
                    {
                        type: "line",
                        name: "Silver X",
                        color: "#a66f5b",
                        showInLegend: true,
                        axisYIndex: 1,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Measurement_SilverX, DateTimeOut FROM dbo.PartDataRA108
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Performance = $row['Measurement_SilverX'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Performance ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        name: "Silver Y",
                        color: "#FFBF00",
                        axisYIndex: 0,
                        showInLegend: true,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Measurement_SilverY, DateTimeOut FROM dbo.PartDataRA108
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Performance = $row['Measurement_SilverY'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Performance ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        name: "Black X",
                        color: "#25a35a",
                        showInLegend: true,
                        axisYIndex: 1,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Measurement_BlackX, DateTimeOut FROM dbo.PartDataRA108
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Performance = $row['Measurement_BlackX'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Performance ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        name: "Black Y",
                        color: "#8b0000",
                        axisYIndex: 0,
                        showInLegend: true,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Measurement_BlackY, DateTimeOut FROM dbo.PartDataRA108
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Performance = $row['Measurement_BlackY'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Performance ?>
                                },
                            <?php } ?>
                        ]
                    },

                    // Silver R & Black R
                    {
                        type: "line",
                        name: "Silver R",
                        color: "#e59196",
                        axisYType: "secondary",
                        showInLegend: true,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Measurement_SilverR, DateTimeOut FROM dbo.PartDataRA108
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Performance = $row['Measurement_SilverR'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Performance ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        name: "Black R",
                        color: "#c36f89",
                        axisYType: "secondary",
                        showInLegend: true,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Measurement_BlackR, DateTimeOut FROM dbo.PartDataRA108
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Performance = $row['Measurement_BlackR'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Performance ?>
                                },
                            <?php } ?>
                        ]
                    }
                ]
            });
            chart1.render();

            function toggleDataSeries(e, chart1) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart1.render();
            }


            // Yellow Distance
            var chart3 = new CanvasJS.Chart("chartContainer3", {
                title: {
                    text: "Yellow Distance",
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
                    title: "(um)",
                    lineColor: "#ec5578",
                    tickColor: "#ec5578",
                    labelFontColor: "#ec5578",
                    titleFontColor: "#ec5578",
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    crosshair: {
                        enabled: true
                    },
                    maximum: 20000,
                    minimum: 13000,
                    stripLines: [{
                            color: "black",
                            fontWeight: "bold",
                            value: 16500,
                        },
                        {
                            color: "#0504AA",
                            fontWeight: "bold",
                            value: 20000,
                        },
                        {
                            color: "#0504AA",
                            fontWeight: "bold",
                            value: 13000,
                        }
                    ]
                },

                axisY2: {
                    title: "(um)",
                    lineColor: "#296d98",
                    tickColor: "#296d98",
                    labelFontColor: "#296d98",
                    titleFontColor: "#296d98",
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    crosshair: {
                        enabled: true
                    },
                    maximum: 20000,
                    minimum: 13000,
                    stripLines: [{
                            color: "black",
                            fontWeight: "bold",
                            value: 16500,
                        },
                        {
                            color: "#0504AA",
                            fontWeight: "bold",
                            value: 20000,
                        },
                        {
                            color: "#0504AA",
                            fontWeight: "bold",
                            value: 13000,
                        }
                    ]
                },
                toolTip: {
                    shared: true
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    dockInsidePlotArea: false,
                    itemclick: function(e) {
                        toggleDataSeries(e, chart3);
                    },
                },
                data: [{
                        type: "line",
                        name: "Distance Right",
                        color: "#296d98",
                        showInLegend: true,
                        axisYIndex: 1,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Measurement_Dist_Right, DateTimeOut FROM dbo.PartDataRA108
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Performance = $row['Measurement_Dist_Right'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Performance ?>
                                },
                            <?php } ?>
                        ]
                    },
                    {
                        type: "line",
                        name: "Distance Left",
                        color: "#ec5578",
                        showInLegend: true,
                        dataPoints: [
                            <?php
                            $query = sqlsrv_query($conn, "SELECT Measurement_Dist_Left, DateTimeOut FROM dbo.PartDataRA108
                            WHERE DateTimeOut >= '$start' AND DateTimeOut <= '$end' ORDER BY DateTimeOut");
                            while ($row = sqlsrv_fetch_array($query)) {
                                $Performance = $row['Measurement_Dist_Left'];
                                $DateTime = date('H:i:s', strtotime($row['DateTimeOut'])); // Format DateTime as 'H:i:s'
                            ?> {
                                    label: "<?= $DateTime ?>",
                                    y: <?= $Performance ?>
                                },
                            <?php } ?>
                        ]
                    }
                ]
            });
            chart3.render();

            function toggleDataSeries(e, chart3) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart3.render();
            }
        }
    </script>
    <div id="display" style="display: flex;">
        <div style="flex: 1; ">
            <div id="chartContainer1" style="height: 45vh; width: 100%;"></div>
        </div>
        <div style="flex: 1; ">
            <div id="chartContainer3" style="height: 45vh; width: 100%;"></div>
        </div>
    </div>
    <div id="chartContainer" style="height: 45vh; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<?php } ?>