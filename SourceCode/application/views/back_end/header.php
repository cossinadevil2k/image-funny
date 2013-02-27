<div class="headerinner">        	
    <a href=""><img src="<?php echo base_url(); ?>content-admin/images/starlight_admin_template_logo_small.png" alt="" /></a>


    <div class="headright">
        <div class="headercolumn">&nbsp;</div>
        <div id="searchPanel" class="headercolumn">
                <div class="searchbox">
                <form action="" method="post">
                    <input type="text" id="keyword" name="keyword" class="radius2" value="Search here" /> 
                </form>
            </div><!--searchbox-->
        </div><!--headercolumn-->
        <div id="notiPanel" class="headercolumn">
            <div class="notiwrapper">
                <a href="./ajax/messages.php.html" class="notialert radius2">5</a>
                <div class="notibox">
                    <ul class="tabmenu">
                        <li class="current"><a href="./ajax/messages.php.html" class="msg">Messages (2)</a></li>
                        <li><a href="./ajax/activities.php.html" class="act">Recent Activity (3)</a></li>
                    </ul>
                    <br clear="all" />
                    <div class="loader"><img src="<?php echo base_url(); ?>content-admin/images/loaders/loader3.gif" alt="Loading Icon" /> Loading...</div>
                    <div class="noticontent"></div><!--noticontent-->
                </div><!--notibox-->
            </div><!--notiwrapper-->
        </div><!--headercolumn-->
        <div id="userPanel" class="headercolumn">
            <a href="" class="userinfo radius2">
                <img src="<?php echo base_url(); ?>content-admin/images/avatar.png" alt="" class="radius2" />
                <span><strong>Xin chào, <?php echo $this->session->userdata('username');  ?></strong></span>
            </a>
            <div class="userdrop">
                <ul>
                    <li><a href="<?php echo base_url(); ?>administrator/users/profile/<?php echo $this->session->userdata('user_id');?>">Edit Profile</a></li>
                    <li><a href="">Account Settings</a></li>
                    <li><a href="<?php echo base_url(); ?>administrator/login/logout/">Logout</a></li>
                </ul>
            </div><!--userdrop-->
        </div><!--headercolumn-->
    </div><!--headright-->

</div><!--headerinner-->