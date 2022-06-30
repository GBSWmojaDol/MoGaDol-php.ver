<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include '../inc_src/DBCnt.php';
    include '../inc_src/UserSession.php';

    $URL = '../../php/page/main.php';
    $id = $_POST['login_id'];
    $pw = $_POST['login_pw'];

    $hashpw = base64_encode(hash('sha256', $pw, true));

    $sql = "SELECT user_pw, user_session FROM user_info WHERE user_id = '".$id."';";

    $result = $conn->query($sql);
    $rows = mysqli_fetch_assoc($result);
    $total = mysqli_num_rows($result);

    if($total == 0){
        echo "<script>alert('존재하지 않는 아이디입니다.')
        history.back();</script>";
    }else if($rows['user_session'] == 0){
        echo "<script>alert('삭제된 계정입니다.')
        history.back();</script>";
    }else if($hashpw == $rows['user_pw']){
        $_SESSION['username'] = $id;
        echo "<script>alert('로그인 성공!');
        location.href = '".$URL."'</script>";

    }else if($hashpw != $rows['user_pw']){
        echo "<script>alert('비밀번호가 틀렸습니다.')
        history.back();</script>";
    }

    ?>
</body>
</html>