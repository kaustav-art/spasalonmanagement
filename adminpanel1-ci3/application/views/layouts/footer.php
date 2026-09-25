            <footer class="app-footer mt-auto py-3 text-center">
                <div class="container">
                    <span class="text-muted"> Copyright ©
                        <span id="footer-year"><?= date('Y'); ?></span>
                        Make with <span class="text-danger">❤️</span> by <a href="https://themeforest.net/user/aqlova" target="_blank" class="footer-link text-primary fw-medium">Aqlova</a> All rights reserved
                    </span>
                </div>
            </footer>

            <div class="app-backdrop"></div>
            <!-- app content end -->
        </div>
        <!-- app wrapper end -->
    </div>

    <!-- global js scripts for all pages -->
    <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.js'); ?>"></script>

    <!-- app js -->
    <script src="<?= base_url('assets/js/conca-sidebar.js'); ?>"></script>
    <script src="<?= base_url('assets/js/conca.js'); ?>"></script>

    <?php if (!empty($extra_js)): ?>
        <?php foreach ($extra_js as $js): ?>
            <?php if (str_starts_with(trim($js), '<script')): ?>
                <?= $js ?>
            <?php else: ?>
                <script src="<?= base_url($js); ?>"></script>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>