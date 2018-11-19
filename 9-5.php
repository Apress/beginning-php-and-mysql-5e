<?php
    // Limit $summary to how many characters?
    $limit = 100;

    $summary = <<< summary
    The most up to date source for PHP documentation is the PHP manual.
    It contins many examples and user contributed code and comments.
    It is available on the main PHP web site
    <a href="http://www.php.net">PHP’s</a>.
summary;

    if (strlen($summary) > $limit)
        $summary = substr($summary, 0, strrpos(substr($summary, 0, $limit),
                          ' ')) . '...';
    echo $summary;
?>
