<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

<body>
  <section class="chat-area">
    <header>
      <?php
      $user_id = "999";
      ?>
      <div class="details">
      </div>
    </header>
    <div class="chat-box">

    </div>
    <form action="#" class="typing-area">
      <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
      <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
      <button><i class="fab fa-telegram-plane"></i></button>
    </form>
  </section>

  <script src="javascript/chat.js"></script>

</body>

</html>