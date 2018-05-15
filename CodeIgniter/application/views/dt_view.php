<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.dataTables.min.css">
<script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>


<table id="dt-basic" class="table table-striped table-bordered">
   <thead>
       <tr>
           <th>ID</th>
           <th>Author</th>
           <th>Date</th>
           <th>Title</th>
           <th>Content</th>
           <th>Photo</th>
       </tr>
   </thead>
   <tbody>
       <?php foreach ($data as $d) : ?>
       <tr>
           <td><?php echo $d->id ?></td>
           <td><?php echo $d->author ?></td>
           <td><?php echo $d->date ?></td>
           <td><?php echo $d->content ?></td>
           <td><?php echo $d->image_file ?></td>
           <td><a href="<?php echo base_url('/blog/edit/') . $d->post_id ?>">Edit</a>
<a href="<?php echo base_url('/blog/delete/') . $d->post_id ?>">Delete</a></td>
       </tr>
       <?php endforeach; ?>
   </tbody>
</table>

<script>
   jQuery(document).ready(function(){

       // Contoh inisialisasi Datatable tanpa konfigurasi apapun
       // #dt-basic adalah id html dari tabel yang diinisialisasi
       $('#dt-basic').DataTable();

</script>

