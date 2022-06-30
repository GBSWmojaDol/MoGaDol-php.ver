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
    $name = $_SESSION['username'];
    $idx = $_GET['id'];
    if($jb_login){
        $sql = "SELECT * FROM review_good WHERE review_idx = $idx;";
        $result = $conn-> query($sql);
        $total = mysqli_num_rows($result);
        $cnt = 0;
        while($row = mysqli_fetch_assoc($result)){

            if($row['userName'] == $name){
                $cnt++;
                echo "<script>alert('이미 좋아요를 누른 게시물입니다');
                history.back();
                </script>";
            }

            $total--;
        }

        if($cnt == 0){
            $stmt = $conn-> prepare( "INSERT INTO review_good (review_idx, userName) VALUES (?, ?);");
        $stmt -> bind_Param('is', $idx, $name);
        $result = $stmt -> execute();
        echo "<script>
        history.back();
        </script>";
        }
    }else{
        echo "<script>alert('로그인이 필요합니다');
        history.back();
        </script>";
    }
    


    
    ?>
</body>
</html>