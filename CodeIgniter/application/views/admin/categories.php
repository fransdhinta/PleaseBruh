
    <div id="container">
    <h1>Buat Kategori Baru</h1>
      
  <?php echo form_open_multipart('admin/inputCategories');?>
    <div class="form-group">
      <label for="cat_name">Nama Kategori:</label>
      <input type="text" class="form-control" id="cat_name" name="cat_name" value="<?php echo set_value('cat_name') ?>" required>
    </div>
    <div class="form-group">
      <label for="cat_desc">Deskrispi:</label>
      <input type="text" class="form-control" id="cat_description" name="cat_description" value="<?php echo set_value('cat_description') ?>" required>
    </div>
    <div class="form-group">
      <input type="submit" value="Submit" name="submit">
    </div>  
  </form>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>