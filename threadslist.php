<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Discuss</title>
    <style>
    .outer-container,
    .jumbotron {
        background-color: #FADBD8;
    }
    </style>

</head>

<body>
    <?php require 'partials/_header.php';?>
    <?php require 'partials/_dbconnect.php';?>
    <!-- submit qustion  -->
    <?php
        $showAlert = false;
         
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $title = $_POST['title'];
            $desc = $_POST['desc'];
            $id = $_GET['catid'];
            $sql ="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$title', '$desc' , '$id', '0', CURRENT_TIMESTAMP)";            
            $result = mysqli_query($conn,$sql); 
            $showAlert = true; 
            if($showAlert){
                echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                            <strong>Success</strong> your thread has been added.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                }       
        }
    ?>
    
    <?php
       $id = $_GET['catid'];
       $sql = "SELECT * FROM `categories` WHERE categories_id = $id";
       $result = mysqli_query($conn,$sql);
       while($row = mysqli_fetch_assoc($result)){
           $catname = $row['categories_name'];
           $catdesc = $row['categories_description'];
       }
    ?>



    <div class="container outer-container w-75  my-2 p-3">
        <div class="jumbotron ">
            <h3 class="display-6">Welcome to <?php echo $catname; ?> forums</h3>
            <p class="lead"><?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge with each other.
                No Spam / Advertising / Self-promote in the forums is allowed.
                Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images.
                Do not cross post questions.
                Remain respectful of other members at all times.
            </p>
            <p>Posted By: <b>Pooja</b> </p>
        </div>
    </div>
    

    <!-- ask qustions form -->
    <div class="container w-75 my-4">
        <h2 class="py-2">Start a Discussion</h2>
        <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
            <div class="form-group my-2">
                <label for="exampleInputEmail1">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Keep your title as short and crisp as
                    possible.</small>
            </div>
            <div class="form-group my-2">
                <label for="exampleFormControlTextarea1">Ellaborate Your Concern</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-danger my-2">Submit</button>
        </form>
    </div>
    <div class="container w-75 my-4">
        <h2 class="py-2">Browse Questions</h2>
        <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $id";
            $result = mysqli_query($conn,$sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $thread_title = $row['thread_title'];
                $thread_desc = $row['thread_desc'];
                $thread_id = $row['thread_id'];
                $thread_time = $row['timestamp'];
        ?>
        <div class="media my-3 d-flex">
            <div><img src="images/userdefault.png" width="40px" class="mr-3 my-1" alt="..."></div>
            
            <div class="media-body mx-2">
            <b class="my-0">Anonymouse User at (<?php echo $thread_time; ?>) </b>
                <h5 class="my-0"><a class="text-decoration-none"
                        href="thread.php?thread-id=<?php echo $thread_id ?>"><?php echo $thread_title?></a></h5>
                <?php echo $thread_desc?>
            </div>
            
            
        </div>
        <?php
            }
            
            if($noResult){
            echo '<div class="jumbotron jumbotron-fluid p-4 mb-4">
                    <div class="container">
                        <h1 class="display-6">NO Threads Found</h1>
                        <p class="lead">Be the first person to ask a question.</p>
                    </div>
                  </div>';
            }
            
        ?>


    </div>


    <?php require 'partials/_footer.php';?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>