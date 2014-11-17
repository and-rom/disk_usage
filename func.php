<?php
  function formatSize( $bytes ) {
    $types = array( 'b', 'Kb', 'Mb', 'Gb', 'Tb' );
    for( $i = 0; $bytes >= 1024 && $i < ( count( $types ) -1 ); $bytes /= 1024, $i++ );
      return( round( $bytes, 2 ) . " " . $types[$i] );
  }
  function getDiskUsage ($array) {
    for ($i = 0; $i < count($array); $i++) {
      if (is_dir($array[$i]['path'])) {
          $path = $array[$i]['path'];
          $name = $array[$i]['name'];

          $free = disk_free_space($path);
          $total = disk_total_space($path);
          $used = $total - $free;

          $percentage_used = sprintf('%.2f',($used / $total) * 100);
          $percentage_free = sprintf('%.2f',($free / $total) * 100);

          $free = formatSize($free);
          $total = formatSize($total);
          $used = formatSize($used);

          $array[$i]['free'] = $free;
          $array[$i]['total'] = $total;
          $array[$i]['used'] = $used;
          $array[$i]['percentage_used'] = $percentage_used;
          $array[$i]['percentage_free'] = $percentage_free;
      }
      else {
       $array[$i]['name']='err';
      }
    }
    return $array;
  }


?>
