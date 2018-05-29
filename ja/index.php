<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name=”viewport” content=”width=device-width, initial-scale=1″ />
</head>
<style>
    .jumbotron{
        position: fixed;
        top: 0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        margin: auto;
        width: 60%;padding-top: 300px;
    }
    button{
        width: 80px;
        height: 50px;
        background-color: #97fff8;
    }
</style>
<body class="gray-bg">
<div class="site-index">
    <div class="jumbotron">
        <div style="margin-bottom: 26px;"><button id="tip" onclick="tip();">提示</button>&nbsp;&nbsp;&nbsp;&nbsp<button id="refresh" onclick="toRefresh();">刷新</button></div>

        <table border="1px;" style="font-size: 40px;width: 100%">
            <?php
            require './data.php';
            shuffle($dataProvider);

            foreach ($dataProvider as $k=>$d){
                if($k%5==0){
                    echo "<tr>";
                }
                echo "<td>".$d[0]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='tip' style='display: none'>".$d[1]."</span></td>";
                if(($k+1)%5==0){
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
</div>
<script src="/html5/js/jquery.js"></script>
<script>
    function tip() {
        $(".tip").fadeIn(2);
        var  n = 5;
        timer = setTimeout(function () {
            $(".tip").fadeOut(2);
        },'3000');
    }
    function toRefresh() {
        window.location.href = window.location.href;
    }
</script>
</body>
</html>