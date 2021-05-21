<?php
  $active = $data["active"];
  $auth = $data["auth"];
  $userType = $data["user_type"];
  $userName = $data["user_name"];

  $userLinks = [
    ["home", "Produkti", "/products_app/products"]
  ];
  $anonymLinks = [
    ["home", "Produkti", "/products_app/products"],
  ];

  $currentLinks;
  $userTypeName;

if($userType == "user") {
    $currentLinks = $userLinks;
    $userTypeName = "User";
  } else {
    $currentLinks = $anonymLinks;
    $userTypeName = "";
  }
?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Products List App</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
          <?php foreach($currentLinks as $key => $link) {?>
            <li class="nav-item">
              <?php echo '<a class="nav-link '.($link[0]==$active ? "active" : "").'" href='.$link[2].'>'.$link[1].'</a>'; ?>
            </li>
          <?php } ?>
        </ul>

        <ul class="navbar-nav ml-auto">
          <?php if(!$auth){ ?>
            <li class="nav-item">
              <a class="nav-link" href="/products_app/signin">Ielogoties</a>
            </li>
          <?php } ?>
          <?php if($auth) { ?>
            <li class="nav-item">
              <?php echo '<span class="navbar-text">'.$userTypeName.': '.$userName.'</span>' ?>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/products_app/signout">Izlogoties</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
