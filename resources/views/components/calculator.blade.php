<div id="calculator">
            
    <div class="row">
        <input type="text" id="result" class="col-9">
        <!-- clr() function will call clr to clear all value -->
        <input type="button" class="col" value="c" onclick="clr()" />
    </div>
    <div class="row">
        <!-- create button and assign value to each button -->
        <!-- dis("1") will call function dis to display value -->
        <input type="button" class="col" value="1" onclick="dis('1')" onkeydown="myFunction(event)">
        <input type="button" class="col" value="2" onclick="dis('2')" onkeydown="myFunction(event)">
        <input type="button" class="col" value="3" onclick="dis('3')" onkeydown="myFunction(event)">
        <input type="button" class="col" value="/" onclick="dis('/')" onkeydown="myFunction(event)">
    </div>
    <div class="row">
        <input type="button" class="col" value="4" onclick="dis('4')" onkeydown="myFunction(event)">
        <input type="button" class="col" value="5" onclick="dis('5')" onkeydown="myFunction(event)">
        <input type="button" class="col" value="6" onclick="dis('6')" onkeydown="myFunction(event)">
        <input type="button" class="col" value="*" onclick="dis('*')" onkeydown="myFunction(event)">
    </div>
    <div class="row">
        <input type="button" class="col" value="7" onclick="dis('7')" onkeydown="myFunction(event)">
        <input type="button" class="col" value="8" onclick="dis('8')" onkeydown="myFunction(event)">
        <input type="button" class="col" value="9" onclick="dis('9')" onkeydown="myFunction(event)">
        <input type="button" class="col" value="-" onclick="dis('-')" onkeydown="myFunction(event)">
    </div>
    <div class="row">
        <input type="button" class="col" value="0" onclick="dis('0')" onkeydown="myFunction(event)">
        <input type="button" class="col" value="." onclick="dis('.')" onkeydown="myFunction(event)">
        <!-- solve function call function solve to evaluate value -->
        <input type="button" class="col" value="=" onclick="solve()">
        <input type="button" class="col" value="+" onclick="dis('+')" onkeydown="myFunction(event)">
    </div>

</div>