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
    $user_id = $_SESSION['username'];

    $id = $_POST['create_id'];
    $nk = $_POST['user_nickname'];
    $addr1 = $_POST['addr1'];
    $addr2 = $_POST['addr2'];

    $stmt = $conn-> prepare("UPDATE user_info SET user_id = ?, user_nickname = ?, addr1 = ?, addr2 = ? WHERE user_id = '".$user_id."';");
    $stmt -> bind_param('ssss', $id, $nk, $addr1, $addr2);
    $_SESSION['username'] = $id;
    $result = $stmt->execute();

    if($result){
        echo "<script>
            alert('정보 수정 완료되었습니다.');
            location.href = '../page/mypage.php';
        </script>";
    }
    ?>
</body>
</html>