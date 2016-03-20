<?php

// if(preg_match('/\w{1,}\s{1,}\w{1,}/','foo        bar'))
//     die('vrai');
// else
//     die('faux');

$message = 'Fuck you, you fucking son of a bitch';
$message = preg_replace('/fuck(ing)?|bitch/i', '#!@$?!', $message);

echo '<pre>';
print_r($message);
echo '</pre>';
exit;