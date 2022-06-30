<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include '../inc_src/DBCnt.php';
    include '../inc_src/UserSession.php';
    $URL = '../../php/page/main.php';
    $id = $_SESSION['username'];
    $pw = $_POST['create_pw'];
    $hashpw = base64_encode(hash('sha256', $pw, true));
    $sql = "SELECT user_pw, user_session FROM user_info WHERE user_id = '".$id."';";
    $URL = '../../php/page/mypage.php';
    $result = $conn->query($sql);
    $rows = mysqli_fetch_assoc($result);
    $total = mysqli_num_rows($result);

    if($hashpw == $rows['user_pw']){
        $_SESSION['username'] = null;
        $sql2 = "UPDATE `user_info` SET `user_session`='0' WHERE user_id = '".$id."';";
        
        
        echo "<script>alert('계정 삭제 완료');
        location.href = '".$URL."'</script>";

    }else if($hashpw != $rows['user_pw']){
        echo "<script>alert('비밀번호가 틀렸습니다.');
        location.href = '".$URL."'</script>";
        
    }
?>
</head>
<body>
    
</body>
</html>