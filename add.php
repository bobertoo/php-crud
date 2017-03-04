<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
        
    // checking empty fields
    if(empty($first_name) || empty($last_name)) {                
        if(empty($first_name)) {
            echo "<font color='red'>First name field is empty.</font><br/>";
        }
        
        if(empty($last_name)) {
            echo "<font color='red'>Last name field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO users(first_name,last_name) VALUES('$first_name','$last_name')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>
