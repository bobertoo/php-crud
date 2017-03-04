<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{
    $id = $_POST['id'];

    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];

    // checking empty fields
    if(empty($first_name) || empty($last_name)) {
        if(empty($first_name)) {
            echo "<font color='red'>First name field is empty.</font><br/>";
        }

        if(empty($last_name)) {
            echo "<font color='red'>Last name field is empty.</font><br/>";
        }

    } else {
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE users SET first_name='$first_name',last_name='$last_name' WHERE id=$id");

        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $first_name = $res['first_name'];
    $last_name = $res['last_name'];
}
?>
<html>
<head>
    <title>Edit Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>

    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>First name</td>
                <td><input type="text" name="first_name" value="<?php echo $first_name;?>"></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="last_name" value="<?php echo $last_name;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
