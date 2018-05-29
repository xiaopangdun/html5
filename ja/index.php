<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
</head>
<body class="gray-bg">
<div class="site-index">

    <div class="jumbotron" style="margin: 0 auto;width: 300px;padding-top: 300px;">
        <table border="1px;" style="font-size: 20px;width: 100%">
            <?php
            require './data.php';
            shuffle($dataProvider);
            foreach ($dataProvider as $k=>$d){
                if($k%5==0){
                    echo "<tr>";
                }
                echo "<td>".$d."</td>";
                if(($k+1)%5==0){
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>