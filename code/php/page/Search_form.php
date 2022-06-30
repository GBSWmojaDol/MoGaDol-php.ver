<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/699db093f5.js" crossorigin="anonymous"></script>
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
            border-radius: 12px;
            margin-top: 40px;
            overflow-y: scroll;
        }

        .nametime{
            border: 1px black solid;
            border-radius: 4px;
            box-shadow: 0 0 2px rgba(0, 0, 0, .4);
            margin-bottom: 10px;
        }

 
    </style>
  <title>Search</title>
</head>

<body>
 
    <form id="search-form" action="../page/SearchVal.php" method="get">
      <div class="form-floating" id="searchBox">
      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="search" autocomplete="off">
        <label for="floatingInput">검색할 식당 이름을 입력하세요</label>
      </div>
    </form>

    <nav class="nav">
    <?php include '../inc_src/menu.php';
    include "../inc_src/DBCnt.php";?>
   
    </nav>
  
</body>   

</html>
