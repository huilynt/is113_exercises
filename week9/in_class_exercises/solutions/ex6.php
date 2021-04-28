

<html>
<body>
    <!----Object inside object-->
<?php
class Person {
  // Properties
  public $name;
  public $age;
  public $gender;
  public $rating; // IS or CS

  // Methods

  function __construct($name,$age,$gender,$rating) {
    $this->name = $name;
    $this->age = $age;
    $this->gender = $gender;
    $this->rating = $rating;
  }
   
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}

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

<form action='ex6.php' method='POST'>
Numbe of students 
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
           $list_pp[] = new Person($name,$age,$gender,$rating);           
       }

       // We print a table 

       echo "<table border='1' style=\"color:red\" >";
       
       echo "<th> Index </th> <th> Name </th> <th> Age </th> <th> Gender </th> <th> Rating </th>";
       $id = 1;
       foreach($list_pp as $ps){
        echo "<tr>";   
        echo "<td> $id </td> <td> $ps->name </td> <td> $ps->age </td> <td> $ps->gender </td> <td> $ps->rating </td>";
        echo "</tr>";
        $id++;
       }   
       echo "</table>";

    }
?>



</html>
</body>