
<?php 

require_once "db.php";


  // session_start();

  // // If session variable is not set it will redirect to login page

  // if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
  //     header('Location:../login.php');
  //   exit;

  // }

  // $email = $_SESSION['email'];
  $author = $_POST['author'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  $date = $_POST['date'];

   
  $imgFile = $_FILES['image']['name'];
  $tmp_dir = $_FILES['image']['tmp_name'];
  $imgSize = $_FILES['image']['size'];
    $upload_dir = '../uploads/blog/'; // upload directory
 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 

   // rename uploading image
   $userpic = time().".".$imgExt;
    move_uploaded_file($tmp_dir,$upload_dir.$userpic);

  if (isset($_POST["submit"])) {
    // Add task to DB
    $sql = "INSERT INTO posts(author, title, content,image,date)
    VALUES (?,?,?,?,?)";

    $stmt = $db->prepare($sql);


    try {
      $stmt->execute([$author, $title, $content,$userpic,$date]);
      header('Location:../posts.php?posted');

      }

     catch (Exception $e) {
        $e->getMessage();
        echo "Error";
    }
  }
    if (isset($_POST["edit"])) {
    // Add task to DB
      if(empty($imgExt)){
        $userpic = $_POST['old_image'];
      }
      $id = $_POST['id'];
      $data = [
    'author' => $author,
    'title' => $title,
    'content' => $content,
    'image' => $userpic,
    'date' => $date,
    'id' => $id,
];
    $sql = "UPDATE posts SET author=:author, title=:title, content=:content,image=:image,date=:date WHERE id=:id";

    $stmt = $db->prepare($sql);


    try {
      $stmt->execute($data);
      header('Location:../posts.php?updated');

      }

     catch (Exception $e) {
        $e->getMessage();
        echo "Error";
    }
  }













?>