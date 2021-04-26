<?php

/*
    Name:

    Email:
*/

require_once 'model/common.php';
require_once 'model/protect.php';

# == Part B : ENTER CODE HERE == 
$employeeDAO = new EmployeeDAO();
$role = $_SESSION['role'];
$empId = $_SESSION['empId'];

echo "
    <table border='1'>
        <tr>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Spouse</th>
            <th>Child</th>";
if ($role == 'admin') {
    echo "<th>Password</th>";
}
echo "</tr>";

if ($role == 'user') {
    $employee = [$employeeDAO->getEmployee($empId)];
} else {
    $employee = $employeeDAO->getAllEmployees();
}
var_dump($employee);

foreach ($employee as $emp) {
        $spouse = $employeeDAO->getSpouse($empId);
    $children = $employeeDAO->getChildren($empId);

    $spouseDisplay = $spouse ? $spouse->getSpouseName() : 'None';
    $childrenDisplay = '';
    if (count($children) > 0) {
        foreach ($children as $name => $age) {
            $childrenDisplay .= "$name:&nbsp;$age<br>";
        }
    } else {
        $childrenDisplay = 'None';
    }

}

if ($role == 'user') {
    $spouse = $employeeDAO->getSpouse($empId);
    $children = $employeeDAO->getChildren($empId);

    $spouseDisplay = $spouse ? $spouse->getSpouseName() : 'None';
    $childrenDisplay = '';
    if (count($children) > 0) {
        foreach ($children as $name => $age) {
            $childrenDisplay .= "$name:&nbsp;$age<br>";
        }
    } else {
        $childrenDisplay = 'None';
    }

    echo "You are logged out";
    unset($_SESSION['empId']);
    unset($_SESSION['role']);
} else {
    $employeeDAO = new EmployeeDAO();
    $employee = $employeeDAO->getEmployee($empId);
    $spouse = $employeeDAO->getSpouse($empId);
    $children = $employeeDAO->getChildren($empId);

    $spouseDisplay = $spouse ? $spouse->getSpouseName() : 'None';
    $childrenDisplay = 'None';
    if (count($children) > 0) {
        foreach ($children as $name => $age) {
            $childrenDisplay .= "$name:&nbsp;$age<br>";
        }
    }

    echo "
    <table border='1'>
        <tr>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Spouse</th>
            <th>Child</th>
        </tr>
        <tr>
            <td>{$empId}</td>
            <td>{$employee->getName()}</td>
            <td>$spouseDisplay</td>
            <td>$childrenDisplay</td></tr>
    </table>";
}
