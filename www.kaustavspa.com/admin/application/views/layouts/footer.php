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
    <script>
    if (typeof window.jQuery === 'undefined') {
        document.write('<script src="<?= admin_asset('vendor/libs/jquery/jquery.js'); ?>"><\/script>');
    }
    </script>
    <script src="<?= admin_asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
    <script src="<?= admin_asset('js/bootstrap.js'); ?>"></script>

    <!-- app js -->
    <script src="<?= admin_asset('js/conca-sidebar.js'); ?>"></script>
    <script src="<?= admin_asset('js/conca.js'); ?>"></script>

    <!-- Modal: Table Properties & Border Settings -->
    <div class="modal fade" id="modalTableProperties" tabindex="-1" style="z-index: 1085;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-custom">
                <div class="modal-header bg-primary text-white py-3 px-4">
                    <h5 class="modal-title fw-bold text-white mb-0">
                        <i class="fa-solid fa-table-cells me-2"></i>Table Properties &amp; Borders
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <!-- Quick 1-Click Borderless Action -->
                    <div class="p-3 rounded-3 mb-4 d-flex align-items-center justify-content-between bg-light border border-dashed">
                        <div>
                            <div class="fw-bold text-dark mb-1"><i class="fa-solid fa-wand-magic-sparkles text-primary me-1"></i> Quick Border Removal</div>
                            <div class="fz-12px text-muted">Strip all borders from this table with one click</div>
                        </div>
                        <button type="button" class="btn btn-outline-danger btn-sm rounded-pill px-3" onclick="removeTableBorderFromModal()">
                            <i class="fa-solid fa-border-none me-1"></i> Remove All Borders
                        </button>
                    </div>

                    <div class="row g-3">
                        <!-- Border Style -->
                        <div class="col-md-6">
                            <label class="form-label text-dark fz-13px fw-semibold">Border Style</label>
                            <select id="tpBorderStyle" class="form-select form-select-sm rounded-3">
                                <option value="none">No Border (Borderless)</option>
                                <option value="solid" selected>Solid Line</option>
                                <option value="dashed">Dashed Line</option>
                                <option value="dotted">Dotted Line</option>
                                <option value="double">Double Line</option>
                            </select>
                        </div>

                        <!-- Border Width -->
                        <div class="col-md-6">
                            <label class="form-label text-dark fz-13px fw-semibold">Border Width</label>
                            <select id="tpBorderWidth" class="form-select form-select-sm rounded-3">
                                <option value="0px">0px (No Border)</option>
                                <option value="1px" selected>1px (Thin)</option>
                                <option value="2px">2px (Medium)</option>
                                <option value="3px">3px (Thick)</option>
                            </select>
                        </div>

                        <!-- Border Color -->
                        <div class="col-md-6">
                            <label class="form-label text-dark fz-13px fw-semibold">Border Color</label>
                            <div class="d-flex align-items-center gap-2">
                                <input type="color" id="tpBorderColor" class="form-control form-control-color" value="#cbd5e1" style="width: 44px; height: 32px; padding: 2px;">
                                <select id="tpBorderColorPreset" class="form-select form-select-sm rounded-3" onchange="if(this.value) $('#tpBorderColor').val(this.value);">
                                    <option value="">Custom Color</option>
                                    <option value="#cbd5e1" selected>Slate (#cbd5e1)</option>
                                    <option value="#e2e8f0">Light Gray (#e2e8f0)</option>
                                    <option value="#6366f1">Indigo (#6366f1)</option>
                                    <option value="#000000">Black (#000000)</option>
                                    <option value="#c29958">Gold (#c29958)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Table Width -->
                        <div class="col-md-6">
                            <label class="form-label text-dark fz-13px fw-semibold">Table Width</label>
                            <select id="tpTableWidth" class="form-select form-select-sm rounded-3">
                                <option value="100%" selected>100% (Full Width)</option>
                                <option value="75%">75% Width</option>
                                <option value="50%">50% Width</option>
                                <option value="auto">Auto (Fit to content)</option>
                            </select>
                        </div>

                        <!-- Cell Padding -->
                        <div class="col-md-6">
                            <label class="form-label text-dark fz-13px fw-semibold">Cell Padding / Spacing</label>
                            <select id="tpCellPadding" class="form-select form-select-sm rounded-3">
                                <option value="none">None (0px)</option>
                                <option value="compact">Compact (4px 8px)</option>
                                <option value="normal" selected>Normal (10px 14px)</option>
                                <option value="spacious">Spacious (16px 20px)</option>
                            </select>
                        </div>

                        <!-- Table Alignment -->
                        <div class="col-md-6">
                            <label class="form-label text-dark fz-13px fw-semibold">Table Alignment</label>
                            <select id="tpTableAlign" class="form-select form-select-sm rounded-3">
                                <option value="left" selected>Left Aligned</option>
                                <option value="center">Centered</option>
                                <option value="right">Right Aligned</option>
                            </select>
                        </div>

                        <!-- Additional Toggles -->
                        <div class="col-12 pt-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tpStripedRows">
                                <label class="form-check-label text-muted fz-13px" for="tpStripedRows">
                                    Alternating striped rows (zebra striping)
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer py-3 px-4 border-top d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-danger btn-sm rounded-pill" onclick="removeTableBorderFromModal()">
                        <i class="fa-solid fa-border-none me-1"></i> Remove All Borders
                    </button>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary btn-sm rounded-pill px-4 shadow-custom" onclick="applyTableProperties()">
                            <i class="fa-solid fa-check me-1"></i> Apply Properties
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Universal Summernote WYSIWYG Auto-Initializer & Table Properties Manager -->
    <script>
    window.activeTableNode = null;
    window.activeEditorContext = null;

    $(document).on('click mousedown keyup', '.note-editable table, .note-editable td, .note-editable th', function() {
        window.activeTableNode = $(this).closest('table')[0];
    });

    window.getTargetTable = function(context) {
        if (context) window.activeEditorContext = context;
        if (window.activeTableNode && $(window.activeTableNode).closest('.note-editable').length) {
            return $(window.activeTableNode);
        }
        var sel = window.getSelection();
        if (sel && sel.anchorNode) {
            var $t = $(sel.anchorNode).closest('table');
            if ($t.length && $t.closest('.note-editable').length) {
                window.activeTableNode = $t[0];
                return $t;
            }
        }
        var $activeEditor = $('.note-editor.note-frame.focus, #modalService .note-editor, #modalBlog .note-editor, .note-editor').first();
        var $tables = $activeEditor.find('.note-editable table');
        if ($tables.length >= 1) {
            window.activeTableNode = $tables.first()[0];
            return $tables.first();
        }
        return null;
    };

    window.openTablePropertiesModal = function(context) {
        var $table = getTargetTable(context);
        if (!$table || !$table.length) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'info',
                    title: 'Table Not Selected',
                    text: 'Please click inside a table to edit its properties, or insert a table first.',
                    confirmButtonText: 'OK'
                });
            } else {
                alert('Please click inside a table to edit its properties, or insert a table first.');
            }
            return;
        }

        var isBorderless = $table.hasClass('table-borderless') || $table.hasClass('no-border') || $table.attr('data-borderless') === '1' || $table.css('border-style') === 'none' || ($table.attr('style') && $table.attr('style').indexOf('border: none') !== -1);
        
        if (isBorderless) {
            $('#tpBorderStyle').val('none');
            $('#tpBorderWidth').val('0px');
        } else {
            var style = $table.css('border-style') || 'solid';
            $('#tpBorderStyle').val(style !== 'none' ? style : 'solid');
            var width = $table.css('border-width') || '1px';
            $('#tpBorderWidth').val(width !== '0px' ? width : '1px');
        }

        var curWidth = $table[0].style.width || '100%';
        if (curWidth === '100%' || curWidth === '75%' || curWidth === '50%' || curWidth === 'auto') {
            $('#tpTableWidth').val(curWidth);
        } else {
            $('#tpTableWidth').val('100%');
        }

        var firstCell = $table.find('td, th').first();
        var curPad = firstCell.length ? firstCell.css('padding-top') : '10px';
        if (parseInt(curPad) <= 2) {
            $('#tpCellPadding').val('none');
        } else if (parseInt(curPad) <= 6) {
            $('#tpCellPadding').val('compact');
        } else if (parseInt(curPad) >= 16) {
            $('#tpCellPadding').val('spacious');
        } else {
            $('#tpCellPadding').val('normal');
        }

        var marginLeft = $table[0].style.marginLeft;
        var marginRight = $table[0].style.marginRight;
        if (marginLeft === 'auto' && marginRight === 'auto') {
            $('#tpTableAlign').val('center');
        } else if (marginLeft === 'auto') {
            $('#tpTableAlign').val('right');
        } else {
            $('#tpTableAlign').val('left');
        }

        $('#tpStripedRows').prop('checked', $table.hasClass('table-striped'));

        var modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('modalTableProperties'), {
            backdrop: true
        });
        modal.show();
    };

    window.stripAllTableBorders = function($table) {
        if (!$table || !$table.length) return;

        $table.removeClass('table-bordered')
              .addClass('table-borderless no-border')
              .attr('data-borderless', '1')
              .attr('border', '0');

        $table.css({
            'border': 'none',
            'border-top': 'none',
            'border-bottom': 'none',
            'border-left': 'none',
            'border-right': 'none',
            'border-collapse': 'collapse'
        });

        $table.find('thead, tbody, tfoot, tr').each(function() {
            $(this).removeClass('table-bordered');
            this.style.setProperty('border', 'none', 'important');
            this.style.setProperty('border-top', 'none', 'important');
            this.style.setProperty('border-bottom', 'none', 'important');
            this.style.setProperty('border-left', 'none', 'important');
            this.style.setProperty('border-right', 'none', 'important');
            this.style.setProperty('box-shadow', 'none', 'important');
        });

        $table.find('td, th').each(function() {
            $(this).addClass('no-border');
            this.style.setProperty('border', 'none', 'important');
            this.style.setProperty('border-top', 'none', 'important');
            this.style.setProperty('border-bottom', 'none', 'important');
            this.style.setProperty('border-left', 'none', 'important');
            this.style.setProperty('border-right', 'none', 'important');
            this.style.setProperty('box-shadow', 'none', 'important');
        });
    };

    window.removeTableBorderFromModal = function() {
        var $table = getTargetTable(window.activeEditorContext);
        if ($table && $table.length) {
            stripAllTableBorders($table);

            if (window.activeEditorContext && window.activeEditorContext.invoke) {
                try { window.activeEditorContext.invoke('editor.afterCommand'); } catch(e) {}
            }
            $('.summernote-editor, #svcDescriptionEditor, #blogContentEditor').trigger('summernote.change');
        }
        var modalEl = document.getElementById('modalTableProperties');
        var modal = bootstrap.Modal.getInstance(modalEl);
        if (modal) modal.hide();
        showTableToast('All table borders removed completely!');
    };

    window.applyTableProperties = function() {
        var $table = getTargetTable(window.activeEditorContext);
        if (!$table || !$table.length) return;

        var borderStyle = $('#tpBorderStyle').val();
        var borderWidth = $('#tpBorderWidth').val();
        var borderColor = $('#tpBorderColor').val() || '#cbd5e1';
        var tableWidth = $('#tpTableWidth').val();
        var cellPaddingPreset = $('#tpCellPadding').val();
        var tableAlign = $('#tpTableAlign').val();
        var isStriped = $('#tpStripedRows').is(':checked');

        if (borderStyle === 'none' || borderWidth === '0px') {
            stripAllTableBorders($table);
        } else {
            $table.removeClass('table-borderless no-border').removeAttr('data-borderless');
            var borderVal = borderWidth + ' ' + borderStyle + ' ' + borderColor;
            $table.css({
                'border': borderVal,
                'border-collapse': 'collapse'
            });
            $table.find('thead, tbody, tfoot, tr').each(function() {
                this.style.removeProperty('border');
                this.style.removeProperty('border-top');
                this.style.removeProperty('border-bottom');
                this.style.removeProperty('border-left');
                this.style.removeProperty('border-right');
                this.style.removeProperty('box-shadow');
            });
            $table.find('td, th').each(function() {
                this.style.setProperty('border', borderVal, 'important');
                $(this).removeClass('no-border');
            });
        }

        if (tableWidth) {
            $table.css('width', tableWidth);
        }

        if (tableAlign === 'center') {
            $table.css({ 'margin-left': 'auto', 'margin-right': 'auto' });
        } else if (tableAlign === 'right') {
            $table.css({ 'margin-left': 'auto', 'margin-right': '0' });
        } else {
            $table.css({ 'margin-left': '0', 'margin-right': 'auto' });
        }

        var padVal = '10px 14px';
        if (cellPaddingPreset === 'none') padVal = '0px';
        else if (cellPaddingPreset === 'compact') padVal = '4px 8px';
        else if (cellPaddingPreset === 'spacious') padVal = '16px 20px';
        $table.find('td, th').css('padding', padVal);

        if (isStriped) {
            $table.addClass('table-striped');
            $table.find('tr:nth-child(even)').css('background-color', 'rgba(0, 0, 0, 0.03)');
        } else {
            $table.removeClass('table-striped');
            $table.find('tr').css('background-color', '');
        }

        var modalEl = document.getElementById('modalTableProperties');
        var modal = bootstrap.Modal.getInstance(modalEl);
        if (modal) modal.hide();

        if (window.activeEditorContext && window.activeEditorContext.invoke) {
            try { window.activeEditorContext.invoke('editor.afterCommand'); } catch(e) {}
        }
        $('.summernote-editor, #svcDescriptionEditor, #blogContentEditor').trigger('summernote.change');
        showTableToast(borderStyle === 'none' || borderWidth === '0px' ? 'All table borders removed completely!' : 'Table properties updated!');
    };

    window.showTableToast = function(msg) {
        $('.table-feedback-toast').remove();
        var $toast = $('<div class="table-feedback-toast position-fixed bottom-0 end-0 p-3" style="z-index: 1095;">' +
            '<div class="toast show align-items-center text-white bg-dark shadow-lg rounded-3" role="alert">' +
            '<div class="d-flex"><div class="toast-body fw-semibold"><i class="fa-solid fa-check text-success me-2"></i>' + msg + '</div>' +
            '<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>' +
            '</div></div></div>');
        $('body').append($toast);
        setTimeout(function() {
            $toast.fadeOut(400, function() { $(this).remove(); });
        }, 2800);
    };

    $(document).ready(function() {
        if (typeof $.fn.summernote !== 'undefined') {
            $('.summernote-editor').each(function() {
                var $elem = $(this);
                if (!$elem.next().hasClass('note-editor')) {
                    $elem.summernote({
                        height: $elem.data('height') || 250,
                        placeholder: $elem.attr('placeholder') || 'Type content here...',
                        dialogsInBody: false,
                        dialogsFade: false,
                        tabsize: 2,
                        tableClassName: 'table',
                        buttons: {
                            tableProperties: typeof makeTablePropertiesBtn !== 'undefined' ? makeTablePropertiesBtn : null
                        },
                        toolbar: [
                            ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
                            ['font', ['strikethrough', 'superscript', 'subscript']],
                            ['fontsize', ['fontsize']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['table', ['table', 'tableProperties']],
                            ['insert', ['link', 'picture', 'video', 'hr']],
                            ['view', ['fullscreen', 'codeview', 'help']]
                        ],
                        popover: {
                            table: [
                                ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                                ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                                ['custom', ['tableProperties']]
                            ]
                        },
                        callbacks: {
                            onChange: function(contents) {
                                $elem.val(contents);
                            }
                        }
                    });
                }
            });
        }
    });

    // Ensure Summernote modal backdrop never covers or blocks the screen
    $(document).on('note.modal.show', function() {
        $('.note-modal-backdrop').remove();
    });
    $(document).on('click', '.note-btn', function() {
        setTimeout(function() {
            $('.note-modal-backdrop').remove();
        }, 30);
    });

    // Close Summernote modal when clicking close button or outside content
    $(document).on('click', '.note-modal .close, .note-modal .note-close', function(e) {
        e.preventDefault();
        var $modal = $(this).closest('.note-modal');
        var modal = $modal.data('modal');
        if (modal && typeof modal.hide === 'function') {
            modal.hide();
        } else {
            $modal.removeClass('open').hide();
        }
        $('.note-modal-backdrop').remove();
    });

    $(document).on('click', '.note-modal', function(e) {
        if ($(e.target).hasClass('note-modal')) {
            $(this).find('.close, .note-close').first().trigger('click');
            $('.note-modal-backdrop').remove();
        }
    });

    $(document).on('keydown', function(e) {
        if (e.which === 27 && ($('.note-modal.open:visible').length || $('.note-modal:visible').length)) {
            $('.note-modal:visible').each(function() {
                var modal = $(this).data('modal');
                if (modal && typeof modal.hide === 'function') {
                    modal.hide();
                } else {
                    $(this).removeClass('open').hide();
                }
            });
            $('.note-modal-backdrop').remove();
        }
    });

    // Prevent Bootstrap modal from stealing focus from Summernote dialogs
    document.addEventListener('focusin', function(e) {
        if (e.target && e.target.closest && (e.target.closest('.note-modal') || e.target.closest('.note-editor'))) {
            e.stopImmediatePropagation();
        }
    }, true);
    </script>
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
