
<div id="nav-wrapper">
    <ul id="nav"
        data-ng-controller="NavCtrl"
        data-collapse-nav
        data-slim-scroll
        data-highlight-active>
        <li><a href="#/dashboard"> <i class="fa fa-home"><span class="icon-bg bg-danger"></span></i><span data-i18n="Dashboard"></span></a></li>
        <li><a href="<?php echo base_url();?>client/createusers"> <i class="fa fa-home"><span class="icon-bg bg-info"></span></i><span data-i18n="Create Users"></span></a></li>
        <li>
            <a href="#/ui"><i class="fa fa-magic"><span class="icon-bg bg-orange"></span></i><span data-i18n="Manage Users"></span></a>
            <ul>
                <li><a href="#/ui/buttons"><i class="fa fa-caret-right"></i>Administrator</a></li>
                <li><a href="#/ui/buttons"><i class="fa fa-caret-right"></i>Transaction Initiator</a></li>
                <li><a href="#/ui/buttons"><i class="fa fa-caret-right"></i>Transaction Reviewer</a></li>
                <li><a href="#/ui/buttons"><i class="fa fa-caret-right"></i>Transaction Approver1</a></li>
                <li><a href="#/ui/buttons"><i class="fa fa-caret-right"></i>Transaction Approver2</a></li>                
            </ul>
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