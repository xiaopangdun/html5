<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 2018/6/8
 * Time: 10:28
 */

class TestController
{
    public $url = 'http://www.xinshubao.net/17/17970/';
    public function execute(){
        set_time_limit(0);
        header("Content-type: text/html; charset=GBK");
        $this->e($this->url.'2165013.html',2165013,false);
    }
    public function e($url,$n,$check){
        $html = $this->c($url);
        preg_match('/<a .*?>��һ��<\/a>/',$html,$nextUrl);
        if(empty($nextUrl)){
            die('���µ�ַ��:'.$url);
        }
        $nextUrl = explode('"',$nextUrl[0]);
        $nextUrl = $nextUrl[1];
        preg_match('/<h1>.*?<\/h1>/',$html,$title);
        if(empty($title)){
            die('�����:'.$url);
        }
        $title = substr($title[0],4,-5);
        $content = explode('id="content"',$html)[1];
        $content = explode("</div>",$content)[0];
        $content = str_replace(array('<br /><br />','&nbsp;','<br><br>','<br>','<br />','&nbsp'),array("\r\n",'',"\r\n","\r\n","\r\n",''),$content);
        $content = substr($content,'1');
        $content = str_replace("\r\n\r\n","\r\n",$content);
        $content = str_replace("<script>s3();</script>","",$content);
        if(empty($content)){
            die('���ݿ�:'.$url);
        }
        if($check){
           $data = $content;
        }else{
            $data = $title."\r\n".$content."\r\n";
        }
        $nextN = (int)$nextUrl;
        if($nextN==$n){
            $check = true;
        }else{
            $check = false;
        }
        file_put_contents('4.txt',$data,FILE_APPEND);
        if($nextUrl==$this->url){
            die('end');
        }
        sleep(10);
        $this->e($this->url.$nextUrl,$check);
    }
    public function c($url){
        $ch = curl_init();
        // 2. ����ѡ�����URL
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,0);
        // 3. ִ�в���ȡHTML�ĵ�����
        $output = curl_exec($ch);
        if($output === FALSE ){
            echo "CURL Error:".curl_error($ch);
            echo '<br>'.$url;die;
        }
        // 4. �ͷ�curl���
        curl_close($ch);
        return $output;
    }
}
$test = new TestController();
$test->execute();