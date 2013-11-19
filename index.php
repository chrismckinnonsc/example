<h1>This is a PHP Demo</h1>
<?php
$_REQUEST += array('value'=>"", 'cmd'=>"");

function sayHello($name) {
  echo "<h2>Hello $name</h2><br />\n";
}

function cmd_add($a, $b) {
  return $a + $b;
}
function cmd_div($a, $b) {
  return $a / $b;
}
function cmd_sub($a, $b) {
  return $a - $b;
}
function cmd_mul($a, $b) {
  return $a * $b;
}

function sel($name, $val) {
  if($_REQUEST[$name] == $val)
    return "selected='selected'";
}



echo "<a href='http://www.google.com'>Google.com</a>";

$title = "My Page Title";

echo "<h2>".$title."</h2>";

if($_REQUEST['value'] == "test") {
  for($i = 0; $i < 10; $i = $i + 1) {
    echo "Number ".$i."<br />\n";
  }
}elseif(strtoupper($_REQUEST['cmd']) == "HELLO") {
  sayHello($_REQUEST['value']);
}
//var_dump($_REQUEST);

echo "Value  = ".$_REQUEST['value'];


?>
<a href="?value=test">Set Value to Test</a><br />
<a href="?value=Chris">Set Value to Chris</a><br />
<a href="?value=0">Set Value to 0</a><br />
<a href="?value=Chris<?=urlencode("&")?> Seufert&cmd=hello">Say Hello to Chris</a><br />
<form>
  <div>Number 1<input type="text" name="num1" value="<?=$_REQUEST['num1']?>" /></div>
  <div>Number 2<input type="text" name="num2" value="<?=$_REQUEST['num2']?>" /></div>
  <div><select name="type">
<?php
      $options = array("add"=>"Add", "sub"=>"Subtract", "mul"=>"Multiply", "div"=>"Divide");
      foreach($options as $cmd => $name)
        echo "    <option value='$cmd' ".sel('type',$cmd).">$name</option>\n";
  ?>
  </select></div>
  <?php
  $func = "cmd_".$_REQUEST['type'];
  ?>
  <div>Result: <?=$func($_REQUEST['num1'],$_REQUEST['num2'])?></div>
  <div><input type="submit" name="send" value="Add" /></div>

</form>