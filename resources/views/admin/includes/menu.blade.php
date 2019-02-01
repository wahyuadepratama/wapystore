<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="{{asset('admins/images/logo.png')}}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{asset('admins/images/logo2.png')}}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse" style="font-weight:bolder">
            <ul class="nav navbar-nav">

                <li class="{{ Request::is('root') ? 'active' : '' }}">
                    <a href="/root"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>

                <!-- <li class="menu-item-has-children dropdown {{ Request::is('root/user-management', 'root/user-management/*') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>User Management</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-user"></i><a href="/root/user-management">All User</a></li>
                        <li><i class="menu-icon ti-lock"></i><a href="/root/user-management/blocked">User Blocked</a></li>
                        <li><i class="menu-icon fa fa-plus-square"></i><a href="/root/user-management/add-designer">Add New Designer</a></li>
                    </ul>
                </li> -->

                <!-- <li class="menu-item-has-children dropdown {{ Request::is('root/discount-management', 'root/discount-management/*') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tags"></i>Discount Management</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-tag"></i><a href="/root/discount-management">All Discount</a></li>
                        <li><i class="menu-icon fa fa-user"></i><a href="/root/discount-management/users">User's Discount</a></li>
                    </ul>
                </li> -->

                <li class="menu-item-has-children dropdown {{ Request::is('root/transaction', 'root/transaction/*') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Transactions</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-bell"></i><a href="/root/transaction">Waiting Order</a></li>
                        <li><i class="menu-icon fa fa-user"></i><a href="/root/transaction/on-progress">On Progress Order</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown {{ Request::is('root/theme', 'root/theme/*') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-themeisle"></i>Themes</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-windows"></i><a href="/root/theme">List Theme</a></li>
                        <li><i class="menu-icon fa fa-photo"></i><a href="/root/theme/photo">Theme - Photo</a></li>
                    </ul>
                </li>

                <li class="{{ Request::is('root/file-design') ? 'active' : '' }}">
                    <a href="/root/file-design"> <i class="menu-icon fa fa-folder-open"></i>File Design </a>
                </li>

                <li class="menu-item-has-children dropdown {{ Request::is('root/promote-email') ? 'active' : '' }}">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-share-alt"></i>Promote Via Email</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li><i class="menu-icon fa fa-plus-square"></i><a href="/root/promote-email">New Promote</a></li>
                      <li><i class="menu-icon fa fa-share"></i><a href="/root/promote-email/mailist">Promote to Mailist</a></li>
                  </ul>
                </li>

                <li class="{{ Request::is('root/suggestion') ? 'active' : '' }}">
                    <a href="/root/suggestion"> <i class="menu-icon fa fa-bookmark"></i>Suggestion</a>
                </li>

                <li class="menu-item-has-children dropdown {{ Request::is('root/wapyshop', 'root/wapyshop/*') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-themeisle"></i>Wapy Shop</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-windows"></i><a href="/root/wapyshop">List Stock</a></li>
                        <li><i class="menu-icon fa fa-photo"></i><a href="/root/wapyshop/transaction">Transaction</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</aside>
