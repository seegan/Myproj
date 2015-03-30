
<div id="nav-wrapper">
    <ul id="nav"
        data-ng-controller="NavCtrl"
        data-collapse-nav
        data-slim-scroll
        data-highlight-active>
        <li><a href="<?php echo base_url();?>super_admin/admin_home" class="active"> <i class="fa fa-home"><span class="icon-bg bg-danger"></span></i><span data-i18n="DashBoard"></span></a></li>
        <li>
            <a href="<?php echo base_url();?>super_admin/clientlist"><i class="fa fa-magic"><span class="icon-bg bg-orange"></span></i><span data-i18n="Client List"></span></a>
        </li>
        <li>
            <a href="<?php echo base_url();?>super_admin/clienttopuplist"><i class="fa fa-magic"><span class="icon-bg bg-orange"></span></i><span data-i18n="Client Topup List"></span></a>
        </li>
        <li>
            <a href="#/table"><i class="fa fa-star"><span class="icon-bg bg-warning"></span></i><span data-i18n="Payment_Reports"></span></a>
            <ul>
                <li><a href="#/tables/static"><i class="fa fa-caret-right"></i>report1</a></li>
                <li><a href="#/tables/static"><i class="fa fa-caret-right"></i>report1</a></li>
                <li><a href="#/tables/static"><i class="fa fa-caret-right"></i>report1</a></li>
                <li><a href="#/tables/static"><i class="fa fa-caret-right"></i>report1</a></li>
                <li><a href="#/tables/static"><i class="fa fa-caret-right"></i>report1</a></li>
            </ul>
        </li>
        
    </ul>
</div>