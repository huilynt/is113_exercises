

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
  function get_age() {
    return $this->age;
  }
  function get_gender() {
    return $this->gender;
  }
  function get_rating() {
    return $this->rating;
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

<form action='ex8.php' method='POST'>
<table border='1'>
    <tr><td>
Numbe of students </td><td> 
<input type="text" name="input" value="10" /></td>
<tr>
<td>
Sort by</td>
<td>
<input name="gd" type="radio" value="Name" checked id="id_name"/>
<label for="id_name">Name</label>
<input name="gd" type="radio" value="Age" checked id="id_red"/>
<label for="id_red">Age</label>
<input name="gd" type="radio" value="Gender" id="id_green"/>
<label for="id_green">Gender</label>
<input name="gd" type="radio" value="Rating" id="id_blue"/>
<label for="id_blue">Rating</label>
</td>
</table>
<input type='submit' value='Generate and Sort' name = 'gs' />
</form>

<?php
    if(isset($_POST["gs"])){
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
      

       // We sort 

       $l_age = [];
       $l_rating = [];
       $l_gender = [];
       $l_name = [];
       $i = 0;
       foreach($list_pp as $ps){
           $l_age["$i"] = $ps->get_age();
           $l_name["$i"] = $ps->get_name();
           $l_rating["$i"] = $ps->get_rating();
           $l_gender["$i"] = $ps->get_gender();
           $i++;
       }
       asort($l_gender);
       asort($l_age);
       asort($l_rating);
       asort($l_name);

       switch ($_POST["gd"]) {
        case "Name":
           $lid = $l_name;
           break;
        case "Age":
           $lid = $l_age;
           break;
        case "Gender":
            $lid = $l_gender;
            break;
        default:
            $lid = $l_rating;
          
      }
       
       // We print a table 

       echo "<table border='1' style=\"color:red\" >";
       
       echo "<th> Index </th> <th> Name </th> <th> Age </th> <th> Gender </th> <th> Rating </th>";
       $id = 1;
       foreach($lid as $key=>$value){
        $ps = $list_pp[$key];
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