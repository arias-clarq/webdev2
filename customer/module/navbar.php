<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a href="#" class="navbar-brand">Ordering System</a>
  </div>

  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="Dashboard.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item">
        <a href="#" class="btn nav-link text-danger " data-bs-toggle="modal" data-bs-target="#logout">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<div class="modal fade" id="logout">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Logout</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        are you sure you want to logout?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <form action="../index.php" method="post">
          <button type="submit" class="btn btn-danger">Logout</button>
        </form>
      </div>

    </div>
  </div>
</div>