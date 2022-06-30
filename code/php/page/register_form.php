<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <title>REGISTER</title>
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

    * {
        font-family: 'LeferiPoint-WhiteA';
    }

    h1 {
        font-family: 'S-CoreDream-2ExtraLight';
    }
</style>
<script src="../../js/checkInfo.js"></script>
<script src="../../js/connection.js"></script>

<body>
    <?php
    include '../inc_src/DBCnt.php';

    ?>
    <header class="welcome-header">

        <h1 class="account_title welcome-header__title">CREATE ACCOUNT</h1>
    </header>
    <div class="container">
        <form id="login-form" action="../../php/action/register_action.php" method="post" autocomplete="off">


            <div class="form-floating">
                <input type="text" class="form-control" placeholder="." id="floatingInput" name="create_id" required />

                <label for="floatingInput">ID</label>
                <div id="notice_box"></div>
                <button type="button" class="btn btn-primary" onclick="checkid();">중복 확인</button>

            </div>


            <div class="form-floating">
                <input type="password" class="form-control" placeholder="." id="floatingInput" name="create_pw" required />
                <label for="floatingInput">PASSWORD</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" placeholder="." id="floatingInput" name="pwchk" required />
                <label for="floatingInput">PASSWORD CHECK</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" placeholder="." id="floatingInput" name="nickname" required />
                <label for="floatingInput">NICKNAME</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" placeholder="." id="floatingInput" name="addr1" required />
                <label for="floatingInput">ADDRESS(CLICK)</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" placeholder="." id="floatingInput" name="addr2" required />
                <label for="floatingInput">DETAIL ADDRESS</label>
            </div>

            <input type="submit" value="Create-Account" onclick="CheckInfo()" class="submitbtn" />
        </form>
    </div>
</body>

<script>
    function checkid() {
        let id = document.querySelector('[name="create_id"]').value;
        if (id) {
            url = "../action/idcheck.php?userid=" + id;
            window.open(url, "chkid", "width=400,height=200");
        } else {
            alert("아이디를 입력하세요.");
        }
    }

    function decide(id) {
        console.log(id);
        document.querySelector('[name="create_id"]').value = id;
        document.querySelector('.submitbtn').disabled = false

    }

    function change() {
        document.querySelector('[name="create_id"]').disabled = false
        document.querySelector('[name="create_id"]').value = ""
        document.querySelector('.submitbtn').disabled = true
    }
</script>

<?php




?>

</html>