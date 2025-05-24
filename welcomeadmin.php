<?php
// Database connection using MySQLi
$server = "localhost";
$user = "root";
$passdb = "";
$dbname = "cc_db";

$connect = mysqli_connect($server, $user, $passdb, $dbname);

// Check connection
if (!$connect) {
    die("Connection Error: " . mysqli_connect_error());
}

// Fetch total number of students
$resultStudents = mysqli_query($connect, "SELECT COUNT(*) AS student_count FROM studenttable");
$rowStudents = mysqli_fetch_assoc($resultStudents);
$totalStudents = $rowStudents['student_count'] ?? 0;

// Fetch total number of faculty
$resultFaculty = mysqli_query($connect, "SELECT COUNT(*) AS faculty_count FROM facutlytable");
$rowFaculty = mysqli_fetch_assoc($resultFaculty);
$totalFaculty = $rowFaculty['faculty_count'] ?? 0;

// Fetch total users (students + faculty)
$totalUsers = $totalStudents + $totalFaculty;

?>

<!DOCTYPE HTML>
<?php include('adminhead.php'); ?>

<style>
    .card-container {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 20px;
    }

    .info-card {
        width: 250px;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        box-shadow: 2px 2px 15px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        transition: transform 0.3s ease-in-out;
        text-decoration: none;
    }

    .info-card:hover {
        transform: scale(1.05);
    }

    .students {
        background: #cce5ff;
        color: #004085;
    }

    .faculty {
        background: #d4edda;
        color: #155724;
    }

    .users {
        background: #e2e3e5;
        color: #383d41;
    }

    .active-users {
        background: #d1ecf1;
        color: #0c5460;
        pointer-events: none; /* Prevent clicking */
    }

    .visitors {
        background: #fff3cd;
        color: #856404;
        pointer-events: none; /* Prevent clicking */
    }

    .emoji {
        font-size: 40px;
        display: block;
        margin-bottom: 10px;
    }
</style>

<div class="container">
    <h3>Welcome <a href="welcomeadmin">Admin</a></h3>

    <!-- Card Container -->
    <div class="card-container">
        <!-- Students Count Card -->
        <a href="studentdetails" class="info-card students">
            <span class="emoji">🎓</span>
            Students: <br> 
            <span id="studentCount"><?php echo htmlspecialchars($totalStudents); ?></span>
        </a>

        <!-- Faculty Count Card -->
        <a href="facultydetails" class="info-card faculty">
            <span class="emoji">👩‍🏫</span>
            Faculty: <br> 
            <span id="facultyCount"><?php echo htmlspecialchars($totalFaculty); ?></span>
        </a>

        <!-- Total Users Card -->
        <a href="userdetails" class="info-card users">
            <span class="emoji">👤</span>
            Total Users: <br> 
            <span id="userCount"><?php echo htmlspecialchars($totalUsers); ?></span>
        </a>

        <!-- Active Users (Randomly Changing) -->
        <div class="info-card active-users">
            <span class="emoji">🔵</span>
            Active Users: <br> 
            <span id="activeUserCount">0</span>
        </div>

        <!-- Visitors Count Card (Non-clickable) -->
        <div class="info-card visitors">
            <span class="emoji">👀</span>
            Visitors: <br> 
            <span id="visitorCount">100</span>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let visitorCount = localStorage.getItem("visitorCount") || 1000;
        visitorCount = parseInt(visitorCount);

        function updateVisitorCount() {
            visitorCount++;
            document.getElementById("visitorCount").textContent = visitorCount;
            localStorage.setItem("visitorCount", visitorCount);
        }

        // Increase visitor count every 3 seconds
        setInterval(updateVisitorCount, 3000);

        // Active Users Random Change
        function updateActiveUsers() {
            let minActive = Math.floor(<?php echo $totalUsers; ?> * 0.3);
            let maxActive = Math.floor(<?php echo $totalUsers; ?> * 0.8);
            let activeUsers = Math.floor(Math.random() * (maxActive - minActive) + minActive);
            document.getElementById("activeUserCount").textContent = activeUsers;
        }

        // Change Active Users count every 5 seconds
        setInterval(updateActiveUsers, 5000);
        updateActiveUsers();
    });
</script>

<?php include('allfoot.php'); ?>
