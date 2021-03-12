

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


function isChosen($person, $gender_type,$range_age,$range_rating){
      
    if($gender_type != "All" && $gender_type!= $person->gender){
         return False;
      }
    if($person->age < $range_age[0] || $person->age > $range_age[1]){
        return False;
      }
    if($person->rating < $range_rating[0] || $person->rating > $range_rating[1]){
        return False;
      }
    return True;

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

<form action='ex7.1.php' method='POST'>
<table border='1'>
    <tr><td>
Numbe of students </td><td> 
<input type="text" name="input" value="10" /></td>
<tr>
<td>
Gender</td>
<td>
<input name="gd" type="radio" value="Male" checked id="id_red"/>
<label for="id_red">Male</label>
<input name="gd" type="radio" value="Female" id="id_green"/>
<label for="id_green">Female</label>
<input name="gd" type="radio" value="All" id="id_blue"/>
<label for="id_blue">All</label>
</td>
</tr>
<tr>
    <td>
        Range of age
    </td>
    <td>
        from <input type="text" name="lb_age" value="18" size = "5"/> to <input type="text" name="ub_age" value="20" size = "5"/>
    </td>
</tr>
<tr>
    <td>
        Range of rating
    </td>
    <td>
        from <input type="text" name="lb_rating" value="3.4" size = "5"/> to <input type="text" name="ub_rating" value="6.7" size = "5"/>
    </td>
</tr>
</table>
<input type='submit' value='Generate' name = 'tf' />
<input type='submit' value='Generate and Filter' name = 'gf' />
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

       // Filter
    }

    if(isset($_POST["gf"])){
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

        $gender_type = $_POST["gd"];
        $range_age = [$_POST["lb_age"], $_POST["ub_age"]];
        $range_rating = [$_POST["lb_rating"], $_POST["ub_rating"]];

        echo "<br/> After filtering ... <br/>";


         echo "<table border='1'>
         <tr><td>
        Numbe of students </td><td> 
        $number_of_pp
        </td>
        <tr>
        <td>
        Gender</td>
        <td> $gender_type
         </td>
        </tr>
        <tr>
            <td>
                Range of age
            </td>
            <td>
                from  $range_age[0] to $range_age[1] 
            </td>
        </tr>
        <tr>
            <td>
                Range of rating
            </td>
            <td>
                from $range_rating[0] to $range_rating[1]
            </td>
        </tr>
        </table> <br/>";

        echo "<table border='1' style=\"color:red\" >";
        
        echo "<th> Index </th> <th> Name </th> <th> Age </th> <th> Gender </th> <th> Rating </th>";
        $id = 1;
        foreach($list_pp as $ps){
         if(isChosen($ps, $gender_type,$range_age,$range_rating)){
            echo "<tr>";   
            echo "<td> $id </td> <td> $ps->name 
            </td> <td> $ps->age </td> <td>
             $ps->gender </td> <td> $ps->rating </td>";
            echo "</tr>";
            $id++;
         }
        }   
        echo "</table>";

 
     }


?>



</html>
</body>