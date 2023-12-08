<!-- Kode Mengecek Device User Agent -->
<?php
$agent = $_SERVER["HTTP_USER_AGENT"];

if (preg_match('/Android/', $agent)) {
  echo "You're using an Android device";
} else {
  echo "You're using a PC";
}
?>
