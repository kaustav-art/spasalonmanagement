-- --------------------------------------------------------
-- Marketplace & Script Licensing Tables
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `marketplace_plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_code` enum('SALON','SPA','SALON_SPA') NOT NULL,
  `name` varchar(150) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `badge` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 49.00,
  `original_price` decimal(10,2) DEFAULT 79.00,
  `description` text DEFAULT NULL,
  `features` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `sort_order` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `plan_code` (`plan_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `marketplace_plans` (`id`, `plan_code`, `name`, `tagline`, `badge`, `price`, `original_price`, `description`, `features`, `status`, `sort_order`) VALUES
(1, 'SALON', 'Salon Management Script', 'Tailored for Hairdressers, Barbers, Nail Bars & Beauty Parlors', 'POPULAR', 49.00, 79.00, 'Complete salon management script featuring stylist schedules, chair queue, salon service menu, POS cash register, and stylist commission ledger.', '["Stylist & Barber Profiles with Commission Ledger","Salon Service Menu & Treatment Categories","Walk-in Queue Manager & Waiting Chairs","POS Checkout & 80mm Thermal Receipts","Inventory & Consumables Tracking","Customer CRM & VIP Loyalty Tiers","Template 1 (Glamr) & Template 2 (Pureglow) Included","3 Homepage Layouts with Instant Switcher","Full Source Code & No Monthly Fees"]', 'active', 1),
(2, 'SPA', 'Spa Wellness Management Script', 'Crafted for Day Spas, Massage Centers, Wellness Retreats & Clinics', 'HOLISTIC', 49.00, 79.00, 'Holistic spa management script featuring private treatment suite scheduling, double-booking conflict prevention, therapist assignment, and treatment packages.', '["Licensed Therapist & Masseur Roster","Private Spa Suite / Treatment Room Management","Visual Room Occupancy Timeline & Schedule","Automated Double-Booking Conflict Prevention","Multi-Session Treatment Packages & Passes","POS Checkout & Detailed Customer Invoices","Template 1 (Glamr) & Template 2 (Pureglow) Included","3 Homepage Layouts with Instant Switcher","Full Source Code & Self-Hosted License"]', 'active', 2),
(3, 'SALON_SPA', 'Salon & Spa Complete Edition', 'The Unified Enterprise Solution &ndash; Everything in Salon + Spa Combined', 'BEST VALUE &bull; ALL IN ONE', 89.00, 149.00, 'The ultimate combined script with every single salon and spa module unlocked. Manage stylists, therapists, private spa suites, queues, combo packages, POS, and financial P&L.', '["All Salon Features (Stylists, Hair, Nails, Queue, Chairs)","All Spa Features (Rooms, Therapists, Conflict Calendar)","Unified Stylist + Therapist Single Roster","Combo Packages (Hair + Facial + Massage)","POS with Multi-Payment (Cash, Card, UPI, ACH)","Financial P&L Statement & Expense Drawer","Template 1 (Glamr) + Template 2 (Pureglow) Included","All 6 Homepage Variations & Live Customizer","Lifetime Self-Hosted License & Unlimited Upgrades"]', 'active', 3)
ON DUPLICATE KEY UPDATE 
  `name` = VALUES(`name`),
  `price` = VALUES(`price`),
  `original_price` = VALUES(`original_price`),
  `features` = VALUES(`features`);

CREATE TABLE IF NOT EXISTS `marketplace_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(50) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_phone` varchar(30) DEFAULT NULL,
  `business_name` varchar(150) DEFAULT NULL,
  `plan_id` int(11) NOT NULL,
  `plan_code` enum('SALON','SPA','SALON_SPA') NOT NULL,
  `chosen_template` varchar(50) NOT NULL DEFAULT 'template1',
  `chosen_layout` int(11) NOT NULL DEFAULT 1,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `payment_method` varchar(50) NOT NULL DEFAULT 'card',
  `payment_status` enum('paid','pending','failed') NOT NULL DEFAULT 'paid',
  `license_key` varchar(100) NOT NULL,
  `download_token` varchar(100) NOT NULL,
  `download_count` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_number` (`order_number`),
  KEY `customer_email` (`customer_email`),
  KEY `license_key` (`license_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `marketplace_licenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `license_key` varchar(100) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `plan_code` enum('SALON','SPA','SALON_SPA') NOT NULL,
  `template` varchar(50) NOT NULL DEFAULT 'template1',
  `layout` int(11) NOT NULL DEFAULT 1,
  `status` enum('active','suspended','revoked') NOT NULL DEFAULT 'active',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `license_key` (`license_key`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Sample initial order for demonstration
INSERT INTO `marketplace_orders` (`id`, `order_number`, `customer_name`, `customer_email`, `customer_phone`, `business_name`, `plan_id`, `plan_code`, `chosen_template`, `chosen_layout`, `amount`, `payment_method`, `payment_status`, `license_key`, `download_token`, `download_count`) VALUES
(1, 'ORD-2026-8812', 'Michael Vance', 'michael.v@example.com', '+1 (555) 723-9988', 'Vance Luxury Hair & Spa', 3, 'SALON_SPA', 'template1', 1, 89.00, 'card', 'paid', 'LIC-SALONSPA-7A9B-2026-X199', 'dl_token_8812_sample', 2)
ON DUPLICATE KEY UPDATE `id`=`id`;

INSERT INTO `marketplace_licenses` (`id`, `license_key`, `order_id`, `customer_email`, `plan_code`, `template`, `layout`, `status`) VALUES
(1, 'LIC-SALONSPA-7A9B-2026-X199', 1, 'michael.v@example.com', 'SALON_SPA', 'template1', 1, 'active')
ON DUPLICATE KEY UPDATE `id`=`id`;
