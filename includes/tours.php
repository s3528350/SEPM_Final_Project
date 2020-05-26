<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><a type="button" class="btn btn-primary" href="signup.php">Add User</a></h6>
    <div class="card-body">
        <?php
        if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
            echo '<h2>' . $_SESSION['success'] . '</h2>';
            unset($_SESSION['succes']);
        }

        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
            echo '<h2>' . $_SESSION['status'] . '</h2>';
            unset($_SESSION['status']);
        }
        ?>
        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> First Name </th>
                        <th> Last Name </th>
                        <th>Email </th>
                        <th>Created at </th>
                        <th>Rights </th>
                        <th>EDIT </th>
                        <th>DELETE </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //creating a query to fetch user details from database
                    $q = "select * from $table_user";
                    $results = mysqli_query($db, $q) or die(mysqli_error($db));
                    while ($row = mysqli_fetch_array($results)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['fname']; ?></td>
                            <td><?php echo $row['lname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td><?php if ($row['is_admin'] == 1) {
                                    echo "Admin";
                                } else {
                                    echo "Assistant";
                                } ?></td>
                            <td>
                                <form action="process_edit.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                </form>
                            </td>
                            <td>
                                <form action="delete_user.php" method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
</div>