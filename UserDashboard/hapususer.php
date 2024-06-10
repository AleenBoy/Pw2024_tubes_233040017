<?php
  require '../Functions/functions.php';

  $id = $_GET ['id'];


  if(isset($id)) {
      if(hapususer($id) > 0) {
        echo "<script>
        alert('user berhasil dihapus')
        document.location.href = 'userdashboard.php';
        </script>";
      }
      }

  ?>