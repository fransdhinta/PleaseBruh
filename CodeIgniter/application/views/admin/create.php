
    <div id="container">
    <h1>Biodata Saya dari Array</h1>
      
  <?php echo form_open_multipart('admin/inputData');?>
    <div class="form-group">
      <label for="id">Id:</label>
      <input type="text" class="form-control" id="id" name="id">
    </div>
    <div class="form-group">
      <label for="pwd">Author:</label>
      <input type="text" class="form-control" id="pwd" name="author">
    </div>
    <div class="form-group">
      <label for="date">Date:</label>
      <input type="date" class="form-control" id="date" name="date">
    </div>
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
      <label for="content">Content:</label>
      <input type="text" class="form-control" id="content" name="content">
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" name="image" id="image">
    </div>
    <div class="form-group">
      <input type="submit" value="Submit" name="submit">
    </div>  
  </form>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>