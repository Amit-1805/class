<?php
session_start();

if ($_SESSION["fidx"] == "" || $_SESSION["fidx"] == NULL) {
    header('Location:facultylogin');
}

$userid = $_SESSION["fidx"];
$fname = $_SESSION["fname"];
?>
<?php include('fhead.php'); ?>

<style>
    .button-container {
        display: flex;
        flex-wrap: wrap; /* Allow buttons to wrap to the next line */
        gap: 15px; /* Space between buttons */
        margin-top: 20px;
        justify-content: flex-start; /* Align buttons to the left */
    }

    .btn-custom {
        font-size: 14px; /* Smaller text */
        padding: 10px 20px; /* Adjust padding for better spacing */
        border-radius: 8px; /* Slightly rounded corners */
        font-weight: bold;
        transition: all 0.3s ease-in-out;
        white-space: nowrap; /* Prevent text wrapping inside buttons */
    }

    .btn-custom:hover {
        transform: scale(1.05); /* Slight zoom on hover */
    }

    .btn-primary {
        background-color: rgb(140, 220, 252);
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .btn-danger:hover {
        background-color: #a71d2a;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12"> <!-- Increased column width -->
            <h3>Welcome Faculty: <a href="welcomefaculty.php"><span style="color:#FF0004"><?php echo $fname; ?></span></a></h3>
            
            <div class="button-container">
                <a href="mydetailsfaculty.php?myfid=<?php echo $userid; ?>">
                    <button type="submit" class="btn btn-primary btn-custom">📋 My Details</button>
                </a>

                <a href="viewstudentdetails.php">
                    <button type="submit" class="btn btn-primary btn-custom">👩‍🎓 Student Details</button>
                </a>

                <a href="assessment.php">
                    <button type="submit" class="btn btn-primary btn-custom">📝 Assessment</button>
                </a>

                <a href="examDetails.php">
                    <button type="submit" class="btn btn-primary btn-custom">📊 Make Result</button>
                </a>

                <a href="resultdetails.php">
                    <button type="submit" class="btn btn-primary btn-custom">✏️ Edit Result</button>
                </a>

                <a href="qureydetails.php">
                    <button type="submit" class="btn btn-primary btn-custom">❓ Query</button>
                </a>

                <a href="videos.php">
                    <button type="submit" class="btn btn-primary btn-custom">🎥 Videos</button>
                </a>


            </div>
        </div>
    </div>
</div>

<?php include('allfoot.php'); ?>
