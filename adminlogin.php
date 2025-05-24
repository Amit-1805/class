<?php include('allhead.php'); ?>

<style>/* General Styles */
body {
   
    background-color: #f0f8ff;
    font-family: 'Arial', sans-serif;
    background-image: url('webcc.jpg');
    background-size: cover;  /* Ensures it covers the full screen */
    background-position: center; /* Centers the image */
    background-repeat: no-repeat; /* Prevents repetition */
    height: 100vh; /* Full viewport height */
    margin: 0;
}

/* Container and Row Spacing */

.row{
	display: flex;
	justify-content: center; 
    align-items: center;
}
/* Form Fieldset Styling */
fieldset {
	
    border: 1px solid #87ceeb;
    padding: 15px;
    border-radius: 8px;
    background-color:rgba(251, 253, 253, 0.73) ;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 420px;
    height: 350px;
}

/* Form Legend */
legend h3 {
    color: #333;
}

/* Form Input Fields */
input[type="text"], input[type="password"] {
    border: 2px solid #87ceeb;
    border-radius: 5px;
    padding: 10px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

/* Input Focus Animation */
input[type="text"]:focus, input[type="password"]:focus {
    border-color: #00bfff;
    box-shadow: 0 0 8px rgba(0, 191, 255, 0.6);
}

/* Buttons */
.btn-primary {
    background-color: #87ceeb;
    border-color: #00bfff;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.btn-primary:hover {
    background-color: #00bfff;
    box-shadow: 0 4px 8px rgba(0, 191, 255, 0.5);
}

.btn-primary:active {
    background-color: #1e90ff;
}

/* Reset Button */
.btn-danger {
    background-color: #E52727;
    border-color: #D21B1B;
}

.btn-danger:hover {
    background-color: #d62727;
    box-shadow: 0 4px 8px rgba(255, 0, 0, 0.5);
}

/* Centering Buttons */
.center {
    text-align: center;
    margin-top: 20px;
}

/* Responsive Form */
@media (max-width: 768px) {
    .container {
        padding: 15px;
    }

    .col-md-5 {
        width: 100%;
    }

    fieldset {
        padding: 10px;
    }

    legend h3 {
        font-size: 20px;
    }

    input[type="text"], input[type="password"] {
        font-size: 14px;
    }

    .btn-primary {
        font-size: 14px;
        padding: 8px 15px;
    }
}
</style>

<div class="container">
	<div class="row">
	</div>
	<div class="row">
		<div class="col-md-5">
			<fieldset>
				<legend>
					<h3 style="padding-top: 25px;"><span class="glyphicon glyphicon-lock"></span>&nbsp;Admin Login</h3>
				</legend>
				<!-- Admin login form -->
				<form name="adminlogin" action="loginlinkadmin.php" method="POST">
					<div class="control-group form-group">
						<div class="controls">
							<label>Admin Id:</label>
							<input type="text" class="form-control" name="aid">
							<p class="help-block"></p>
						</div>
					</div>
					<div class="control-group form-group">
						<div class="controls">
							<label>Passsword:</label>
							<input type="password" class="form-control" name="apass">
							<p class="help-block"></p>
						</div>
					</div>
					<center>
						<button type="submit" name="login" class="btn btn-primary">Login</button>
						<button type="reset" class="btn btn-primary" style="
    background-color: #E52727;
    border-color: #D21B1B;">Reset</button>
					</center>
			</fieldset>
			</form>
		</div>
	</div>
	<?php include('allfoot.php'); ?>