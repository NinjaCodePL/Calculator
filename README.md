Calculator
==========
Version: 1.0<br/>
Author: Wojciech Dasiukiewicz<br/>Website: www.ninjacode.pl<br/>
Calculator making calculations from string. Currently methods +,-,*,/

How to use?
==========

Just create simple calculate.php file with this code: 

<pre><code>require_once '../lib/ninjacode/Calculator.php';
$calculate = new Calculator();
echo $calculate->calculate($_POST['request']);
</code></pre>

And then you can use AJAX to get result dynamically

<pre><code>$.ajax({
    url:'calculate.php',
    type:'POST',
    data:{request:$('#requ').val()},
    success:function(response){
            alert(response);
    }
});
</code></pre>

Your $('#requ').val() should be a string with your operation. <br/>All characters must be separated by space ex. "1 + 2 + 3 * 5"