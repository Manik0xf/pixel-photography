<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .nav-tabs {
      margin-bottom: 20px;
    }

    .tab-content {
      padding: 20px;
      border: 1px solid #dee2e6;
      border-top: none;
      background-color: white;
    }
   
  .logout-btn-container {
    justify-content: center;
    align-items: end;
    margin-top: 20px;
  }

  @keyframes blink {
    0% {
      background-color: #0d6efd; /* Original primary color */
    }
    50% {
      background-color: #ff0000; /* Blinking red color */
    }
    100% {
      background-color: #0d6efd; /* Original primary color */
    }
  }

  .logout-btn:hover {
    animation: blink 1s infinite;
  }
</style>

  </style>
</head>

<body>
  <div class="container mt-5">
    <h1 class="text-center">Admin Panel</h1>

    <?php
    session_start();
    include 'connection.php';

    // Check if user is logged in
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
      // Redirect to login page if not logged in
      header("Location: login.php");
      exit;
    }

    ?>

    <ul class="nav nav-tabs" id="adminTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
          role="tab" aria-controls="home" aria-selected="true">Home</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="gallery-tab" data-bs-toggle="tab" data-bs-target="#gallery" type="button"
          role="tab" aria-controls="gallery" aria-selected="false">Gallery</button>
      </li>
    </ul>

    <div class="tab-content" id="adminTabsContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <form method="post">
          <div class="mb-3">
            <label for="homeTitle" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="homeTitle" placeholder="Enter home page title">
          </div>
          <div class="mb-3">
            <label for="homeDescription" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="homeDescription" rows="5"
              placeholder="Enter home page description"></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="home">Update</button>
        </form>

        <?php
        // Handle form submission for updating home section
        if (isset($_POST['home'])) {
          $title = $_POST['title'];
          $description = $_POST['description'];
          $query2 = "UPDATE home SET title = '$title', Description = '$description' WHERE textid = 1;";
          $home = mysqli_query($conn, $query2);
          if ($home) {
            echo '<div class="alert alert-success mt-3">Home section updated successfully.</div>';
          } else {
            echo '<div class="alert alert-danger mt-3">Error updating home section.</div>';
          }
        }
        ?>
          <div class="logout-btn-container">
  <a href="logout.php" class="btn btn-primary logout-btn">Logout</a>
</div>
      </div>

      <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="galleryFile" class="form-label">Upload Files</label>
            <input type="file" class="form-control" id="galleryFile" name="image[]" multiple>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          <div class="mb-3">
            <label for="category" class="form-label">Select Category</label>
            <select class="form-control" id="category" name="category">
              <option value="Portrait">Portrait</option>
              <option value="Nature">Nature</option>
              <option value="Product">Product</option>
              <option value="Wedding">Wedding</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        </form>
        <?php
      include 'connection.php';

      // Handle image upload
      if (isset($_POST['submit'])) {
        if (isset($_FILES['image']) && isset($_POST['category'])) {
          $uploaded = [];
          $errors = [];
          $category = mysqli_real_escape_string($conn, $_POST['category']);

          // Loop through each uploaded file
          foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['image']['name'][$key];
            $file_size = $_FILES['image']['size'][$key];
            $file_tmp = $_FILES['image']['tmp_name'][$key];
            $file_type = $_FILES['image']['type'][$key];
            $file_error = $_FILES['image']['error'][$key];

            // Check for errors
            if ($file_error !== UPLOAD_ERR_OK) {
              $errors[] = "Error uploading $file_name";
              continue;
            }

            // Validate file type
            $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
            if (!in_array($file_type, $allowed_types)) {
              $errors[] = "Unsupported file type: $file_name";
              continue;
            }

            // Limit file size
            $max_size = 5 * 1024 * 1024; // 5MB
            if ($file_size > $max_size) {
              $errors[] = "File size exceeds limit: $file_name";
              continue;
            }

            // Move uploaded file
            $target_dir = 'images/';
            $target_file = $target_dir . basename($file_name);

            if (move_uploaded_file($file_tmp, $target_file)) {
              $uploaded[] = $file_name;
              $query = "INSERT INTO image (img_name, category) VALUES (?, ?)";
              if ($stmt = mysqli_prepare($conn, $query)) {
                mysqli_stmt_bind_param($stmt, "ss", $file_name, $category);
                mysqli_stmt_execute($stmt);
                if (mysqli_stmt_affected_rows($stmt) == 0) {
                  $errors[] = "Error inserting $file_name into database";
                }
                mysqli_stmt_close($stmt);
              } else {
                $errors[] = "Database query failed: " . mysqli_error($conn);
              }
            } else {
              $errors[] = "Error moving $file_name to directory";
            }
          }

          // Output success or errors
          if (!empty($uploaded)) {
            echo '<div class="alert alert-success mt-3">Files uploaded successfully: ' . implode(', ', $uploaded) . '</div>';
          }
          if (!empty($errors)) {
            echo '<div class="alert alert-danger mt-3">' . implode('<br>', $errors) . '</div>';
          }
        }
      }

      // Close the connection
      mysqli_close($conn);
      ?>
        <div class="logout-btn-container">
  <a href="logout.php" class="btn btn-primary logout-btn">Logout</a>
</div>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>
