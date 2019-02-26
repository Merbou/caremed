<!DOCTYPE html>
<html lang="en">
<head>
<title>CareMed</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="CareMed demo project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="public/styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="public/styles/app.css">

<?php echo !empty($this->link)?$this->link:''?>  
</head>
<body id="page-top" class="bodyColor slider"
style="<?php echo ($style['background'])?$style['background']:''?>">

<?php echo !empty($content)?$content:'' ?>




<?php echo !empty($this->script)?$this->script:''?>
<script src="public/js/jquery-3.2.1.min.js"></script>
<script src="public/styles/bootstrap4/popper.js"></script>
<script src="public/styles/bootstrap4/bootstrap.min.js"></script>
</body>
</html>