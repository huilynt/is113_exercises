<?php
# Enter code here
require_once "Counter.php";
$c1 = new Counter(0);
$c1val = $c1->getValue();
echo "Before increment - First counter value: $c1val<br/>";

$c1->increment();
$c1->increment();
$c1val = $c1->getValue();
echo "After incrementing 2 times - First counter value: $c1val<br/>";

$c2 = new Counter(7);
$c2val = $c2->getValue();
echo "Before decrement - Second counter value: $c2val<br/>";

$c2->decrement();
$c2->decrement();
$c2val = $c2->getValue();
echo "After decrementing 2 times - Second counter value: $c2val<br/>";
