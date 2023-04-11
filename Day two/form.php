<?php


$doc = new DOMDocument();
$doc->formatOutput = true;
$doc->load("employee.xml");
$Allnames = $doc->getElementsByTagName("name");
$Allemails = $doc->getElementsByTagName("email");
$Allstreets = $doc->getElementsByTagName("street");
$Allphones = $doc->getElementsByTagName("phone");

// var_dump($_SESSION['index']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body >
<div class ="container">
  <form action="./ModifyXml.php" method="post" class=" row border border-success justify-content-center ">
    <div class="input-group mb-3">
      <span class="input-group-text" id="inputGroup-sizing-default">name</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="name" value="<?php echo  $Allnames->item($_SESSION['index'])->textContent ?>">
    </div>

    <div class="input-group mb-3">
      <span class="input-group-text" id="inputGroup-sizing-default">email</span>
      <input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email" value="<?php echo  $Allemails->item($_SESSION['index'])->textContent ?>">
    </div>

    <div class="input-group mb-3">
      <span class="input-group-text" id="inputGroup-sizing-default">phone</span>
      <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="phone" value="<?php echo  $Allphones->item($_SESSION['index'])->textContent ?>">
    </div>


    <div class="input-group mb-3">
      <span class="input-group-text" id="inputGroup-sizing-default">address</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="address" value="<?php echo  $Allstreets->item($_SESSION['index'])->textContent ?>">
    </div>
  
      <div class="container offset-6">
      <input type="submit" class="btn btn-success" value="add" name="add">
      <input type="submit" class="btn btn-success" value="delete" name="delete">
      <input type="submit" class="btn btn-success" value="previous" name="previous">
      <input type="submit" class="btn btn-success" value="next" name="next">
      <input type="submit" class="btn btn-success" value="update" name="update">
      </div>

  </form>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>