<?php
session_start();

if (!isset($_SESSION["fidx"]) || $_SESSION["fidx"] == "") {
    header('Location: facultylogin.php');
    exit();
}

$userid = $_SESSION["fidx"];
$fname = isset($_SESSION["fname"]) ? $_SESSION["fname"] : "";
$lname = isset($_SESSION["lname"]) ? $_SESSION["lname"] : "";

// Ensure substr() only runs on non-empty values
$initials = "";
if (!empty($fname)) {
    $initials .= strtoupper(substr($fname, 0, 1));
}
if (!empty($lname)) {
    $initials .= strtoupper(substr($lname, 0, 1));
}

include('fhead.php');
?>
<style>
    body {
        background-color: #f8f9fa;
    }
    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        background: white;
        padding: 20px;
        margin-top: 20px;
        position: relative;
    }
    .card h3 {
        text-align: center;
        color: #343a40;
    }
    /* Profile Icon */
    .profile-container {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        background: #007bff;
        color: white;
        font-size: 20px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }
    .table {
        background-color: white;
    }
    .btn-edit {
        width: 100%;
        font-size: 16px;
    }
    .highlight {
        color: red;
        font-weight: bold;
    }
</style>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3> Welcome Faculty: <a href="welcomefaculty.php">
                    <span style="color:#FF0004"><?php echo htmlspecialchars($fname); ?></span></a>
                </h3>
                <div class="profile-container"><?php echo htmlspecialchars($initials); ?></div>
            </div>

            <?php
            include('database.php');

            if (!isset($_REQUEST['myfid']) || empty($_REQUEST['myfid'])) {
                echo "<p style='color: red;'>Error: Faculty ID not provided.</p>";
            } else {
                $varid = mysqli_real_escape_string($connect, $_REQUEST['myfid']);

                // ✅ Fixed table name (facultytable instead of facutlytable)
                $sql = "SELECT * FROM facutlytable WHERE FID='$varid'";
                $result = mysqli_query($connect, $sql);

                // ✅ Debugging: Check for errors in the query
                if (!$result) {
                    die("<p style='color: red;'>Error in query: " . mysqli_error($connect) . "</p>");
                }

                if (mysqli_num_rows($result) == 0) {
                    echo "<p style='color: red;'>No faculty details found.</p>";
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <fieldset>
                            <legend>My Details</legend>
                            <table class="table table-hover">
                                <tr><td><strong>ID:</strong></td><td><?php echo htmlspecialchars($row['FID']); ?></td></tr>
                                <tr><td><strong>Name:</strong></td><td><?php echo htmlspecialchars($row['FName']); ?></td></tr>
                                <tr><td><strong>Father's Name:</strong></td><td><?php echo htmlspecialchars($row['FaName']); ?></td></tr>
                                <tr><td><strong>Address:</strong></td><td><?php echo htmlspecialchars($row['Addrs']); ?></td></tr>
                                <tr><td><strong>Gender:</strong></td><td><?php echo htmlspecialchars($row['Gender']); ?></td></tr>
                                <tr><td><strong>Date of Joining:</strong></td><td><?php echo htmlspecialchars($row['JDate']); ?></td></tr>
                                <tr><td><strong>City:</strong></td><td><?php echo htmlspecialchars($row['City']); ?></td></tr>
                                <tr><td><strong>Phone Number:</strong></td><td><?php echo htmlspecialchars($row['PhNo']); ?></td></tr>
                                <tr><td><strong>Password:</strong></td><td><?php echo htmlspecialchars($row['Pass']); ?></td></tr>
                                <tr>
                                    <td>
                                        <a href="updatedetailsfromfaculty.php?myfid=<?php echo htmlspecialchars($row['FID']); ?>">
                                            <button class="btn btn-info btn-sm">Edit</button>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</div>

<?php include('allfoot.php'); ?>
