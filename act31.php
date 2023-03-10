<!DOCTYPE html>
<html>
    <head>
        <title>Act 3.1</title>
    </head>
    <body>
    <h1>PHP ACTIVITY 3.1</h1>
		<form action="act31.php" method="GET">
            <br />
            No. of Days Worked:
			<input type="number" required name="daysWorked" placeholder="" />
            <br />
            Employee Status:
			<select name="employeeStatus" required >
				<option value="">Emp. Status</option>
				<option value="regular">Regular</option>
				<option value="probationary">Probationary</option>
				<option value="Casual">Casual</option>
			</select>
            <br />
            Civil Status:
            <select name="civilStatus" required >
				<option value="">Civil Status</option>
				<option value="single">Single</option>
				<option value="married">Married</option>
				<option value="window">Widow</option>
			</select>
            <br />
			<button type="submit" name="compute">Compute</button>
            <br />
            <br />
						
		</form>
    </body>

    <?php
        //declare a variable
        $daysWorked;
        $employeeStatus;
        $civilStatus;
        $salaryRate = 0;
        $taxRate = 0;
    
        //determine first if the user has CLIKCED the submit button
        //check if the user clicks the submit button
        if( isset($_GET["compute"]) == true ) 
        {
            //get the inputted value from the textbox named: daysWorked
            $daysWorked = $_GET["daysWorked"];
            
            //get the selected value from the textbox named: num2
            $employeeStatus = $_GET["employeeStatus"];
            
            //get the inputted value from the combo box named: operation
            $civilStatus = $_GET["civilStatus"];
                            
            switch($employeeStatus)
            {
                case "regular":
                    $salaryRate = 500;
                    break; 
                case "probationary":
                    $salaryRate = 400;
                    break;
                case "casual":
                    $salaryRate = 300;
                    break; 
            }

            switch($civilStatus)
            {
                case "single":
                    $taxRate = 0.12;
                    break; 
                case "married":
                    $taxRate = 0.1;
                    break;
                case "widow":
                    $taxRate = 0.07;
                    break; 
            }
            
        }

        $grossSalary = $salaryRate * $daysWorked;
        $deduction = $grossSalary * $taxRate;
        $netSalary = $grossSalary - $deduction;

        echo "Gross Salary: \t" . number_format($grossSalary,2) . "<br />";
        echo "Tax: \t" . $taxRate*100 . "%<br />";
        echo "Deduction: \t" . number_format($deduction,2) . "<br />";
        echo "Net Salary: \t" . number_format($netSalary,2)  . "<br />";
    ?>
</html>