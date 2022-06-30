<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include "../inc_src/DBCnt.php";
        include "../inc_src/UserSession.php";
    ?>
    <title>Document</title>
</head>
<body>
    <?php 
    $title = $_POST['create_id'];
    $shop_name = $_POST['shop_name'];
    $id = $_POST['shop_idx'];

    $star = $_POST['rating'];
    
    $DATE = date("Y-M-d-h-m-s", time());
    $UserName = $_SESSION['username'];
    
    $upload_dir = '../../file';
    $URL = "../../php/page/main.php";
    move_uploaded_file( $_FILES['InputFile']['tmp_name'], "$upload_dir/$DATE.png");
    $content = $_POST['content'];
    

    $stmt = $conn -> prepare("INSERT INTO review_info (review_idx, shop_idx, review_title, writer_name, shop_name, img_address, content, write_day, star_point) VALUES (null, ?, ?, ?, ?, ?, ? ,?, ?);");
    $stmt->bind_Param("issssssi",  $id, $title,  $UserName, $shop_name, $DATE, $content, $DATE, $star);
    $result = $stmt->execute();
    $stmt->close();

    if($result){
        echo "<script>alert('등록 완료')</script>";
        echo "<script>
            location.href = '".$URL."';
        </script>";
    }else{
        echo "<script>alert('등록 실패, 다시 시도해 주세요')</script>";
    }
    ?>
</body>
</html>