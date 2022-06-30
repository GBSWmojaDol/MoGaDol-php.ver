<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <style>
        @font-face {
            font-family: 'S-CoreDream-2ExtraLight';
            src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_six@1.2/S-CoreDream-2ExtraLight.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'LeferiPoint-WhiteA';
            src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2201-2@1.0/LeferiPoint-WhiteA.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        * {
            font-family: 'LeferiPoint-WhiteA';
        }

        h1 {
            font-family: 'S-CoreDream-2ExtraLight';
        }
        .nav-list{
            padding-top: 8px;
        }

        .container{
            text-align: center;
            margin-top: 350px;
        }


        .abox{
            margin-top: 70px;
        }

        .abox a{
            margin-left: 10px;
            margin-right: 10px;
        }

        #myjer{
            height: 200px;
            border: 1px #444 solid;
            margin-top: 40px;
            overflow-y: scroll;
        }

        .nametime{
            border: 1px black solid;
            box-shadow: 0 0 2px rgba(0, 0, 0, .4);
            margin-bottom: 10px;
        }

    </style>
    <title>MyPage</title>
    <?php
    include '../inc_src/DBCnt.php';
    include '../inc_src/UserSession.php';
    ?>
</head>

<body>
    <header class="status-header">
        <div class="s_column status-header__column">
            <h1 class="status-header__column__name">My Page</h1>
        </div>
    </header>
    <?php

    if ($jb_login) {

    ?>
        <header class="status-header2"></header>
        <?php 
            $id = $_SESSION['username'];
            $sql = "SELECT * FROM user_info WHERE user_id = '".$id."';";
            $sql2 = "SELECT * FROM review_info WHERE writer_name = '".$id."' ORDER BY review_idx DESC;" ;
            $result2 = $conn->query($sql2);
            $result = $conn->query($sql);

            $total = mysqli_num_rows($result2);
            $rows = mysqli_fetch_assoc($result);
        ?>
        <main class="main-screen">
            <div class="main-screen__profile">
                <div class="main-screen__profile__img"></div>
                <div class="main-screen__profile__tool">
                    

                    <b class="main-srceen__profile__nickname" id="nickname"><?php echo $rows['user_nickname'] ?></b>
                    
                    <div>#<?php echo $rows['user_id'] ?></div>
                    point : <?php echo $total * 8 ?>
                    <!--<a href="../../php/page/user_update_check.php"><div>회원수정</div></a>-->
                    
                </div>
            </div>
            
            <div class="container" id="myjer">
            <p>내가 쓴 글 : <?php echo $total ?> 개</p>
            <?php
        while($row = mysqli_fetch_assoc($result2)){ //DB에 저장된 데이터 수 (열 기준)
            ?>

    <div class="comm_box">
        <a href="../page/Readmore.php?id=<?php echo strip_tags($row['review_idx']);?>" >
        <div class="nametime">

            <b>제목 : <?php echo strip_tags($row['review_title']); ?></b>
            
          <p class="star" style="text-shadow: -1px 0 #000, 0 1px #000, 1px 0 #000, 0 -1px #000; color:yellow;">
        <?php 
            for($i = 0; $i < $row['star_point']; $i++){
                echo "★";
            }
        ?>
        </p>
            
            <?php echo strip_tags($row['write_day']); ?>
            
        </div>
        </a>
    </div>
    <?php
        $total--;
            }
    ?>
            </div>
    


            <a href="../action/logout.php">
                <div class="main-screen__delete">
                    
                    <p>로그아웃</p>
                </div>
            </a>

            <a href="../action/delete_check.php">
                <div class="main-screen__delete">
                    
                    <p>계정 삭제</p>
                </div>
            </a>


        </main>

        
    <?php
    } else {
    ?>
    <div class="container">
        
        <h1>로그인이 필요한 기능입니다.</h1>
        <div class="abox">
            
        <a href="../page/login_form.php">로그인하기</a>
        <a href="../page/register_form.php">회원가입하기</a>

        </div>
    </div>
    <?php
    }
    ?>
     <nav class="nav">
<?php include '../inc_src/menu.php'?>
    </nav>
</body>
<script src="https://kit.fontawesome.com/97a77746ec.js" crossorigin="anonymous"></script>

</html>