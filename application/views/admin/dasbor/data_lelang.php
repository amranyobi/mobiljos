<h4 class="mt-3">Bid Berjalan</h4>
<table class="table table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Harga Bid</th>
      <th>Waktu Bid</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach ($data_lelang as $dl) {
      ?>
      <tr>
      <td><?php echo $no++?></td>
      <td><?php echo number_format($dl->nilai)?></td>
      <td><?php echo date("d-m-Y H:i:s",strtotime($dl->waktu))?></td>
    </tr>
      <?php
    }
    ?>
  </tbody>
</table>
<!-- <script type="text/javascript">  
   setTimeout(function(){  
       location.reload();  
   },5000);  
</script>   -->