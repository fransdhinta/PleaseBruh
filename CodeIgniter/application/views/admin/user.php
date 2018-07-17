
    <table class="table table-striped table-bordered data">
          <thead>
            <tr>      
              <th>ID</th>
              <th>Username</th>
              <th>Password</th>
              <th>Email</th>
              <th style="text-align: center;">Edit</font></th>
              <th style="text-align: center;">Delete</font></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($datauser as $key) {?>
            <tr>        
              <td><?php echo $key['id']; ?></td>
              <td><?php echo $key['username']; ?></td>
              <td><?php echo $key['password']; ?></td>
              <td><?php echo $key['email']; ?></td>
              <td>
                <form action="" method="post">
                  <a id="edit" data-toggle="modal" data-target="#detail" href="" data-id="<?php echo $key['id']; ?>" data-uname="<?php echo $key['username']; ?>" data-pwd="<?php echo $key['password']; ?>" data-email="<?php echo $key['email']; ?>">
                  <button type="button" class="btn btn-warning">Edit</button>
                  </a>
                </form>
              </td>
              <td>
                
                <form action="<?php echo site_url('admin/DeleteUser')?>" method="post">
                  <input type="hidden" name= "id" class="form-control" value="<?php echo $key['id']; ?>">
                  <button class="btn btn-danger" onclick="return confirm('yakin akan menghapus <?php echo $key['username']?> ?')">Delete</button>
                </form>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <!-- Modal Edit -->

      <div id="detail" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- konten modal-->
                    <div class="modal-content">
                      <!-- heading modal -->
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Detail</h4>
                      </div>
                      <!-- body modal -->
                      <form id="form" enctype="multipart/form-data">
                        <div class="modal-body" id="modal-detail">
                        <div class="form-group">
                            <label class="control-label" for="id">Id</label>
                            <input type="text" name="id" class="form-control" id="id" readonly>
                          </div>
                          <div class="form-group">
                            <label class="control-label" for="uname">username</label>
                            <input type="text" name="uname" class="form-control" id="uname">
                          </div>
                          <div class="form-group">
                            <label class="control-label" for="pwd">Password</label>
                            <input type="text" name="pwd" class="form-control" id="pwd">
                          </div>
                          <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email">
                          </div>
                        </div>
                      </form> 
                      <!-- footer modal -->
                      <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button> -->

                        <button type="button" class="btn btn-info btn-lg" onclick="return confirm('yakin akan mengubah?')"><a href="">Edit</a></button>
                      </div>
                    </div>
                  </div>
                </div>

<script>
$(document).ready( function () {
    $('.dataU').DataTable();
} );
</script>

<script type="text/javascript">
                  $(document).on("click", "#edit", function(){
                    var id = $(this).data('id');
                    var uname = $(this).data('uname');
                    var pwd = $(this).data('pwd');
                    var email = $(this).data('email');

                    $("#modal-detail #uname").val(uname);
                    $("#modal-detail #pwd").val(pwd);
                    $("#modal-detail #email").val(email);
                    $("#modal-detail #id").val(id);
                  })

                  $(document).ready(function(e) {
                      $("#form").on("submit", (function(e) {
                          e.preventDefault();
                          $ajax({
                            url : '',
                            type : 'post',
                            data : new FormData(this),
                            contentType : false,
                            cache : false,
                            processData : false,
                            success :function(msg) {
                                $('.table').html(msg);
                            }
                          });
                      }));
                  });
</script>


    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>