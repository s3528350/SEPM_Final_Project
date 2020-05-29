<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><a type="button" class="btn btn-primary" href="add_location.php">Add Location</a></h6>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Name </th>
                        <th> Description </th>
                        <th>Longitude </th>
                        <th>Latitude </th>
                        <th>Minimum Time Spent </th>
                        <?php if(isset($_SESSION['admin'])):?>
                        <th>EDIT </th>
                        <th>DELETE </th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //creating a query to fetch user details from database
                    $q = "select * from $table_location";
                    $results = mysqli_query($db, $q) or die(mysqli_error($db));
                    while ($row = mysqli_fetch_array($results)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['longitude']; ?></td>
                            <td><?php echo $row['latitude']; ?></td>
                            <td><?php echo $row['minTimeSpent']; ?></td>
                            <?php if(isset($_SESSION['admin'])):?>
                            <td>
                                <form action="update_location.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                </form>
                            </td>
                            <td>
                                <form action="adminPanel.php" method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                    <H6>Upcoming feature</H6>
                                </form>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
</div>