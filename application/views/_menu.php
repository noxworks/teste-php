<?php

function menuActive($menu) {
    $ci = & get_instance();
    $comp = $ci->uri->segment(1);
    if (is_array($menu)) {
        return (in_array($comp, $menu)) ? 'active' : null;
    } else {
        return ($comp == $menu) ? 'active' : null;
    }
}
?>
<div class="sidebar-section">
    <div class="sidebar-section__scroll">
        <div class="sidebar-user-a">
            <img src="<?=base_url('resources');?>/images/users/foto.jpg" alt="" class="sidebar-user-a__avatar rounded-circle">
            <div class="sidebar-user-a__name">Fabio Fila</div>
            <div class="sidebar-user-a__desc">Analista Desenvolvedor PHP</div>
<!--
            <a href="#" class="btn icon-left sidebar-user-a__link">
                Personal Account <span class="btn-icon ua-icon-user-solid"></span>
            </a>
-->
        </div>
        <div>
            <div class="sidebar-section__separator">Menu Principal</div>
            <ul class="sidebar-section-nav">
                <li class="sidebar-section-nav__item">
                    <a class="sidebar-section-nav__link" href="<?= site_url('/'); ?>">
                        <span class="sidebar-section-nav__item-icon ua-icon-home"></span>
                        <span class="sidebar-section-nav__item-text">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-section-nav__item">
                    <a class="sidebar-section-nav__link" href="<?= site_url('produtos'); ?>">
                        <span class="sidebar-section-nav__item-icon ua-icon-list"></span>
                        <span class="sidebar-section-nav__item-text">Produtos</span>
                        <!--<span class="badge sidebar-section-nav__badge">2</span>-->
                    </a>
                </li>
                

            </ul>
        </div>
    </div>
</div>
