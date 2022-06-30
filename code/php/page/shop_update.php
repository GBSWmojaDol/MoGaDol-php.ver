<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <title>WriteReview</title>
</head>

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

    body {
        height: 100%;
    }

    * {
        font-family: 'LeferiPoint-WhiteA';
    }

    h1 {
        font-family: 'S-CoreDream-2ExtraLight';
    }

    .submit_btn {
        margin-top: 20px;
    }

    .radio_box {
        margin-top: 15px;
        text-align: center;
    }

    p {
        text-align: center;
    }

    a {
        text-decoration: none;

    }

    .nav-list {

        padding-top: 8px;

    }

    .nav {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #f9f9fa;
        padding: 0px 50px;
        box-sizing: border-box;
        border-top: 1px solid #8092A3;
    }

    .nav-list {
        width: 100%;
        display: flex;
        justify-content: space-between;
        padding-inline-start: 0px;
    }

    .nav__btn {
        color: #8092A3;
    }

    .nav__link {
        position: relative;
        transition: 0.3s;
        color: #8092A3;
    }

    .nav__link:hover {
        color: #21355B;
    }


    .nav__link img {
        width: 30px;
    }

    .container {
        text-align: center;
        margin-top: 200px;
    }





    .abox {
        margin-top: 70px;
    }

    .abox a {
        margin-left: 10px;
        margin-right: 10px;
    }

    #myjer {
        height: 200px;
        border: 1px #444 solid;
        margin-top: 40px;
        overflow-y: scroll;
    }

    .nametime {
        border: 1px black solid;
        box-shadow: 0 0 2px rgba(0, 0, 0, .4);
        margin-bottom: 10px;
    }

    <?php
    include "../inc_src/UserSession.php";
    include '../inc_src/DBCnt.php';
    ?>
</style>
<script src="../../js/checkInfo.js"></script>
<script src="../../js/connection.js"></script>

<body>
    <header class="welcome-header">

        <h1 class="account_title welcome-header__title">Write Review</h1>
    </header>

    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM shop_info WHERE shop_idx = '" . $id . "';";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);

    if ($jb_login) {
        if ($_SESSION['username'] == $row['writer_name']) {
    ?>


            <div class="container">
                <form id="login-form" enctype='multipart/form-data' action="../../php/action/shop_update_action.php" method="post" autocomplete="off" required>

                    <div class="form-floating">
                        <input type="text" class="form-control" placeholder="." id="floatingInput" name="create_id" value="<?php echo strip_tags($row['shop_name']) ?>" required />
                        <label for="floatingInput">가게 이름을 작성해주세요</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control" placeholder="." id="floatingInput" name="addr1" value="<?php echo strip_tags($row['shop_addr']) ?>" required />
                        <label for="floatingInput">ADDRESS(CLICK)</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control" placeholder="." id="floatingInput" name="addr2" value="<?php echo strip_tags($row['addr_detail']) ?>" required />
                        <label for="floatingInput">DETAIL ADDRESS</label>
                    </div>


                    <select class="form-select" aria-label="Default select example" size="5" name="CategoriSel" value="<?php echo strip_tags($row['categori']) ?>" required>

                        <option selected disabled="disabled">Open this select categories</option>
                        <option value="일식">일식</option>
                        <option value="중식">중식</option>
                        <option value="한식">한식</option>
                        <option value="양식">양식</option>
                        <option value="아시안">아시안</option>
                        <option value="치킨/피자">치킨/피자</option>
                        <option value="디저트">디저트</option>
                        <option value="야식">야식</option>
                        <option value="패스트푸드">패스트푸드</option>
                        <option value="기타">기타</option>

                    </select>

                    <div class="radio_box">
                        <label>포장</label>
                        가능<input type="radio" name="pack" value="1" required>
                        불가능<input type="radio" name="pack" value="0" required>
                        <br />

                        <label>무선 인터넷</label>
                        가능<input type="radio" name="wifi" value="1" required>
                        불가능<input type="radio" name="wifi" value="0" required>
                        <br />

                        <label>예약</label>
                        가능<input type="radio" name="reserve" value="1" required>
                        불가능<input type="radio" name="reserve" value="0" required>
                        <br />
                    </div>
                    <div class="form-floating">
                        <input type="number" class="form-control" placeholder="." id="floatingInput" name="shop_num" value="<?php echo strip_tags($row['call_num']) ?>" required />
                        <label for="floatingInput">Call Number</label>
                    </div>

                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label"></label>
                        <input class="form-control" type="file" id="formFile" accept=".jpeg, .jpg, .png" name="InputFile" required>
                    </div>

                    <p>가게 설명</p>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="content" required>
                    <?php echo strip_tags($row['content']) ?>
                    </textarea>
                        <label for="floatingInput">CONTENT(menu, introduce)</label>
                    </div>


                    <input type="text" style="display: none;" name="review_idx" value="<?php echo $id; ?>" />

                    <input type="submit" value="Update-shop" />
                </form>
            </div>


        <?php
        } else {
            echo "<script>
            console.log(" . $row['writer_name'] . ")
            alert('접근 권한이 없습니다.');
            history.back();
            </script>";
        }
    } else {

        ?>

        <p>로그인이 필요한 기능입니다.</p>
        <a href="../page/login_form.php">로그인 하기</a>

    <?php  } ?>
</body>


</html>