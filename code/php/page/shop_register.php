<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <title>SHOP REGISTER</title>
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

    body{
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

    .menu_name{
        margin-top : 10px;
    }
</style>
<script src="../../js/checkInfo.js"></script>
<script src="../../js/connection.js"></script>

<body>


    <header class="welcome-header">

        <h1 class="account_title welcome-header__title">SHOP REGISTER</h1>
    </header>
    <?php
    include '../inc_src/UserSession.php';
    include "../inc_src/DBCnt.php";
    if ($jb_login) { ?>
        <div class="container">
            <form id="login-form" action="../../php/action/shop_action.php" method="post" autocomplete="off" enctype='multipart/form-data'>

                <div class="form-floating">
                    <input type="text" class="form-control" placeholder="." id="floatingInput" name="shop_name" required />
                    <label for="floatingInput">SHOP_NAME</label>
                </div>

                <div class="form-floating">
                    <input type="text" class="form-control" placeholder="." id="floatingInput" name="addr1" required />
                    <label for="floatingInput">ADDRESS(CLICK)</label>
                </div>

                <div class="form-floating">
                    <input type="text" class="form-control" placeholder="." id="floatingInput" name="addr2" required />
                    <label for="floatingInput">DETAIL ADDRESS</label>
                </div>

                <select class="form-select" aria-label="Default select example" size="5" name="CategoriSel" required>

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
                    <input type="number" class="form-control" placeholder="." id="floatingInput" name="shop_num" required />
                    <label for="floatingInput">Call Number</label>
                </div>

                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label"></label>
                    <input class="form-control" type="file" id="formFile" accept=".jpeg, .jpg, .png" name="InputFile" required>
                </div>

                <p>가게 설명</p>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="content" required></textarea>
                    <label for="floatingInput">CONTENT(menu, introduce)</label>
                </div>
                <br />
                <br />

                <p class="menu_name">메뉴 1</p>
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label"></label>
                    <input class="form-control" type="file" id="formFile" accept=".jpeg, .jpg, .png" name="menuFile1" required>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" placeholder="." id="floatingInput" name="ShopMenu1Name" required />
                    <label for="floatingInput">menu-name</label>
                </div>
                <div class="form-floating">
                    <input type="number" class="form-control" placeholder="." id="floatingInput" name="ShopMenu1Price" required />
                    <label for="floatingInput">menu-price</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="MenuContent1" required></textarea>
                    <label for="floatingInput">introduce</label>
                </div>

                <p class="menu_name">메뉴 2</p>
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label"></label>
                    <input class="form-control" type="file" id="formFile" accept=".jpeg, .jpg, .png" name="menuFile2" required>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" placeholder="." id="floatingInput" name="ShopMenu2Name" required />
                    <label for="floatingInput">menu-name</label>
                </div>
                <div class="form-floating">
                    <input type="number" class="form-control" placeholder="." id="floatingInput" name="ShopMenu2Price" required />
                    <label for="floatingInput">menu-price</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="MenuContent2" required></textarea>
                    <label for="floatingInput">introduce</label>
                </div>
                <p class="menu_name">메뉴 3</p>
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label"></label>
                    <input class="form-control" type="file" id="formFile" accept=".jpeg, .jpg, .png" name="menuFile3" required>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" placeholder="." id="floatingInput" name="ShopMenu3Name" required />
                    <label for="floatingInput">menu-name</label>
                </div>
                <div class="form-floating">
                    <input type="number" class="form-control" placeholder="." id="floatingInput" name="ShopMenu3Price" required />
                    <label for="floatingInput">menu-price</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="MenuContent3" required></textarea>
                    <label for="floatingInput">introduce</label>
                </div>
                <input type="submit" value="Create Shop" class="submit_btn" />
            </form>
        </div>
    <?php   } else {

    ?>

        <div class="container">

            <h1>로그인이 필요한 기능입니다.</h1>
            <div class="abox">

                <a href="../page/login_form.php">로그인하기</a>
                <a href="../page/register_form.php">회원가입하기</a>

            </div>
        </div>

        <nav class="nav">
    <?php
        include '../inc_src/menu.php';
    } ?>
    </nav>
</body>

</html>