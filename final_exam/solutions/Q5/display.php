<?php
require_once 'Sudoku.php';
require_once 'SudokuDAO.php';

session_start();

if (!isset($_SESSION['current-game'])) {
    $dao = new SudokuDAO();
    $sudoku = $dao->get();
    $_SESSION['current-game'] = $sudoku;
}

$sudoku = $_SESSION['current-game'];

/*
  Task: 
  Gets the row, col and cell value from the $_POST object(if they are sent
  over). It will update the board if the board cell is empty 
  (i.e. whitespace).
*/

if( isset($_POST['row']) ) {
    $row = $_POST['row'];
    $col = $_POST['col'];
    $value = $_POST['value'];

    if ( $sudoku->getCellValue($row, $col) == ' ' ) {
        $sudoku->setCellValue($row, $col, $value);
    }
}

$message = "";
if ( $sudoku->isValid() ) {
    $message = "SUCCESS";
    unset($_SESSION['current-game']);
}

/*
  This will print the 9 x 9 suduko as an HTML table
 */
function generate_board($sudoku) {
    echo "<table>";
    for( $row = 0; $row < count($sudoku->getBoard()); $row++ ) {
        echo "<tr>";
        for( $col = 0; $col < count($sudoku->getBoardRow($row)); $col++ ) {
            echo "<td>{$sudoku->getCellValue($row, $col)}</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>
<html>
<head>
    <style>
    	td {
            border: 1px black solid;
            width: 30px;
            height: 30px;
            text-align: center;
    	}
    	body {
            font-family: courier;
    	}
    </style>
</head>
<body>

<?php 
    generate_board($sudoku); 
    echo "<h1>$message</h1>";
?>

<form method='post'>
    Row: <select name='row'>
        <option value='0'>0</option>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
        <option value='6'>6</option>
        <option value='7'>7</option>
        <option value='8'>8</option>
    </select>
    Col: <select name='col'>
        <option value='0'>0</option>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
        <option value='6'>6</option>
        <option value='7'>7</option>
        <option value='8'>8</option>
    </select>
    Value: <select name='value'>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
        <option value='6'>6</option>
        <option value='7'>7</option>
        <option value='8'>8</option>
        <option value='9'>9</option>
    </select>
    <input type='submit' name='action' value='Add Move' />
</form>
</body>
</html>
