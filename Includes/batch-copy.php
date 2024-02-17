<table id="example" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%">
    <thead class="thead-dark">
        <tr align="center" id="table">
            <th>Cell</th>
            <th>Material</th>
            <th>Batch Code</th>
            <th>From Date</th>
            <th>Till Date</th>
        </tr>
    </thead>
    <tbody>
        <!-- ==== Put PHP Code here === -->
        <?php
        $query = $_GET['query'];
        if ($query != '') {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.TB_Batch WHERE batch_code LIKE '%$query%'");
        } else {
            $select = sqlsrv_query($conn, "SELECT * FROM dbo.TB_Batch");
            if (!$select) {
                echo sqlsrv_errors($conn);
            }
        }
        while ($table = sqlsrv_fetch_array($select)) {
        ?>
            <tr align="center" id="table">
                <th class="text-primary"><?php echo $table['id'] ?></th>
                <td><?php echo $table['material'] ?></td>
                <td><?php echo $table['batch_code'] ?></td>
                <td>Data 1</td>
                <td>Data 2</td>
            </tr>
            <!-- === Kurung tutup untuk PHP === -->
    </tbody>
<?php } ?>
</table>
<script>
    $('#example').DataTable({
        dom: 'Bfrtip',
        paging: false,
        buttons: [{
            extend: 'copy',
            text: 'Copy to Clipboard'
        }]
    });
</script>