<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    include '../inc_src/UserSession.php';
    $URL = '../../php/page/main.php';
    include "../inc_src/DBCnt.php";
    $id = $_SESSION['username'];
    $_SESSION['username'] = null;


    echo "<script>
    alert('".$id."님, 로그아웃 되었습니다.');
    location.href = '".$URL."';
    </script>";
    ?>
</head>
<body>
    
</body>
</html>