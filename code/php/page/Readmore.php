<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Readmore</title>
    <link rel="stylesheet" href="../../css/style.css">
  
    <?php 
        include "../inc_src/DBCnt.php";
        include '../inc_src/UserSession.php';
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


        .nametime{
            
            border-radius: 4px;
            margin-bottom: 80px;
            text-align: center;
            
        }

        h3{
            margin-top: 30px;
            text-align: center;
        }

        .img_rev{
            display: block;
            margin: auto;
            margin-top: 20px;
            width: 300px;
            height: 400px;
            border-radius: 22px;
            box-shadow: 0 0 6px rgba(0, 0, 0, .4);
            margin-bottom: 20px;
        }

        .header {
            width: 100%;
            height: 70px;
            border-bottom: 1px solid #ccc;
            line-height: 70px;
        }

      

        .back_icon {
            width: 40px;
            height: 40px;
            vertical-align: middle;
            margin-left: 20px;
        }
        .img_rev {
            display: block;
            margin: auto;
            margin-top: 20px;
            width: 300px;
            height: 400px;
            border-radius: 22px;
            box-shadow: 0 0 6px rgba(0, 0, 0, .4);
            margin-bottom: 20px;
        }

        .container{
            margin-top: 0;
            position: relative;
        }

        .star{
            color: yellow;
            

        }

        
a{
    cursor: pointer;
}

        button{
            
            width: 80%;
            height: 50px;
            display: block;
            background-color : #6172D4;
            font-size: 1.1rem;
            color: white;
            border: none;
            border-radius: 12px;
            margin: auto;
            margin-top: 20px;
            margin-bottom: 100px;
        }
    </style>
</head>
<body>

<?php
$id = $_GET["id"];
$sql = "SELECT * FROM review_info WHERE review_idx =".$id.";";
$result = $conn->query($sql);
$rows = mysqli_fetch_assoc($result);
$str = nl2br($rows['content']);
?>

<div class="header">
        <a href="../page/main.php">
            <img src="../../img/arrow.png" class="back_icon">

        </a>
    </div>

    <div class="container">
        <div class="img">
            <img src="../../file/<?php echo strip_tags($rows['img_address']); ?>.png" class="img_rev">
        </div>

        <?php
        if($jb_login){

            if($rows['writer_name'] == $_SESSION['username']){ ?>
                <div class="ateg_box">
                    <a href ="../page/review_update.php?id=<?php echo $id ?>">수정</a>
                    <a href = "../action/review_delete_action.php?id=<?php echo $id ?>">삭제</a>
                </div>
        
                <?php } }?>
        
        
        <h3><?php echo strip_tags($rows['review_title']); ?></h3>
        <a href="../page/shop_info.php?id=<?php echo strip_tags($rows['shop_idx']); ?>"><p><?php echo strip_tags($rows['shop_name']);?></p></a>
        
        <p>글쓴이 : <?php echo $rows['writer_name']?></p>
        <p>별점</p>
        <p class="star" style="text-shadow: -1px 0 #000, 0 1px #000, 1px 0 #000, 0 -1px #000;">
        <?php 
            for($i = 0; $i < $rows['star_point']; $i++){
                echo "★";
            }
        ?>
        </p>
        <hr />
        <br />
        
        <p>
            <?php echo $str; ?>
        </p>
        <br />
        <hr />  
        <p><?php echo strip_tags($rows['write_day']); ?></p>
    </div>

    <?php 
        $sqlq = "SELECT * FROM review_good WHERE review_idx = ".$id.";";
        $result3 = $conn->query($sqlq);
        $cnt = mysqli_num_rows($result3);
    ?>

    <a href="../action/good_action.php?id=<?php echo $id ?>">
    <button class="button" value="좋아요">
            좋아요 
            <?php echo $cnt ?>
            개
    </button>

    </a>
    
    <nav class="nav">
    <?php include '../inc_src/menu.php'?>
    </nav>
</body>
<script src="https://kit.fontawesome.com/97a77746ec.js" crossorigin="anonymous"></script>
</html>