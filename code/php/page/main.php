<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="../../css/style.css">
    <?php 
        include "../inc_src/DBCnt.php";
        include "../inc_src/UserSession.php";
    ?>
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

        body{
            background-color: #f1f1f5;
        }


        * {
            font-family: 'LeferiPoint-WhiteA';
            box-sizing: border-box;
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


        .nametime{
            padding-top: 20px;
            border-radius: 32px;
            margin-bottom: 60px;
            box-shadow: 0 0 3px rgba(0,0,0, .4);
            text-align: center;
            background-color: white;
        }

        h3{
            margin-top: 30px;
            text-align: center;
        }

        .img_rev{
            display: block;
            margin: auto;
            border: 1px #bbb solid ;
            margin-top: 20px;
            width: 300px;
            height: 400px;
            border-radius: 22px;
            box-shadow: 0 0 3px rgba(0, 0, 0, .4);
            margin-bottom: 20px;
        }

        .comm_box{
            width: 90%;
            margin:auto;
            
        }
    </style>
</head>
<body>
    
<?php
$sql = "SELECT * FROM review_info ORDER BY review_idx DESC";
$result = $conn->query($sql);
$total = mysqli_num_rows($result);
        while($row = mysqli_fetch_assoc($result)){ //DB에 저장된 데이터 수 (열 기준)
            ?>

    <div class="comm_box">
        <a href="../page/Readmore.php?id=<?php echo strip_tags($row['review_idx']);?>" >
        <div class="nametime">
            <img src="../../file/<?php echo strip_tags($row['img_address']) ?>.png" class="img_rev"> 
            <br />
            <b><?php echo strip_tags($row['shop_name']); ?></b>
            
            <br />
            <p class="star" style="text-shadow: -1px 0 #000, 0 1px #000, 1px 0 #000, 0 -1px #000; color:yellow;">
        <?php 
            for($i = 0; $i < $row['star_point']; $i++){
                echo "★";
            }
        ?>
        </p><b>제목 : <?php echo strip_tags($row['review_title']); ?></b>
            
            <br />
            <?php echo strip_tags($row['write_day']); ?>
            
            
            <br />
        </div>
        </a>
    </div>
    <?php
        $total--;
            }

        
    ?>

    <nav class="nav">
    <?php include '../inc_src/menu.php'?>
    </nav>
</body>
<script src="https://kit.fontawesome.com/97a77746ec.js" crossorigin="anonymous"></script>
</html>