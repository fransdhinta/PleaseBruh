
    <div id="container">
    <h1>Tambah User</h1>
      
  <?php echo form_open_multipart('admin/inputUser');?>
    
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" name="username">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="text" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
      <label for="email">E-mail:</label>
      <input type="text" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
      <input type="submit" value="Submit" name="submit">
    </div>  
  </form>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>