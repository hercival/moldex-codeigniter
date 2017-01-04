<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title><?php echo config_item('site_title') . ' Admin ' . @$title; ?></title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>includes/color/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>includes/color/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>includes/color/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>includes/color/css/animate.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>includes/color/css/style.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>includes/color/css/style-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>includes/color/css/theme/red.css" rel="stylesheet" id="theme" />
        <!-- ================== END BASE CSS STYLE ================== -->

        <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
        <link href="<?php echo base_url(); ?>includes/color/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>includes/color/plugins/DataTables/css/data-table.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>includes/color/plugins/parsley/src/parsley.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>includes/css/bootstrap-colorselector.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>includes/color/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>includes/color/plugins/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>includes/color/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />

        <!-- Media Manager -->
        <link href="<?php echo base_url(); ?>includes/css/mediamanager.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>includes/css/admin.css" rel="stylesheet" />
        <!-- ================== END PAGE LEVEL STYLE ================== -->
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>includes/img/favicon/favicon-16x16.png" sizes="16x16" />

        <!-- ================== BEGIN BASE JS ================== -->
        <!--<script src="<?php echo base_url(); ?>includes/js/vendor/jquery-1.11.1.min.js"></script>-->
        <script src="<?php echo base_url(); ?>includes/color/plugins/jquery/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url(); ?>includes/js/jquery.form.js"></script>
        <!-- Flickity -->
        <link href="<?=base_url()?>includes/css/flickity.css"rel="stylesheet">
        <!-- ================== END BASE JS ================== -->

        <script type="text/javascript">
        function get_base_url(){
            return '<?php echo base_url(); ?>';
        }
        </script>
    </head>
    <body>
        <!-- begin #page-loader -->
        <div id="page-loader" class="fade in"><span class="spinner"></span></div>
        <!-- end #page-loader -->

        <!-- begin #page-container -->
        <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
            <!-- begin #header -->
            <div id="header" class="header navbar navbar-default navbar-fixed-top">
                <!-- begin container-fluid -->
                <div class="container-fluid">
                    <!-- begin mobile sidebar expand / collapse button -->
                    <div class="navbar-header">
                        <a href="index.html" class="navbar-brand"><!--span class="navbar-logo"></span--> <?php echo config_item('site_title'); ?></a>
                        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- end mobile sidebar expand / collapse button -->

                    <!-- begin header navigation right -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <form class="navbar-form full-width">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter keyword" />
                                    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </li>
                        <li class="dropdown navbar-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url(); ?>includes/color/img/admin-logo.png" alt="" /> 
                                <span class="hidden-xs">Administrator</span> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu animated fadeInLeft">
                                <li><a href="<?php echo site_url('administrator/logout'); ?>">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- end header navigation right -->
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end #header -->

            <!-- begin #sidebar -->
            <div id="sidebar" class="sidebar">
                <!-- begin sidebar scrollbar -->
                <div data-scrollbar="true" data-height="100%">
                    <!-- begin sidebar nav -->
                    <?php $current = $this->uri->segment(2); $current_mod = $this->uri->segment(1); ?>
                    <ul class="nav">
                       <li class="">
                            <a href="javascript:;">
                                <i class="fa fa-list-ul"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="has-sub <?php if($current_mod == "pagemanager") echo "active"; ?>">

                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-file"></i>
                                <span>Pages</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="<?php if($current_mod == "pagemanager" && $current == "index") echo "active"; ?>"><a href="<?php echo site_url('pagemanager/index'); ?>">All Pages</a></li>
                                <li class="<?php if($current_mod == "pagemanager" && $current == "add") echo "active"; ?>"><a href="<?php echo site_url('pagemanager/add'); ?>" >Add Page</a></li>
                            </ul>
                        </li>
                        <li class="has-sub <?php if($current_mod == "projectmanager" || $current_mod == "houseunitmanager") echo "active"; ?>">

                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-bullhorn"></i>
                                <span>Projects</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="<?php if($current_mod == "projectmanager" && $current == "index") echo "active"; ?>"><a href="<?php echo site_url('projectmanager/index'); ?>">All Project</a></li>
                                <li class="<?php if($current_mod == "projectmanager" && $current == "add") echo "active"; ?>"><a href="<?php echo site_url('projectmanager/add'); ?>" >Add Project</a></li>
                                <li class="<?php if($current_mod == "houseunitmanager" && $current == "index") echo "active"; ?>"><a href="<?php echo site_url('houseunitmanager/index'); ?>">All House Model & Units</a></li>
                                <li class="<?php if($current_mod == "houseunitmanager" && $current == "add") echo "active"; ?>"><a href="<?php echo site_url('houseunitmanager/add'); ?>" >Add Model or Unit</a></li>
                            </ul>
                        </li>
                        <li class="has-sub <?php if($current_mod == "categorymanager" || $current_mod == "locationsmanager") echo "active"; ?>">

                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-file"></i>
                                <span>Location Category</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="<?php if($current_mod == "categorymanager" && $current == "index") echo "active"; ?>"><a href="<?php echo site_url('categorymanager/index'); ?>">All category</a></li>
                                <li class="<?php if($current_mod == "categorymanager" && $current == "add") echo "active"; ?>"><a href="<?php echo site_url('categorymanager/add'); ?>" >Add Category</a></li>
                                <li class="<?php if($current_mod == "locationsmanager" && $current == "index") echo "active"; ?>"><a href="<?php echo site_url('locationsmanager/index'); ?>">All Location Address</a></li>
                                <li class="<?php if($current_mod == "locationsmanager" && $current == "add") echo "active"; ?>"><a href="<?php echo site_url('locationsmanager/add'); ?>" >Add Location Address</a></li>
                            </ul>
                        </li>
                        <li class="has-sub <?php if($current_mod == "newsmanager") echo "active"; ?>">

                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-bullhorn"></i>
                                <span>News</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="<?php if($current_mod == "newsmanager" && $current == "index") echo "active"; ?>"><a href="<?php echo site_url('newsmanager/index'); ?>">All News</a></li>
                                <li class="<?php if($current_mod == "newsmanager" && $current == "add") echo "active"; ?>"><a href="<?php echo site_url('newsmanager/add'); ?>" >Add News</a></li>
                            </ul>
                        </li>

                        <li class="has-sub <?php if($current_mod == "careersmanager") echo "active"; ?>">

                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-lock"></i>
                                <span>Careers</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="<?php if($current_mod == "careersmanager" && $current == "index") echo "active"; ?>"><a href="<?php echo site_url('careersmanager/index'); ?>">All Career</a></li>
                                <li class="<?php if($current_mod == "careersmanager" && $current == "add") echo "active"; ?>"><a href="<?php echo site_url('careersmanager/add'); ?>" >Add Career</a></li>
                            </ul>
                        </li>
                        <!--li class="has-sub <?php if($current == "menus" || $current == "add_menu" || $current == "edit_menu" || $current == "group" || $current == "add_group") echo "active"; ?>">
                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-list-alt"></i>
                                <span>Menu</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="<?php //if($current == "menus") echo "active"; ?>"><a href="<?php //echo site_url('administrator/menus'); ?>">All Menus</a></li>
                                <li class="<?php //if($current == "add_menu") echo "active"; ?>"><a href="<?php //echo site_url('administrator/add_menu'); ?>" >Add Menu</a></li>
                                <li class="<?php //if($current == "group") echo "active"; ?>"><a href="<?php //echo site_url('administrator/group'); ?>">All Group Menu</a></li>
                                <li class="<?php //if($current == "add_group") echo "active"; ?>"><a href="<?php //echo site_url('administrator/add_group'); ?>" >Add Group Menu</a></li>
                            </ul>
                        </li-->
                        
<!--
                        <li class="has-sub <?php //if($current == "module" || $current == "add_module" || $current == "edit_module" || $current_mod == "banner") echo "active"; ?>">
                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-stop"></i>
                                <span>Modules</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="<?php //if($current == "module") echo "active"; ?>"><a href="<?php //echo site_url('administrator/module'); ?>">All Module</a></li>
                                <li class="<?php //if($current == "add_module") echo "active"; ?>"><a href="<?php //echo site_url('administrator/add_module'); ?>" >Add Module</a></li>
                            </ul>
                        </li>
-->
<!--
                        <li class="has-sub <?php //if($current == "units" || $current == "add_units" || $current == "edit_units") echo "active"; ?>">
                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-home"></i>
                                <span>Untis</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="<?php //if($current == "units") echo "active"; ?>"><a href="<?php //echo site_url('administrator/units'); ?>">All Units</a></li>
                                <li class="<?php //if($current == "add_units") echo "active"; ?>"><a href="<?php //echo site_url('administrator/add_units'); ?>" >Add Unit</a></li>
                            </ul>
                        </li>
-->

                        <!-- begin sidebar minify button -->
                        <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
                        <!-- end sidebar minify button -->
                    </ul>
                    <!-- end sidebar nav -->
                </div>
                <!-- end sidebar scrollbar -->
            </div>
            <div class="sidebar-bg"></div>
            <!-- end #sidebar -->

            <!-- begin #content -->
            <div id="content" class="content">

                <!-- begin page-header -->
                <h1 class="page-header"><?php echo $title; ?></h1>
                <!-- end page-header -->
                <?php $this->load->view('admin/'.$page); ?>

            </div>
            <!-- end #content -->


            <!-- begin scroll to top btn -->
            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
            <!-- end scroll to top btn -->
        </div>
        <!-- end page container -->
    
        <!-- ================== BEGIN BASE JS ================== -->
    
        <script src="<?php echo base_url(); ?>includes/color/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
        <script src="<?php echo base_url(); ?>includes/color/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>includes/color/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!--[if lt IE 9]>
            <script src="<?php echo base_url(); ?>includes/color/crossbrowserjs/html5shiv.js"></script>
            <script src="<?php echo base_url(); ?>includes/color/crossbrowserjs/respond.min.js"></script>
            <script src="<?php echo base_url(); ?>includes/color/crossbrowserjs/excanvas.min.js"></script>
        <![endif]-->
        <script src="<?php echo base_url(); ?>includes/color/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url(); ?>includes/color/plugins/jquery-cookie/jquery.cookie.js"></script>
        <!-- ================== END BASE JS ================== -->

        <!-- ================== BEGIN PAGE LEVEL JS ================== -->
        <script src="<?php echo base_url(); ?>includes/color/plugins/gritter/js/jquery.gritter.js"></script>
        <script src="<?php echo base_url(); ?>includes/color/plugins/DataTables/js/jquery.dataTables.js"></script>
        <script src="<?php echo base_url(); ?>includes/color/plugins/DataTables/js/dataTables.tableTools.js"></script>
        <script src="<?php echo base_url(); ?>includes/color/js/table-manage-tabletools.demo.js"></script>
        <script src="<?php echo base_url(); ?>includes/js/vendor/bootstrap-colorselector.js"></script>
        <script src="<?php echo base_url(); ?>includes/js/library.js"></script>
        <script src="<?php echo base_url(); ?>includes/color/js/apps.js"></script>
        <script src="<?php echo base_url(); ?>includes/color/plugins/ckeditor/ckeditor.js"></script>
        <!--script src="<?php echo base_url(); ?>includes/js/upload_video.js"></script-->
        <script src="<?php echo base_url(); ?>includes/color/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

        <script src="<?php echo base_url(); ?>includes/color/js/form-editable.min.js"></script>
        <!-- ================== END PAGE LEVEL JS ================== -->

        <script src='<?php echo  base_url(); ?>includes/js/jquery.mjs.nestedSortable.js'></script>
        <!-- Flickity JS -->
        <script src="<?php echo base_url(); ?>includes/js/libs/flickity.pkgd.min.js"></script>
        <script src="<?php echo base_url(); ?>includes/color/plugins/parsley/dist/parsley.js"></script>
        <script src="<?php echo base_url(); ?>includes/js/vendor/jquery.dataTables.rowReordering.js"></script>
        
        <script src="<?php echo base_url(); ?>includes/js/jquery.twbsPagination.min.js"></script>
        <script src="<?php echo base_url(); ?>includes/js/mediamanager.js"></script>
        
        <script type = "text/javascript" src = "<?php echo base_url()?>includes/js/upload_single.js"></script>

        <script>
            $(document).ready(function(){ App.init(); TableManageTableTools.init(); $('.date-picker').datepicker();});
        </script>
        <script src="<?php echo base_url(); ?>includes/js/admin.js"></script>
    </body>
</html>
