
<div id="nav-wrapper">
    <ul id="nav"
        data-ng-controller="NavCtrl"
        data-collapse-nav
        data-slim-scroll
        data-highlight-active>
        <li><a href="<?php echo base_url();?>client/client_home"> <i class="fa fa-home"><span class="icon-bg bg-danger"></span></i><span data-i18n="Dashboard"></span></a></li>
        <li><a href="<?php echo base_url();?>client/createusers"> <i class="fa fa-home"><span class="icon-bg bg-info"></span></i><span data-i18n="Create Users"></span></a></li>
        <li class="">
            <a href="#/form"><i class="fa fa-pencil"><span class="icon-bg bg-success"></span></i><span data-i18n="Manage Users">Manage Users</span></a>
            <ul>
                <?php if(getUserRoleType()){foreach (getUserRoleType()->result() as $value) {?>
                <li><a href="<?php echo base_url();?>client/manageusers/manage/<?php echo $value->role_id; ?>"><i class="fa fa-caret-right"></i><?php echo $value->name;?></a></li>
                <?php }}?>         
            </ul>
        <i class="fa fa-caret-right icon-has-ul"></i>
        </li>

        
    </ul>
</div>