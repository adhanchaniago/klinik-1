header('Content-type: text/css');
ob_start("compress");
function compress($buffer) {
  /* remove comments */
  $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
  /* remove tabs, spaces, newlines, etc. */
  $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
  return $buffer;
}
 
/* your css files */
include('bootstrap.css');
include('bootstrap-responsive.css');
include('bootstrap-responsive.min.css');
include('print.css');
include('template.css');
include('blue.css'); 
include('menu.css');  
include('login.css');  
ob_end_flush();