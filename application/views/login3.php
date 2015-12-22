<?php
 session_start();
if( ($conn = mysql_connect("localhost","root","")) === FALSE)
   {
     die("不能连接到数据库1");
   }
    if(mysql_select_db("yidai").$conn === FALSE)
      {
        die("不能连接到对应数据库2");
      }
    if(isset($_POST["user"]) && isset($_POST["pass"]))
    
        
 
     { $sql= "SELECT * FROM master WHERE master.mastername='".$_POST["user"]."' AND master.masterpass='".$_POST['pass']."'";
        $result = mysql_query("".$sql."",$conn);
      }
        if ($result === FALSE)
           {
               die("不能访问数据库数据或数据不存在");
           }
            
        if (mysql_num_rows($result) == 1)
            {
                $row = mysql_fetch_assoc($result);
            }
            if ($row["masterpass"] == $_POST["pass"])
            {
                $user = $row["masterpass"];
                $_SESSION["authenticated"] = TRUE;
                $host = $_SERVER["HTTP_HOST"];
                $path = rtrim(dirname($_SERVER["PHP_SELF"]),"/\\");
                header("Location:http://$host$path/search.html?$user");
                exit;
            }   
 ?>           