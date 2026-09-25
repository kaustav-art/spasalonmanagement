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