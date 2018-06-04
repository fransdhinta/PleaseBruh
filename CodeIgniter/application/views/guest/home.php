
    <div id="container">
    <h1>Biodata Saya dari Array</h1>
      
    <div id="body">
        <h2><?php foreach ($biodata_array as $key) {
            ?>
            <tr>
              <td><?php echo $key['nama']?></td>
            </tr>
            <tr>
              <td><?php echo $key['nim']?></td>
            </tr>
            <tr>
              <td><?php echo $key['alamat']?></td>
            </tr>
          <?php } ?></h2>
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>