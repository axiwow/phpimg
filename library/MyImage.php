<?php 
class MyImage{
  //json要增加二级支持
    const LIST = "main";
    const FILE_WIDTH = "fileWidth";
    const IMAGE_NUM = "imageNum";
    public $filePath;
    //const FILE_PATH2 = "D:\BaiduNetdiskDownload\美女";
    public $dir = [];
    public static $fileWidth;
    public static $imageNum;
    public function __construct()
    {
      $json_string = file_get_contents('data.json');
      $filePathArr = json_decode($json_string,true);
      
      // var_dump($this->filePath);
      //读取main的值，获取file_width的值
      $main_value = $filePathArr[self::LIST];
      self::$imageNum = $filePathArr[self::IMAGE_NUM];
      self::$fileWidth = $filePathArr[self::FILE_WIDTH];
      
      $this->filePath = $filePathArr[$main_value];
      // var_dump(self::$fileWidth);
    }
    public function searchDir($path,&$files){
        if(is_dir($path)){
          $opendir = opendir($path);
          while ($file = readdir($opendir)){
            if($file != '.' && $file != '..'){
              $this->searchDir($path.'/'.$file, $files);
            }
          }
          closedir($opendir);
          $this->dir[] = $path;
        }
        if(!is_dir($path)){
          $files[] = $path;
        }
      }
      //得到目录名
      public function getDir($dir){
        $files = array();
        $this->searchDir($dir, $files);
        return $files;
      }
}