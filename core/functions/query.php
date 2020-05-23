<?php

$servername ="localhost";
$username = "root";
$password = "root";
$dbname = "fordavid";

$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
function login($conn,$username,$password){
    $sql ="SELECT id FROM admin WHERE email = '$username' AND password = '$password'";
    $details=$conn->query($sql);
    if($details->num_rows>0)
    {
        while($row=$details->fetch_assoc()) {
            return $row['id'];
        }
    }
    else{
        return 0;
    }

}
function top12($conn, $id)
{
    $x1 = 'img';
    $empty = '';
    $empty1='';
    $empty2='';
    $sql1 = $sql = "SELECT * FROM blog WHERE id!=$id ";
    $sql2 = $sql = "SELECT * FROM blog WHERE id=$id ";
    $sql = "SELECT id,headline_one,headline_two,content,img FROM blog where id=$id ";
    $details = $conn->query($sql);
    $details2=$conn->query($sql1);
    $details3=$conn->query($sql2);
  


    while ($row = $details->fetch_assoc()) {
        $empty = $empty . "        <form action='' method=\"post\">    <div class=\"col-md-4\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                    <select name='cars'>
                    $empty1;

  </select>
                    <span style='float:right'>שינוי קטגורית מוצר</span>

                        <h4 style=\"text-align: right\"><input type='text' style='float:left'size=\"5\" name='one' col='10' value=" . $row['headline_one'] . "><input type ='text' style='text-align:right;direction:rtl;' name='two' cols='10' value='" . $row['headline_two'] . "'></h4>
                    </div>
                    <div class=\"panel-body\">
                        <img class=\"img-responsive img-portfolio img-hover\" style='height: 200px; width: 300px;' src='" . $x1 . "/" . $row['img'] . "'>

                        <input type='hidden' name='id' value=" . $row['id'] . ">
                        <input type='submit' name='submit1' value='עדכן מוצר'>
                        <input type='submit' name='delete' value='מחק מוצר'>
                        <br>
                          <lable style='text-align:right;float:right;'>תיאור מוצר</label>
                         <h4 style='text-align:right;float:right;'><textarea style='text-align:right;direction:rtl' name='content' rows='10' cols='30'>".$row['content']."</textarea></h4>
                    </div>
                </div>
            </div>

            </form>






";
    }
    return $empty;

}
function top13($conn)
{
    $x1 = 'img';
    $empty = '';
    $empty1='';
    $empty2='';
    $sql1 = $sql = "SELECT * FROM blog  ";
    $sql2 = $sql = "SELECT * FROM blog ";
    $sql = "SELECT id,headline_one,headline_two,content,img FROM blog ";
    $details = $conn->query($sql);
    $details2=$conn->query($sql1);
    $details3=$conn->query($sql2);

while ($row = $details->fetch_assoc()) {
    $empty = $empty."
        <div class='row' style='margin-top:100px;'>
            <div class='col-lg-8 mx-auto'>
                <div class='signup'>
                    <div class='row'>
                        <div class='col-md-5 signup-greeting overlay' style='background-image: url(img/".$row['img'].");'>
                            <img src='images/logo-signup.png' alt='logo'>
                            
                            <p>
                                </p>
                        </div>
                        <div class='col-md-7'>
                            <div class='signup-form'>
                                <form action=''  method ='post' class='row'>
                                    <div class='col-lg-12'>
                                        <h4>Edit Blog</h4>
                                        <p class='float-sm-right'>
                                            <a href='signup.html'></a>
                                        </p>
                                    </div>
                                    <div class='col-lg-12'>
                                     <label>Edit First Headline</label>
                                    <input type='text' class='form-control' id='one' name='one' value='".$row['headline_one']."'
                                
                                    <div class='col-lg-12'>
                                    <label>Edit Second Headline</label>
                                       <input type='text'  class='form-control' id='two'  name = 'two' value='".$row['headline_two']."'>
                                    </div>
                                     <div class='col-lg-12'>
                                      <label>Edit Blog Content</label>
                                     
                               <textarea name='content' rows='5' cols='60'>".$row['content']."</textarea>
                                    </div>
                                    <input type='hidden' name='id' value=" . $row['id'] . ">
                                    <div class='col-sm-4'>
                                        <button class='btn btn-primary btn-sm' name='submit'>Edit Blog</button>
                                        
                                    </div>
                                    <div class='col-sm-4'>
                                    <button class='btn btn-primary btn-sm' name='delete'>Delete Blog</button>
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
    </div>";
}
 return $empty;
}
function blog($conn){
$empty = '';
    
$sql = "SELECT id,headline_one,img,date1 FROM blog ";
$details = $conn->query($sql);
while ($row = $details->fetch_assoc()){
$date = $row['date1'];
    $date = explode("/",$date);
    $months = $row['date1'];
    $months = explode("/",$months);
    if($months[1]=="01")
    {
        $months = "Jan";
    }
      if($months[1]=="02")
    {
        $months = "Feb";
    }
      if($months[1]=="03")
    {
        $months = "Mar";
    }
      if($months[1]=="04")
    {
        $months = "Apr";
    }
      if($months[1]=="05")
    {
        $months = "May";
    }
      if($months[1]=="06")
    {
        $months = "June";
    }
      if($months[1]=="07")
    {
        $months = "July";
    }
      if($months[1]=="08")
    {
        $months = "Aug";
    }
      if($months[1]=="09")
    {
        $months = "Sep";
    }
      if($months[1]=="10")
    {
        $months = "Oct";
    }
      if($months[1]=="11")
    {
        $months = "Oct";
    }
      if($months[1]=="12")
    {
        $months = "Dec";
    }
$empty = $empty."

        
            <!-- blog-item -->
            <div class='col-lg-4 col-sm-6 mb-4'>
                <div class='card'>
                    <div class='card-img-wrapper overlay-rounded-top'>
                        <img class='card-img-top' src='img/".$row['img']."'height=250px; alt='blog-thumbnail'>
                    </div>
                    <div class='card-body p-0'>
                        <div class='d-flex'>
                            <div class='py-3 px-4 border-right text-center'>
                                <h3 class='text-primary mb-0'>$date[2]</h3>
                                <p class='mb-0'>$months</p>
                            </div>
                            <div class='p-3'>
                                <a href='blog-single.php?id=".$row['id']."' class='h4 font-primary text-dark'>".$row['headline_one']."</a>
                                <p>by David Lazar</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            ";
}
return $empty;
}
function blog1($conn,$id){
    $empty = '';
$sql = "SELECT id,headline_one,headline_two,content,img,date1 FROM blog WHERE id=$id ";
$details = $conn->query($sql);
while ($row = $details->fetch_assoc()){
    $empty = $empty."<section>
    <div class='container'>
        <div class='row'>
            <div class='col-lg-8 py-100'>
                <div class='border rounded bg-white'>
                    <img class='img-fluid w-100 rounded-top' src='img/".$row['img']."' alt='blog-image'>
                    <div class='p-4'>
                        <h3>".$row['headline_two']."</h3>
                        <ul class='list-inline d-block pb-4 border-bottom mb-3'>
                            <li class='list-inline-item text-color'>Posted By David Lazar On</li>
                            <li class='list-inline-item text-color' style='color:red;font-size:15px'> ".$row['date1']."</li>
                            
                        </ul>
                        <p>".$row['content']."</p>
              
                     
                </div>
        
</section>";
}
return $empty;
}
function blog2($conn){
    $empty = '';
    $sql = "SELECT * FROM (
  SELECT * FROM blog ORDER BY id DESC LIMIT 2
) as r ORDER BY id";
    $details = $conn->query($sql);
while ($row = $details->fetch_assoc()){


    $date = $row['date1'];
    $date = explode("/",$date);
    $months = $row['date1'];
    $months = explode("/",$months);
    if($months[1]=="01")
    {
        $months = "Jan";
    }
      if($months[1]=="02")
    {
        $months = "Feb";
    }
      if($months[1]=="03")
    {
        $months = "Mar";
    }
      if($months[1]=="04")
    {
        $months = "Apr";
    }
      if($months[1]=="05")
    {
        $months = "May";
    }
      if($months[1]=="06")
    {
        $months = "June";
    }
      if($months[1]=="07")
    {
        $months = "July";
    }
      if($months[1]=="08")
    {
        $months = "Aug";
    }
      if($months[1]=="09")
    {
        $months = "Sep";
    }
      if($months[1]=="10")
    {
        $months = "Oct";
    }
      if($months[1]=="11")
    {
        $months = "Oct";
    }
      if($months[1]=="12")
    {
        $months = "Dec";
    }
    $empty = $empty ."

      <!-- blog-item -->
      <div class='col-lg-6 col-sm-6 mb-4 mb-lg-0'>
        <div class='card'>
          <div class='card-img-wrapper overlay-rounded-top'>
            <img class='card-img-top' src='img/".$row['img']."' height=350x alt='blog-thumbnail'>
          </div>
          <div class='card-body p-0'>
            <div class='d-flex'>
              <div class='py-3 px-4 border-right text-center'>
                <h3 class='text-primary mb-0'>$date[2]</h3>
                <p class='mb-0'>$months</p>
              </div>
              <div class='p-3'>
                <a href='blog-single.php?id=".$row['id']."' class='h4 font-primary text-dark'>
                  ".$row['headline_one']."</a>
                <p>by David Lazar</p>
              </div>
            </div>
        </div>
        </div>
      </div>";
}
return $empty;
}
function blog3($conn){
    $empty = '';
    $sql = "SELECT * FROM (
  SELECT * FROM blog ORDER BY id DESC LIMIT 3
) as r ORDER BY id";
    $details = $conn->query($sql);
while ($row = $details->fetch_assoc()){
    $date = $row['date1'];
    $date = explode("/",$date);
    $empty = $empty ."      <li class='d-flex border-bottom'>
            <div class='py-3 px-4 border-right text-center'>
              <h3 class='text-primary mb-0'>$date[2]</h3>
              <p class='mb-2'>Nov</p>
            </div>
            <div class='p-3'>
              <a href='blog-single.php?id=".$row['id']."' class='h4 font-primary text-dark'>".$row['headline_one']."
                </a>
              <p>by David Lazer</p>
            </div>
          </li>";
}

}
function updateHeadOne($conn,$headline_one,$id){
    $sql = "UPDATE blog
SET headline_one='$headline_one'
WHERE id=$id ";
    $conn->query($sql);

    }
function updateHeadTwo($conn,$headline_two,$id){
    $sql = "UPDATE blog
SET headline_two='$headline_two'
WHERE id=$id ";
    $conn->query($sql);

    }
function updateContent($conn,$content,$id){
    $sql = "UPDATE blog
SET content='$content'
WHERE id=$id ";
    $conn->query($sql);

    }
    function deleteBlog($conn, $id)
{
    $sql="SELECT img FROM blog WHERE id = $id";
    $result = $conn->query($sql);
    while($row=$result->fetch_assoc())
    {
        $empty = $row['img'];
        

    }
    unlink("img"."/".$empty);
  

    $sql = "DELETE FROM blog WHERE id=$id";
    $conn->query($sql);

}

?>