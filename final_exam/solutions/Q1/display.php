<?php
// display.php 
// code to generate sample output

require_once 'common.php';

$dao = new ProductDAO();
$productArr = $dao->retrieveAll();

echo "<html><body>";
print_form($productArr);
echo "</body></html>";

function print_form($productArr) {
    // YOUR CODE GOES HERE
    
    echo "
    <form method='post' action='order.php'>
        <table border='1'>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Size</th>
            </tr>";

    foreach( $productArr as $product ) {
        echo "
                <tr>
                    <td>{$product->getName()}</td>
                    <td>{$product->getPrice()}</td>
                    <td>
                        <select name='item[]'>";
        echo "
                            <option value='' selected disabled>-- Pick a size --</option>";

        foreach( $product->getStock() as $size=>$qty ) {
            if( $qty > 0 ) {
                echo "
                            <option value='{$product->getID()}-{$size}'>$size</option>";
            }
        }
        
        echo "      
                        </select>
                    </td>
                </tr>";
        }

        echo "        
                <tr>
                    <td colspan='3'>
                        <input type='submit' value='Order'/>
                    </td>
                </tr>
            </table>
            
        </form>";
    }

?>

