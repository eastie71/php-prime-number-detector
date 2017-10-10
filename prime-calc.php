<?php
	$factors = array(); 

	function isItPrime($value)
	{
		global $factors;

		$i = 2;
        
        $isPrime = true;
        
        while ($i < $value) {         
            if ($value % $i == 0) {
                // Number is not prime!
                $isPrime = false;
                $factors[] = $i;
            }
            $i++;
        }
        return $isPrime;
	}	
?>

<html lang="en">
	<head>
	    <title>Prime Number Calculator</title>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

	    <style type="text/css">
	        .jumbotron {
	        	height: 100%;
	            text-align: center;
	        }

	        #primeForm {
	        	margin: 0 auto;
	        }

	        #numberEntry {
            	width: 350px;
        	}
	    </style>
	</head>
	<body>
		<div class="jumbotron" id="home">
	        <div class="container">
	            <h3 class="mb-4">Enter a whole number, and I will tell you if it is a PRIME number.</h3>

	            <form class="form-inline">
	                <div id="primeForm" class="form-group">
	                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">                         
	                        <input type="text" class="form-control" id="numberEntry" name="number" placeholder="Whole numbers only">
	                    </div>
	                    <button type="submit" class="btn btn-primary btn-md">Submit</button>
	                </div>                
	            </form>

	            <?php
					$num = $_GET['number'];

					if (is_numeric($num) && $num > 0 && $num == round($num, 0)) {

						$isprime = 1;

						if ($num <= 3) {
							$isprime = 1;
						//} elseif ($num % 2 == 0 || $num % 3 == 0) {
						//	$isprime = 0;
						} else {
							if (isItPrime($num))
								$isprime = 1;
							else
								$isprime = 0;
						}
						if ($isprime == 1) {
							echo "<div class=\"alert alert-primary alert-dismissible fade show\">Yes, ".$num." IS a prime number!</div>";
						} else {
							$message = "Factors are: ";							
							for ($i=0; $i < sizeof($factors); $i++) {
								if ($i == 0) 
									$message = $message.$factors[$i];
								else
									$message = $message.", ".$factors[$i];
							}
							
							echo "<div class=\"alert alert-primary alert-dismissible fade show\">No, ".$num." is NOT a prime number<br>".$message."</div>";
						}
					} else if ($_GET) {
						echo "<div class=\"alert alert-danger alert-dismissible fade show\">Please enter a positive whole number.</div>";
					}
				?>            
	        </div>
    	</div>
	</body>
</html>

