<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url(); ?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/dashboard.css" rel="stylesheet">

    <!-- sweetalert css -->

    <link href="<?php echo base_url(); ?>assets/library/sweetalert2/sweetalert2.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url(); ?>assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
      
      //set global js config
      var config = {
        'base_url':"<?php echo base_url(); ?>"
      };

    </script>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              Language:
              
              <select name="choose_lang" id="choose_lang">
                
                <?php

                //set default selected language

                $malay_selected = 'selected="selected"';
                $english_selected = '';

                //if selected english, set english dropdown selected

                if ($this->session->userdata('user_language')==='english') {
                  
                  $malay_selected = '';
                  $english_selected = 'selected="selected"';

                }

                //if selected malay, set malay dropdown selected

                if ($this->session->userdata('user_language')==='malay') {
                  
                  $malay_selected = 'selected="selected"';
                  $english_selected = '';

                }

                ?>

                <option value="malay" <?php echo $malay_selected; ?> >Malay</option>

                <option value="english" <?php echo $english_selected; ?> >English</option>

              </select>


            </li>
            <li><a href="#"><?php echo lang('dashboard'); ?></a></li>
            <li><a href="#"><?php echo lang('setting'); ?></a></li>
            <li><a href="#">Profile</a></li>

            <li><a href="#"><?php echo $the_user->username; ?></a></li>

            <li><a href="<?php echo site_url('auth/logout'); ?>">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo site_url('article/index'); ?>">Manage Article</a></li>
            <li><a href="<?php echo site_url('report/attendance_report'); ?>">PDF report</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          

            <!-- content here -->

            <?php

            if (isset($content)) {
              $this->load->view($content);
            }

            ?>


        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="<?php echo base_url(); ?>assets/js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- sweetalert2 js -->

    <script src="<?php echo base_url(); ?>assets/library/sweetalert2/sweetalert2.js"></script>


    <!-- global javascript here -->

    <script type="text/javascript">
      
      $( document ).ready(function() {
          
        //semua global js here

        //notification bila success

        <?php if($this->session->flashdata('success')){ ?>

          swal({
            title: 'Success!',
            text: "<?php echo $this->session->flashdata('success');  ?>",
            type: 'success',
            confirmButtonText: 'Ok'
          })

        <?php } ?>


        //site language

        $( "#choose_lang" ).change(function() {
          
          //get selected language  
          var language = $(this).val();

          // alert(language);
          setLanguage(language);

        });

        //setLanguage function

        function setLanguage(language)
        {
            $.ajax({
              method: "POST",
              url: config.base_url +'report/setLanguage',
              data: { 
                language: language
              }
            })
            .done(function( response ) {
              
              if (response==='success') {
                location.reload();
              }

            });

        }

        //end of setLanguage

      });


    </script>

    <!-- end of global javascript -->
  </body>
</html>
