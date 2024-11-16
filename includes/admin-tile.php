<tr>
  <td>
    <img src="../public/uploads/movies" alt="Movie Poster">
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
  <td>
    <a href="/admin/movies/edit?<?php echo http_build_query(array(
      'id' => $records['id'])) ?>">Edit</a>
    <!-- <a>edit</a> -->
  <td>
</tr>
