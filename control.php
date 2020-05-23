<?php
require_once "core/load.php";
$date = date("Y/m/d");
if(!isset($_SESSION['admin']))
{
  header("Location: index.php");
}
if(isset($_POST['submit'])&&isset($_SESSION['admin']))
{   
    $id = $_POST['id'];
    $one = $_POST['one'];
    $two = $_POST['two'];
    $content = $_POST['content'];
    updateHeadOne($conn, $one , $id);
    updateHeadTwo($conn, $two , $id);
    updateContent($conn, $content , $id);
}
  if (isset($_POST['submit1'])&&isset($_SESSION['admin'])) {
        $blog = new blog();
        if ($blog->upload($_FILES['fileToUpload']) == 1) {
            $blog->setHeadlineOne($_POST['one1']);
            $blog->setHeadlineTwo($_POST['two1']);
            $blog->setContent($_POST['content1']);
            echo $blog->getUpload() . '<br>';
            $date = date("Y/m/d");
            $blog->insertProduct($blog->getHeadlineOne(), $blog->getHeadlineTwo(), $blog->getContent(), $blog->getUpload(),$date, $conn);
        }
}
 if (isset($_POST['delete'])&&isset($_SESSION['admin'])) {
        $id = $_POST['id'];
        deleteBlog($conn, $id);
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>dddddd</title>

  
  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- magnific popup -->
  <link rel="stylesheet" href="plugins/magnific-popup/magnific-popup.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  <!-- themify icon -->
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <!-- animate -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Aos -->
  <link rel="stylesheet" href="plugins/aos/aos.css">
  <!-- swiper -->
  <link rel="stylesheet" href="plugins/swiper/swiper.min.css">
  <!-- Stylesheets -->
  <link href="css/style.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <link rel="icon" href="images/favicon.png" type="image/x-icon">

</head>

<body>
  

<!-- preloader start -->
<div class="preloader">
    <img src="images/preloader.gif" alt="preloader">
</div>
<!-- preloader end -->
 <div class='row' style='margin-top:100px;'>
            <div class='col-lg-8 mx-auto'>
                <div class='signup'>
                    <div class='row'>
                        <div class='col-md-5 signup-greeting overlay' style='background-image: url(images/background/signup.jpg);'>
                            <img src='images/logo-signup.png' alt='logo'>
                            <h4>Welcome!</h4>
                            <p>
                                </p>
                        </div>
                        <div class='col-md-7'>
                            <div class='signup-form'>
                                <form action=''  method ='post' enctype='multipart/form-data' class='row'>
                                    <div class='col-lg-12'>
                                        <h4>Upload Blog </h4>
                                        <p class='float-sm-right'>
                                            <a href='signup.html'></a>
                                        </p>
                                    </div>
                                    <div class='col-lg-12'>
                                     <label>Choose First Headline</label>
                                    <input type='text' class='form-control' id='one' name='one1' value=''>
                                  </div>
                                
                                    <div class='col-lg-12'>
                                    <label>Choose Second Headline</label>
                                       <input type='text'  class='form-control' id='two'  name = 'two1' value=''>
                                    </div>
                                     <div class='col-lg-12'>
                                      <label>Choose Blog Content</label>
                                     
                               <textarea name='content1' rows='5' cols='60'></textarea>
                                    </div>
                                     <div class='col-lg-12'>
                                    <label>Choose Blog Photo</label>
                                    <input type='file' name='fileToUpload' id='fileToUpload'>
                                  </div>
                                    <input type='hidden' name='id' value=" . $row['id'] . ">
                                    <div class='col-sm-4'>
                                        <button class='btn btn-primary btn-sm' name='submit1'>Upload New Blog</button>
                                    </div>
                                   
                                       
                                          

                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

<?php echo top13($conn);?>
<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- magnific popup -->
<script src="plugins/magnific-popup/jquery.magnific.popup.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- filter -->
<script src="plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
<script  src="plugins/google-map/gmap.js"></script>
<!-- Syo Timer -->
<script src="plugins/syotimer/jquery.syotimer.js"></script>
<!-- aos -->
<script src="plugins/aos/aos.js"></script>
<!-- swiper -->
<script src="plugins/swiper/swiper.min.js"></script>
<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>