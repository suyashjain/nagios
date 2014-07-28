<?php
include "objects_template.php";

while (list($key, $value) = each($Objects)) {

         $fWrite = fopen("28072014/$key.txt","w");

        while (list($key2, $value2) = each($value)) {


                        $wrote = fwrite($fWrite, $key2);
                        $wrote = fwrite($fWrite,"\t");

        }
                        $wrote = fwrite($fWrite,"\n");
                        fclose($fWrite);

}
function config_file_list($nagios_config_file){

print "Reading Main Config File:".$nagios_config_file."\n";
$all_config_file=array();

        if($nagios_config_file == ""){

        return $all_config_file;
        }
        if($fp = fopen( $nagios_config_file, "r" )) {

                while ( ! feof( $fp ) ) {

                   $line = fgets( $fp, 1024 );

                   $line=preg_replace("/^\s+/","",$line);

                        if(preg_match("/^cfg_dir/",$line)){


                                $nag_dir=preg_replace("/=|\t+|cfg_dir|\s+|\"/","",$line);

                                $config_file_list=files($nag_dir);


                                        foreach ($config_file_list as $conf_file) {

                                                if(preg_match("/\.cfg$/",$conf_file)){

                                                        echo "Found => ".$conf_file."\n";
                                                        $all_config_file[]=$conf_file;
                                                }

                                        }
                        }

                        if( preg_match("/^cfg_file/",$line)){

                                        $line = preg_replace("/=|\t+|cfg_file|\s+|\"/","",$line);


                                                if(preg_match("/.cfg$/",$line)){
                                                        echo "Found => ".$line."\n";

                                                        $all_config_file[]=$line;
                                                }


                        }

                }

        }

return $all_config_file;

}

function files($path,&$files = array())
{
    $dir = opendir($path."/.");
    while($item = readdir($dir))
        if(is_file($sub = $path."/".$item))
            $files[] = $sub;else
            if($item != "." and $item != "..")
                files($sub,$files);

    return($files);
}


$config_file="/usr/local/nagios/etc/nagios.cfg";

$object_array=array();
$counter        =       0;
$loop_object    =       "";
$cfg_file_list=config_file_list($config_file);

     foreach ($cfg_file_list as $conf_file) {

                $file_content = file($conf_file);



                             foreach ($file_content as $line) {



                                $line   =       preg_replace("/\t+|\s+/"," ",$line);

                                $line   =       preg_replace("/^\s+/","",$line);


                                        if(! preg_match("/^[#|;]/",$line)){

                                                if(! $line == ""){

                                                        $tmp_line=$line;

                                                        if(preg_match("/;/",$line))
                                                        list($tmp_line, $comment) = explode(';', $line, 2);

                                                        if(preg_match("/#/",$line))
                                                        list($tmp_line, $comment) = explode('#', $line, 2);

                                                        $line = $tmp_line;

                                                        if(preg_match("/^define/",$line)){


$object_type=preg_replace("/define|\s+|\t+|{/","",$line);

                                                                $loop_object = $object_type;

                                                                $counter ++;


                                                        }elseif(preg_match("/^}/",$line)){

                                                        }else{

                                                                list($object_option, $option_value) = explode(' ',
$line, 2);




$object_array[$counter][$loop_object][$object_option]=$option_value;



                                                        }
                                                }



                                        }



                                }
        }

#print_r($object_array);

while (list($key, $value) = each($object_array)) {

        while (list($key2, $value2) = each($value)) {

                        $fWrite = fopen("28072014/$key2.txt","a");

                        $mdata=$Objects[$key2];

                        while (list($key3, $value3) = each($mdata)) {

                        $real_val='';

                        if(isset($object_array[$key][$key2][$key3])){
                                $real_val = trim($object_array[$key][$key2][$key3]);
                        }
                        $wrote = fwrite($fWrite, $real_val);
                        $wrote = fwrite($fWrite,"\t");

                        }
                        $wrote = fwrite($fWrite,"\n");
                        fclose($fWrite);
        }
}
#print_r($mdata);

?>

