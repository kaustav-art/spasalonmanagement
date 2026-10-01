            <!-- app footer start -->
            <footer class="app-footer mt-auto py-3 text-center">
                <div class="container-fluid">
                    <span class="text-muted fs-13px"> Copyright &copy;
                        <span id="footer-year"><?= date('Y'); ?></span>
                        <strong class="text-primary"><?= html_escape(get_setting('business_name', 'Salon & Spa Management')) ?></strong>. All rights reserved. Self-Hosted Multi-Edition Solution.
                    </span>
                </div>
            </footer>
            <!-- app footer end -->

            <div class="app-backdrop"></div>
        </div>
        <!-- app wrapper end -->
    </div>
    <!-- app main end -->

    <!-- global js scripts for all pages from Conca theme -->
    <script src="<?= admin_asset('vendor/libs/jquery/jquery.js'); ?>"></script>
    <script src="<?= admin_asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
    <script src="<?= admin_asset('js/bootstrap.js'); ?>"></script>

    <!-- app js -->
    <script src="<?= admin_asset('js/conca-sidebar.js'); ?>"></script>
    <script src="<?= admin_asset('js/conca.js'); ?>"></script>
    <script src="<?= admin_asset('vendor/libs/apexcharts/apexcharts.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if (!empty($extra_js)): ?>
        <?php foreach ($extra_js as $js): ?>
            <?php if (str_starts_with(trim($js), '<script')): ?>
                <?= $js ?>
            <?php else: ?>
                <script src="<?= (strpos($js, 'http') === 0) ? $js : admin_asset($js); ?>"></script>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <script>
    // Auto-dismiss alerts after 5 seconds
    setTimeout(function() {
        $('.alert-dismissible').fadeOut('slow');
    }, 5000);
    </script>
</body>
</html>
