<!DOCTYPE html>
<head><title>Yui Naruse MD5 Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application  takes an MD5 hash of a four digit pin and check all 10,000 possible four digit PINs to determine the PIN.</p>
<pre>
Debug Output:
<?php
/*index*/
$goodtext = "Not found";
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    $txt = "0123456789";
    $show = 15;

    for($i=0; $i<strlen($txt); $i++ ) {
        $num1 = $txt[$i];

        for($j=0; $j<strlen($txt); $j++ ) {
            $num2 = $txt[$j];

            for($k=0; $k<strlen($txt); $k++) {
                $num3 = $txt[$k];

                for($l=0; $l<strlen($txt); $l++) {
                    $num4 = $txt[$l];

                    $try = $num1.$num2.$num3.$num4;

                    $check = hash('md5', $try);
            if ( $check == $md5 ) {
                $goodtext = $try;
                break;
            }

            if ( $show > 0 ) {
                print "$check $try\n";
                $show = $show - 1;
            }
    
            }

        }
    }
}

    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<p>Original Text: <?= htmlentities($goodtext); ?></p>
<form>
<input type="text" name="md5" size="40" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="makecode.php">MD5 Code Maker</a></li>
<li><a
href="https://github.com/csev/wa4e/tree/master/code/crack"
target="_blank">Source code for this application</a></li>
</ul>
</body>
</html>

