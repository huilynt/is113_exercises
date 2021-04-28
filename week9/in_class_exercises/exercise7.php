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

    $num_student = 0;
    $sel_gender = 'Male';
    ?>

    <form action="exercise7.php" method="post">
        <table border="1">
            <tr>
                <td>Number of students</td>
                <td>
                    <input type="number" name="num_student" id="num_student" value="$num_student">
                </td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <input type="checkbox" name="gender" id="gender" value='Male'> Male
                    <input type="checkbox" name="gender" id="gender" value='Female'> Female
                    <input type="checkbox" name="gender" id="gender" value='All'> All
                </td>
            </tr>
            <tr>
                <td>Range of age</td>
                <td>
                    from
                    <input type="number" name="min_age" id="min_age">
                    to
                    <input type="number" name="max_age" id="max_age">
                </td>
            </tr>
            <tr>
            <td>Range of rating</td>
                <td>
                    from
                    <input type="number" name="min_rate" id="min_rate">
                    to
                    <input type="number" name="max_rate" id="max_rate">
                </td>
            </tr>
        </table>

        <input type="submit" name='generate' value="Generate">
        <input type="submit" name='filter' value="Generate and Filter">
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
            echo "<tr>
                <td>$i</td>
                <td>$stu->name</td>
                <td>$stu->age</td>
                <td>$stu->gender</td>
                <td>$stu->rating_score</td>
            </tr>";
            $i++;
        }
        echo "</table>";

        echo "<br><br>";

        $sel_gender = $_POST['gender'];
        $min_age = $_POST['min_age'];
        $max_age = $_POST['max_age'];
        $min_rate = $_POST['min_rate'];
        $max_rate = $_POST['max_rate'];
        echo "After filtering...";
        echo "<table border='1'>
            <tr><td>Number of students</td><td>$num_student</td></tr>
            <tr><td>Gender</td><td>$sel_gender</td></tr>
            <tr><td>Range of age</td><td>from $min_age to $max_age</td></tr>
            <tr><td>Range of rating</td><td>from $min_rate to $max_rate</td></tr>
        </table>";

        echo "<br><br>";
        echo "<table border='1'>
            <tr>
                <th>Index</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Rating</th>
            </tr>";

        $filtered_student = [];
        foreach ($list_students as $stu) {
            if (($sel_gender == 'All' || $stu->gender == $sel_gender) &&
            ($stu->age >= $min_age && $stu->age <= $max_age) &&
            ($stu->rating_score >= $min_rate && $stu->rating_score <= $max_rate)) {
                $filtered_student[] = $stu;
            }
        }

        $i = 1;
        foreach ($filtered_student as $stu) {
            echo "<tr>
                <td>$i</td>
                <td>$stu->name</td>
                <td>$stu->age</td>
                <td>$stu->gender</td>
                <td>$stu->rating_score</td>
            </tr>";
            $i++;
        }


        echo "</table>";
    }
    ?>
</body>

</html>