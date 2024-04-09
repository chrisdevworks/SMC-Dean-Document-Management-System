<?php
define("BACKUP_PATH", "C:/xampp8/htdocs/SMCDean/web/backup");

$server_name   = "localhost";
$username      = "root";
$password      = "";
$database_name = "document_management_db";
$date_string   = rand();
$output = null;
$return = true;

$cmd = "C:/xampp8/mysql/bin/mysqldump --host={$server_name} --user={$username} --password={$password} --single-transaction --routines {$database_name} > " . "C:/xampp8/htdocs/SMCDean/web/backup/" . "{$date_string}_{$database_name}.sql";

$save = exec($cmd, $output, $return);



// header("Location: index.php");
if ($return == true) {
    echo "
            <script>
                alert_toast('Data successfully saved.', 'success');
                setTimeout(function() {
                    location.replace('index.php?page=home')
                }, 750)
            </script>
        ";
} else {
    echo $return;
}

?>

<script>
    $(document).ready(function() {
        // some code here
    });
</script>