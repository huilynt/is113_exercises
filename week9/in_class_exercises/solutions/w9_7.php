<!DOCTYPE html>
<html>
<head>
	<title>
		ex 7
	</title>
</head>
<body>
<form method="post">
	<table border=1>
		<tr><td>Number of Students</td><td><input type="text" name="num_stu"></td></tr>
		<tr><td>Gender</td><td><input type="radio" name="gender" value='Male'>Male<input type="radio" name="gender" value='Female'>Female<input type="radio" name="gender"value='A'>All</td></tr>
		<tr><td>Range of age</td><td>from <input type="text" name="min_age">to<input type="text" name="max_age"></td></tr>
		<tr><td>Range of rating</td><td>from <input type="text" name="min_rate">to<input type="text" name="max_rate"></td></tr>
	</table>
	<input type="submit" name='submit' value='Generate'><input type="submit" name='submit' value='Generate and Filter'>
</form>
<?php
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
$m_f=['Male','Female'];

if (isset($_POST)) {
	class Person{
	//properties
	public $name;
	public $age;
	public $gender;
	public $rating;

	function __construct(){
		$this->name=rand(0,44);
		$this->gender=rand(0,1);
		$this->age=rand(18,24);
		$this->rating=number_format(rand(0,9)+(rand(0,10)/10),1);
	}

	function set_name($name){
		$this->name=$name;
	}
	function set_gender($age){
		$this->gender=$gender;
	}
	function set_rating($rating){
		$this->rating=$rating;
	}


	}
	echo "<table border='1'><tr><th>Index</th><th>Name</th><th>Age</th><th>Gender</th><th>Rating</th></tr>";
	$iterations=$_POST['num_stu']*1;
	$i=0;
	$rt_min=$_POST['min_rate'];
	$rt_max=$_POST['max_rate'];
	$age_min=$_POST['min_age'];
	$age_max=$_POST['max_age'];
	$ref_gender=$_POST['gender'];
	$filt=$_POST['submit']=='Generate and Filter';

	while ($i < $iterations) {
		$temp=new Person();
		$gen_tes=$temp->gender==0?'Male':'Female';
		if (!$filt || 
				($temp->rating<=$rt_max &&
				$temp->rating>=$rt_min &&
				$temp->age<=$age_max &&
				$temp->age<=$age_min) &&
				($gen_tes==$ref_gender || $ref_gender=='A')
			) {
			# code...
				$ind=$i+1;
				$name_id=$temp->name;
				$gender=$temp->gender;
				echo "<tr><td>$ind</td>
					<td>$name_list[$name_id]</td>
					<td>$temp->age</td>
					<td>$m_f[$gender]</td>
					<td>$temp->rating</td></tr>";
			$i+=1;
			}
		
		}
	echo "</table>";
}

?>
</body>
</html>
