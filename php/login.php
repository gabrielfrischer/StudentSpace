<?php
  include('db.php');
  include('Student.php');
  $username=$_POST['user_name'];
  
  $stmt = $db->prepare("SELECT * FROM users where user_name = :userName;");
  $stmt->bindParam(":userName", $username, PDO::PARAM_STR);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if($row)
  {
    session_start();
    $_SESSION['user'] = new Student($row["pid"], $row["name"]);
    header('Location: ../view.php');
  }else
  {
    echo "Try username: demo.\n";
  }
  
?>
