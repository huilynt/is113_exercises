<html>

<body>
    <?php
    spl_autoload_register(function ($class) {
        require_once "$class.php";
    });

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
            </tr>";

        $list_students = [];
        $num_student = $_POST['num_student'];
        for ($i = 0; $i < $num_student; $i++) {
            $index = $i + 1;
            $rand_name = $name_list[rand(0, count($name_list) - 1)];
            $rand_age = rand(18, 24);
            $rand_gender = $gender_list[rand(0, 1)];
            $rand_rating = rand(0, 100) / 10;
            $list_students[] = new Person($index, $rand_name, $rand_age, $rand_gender, $rand_rating);

            echo "
            <tr>
                <td>$index</td>
                <td>$rand_name</td>
                <td>$rand_age</td>
                <td>$rand_gender</td>
                <td>$rand_rating</td>
            </tr>";
        }

        $person_dao = new PersonDAO();
        $person_dao->deleteAll();
        foreach ($list_students as $stu) {
            $status = $person_dao->add($stu->getName(), $stu->getAge(), $stu->getGender(), $stu->getRatingScore());
            if (!$status) {
                break;
            }
        }
        if ($status) {
            echo "<h1>Insertion was successful</h1>";
        } else {
            echo "<h1>Insertion was NOT successful</h1>";
        }

        echo "</table>";
    }
    ?>

</body>

</html>