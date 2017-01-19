<?php
add_action('admin_menu', 'clcbuilder_menus');

 function clcbuilder_menus(){
     add_menu_page(
        'CalcuBuilder',
        'CalcuBuilder',
        'manage_options',
        'calcubuilder',
        'calcuBuilder_cbk',
        'dashicons-smiley',
        100
       );

       add_submenu_page(
         'calcubuilder',
         'All Calculators',
         'All Calculators',
         'manage_options',
         'calcuBuilder_all',
         'calcuBuilder_all'
       );

      add_submenu_page(
        'calcubuilder',
        'New Calculator',
        'Add New Calculator',
        'manage_options',
        'calcuBuilder_new',
        'calcuBuilder_new'
      );
}

    function calcuBuilder_cbk(){

    }

    function calcuBuilder_new(){
      require 'views/new-calc.php';
    }

    function calcuBuilder_all(){}
