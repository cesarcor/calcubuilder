<?php

add_action('admin_menu', 'clcbuilder_menus');

 function clcbuilder_menus(){
 add_menu_page(
   'CalcuBuilder',
   'CalcuBuilder',
   'manage_options',
   'calcubuilder',
   'calcbuilder_cbk',
   'dashicons-smiley',
   10
 );

  function calcuBuilder_cbk(){
   require 'views/new-calc.php'
 }
}
