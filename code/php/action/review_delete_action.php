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
    include '../inc_src/DBCnt.php';
    include '../inc_src/UserSession.php';


    ?>

<?php 
    $id = $_GET['id'];
    $sql = "SELECT * FROM review_info WHERE review_idx = '".$id."';";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $sql2 = "DELETE FROM review_info WHERE review_idx = '".$id."';";


    if($jb_login){
        if($_SESSION['username'] == $row['writer_name']){
            $result2 = $conn->query($sql2);
            echo "<script>alert('삭제 완료');
                location.href='../page/main.php';
            </script>";
        }
    }else{
        echo "<script>alert('접근 권한이 없습니다.');
        history.back();</script>";
    }
?>

</body>
</html>