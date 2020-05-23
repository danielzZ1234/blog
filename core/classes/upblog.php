<?php

class blog
{
    protected $photo;
    protected $headline_one;
    protected $headline_two;
    protected $content;
    protected $date;
    protected $mkdir;

    public function upload($x)
    {
        $target_dir = 'img/';
        $target_file = $target_dir.basename($x["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($x["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";

                $uploadOk = 0;
            }
        }
// Check if file already exists

// Check file size
        if ($_FILES["fileToUpload"]["size"] > 7000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            return 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
            && $imageFileType != "GIF"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

            $uploadOk = 0;

        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            return 0;
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($x["tmp_name"], $target_file)) {
                echo "The file " . basename($x["name"]) . " has been uploaded.";
                $this->photo = basename($x["name"]);
                return 1;
            } else {

                echo "Sorry, there was an error uploading your file.";
                return 0;
            }
        }
    }
   
       public function setHeadlineOne($headline_one)
    {
        $this->headline_one = $headline_one;
    }
    public function setHeadlineTwo($headline_two)
    {
        $this->headline_two = $headline_two;
    }


    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getHeadlineOne()
    {
        return $this->headline_one;
    }

       public function getHeadlineTwo()
    {
        return $this->headline_two;
    }

    public function getContent()
    {
    	return $this->content;
    }

    public function getUpload()
    {
        return $this->photo;
    }
 

    public function insertProduct($headline_one,$headline_two,$content,$img,$date,$conn)
    {

        $sql = "INSERT INTO blog(headline_one,headline_two,content,img,date1)VALUES('$headline_one','$headline_two','$content','$img','$date')";
        $conn->query($sql);
    }
}
