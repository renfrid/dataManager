<div id="content-middle-home">
    <div class="container_12" id="content-middle" style="border: 1px solid #fff;">
        <div id="header-title" style="border-top:  1px solid #fff;border-left:  1px solid #fff;">
            <div style="width: auto; float: left; display: inline-block;">
                <img src="<?php echo base_url(); ?>assets/public/images/disease.png"/>
                <h1>OHKR</h1>
                <h3><?php echo $title; ?></h3>
            </div>
            <div style="clear: both;"></div>
        </div>

        <div>
            <div class="grid_2" id="leftmenu" style=" padding-top: 10px; width: 200px;margin-left: -0.5px;">
                <ul id="nav">

                    <li><a href="#">Manage Diseases</a>
                        <ul>
                            <li><a href="<?php echo site_url('ohkr/disease_list'); ?>">Diseases List</a></li>
                            <li><a href="<?php echo site_url('ohkr/add_new_disease'); ?>">Add New Disease</a></li>
                        </ul>
                    </li>

                    <li><a href="#">Manage Symptoms</a>
                        <ul>
                            <li><a href="<?php echo site_url('ohkr/symptom_list'); ?>">Symptoms List</a></li>
                            <li><a href="<?php echo site_url('ohkr/add_new_symptom'); ?>">Add New Symptom</a></li>
                        </ul>
                    </li>

                    <li><a href="#">Manage Species</a>
                        <ul>
                            <li><a href="<?php echo site_url('ohkr/species_list'); ?>">Species List</a></li>
                            <li><a href="<?php echo site_url('ohkr/add_new_specie'); ?>">Add New Specie</a></li>
                        </ul>
                    </li>

                    <ul>

            </div>