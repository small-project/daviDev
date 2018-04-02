<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="#">BD Indonesia</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?=$menu == 'index' ? 'active' : '' ?>">
                <a class="nav-link" href="<?=URL?>index">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?=$menu == 'payment' ? 'active' : '' ?>">
                <a class="nav-link" href="<?=URL?>payment">Payment</a>
            </li>
            <li class="nav-item <?=$menu == 'corporate' ? 'active' : '' ?>">
                <a class="nav-link" href="<?=URL?>corporate">Corporate</a>
            </li>
            <li class="nav-item <?=$menu == 'florist' ? 'active' : '' ?>">
                <a class="nav-link" href="<?=URL?>?p=florist">Florist</a>
            </li>
            <li class="nav-item <?=$menu == 'customer' ? 'active' : '' ?>">
                <a class="nav-link" href="<?=URL?>?p=customer">Customer</a>
            </li>
            <li class="nav-item <?=$menu == 'sales' ? 'active' : '' ?>">
                <a class="nav-link" href="<?=URL?>?p=sales">Sales</a>
            </li>
            <li class="nav-item <?=$menu == 'bd' ? 'active' : '' ?>">
                <a class="nav-link" href="<?=URL?>?p=bd">BD</a>
            </li>
            <li class="nav-item <?=$menu == 'kurir' ? 'active' : '' ?>">
                <a class="nav-link" href="<?=URL?>?p=kurir">Kurir</a>
            </li>
            <li class="nav-item <?=$menu == 'management' ? 'active' : '' ?>">
                <a class="nav-link" href="<?=URL?>?p=management">Management</a>
            </li>
        </ul>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="<?=URL?>?p=logout">Sign out</a>
            </li>
        </ul>
    </div>
</nav>

<div class="nav-scroller bg-white box-shadow">
    <?php if($menu == 'index'){ ?>
        <nav class="nav nav-underline">
            <a class="nav-link active" href="#">Dashboard</a>
            <a class="nav-link" href="#">
                Friends
                <span class="badge badge-pill bg-light align-text-bottom">27</span>
            </a>
        </nav>
    <?php } ?>

            <?php if($menu == 'payment' ){ ?>
                <nav class="nav nav-underline">
                    <a class="nav-link <?=$footer == 'index' ? 'active' : ''?>" href="<?=URL?>payment/?p=index">Dashboard <span class="badge badge-pill bg-light align-text-bottom">0</span></a>
                    <a class="nav-link <?=$footer == 'new' ? 'active' : ''?>" href="<?=URL?>payment/?p=new">New Order <span class="badge badge-pill bg-light align-text-bottom">0</span></a>
                    <a class="nav-link <?=$footer == 'process' ? 'active' : ''?>" href="<?=URL?>payment/?p=process">On Process <span class="badge badge-pill bg-light align-text-bottom">0</span></a>
                    <a class="nav-link <?=$footer == 'delivery' ? 'active' : ''?>" href="<?=URL?>payment/?p=delivery">On Delivery <span class="badge badge-pill bg-light align-text-bottom">0</span></a>
                    <a class="nav-link <?=$footer == 'report' ? 'active' : ''?>" href="<?=URL?>payment/?p=report">Report <span class="badge badge-pill bg-light align-text-bottom">0</span></a>
                    <a class="nav-link <?=$footer == 'neworder' ? 'active' : ''?>" href="<?=URL?>payment/?p=neworder" style="color: #1c7430">Create Order <span class="badge badge-pill bg-light align-text-bottom"><i class="fa fa-fw fa-plus"></i></span></a>

                </nav>
            <?php }elseif ($menu == 'corporate'){ ?>
                <nav class="nav nav-underline">
                    <a class="nav-link <?=$footer == 'index' ? 'active' : ''?>" href="<?=CORPORATE?>?p=index">Dashboard</a>
                    <a class="nav-link <?=$footer == 'new' ? 'active' : ''?>" href="<?=CORPORATE?>?p=new">
                        New Corporate
                    </a>
                </nav>
            <?php }elseif ($menu == 'florist'){ ?>
                <nav class="nav nav-underline">
                    <a class="nav-link active" href="#">Dashboard</a>
                    <a class="nav-link" href="#">
                        Friends
                        <span class="badge badge-pill bg-light align-text-bottom">27</span>
                    </a>
                </nav>
            <?php }elseif ($menu == 'customer'){ ?>
                <nav class="nav nav-underline">
                    <a class="nav-link active" href="#">Dashboard</a>
                    <a class="nav-link" href="#">
                        Friends
                        <span class="badge badge-pill bg-light align-text-bottom">27</span>
                    </a>
                </nav>
            <?php }elseif ($menu == 'sales'){ ?>
                <nav class="nav nav-underline">
                    <a class="nav-link active" href="#">Dashboard</a>
                    <a class="nav-link" href="#">
                        Friends
                        <span class="badge badge-pill bg-light align-text-bottom">27</span>
                    </a>
                </nav>
            <?php }elseif ($menu == 'bd'){ ?>
                <nav class="nav nav-underline">
                    <a class="nav-link active" href="#">Dashboard</a>
                    <a class="nav-link" href="#">
                        Friends
                        <span class="badge badge-pill bg-light align-text-bottom">27</span>
                    </a>
                </nav>
            <?php }elseif ($menu == 'kurir'){ ?>
                <nav class="nav nav-underline">
                    <a class="nav-link active" href="#">Dashboard</a>
                    <a class="nav-link" href="#">
                        Friends
                        <span class="badge badge-pill bg-light align-text-bottom">27</span>
                    </a>
                </nav>
            <?php }elseif ($menu == 'management'){ ?>
                <nav class="nav nav-underline">
                    <a class="nav-link active" href="#">Dashboard</a>
                    <a class="nav-link" href="#">
                        Friends
                        <span class="badge badge-pill bg-light align-text-bottom">27</span>
                    </a>
                </nav>
            <?php } ?>

</div>