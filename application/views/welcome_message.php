<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CodeIgniter jQuery form Plugin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <h1>CodeIgniter jQuery form Plugin</h1>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="status"></div>
                </div>
            </div>
        </div>
        <div class="container">
            <?php $hidden = array('enquiry_type' => 'enquiry_now'); ?>
            <?php echo form_open('welcome/save', array('class' => 'form-horizontal', 'id' => 'enquiry_now', 'name' => 'enuiry'), $hidden); ?>
            <div class="form-group">
                <label class= "control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <?php echo form_input('name', set_value('name'), array('class' => 'form-control', 'name' => 'name', 'id' => 'name', 'placeholder' => 'Name')); ?>
                </div>
            </div>
            <div class="form-group">
                <label class= "control-label col-sm-2" for="mobile">Mobile:</label>
                <div class="col-sm-10">
                    <?php echo form_input('mobile', set_value('mobile'), array('class' => 'form-control', 'name' => 'mobile', 'id' => 'mobile', 'placeholder' => 'Mobile')); ?>
                </div>
            </div>
            <div class="form-group">
                <label class= "control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <?php echo form_input('email', set_value('email'), array('class' => 'form-control', 'name' => 'email', 'id' => 'email', 'placeholder' => 'Email')); ?>
                </div>
            </div>
            <div class="form-group">
                <label class= "control-label col-sm-2" for="query">Query:</label>
                <div class="col-sm-10">
                    <?php echo form_textarea('query', set_value('query'), array('class' => 'form-control', 'name' => 'query', 'id' => 'query', 'rows' => '3', 'placeholder' => 'Query')); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <?php echo form_submit('submit', 'Submit', array('class' => "btn btn-primary")); ?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="http://malsup.github.io/jquery.form.js"></script>
        <script src="<?php echo base_url('assest/js/script.js'); ?>"></script>
    </body>
</html>