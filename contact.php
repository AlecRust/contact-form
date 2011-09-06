<?php

session_start();
$int1 = rand(1,10);
$int2 = rand(1,10);

while(($int1 - $int2) < 0) {
    $int1 = rand(1,10);
    $int2 = rand(1,10);
    if(($int1 - $int2) > 0) break;
}

if($int1 > $int2) {
    $method = 'plus';
}
else $method = 'subtract';

switch($method) {
    case 'plus':
    $answer = $int1 + $int2;
    break;
    case 'subtract':
    $answer = $int1 - $int2;
    break;
}

$question = 'What does '.$int1.' '.$method.' '.$int2.' make?';

$_SESSION['question'] = (string) $answer;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contact Form Template</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="styles.css" />
    </head>
    <body>
        <div class="content">
            <h1>Contact Form</h1>
            <form action="contact-send.php" method="post" class="contact-form">
                <p>All fields marked with <span class="required">*</span> are required.</p>
                <fieldset>
                    <p>
                        <label>
                            Name: <span class="required">*</span>
                            <input type="text" id="name" name="name" autocomplete="on" required="required" />
                        </label>
                    </p>
                    <p>
                        <label>Email: <span class="required">*</span>
                            <input type="email" id="email" name="email" autocomplete="on" required="required" />
                        </label>
                    </p>
                    <p>
                        <label>Phone:
                            <input type="tel" id="phone" name="phone" autocomplete="on" />
                        </label>
                    </p>
                    <p>
                        <label>Options:
                            <select id="option" name="option">
                                <option value="Option 1">Option 1</option>
                                <option value="Option 2">Option 2</option>
                                <option value="Option 3">Option 3</option>
                            </select>
                        </label>
                    </p>
                    <p>
                        <label>Message: <span class="required">*</span>
                            <textarea id="message" name="message" required="required" rows="10"></textarea>
                        </label>
                    </p>
                    <p>
                        <label><?php echo($question) ?> <span class="required">*</span>
                            <input type="text" id="question" name="question" placeholder="(just for security)" autocomplete="off" required="required" />
                        </label>
                    </p>
                    <p>
                        <button>Send message</button>
                    </p>
                </fieldset>
            </form>
        </div>
    </body>
</html>