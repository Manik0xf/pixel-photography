<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .nav-tabs {
            margin-bottom: 20px;
        }
        .tab-content {
            border: 1px solid #ddd;
            border-top: 0;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Admin Panel</h1>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="gallery-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="gallery" aria-selected="false">Gallery</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form id="home-form">
                    <div class="form-group">
                        <label for="home-description">Description</label>
                        <textarea class="form-control" id="home-description" rows="5" placeholder="Enter description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                <form id="gallery-form" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <label for="gallery-upload">Upload Photo</label>
                        <input type="file" class="form-control-file" id="gallery-upload" name="image">
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- <script>
        document.getElementById('home-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const description = document.getElementById('home-description').value;
            alert('Home description updated: ' + description);
        });

        document.getElementById('gallery-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const fileInput = document.getElementById('gallery-upload');
            if (fileInput.files.length > 0) {
                alert('Photo uploaded: ' + fileInput.files[0].name);
            } else {
                alert('Please select a photo to upload.');
            }
        });
    </script> -->
</body>
</html>
<?php
include 'connection.php';
if(isset($_POST['submit']))
{
if(isset($_FILES['image'])){
    $image =$_FILES['image'];
    $fileName = $image['name'];
    $size = $image['size'];
    $fileTemp = $image['tmp_name'];
    $type = $image['type'];
    echo"<br>";
    $size_converted = $size/1048576 ;
    $date = date("Y-m-d-H-i-s");
    
    // print_r($_FILES);
    $extension= pathinfo($image["name"], PATHINFO_EXTENSION);
    $newfilename = $date.".".$extension;
    if($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg")
    {
        if($size_converted<5)
        {
        move_uploaded_file($fileTemp,'images/'.$newfilename);
         $query = "insert into image(img_name) values('$newfilename')";
         echo"File uploaded successfully";
    }
    else{
        
        die("Error: File is too large");
    }
    }
    else{
        die("Error: File is not supported");
       
    }
       
}
else{
    echo"no files";
}
$res = mysqli_query($conn,$query);



}

?>