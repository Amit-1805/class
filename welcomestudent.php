<?php
session_start();

if ($_SESSION["sidx"] == "" || $_SESSION["sidx"] == NULL) {
    header('Location:studentlogin');
}

$userid = $_SESSION["sidx"];
$userfname = $_SESSION["fname"];
$sEno = $_SESSION["seno"];
$userlname = $_SESSION["lname"];
?>
<?php include('studenthead.php'); ?>

<style>
    .button-container {
        display: flex;
        justify-content: flex-start; /* Align buttons to the left */
        flex-wrap: nowrap; /* Keep buttons in one line */
        gap: 10px; /* Space between buttons */
        margin-top: 20px;
        overflow-x: auto; /* Enable horizontal scrolling if needed */
        padding-bottom: 10px;
    }

    .btn-custom {
        font-size: 14px; /* Smaller text */
        padding: 8px 15px; /* Smaller button */
        border-radius: 8px; /* Slightly rounded corners */
        font-weight: bold;
        transition: all 0.3s ease-in-out;
        white-space: nowrap; /* Prevent text wrapping */
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
<h2>Welcome, <span style="color:red"><?php echo $userfname." ".$userlname; ?></span></h2>
    <div class="button-container">
		
        <a href="mydetailsstudent.php?myds=<?php echo $userid; ?>">
            <button class="btn btn-primary btn-custom">📋 My Details</button>
        </a>

        <a href="takeassessment.php?seno=<?php echo $sEno; ?>">
            <button class="btn btn-primary btn-custom">📝 Take Assessment</button>
        </a>

        <a href="viewresult.php?seno=<?php echo $sEno; ?>">
            <button class="btn btn-primary btn-custom">📊 View Result</button>
        </a>

        <a href="viewquery.php?eid=<?php echo $userid; ?>">
            <button class="btn btn-primary btn-custom">❓ My Queries</button>
        </a>

        <a href="askquery.php?eid=<?php echo $userid; ?>">
            <button class="btn btn-primary btn-custom">✍️ Ask Query</button>
        </a>

        <a href="viewvideos.php?eid=<?php echo $userid; ?>">
            <button class="btn btn-primary btn-custom">🎥 Videos (E-Learn)</button>
        </a>


    </div>
</div>

<?php include('allfoot.php'); ?>
