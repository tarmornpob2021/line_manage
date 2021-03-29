<?php 
include 'config.php';

$query5 = "SELECT * FROM `groups`";

if ($result5 = $conn->query($query5)) {
  /* fetch associative array */
  while ($row5 = $result5->fetch_assoc()) {

    $array_des[] = $row5;

    	

  }
}

if(isset($array_des)) {

$row_c = count($array_des);
$new_r = $array_des[$row_c-1]["id"]+1;


}

else {

  $row_c = 0;
 $new_r = 0;
}

?>
<!DOCTYPE html>
<html>
<head>
	<?php 
	include 'getbootstrap.php'; ?>
	<title>::. LINE GROUP SERVICE .::</title>
  <script src="dist/sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="dist/sweetalert2.min.css">

</head>
<body>

	<?php 
	include 'getbootjs.php'; ?>

<div class="container">

	<table class="table" id="table_d">
  <thead>
    <tr>
      <th scope="col">Group Line</th>
      <th scope="col">Token</th>
      <th scope="col">E-Mail</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  	<?php

    for($i=0;$i<$row_c;$i++) { ?>
    <tr id="<?= $array_des[$i]["id"]; ?>">

      <th scope="row"><input type="text" id="group_n<?=$i;?>" class="form-control" placeholder="Group Line" value="<?= $array_des[$i]["group_n"]; ?>" requried onkeyup="someFn(event,this.id)"></th>

      <td><input type="text" id="token_n<?=$i;?>" class="form-control" placeholder="Token " value="<?= $array_des[$i]["token"]; ?>" required onkeyup="someFn(event,this.id)"></td>

      <td><input type="text" id="email<?=$i;?>" class="form-control" placeholder="E Mail" value="<?= $array_des[$i]["email"]; ?>"  onkeyup="myFunction(event,this.id)" value="email<?=$i;?>" required></td>
<input type="hidden" id="id_pry<?=$i;?>" class="form-control" placeholder="Token " value="<?= $array_des[$i]["id"]; ?>">
      <td> <button class="btn btn-danger" value="<?= $array_des[$i]["id"]; ?>" onclick="Delete(this.value);"><i class="fas fa-trash"></i></button></td>

    </tr>
  <?php }  ?>
 
  <tr id="<?= $new_r; ?>">
      <th scope="row"><input type="text" id="group_n<?= $new_r; ?>" class="form-control" placeholder="Group Line" onkeyup="someFn(event,this.id)"></th>
      <td><input type="text" id="token_n<?= $new_r; ?>" class="form-control" placeholder="Token "   onkeyup="someFn(event,this.id)"></td>
      <td><input type="text" id="email<?= $new_r; ?>" class="form-control" placeholder="E Mail"   onkeyup="myFunction(event,this.id)" ></td>
      <input type="hidden" id="id_pry<?= $new_r; ?>" class="form-control" placeholder="Token " value="<?= $new_r; ?>">

    </tr>
  </tbody>
</table>

<input type="hidden" id="last_c" class="form-control" value="<?= $new_r; ?>">

<center>
<i class="fas fa-plus-circle" style="font-size:44px;color:green;display:none;" onclick="newRow();"></i>
</center>

</div>
<script type="text/javascript">

    function someFn(event,value) {
      var ssx = value.split("_n");
      myFunction(event,"email" + ssx[1]);
    }

   function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
           return false;
        }else{
           return true;
        }
      }

function myFunction(event,value) {
  if (event.keyCode === 13) {



var zzx = parseInt($("#last_c").val()) + 1;

    var id_load = value.replace("email", "");

     var id_pry = $('#id_pry' + id_load).val();

    var g_n = $('#group_n' + id_load).val();

    var tk = $('#token_n' + id_load).val();

    var em = $('#email' + id_load).val();

    if(g_n == '' || tk == '' || em == '') {

      alert("Please fill input .");
      return false;

    }

 if(IsEmail(em)==false){
                alert("Please input valid email");
                return false;

              }

    var dataString = "id_lock=" + id_pry + "&g_n=" + g_n + "&t_k=" + tk + "&em=" + em;



     $.ajax({
      type:"post",
      url:"added.php",
      data:dataString,
      cache:false,
      success: function(html) {






          var obj = JSON.parse(html);




         if(obj["CODE"] == "UPDATED") {
Swal.fire({
  title: 'Success!',
  text: 'ข้อมูลคุณถูกอัพเดทเรียบร้อยแล้ว',
  icon: 'success',
  confirmButtonText: 'Close'
})

         }

         if(obj["CODE"] == "NEW_ROW") {
Swal.fire({
  title: 'Success!',
  text: 'เพิ่มข้อมูลเรียบร้อยแล้ว',
  icon: 'success',
  confirmButtonText: 'Close'
})
newRow(zzx);
$('#last_c').val(zzx);

         }
      }

    });

      }
}

	function newRow(value) {


var int_re = parseInt($("#last_c").val());
var zxzx = parseInt($("#last_c").val());

console.log(int_re);

    var item_load = '<tr id="' + (int_re + 1) + '">';
    var item_load = item_load + '<th scope="row"><input type="text" id="group_n' + (int_re + 1) + '" class="form-control" placeholder="Group Line"></th>';
    var item_load = item_load + '<td><input type="text" id="token_n' + (int_re + 1) + '" class="form-control" placeholder="Token "></td>';



    var item_load = item_load + '<td><input type="text" id="email' + (int_re+ 1 ) + '" class="form-control" placeholder="E Mail" onkeyup="myFunction(event,this.id)" ></td>';

 var item_load = item_load + '<input type="hidden" id="id_pry' + (int_re + 1) + '" value="' + (int_re + 1) + '" class="form-control" placeholder="Token">';



var item_load = item_load + '</tr>';

  $("#table_d").append(item_load);

  var btnremove = '<td><button class="btn btn-danger" value="' + (int_re) + '" onclick="Delete(this.value);"><i class="fas fa-trash"></i></button></td>';

    $("#" + zxzx).append(btnremove);


	}

  function Delete(val) {

    

      var dataString = "id_lock=" + val;


    
    $.ajax({
      type:"post",
      url:"remove.php",
      data:dataString,
      cache:false,
      success: function(html) {

        if(html == "REMOVED") {
          $('#' + (val)).remove();
        }

      }
    });

  }
	   
</script>
</body>
</html>