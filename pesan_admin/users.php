<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

<body>
  <section class="users">
    <header>
      <div class="content">
        <div class="details">
          <span>Admin</span>
          <p>online</p>
        </div>
      </div>
    </header>
    <div class="search">
      <span class="text">Pilih users untuk memulai chat</span>
      <input type="text" placeholder="Enter name to search...">
      <button><i class="fas fa-search"></i></button>
    </div>
    <div class="users-list">

    </div>
  </section>

  <script src="javascript/users.js"></script>

</body>

</html>