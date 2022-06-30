<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include '../inc_src/UserSession.php';
    include '../inc_src/DBCnt.php';

    
    $review_id = $_POST['review_idx'];
    $title = $_POST['create_id'];
    $content = $_POST['content'];
    $DATE = date("Y-M-d-h-m-s", time());
    $star = $_POST['rating'];


    $upload_dir = '../../file';
    $URL = "../../php/page/main.php";
    move_uploaded_file($_FILES['InputFile']['tmp_name'], "$upload_dir/$DATE.png");
    
    $stmt = $conn->prepare("UPDATE review_info SET review_title = ?, img_address = ?, content = ?, star_point = ? WHERE review_idx =  '".$review_id."'; ");
    $stmt ->bind_param("sssi", $title, $DATE, $content, $star);
    $result = $stmt ->execute();

  
        echo "<script>
        console.log('ss');
        alert('변경 완료');
        location.href = '".$URL."';
        </script>";
    
    

    ?>
</body>

</html>