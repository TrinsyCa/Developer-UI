<?php
   include("admin/connection.php"); 
   include("admin/linkfunc.php");

   $link = @$_GET["link"];

   $data = $db->prepare("SELECT * FROM bloglarim WHERE link = ?");
   $data->execute([
      $link
   ]);
   $_data  = $data->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="tr" data-bs-theme="dark">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $_data["baslik"]; ?> | TrinsyBlog</title>

   <link rel="stylesheet" href="styles.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
   <a class="navbar-brand" href="/">
      <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      TrinsyBlog
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Bloglar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin/">Admin Paneli</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Sosyal Medya
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">İnstagram</a></li>
            <li><a class="dropdown-item" href="#">Twitter</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Twitch</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class="wrapper">
   <h1><?php echo $_data["baslik"]; ?></h1>
   <div class="container">
      <div class="row">
         <div class="col-lg-12 mb-5">
            <div style="padding:0 200px;">
               <img src="<?php echo $_data["resim"] ?>" style="width:100%; margin-bottom:30px;border-radius: 25px;box-shadow: 0 0 20px 10px #e2985b;max-height: 485px;object-fit: cover;">
            </div>
            <p style="font-size:17px;">
               <?php echo $_data["metin"]; ?>
            </p>
            <strong class="d-flex justify-content-end">Tarih : <?php echo $_data["tarih"]; ?></strong>
         </div>
      </div>
   </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>