<?php
class Database extends PDO
{
     public function __construct($DB_TYPE,$DB_HOST,$DB_NAME,$DB_USER,$DB_PASS)
    {
        try{
            parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME,$DB_USER,$DB_PASS);  // __construct represents connection of database
           }
        catch (PDOException $error) {
            echo $error->getMessage(); //Error message
            exit(); //exit 
        }
    }
    public function insert($table,$data)
    {
        $fieldNames=implode(',',array_keys($data));
        //var_dump($fieldNames);
        //echo '<br>';
        $fieldValues=':'.implode(', :',array_keys($data));
        //var_dump($fieldValues);
        $stmt=$this->prepare("INSERT INTO $table ($fieldNames) VALUES ($fieldValues)"); //prepare the statement
        //bind_param() is used to bind the parameter
        //var_dump($stmt);
         foreach($data as $key=>$value)
           {
             $stmt->bindValue(":$key",$value); //bind value
           }
           echo "<pre>";
           print_r($stmt->execute());
           die();
         return $stmt->execute();    //execute the statement
                
    }
   /* public function select_old($fieldNames)
    {
        //var_dump($fieldNames);
        $fieldNames=implode(',',$fieldNames);
        var_dump($fieldNames);
       $sql="select $fieldNames from $table";
       
       $stmt=  $this->prepare($sql); // It Prepare the Statement
       $stmt->execute(); //execute the statement
       if($stmt->rowCount()>0)
       {
           return $stmt->fetchall(); //fetch all the remaining rows
                                     //fetch mode PDO::FETCH_ASSOC , PDO::FETCH_NUM & PDO::FETCH_BOTH. ASSOC return only value, NUM return only numerical keys
       }                             //EXAMPLE: return $stmt->fetchall(PDO::FETCH_ASSOC);
       else
       {
           return null;
       }
    }*/
    public function select($fieldNames,$table,$where=null,$ord=null,$limit=null)
    {
          $fieldNames=implode(',',$fieldNames);
          //var_dump($fieldNames);
          $sql="select DISTINCT $fieldNames from $table";
        //  var_dump($where);
          if(isset($where))
        {
            $whereNameValue=null;            foreach($where as $k=>$v)
            {
               // echo '2';
                $whereNameValue.=" $k=:$k and";
            }
            $whereNameValue=rtrim($whereNameValue,'and');
            $sql.=" WHERE $whereNameValue";
        }
          if(isset($ord))
          {
              $sql.=" Order By $ord";
          }
          if(isset($limit))
          {
              $sql.=" Limit $limit";
          }
         // echo $sql;
          $stmt=$this->prepare($sql);
          
          if(isset($where))
        {
            foreach($where as $k=>$v)
            {
               // echo '1';
                $stmt->bindValue(":$k",$v);
            }
        }
          $stmt->execute();
        //  $arr = $stmt->errorInfo();
         // print_r($arr);
          if($stmt->rowCount()>0)
          {
              return $stmt->fetchAll();
          }
          else
          {
              return null;
          }
          
    }
    /*
     
     
         
     * update 
    $stmt = $pdo->prepare('UPDATE someTable SET name = :name WHERE id = :id');
    $stmt->execute(array(':id'   => $id,':name' => $name  ));
    example over*/
    public function update($table,$data,$where=null)
    {
        $fieldDetails=null;
        $whereData=null;
        foreach($data as $key=>$value)
        {
            $fieldDetails.="$key=:$key,";
        }
        $fieldDetails=rtrim($fieldDetails,',');
        $whereNameValue=null; 
        if($where)
        {
             foreach($where as $k=>$v)
            {
                $whereNameValue.=" $k=:$k and";
            }
            $whereNameValue=rtrim($whereNameValue,'and');       
            $whereNameValue=rtrim($whereNameValue,',');
        }
        $sql="UPDATE $table SET $fieldDetails";
        if($where)
        {
            $sql.=" WHERE $whereNameValue";
        }
        $stmt=$this->prepare($sql);
        foreach($data as $key=>$value)
        {
            $stmt->bindValue(":$key",$value);
        }
        if($where)
        {
            foreach($where as $key=>$value)
            {
                $stmt->bindValue(":$key",$value);
            }
        }
     return  $stmt->execute();
    }
    /*dalete
    $stmt = $pdo->prepare('DELETE FROM someTable WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    */
   public function delete($table,$where)
   {
        $whereNameValue=null;
        foreach($where as $k=>$v)
        {
            $whereNameValue.=" $k=:$k and";
        }
        $whereNameValue=rtrim($whereNameValue,'and');
        $stmt=$this->prepare("DELETE FROM $table WHERE $whereNameValue");
        foreach($where as $k=>$v)
        {
            $stmt->bindValue(":$k",$v);
        }
    return $stmt->execute();   
   }
   
   //,$tables,$match,$join_type,$where,$orderby,$limit
   public function join($fieldNames,$tables,$match,$where=null,$ord=null,$limit=null)
   {
      $fieldNames=implode(',',$fieldNames);
      $sql="select $fieldNames from";
      $inner=null;
      foreach ($tables as $table=>$alise)
      {
          $inner.=" $table as $alise inner join";
      }
      $sql.=rtrim($inner,'inner join' );
      $sql.=" on $match";
      if(isset($where))
        {
            $whereNameValue=null;           
            foreach($where as $k=>$v)
            {
               // echo '2';
                $dot_remove = $k;
                if (strpos($k, '.') !== false) {
                   $dot_remove = explode('.', $k);
                  $dot_remove = isset($dot_remove[1]) ? $dot_remove[1] : $k;
                }

                $whereNameValue.=" $k=:$dot_remove and";
            }
            $whereNameValue=rtrim($whereNameValue,'and');
            $sql.=" where $whereNameValue";
        }


      if(isset($ord))
          {
              $sql.=" $ord";
          }
      if(isset($limit))
          {
              $sql.=" Limit $limit";
          }
          $stmt=$this->prepare($sql);
          
       if(isset($where))
        {
            foreach($where as $k=>$v)
            {
                $dot_remove = $k;
                if (strpos($k, '.') !== false) {
                    $dot_remove = explode('.', $k);
                    $dot_remove = isset($dot_remove[1]) ? $dot_remove[1] : $k;
                }

                $stmt->bindValue(":$dot_remove",$v, PDO::PARAM_INT);
            }
        }
        //echo $sql;
          $stmt->execute();
      /// $arr = $stmt->errorInfo();
        //print_r($arr);
          if($stmt->rowCount()>0)
          {
              return $stmt->fetchAll();
          }
          else
          {
              return null;
          }
     
   }
   public function upload_image($folder,$image_name,$ex_name,$h_pixel,$w_pixel)
   {
     
        $path="upload/$folder/";
        $imagename=$path.$ex_name.'-'.$_FILES[$image_name]['name'];
        move_uploaded_file($_FILES[$image_name]['tmp_name'],$imagename);
        list($width, $height) = getimagesize($imagename) ; 
        $w=$width;
        $h=$height;
        $modwidth = $h_pixel; 
        $modheight = $w_pixel;
        $tn = imagecreatetruecolor($modwidth, $modheight) ; 
        $info=getimagesize($imagename);
        if($info['mime']=='image/jpeg')
        $image = imagecreatefromjpeg($imagename) ;
        elseif($info['mime']=='image/png')
        $image = imagecreatefrompng($imagename) ;
        elseif($info['mime']=='image/gif')
        $image = imagecreatefromgif($imagename) ;
        imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;
        imagejpeg($tn, $imagename, 90) ;
        if(file_exists($imagename))
        {
           return "Add Sucessfully";
        }
        else
        {
           return "Sorry Please Try Again";
        }
      
   }
   public function upload_file($folder,$v_file)
   {
       $target_dir="upload/$folder/";
       $filename=$_FILES[$v_file]["name"];
       $target_file=$target_dir.basename($filename);
       $FileType=  pathinfo($target_file,PATHINFO_EXTENSION);
       if(file_exists($target_file))
       {
           return "Sorry, video File already exists";
           exit;
       }
       if ($_FILES[$v_file]["size"] > 90485760)
       {
            return "Sorry, your file is too large.Maximum SIZE is 90 Mb";
           exit;

       }

       if(move_uploaded_file($_FILES[$v_file]['tmp_name'], $target_dir.$_FILES[$v_file]['name']))
       {
           return "Upload successfully";
       }
       else
       {
           return "Sorry, there was an error uploading your video file";
       }
   }
    public function upload_video($folder,$video_name)
    {
        $target_dir="upload/$folder/";
        $v_name=  $_FILES[$video_name]['name'];
        $target_file=$target_dir.basename($v_name);
        if(file_exists($target_file))
        {
            return "Sorry, video File already exists";
            exit;
        }
        if(move_uploaded_file($_FILES[$video_name]['tmp_name'], $target_dir.$_FILES[$video_name]['name']))
        {
            return "Upload video successfully";
        }
        else
        {
            return "Sorry, there was an error uploading your video file";
        }
    }
  public function count($table,$where=null)
  {
      $sql="SELECT count(*) FROM $table";
       if(isset($where))
        {
            $whereNameValue=null;            foreach($where as $k=>$v)
            {
                $whereNameValue.=" $k=:$k and";
            }
            $whereNameValue=rtrim($whereNameValue,'and');
            $sql.=" WHERE $whereNameValue";
        }
        $stmt=$this->prepare($sql);
          if(isset($where))
        {
            foreach($where as $k=>$v)
            {
                $stmt->bindValue(":$k",$v);
            }
        }
        //echo $sql;
        $stmt->execute();
     return $stmt->fetchColumn();  
     
   }
    public function sum($table,$where=null,$fieldNames)
    {
        $fieldNames=implode(',',$fieldNames);
        $sql="SELECT sum($fieldNames) FROM $table";
        if(isset($where))
        {
            $whereNameValue=null;            foreach($where as $k=>$v)
        {
            $whereNameValue.=" $k=:$k and";
        }
            $whereNameValue=rtrim($whereNameValue,'and');
            $sql.=" WHERE $whereNameValue";
        }
        $stmt=$this->prepare($sql);
        if(isset($where))
        {
            foreach($where as $k=>$v)
            {
                $stmt->bindValue(":$k",$v);
            }
        }
        //echo $sql;
        $stmt->execute();
        return $stmt->fetchColumn();

    }
    public function avg($table,$where=null,$fieldNames)
    {
        $fieldNames=implode(',',$fieldNames);
        $sql="SELECT avg($fieldNames) FROM $table";
        if(isset($where))
        {
            $whereNameValue=null;            foreach($where as $k=>$v)
        {
            $whereNameValue.=" $k=:$k and";
        }
            $whereNameValue=rtrim($whereNameValue,'and');
            $sql.=" WHERE $whereNameValue";
        }
        $stmt=$this->prepare($sql);
        if(isset($where))
        {
            foreach($where as $k=>$v)
            {
                $stmt->bindValue(":$k",$v);
            }
        }
        //echo $sql;
        $stmt->execute();
        return $stmt->fetchColumn();

    }







}
