
    <div id="container">
    <h1>Biodata Saya dari Array</h1>
      
    <div id="body">
        <h2><?php 
                  $no = $this->uri->segment('3') + 1;
                  foreach ($blog_array as $key) {
            ?>
                <?php 
                $this->load->helper('html');
                  $increment = 3;
                  if ($increment % 3 == 0) 
                  { ?>
                         <div class='container'>    
                         <div class='row'>
                  <?php       
                  }        
                  
                    echo "<div class='col-sm-4'>
                          <div class='panel panel-primary'>
                            <div class='panel-heading'>".$key['title']."</input></div>
                            <div class='panel-body'><img src='".base_url()."uploads/".$key['image_file']."' class='img-responsive' style='width:100%; height: 200px'></div>
                            <div class='panel-heading'> ".$key['author']."</input></div>
                            <div class='panel-footer'><input type='submit' value='Open'></input></div>
                          </div>
                          </div>";

                  $increment = $increment + 1;

                  if ($increment % 3 == 0) 
                  {
                    echo "</br>";
                  }
                ?>
          <?php } ?></h2>

          <?php echo $this->pagination->create_links(); ?>
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>