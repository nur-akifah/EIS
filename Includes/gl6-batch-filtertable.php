<!-- Batch Reel -->
<?php
if (isset($_POST['batch_gr'])) {
?>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Batch Code</th>
                <th>DateTime</th>
            </tr>
        </thead>

        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM (SELECT TOP 1 * FROM dbo.PartDataRA101 WHERE Batch_Reel LIKE '%$query%' ORDER BY TimeStamp ASC
            UNION
            SELECT TOP 1 * FROM dbo.PartDataRA101 WHERE Batch_Reel LIKE '%$query%' ORDER BY TimeStamp DESC
            ) AS Hasil");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA101");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['Batch_Reel'] ?></td>
                    <td><?php echo $table['TimeStamp'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
<?php } ?>

<!-- Batch Plastic -->
<?php
if (isset($_POST['batch_pc'])) {
?>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Batch Code</th>
                <th>DateTime</th>
            </tr>
        </thead>

        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM (SELECT TOP 1 * FROM dbo.PartDataRA101 WHERE Batch_Plastic LIKE '%$query%' ORDER BY TimeStamp ASC
            UNION
            SELECT TOP 1 * FROM dbo.PartDataRA101 WHERE Batch_Plastic LIKE '%$query%' ORDER BY TimeStamp DESC
            ) AS Hasil");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA101");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['Batch_Plastic'] ?></td>
                    <td><?php echo $table['TimeStamp'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
<?php } ?>

<!-- Batch Cutter Reel -->
<?php
if (isset($_POST['batch_cr'])) {
?>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Batch Code</th>
                <th>DateTime</th>
            </tr>
        </thead>

        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM (SELECT TOP 1 * FROM dbo.PartDataRA103 WHERE Batch_Cutter LIKE '%$query%' ORDER BY TimeStamp ASC
            UNION
            SELECT TOP 1 * FROM dbo.PartDataRA103 WHERE Batch_Cutter LIKE '%$query%' ORDER BY TimeStamp DESC
            ) AS Hasil");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA103");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['Batch_Cutter'] ?></td>
                    <td><?php echo $table['TimeStamp'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
<?php } ?>

<!-- Batch Island -->
<?php
if (isset($_POST['batch_id'])) {
?>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Batch Code</th>
                <th>DateTime</th>
            </tr>
        </thead>

        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM (SELECT TOP 1 * FROM dbo.PartDataRA103 WHERE Batch_Island LIKE '%$query%' ORDER BY TimeStamp ASC
            UNION
            SELECT TOP 1 * FROM dbo.PartDataRA103 WHERE Batch_Island LIKE '%$query%' ORDER BY TimeStamp DESC
            ) AS Hasil");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA103");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['Batch_Island'] ?></td>
                    <td><?php echo $table['TimeStamp'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
<?php } ?>

<!-- Batch Driving Bridge -->
<?php
if (isset($_POST['batch_db'])) {
?>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Batch Code</th>
                <th>DateTime</th>
            </tr>
        </thead>

        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM (SELECT TOP 1 * FROM dbo.PartDataRA103 WHERE Batch_DB LIKE '%$query%' ORDER BY TimeStamp ASC
            UNION
            SELECT TOP 1 * FROM dbo.PartDataRA103 WHERE Batch_DB LIKE '%$query%' ORDER BY TimeStamp DESC
            ) AS Hasil");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA103");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['Batch_DB'] ?></td>
                    <td><?php echo $table['TimeStamp'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
<?php } ?>

<!-- Batch Ink 1 -->
<?php
if (isset($_POST['batch_i1'])) {
?>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Batch Code</th>
                <th>DateTime</th>
            </tr>
        </thead>

        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM (SELECT TOP 1 * FROM dbo.PartDataRA105 WHERE Batch_Ink1 LIKE '%$query%' ORDER BY TimeStamp ASC
            UNION
            SELECT TOP 1 * FROM dbo.PartDataRA105 WHERE Batch_Ink1 LIKE '%$query%' ORDER BY TimeStamp DESC
            ) AS Hasil");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA105");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['Batch_Ink1'] ?></td>
                    <td><?php echo $table['TimeStamp'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
<?php } ?>


<!-- Batch Ink 2 -->
<?php
if (isset($_POST['batch_i2'])) {
?>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Batch Code</th>
                <th>DateTime</th>
            </tr>
        </thead>

        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM (SELECT TOP 1 * FROM dbo.PartDataRA105 WHERE Batch_Ink2 LIKE '%$query%' ORDER BY TimeStamp ASC
            UNION
            SELECT TOP 1 * FROM dbo.PartDataRA105 WHERE Batch_Ink1 LIKE '%$query%' ORDER BY TimeStamp DESC
            ) AS Hasil");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA105");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['Batch_Ink2'] ?></td>
                    <td><?php echo $table['TimeStamp'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
<?php } ?>


<!-- Batch Ink 3 -->
<?php
if (isset($_POST['batch_i3'])) {
?>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Batch Code</th>
                <th>DateTime</th>
            </tr>
        </thead>

        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM (SELECT TOP 1 * FROM dbo.PartDataRA106 WHERE Batch_Ink3 LIKE '%$query%' ORDER BY TimeStamp ASC
            UNION
            SELECT TOP 1 * FROM dbo.PartDataRA106 WHERE Batch_Ink3 LIKE '%$query%' ORDER BY TimeStamp DESC
            ) AS Hasil");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA106");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['Batch_Ink3'] ?></td>
                    <td><?php echo $table['TimeStamp'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
<?php } ?>


<!-- Batch Ink 4 -->
<?php
if (isset($_POST['batch_i4'])) {
?>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Batch Code</th>
                <th>DateTime</th>
            </tr>
        </thead>

        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM (SELECT TOP 1 * FROM dbo.PartDataRA106 WHERE Batch_Ink4 LIKE '%$query%' ORDER BY TimeStamp ASC
            UNION
            SELECT TOP 1 * FROM dbo.PartDataRA106 WHERE Batch_Ink4 LIKE '%$query%' ORDER BY TimeStamp DESC
            ) AS Hasil");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA106");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['Batch_Ink4'] ?></td>
                    <td><?php echo $table['TimeStamp'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
<?php } ?>


<!-- Batch Hardener -->
<?php
if (isset($_POST['batch_hr'])) {
?>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Batch Code</th>
                <th>DateTime</th>
            </tr>
        </thead>

        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM (SELECT TOP 1 * FROM dbo.PartDataRA105 WHERE Batch_Hardener LIKE '%$query%' ORDER BY TimeStamp ASC
            UNION
            SELECT TOP 1 * FROM dbo.PartDataRA105 WHERE Batch_Hardener LIKE '%$query%' ORDER BY TimeStamp DESC
            ) AS Hasil");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA105");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['Batch_Hardener'] ?></td>
                    <td><?php echo $table['TimeStamp'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
<?php } ?>

<!-- Batch Thinner -->
<?php
if (isset($_POST['batch_tr'])) {
?>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Batch Code</th>
                <th>DateTime</th>
            </tr>
        </thead>

        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM (SELECT TOP 1 * FROM dbo.PartDataRA105 WHERE Batch_Thinner LIKE '%$query%' ORDER BY TimeStamp ASC
            UNION
            SELECT TOP 1 * FROM dbo.PartDataRA105 WHERE Batch_Thinner LIKE '%$query%' ORDER BY TimeStamp DESC
            ) AS Hasil");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA105");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['Batch_Thinner'] ?></td>
                    <td><?php echo $table['TimeStamp'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Batch Code</th>
                <th>DateTime</th>
            </tr>
        </thead>

        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM (SELECT TOP 1 * FROM dbo.PartDataRA106 WHERE Batch_Thinner LIKE '%$query%' ORDER BY TimeStamp ASC
            UNION
            SELECT TOP 1 * FROM dbo.PartDataRA106 WHERE Batch_Thinner LIKE '%$query%' ORDER BY TimeStamp DESC
            ) AS Hasil");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA106");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['Batch_Thinner'] ?></td>
                    <td><?php echo $table['TimeStamp'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
<?php } ?>

<!-- Batch Oil -->
<?php
if (isset($_POST['batch_ol'])) {
?>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Batch Code</th>
                <th>DateTime</th>
            </tr>
        </thead>

        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM (SELECT TOP 1 * FROM dbo.PartDataRA108 WHERE Batch_Oil LIKE '%$query%' ORDER BY TimeStamp ASC
            UNION
            SELECT TOP 1 * FROM dbo.PartDataRA108 WHERE Batch_Oil LIKE '%$query%' ORDER BY TimeStamp DESC
            ) AS Hasil");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA108");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['Batch_Oil'] ?></td>
                    <td><?php echo $table['TimeStamp'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
<?php } ?>

<!-- Batch DMC -->
<?php
if (isset($_POST['batch_dmc'])) {
?>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:max-content;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Timestamp</th>
                <th>DateTimeIn</th>
                <th>DateTimeOut</th>
                <th>Carrier1_No</th>
                <th>Carrier1_Pos</th>
                <th>DMC</th>
                <th>ProcessCode</th>
                <th>ProcessDescription</th>
                <th>BufferIndex</th>
                <th>GuardCounter</th>
                <th>Batch_Reel</th>
                <th>Batch_Plastic</th>
            </tr>
        </thead>
        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA101 WHERE DMC LIKE '%$query%' ORDER BY TimeStamp ASC");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA101");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['TimeStamp'] ?></td>
                    <td><?php echo $table['DateTimeIn'] ?></td>
                    <td><?php echo $table['DateTimeOut'] ?></td>
                    <td><?php echo $table['Carrier1_No'] ?></td>
                    <td><?php echo $table['Carrier1_Pos'] ?></td>
                    <td><?php echo $table['DMC'] ?></td>
                    <td><?php echo $table['ProcessCode'] ?></td>
                    <td><?php echo $table['ProcessDescription'] ?></td>
                    <td><?php echo $table['BufferIndex'] ?></td>
                    <td><?php echo $table['GuardCounter'] ?></td>
                    <td><?php echo $table['Batch_Reel'] ?></td>
                    <td><?php echo $table['Batch_Plastic'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:max-content;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Timestamp</th>
                <th>DateTimeIn</th>
                <th>DateTimeOut</th>
                <th>Carrier1_No</th>
                <th>Carrier1_Pos</th>
                <th>Carrier2_No</th>
                <th>Carrier2_Pos</th>
                <th>DMC</th>
                <th>ProcessCode</th>
                <th>ProcessDescription</th>
                <th>BufferIndex</th>
                <th>BufferType</th>
                <th>VisionResult</th>
                <th>OpenAnchor</th>
                <th>OverFlow</th>
                <th>TotalMeanSlotWidth</th>
                <th>MeanSlotDistanceTop</th>
                <th>MeanSlotDistanceBottom</th>
                <th>TotalDeviationSlotWidth</th>
                <th>NumberBlockedTopSlot</th>
                <th>NumberBlockedBottomSlot</th>
            </tr>
        </thead>
        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA102 WHERE DMC LIKE '%$query%' ORDER BY TimeStamp ASC");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA102");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['TimeStamp'] ?></td>
                    <td><?php echo $table['DateTimeIn'] ?></td>
                    <td><?php echo $table['DateTimeOut'] ?></td>
                    <td><?php echo $table['Carrier1_No'] ?></td>
                    <td><?php echo $table['Carrier1_Pos'] ?></td>
                    <td><?php echo $table['Carrier2_No'] ?></td>
                    <td><?php echo $table['Carrier2_Pos'] ?></td>
                    <td><?php echo $table['DMC'] ?></td>
                    <td><?php echo $table['ProcessCode'] ?></td>
                    <td><?php echo $table['ProcessDescription'] ?></td>
                    <td><?php echo $table['BufferIndex'] ?></td>
                    <td><?php echo $table['BufferType'] ?></td>
                    <td><?php echo $table['VisionResult'] ?></td>
                    <td><?php echo $table['OpenAnchor'] ?></td>
                    <td><?php echo $table['OverFlow'] ?></td>
                    <td><?php echo $table['TotalMeanSlotWidth'] ?></td>
                    <td><?php echo $table['MeanSlotDistanceTop'] ?></td>
                    <td><?php echo $table['MeanSlotDistanceBottom'] ?></td>
                    <td><?php echo $table['TotalDeviationSlotWidth'] ?></td>
                    <td><?php echo $table['NumberBlockedTopSlot'] ?></td>
                    <td><?php echo $table['NumberBlockedBottomSlot'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:max-content;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Timestamp</th>
                <th>DateTimeIn</th>
                <th>DateTimeOut</th>
                <th>Carrier2_No</th>
                <th>Carrier2_Pos</th>
                <th>DMC</th>
                <th>ProcessCode</th>
                <th>ProcessDescription</th>
                <th>BufferIndex</th>
                <th>EndDistance</th>
                <th>EndForce</th>
                <th>MaxForce</th>
                <th>MaxForceDistance</th>
                <th>Batch_Cutter</th>
                <th>Batch_Island</th>
                <th>Batch_DB</th>
            </tr>
        </thead>
        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA103 WHERE DMC LIKE '%$query%' ORDER BY TimeStamp ASC");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA103");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['TimeStamp'] ?></td>
                    <td><?php echo $table['DateTimeIn'] ?></td>
                    <td><?php echo $table['DateTimeOut'] ?></td>
                    <td><?php echo $table['Carrier2_No'] ?></td>
                    <td><?php echo $table['Carrier2_Pos'] ?></td>
                    <td><?php echo $table['DMC'] ?></td>
                    <td><?php echo $table['ProcessCode'] ?></td>
                    <td><?php echo $table['ProcessDescription'] ?></td>
                    <td><?php echo $table['BufferIndex'] ?></td>
                    <td><?php echo $table['EndDist'] ?></td>
                    <td><?php echo $table['EndForce'] ?></td>
                    <td><?php echo $table['MaxForce'] ?></td>
                    <td><?php echo $table['MaxForceDist'] ?></td>
                    <td><?php echo $table['Batch_Cutter'] ?></td>
                    <td><?php echo $table['Batch_Island'] ?></td>
                    <td><?php echo $table['Batch_DB'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:max-content;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Timestamp</th>
                <th>DateTimeIn</th>
                <th>DateTimeOut</th>
                <th>Carrier2_No</th>
                <th>Carrier2_Pos</th>
                <th>Carrier3_No</th>
                <th>Carrier3_Pos</th>
                <th>Holder_No</th>
                <th>DMC</th>
                <th>ProcessCode</th>
                <th>ProcessDescription</th>
                <th>BufferIndex</th>
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
        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA104 WHERE DMC LIKE '%$query%' ORDER BY TimeStamp ASC");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA104");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['TimeStamp'] ?></td>
                    <td><?php echo $table['DateTimeIn'] ?></td>
                    <td><?php echo $table['DateTimeOut'] ?></td>
                    <td><?php echo $table['Carrier2_No'] ?></td>
                    <td><?php echo $table['Carrier2_Pos'] ?></td>
                    <td><?php echo $table['Carrier3_No'] ?></td>
                    <td><?php echo $table['Carrier3_Pos'] ?></td>
                    <td><?php echo $table['Holder_No'] ?></td>
                    <td><?php echo $table['DMC'] ?></td>
                    <td><?php echo $table['ProcessCode'] ?></td>
                    <td><?php echo $table['ProcessDescription'] ?></td>
                    <td><?php echo $table['BufferIndex'] ?></td>
                    <td><?php echo $table['mvs1rl'] ?></td>
                    <td><?php echo $table['mvs1rr'] ?></td>
                    <td><?php echo $table['mvs1tl'] ?></td>
                    <td><?php echo $table['mvs1tr'] ?></td>
                    <td><?php echo $table['mvs3l'] ?></td>
                    <td><?php echo $table['mvs3r'] ?></td>
                    <td><?php echo $table['mvs71sl'] ?></td>
                    <td><?php echo $table['mvs71sr'] ?></td>
                    <td><?php echo $table['mvs71fl'] ?></td>
                    <td><?php echo $table['mvs71fr'] ?></td>
                    <td><?php echo $table['mvs3eclul'] ?></td>
                    <td><?php echo $table['mvs3ecldl'] ?></td>
                    <td><?php echo $table['mvs3eclur'] ?></td>
                    <td><?php echo $table['mvs3ecldr'] ?></td>
                    <td><?php echo $table['mvs3cul'] ?></td>
                    <td><?php echo $table['mvs3cur'] ?></td>
                    <td><?php echo $table['mvs3gul'] ?></td>
                    <td><?php echo $table['mvs3gur'] ?></td>
                    <td><?php echo $table['mvs6ptl'] ?></td>
                    <td><?php echo $table['mvs6ptr'] ?></td>
                    <td><?php echo $table['out'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:max-content;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Timestamp</th>
                <th>DateTimeIn</th>
                <th>DateTimeOut</th>
                <th>Carrier3_No</th>
                <th>Carrier3_Pos</th>
                <th>DMC</th>
                <th>ProcessCode</th>
                <th>ProcessDescription</th>
                <th>BufferIndex</th>
                <th>Vision1_Score</th>
                <th>Vision2_Score</th>
                <th>Vision3_Score</th>
                <th>Vision4_Score</th>
                <th>ActTemp1</th>
                <th>ActTemp2</th>
                <th>ActHumidity</th>
                <th>Batch_Ink1</th>
                <th>Batch_Ink2</th>
                <th>Batch_Hardener</th>
                <th>Batch_Thinner</th>
            </tr>
        </thead>

        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA105 WHERE DMC LIKE '%$query%' ORDER BY TimeStamp ASC");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA105");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['TimeStamp'] ?></td>
                    <td><?php echo $table['DateTimeIn'] ?></td>
                    <td><?php echo $table['DateTimeOut'] ?></td>
                    <td><?php echo $table['Carrier3_No'] ?></td>
                    <td><?php echo $table['Carrier3_Pos'] ?></td>
                    <td><?php echo $table['DMC'] ?></td>
                    <td><?php echo $table['ProcessCode'] ?></td>
                    <td><?php echo $table['ProcessDescription'] ?></td>
                    <td><?php echo $table['BufferIndex'] ?></td>
                    <td><?php echo $table['Vision1_Score'] ?></td>
                    <td><?php echo $table['Vision2_Score'] ?></td>
                    <td><?php echo $table['Vision3_Score'] ?></td>
                    <td><?php echo $table['Vision4_Score'] ?></td>
                    <td><?php echo $table['ActTemp1'] ?></td>
                    <td><?php echo $table['ActTemp2'] ?></td>
                    <td><?php echo $table['ActHumidity'] ?></td>
                    <td><?php echo $table['Batch_Ink1'] ?></td>
                    <td><?php echo $table['Batch_Ink2'] ?></td>
                    <td><?php echo $table['Batch_Hardener'] ?></td>
                    <td><?php echo $table['Batch_Thinner'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:max-content;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Timestamp</th>
                <th>DateTimeIn</th>
                <th>DateTimeOut</th>
                <th>Carrier3_No</th>
                <th>Carrier3_Pos</th>
                <th>DMC</th>
                <th>ProcessCode</th>
                <th>ProcessDescription</th>
                <th>BufferIndex</th>
                <th>Vision5_Score</th>
                <th>Vision6_Score</th>
                <th>ActTemp1</th>
                <th>ActTemp2</th>
                <th>ActHumidity</th>
                <th>Batch_Ink3</th>
                <th>Batch_Ink4</th>
                <th>Batch_Thinner</th>
            </tr>
        </thead>

        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA106 WHERE DMC LIKE '%$query%' ORDER BY TimeStamp ASC");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA106");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['TimeStamp'] ?></td>
                    <td><?php echo $table['DateTimeIn'] ?></td>
                    <td><?php echo $table['DateTimeOut'] ?></td>
                    <td><?php echo $table['Carrier3_No'] ?></td>
                    <td><?php echo $table['Carrier3_Pos'] ?></td>
                    <td><?php echo $table['DMC'] ?></td>
                    <td><?php echo $table['ProcessCode'] ?></td>
                    <td><?php echo $table['ProcessDescription'] ?></td>
                    <td><?php echo $table['BufferIndex'] ?></td>
                    <td><?php echo $table['Vision5_Score'] ?></td>
                    <td><?php echo $table['Vision6_Score'] ?></td>
                    <td><?php echo $table['ActTemp1'] ?></td>
                    <td><?php echo $table['ActTemp2'] ?></td>
                    <td><?php echo $table['ActHumidity'] ?></td>
                    <td><?php echo $table['Batch_Ink3'] ?></td>
                    <td><?php echo $table['Batch_Ink4'] ?></td>
                    <td><?php echo $table['Batch_Thinner'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
    <table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:max-content;">
        <thead class="thead-dark">
            <tr align="center" id="table">
                <th>Cell</th>
                <th>Timestamp</th>
                <th>DateTimeIn</th>
                <th>DateTimeOut</th>
                <th>Carrier3_No</th>
                <th>Carrier3_Pos</th>
                <th>Nest_NO</th>
                <th>Nest_Pos</th>
                <th>OutputStackCode</th>
                <th>DMC</th>
                <th>ProcessCode</th>
                <th>ProcessDescription</th>
                <th>BufferIndex</th>
                <th>VisionResult</th>
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
                <th>Torque_WithoutLoad</th>
                <th>Torque_WithLoad</th>
                <th>Batch_Oil</th>
            </tr>
        </thead>

        <?php
        $query = $_POST['query'];
        if ($query !== '') {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA108 WHERE DMC LIKE '%$query%' ORDER BY TimeStamp ASC");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.PartDataRA108");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tbody>
                <tr align="center" id="table">
                    <th class="text-primary"><?php echo $table['Cell'] ?></th>
                    <td><?php echo $table['TimeStamp'] ?></td>
                    <td><?php echo $table['DateTimeIn'] ?></td>
                    <td><?php echo $table['DateTimeOut'] ?></td>
                    <td><?php echo $table['Carrier3_No'] ?></td>
                    <td><?php echo $table['Carrier3_Pos'] ?></td>
                    <td><?php echo $table['Nest_No'] ?></td>
                    <td><?php echo $table['Nest_Pos'] ?></td>
                    <td><?php echo $table['OutputStackCode'] ?></td>
                    <td><?php echo $table['DMC'] ?></td>
                    <td><?php echo $table['ProcessCode'] ?></td>
                    <td><?php echo $table['ProcessDescription'] ?></td>
                    <td><?php echo $table['BufferIndex'] ?></td>
                    <td><?php echo $table['VisionResult'] ?></td>
                    <td><?php echo $table['Measurement_SilverX'] ?></td>
                    <td><?php echo $table['Measurement_SilverY'] ?></td>
                    <td><?php echo $table['Measurement_SilverR'] ?></td>
                    <td><?php echo $table['Measurement_BlackX'] ?></td>
                    <td><?php echo $table['Measurement_BlackY'] ?></td>
                    <td><?php echo $table['Measurement_BlackR'] ?></td>
                    <td><?php echo $table['Measurement_Dist_Left'] ?></td>
                    <td><?php echo $table['Measurement_Dist_Right'] ?></td>
                    <td><?php echo $table['Measurement_Dist_X'] ?></td>
                    <td><?php echo $table['Measurement_Dist_Y'] ?></td>
                    <td><?php echo $table['Torque_WithoutLoad'] ?></td>
                    <td><?php echo $table['Torque_WithLoad'] ?></td>
                    <td><?php echo $table['Batch_Oil'] ?></td>
                </tr>
            <?php
        } // End while loop
            ?>
            </tbody>
    </table>
<?php } ?>