<?php
if (!is_user_logged_in()) {
    // User is not logged in, redirect to login page
    header("Location: /admin");
    exit();
  }

$page_title = 'Admin Edit';

$movie_id = $_GET['id'] ?? NULL;
$edit_details = $_POST['submit'];


if ($movie_id) {
    $movie_query = "SELECT * FROM movies WHERE id = :movie_id";
    $movie_details = exec_sql_query($db, $movie_query, array(":movie_id" => $movie_id))->fetchAll();
    $movie_detail = $movie_details[0] ?? null;
    $tags_query = "SELECT tags.tag
    FROM tags
    INNER JOIN movie_tags ON tags.id = movie_tags.tag_id
    WHERE movie_tags.movie_id = :id";

// get tags
$tags = exec_sql_query($db, $tags_query, array(":id"=>$movie_id ))->fetchAll();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $movie_id) {
    $movie_name = $_POST['movie_name'];
    $director = $_POST['director'];
    $release_year = $_POST['release_year'];
    $rating = $_POST['rating'];
    $genre = $_POST['genre'];
    $descript = $_POST['descript'];

    $update_query = "UPDATE movies SET movie_name = ?, director = ?, release_year = ?, rating = ?, genre = ?, descript = ? WHERE id = ?";
    exec_sql_query($db, $update_query, array($movie_name, $director, $release_year, $rating, $genre, $descript, $movie_id));

    $upload = $_FILES['new_poster'];
    if ($upload['error'] == UPLOAD_ERR_OK) {
        $upload_file_ext = strtolower(pathinfo($upload['name'], PATHINFO_EXTENSION));
        $new_file_path = "public/uploads/movies/{$movie_id}.{$upload_file_ext}";
        move_uploaded_file($upload['tmp_name'], $new_file_path);

        $update_ext_query = "UPDATE movies SET file_ext = ? WHERE id = ?";
        exec_sql_query($db, $update_ext_query, array($upload_file_ext, $movie_id));
    }

    if ($form_valid) {
        $result = exec_sql_query(
          $db,
          "INSERT INTO movies (id, file_ext, movie_name, director, release_year, genre, rating, descript) VALUES (:id, :file_ext :movie_name, :director, :release_year, :genre, :rating, :descript)",
          array(
            ":id" => $upload_id,
            ":file_ext" => $upload_file_ext,
            ":movie_name" => $upload_movie_name,
            ":director" => $upload_director,
            ":release_year" => $upload_release_year,
            ":genre" => $upload_genre,
            ":rating" => $upload_rating,
            ":descript" => $upload_descript
          )
        );
      }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/public/styles/site.css">


    <title>CineFlix</title>
</head>

<body>
    <?php
    include("includes/header.php");
    ?>
    <div class="button"><a href="/admin/movies" class="goback">&lt; Go Back</a></div>
    <main class="form-body">
        <h1>Movie Edit Form</h1>
        <form method="post" action="/admin/movies/edit?id=<?php echo $movie_id; ?>" enctype="multipart/form-data">
            <div class="form-group">
                <img src="/public/uploads/movies/<?php echo htmlspecialchars($movie_detail['id']) . '.' . htmlspecialchars($movie_detail['file_ext']); ?>" class="movie-image" alt="Current Movie Poster">
                <label for="new_poster">Upload New Poster:</label>
                <input type="file" id="new_poster" name="new_poster" accept=".jpg">
            </div>
            <div>
                <label for="movie_name">Title:</label>
                <input id="movie_name" name="movie_name" value="<?php echo htmlspecialchars($movie_detail['movie_name'] ?? ''); ?>">
            </div>
            <div>
                <label for="director">Director:</label>
                <input id="director" name="director" value="<?php echo htmlspecialchars($movie_detail['director'] ?? ''); ?>">
            </div>
            <div>
                <label for="release_year">Release Year:</label>
                <select id="release_year" name="release_year">
                    <option disabled value> -- select a year -- </option>
                    <?php
                    $years = range(date('Y'), 2010);
                    foreach ($years as $year) {
                        $selected = ($year == ($movie_detail['release_year'] ?? '')) ? 'selected' : '';
                        echo "<option value='$year' $selected>$year</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="rating">Rating:</label>
                <input id="rating" name="rating" value="<?php echo htmlspecialchars($movie_detail['rating'] ?? ''); ?>">
            </div>
            <div>
                <label for="genre">Genre:</label>
                <select id="genre" name="genre">
                    <option disabled value> -- select a genre -- </option>
                    <?php
                    $genres = ['Thriller', 'Action', 'Drama', 'Romance', 'Science Fiction', 'Comedy', 'Crime'];
                    foreach ($genres as $genre) {
                        $selected = ($genre == ($movie_detail['genre'] ?? '')) ? 'selected' : '';
                        echo "<option value='$genre' $selected>$genre</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="descript">Description:</label>
                <textarea id="descript" name="descript"><?php echo htmlspecialchars($movie_detail['descript'] ?? ''); ?></textarea>
            </div>
            <div>
                <div class="tag-container">
                    <?php
                        foreach ($tags as $tag) {
                            echo '<span class="tag">' . htmlspecialchars($tag['tag']) . '</span> ';
                        }
                    ?>
                </div>
            </div>
            <!-- Hidden input to keep track of the movie's ID -->
            <input type="hidden" name="movie_id" value="<?php echo $movie_detail['id']; ?>">
            <div class="submit-container">
                <button name = "submit" type="submit">Update Movie</button>
            </div>
        </form>
    </main>
    <?php include('includes/footer.php'); ?>
</body>

</html>
