<?php
session_start();
if (!isset($_SESSION["fidx"]) || $_SESSION["fidx"] == "") {
    header('Location: facultylogin.php');
    exit();
}

$userid = $_SESSION["fidx"];
$fname = $_SESSION["fname"];
include('fhead.php');
include('database.php');

if (!isset($_GET['editassid'])) {
    echo "<div class='alert alert-danger'>No video selected for editing.</div>";
    exit();
}

$make = intval($_GET['editassid']); // Ensure it's an integer
$sql = "SELECT * FROM video WHERE V_id = $make";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "<div class='alert alert-danger'>Video not found.</div>";
    exit();
}

if (isset($_POST['update'])) {
    $V_Title = mysqli_real_escape_string($connect, $_POST['V_Title']);
    $V_Url = mysqli_real_escape_string($connect, $_POST['V_Url']);
    $V_Remarks = mysqli_real_escape_string($connect, $_POST['V_Remarks']);

    $update_sql = "UPDATE video SET V_Title='$V_Title', V_Url='$V_Url', V_Remarks='$V_Remarks' WHERE V_id=$make";
    if (mysqli_query($connect, $update_sql)) {
        echo "<div class='alert alert-success'>Video updated successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error updating video: " . mysqli_error($connect) . "</div>";
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Welcome Faculty: <a href="welcomefaculty.php"><span style="color:#FF0004"><?php echo htmlspecialchars($fname); ?></span></a></h3>

            <fieldset>
                <legend>Update Video</legend>
                <form action="" method="POST">
                    <table class="table table-hover">
                        <tr>
                            <td><strong>Video ID</strong></td>
                            <td><?php echo $row['V_id']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Video Title</strong></td>
                            <td><input type="text" name="V_Title" value="<?php echo htmlspecialchars($row['V_Title']); ?>" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td><strong>Video URL</strong></td>
                            <td><input type="url" name="V_Url" value="<?php echo htmlspecialchars($row['V_Url']); ?>" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td><strong>Video Description</strong></td>
                            <td><textarea name="V_Remarks" class="form-control" rows="4" required><?php echo htmlspecialchars($row['V_Remarks']); ?></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button type="submit" name="update" class="btn btn-primary">Update</button></td>
                        </tr>
                    </table>
                </form>
            </fieldset>
        </div>
    </div>
</div>

<?php
mysqli_close($connect);
include('allfoot.php');
?>
