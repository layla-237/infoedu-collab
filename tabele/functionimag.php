<?php

session_start();
$errorUpload = '';
$errorUploadType = '';
$image = '';

$dbname2 = $_SESSION['dbname2'];
$imagefield = $_SESSION['imagefield'];
$imagedir = $_SESSION['filedir'];
include('../../../connect.php');
if (isset($_POST['action_type'])) {

    if (($_POST['action_type'] == 'img_delete') && !empty($_POST['id'])) {
        $file = $_POST['id'];
        if (file_exists($file)) {
            $filename = basename($file);
            unlink($file);
            $target_file1 = "../../../uploads/" . $imagedir . "100x100/" . $filename;
            if (file_exists($target_file1)) {
                unlink($target_file1);
            }
            $stmt = $con->prepare("UPDATE $dbname2 SET $imagefield ='' WHERE $imagefield  = '" . $filename . "'");
            $stmt->execute();
            echo 'ok';
        }
    }
}




if (isset($_FILES["images"])) {
    $output = '';
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    $uploadDir = '../../../uploads/' . $imagedir;
    $fileImages = array_filter($_FILES['images']['name']);
    foreach ($fileImages as $key => $val) {
        $fileName = basename($fileImages[$key]);
        $fileName = str_replace(' ', '', $fileName);
        $targetFilePath = $uploadDir . $fileName;
        $source_file = $_FILES["images"]["tmp_name"][$key];
        $target_file = "../../../uploads/" . $imagedir . "/100x100/" . $fileName;
        $data = getimagesize($source_file);

        $widthx = $data[0];
        $heightx = $data[1];
        $width = 100;
        $height = 100;
        $quality = 90;
        //$image_name = $_FILES['uploadImg']['name'];
        compress_image($source_file, $target_file, $width, $height, $quality);
        if ($imagedir == 'items/') {
            $source_file1 = $_FILES["images"]["tmp_name"][$key];
            $target_file1 = "../../../uploads/" . $imagedir . '300x300/' . $fileName;
            $width1 = 300;
            $height1 = 300;
            $quality1 = 90;
            compress_image($source_file1, $target_file1, $width1, $height1, $quality1);

        }

        $target_file1 = "../../../uploads/" . $imagedir . 'comp/' . $fileName;
        compressImage($source_file, $target_file1, 60);




        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["images"]["tmp_name"][$key], $targetFilePath)) {
                $string = "'";
                $output .= '<div class="col-lg-2 col-sm-3 col-xs-6 text-center ' . $fileNameNoExtension = preg_replace("/\.[^.]+$/", "", $fileName) . pathinfo($fileName, PATHINFO_EXTENSION) . '" style="margin-top: 10px;" id="imgb_uploads/' . $imagedir . $fileName . '">';
                $output .= '<a class="thumbnail" href="uploads/' . $imagedir . $fileName . '"><img src="uploads/' . $imagedir . $fileName . '" style="width: 100px; height: 100px; "></a>';
                $output .= '<span>';
                $output .= '<a href="javascript:void(0);" class="btn btnim btn-primaryim" onclick="deleteImage(' . '\'uploads/' . $imagedir . $fileName . '\')"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></a>';
                $output .= '<span style="margin-left: 4px;"></span>';
                $output .= '<a href="javascript:void(0);" class="btn btnim btn-primaryim" onclick="selectImage(' . '\'uploads/' . $imagedir . $fileName . '\')"><i class="fa fa-check fa-1x" aria-hidden="true"></i></a>';
                $output .= '<br /></span>';
                $output .= '<label>' . $fileName . '</label>';
                $output .= '</div>';



            } else {
                $errorUpload .= $fileImages[$key] . ' | ';
            }
        } else {
            $errorUploadType .= $fileImages[$key] . ' | ';
        }



    }
    $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
    $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
    $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;

    echo $output;

}



function compress_image($source_file, $target_file, $nwidth, $nheight, $quality)
{
    //Return an array consisting of image type, height, widh and mime type.
    $image_info = getimagesize($source_file);
    if (!($nwidth > 0))
        $nwidth = $image_info[0];
    if (!($nheight > 0))
        $nheight = $image_info[1];


    /*echo '<pre>';
    print_r($image_info);*/
    if (!empty($image_info)) {
        switch ($image_info['mime']) {
            case 'image/jpeg':
                if ($quality == '' || $quality < 0 || $quality > 100)
                    $quality = 60; //Default quality
                // Create a new image from the file or the url.
                $image = imagecreatefromjpeg($source_file);
                $thumb = imagecreatetruecolor($nwidth, $nheight);
                //Resize the $thumb image
                imagecopyresized($thumb, $image, 0, 0, 0, 0, $nwidth, $nheight, $image_info[0], $image_info[1]);
                // Output image to the browser or file.
                return imagejpeg($thumb, $target_file, $quality);

                break;

            case 'image/png':
                if ($quality == '' || $quality < 0 || $quality > 9)
                    $quality = 6; //Default quality
                // Create a new image from the file or the url.
                $image = imagecreatefrompng($source_file);
                $thumb = imagecreatetruecolor($nwidth, $nheight);
                //Resize the $thumb image
                imagecopyresized($thumb, $image, 0, 0, 0, 0, $nwidth, $nheight, $image_info[0], $image_info[1]);
                // Output image to the browser or file.
                return imagepng($thumb, $target_file, $quality);
                break;

            case 'image/gif':
                if ($quality == '' || $quality < 0 || $quality > 100)
                    $quality = 75; //Default quality
                // Create a new image from the file or the url.
                $image = imagecreatefromgif($source_file);
                $thumb = imagecreatetruecolor($nwidth, $nheight);
                //Resize the $thumb image
                imagecopyresized($thumb, $image, 0, 0, 0, 0, $nwidth, $nheight, $image_info[0], $image_info[1]);
                // Output image to the browser or file.
                //return imagegif($thumb, $target_file, $quality); //$success = true;
                return imagegif($thumb, $target_file); //$success = true;
                break;

            default:
                echo "<h4>Not supported file type!</h4>";
                break;
        }
    }
}




// Compress image
function compressImage($source, $destination, $quality)
{

    $info = getimagesize($source);
    $image = null;

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);
    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);

    if ($image !== null) {
        imagejpeg($image, $destination, $quality);
    }

}


?>