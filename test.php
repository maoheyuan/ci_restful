<?php


function foreachDir($path,$dext){
    $handle=opendir($path);
    if($handle){
        while (false !== ($file = readdir($handle))) {
            if($file!="." && $file!='..'){

                if(is_dir($path.$file)){
                    foreachDir($path.$file,$dext);
                }else{
                    $src = $path.'/'.$file;
                    $dest = $path.'/'.$file.'.'.$dext;
                    rename($src,$dest);

                }
            }
        }
        return false;
    }
}
//foreachDir('F:\ci_admin\upload\image\goods','jpg');