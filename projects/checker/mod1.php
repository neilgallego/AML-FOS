<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <a style="width:7%;  height: 45px; float:left;" href="item%20category/tbls.php?cat=A" target="iframe_a" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">A</a>
 <a style="width:7%;  height: 45px; float:left;" href="item%20category/tbls.php?cat=B" target="iframe_a" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">B</a>
 <a style="width:7%;  height: 45px; float:left;" href="item%20category/tbls.php?cat=C" target="iframe_a" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">C</a>
 <a style="width:7%;  height: 45px; float:left;" href="item%20category/tbls.php?cat=D" target="iframe_a" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">D</a>

  <!-- Modal 1 -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
		
        <div class="modal-body">
		<iframe height="200px" width="100%"  style="border:none; position:absolute; top: 0;" src="/item category/tbls.php" name="iframe_a"></iframe>  
          <!--<input type="button" class="btn btn-default" data-dismiss="modal" value="<?php// echo $product_array[$key]["name"]; ?>">-->
        </div>
       
      </div>
      
    </div>
  </div>
  
 
</div>

</body>
</html>