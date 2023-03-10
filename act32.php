<!DOCTYPE html>
<html>
    <head>
        <title>Act 3.2</title>
    </head>
    <body>
    <h1>PHP ACTIVITY 3.2</h1>
    <h1>PHP PC Shop</h1>
		<form action="act32.php" method="GET">
            <br />
            <h3>Processor:</h3>
            <input type="radio" required name="processor" value="i7"/>Intel i7<br/>
            <input type="radio" required name="processor" value="i5"/>Intel i5<br/>
            <input type="radio" required name="processor" value="i3"/>Intel i3<br/>
            <input type="radio" required name="processor" value="quadCore"/>Intel Quad Core<br/>
            <input type="radio" required name="processor" value="dualCore"/>Intel Dual Core<br/>
            <br />
            <h3>RAM:</h3>
			<input type="radio" required name="ram" value="16gb"/>16 GB<br/>
			<input type="radio" required name="ram" value="8gb"/>8 GB<br/>
			<input type="radio" required name="ram" value="4gb"/>4 GB<br/>
			<input type="radio" required name="ram" value="2gb"/>2 GB<br/>
            <br />
            <h3>Accessories:</h3>
			<input type="checkbox" name="accesories[]" value="keyboard"/>Gaming Keyboard<br/>
			<input type="checkbox" name="accesories[]" value="mouse"/>Gaming Mouse<br/>
			<input type="checkbox" name="accesories[]" value="headset"/>Gaming Headset<br/>
            <br />
            <br />
			<button type="submit" name="compute">Compute</button>
            <br />
            <br />
						
		</form>
    </body>

    <?php
        //declare a variable
        $processor;
        $ram;
        $accessories;
        $pprice = 0;
        $rprice = 0;
        $aprice = array();

        //determine first if the user has CLIKCED the submit button
        //check if the user clicks the submit button
        if( isset($_GET["compute"]) == true ) 
        {
            //get the inputted value from the textbox named: daysWorked
            $processor = $_GET["processor"];
            
            //get the selected value from the textbox named: num2
            $ram = $_GET["ram"];
            
            //get the inputted value from the combo box named: operation
            $accessories = $_GET["accesories"];
                            
            switch($processor)
            {
                case "i7":
                    $pprice = 15000;
                    break; 
                case "i5":
                    $pprice = 13000;
                    break;
                case "i3":
                    $pprice = 10000;
                    break;
                case "quadCore":
                    $pprice = 8000;
                    break;
                case "dualCore":
                    $pprice = 6000;
                    break;
            }

            switch($ram)
            {
                case "16gb":
                    $rprice = 10000;
                    break; 
                case "8gb":
                    $rprice = 8000;
                    break;
                case "4gb":
                    $rprice = 4000;
                    break; 
                case "2gb":
                    $rprice = 2000;
                    break; 
            }
            for($i=0; $i<count($accessories); $i++) 
            {
                switch($accessories[$i])
                {
                    case "keyboard":
                        $aprice[] = 3000;
                        break; 
                    case "headset":
                        $aprice[] = 3500;
                        break;
                    case "mouse":
                        $aprice[] = 2000;
                        break; 
                }
            }    
        }
        //echo "aPrice value: " . $aprice[2] . "<br />";
        $apriceSum = array_sum($aprice);
        $total = $pprice + $rprice + $apriceSum;

        echo "Total: " . number_format($total,2) . "<br />";
    ?>
</html>