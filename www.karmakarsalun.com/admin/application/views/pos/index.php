<!-- Page Header -->
<div class="page-header pb-7 d-flex flex-wrap align-items-center justify-content-between gap-4">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1 fz-12px">
                <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Point of Sale (POS)</li>
            </ol>
        </nav>
        <h2 class="fw-semibold fs-7 mb-1 text-dark">Point of Sale (POS) Terminal</h2>
        <p class="text-custom-paragraph fz-13px mb-0">Fast checkout register for salon services and spa sessions.</p>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="<?= admin_url('sales') ?>" class="btn btn-outline-secondary rounded-pill d-inline-flex align-items-center gap-2">
            <i class="fa-solid fa-receipt"></i>
            <span>Invoices History</span>
        </a>
    </div>
</div>

<div class="row g-4">
    <!-- Left Column: Services Catalog -->
    <div class="col-xl-7 col-lg-6">
        <div class="pure-card rounded-custom card-bg shadow-custom h-100">
            <div class="pure-card-header py-4 px-5 border-bottom">
                <div class="row g-3 align-items-center">
                    <div class="col-md-6">
                        <div class="form-control-icon">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.22221 13.4444C10.6586 13.4444 13.4444 10.6586 13.4444 7.22221C13.4444 3.78578 10.6586 1 7.22221 1C3.78578 1 1 3.78578 1 7.22221C1 10.6586 3.78578 13.4444 7.22221 13.4444Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M15 15L11.6167 11.6166" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <input type="text" id="posSearch" placeholder="Search services...">
                        </div>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <select id="posCategoryFilter" class="form-select form-select-sm rounded-pill">
                            <option value="all">All Service Categories</option>
                            <?php if (!empty($service_categories)): ?>
                                <?php foreach ($service_categories as $cat): ?>
                                    <option value="<?= $cat->id ?>"><?= html_escape($cat->name) ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="pure-card-body p-4" style="max-height: 660px; overflow-y: auto;">
                <div class="row g-3" id="catalogContainer">
                    <!-- Services Items -->
                    <?php if (!empty($services)): ?>
                        <?php foreach ($services as $srv): ?>
                            <div class="col-xxl-4 col-md-6 catalog-item" data-category="<?= $srv->category_id ?>" data-name="<?= strtolower(html_escape($srv->name)) ?>" data-id="<?= $srv->id ?>" data-price="<?= $srv->price ?>">
                                <div class="pos-product-card shadow-sm" onclick="addToCart(<?= $srv->id ?>, '<?= addslashes(html_escape($srv->name)) ?>', <?= $srv->price ?>)">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="badge badge-label-primary rounded-pill fz-11px">Service</span>
                                        <small class="text-muted fz-12px"><i class="fa-regular fa-clock me-1"></i><?= $srv->duration ?>m</small>
                                    </div>
                                    <h6 class="fw-semibold mb-1 text-truncate text-dark fz-14px" title="<?= html_escape($srv->name) ?>"><?= html_escape($srv->name) ?></h6>
                                    <div class="d-flex align-items-center justify-content-between mt-3">
                                        <span class="fw-bold text-dark fs-15px"><?= format_currency($srv->price) ?></span>
                                        <button type="button" class="btn btn-xs btn-primary rounded-circle d-flex align-items-center justify-content-center" style="width:26px;height:26px;">
                                            <i class="fa-solid fa-plus fs-11px"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5 text-muted">
                            <i class="fa-solid fa-spa fs-1 mb-2 d-block text-secondary"></i>
                            <p class="mb-0">No active services found in catalog.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column: Cart & Checkout -->
    <div class="col-xl-5 col-lg-6">
        <div class="pure-card rounded-custom card-bg shadow-custom h-100 d-flex flex-column">
            <!-- Customer Selection Header -->
            <div class="pure-card-header py-4 px-5 border-bottom">
                <div class="d-flex align-items-center justify-content-between gap-2">
                    <div class="flex-grow-1">
                        <select id="posCustomer" class="form-select form-select-sm rounded-3">
                            <?php if (empty($customers)): ?>
                                <option value="">No registered customers</option>
                            <?php else: ?>
                                <option value="" <?= empty($preset_customer_id) ? 'selected' : '' ?>>Select Customer</option>
                                <?php foreach ($customers as $c): ?>
                                    <option value="<?= $c->id ?>" <?= ($preset_customer_id == $c->id) ? 'selected' : '' ?>>
                                        <?= html_escape($c->name) ?> <?= $c->phone ? '(' . html_escape($c->phone) . ')' : '' ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary rounded-pill flex-shrink-0" data-bs-toggle="modal" data-bs-target="#newCustomerModal">
                        <i class="fa-solid fa-user-plus me-1"></i> New
                    </button>
                </div>

                <?php if ($linked_appointment): ?>
                    <div class="mt-3 p-2 bg-label-primary rounded-3 fz-12px d-flex align-items-center justify-content-between">
                        <span><i class="fa-solid fa-link me-1"></i> Linked Appointment: <strong><?= $linked_appointment->appointment_number ?></strong></span>
                        <input type="hidden" id="linkedAppointmentId" value="<?= $linked_appointment->id ?>">
                    </div>
                <?php else: ?>
                    <input type="hidden" id="linkedAppointmentId" value="">
                <?php endif; ?>
            </div>

            <!-- Cart Table -->
            <div class="pure-card-body p-0 flex-grow-1" style="max-height: 380px; overflow-y: auto;">
                <table class="table table-hover align-middle mb-0" id="cartTable">
                    <thead class="table-light fz-13px">
                        <tr>
                            <th class="ps-4">Item</th>
                            <th width="95">Qty</th>
                            <th width="90" class="text-end">Price</th>
                            <th width="90" class="text-end">Total</th>
                            <th width="35" class="pe-4"></th>
                        </tr>
                    </thead>
                    <tbody id="cartItems">
                        <!-- Populated dynamically via JS -->
                        <tr id="emptyCartRow">
                            <td colspan="5" class="text-center py-5 text-muted">
                                <div class="btn-icon bg-label-primary rounded-pill btn-lg mb-2 mx-auto">
                                    <i class="fa-solid fa-cart-shopping fs-5"></i>
                                </div>
                                <div class="fw-semibold text-dark fz-14px">Cart is empty</div>
                                <span class="fz-12px text-muted">Select services from the left catalog to start.</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Billing Totals Footer -->
            <div class="pure-card-footer bg-light p-4 mt-auto">
                <div class="d-flex justify-content-between mb-2 fs-14px">
                    <span class="text-muted">Subtotal:</span>
                    <span class="fw-semibold text-dark" id="lblSubtotal"><?= format_currency(0) ?></span>
                </div>
                
                <div class="d-flex align-items-center justify-content-between mb-2 fs-14px">
                    <span class="text-muted">Discount:</span>
                    <div class="d-flex align-items-center gap-1" style="max-width: 180px;">
                        <input type="number" id="discountInput" class="form-control form-control-sm text-end rounded-2" value="0" min="0" step="any" oninput="calculateTotals()" style="">
                        <select id="discountType" class="form-select form-select-sm rounded-2" onchange="calculateTotals()" style="width: 120px;color: #000;padding: 8px 12px;">
                            <option value="fixed"><?= html_escape(get_setting('currency_symbol', '₹')) ?></option>
                            <option value="percentage">%</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-between mb-2 fs-14px">
                    <span class="text-muted">Tax (<?= $tax_rate ?>%):</span>
                    <span class="fw-semibold text-dark" id="lblTax"><?= format_currency(0) ?></span>
                </div>

                <div class="d-flex justify-content-between align-items-center py-3 border-top border-bottom mb-3">
                    <span class="fw-bold fs-15px text-dark">Payable Total:</span>
                    <span class="fw-bold fs-20px text-primary" id="lblGrandTotal"><?= format_currency(0) ?></span>
                </div>

                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-outline-danger rounded-pill w-25" onclick="clearCart()" title="Clear Cart">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                    <button type="button" class="btn btn-primary w-75 py-2 fw-bold fs-15px rounded-pill shadow-custom" onclick="openPaymentModal()" id="btnCheckout" disabled>
                        <i class="fa-solid fa-wallet me-1"></i> Charge & Pay
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Modern POS Payment Modal Styling */
#paymentModal .modal-content {
    border-radius: 1.25rem;
    overflow: hidden;
    box-shadow: 0 20px 45px rgba(15, 23, 42, 0.15);
    border: 1px solid rgba(0, 0, 0, 0.08);
}
.payment-due-card {
    background: linear-gradient(135deg, rgba(95, 74, 254, 0.05) 0%, rgba(95, 74, 254, 0.12) 100%);
    border: 1px solid rgba(95, 74, 254, 0.18);
    border-radius: 1rem;
    padding: 1.25rem;
}
.payment-tile {
    cursor: pointer;
    border: 1.5px solid #e2e8f0;
    background-color: #ffffff;
    border-radius: 0.85rem;
    padding: 0.85rem 0.5rem;
    text-align: center;
    transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    display: block;
}
.payment-tile:hover {
    border-color: #cbd5e1;
    background-color: #f8fafc;
    transform: translateY(-2px);
}
.btn-check:checked + .payment-tile {
    border-color: var(--bs-primary, #5F4AFE) !important;
    background: #fbfaff !important;
    box-shadow: 0 4px 12px rgba(95, 74, 254, 0.15) !important;
}
.btn-check:checked + .payment-tile .payment-tile-title {
    color: var(--bs-primary, #5F4AFE) !important;
    font-weight: 700 !important;
}
.tendered-input-wrap {
    border: 1.5px solid #e2e8f0;
    border-radius: 0.85rem;
    transition: all 0.2s ease;
}
.tendered-input-wrap:focus-within {
    border-color: var(--bs-primary, #5F4AFE);
    box-shadow: 0 0 0 3px rgba(95, 74, 254, 0.15);
}
.change-return-card {
    border-radius: 0.85rem;
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
    padding: 0.85rem 1.25rem;
}
</style>

<!-- Payment Tender Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 490px;">
        <div class="modal-content border-0">
            <!-- Modal Header -->
            <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: rgba(95, 74, 254, 0.1); color: var(--bs-primary, #5F4AFE);">
                        <i class="fa-solid fa-receipt fs-5"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold text-dark mb-0">Complete Payment</h5>
                        <span class="text-muted fs-12px">Choose method & collect amount</span>
                    </div>
                </div>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body px-4 py-3">
                <!-- Amount Due Card -->
                <div class="payment-due-card text-center mb-3">
                    <span class="text-uppercase tracking-wider fw-semibold text-muted fs-11px d-block mb-1">Total Payable Amount</span>
                    <h2 class="display-6 fw-bold mb-0 text-dark" id="modalDueAmount">$0.00</h2>
                </div>

                <!-- Payment Methods Grid -->
                <div class="mb-3">
                    <label class="form-label fw-semibold text-dark fs-13px mb-2">Payment Method</label>
                    <div class="row g-2">
                        <div class="col-3">
                            <input type="radio" class="btn-check" name="paymentMethod" id="pm_cash" value="cash" checked onchange="onPaymentMethodChange('cash')">
                            <label class="payment-tile" for="pm_cash">
                                <i class="fa-solid fa-money-bill-wave text-success fs-4 d-block mb-1"></i>
                                <span class="payment-tile-title text-dark fs-12px d-block fw-semibold">Cash</span>
                            </label>
                        </div>
                        <div class="col-3">
                            <input type="radio" class="btn-check" name="paymentMethod" id="pm_card" value="card" onchange="onPaymentMethodChange('card')">
                            <label class="payment-tile" for="pm_card">
                                <i class="fa-solid fa-credit-card text-primary fs-4 d-block mb-1"></i>
                                <span class="payment-tile-title text-dark fs-12px d-block fw-semibold">Card</span>
                            </label>
                        </div>
                        <div class="col-3">
                            <input type="radio" class="btn-check" name="paymentMethod" id="pm_upi" value="upi" onchange="onPaymentMethodChange('upi')">
                            <label class="payment-tile" for="pm_upi">
                                <i class="fa-solid fa-qrcode text-warning fs-4 d-block mb-1"></i>
                                <span class="payment-tile-title text-dark fs-12px d-block fw-semibold">UPI / QR</span>
                            </label>
                        </div>
                        <div class="col-3">
                            <input type="radio" class="btn-check" name="paymentMethod" id="pm_gift" value="gift_card" onchange="onPaymentMethodChange('gift_card')">
                            <label class="payment-tile" for="pm_gift">
                                <i class="fa-solid fa-gift text-danger fs-4 d-block mb-1"></i>
                                <span class="payment-tile-title text-dark fs-12px d-block fw-semibold">Gift Card</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Amount Tendered Input -->
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <label class="form-label fw-semibold text-dark fs-13px mb-0">Amount Tendered</label>
                        <button type="button" class="btn btn-link btn-sm text-primary text-decoration-none p-0 fs-12px fw-semibold" onclick="setExactTendered()">
                            <i class="fa-solid fa-arrows-rotate me-1"></i> Exact Amount
                        </button>
                    </div>
                    <div class="input-group input-group-lg tendered-input-wrap overflow-hidden">
                        <span class="input-group-text bg-white border-0 fw-bold text-muted px-3 fs-5"><?= html_escape(get_setting('currency_symbol', '₹')) ?></span>
                        <input type="number" id="tenderedAmount" class="form-control form-control-lg border-0 bg-white text-center fw-bold fs-3 text-dark px-1 shadow-none" step="any" oninput="calculateChange()">
                    </div>
                </div>

                <!-- Change Return Card -->
                <div class="change-return-card d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-circle bg-white shadow-xs d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; border: 1px solid #e2e8f0;">
                            <i class="fa-solid fa-hand-holding-dollar text-muted fs-13px"></i>
                        </div>
                        <span class="fw-semibold text-secondary fs-13px">Change to Return</span>
                    </div>
                    <span class="fw-bold fs-5 text-dark" id="lblChangeAmount">$0.00</span>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer border-0 bg-light-subtle pt-2 pb-4 px-4 d-flex gap-2">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4 py-2" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary rounded-pill px-4 py-2 fw-semibold shadow-sm flex-grow-1" id="btnSubmitPayment" onclick="processCheckout()">
                    <i class="fa-solid fa-circle-check me-1"></i> Confirm & Print Receipt
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Add Customer Modal -->
<div class="modal fade" id="newCustomerModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-custom">
            <form id="quickCustomerForm" onsubmit="saveQuickCustomer(event)">
                <div class="modal-header border-bottom py-3 px-4">
                    <h5 class="modal-title fw-bold text-dark">Add New Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark fz-13px">Customer Full Name <span class="text-danger">*</span></label>
                        <input type="text" id="newCustName" class="form-control rounded-3" required placeholder="Full Name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark fz-13px">Phone Number <span class="text-danger">*</span></label>
                        <input type="tel" id="newCustPhone" class="form-control rounded-3" required placeholder="Phone Number">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark fz-13px">Email Address</label>
                        <input type="email" id="newCustEmail" class="form-control rounded-3" placeholder="name@example.com">
                    </div>
                </div>
                <div class="modal-footer border-top py-3 px-4">
                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Save Customer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
var cart = [];
var taxRate = <?= $tax_rate ?>;
var currencySymbol = "<?= get_setting('currency_symbol', '$') ?>";

// Search and category filter
function filterCatalog() {
    var query = (document.getElementById('posSearch').value || '').toLowerCase().trim();
    var catFilter = document.getElementById('posCategoryFilter') ? document.getElementById('posCategoryFilter').value : 'all';

    document.querySelectorAll('.catalog-item').forEach(function(el) {
        var name = (el.getAttribute('data-name') || '').toLowerCase();
        var catId = el.getAttribute('data-category') || '';
        
        var matchesQuery = (query === '' || name.indexOf(query) !== -1);
        var matchesCat = (catFilter === 'all' || catId === catFilter);

        el.style.display = (matchesQuery && matchesCat) ? 'block' : 'none';
    });
}

document.getElementById('posSearch').addEventListener('input', filterCatalog);
var posCatSelect = document.getElementById('posCategoryFilter');
if (posCatSelect) {
    posCatSelect.addEventListener('change', filterCatalog);
}

function addToCart(id, name, price) {
    var existing = cart.find(item => item.id === id);
    if (existing) {
        existing.qty++;
    } else {
        cart.push({
            type: 'service',
            id: id,
            name: name,
            price: parseFloat(price),
            qty: 1,
            staff_id: null
        });
    }
    renderCart();
}

function updateQty(index, delta) {
    if (cart[index]) {
        cart[index].qty += delta;
        if (cart[index].qty <= 0) {
            cart.splice(index, 1);
        }
        renderCart();
    }
}

function removeFromCart(index) {
    cart.splice(index, 1);
    renderCart();
}

function clearCart() {
    cart = [];
    renderCart();
}

function renderCart() {
    var tbody = document.getElementById('cartItems');
    if (cart.length === 0) {
        tbody.innerHTML = `
            <tr id="emptyCartRow">
                <td colspan="5" class="text-center py-5 text-muted">
                    <div class="btn-icon bg-label-primary rounded-pill btn-lg mb-2 mx-auto">
                        <i class="fa-solid fa-cart-shopping fs-5"></i>
                    </div>
                    <div class="fw-semibold text-dark fz-14px">Cart is empty</div>
                    <span class="fz-12px text-muted">Select services from the left catalog to start.</span>
                </td>
            </tr>`;
        document.getElementById('btnCheckout').disabled = true;
    } else {
        var html = '';
        cart.forEach((item, idx) => {
            var itemTotal = (item.price * item.qty).toFixed(2);
            html += `
                <tr>
                    <td class="ps-4">
                        <div class="fw-semibold text-dark text-truncate fz-14px" style="max-width: 170px;" title="${item.name}">${item.name}</div>
                        <small class="badge badge-label-primary rounded-pill fz-10px">SERVICE</small>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-1">
                            <button type="button" class="btn btn-xs btn-outline-secondary rounded-pill px-2 py-0" onclick="updateQty(${idx}, -1)">-</button>
                            <span class="fw-bold px-1 fz-13px">${item.qty}</span>
                            <button type="button" class="btn btn-xs btn-outline-secondary rounded-pill px-2 py-0" onclick="updateQty(${idx}, 1)">+</button>
                        </div>
                    </td>
                    <td class="text-end text-muted fz-13px">${currencySymbol}${item.price.toFixed(2)}</td>
                    <td class="text-end fw-bold text-dark fz-14px">${currencySymbol}${itemTotal}</td>
                    <td class="pe-4 text-end">
                        <button type="button" class="btn btn-xs text-danger" onclick="removeFromCart(${idx})" title="Remove">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </td>
                </tr>`;
        });
        tbody.innerHTML = html;
        document.getElementById('btnCheckout').disabled = false;
    }
    calculateTotals();
}

var currentGrandTotal = 0;

function calculateTotals() {
    var subtotal = 0;
    cart.forEach(item => {
        subtotal += item.price * item.qty;
    });

    var discountInput = parseFloat(document.getElementById('discountInput').value) || 0;
    var discountType = document.getElementById('discountType').value;
    var discountAmount = 0;

    if (discountType === 'percentage') {
        discountAmount = (subtotal * discountInput) / 100;
    } else {
        discountAmount = discountInput;
    }
    discountAmount = Math.min(discountAmount, subtotal);

    var taxable = Math.max(0, subtotal - discountAmount);
    var taxAmount = (taxable * taxRate) / 100;
    var grandTotal = taxable + taxAmount;
    currentGrandTotal = grandTotal;

    document.getElementById('lblSubtotal').innerText = currencySymbol + subtotal.toFixed(2);
    document.getElementById('lblTax').innerText = currencySymbol + taxAmount.toFixed(2);
    document.getElementById('lblGrandTotal').innerText = currencySymbol + grandTotal.toFixed(2);
    document.getElementById('modalDueAmount').innerText = currencySymbol + grandTotal.toFixed(2);
    document.getElementById('tenderedAmount').value = grandTotal.toFixed(2);
    calculateChange();
}

function calculateChange() {
    var due = currentGrandTotal || 0;
    var tendered = parseFloat(document.getElementById('tenderedAmount').value) || 0;
    var change = Math.max(0, tendered - due);
    var el = document.getElementById('lblChangeAmount');
    if (el) {
        el.innerText = currencySymbol + change.toFixed(2);
        if (change > 0) {
            el.className = 'fw-bolder fs-5 text-success';
        } else {
            el.className = 'fw-bold fs-5 text-dark';
        }
    }
}

function setExactTendered() {
    document.getElementById('tenderedAmount').value = currentGrandTotal.toFixed(2);
    calculateChange();
}

function onPaymentMethodChange(method) {
    if (method !== 'cash') {
        setExactTendered();
    }
}

function openPaymentModal() {
    var customerId = document.getElementById('posCustomer').value;
    if (!customerId) {
        Swal.fire({
            icon: 'warning',
            title: 'Customer Required',
            text: 'Please select a customer before proceeding to checkout.'
        });
        document.getElementById('posCustomer').focus();
        return;
    }
    calculateTotals();
    var myModal = new bootstrap.Modal(document.getElementById('paymentModal'));
    myModal.show();
}

function processCheckout() {
    var subtotal = 0;
    cart.forEach(item => { subtotal += item.price * item.qty; });
    var discountInput = parseFloat(document.getElementById('discountInput').value) || 0;
    var discountType = document.getElementById('discountType').value;
    var discountAmount = (discountType === 'percentage') ? ((subtotal * discountInput)/100) : discountInput;
    discountAmount = Math.min(discountAmount, subtotal);
    var taxable = Math.max(0, subtotal - discountAmount);
    var taxAmount = (taxable * taxRate) / 100;
    var grandTotal = taxable + taxAmount;

    var customerId = document.getElementById('posCustomer').value;
    if (!customerId) {
        Swal.fire({
            icon: 'warning',
            title: 'Customer Required',
            text: 'Please select a customer before completing payment.'
        });
        return;
    }
    var appointmentId = document.getElementById('linkedAppointmentId').value;
    var paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
    var tendered = parseFloat(document.getElementById('tenderedAmount').value) || grandTotal;

    var payload = {
        customer_id: customerId,
        appointment_id: appointmentId,
        subtotal: subtotal,
        discount_type: discountType,
        discount_amount: discountAmount,
        tax_amount: taxAmount,
        grand_total: grandTotal,
        paid_amount: tendered,
        payment_method: paymentMethod,
        items: cart
    };

    document.getElementById('btnSubmitPayment').disabled = true;

    fetch("<?= admin_url('pos/checkout') ?>", {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
    })
    .then(res => res.json())
    .then(data => {
        if (data.status) {
            Swal.fire({
                icon: 'success',
                title: 'Sale Completed!',
                text: 'Invoice #' + data.invoice_number + ' generated.',
                showCancelButton: true,
                confirmButtonText: '<i class="fa-solid fa-scroll"></i> Print Thermal Receipt',
                cancelButtonText: 'Done / New Sale'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.open(data.receipt_url, '_blank');
                }
                clearCart();
                bootstrap.Modal.getInstance(document.getElementById('paymentModal')).hide();
                document.getElementById('btnSubmitPayment').disabled = false;
            });
        } else {
            Swal.fire('Error', data.message, 'error');
            document.getElementById('btnSubmitPayment').disabled = false;
        }
    })
    .catch(err => {
        Swal.fire('Error', 'Transaction failed to process.', 'error');
        document.getElementById('btnSubmitPayment').disabled = false;
    });
}

function saveQuickCustomer(e) {
    e.preventDefault();
    var name = document.getElementById('newCustName').value;
    var phone = document.getElementById('newCustPhone').value;
    var email = document.getElementById('newCustEmail').value;

    fetch("<?= admin_url('customers/quick_create') ?>", {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name: name, phone: phone, email: email })
    })
    .then(res => res.json())
    .then(data => {
        if (data.status) {
            var opt = new Option(name + ' (' + phone + ')', data.customer_id, true, true);
            document.getElementById('posCustomer').add(opt);
            bootstrap.Modal.getInstance(document.getElementById('newCustomerModal')).hide();
            Swal.fire('Success', 'Customer added!', 'success');
        } else {
            Swal.fire('Error', data.message, 'error');
        }
    });
}

<?php if (!empty($appointment_services)): ?>
    <?php foreach ($appointment_services as $asrv): 
        $srv_info = $this->db->get_where('services', array('id' => $asrv->service_id))->row();
        $sname = $srv_info ? $srv_info->name : 'Service #' . $asrv->service_id;
    ?>
    cart.push({
        type: 'service',
        id: <?= (int)$asrv->service_id ?>,
        name: <?= json_encode($sname) ?>,
        price: <?= (float)$asrv->price ?>,
        qty: 1,
        staff_id: <?= !empty($asrv->staff_id) ? (int)$asrv->staff_id : 'null' ?>
    });
    <?php endforeach; ?>
    renderCart();
<?php endif; ?>
</script>
