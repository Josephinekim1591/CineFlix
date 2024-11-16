<tr>
  <td>

    <!-- <img src="public/images/placeholder.jpg" alt="Movie Poster" > -->
    <img src="<?php htmlspecialchars($url_path.$id."."."jpg");?>" alt="Movie Poster">
  </td>
  <td>
    <?php echo htmlspecialchars($movie_name); ?>
  </td>
  <td>
    <?php echo htmlspecialchars($director); ?>
  </td>
  <td>
    <?php echo htmlspecialchars($release_year); ?>
  </td>
  <td>
    <?php echo htmlspecialchars($rating); ?>
  </td>
  <td>
    <?php echo htmlspecialchars($genre); ?>
  </td>
  <td>
    <?php echo htmlspecialchars($descript); ?>
  </td>
</tr>
