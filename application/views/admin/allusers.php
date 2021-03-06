<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Data Sales</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/bootstrap/css/bootstrap.min.css"); ?>" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/dataTables.bootstrap.css"); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/AdminLTE.css
    "); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/skins/_all-skins.min.css"); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php  $this->load->view("admin/common/common_header"); ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php  $this->load->view("admin/common/common_sidebar"); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $this->lang->line("Admin");?>
          </h1>
           <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line("Admin");?></a></li>
                        <li><a href="#"><?php echo $this->lang->line("App Registers");?></a></li>

                    </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <div class="row">
                        <div class="col-xs-12">
                            <?php  if(isset($error)){ echo $error; }
                                    echo $this->session->flashdata('message'); ?>
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title"><?php echo $this->lang->line("App Registers");?></h3>
                                 <div class="pull-right">
                                    <a href="addusers" class="btn btn-primary">Tambah Sales</a>
                                    </div>
                                </div><!-- /.box-header -->

          <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th><?php echo $this->lang->line("ID");?></th>
                    <th><?php echo $this->lang->line("Name");?></th>
                    <th><?php echo $this->lang->line("Phone");?>  </th>
                    <th><?php echo $this->lang->line("User Email");?>
                    <th><?php echo $this->lang->line("Photo");?></th>
                    <th><?php echo $this->lang->line("Status");?></th>
                    <th><?php echo $this->lang->line("Password");?></th>
                    <th class="text-center" style="width: 100px;"><?php echo $this->lang->line("Action");?></th>

                </tr>
                </thead>
          <tbody>
          <?php
          foreach($users as $user)
          {

            ?>

                <tr>

                    <td><?php echo $user->user_id; ?></td>
                    <td><?php echo $user->user_fullname; ?></td>
                    <td><?php echo $user->user_phone; ?></td>
                    <td><?php echo $user->user_email; ?></td>
                    <td><a href="<?php echo $this->config->item('base_url').'uploads/profile/'.$user->user_image; ?>"target="_blank"><?php if($user->user_image!=""){ ?><div class="cat-img" style="width: 80px; height: 100px;"><img width="100%" height="100%" src="<?php echo $this->config->item('base_url').'uploads/profile/'.$user->user_image; ?>" /></div> <?php } ?></td>

                    <td><?php if($user->status == "1"){ ?><span class="label label-success"><?php echo $this->lang->line("Active");?></span><?php } else { ?><span class="label label-danger"><?php echo $this->lang->line("Deactive");?></span><?php } ?></td>
                    <td class="text-center"><div class="btn">
                    <?php echo anchor('admin/edit_password/'.$user->user_id, '<i class="fa fa-eye"></i>', array("class"=>"btn btn-info")); ?>
                     </div>
                    </td>
                    <td class="text-center"><div class="btn-group">
                    <?php echo anchor('admin/edit_users/'.$user->user_id, '<i class="fa fa-edit"></i>', array("class"=>"btn btn-success")); ?>
                    <?php echo anchor('admin/delete_users/'.$user->user_id, '<i class="fa fa-trash"></i>', array("class"=>"btn btn-danger", "onclick"=>"return confirm('Are you sure delete?')")); ?>
                     </div>
                    </td>
                </tr>
            <?php
          }
          ?>
          </tbody>
          </table>


        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php  $this->load->view("admin/common/common_footer"); ?>


            <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/jQuery/jQuery-2.1.4.min.js"); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/dataTables.bootstrap.min.js"); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/app.min.js"); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/demo.js"); ?>"></script>
    <script>
      $(function () {

        $('#example1').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });

      });
    </script>
  </body>
</html>
