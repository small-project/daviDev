<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><?=$device['device'] == 'MOBILE' ? 'BD Indonesia' : 'Bunga Davi Indonesia'?></a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <?php while ($mn = $listMenu->fetch(PDO::FETCH_LAZY)){ ?>
                <li class="nav-item <?=$menu == $mn['links'] ? 'active' : '' ?>">
                    <a style="text-transform: capitalize;" class="nav-link" href="<?=URL?><?=$mn['links']?>"><?=$mn['menu']?> <span class="sr-only">(current)</span></a>
                </li>
            <?php } ?>
        </ul>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="<?=URL?>logout">Sign out</a>
            </li>
        </ul>
    </div>
</nav>

<div class="nav-scroller bg-white box-shadow">
    <nav class="nav nav-underline">
        <?php
        while ($cols = $subMenus->fetch(PDO::FETCH_LAZY)){
            ?>
            <a style="text-transform: capitalize;" class="nav-link <?=$footer == $cols['link'] ? 'active' : ''?>" href="<?=URL?><?=$cols['menu']?>/?p=<?=$cols['link']?>"><?=$cols['submenu']?>
                <?php if(in_array($cols['link'], ['users'])){ ?>
                    <span class="badge badge-pill bg-success align-text-bottom" style="color: #fff;"><?=$totalUser?></span>
            <?php } ?>
            </a>
        <?php } ?>
    </nav>
</div>