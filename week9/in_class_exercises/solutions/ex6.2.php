

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
  function get_rate() {
     if($this->rating >= 9){
         return ["Very good","0E1A9A"];
     }elseif($this->rating >= 8){
        return ["Good","35EA22"];
     }elseif($this->rating<= 8 && $this->rating >= 5){
        return ["Moderate","10150F"];
     }elseif($this->rating< 5 && $this->rating >= 2){
        return ["Low","DC17DF"];
     }else{
        return ["Very low","FC0D2A"];
     }
  }

  function get_star() {
    if($this->rating >= 9){
        return ["Very good",5];
    }elseif($this->rating >= 8){
       return ["Good",4];
    }elseif($this->rating<= 8 && $this->rating >= 5){
       return ["Moderate",3];
    }elseif($this->rating< 5 && $this->rating >= 2){
       return ["Low",2];
    }else{
       return ["Very low",1];
    }
 }

  function get_star_html($n_stars){
      $str = "";
      for($i=1; $i <= $n_stars; $i++){
         $str = $str . "<img src=\"https://cdn.iconscout.com/icon/free/png-256/star-bookmark-favorite-shape-rank-16-28621.png\" width=\"10\" height=\"10\">";
      }
      return $str;
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

<form action='ex6.2.php' method='POST'>
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
       
       echo "<th> Index </th> <th> Name </th> <th> Age </th> <th> Gender </th> <th> Rating Score</th> <th> Stars</th>";
       $id = 1;
       foreach($list_pp as $ps){
        echo "<tr>";   
        $rt = $ps->get_star();
        $star_str = $ps->get_star_html($rt[1]);
        //var_dump($star_str);
        echo "<td> $id </td> <td> $ps->name 
        </td> <td> $ps->age </td> <td> 
        $ps->gender </td> <td> $ps->rating </td>  
        <td> $star_str  </td>";
        echo "</tr>";
        $id++;
       }   
       echo "</table>";

    }
?>



</html>
</body>