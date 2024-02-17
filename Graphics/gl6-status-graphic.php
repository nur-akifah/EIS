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

if (isset($_POST['status_ra100'])) {
?>
    <!-- <span class="font-weight-bold"> Start : </span><?php echo $start; ?>
    <span class="font-weight-bold"> End : </span><?php echo $end; ?> -->
    <nav class="navbar navbar-height navbar-light mb-1 mt-1 content-center text-light text-center" style="background-color: #002b5c;">
        Chart View
    </nav>
    <style>
        .navbar-height {
            height: 2.5rem;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {
            var chart1 = new CanvasJS.Chart("chartContainer1", {
                animationEnabled: true,
                title: {
                    text: "RA100 Status Ranking List Durations (s)",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 18
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    fontSize: 15,
                },
                axisY: {
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
                },
                data: [{
                    type: "bar",
                    toolTipContent: "",
                    dataPoints: [<?php
                                    $query = sqlsrv_query($conn, "SELECT StatusText, SUM(DATEDIFF(SECOND, DateTimeStart, DateTimeEnd)) AS totalMinutes
                        FROM dbo.StatusDataRA100 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'
                        AND StatusText <> 'Production' AND StatusText <> 'No Orders' GROUP BY StatusText ORDER BY totalMinutes ASC");

                                    while ($row = sqlsrv_fetch_array($query)) {
                                        $StatusText = $row['StatusText'];
                                        $totalMinutes = $row['totalMinutes'];
                                    ?> {
                                label: "<?= $StatusText ?>",
                                y: <?= $totalMinutes ?>
                            },
                        <?php } ?>

                    ]
                }]
            });
            chart1.render();

            //Grafik 2 Status Data Frequency
            var chart2 = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                title: {
                    text: "RA100 Status Ranking List Occurrence (times)",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 18
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    fontSize: 15
                },
                axisY: {
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
                },
                data: [{
                    type: "bar",
                    toolTipContent: "",
                    dataPoints: [<?php
                                    $query = sqlsrv_query($conn, "SELECT COUNT(Duration) AS count, StatusText
                        from dbo.StatusDataRA100 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'
                        AND StatusText <> 'Production' AND StatusText <> 'No Orders' group by StatusText order by COUNT(Duration) ASC;");
                                    while ($row = SQLSRV_FETCH_ARRAY($query)) { ?> {
                                label: "<?= $row['StatusText'] ?>",
                                y: <?= $row['count'] ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart2.render();
        }
    </script>
    <div id="chartContainer1" style="position: relative; height: 44vh; width: 100%;"></div>
    <div id="chartContainer2" style="position: relative; height: 44vh; width: 100%;"></div>
    <!-- <div id="display" style="display: flex;"> -->
    <!-- <div style="flex: 1; "> -->
    <!-- </div> -->
    <!-- <div style="flex: 1; "> -->
    <!-- </div> -->
    <!-- </div> -->
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <style>
        @font-face {
            font-family: Nunito;
            src: url(../font/Nunito-Regular.ttf);
            src: url(../font/Nunito-Regular.ttf) format("ttf"),
                url(../font/Nunito-Regular.ttf) format("truetype");
        }
    </style>
<?php } ?>

<?php
if (isset($_POST['status_ra101'])) {
?>
    <nav class="navbar navbar-height navbar-light mb-1 mt-1 content-center text-light text-center" style="background-color: #002b5c;">
        Chart View
    </nav>
    <style>
        .navbar-height {
            height: 2.5rem;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {
            //Grafik 1 Status Data Duration

            var chart1 = new CanvasJS.Chart("chartContainer1", {
                animationEnabled: true,
                title: {
                    text: "RA101 Status Ranking List Durations (s)",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 18
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    fontSize: 15
                },
                axisY: {
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
                },
                data: [{
                    type: "bar",
                    toolTipContent: "",
                    dataPoints: [<?php
                                    $query = sqlsrv_query($conn, "SELECT StatusText, SUM(DATEDIFF(SECOND, DateTimeStart, DateTimeEnd)) AS totalMinutes
                        FROM dbo.StatusDataRA101 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'
                        AND StatusText <> 'Production' AND StatusText <> 'No Orders' GROUP BY StatusText ORDER BY totalMinutes ASC");

                                    while ($row = sqlsrv_fetch_array($query)) {
                                        $StatusText = $row['StatusText'];
                                        $totalMinutes = $row['totalMinutes'];
                                    ?> {
                                label: "<?= $StatusText ?>",
                                y: <?= $totalMinutes ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart1.render();

            //Grafik 2 Status Data Frequency
            var chart2 = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                title: {
                    text: "RA101 Status Ranking List Occurrence (times)",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 18
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    fontSize: 15
                },
                axisY: {
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
                },
                data: [{
                    type: "bar",
                    toolTipContent: "",
                    dataPoints: [
                        <?php
                        $query = sqlsrv_query($conn, "SELECT COUNT(Duration) AS count, StatusText
                        from dbo.StatusDataRA101 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'
                        AND StatusText <> 'Production' AND StatusText <> 'No Orders' group by StatusText order by COUNT(Duration) ASC;");
                        while ($row = SQLSRV_FETCH_ARRAY($query)) { ?> {
                                label: "<?= $row['StatusText'] ?>",
                                y: <?= $row['count'] ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart2.render();
        }
    </script>
    <div id="chartContainer1" style="position: relative; height: 44vh; width: 100%;"></div>
    <div id="chartContainer2" style="position: relative; height: 44vh; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <style>
        @font-face {
            font-family: Nunito;
            src: url(../font/Nunito-Regular.ttf);
            src: url(../font/Nunito-Regular.ttf) format("ttf"),
                url(../font/Nunito-Regular.ttf) format("truetype");
        }
    </style>
<?php } ?>

<?php
if (isset($_POST['status_ra102'])) {
?>
    <nav class="navbar navbar-height navbar-light mb-1 mt-1 content-center text-light text-center" style="background-color: #002b5c;">
        Chart View
    </nav>
    <style>
        .navbar-height {
            height: 2.5rem;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {
            //Grafik 1 Status Data Duration
            var chart1 = new CanvasJS.Chart("chartContainer1", {
                animationEnabled: true,
                title: {
                    text: "RA102 Status Ranking List Durations (s)",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 18
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    fontSize: 15
                },
                axisY: {
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
                },
                data: [{
                    type: "bar",
                    toolTipContent: "",
                    dataPoints: [
                        <?php
                        $query = sqlsrv_query($conn, "SELECT StatusText, SUM(DATEDIFF(SECOND, DateTimeStart, DateTimeEnd)) AS totalMinutes
                        FROM dbo.StatusDataRA102 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'
                        AND StatusText <> 'Production' AND StatusText <> 'No Orders' GROUP BY StatusText ORDER BY totalMinutes ASC");

                        while ($row = sqlsrv_fetch_array($query)) {
                            $StatusText = $row['StatusText'];
                            $totalMinutes = $row['totalMinutes'];
                        ?> {
                                label: "<?= $StatusText ?>",
                                y: <?= $totalMinutes ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart1.render();

            //Grafik 2 Status Data Frequency
            var chart2 = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                title: {
                    text: "RA102 Status Ranking List Occurrence (times)",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 18
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    fontSize: 15,
                },
                axisY: {
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                },
                data: [{
                    type: "bar",
                    toolTipContent: "",
                    dataPoints: [
                        <?php
                        $query = sqlsrv_query($conn, "SELECT COUNT(Duration) AS count, StatusText
                        from dbo.StatusDataRA102 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'
                        AND StatusText <> 'Production' AND StatusText <> 'No Orders' group by StatusText order by COUNT(Duration) ASC;");
                        while ($row = SQLSRV_FETCH_ARRAY($query)) { ?> {
                                label: "<?= $row['StatusText'] ?>",
                                y: <?= $row['count'] ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart2.render();
        }
    </script>
    <div id="chartContainer1" style="position: relative; height: 44vh; width: 100%;"></div>
    <div id="chartContainer2" style="position: relative; height: 44vh; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <style>
        @font-face {
            font-family: Nunito;
            src: url(../font/Nunito-Regular.ttf);
            src: url(../font/Nunito-Regular.ttf) format("ttf"),
                url(../font/Nunito-Regular.ttf) format("truetype");
        }
    </style>
<?php } ?>

<?php
if (isset($_POST['status_ra103'])) {
?>
    <nav class="navbar navbar-height navbar-light mb-1 mt-1 content-center text-light text-center" style="background-color: #002b5c;">
        Chart View
    </nav>
    <style>
        .navbar-height {
            height: 2.3rem;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {
            //Grafik 1 Status Data Duration
            var chart1 = new CanvasJS.Chart("chartContainer1", {
                animationEnabled: true,
                title: {
                    text: "RA103 Status Ranking List Durations (s)",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 18
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    fontSize: 15,
                    // margin: 4,
                    scaleBreaks: {
                        spacing: 5,
                    },
                    labelFontSize: 10
                },
                axisY: {
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    // margin: 4,
                    scaleBreaks: {
                        spacing: 5,
                    },
                    labelFontSize: 10
                },
                data: [{
                    type: "bar",
                    toolTipContent: "",
                    dataPoints: [
                        <?php
                        $query = sqlsrv_query($conn, "SELECT StatusText, SUM(DATEDIFF(SECOND, DateTimeStart, DateTimeEnd)) AS totalMinutes
                        FROM dbo.StatusDataRA103 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'
                        AND StatusText <> 'Production' AND StatusText <> 'No Orders' GROUP BY StatusText ORDER BY totalMinutes ASC");

                        while ($row = sqlsrv_fetch_array($query)) {
                            $StatusText = $row['StatusText'];
                            $totalMinutes = $row['totalMinutes'];
                        ?> {
                                label: "<?= $StatusText ?>",
                                y: <?= $totalMinutes ?>,
                                indexLabelLineThickness: 0, // Menyembunyikan garis pemisah
                                indexLabelLineLength: 0
                            },
                        <?php } ?>
                    ],
                }],
                // options: {
                //     barSpacing: 2
                // }
            });
            chart1.render();

            //Grafik 2 Status Data Frequency
            var chart2 = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                title: {
                    text: "RA103 Status Ranking List Occurrence (times)",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 18
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    fontSize: 15,
                    // margin: 4,
                    scaleBreaks: {
                        spacing: 5,
                    },
                    labelFontSize: 10
                },
                axisY: {
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    // margin: 4,
                    scaleBreaks: {
                        spacing: 5,
                    },
                    labelFontSize: 10
                },
                data: [{
                    type: "bar",
                    toolTipContent: "",
                    dataPoints: [
                        <?php
                        $query = sqlsrv_query($conn, "SELECT COUNT(Duration) AS count, StatusText
                        from dbo.StatusDataRA103 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'
                        AND StatusText <> 'Production' AND StatusText <> 'No Orders' group by StatusText order by COUNT(Duration) ASC;");
                        while ($row = SQLSRV_FETCH_ARRAY($query)) { ?> {
                                label: "<?= $row['StatusText'] ?>",
                                y: <?= $row['count'] ?>,
                                indexLabelLineThickness: 0, // Menyembunyikan garis pemisah
                                indexLabelLineLength: 0
                            },
                        <?php } ?>
                    ],
                }],
                // options: {
                //     barSpacing: 2
                // }
            });
            chart2.render();
        }
    </script>
    <div id="chartContainer1" style="position: relative; height: 45vh; width: 100%;"></div>
    <div id="chartContainer2" style="position: relative; height: 45vh; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <style>
        @font-face {
            font-family: Nunito;
            src: url(../font/Nunito-Regular.ttf);
            src: url(../font/Nunito-Regular.ttf) format("ttf"),
                url(../font/Nunito-Regular.ttf) format("truetype");
        }
    </style>
<?php } ?>


<!-- ===RA104=== -->
<?php
if (isset($_POST['status_ra104'])) {
?>
    <nav class="navbar navbar-height navbar-light mb-1 mt-1 content-center text-light text-center" style="background-color: #002b5c;">
        Chart View
    </nav>
    <style>
        .navbar-height {
            height: 2.5rem;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {
            //Grafik 1 Status Data Duration
            var chart1 = new CanvasJS.Chart("chartContainer1", {
                animationEnabled: true,
                title: {
                    text: "RA104 Status Ranking List Durations (s)",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 18
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    fontSize: 15
                },
                axisY: {
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    // suffix: "s",

                },
                data: [{
                    type: "bar",
                    toolTipContent: "",
                    // yValueFormatString: "#,###.##s",
                    dataPoints: [
                        <?php
                        $query = sqlsrv_query($conn, "SELECT StatusText, SUM(DATEDIFF(SECOND, DateTimeStart, DateTimeEnd)) AS totalMinutes
                        FROM dbo.StatusDataRA104 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'
                        AND StatusText <> 'Production' AND StatusText <> 'No Orders' GROUP BY StatusText ORDER BY totalMinutes ASC");

                        while ($row = sqlsrv_fetch_array($query)) {
                            $StatusText = $row['StatusText'];
                            $totalMinutes = $row['totalMinutes'];
                        ?> {
                                label: "<?= $StatusText ?>",
                                y: <?= $totalMinutes ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart1.render();

            //Grafik 2 Status Data Frequency
            var chart2 = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                title: {
                    text: "RA104 Status Ranking List Occurrence (times)",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 18
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    fontSize: 15
                },
                axisY: {
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",

                },
                data: [{
                    type: "bar",
                    toolTipContent: "",
                    dataPoints: [
                        <?php
                        $query = sqlsrv_query($conn, "SELECT COUNT(Duration) AS count, StatusText
                        from dbo.StatusDataRA104 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'
                        AND StatusText <> 'Production' AND StatusText <> 'No Orders' group by StatusText order by COUNT(Duration) ASC;");
                        while ($row = SQLSRV_FETCH_ARRAY($query)) { ?> {
                                label: "<?= $row['StatusText'] ?>",
                                y: <?= $row['count'] ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart2.render();
        }
    </script>
    <div id="chartContainer1" style="position: relative; height: 44vh; width: 100%;"></div>
    <div id="chartContainer2" style="position: relative; height: 44vh; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <style>
        @font-face {
            font-family: Nunito;
            src: url(../font/Nunito-Regular.ttf);
            src: url(../font/Nunito-Regular.ttf) format("ttf"),
                url(../font/Nunito-Regular.ttf) format("truetype");
        }
    </style>
<?php } ?>


<!-- ===RA105=== -->
<?php
if (isset($_POST['status_ra105'])) {
?>
    <nav class="navbar navbar-height navbar-light mb-1 mt-1 content-center text-light text-center" style="background-color: #002b5c;">
        Chart View
    </nav>
    <style>
        .navbar-height {
            height: 2.5rem;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {
            //Grafik 1 Status Data Duration
            var chart1 = new CanvasJS.Chart("chartContainer1", {
                animationEnabled: true,
                title: {
                    text: "RA105 Status Ranking List Durations (s)",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 18
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    fontSize: 15
                },
                axisY: {
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
                },
                data: [{
                    type: "bar",
                    toolTipContent: "",
                    dataPoints: [
                        <?php
                        $query = sqlsrv_query($conn, "SELECT StatusText, SUM(DATEDIFF(SECOND, DateTimeStart, DateTimeEnd)) AS totalMinutes
                        FROM dbo.StatusDataRA105 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'
                        AND StatusText <> 'Production' AND StatusText <> 'No Orders' GROUP BY StatusText ORDER BY totalMinutes ASC");

                        while ($row = sqlsrv_fetch_array($query)) {
                            $StatusText = $row['StatusText'];
                            $totalMinutes = $row['totalMinutes'];
                        ?> {
                                label: "<?= $StatusText ?>",
                                y: <?= $totalMinutes ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart1.render();

            //Grafik 2 Status Data Frequency
            var chart2 = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                title: {
                    text: "RA105 Status Ranking List Occurrence (times)",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 18
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    fontSize: 15
                },
                axisY: {
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
                },
                data: [{
                    type: "bar",
                    toolTipContent: "",
                    dataPoints: [
                        <?php
                        $query = sqlsrv_query($conn, "SELECT COUNT(Duration) AS count, StatusText
                        from dbo.StatusDataRA105 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'
                        AND StatusText <> 'Production' AND StatusText <> 'No Orders' group by StatusText order by COUNT(Duration) ASC;");
                        while ($row = SQLSRV_FETCH_ARRAY($query)) { ?> {
                                label: "<?= $row['StatusText'] ?>",
                                y: <?= $row['count'] ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart2.render();
        }
    </script>
    <div id="chartContainer1" style="position: relative; height: 44vh; width: 100%;"></div>
    <div id="chartContainer2" style="position: relative; height: 44vh; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <style>
        @font-face {
            font-family: Nunito;
            src: url(../font/Nunito-Regular.ttf);
            src: url(../font/Nunito-Regular.ttf) format("ttf"),
                url(../font/Nunito-Regular.ttf) format("truetype");
        }
    </style>
<?php } ?>


<!-- ===RA106=== -->
<?php
if (isset($_POST['status_ra106'])) {
?>
    <nav class="navbar navbar-height navbar-light mb-1 mt-1 content-center text-light text-center" style="background-color: #002b5c;">
        Chart View
    </nav>
    <style>
        .navbar-height {
            height: 2.5rem;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {
            //Grafik 1 Status Data Duration
            var chart1 = new CanvasJS.Chart("chartContainer1", {
                animationEnabled: true,
                title: {
                    text: "RA106 Status Ranking List Durations (s)",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 18
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    fontSize: 15
                },
                axisY: {
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
                },
                data: [{
                    type: "bar",
                    toolTipContent: "",
                    dataPoints: [
                        <?php
                        $query = sqlsrv_query($conn, "SELECT StatusText, SUM(DATEDIFF(SECOND, DateTimeStart, DateTimeEnd)) AS totalMinutes
                        FROM dbo.StatusDataRA106 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'
                        AND StatusText <> 'Production' AND StatusText <> 'No Orders' GROUP BY StatusText ORDER BY totalMinutes ASC");

                        while ($row = sqlsrv_fetch_array($query)) {
                            $StatusText = $row['StatusText'];
                            $totalMinutes = $row['totalMinutes'];
                        ?> {
                                label: "<?= $StatusText ?>",
                                y: <?= $totalMinutes ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart1.render();

            //Grafik 2 Status Data Frequency
            var chart2 = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                title: {
                    text: "RA106 Status Ranking List Occurrence (times)",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 18
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    fontSize: 15
                },
                axisY: {
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
                },
                data: [{
                    type: "bar",
                    toolTipContent: "",
                    dataPoints: [
                        <?php
                        $query = sqlsrv_query($conn, "SELECT COUNT(Duration) AS count, StatusText
                        from dbo.StatusDataRA106 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'
                        AND StatusText <> 'Production' AND StatusText <> 'No Orders' group by StatusText order by COUNT(Duration) ASC;");
                        while ($row = SQLSRV_FETCH_ARRAY($query)) { ?> {
                                label: "<?= $row['StatusText'] ?>",
                                y: <?= $row['count'] ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart2.render();
        }
    </script>
    <div id="chartContainer1" style="position: relative; height: 44vh; width: 100%;"></div>
    <div id="chartContainer2" style="position: relative; height: 44vh; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <style>
        @font-face {
            font-family: Nunito;
            src: url(../font/Nunito-Regular.ttf);
            src: url(../font/Nunito-Regular.ttf) format("ttf"),
                url(../font/Nunito-Regular.ttf) format("truetype");
        }
    </style>
<?php } ?>

<?php
if (isset($_POST['status_ra108'])) {
?>
    <nav class="navbar navbar-height navbar-light mb-1 mt-1 content-center text-light text-center" style="background-color: #002b5c;">
        Chart View
    </nav>
    <style>
        .navbar-height {
            height: 2.5rem;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {
            //Grafik 1 Status Data Duration
            var chart1 = new CanvasJS.Chart("chartContainer1", {
                animationEnabled: true,
                title: {
                    text: "RA108 Status Ranking List Durations (s)",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 18
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    fontSize: 15
                },
                axisY: {
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
                },
                data: [{
                    type: "bar",
                    toolTipContent: "",
                    dataPoints: [
                        <?php
                        $query = sqlsrv_query($conn, "SELECT StatusText, SUM(DATEDIFF(SECOND, DateTimeStart, DateTimeEnd)) AS totalMinutes
                        FROM dbo.StatusDataRA108 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'
                        AND StatusText <> 'Production' AND StatusText <> 'No Orders' GROUP BY StatusText ORDER BY totalMinutes ASC");

                        while ($row = sqlsrv_fetch_array($query)) {
                            $StatusText = $row['StatusText'];
                            $totalMinutes = $row['totalMinutes'];
                        ?> {
                                label: "<?= $StatusText ?>",
                                y: <?= $totalMinutes ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart1.render();

            //Grafik 2 Status Data Frequency
            var chart2 = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                title: {
                    text: "RA108 Status Ranking List Occurrence (times)",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 18
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    fontSize: 15
                },
                axisY: {
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
                },
                data: [{
                    type: "bar",
                    toolTipContent: "",
                    dataPoints: [
                        <?php
                        $query = sqlsrv_query($conn, "SELECT COUNT(Duration) AS count, StatusText
                        from dbo.StatusDataRA108 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'
                        AND StatusText <> 'Production' AND StatusText <> 'No Orders' group by StatusText order by COUNT(Duration) ASC;");
                        while ($row = SQLSRV_FETCH_ARRAY($query)) { ?> {
                                label: "<?= $row['StatusText'] ?>",
                                y: <?= $row['count'] ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart2.render();
        }
    </script>
    <div id="chartContainer1" style="position: relative; height: 44vh; width: 100%;"></div>
    <div id="chartContainer2" style="position: relative; height: 44vh; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <style>
        @font-face {
            font-family: Nunito;
            src: url(../font/Nunito-Regular.ttf);
            src: url(../font/Nunito-Regular.ttf) format("ttf"),
                url(../font/Nunito-Regular.ttf) format("truetype");
        }
    </style>
<?php } ?>


<?php
if (isset($_POST['status_gl6'])) {
?>
    <nav class="navbar navbar-height navbar-light mb-1 mt-1 content-center text-light text-center" style="background-color: #002b5c;">
        Chart View
    </nav>
    <style>
        .navbar-height {
            height: 2.5rem;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {
            //Grafik 1 Status Data Duration
            var chart1 = new CanvasJS.Chart("chartContainer1", {
                animationEnabled: true,
                title: {
                    text: "GL6 Status Ranking List Durations (s)",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 18
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    fontSize: 15
                },
                axisY: {
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
                },
                data: [{
                    type: "bar",
                    toolTipContent: "",
                    dataPoints: [
                        <?php
                        $query = sqlsrv_query($conn, "SELECT StatusText, SUM(DATEDIFF(SECOND, DateTimeStart, DateTimeEnd)) AS totalMinutes
                        FROM dbo.StatusDataGL6 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'
                        AND StatusText <> 'Production' AND StatusText <> 'No Orders' GROUP BY StatusText ORDER BY totalMinutes ASC");

                        while ($row = sqlsrv_fetch_array($query)) {
                            $StatusText = $row['StatusText'];
                            $totalMinutes = $row['totalMinutes'];
                        ?> {
                                label: "<?= $StatusText ?>",
                                y: <?= $totalMinutes ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart1.render();

            //Grafik 2 Status Data Frequency
            var chart2 = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                title: {
                    text: "GL6 Status Ranking List Occurrence (times)",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold",
                    fontSize: 18
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c",
                    fontSize: 15
                },
                axisY: {
                    includeZero: true,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
                },
                data: [{
                    type: "bar",
                    toolTipContent: "",
                    dataPoints: [
                        <?php
                        $query = sqlsrv_query($conn, "SELECT COUNT(Duration) AS count, StatusText
                        from dbo.StatusDataGL6 WHERE DateTimeEnd >= '$start' AND DateTimeEnd <= '$end'
                        AND StatusText <> 'Production' AND StatusText <> 'No Orders' group by StatusText order by COUNT(Duration) ASC;");
                        while ($row = SQLSRV_FETCH_ARRAY($query)) { ?> {
                                label: "<?= $row['StatusText'] ?>",
                                y: <?= $row['count'] ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart2.render();
        }
    </script>
    <div id="chartContainer1" style="position: relative; height: 44vh; width: 100%;"></div>
    <div id="chartContainer2" style="position: relative; height: 44vh; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <style>
        @font-face {
            font-family: Nunito;
            src: url(../font/Nunito-Regular.ttf);
            src: url(../font/Nunito-Regular.ttf) format("ttf"),
                url(../font/Nunito-Regular.ttf) format("truetype");
        }
    </style>
<?php } ?>