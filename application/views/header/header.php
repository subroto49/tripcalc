<!--Navbar-->
<div class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/dashboard"><?php echo $settings['brandname']; ?></a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($menu) && count($menu)) {
                    foreach($menu as $menuid => $menuarr){
                ?>
                        <li <?php echo (count($menuarr['child'])) ? 'class="dropdown"' : '' ?>>
                        <a href="<?php echo $menuarr['menuurl'];?>" <?php echo (count($menuarr['child'])) ? 'data-target="#" class="dropdown-toggle" data-toggle="dropdown"' : ''?>><?php echo $menuarr['menuname'];?>

                    <?php if(count($menuarr['child'])){?>
                        <b class="caret"></b>
                    <?php }?>
                        </a>
                            <?php if(count($menuarr['child'])){?>
                                <ul class="dropdown-menu" role="menu">
                                    <?php foreach($menuarr['child'] as $chmenuid => $chmenuarr){ ?>
                                        <li><a href="<?php echo $chmenuarr['menuurl'];?>"><?php echo $chmenuarr['menuname'];?></a></li>
                                    <?php }?>
                                </ul>  
                            <?php } ?>
                        </li>
                <?php }
                    }
                ?>
            </ul>
        </div>
    </div>
</div>