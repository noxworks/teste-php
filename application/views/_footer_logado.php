    </div>
    <script src="<?= base_url('resources'); ?>/vendor/echarts/echarts.min.js"></script>

    <script src="<?= base_url('resources'); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('resources'); ?>/vendor/popper/popper.min.js"></script>
    <script src="<?= base_url('resources'); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('resources'); ?>/vendor/select2/js/select2.full.min.js"></script>
    <script src="<?= base_url('resources'); ?>/vendor/simplebar/simplebar.js"></script>
    <script src="<?= base_url('resources'); ?>/vendor/text-avatar/jquery.textavatar.js"></script>
    <script src="<?= base_url('resources'); ?>/vendor/tippyjs/tippy.all.min.js"></script>
    <script src="<?= base_url('resources'); ?>/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="<?= base_url('resources'); ?>/vendor/wnumb/wNumb.js"></script>
    <script src="<?= base_url('resources'); ?>/js/dashboard.js"></script>

    <script src="<?= base_url('resources'); ?>/vendor/jquery-circle-progress/circle-progress.min.js"></script>
    <script src="<?= base_url('resources'); ?>/vendor/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?= base_url('resources'); ?>/vendor/igorescobar/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="<?= base_url('resources'); ?>/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
    <script src="<?= base_url('resources'); ?>/js/bootstrap-switch.min.js"></script>
    <script src="<?= base_url('resources'); ?>/js/typeahead.bundle.min.js"></script>
    <script src="<?= base_url('resources'); ?>/js/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url('resources'); ?>/js/bootstrap-select/js/i18n/defaults-pt_BR.min.js"></script>
    <!-- Custom JS -->
    <script src="<?= base_url('resources'); ?>/js/_uteis.js" ></script>
    <?php
    if (isset($jsfiles)) {
        foreach ($jsfiles as $js) {
            echo '<script src="' . base_url('resources/js/' . $js) . '"></script>';
        }
    }
    ?>

    <div class="sidebar-mobile-overlay"></div>

</body>
</html>
