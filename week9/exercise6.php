<html>

<body>
    <?php
    class Person
    {
        public $name;
        public $age;
        public $gender;
        public $rating_score;

        function __construct($name, $age, $gender, $rating_score)
        {
            $this->name = $name;
            $this->age = $age;
            $this->gender = $gender;
            $this->rating_score = $rating_score;
        }

        function get_rate()
        {
            if ($this->rating_score >= 9) {
                return ["Very good", "0E1A9A"];
            } elseif ($this->rating_score >= 8) {
                return ["Good", "35EA22"];
            } elseif ($this->rating_score <= 8 && $this->rating_score >= 5) {
                return ["Moderate", "10150F"];
            } elseif ($this->rating_score < 5 && $this->rating_score >= 2) {
                return ["Low", "DC17DF"];
            } else {
                return ["Very low", "FC0D2A"];
            }
        }

        function get_stars() {
            if($this->rating_score >= 9){
                return ["Very good",5];
            }elseif($this->rating_score >= 8){
               return ["Good",4];
            }elseif($this->rating_score<= 8 && $this->rating_score >= 5){
               return ["Moderate",3];
            }elseif($this->rating_score< 5 && $this->rating_score >= 2){
               return ["Low",2];
            }else{
               return ["Very low",1];
            }
         }
        
         function generate_stars($num_stars)
         {
             return str_repeat("<img width='10' src='./star.webp'>", $num_stars);
         }
    }

    $name_list = [
        "ANG YUE JUN",
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
        "HAJARAH PARVEEN"
    ];

    $gender_list = ['Male', 'Female'];


    ?>

    <form action="exercise6.php" method="post">
        Number of students
        <input type="number" name="num_student" id="num_student">
        <input type="submit" value="Generate">
    </form>

    <?php
    if (isset($_POST['num_student']) && $_POST['num_student'] > 0) {
        echo "<table border='1'>
            <tr>
                <th>Index</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Rating</th>
                <th>Rated</th>
                <th>Stars</th>
            </tr>";

        $list_students = [];
        $num_student = $_POST['num_student'];
        for ($i = 0; $i < $num_student; $i++) {
            $rand_name = $name_list[rand(0, count($name_list) - 1)];
            $rand_age = rand(18, 24);
            $rand_gender = $gender_list[rand(0, 1)];
            $rand_rating = rand(0, 100) / 10;
            $list_students[] = new Person($rand_name, $rand_age, $rand_gender, $rand_rating);
        }

        $i = 1;
        foreach ($list_students as $stu) {
            $rate = $stu->get_rate();
            $evaluation = $rate[0];
            $color = $rate[1];
            $stars = $stu->get_stars();
            $num_stars = $stars[1];
            $star_text = $stu->generate_stars($num_stars);
            echo "<tr>
                <td>$i</td>
                <td>$stu->name</td>
                <td>$stu->age</td>
                <td>$stu->gender</td>
                <td>$stu->rating_score</td>
                <td style='color:$color;'>$evaluation</td>
                <td>$star_text</td>
            </tr>";
            $i++;
        }


        echo "</table>";
    }
    ?>
</body>

</html>