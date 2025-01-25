<?php include './db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery APP</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
</head>
<body>
    <div class="container">
        <h1>Photo Gallery</h1>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Photo title" required>
            <input type="file" name="image" accept="image/*" required>
            <button type="submit">Upload</button>
        </form>
        <hr>

        <div>
             <?php
                $result = $conn->query("SELECT * FROM photos ORDER BY created_at DESC");
                if($result->num_rows > 0):
                    while($row = $result->fetch_assoc()):
                ?>
            <div>
                <h2><?php echo $row['title']; ?></h2>
                <img src="<?= $row['image_path'] ?>" alt="image" width="200px">
                <form action="delete.php" method="POST">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </div>
            <?php
                endwhile;
            else:
                echo "No photos uploaded yet!";
            endif;
            ?>
        </div>
        <!-- Photo Gallery Section End -->

    </div>
</body>
</html>