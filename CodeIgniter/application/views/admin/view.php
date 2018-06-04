
    <table class="table table-striped table-bordered data">
          <thead>
            <tr>      
              <th>ID</th>
              <th>Author</th>
              <th>Date</th>
              <th>Title</th>
              <th>Content</th>
              <th>Image</th>
              <th style="text-align: center;">Edit</font></th>
              <th style="text-align: center;">Delete</font></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($datablog as $key) {?>
            <tr>        
              <td><?php echo $key['id']; ?></td>
              <td><?php echo $key['author']; ?></td>
              <td><?php echo $key['date']; ?></td>
              <td><?php echo $key['title']; ?></td>
              <td><?php echo $key['content']; ?></td>
              <td><?php echo $key['image_file']; ?></td>
              <td>
                <form action="" method="post">
                  <input type="hidden" name= "edit" class="form-control" value="<?php echo $key['id']; ?>">
                  <button class="btn btn-warning">Edit</button>
                </form>
              </td>
              <td>
                <form action="" method="post">
                  <input type="hidden" name= "delete" class="form-control" value="<?php echo $key['id']; ?>">
                  <button class="btn btn-danger" onclick="return confirm('yakin akan menghapus <?php echo $key['author']?> ?')">Delete</button>
                </form>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

<script>
$(document).ready( function () {
    $('.data').DataTable();
} );
</script>


    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>