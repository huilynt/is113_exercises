<html>

<body>
    <?php
    // require_once "Student.php";
    // require_once "Section.php";
    spl_autoload_register(function ($class) {
        require_once $class . ".php";
    });

    $G8 = new Section("G8", 45, "3.30pm on Monday", "SR 2.1");
    $st1 = new Student("Yong", 2019, "IS");
    $st2 = new Student("Bi Rain", 2019, "CS");
    $G8->add_student($st1);
    $G8->add_student($st2);

    var_dump($G8->get_list_student());
    ?>

</html>
</body>