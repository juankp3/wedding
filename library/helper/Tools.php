<?php
class Tools
{
  public static function download_send_headers($filename)
  {
    // disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    // force download
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

    // disposition / encoding on response body
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
  }

  public static function download($fileName)
  {
    $filePath = APP_UPLOAD_FILE_RELATIVE . $fileName;
    if (!empty($fileName) && file_exists($filePath)) {
      // Define headers
      header("Cache-Control: public");
      header("Content-Description: File Transfer");
      header("Content-Disposition: attachment; filename=$fileName");
      header("Content-Type: application/zip");
      header("Content-Transfer-Encoding: binary");

      // Read the file
      readfile($filePath);
      exit;
    } else {
        echo 'The file does not exist.';
    }
  }
}
