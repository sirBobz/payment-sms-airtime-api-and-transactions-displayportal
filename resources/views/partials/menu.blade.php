<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route('admin.home') }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.airtime.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-globe ">

                    </i>
                    Airtime
                </a>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-sms nav-icon">

                    </i>
                    Sms
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route('admin.sms.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-list fas-5x">

                            </i>
                            Sms records
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.sms.bulkSms') }}" class="nav-link">
                            <i class="nav-icon fas fa-sms fas-5x">

                            </i>
                            Bulk sms
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fab fa-amazon-pay nav-icon">

                    </i>
                    M-PESA
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route('admin.customer-to-business.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-mobile-alt">

                            </i>
                             C2B transactions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.business-to-customer.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-money-check-alt">

                            </i>
                             B2C transactions
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.api.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-cogs">

                    </i>
                    API
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.account-billing.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-bell">

                    </i>
                    Billing
                </a>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users nav-icon">

                    </i>
                    Users
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}"
                            class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-user nav-icon">

                            </i>
                            users
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutFormModal"> <i
                        class="nav-icon fas fa-fw fa-sign-out-alt" aria-hidden="true"></i> Logout
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
