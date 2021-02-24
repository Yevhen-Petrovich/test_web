<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-body border-bottom shadow-sm">
  <p class="h5 my-0 me-md-auto fw-normal">MetalWorking</p>
  <nav class="my-2 my-md-0 me-md-3">
    <a class="p-2 text-dark" href="#">Examples of work</a>
    <a class="p-2 text-dark" href="#">Enterprise</a>
    <a class="p-2 text-dark" href="#">Contacts</a>
  </nav>
  <?php if (isset($_SESSION['logged_user'])): 
    {echo '<a class="p-2 text-dark" >Hello ' .$_SESSION["logged_user"]. '</a>';}
    ?>
  <a href="logout.php" class="btn btn-outline-primary" href="#">Logout</a>
  <?php else:?>

   <a href = "login.php" class="btn btn-outline-primary" href="#">Login</a>
   <?php endif;?>
  </header>