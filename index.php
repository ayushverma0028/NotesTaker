<?php

$insert = false;
$update = false;
$delete = false;
include 'partials/dbconnect.php';
include 'partials/editModal.php';

if(isset($_GET['delete'])){
    // Delete the record
    $s_no = $_GET['delete'];
    $sql = "DELETE FROM `notes` WHERE `S_No.`='$s_no'";
    $result = mysqli_query($conn, $sql);
    $delete = true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])) {
        // Update the record
        $title = $_POST['titleEdit'];
        $desc = $_POST['descEdit'];
        $s_no = $_POST['snoEdit'];

        $sql = "UPDATE `notes` SET `title` = '$title', `description` = '$desc' WHERE `notes`.`S_No.` = '$s_no'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $update = true;
        }
    } else {
        $tilte = $_POST['title'];
        $desc = $_POST['desc'];
        // Insert the record
        $sql = "INSERT INTO notes (title, description) VALUES ('$tilte', '$desc')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $insert = true;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NotesTaker</title>
</head>

<body>
    <?php include 'partials/navbar.php';
    if ($insert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your note has been added successfully!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if ($update) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your note has been updated successfully!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if ($delete) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your note has been deleted successfully!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>



    <div class="container mt-4 col-sm-6">
        <h1>Now Add Your Notes By NotesTaker :)</h1><br>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Add Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Type Notes title here...">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Add Description</label>
                <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="Type Notes desc here..."></textarea>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Add a Note">
        </form>
    </div>
    <div class="container my-4">

        <!-- Data Tables -->
        <table class="table" id="myTable">
            <thead>
                <tr class="bg-dark table-dark" >
                    <th scope="col">S_No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                // Fetch the data
                $sql = "SELECT * FROM `notes`";
                $result = mysqli_query($conn, $sql);
                $sno = 0;
                while ($rows = mysqli_fetch_assoc($result)) {
                    $sno = $sno + 1;
                    echo "
                            <tr>
                            <th scope='row'>" . $sno . "</th>
                            <td>" . $rows['title'] . "</td>
                            <td>" . $rows["description"] . "</td>
                            <td>  <button class='btn btn btn-primary edit' id=" . $rows['S_No.'] . " data-bs-toggle='modal' data-bs-target='#editModal'><i class='fa fa-edit'></i></button> <button class='delete btn  btn-primary' id=d" . $rows['S_No.'] . "><i class='fa fa-trash'></i></button></td>
                            </tr>";
                }
                ?>

            </tbody>
        </table>
    </div>
                <!-- Edit Modal Logic -->
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                tr = e.target.parentNode.parentNode;
                title = tr.getElementsByTagName("td")[0].innerText;
                desc = tr.getElementsByTagName("td")[1].innerText;
                console.log(title, desc, e.target.id);
                descEdit.value = desc;
                titleEdit.value = title;
                snoEdit.value = e.target.id;
            })
        })
        // Delete Modal Logic
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                s_no = e.target.id.substr(1,);
                if(confirm("Are you sure. You want to delete this data")){
                    console.log('yes');
                    window.location = `/phpAyush/CRUD_App/index.php?delete=${s_no}`;
                }
                else{
                    console.log('No');
                }
            })
        })
    </script>
</body>

</html>