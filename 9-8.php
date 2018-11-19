<?php
    $summary = <<< summary
    The most up to date source for PHP documentation is the PHP manual.
    It contins many examples and user contributed code and comments.
    It is available on the main PHP web site
    <a href="http://www.php.net">PHP’s</a>.
summary;
   $words = str_word_count($summary);
   printf("Total words in summary: %s", $words);
?>
