<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Search</title>
</head>

<body>
    <form action="" method="POST">
        <label for="material12nc" class="col-sm-2 col-form-label">Type Selection</label>
        <select id="" class="form-control" name="item" aria-label="Default select example">
            <option selected="">Select Material</option>
        </select>
        <label for="material12nc" class="col-sm-2 col-form-label">Insert Code</label>
        <input type="text" name="query" id="query" class="form-control" placeholder="">
        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>
    <div class="table-responsive">
        <table border="1" class="table align-items-center table-flush table-hover table-striped display nowrap" style="width:100%">
            <thead class="thead-dark">
                <tr align="center" id="table">
                    <th>ID</th>
                    <th>Material</th>
                    <th>Batch Code</th>
                    <th>VALUE</th>
                    <th>FROM_DATE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if the form is submitted
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $query = $_POST['query'];

                    // Query based on the search query
                    if (!empty($query)) {
                        $query = '%' . $query . '%';
                        $select = sqlsrv_query($conn, "SELECT * FROM dbo.TB_Batch WHERE batch_code LIKE ?", array($query));
                    } else {
                        $select = sqlsrv_query($conn, "SELECT * FROM dbo.TB_Batch");
                        if (!$select) {
                            echo "Error: " . print_r(sqlsrv_errors(), true);
                        }
                    }

                    while ($table = sqlsrv_fetch_array($select)) {
                ?>
                        <tr align="center" id="table">
                            <td class="text-primary"><?php echo $table['id'] ?></td>
                            <td><?php echo $table['material'] ?></td>
                            <td><?php echo $table['batch_code'] ?></td>
                            <td>Data 1</td>
                            <td>Data 2</td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>