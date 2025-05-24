<?php
session_start();

if ($_SESSION["sidx"] == "" || $_SESSION["sidx"] == NULL) {
    header('Location:studentlogin');
}

$userid = $_SESSION["sidx"];
$userfname = $_SESSION["fname"];
$userlname = $_SESSION["lname"];

// Get the first letter of First Name and Last Name
$initials = strtoupper(substr($userfname, 0, 1) . substr($userlname, 0, 1));
?>
<?php include('studenthead.php'); ?>

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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- Profile Initials in the Top-Right Corner -->
                <div class="profile-container">
                    <?php echo $initials; ?>
                </div>

                <h3>Welcome, <a href="welcomestudent"><span class="highlight"><?php echo $userfname . " " . $userlname; ?></span></a></h3>
                
                <?php
                include('database.php');
                $varid = $_REQUEST['myds'];
                $sql = "SELECT * FROM studenttable WHERE Eid='$varid'";
                $result = mysqli_query($connect, $sql);

                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <fieldset>
                        <legend><strong>My Details</strong></legend>
                        <table class="table table-bordered">
                            <tr>
                                <td><strong>Enrolment Number:</strong></td>
                                <td><?php echo $row['Eno']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>First Name:</strong></td>
                                <td><?php echo $row['FName']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Last Name:</strong></td>
                                <td><?php echo $row['LName']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Father's Name:</strong></td>
                                <td><?php echo $row['FaName']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Address:</strong></td>
                                <td><?php echo $row['Addrs']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Gender:</strong></td>
                                <td><?php echo $row['Gender']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Course:</strong></td>
                                <td><?php echo $row['Course']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Date of Birth:</strong></td>
                                <td><?php echo $row['DOB']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Phone Number:</strong></td>
                                <td><?php echo $row['PhNo']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td><?php echo $row['Eid']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Password:</strong></td>
                                <td><?php echo $row['Pass']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="updatedetailsfromstudent.php?eno=<?php echo $row['Eno']; ?>" class="btn btn-info btn-sm btn-edit">Edit</a>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include('allfoot.php'); ?>
