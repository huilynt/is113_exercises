

<html>
<body>
    <!----Object inside object-->
<?php
require_once 'common.php';

$name_list = ["ANG YUE JUN",
"BAK WEN YAN",
"CHENG WEI QI AMANDA",
"CHERYL TAN RUI SHAN",
"CHEUNG KOK KIT JETHRO",
"FOO CHUAN GENG",
"GOH SOON HAO",
"HAM YAN CHOON GLENN",
"HAZYRA BINTE MOHAMED SURANI",
"HO JING YI",
"JALALUDDIN BIN SELAMAT",
"JASMINE LIM JIA YI",
"KEZIA",
"KOH PEI LING",
"KRISTI ELLIE JAUW SHIAN HUEI",
"KUMARAPANDIAN YASHICARAMYA",
"KWAN RUI HSIEN",
"KWEK MING RONG",
"LAU WEI TING",
"LEE CAR MEN",
"LEE KYULIM",
"LEE ZI QI",
"LEONG JUN WEI",
"LIM JIA YI",
"LIM ZHI WEI",
"LIU JINGLIN",
"LOO JIE YI SHEENA",
"LOO YAN WEE",
"MEGAN THONG JIA YI",
"NG LI YE",
"NGO HAN PING",
"NGUYEN MAI PHUONG",
"SHAO ZIHANG",
"TAN HUI RU",
"TAN MING HOE SEAN",
"TAN WEI PING",
"TAY JING WEN",
"TEH XUE ER",
"TEOH CHIN HAO JORDAN",
"WAN XIN",
"WONG KELLY",
"ZHANG YUHENG",
"CHEN FANGQI",
"LEE SEAN JIN",
"HAJARAH PARVEEN"];


?>

<form action='generateDB.php' method='POST'>
Number of people 
<input type="text" name="input" value="10" />
<input type='submit' value='Generate' name = 'tf' />
</form>

<?php
    if(isset($_POST["tf"])){
       $list_pp = [];
       $N = count($name_list);
       $number_of_pp =  $_POST["input"];
       for($i=0; $i < $number_of_pp; $i++){
           $name = $name_list[rand(0,$N-1)];
           $age = rand(18,24);
           $rating = rand(1,100)/10;
           $gender = rand(0,1) == 0?"Male":"Female";
           $list_pp[] = new Person($i,$name,$age,$gender,$rating);           
       }

       // We print a table 

       echo "<table border='1' style=\"color:red\" >";
       
       echo "<th> Index </th> <th> Name </th> <th> Age </th> <th> Gender </th> <th> Rating </th>";
       $id = 1;
       foreach($list_pp as $ps){
        echo "<tr>";   
        $name = $ps->get_name();
        $age = $ps->get_age();
        $gender = $ps->get_gender();
        $rating = $ps->get_rating();
        echo "<td> $id </td> <td> $name </td> <td> $age </td> <td> $gender </td> <td> $rating </td>";
        echo "</tr>";
        $id++;
       }   
       echo "</table>";

       $dao = new PersonDAO();
       $dao->deleteAll();
       foreach($list_pp as $ps){
          $status = $dao->add($ps->get_name(), $ps->get_age(), $ps->get_gender(), $ps->get_rating());
          if (!$status){break;}
       }
       if( $status ) {
        echo "<h1>Insertion was successful</h1>";
      }
      else {
         echo "<h1>Insertion was NOT successful</h1>";
      }
       // Now we add to database

    }
?>



</html>
</body>