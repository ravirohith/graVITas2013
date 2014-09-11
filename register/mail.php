function alpha(e) {
    var k;
    document.all ? k = e.keyCode : k = e.which;
    return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57) || k=64 || k=95);
}

<input type="text" name="name"  onkeypress="return alpha(event)"/>

<?php

$string = 'foo';

if (preg_match('/[\'^£$%&*()}{#~?><>,|=+¬-]/', $string))
{
    // one or more of the 'special characters' found in $string
}

bool ctype_alpha ( string $text )