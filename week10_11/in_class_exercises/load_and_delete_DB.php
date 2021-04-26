<html>
<body>
    <!----Object inside object-->
<?php
require_once 'common.php';
?>

<?php
       $dao = new PersonDAO();


       if(isset($_POST["deletebt"])){
        $list_id = $_POST["checkbox"];
        //var_dump($list_id);
        foreach($list_id as $id){
            $dao->delete($id);
        }
    }

    
       $list_pp = $dao->loadAll();
       // Now we load database and print
       echo "<form action='load_and_delete_DB.php' method='POST'>";
       echo "<table border='1' style=\"color:red\" >";
        
        echo "<th></th><th> Index </th> <th> Name </th> <th> Age </th> <th> Gender </th> <th> Rating </th>";
        //$id = 1;
        foreach($list_pp as $ps){
            echo "<tr>"; 
            $id =   $ps->get_id();
            $name = $ps->get_name();
            $age = $ps->get_age();
            $gender = $ps->get_gender();
            $rating = $ps->get_rating();
            echo "  <td> <input name=\"checkbox[]\" type=\"checkbox\" value = \"$id\"/> </td>     <td> $id </td> <td> $name </td> <td> $age </td> <td> $gender </td> <td> $rating </td>";
            echo "</tr>";
            //$id++;
        }   
        echo "</table>";
        echo "<br/>";
        echo "<input type='submit' value='Delete' name = 'deletebt' />";
        echo "</form>";

       
?>

</body>
</html>
