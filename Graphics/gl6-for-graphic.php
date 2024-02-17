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

if (isset($_POST['for_ra100'])) {
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
                title: {
                    fontSize: 25,
                    text: "Machine RA100 FOR Data Chart",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold"
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
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
                        $query = sqlsrv_query($conn, "SELECT COUNT(ProcessCode) AS count, ProcessDescription
                    from dbo.PartDataRA100 WHERE DateTimeIn >= '$start' AND DateTimeOut <= '$end'
                    AND ProcessCode <> '0'
                    group by ProcessDescription order by COUNT(ProcessCode) ASC;");
                        while ($row = SQLSRV_FETCH_ARRAY($query)) { ?> {
                                label: "<?= $row['ProcessDescription'] ?>",
                                y: <?= $row['count'] ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart.render();
        }
    </script>
    <div class="canvas" id="chartContainer" style="height: 45vh; width: 100%;"></div>
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


<!-- === RA101 === -->
<?php
if (isset($_POST['for_ra101'])) {
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
                title: {
                    fontSize: 25,
                    text: "Machine RA101 FOR Data Chart",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold"
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
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
                        $query = sqlsrv_query($conn, "SELECT COUNT(ProcessCode) AS count, ProcessDescription
                    from dbo.PartDataRA101 WHERE DateTimeIn >= '$start' AND DateTimeOut <= '$end'
                    AND ProcessCode <> '0'
                    group by ProcessDescription order by COUNT(ProcessCode) ASC;");
                        while ($row = SQLSRV_FETCH_ARRAY($query)) { ?> {
                                label: "<?= $row['ProcessDescription'] ?>",
                                y: <?= $row['count'] ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart.render();
        }
    </script>
    <div class="canvas" id="chartContainer" style="height: 45vh; width: 100%;"></div>
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

<!-- ===== RA102 ===== -->
<?php
if (isset($_POST['for_ra102'])) {
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
                title: {
                    fontSize: 25,
                    text: "Machine RA102 FOR Data Chart",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold"
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
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
                        $query = sqlsrv_query($conn, "SELECT COUNT(ProcessCode) AS count, ProcessDescription
                    from dbo.PartDataRA102 WHERE DateTimeIn >= '$start' AND DateTimeOut <= '$end'
                    AND ProcessCode <> '0'
                    group by ProcessDescription order by COUNT(ProcessCode) ASC;");
                        while ($row = SQLSRV_FETCH_ARRAY($query)) { ?> {
                                label: "<?= $row['ProcessDescription'] ?>",
                                y: <?= $row['count'] ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart.render();
        }
    </script>
    <div class="canvas" id="chartContainer" style="height: 45vh; width: 100%;"></div>
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

<!-- ===== RA103 ===== -->
<?php
if (isset($_POST['for_ra103'])) {
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
                title: {
                    fontSize: 25,
                    text: "Machine RA103 FOR Data Chart",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold"
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
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
                        $query = sqlsrv_query($conn, "SELECT COUNT(ProcessCode) AS count, ProcessDescription
                    from dbo.PartDataRA103 WHERE DateTimeIn >= '$start' AND DateTimeOut <= '$end'
                    AND ProcessCode <> '0'
                    group by ProcessDescription order by COUNT(ProcessCode) ASC;");
                        while ($row = SQLSRV_FETCH_ARRAY($query)) { ?> {
                                label: "<?= $row['ProcessDescription'] ?>",
                                y: <?= $row['count'] ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart.render();
        }
    </script>
    <div class="canvas" id="chartContainer" style="height: 45vh; width: 100%;"></div>
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

<!-- ===== RA104 ===== -->
<?php
if (isset($_POST['for_ra104'])) {
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
                title: {
                    fontSize: 25,
                    text: "Machine RA104 FOR Data Chart",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold"
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
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
                        $query = sqlsrv_query($conn, "SELECT COUNT(ProcessCode) AS count, ProcessDescription
                    from dbo.PartDataRA104 WHERE DateTimeIn >= '$start' AND DateTimeOut <= '$end'
                    AND ProcessCode <> '0'
                    group by ProcessDescription order by COUNT(ProcessCode) ASC;");
                        while ($row = SQLSRV_FETCH_ARRAY($query)) { ?> {
                                label: "<?= $row['ProcessDescription'] ?>",
                                y: <?= $row['count'] ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart.render();
        }
    </script>
    <div class="canvas" id="chartContainer" style="height: 45vh; width: 100%;"></div>
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

<!-- ===== RA105 ===== -->
<?php
if (isset($_POST['for_ra105'])) {
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
                title: {
                    fontSize: 25,
                    text: "Machine RA105 FOR Data Chart",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold"
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
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
                        $query = sqlsrv_query($conn, "SELECT COUNT(ProcessCode) AS count, ProcessDescription
                    from dbo.PartDataRA105 WHERE DateTimeIn >= '$start' AND DateTimeOut <= '$end'
                    AND ProcessCode <> '0'
                    group by ProcessDescription order by COUNT(ProcessCode) ASC;");
                        while ($row = SQLSRV_FETCH_ARRAY($query)) { ?> {
                                label: "<?= $row['ProcessDescription'] ?>",
                                y: <?= $row['count'] ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart.render();
        }
    </script>
    <div class="canvas" id="chartContainer" style="height: 45vh; width: 100%;"></div>
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

<!-- ===== RA106 ===== -->
<?php
if (isset($_POST['for_ra106'])) {
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
                title: {
                    fontSize: 25,
                    text: "Machine RA106 FOR Data Chart",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold"
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
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
                        $query = sqlsrv_query($conn, "SELECT COUNT(ProcessCode) AS count, ProcessDescription
                    from dbo.PartDataRA106 WHERE DateTimeIn >= '$start' AND DateTimeOut <= '$end'
                    AND ProcessCode <> '0'
                    group by ProcessDescription order by COUNT(ProcessCode) ASC;");
                        while ($row = SQLSRV_FETCH_ARRAY($query)) { ?> {
                                label: "<?= $row['ProcessDescription'] ?>",
                                y: <?= $row['count'] ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart.render();
        }
    </script>
    <div class="canvas" id="chartContainer" style="height: 45vh; width: 100%;"></div>
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

<!-- ===== RA108 ===== -->
<?php
if (isset($_POST['for_ra108'])) {
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
                title: {
                    fontSize: 25,
                    text: "Machine RA108 FOR Data Chart",
                    fontFamily: "Nunito",
                    fontColor: "#6777EF",
                    fontWeight: "bold"
                },
                axisX: {
                    interval: 1,
                    labelFontFamily: "Nunito",
                    fontColor: "#002b5c"
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
                        $query = sqlsrv_query($conn, "SELECT COUNT(ProcessCode) AS count, ProcessDescription
                    from dbo.PartDataRA108 WHERE DateTimeIn >= '$start' AND DateTimeOut <= '$end'
                    AND ProcessCode <> '0'
                    group by ProcessDescription order by COUNT(ProcessCode) ASC;");
                        while ($row = SQLSRV_FETCH_ARRAY($query)) { ?> {
                                label: "<?= $row['ProcessDescription'] ?>",
                                y: <?= $row['count'] ?>
                            },
                        <?php } ?>
                    ]
                }]
            });
            chart.render();
        }
    </script>
    <div class="canvas" id="chartContainer" style="height: 45vh; width: 100%;"></div>
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