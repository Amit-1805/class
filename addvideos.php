<?php
session_start();

// Check if faculty is logged in
if (!isset($_SESSION["fidx"]) || $_SESSION["fidx"] == "") {
    header('Location: facultylogin.php');
    exit();
}

$userid = $_SESSION["fidx"];
$fname = $_SESSION["fname"];

include('fhead.php'); 
include("database.php"); 

// Handle form submission
if (isset($_POST['submit'])) {
    $title = $_POST['videotitle'];
    $v_url = $_POST['VideoURL'];
    $v_info = $_POST['Videoinfo'];

    // Use prepared statements to prevent SQL errors and injection
    $sql = "INSERT INTO `Video` (`V_Title`, `V_Url`, `V_Remarks`) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($connect, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $title, $v_url, $v_info);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "<center>
                    <div class='alert alert-success fade in' style='margin-top:10px;'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
                        <strong><h3 style='margin-top: 10px; margin-bottom: 10px;'>Video added successfully.</h3></strong>
                    </div>
                  </center>";
        } else {
            echo "<center>
                    <div class='alert alert-danger fade in' style='margin-top:10px;'>
                        <strong><h3 style='margin-top: 10px; margin-bottom: 10px;'>Error: " . mysqli_error($connect) . "</h3></strong>
                    </div>
                  </center>";
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "<center>
                <div class='alert alert-danger fade in' style='margin-top:10px;'>
                    <strong><h3 style='margin-top: 10px; margin-bottom: 10px;'>Error preparing statement: " . mysqli_error($connect) . "</h3></strong>
                </div>
              </center>";
    }
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3> Welcome Faculty : <a href="welcomefaculty.php"><span style="color:#FF0004"> <?php echo htmlspecialchars($fname); ?></span></a> </h3>

            <fieldset>
                <legend>Add Videos</legend>
                <form action="" method="POST">
                    <table class="table table-hover">
                        <tr>
                            <td><strong>Video Title</strong></td>
                            <td><input type="text" name="videotitle" required></td>
                        </tr>
                        <tr>
                            <td><strong>Video URL</strong></td>
                            <td><textarea name="VideoURL" rows="1" cols="150" required></textarea></td>
                        </tr>
                        <tr>
                            <td><strong>Video Description</strong></td>
                            <td><textarea name="Videoinfo" rows="5" cols="150" required></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button type="submit" name="submit" class="btn btn-primary">Add Video</button></td>
                        </tr>
                    </table>
                </form>
            </fieldset>
        </div>
    </div>
</div>

<?php include('allfoot.php'); ?>
