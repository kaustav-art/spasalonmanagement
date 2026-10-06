    <!-- global js scripts for all pages from Conca theme -->
    <script src="<?= admin_asset('vendor/libs/jquery/jquery.js'); ?>"></script>
    <script src="<?= admin_asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
    <script src="<?= admin_asset('js/bootstrap.js'); ?>"></script>

    <!-- app js -->
    <script src="<?= admin_asset('js/conca-sidebar.js'); ?>"></script>
    <script src="<?= admin_asset('js/conca.js'); ?>"></script>

    <?php if (!empty($extra_js)): ?>
        <?php foreach ($extra_js as $js): ?>
            <?php if (str_starts_with(trim($js), '<script')): ?>
                <?= $js ?>
            <?php else: ?>
                <script src="<?= (strpos($js, 'http') === 0) ? $js : admin_asset($js); ?>"></script>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
