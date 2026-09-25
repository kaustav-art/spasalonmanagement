-- Salon & Spa Management System Database Schema
-- Compatible with MySQL 5.7+ / MariaDB 10.3+

SET FOREIGN_KEY_CHECKS = 0;

-- --------------------------------------------------------
-- Table: roles
-- --------------------------------------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `role_name`, `description`) VALUES
(1, 'Administrator', 'Full system access and settings control'),
(2, 'Manager', 'Operations, staff, customers, appointments and reports'),
(3, 'Receptionist', 'Front desk, appointments, POS billing and customers'),
(4, 'Stylist', 'Salon stylist - appointments, services and commissions'),
(5, 'Therapist', 'Spa therapist - spa appointments, room sessions and commissions');

-- --------------------------------------------------------
-- Table: permissions
-- --------------------------------------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_key` varchar(100) NOT NULL,
  `permission_group` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permission_key` (`permission_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permissions` (`permission_key`, `permission_group`, `name`) VALUES
('dashboard.view', 'Dashboard', 'View Dashboard'),
('appointments.view', 'Appointments', 'View Appointments'),
('appointments.create', 'Appointments', 'Create Appointments'),
('appointments.edit', 'Appointments', 'Edit / Reschedule Appointments'),
('appointments.cancel', 'Appointments', 'Cancel Appointments'),
('customers.manage', 'Customers', 'Manage Customers'),
('services.manage', 'Services', 'Manage Services & Categories'),
('staff.manage', 'Staff', 'Manage Staff & Schedules'),
('spa.manage', 'Spa', 'Manage Spa Rooms & Sessions'),
('pos.billing', 'Sales & POS', 'Access POS & Create Invoices'),
('inventory.manage', 'Inventory', 'Manage Products & Stock'),
('finance.manage', 'Finance', 'Manage Expenses & Cash Register'),
('reports.view', 'Reports', 'View Analytics & Reports'),
('website.manage', 'Website', 'Manage Website Content & Templates'),
('settings.manage', 'Settings', 'Manage Business & System Settings');

-- --------------------------------------------------------
-- Table: role_permissions
-- --------------------------------------------------------
DROP TABLE IF EXISTS `role_permissions`;
CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Admin has all permissions (role 1)
INSERT INTO `role_permissions` (`role_id`, `permission_id`)
SELECT 1, id FROM `permissions`;

-- Manager permissions (role 2)
INSERT INTO `role_permissions` (`role_id`, `permission_id`)
SELECT 2, id FROM `permissions` WHERE `permission_key` NOT IN ('settings.manage');

-- Receptionist permissions (role 3)
INSERT INTO `role_permissions` (`role_id`, `permission_id`)
SELECT 3, id FROM `permissions` WHERE `permission_key` IN (
  'dashboard.view', 'appointments.view', 'appointments.create', 'appointments.edit', 'appointments.cancel',
  'customers.manage', 'pos.billing', 'spa.manage'
);

-- Stylist permissions (role 4)
INSERT INTO `role_permissions` (`role_id`, `permission_id`)
SELECT 4, id FROM `permissions` WHERE `permission_key` IN ('dashboard.view', 'appointments.view');

-- Therapist permissions (role 5)
INSERT INTO `role_permissions` (`role_id`, `permission_id`)
SELECT 5, id FROM `permissions` WHERE `permission_key` IN ('dashboard.view', 'appointments.view', 'spa.manage');

-- --------------------------------------------------------
-- Table: users
-- --------------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT 'default-avatar.png',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Default Admin User: admin@spasalon.com / admin123
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `phone`, `password`, `avatar`, `status`) VALUES
(1, 1, 'Super Administrator', 'admin@spasalon.com', '+1 (555) 234-5678', '$2y$10$wO7vE1K47bNn6e1H6WkOge9d/4uP6K4K/4eX5/Bf8R0fR/W9uN/yK', 'default-avatar.png', 'active');
-- Note: Password hash is for 'admin123' generated with password_hash('admin123', PASSWORD_BCRYPT)

-- --------------------------------------------------------
-- Table: business_settings
-- --------------------------------------------------------
DROP TABLE IF EXISTS `business_settings`;
CREATE TABLE `business_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text DEFAULT NULL,
  `setting_group` varchar(50) NOT NULL DEFAULT 'general',
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `business_settings` (`setting_key`, `setting_value`, `setting_group`) VALUES
('business_name', 'Luxe Salon & Serenity Spa', 'general'),
('business_tagline', 'Premium Beauty Care & Rejuvenating Spa Treatments', 'general'),
('business_type', 'SALON_SPA', 'general'), -- Options: SALON, SPA, SALON_SPA
('active_template', 'template1', 'website'),  -- Options: template1, template2
('active_home_layout', '1', 'website'),        -- Options: 1, 2, 3
('business_email', 'contact@luxesalonspa.com', 'general'),
('business_phone', '+1 (555) 345-6789', 'general'),
('business_address', '742 Evergreen Terrace, Suite 100, New York, NY 10001', 'general'),
('currency_symbol', '$', 'localization'),
('currency_code', 'USD', 'localization'),
('currency_position', 'left', 'localization'),
('timezone', 'America/New_York', 'localization'),
('tax_name', 'VAT / Sales Tax', 'finance'),
('tax_rate', '8.5', 'finance'),
('business_open_time', '09:00', 'booking'),
('business_close_time', '20:00', 'booking'),
('booking_time_step', '30', 'booking'), -- minutes
('auto_confirm_booking', '0', 'booking'),
('advance_booking_days', '30', 'booking'),
('logo', 'logo.png', 'appearance'),
('favicon', 'favicon.png', 'appearance'),
('footer_about', 'Experience world-class salon styling and tranquil spa wellness treatments crafted to restore your body and glow.', 'website'),
('facebook_url', 'https://facebook.com', 'social'),
('instagram_url', 'https://instagram.com', 'social'),
('twitter_url', 'https://twitter.com', 'social'),
('youtube_url', 'https://youtube.com', 'social');

-- --------------------------------------------------------
-- Table: customer_groups
-- --------------------------------------------------------
DROP TABLE IF EXISTS `customer_groups`;
CREATE TABLE `customer_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `discount_percent` decimal(5,2) NOT NULL DEFAULT 0.00,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `customer_groups` (`id`, `name`, `discount_percent`, `description`) VALUES
(1, 'Regular Clients', 0.00, 'Standard regular walk-in and online clients'),
(2, 'Silver VIP', 5.00, 'Clients with over 5 visits - 5% discount'),
(3, 'Gold VIP', 10.00, 'Loyal VIP clients - 10% discount on all services and retail'),
(4, 'Platinum Elite', 15.00, 'Top tier members - 15% discount on everything');

-- --------------------------------------------------------
-- Table: customers
-- --------------------------------------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT 1,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(30) NOT NULL,
  `gender` enum('Female','Male','Other') DEFAULT 'Female',
  `dob` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `loyalty_points` int(11) NOT NULL DEFAULT 0,
  `notes` text DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `phone` (`phone`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `customers` (`id`, `group_id`, `name`, `email`, `phone`, `gender`, `dob`, `address`, `loyalty_points`, `notes`) VALUES
(1, 3, 'Sophia Montgomery', 'sophia.m@example.com', '+1 (555) 101-2020', 'Female', '1992-04-14', '124 Fifth Ave, NY', 120, 'Prefers organic essential oils and warm herbal tea.'),
(2, 2, 'Emily Harrison', 'emily.h@example.com', '+1 (555) 202-3030', 'Female', '1995-08-22', '88 Central Park West, NY', 45, 'Sensitive scalp. Regular hair coloring client.'),
(3, 1, 'Alexander Wright', 'alex.wright@example.com', '+1 (555) 303-4040', 'Male', '1988-11-05', '45 Broadway, NY', 10, 'Likes deep tissue Swedish massage sessions.'),
(4, 4, 'Jessica Alba Miller', 'jessica.m@example.com', '+1 (555) 404-5050', 'Female', '1990-01-30', '16 Hudson St, NY', 260, 'Celebrity client. Book private VIP spa suite.'),
(5, 1, 'David Beckham Jr', 'david.b@example.com', '+1 (555) 505-6060', 'Male', '1996-07-19', '32 Brooklyn Heights, NY', 15, 'Men haircut & beard grooming regular.');

-- --------------------------------------------------------
-- Table: staff
-- --------------------------------------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `role_type` enum('stylist','therapist','beautician','receptionist','manager') NOT NULL DEFAULT 'stylist',
  `commission_rate` decimal(5,2) NOT NULL DEFAULT 10.00,
  `bio` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT 'default-staff.jpg',
  `rating` decimal(3,2) NOT NULL DEFAULT 5.00,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `role_type` (`role_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `staff` (`id`, `user_id`, `name`, `email`, `phone`, `role_type`, `commission_rate`, `bio`, `photo`, `rating`, `status`) VALUES
(1, NULL, 'Isabella Rossi', 'isabella@spasalon.com', '+1 (555) 777-1111', 'stylist', 15.00, 'Master hair stylist & colorist with 10+ years in haute couture fashion salons.', 'team-01.jpg', 4.95, 'active'),
(2, NULL, 'Elena Rostova', 'elena@spasalon.com', '+1 (555) 777-2222', 'therapist', 12.50, 'Certified holistic spa massage therapist specializing in Aromatherapy and Hot Stone healing.', 'team-02.jpg', 4.90, 'active'),
(3, NULL, 'Marcus Vance', 'marcus@spasalon.com', '+1 (555) 777-3333', 'stylist', 12.00, 'Celebrity barber, precision razor fades and beard sculpting specialist.', 'team-03.jpg', 4.85, 'active'),
(4, NULL, 'Chloe Dupuis', 'chloe@spasalon.com', '+1 (555) 777-4444', 'beautician', 10.00, 'Skincare and hydra-facial specialist trained in Paris luxury institutes.', 'team-04.jpg', 4.92, 'active'),
(5, NULL, 'Ananya Sharma', 'ananya@spasalon.com', '+1 (555) 777-5555', 'therapist', 12.50, 'Ayurvedic wellness therapist & detox treatment practitioner.', 'team-05.jpg', 4.88, 'active');

-- --------------------------------------------------------
-- Table: staff_schedules
-- --------------------------------------------------------
DROP TABLE IF EXISTS `staff_schedules`;
CREATE TABLE `staff_schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `day_of_week` varchar(20) NOT NULL,
  `start_time` time NOT NULL DEFAULT '09:00:00',
  `end_time` time NOT NULL DEFAULT '19:00:00',
  `is_day_off` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Sample schedules for staff (Monday to Sunday)
INSERT INTO `staff_schedules` (`staff_id`, `day_of_week`, `start_time`, `end_time`, `is_day_off`)
SELECT s.id, d.day, '09:00:00', '19:00:00', IF(d.day = 'Sunday', 1, 0)
FROM `staff` s
CROSS JOIN (
  SELECT 'Monday' AS day UNION ALL SELECT 'Tuesday' UNION ALL SELECT 'Wednesday' UNION ALL
  SELECT 'Thursday' UNION ALL SELECT 'Friday' UNION ALL SELECT 'Saturday' UNION ALL SELECT 'Sunday'
) d;

-- --------------------------------------------------------
-- Table: staff_attendance
-- --------------------------------------------------------
DROP TABLE IF EXISTS `staff_attendance`;
CREATE TABLE `staff_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `clock_in` time DEFAULT NULL,
  `clock_out` time DEFAULT NULL,
  `status` enum('present','absent','late','half_day') NOT NULL DEFAULT 'present',
  `notes` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `staff_id` (`staff_id`),
  KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: staff_leaves
-- --------------------------------------------------------
DROP TABLE IF EXISTS `staff_leaves`;
CREATE TABLE `staff_leaves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `leave_type` varchar(50) NOT NULL DEFAULT 'Casual',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: service_categories
-- --------------------------------------------------------
DROP TABLE IF EXISTS `service_categories`;
CREATE TABLE `service_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `type` enum('salon','spa','both') NOT NULL DEFAULT 'both',
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `service_categories` (`id`, `name`, `slug`, `type`, `image`, `description`, `sort_order`, `status`) VALUES
(1, 'Hair Styling & Color', 'hair-styling-color', 'salon', 'cat-hair.jpg', 'Precision cuts, balayage, gloss treatments and signature blowouts.', 1, 'active'),
(2, 'Skin & Facial Care', 'skin-facial-care', 'salon', 'cat-facial.jpg', 'Hydra-dermabrasion, anti-aging collagen lift, and deep cleansing peels.', 2, 'active'),
(3, 'Nail Bar & Pedicure', 'nail-bar-pedicure', 'salon', 'cat-nails.jpg', 'Deluxe gel manicures, acrylic art and botanical foot spas.', 3, 'active'),
(4, 'Body Massage & Healing', 'body-massage-healing', 'spa', 'cat-massage.jpg', 'Swedish, deep tissue, hot stone, and restorative aromatherapy massages.', 4, 'active'),
(5, 'Spa Hydro & Body Scrubs', 'spa-hydro-body-scrubs', 'spa', 'cat-scrub.jpg', 'Himalayan salt body polish, seaweed detox wrap and hydrotherapy rituals.', 5, 'active'),
(6, 'Bridal & Glamour Makeup', 'bridal-glamour-makeup', 'salon', 'cat-makeup.jpg', 'Bridal beauty packages, editorial styling and evening contour makeup.', 6, 'active');

-- --------------------------------------------------------
-- Table: services
-- --------------------------------------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `type` enum('salon','spa','both') NOT NULL DEFAULT 'both',
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `duration` int(11) NOT NULL DEFAULT 45, -- in minutes
  `tax_rate` decimal(5,2) NOT NULL DEFAULT 0.00,
  `requires_room` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT 'default-service.jpg',
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `category_id` (`category_id`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `services` (`id`, `category_id`, `name`, `slug`, `type`, `price`, `duration`, `tax_rate`, `requires_room`, `image`, `description`, `status`) VALUES
(1, 1, 'Signature Haircut & Blowdry', 'signature-haircut-blowdry', 'salon', 65.00, 45, 8.50, 0, 'service-hair-01.jpg', 'Consultation, scalp massage, master precision haircut and blowout.', 'active'),
(2, 1, 'Luxury Balayage & Glaze', 'luxury-balayage-glaze', 'salon', 175.00, 120, 8.50, 0, 'service-hair-02.jpg', 'Hand-painted sun-kissed highlights finished with nourishing shine gloss.', 'active'),
(3, 1, 'Organic Keratin Smoothing Treatment', 'organic-keratin-treatment', 'salon', 195.00, 90, 8.50, 0, 'service-hair-03.jpg', 'Frizz-free smoothness, brilliant shine and intense hair strengthening.', 'active'),
(4, 2, 'Glow Radiance Hydra-Facial', 'glow-radiance-hydra-facial', 'salon', 120.00, 60, 8.50, 0, 'service-facial-01.jpg', 'Deep pore cleansing, exfoliation, antioxidant infusion and LED light therapy.', 'active'),
(5, 2, '24K Gold Anti-Aging Facial', '24k-gold-anti-aging-facial', 'salon', 150.00, 75, 8.50, 0, 'service-facial-02.jpg', 'Revitalizing pure 24K gold foil facial stimulating cellular regeneration.', 'active'),
(6, 3, 'Deluxe Russian Gel Manicure', 'deluxe-russian-gel-manicure', 'salon', 55.00, 45, 8.50, 0, 'service-nails-01.jpg', 'Flawless cuticle dry work, shape perfection, and long-lasting premium gel polish.', 'active'),
(7, 3, 'Botanical Spa Pedicure with Paraffin', 'botanical-spa-pedicure-paraffin', 'salon', 70.00, 60, 8.50, 0, 'service-nails-02.jpg', 'Soothing aromatic foot soak, sugar exfoliation and nourishing warm paraffin wrap.', 'active'),
(8, 4, 'Deep Tissue Muscle Relief Massage', 'deep-tissue-muscle-relief-massage', 'spa', 130.00, 60, 8.50, 1, 'service-spa-01.jpg', 'Targeted firm pressure targeting chronic muscle tension, knots and stress.', 'active'),
(9, 4, 'Tranquil Aromatherapy Hot Stone Ritual', 'tranquil-aromatherapy-hot-stone', 'spa', 160.00, 90, 8.50, 1, 'service-spa-02.jpg', 'Smooth heated basalt stones gliding with custom blended organic essential oils.', 'active'),
(10, 4, 'Traditional Balinese Herbal Compress Massage', 'traditional-balinese-herbal-massage', 'spa', 145.00, 75, 8.50, 1, 'service-spa-03.jpg', 'Steamed medicinal herbal pouches applied rhythmically for deep rejuvenation.', 'active'),
(11, 5, 'Himalayan Pink Salt Body Glow & Wrap', 'himalayan-pink-salt-body-glow', 'spa', 135.00, 60, 1, 1, 'service-spa-04.jpg', 'Mineral-rich detoxifying body polish followed by botanical hydration cocoon.', 'active'),
(12, 5, 'Hydrotherapy Floral Bath & Body Polish', 'hydrotherapy-floral-bath-body-polish', 'spa', 170.00, 75, 8.50, 1, 'service-spa-05.jpg', 'Private luxury hydro pool soak with rose petals, lavender oil, and full body scrub.', 'active');

-- --------------------------------------------------------
-- Table: service_staff
-- --------------------------------------------------------
DROP TABLE IF EXISTS `service_staff`;
CREATE TABLE `service_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `service_id` (`service_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Assign stylists to salon services
INSERT INTO `service_staff` (`service_id`, `staff_id`) VALUES
(1, 1), (1, 3), -- Haircut (Isabella, Marcus)
(2, 1),        -- Balayage (Isabella)
(3, 1),        -- Keratin (Isabella)
(4, 4),        -- Hydra facial (Chloe)
(5, 4),        -- Gold facial (Chloe)
(6, 4),        -- Nails (Chloe)
(7, 4),        -- Pedicure (Chloe)
(8, 2), (8, 5), -- Deep tissue (Elena, Ananya)
(9, 2), (9, 5), -- Hot stone (Elena, Ananya)
(10, 5),       -- Balinese (Ananya)
(11, 2), (11, 5), -- Body scrub (Elena, Ananya)
(12, 2);       -- Hydro bath (Elena)

-- --------------------------------------------------------
-- Table: rooms (Spa Rooms)
-- --------------------------------------------------------
DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(100) NOT NULL,
  `room_number` varchar(30) DEFAULT NULL,
  `room_type` varchar(50) DEFAULT 'Single Massage',
  `capacity` int(11) NOT NULL DEFAULT 1,
  `status` enum('available','maintenance','occupied') NOT NULL DEFAULT 'available',
  `notes` text DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `rooms` (`id`, `room_name`, `room_number`, `room_type`, `capacity`, `status`, `notes`) VALUES
(1, 'Serenity Suite 1 (Lotus)', 'SPA-101', 'Private Treatment Room', 1, 'available', 'Heated treatment bed, ambient sound system, aroma diffuser.'),
(2, 'Oasis Couple Sanctuary', 'SPA-102', 'Couples VIP Suite', 2, 'available', 'Dual massage beds, private jacuzzi tub and rain shower.'),
(3, 'Zen Garden Aromatherapy Room', 'SPA-103', 'Holistic Treatment', 1, 'available', 'Herbal steam facility and dim chromatherapy lighting.'),
(4, 'Aqua Tranquility Hydrotherapy Room', 'SPA-104', 'Hydro Spa & Scrub', 1, 'available', 'Vichy shower and cedarwood soaking tub.');

-- --------------------------------------------------------
-- Table: appointments
-- --------------------------------------------------------
DROP TABLE IF EXISTS `appointments`;
CREATE TABLE `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_number` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `booking_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `subtotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tax_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `final_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` enum('pending','confirmed','in_service','completed','cancelled','no_show') NOT NULL DEFAULT 'pending',
  `booking_source` enum('online','walk_in','admin') NOT NULL DEFAULT 'admin',
  `notes` text DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `appointment_number` (`appointment_number`),
  KEY `customer_id` (`customer_id`),
  KEY `staff_id` (`staff_id`),
  KEY `room_id` (`room_id`),
  KEY `booking_date` (`booking_date`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `appointments` (`id`, `appointment_number`, `customer_id`, `staff_id`, `room_id`, `booking_date`, `start_time`, `end_time`, `subtotal`, `discount_amount`, `tax_amount`, `final_amount`, `status`, `booking_source`, `notes`) VALUES
(1, 'APT-2026-0001', 1, 1, NULL, CURDATE(), '10:00:00', '10:45:00', 65.00, 6.50, 4.97, 63.47, 'confirmed', 'online', 'Client requested extra hair rinse.'),
(2, 'APT-2026-0002', 2, 4, NULL, CURDATE(), '11:00:00', '12:00:00', 120.00, 6.00, 9.69, 123.69, 'in_service', 'admin', 'First time trying hydra facial.'),
(3, 'APT-2026-0003', 3, 2, 1, CURDATE(), '14:00:00', '15:00:00', 130.00, 0.00, 11.05, 141.05, 'pending', 'online', 'Spa room 1 requested. Prefers lavender oil.'),
(4, 'APT-2026-0004', 4, 5, 2, DATE_ADD(CURDATE(), INTERVAL 1 DAY), '15:30:00', '17:00:00', 160.00, 24.00, 11.56, 147.56, 'confirmed', 'admin', 'VIP client - complimentary herbal tea.');

-- --------------------------------------------------------
-- Table: appointment_services
-- --------------------------------------------------------
DROP TABLE IF EXISTS `appointment_services`;
CREATE TABLE `appointment_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `duration` int(11) NOT NULL DEFAULT 45,
  PRIMARY KEY (`id`),
  KEY `appointment_id` (`appointment_id`),
  KEY `service_id` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `appointment_services` (`appointment_id`, `service_id`, `staff_id`, `price`, `tax`, `duration`) VALUES
(1, 1, 1, 65.00, 5.53, 45),
(2, 4, 4, 120.00, 10.20, 60),
(3, 8, 2, 130.00, 11.05, 60),
(4, 9, 5, 160.00, 13.60, 90);

-- --------------------------------------------------------
-- Table: room_bookings
-- --------------------------------------------------------
DROP TABLE IF EXISTS `room_bookings`;
CREATE TABLE `room_bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `status` enum('booked','completed','cancelled') NOT NULL DEFAULT 'booked',
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`),
  KEY `appointment_id` (`appointment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: packages
-- --------------------------------------------------------
DROP TABLE IF EXISTS `packages`;
CREATE TABLE `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `type` enum('salon','spa','both') NOT NULL DEFAULT 'both',
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `validity_days` int(11) NOT NULL DEFAULT 90,
  `total_sessions` int(11) NOT NULL DEFAULT 5,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `packages` (`id`, `name`, `slug`, `type`, `price`, `validity_days`, `total_sessions`, `description`, `status`) VALUES
(1, 'Radiant Glow Beauty Trio', 'radiant-glow-beauty-trio', 'salon', 210.00, 60, 3, 'Includes 3 sessions of Glow Radiance Hydra-Facials with complimentary scalp massage.', 'active'),
(2, 'Total Body Detox & Tranquility', 'total-body-detox-tranquility', 'spa', 380.00, 90, 4, 'Package of 4 deep tissue & aromatherapy hot stone rituals with hydro floral soak.', 'active'),
(3, 'Ultimate Royal Salon & Spa Rejuvenation', 'ultimate-royal-salon-spa', 'both', 499.00, 120, 6, 'Full luxury combination: 2 Haircut & Color + 2 Hydra Facials + 2 Aromatherapy Spa Massages.', 'active');

-- --------------------------------------------------------
-- Table: package_items
-- --------------------------------------------------------
DROP TABLE IF EXISTS `package_items`;
CREATE TABLE `package_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `sessions_count` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `package_id` (`package_id`),
  KEY `service_id` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `package_items` (`package_id`, `service_id`, `sessions_count`) VALUES
(1, 4, 3),
(2, 8, 2),
(2, 9, 2),
(3, 1, 2),
(3, 4, 2),
(3, 8, 2);

-- --------------------------------------------------------
-- Table: package_transactions
-- --------------------------------------------------------
DROP TABLE IF EXISTS `package_transactions`;
CREATE TABLE `package_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `purchase_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `total_sessions` int(11) NOT NULL,
  `used_sessions` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','expired','exhausted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `package_id` (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: memberships
-- --------------------------------------------------------
DROP TABLE IF EXISTS `memberships`;
CREATE TABLE `memberships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `validity_days` int(11) NOT NULL DEFAULT 365,
  `discount_percent` decimal(5,2) NOT NULL DEFAULT 10.00,
  `benefits` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `memberships` (`id`, `name`, `price`, `validity_days`, `discount_percent`, `benefits`, `status`) VALUES
(1, 'Silver Wellness Club', 299.00, 365, 10.00, '10% discount on all services and retail products, free monthly beverage.', 'active'),
(2, 'Gold VIP Sanctuary Pass', 599.00, 365, 15.00, '15% discount, complimentary birthday spa ritual, priority weekend booking.', 'active'),
(3, 'Diamond Elite All-Access', 999.00, 365, 20.00, '20% discount on everything, free guest pass, private luxury room booking guaranteed.', 'active');

-- --------------------------------------------------------
-- Table: membership_transactions
-- --------------------------------------------------------
DROP TABLE IF EXISTS `membership_transactions`;
CREATE TABLE `membership_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `membership_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` enum('active','expired') NOT NULL DEFAULT 'active',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `membership_id` (`membership_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: units
-- --------------------------------------------------------
DROP TABLE IF EXISTS `units`;
CREATE TABLE `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `short_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `units` (`id`, `name`, `short_name`) VALUES
(1, 'Bottle', 'btl'),
(2, 'Piece', 'pc'),
(3, 'Milliliter', 'ml'),
(4, 'Gram', 'g'),
(5, 'Box', 'box');

-- --------------------------------------------------------
-- Table: product_categories
-- --------------------------------------------------------
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product_categories` (`id`, `name`, `description`) VALUES
(1, 'Hair Care & Shampoos', 'Sulfate-free organic shampoos, conditioners and hair masks'),
(2, 'Skincare & Serums', 'Hyaluronic acid, retinol serums, creams and sunblocks'),
(3, 'Essential Oils & Aromas', 'Pure botanical grade essential oils and massage blends'),
(4, 'Salon Consumables', 'Hair developer, foils, wax cartridges, facial pads');

-- --------------------------------------------------------
-- Table: products
-- --------------------------------------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL DEFAULT 2,
  `name` varchar(150) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `barcode` varchar(50) DEFAULT NULL,
  `product_type` enum('retail','consumable') NOT NULL DEFAULT 'retail',
  `cost_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `selling_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `current_stock` int(11) NOT NULL DEFAULT 0,
  `min_alert_stock` int(11) NOT NULL DEFAULT 5,
  `image` varchar(255) DEFAULT 'default-product.jpg',
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`),
  KEY `category_id` (`category_id`),
  KEY `unit_id` (`unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `category_id`, `unit_id`, `name`, `sku`, `barcode`, `product_type`, `cost_price`, `selling_price`, `current_stock`, `min_alert_stock`, `description`, `status`) VALUES
(1, 1, 1, 'Moroccan Argan Nourishing Shampoo 250ml', 'SKU-HAIR-001', '890100101', 'retail', 14.00, 32.00, 24, 6, 'Hydrating sulfate-free argan oil daily formula.', 'active'),
(2, 1, 1, 'Caviar Intense Repair Hair Mask 200ml', 'SKU-HAIR-002', '890100102', 'retail', 22.00, 48.00, 18, 5, 'Deep conditioning luxury caviar extract hair treatment.', 'active'),
(3, 2, 1, 'Pure Botanical Hyaluronic Hydration Serum', 'SKU-SKIN-001', '890100103', 'retail', 28.00, 65.00, 15, 4, 'Triple molecule weight hyaluronic acid intensely plumps skin.', 'active'),
(4, 3, 1, 'French Lavender Relaxing Massage Oil 500ml', 'SKU-OIL-001', '890100104', 'consumable', 18.00, 0.00, 30, 8, 'Used during spa body massages and hydrotherapy sessions.', 'active'),
(5, 4, 5, 'Professional Salon Bleach Powder & Developer Kit', 'SKU-CONS-001', '890100105', 'consumable', 35.00, 0.00, 8, 3, 'Backbar consumable for hair coloring & highlights.', 'active');

-- --------------------------------------------------------
-- Table: suppliers
-- --------------------------------------------------------
DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `suppliers` (`id`, `name`, `company_name`, `email`, `phone`, `address`) VALUES
(1, 'Jean-Luc Picard', 'Luxe Cosmétiques Paris', 'orders@luxeparis.com', '+1 (555) 888-0011', '12 Rue de la Paix, Paris, France'),
(2, 'Robert Miller', 'Botanical Wellness Supply Co', 'sales@botanicalwellness.com', '+1 (555) 888-0022', '450 Nature Blvd, Portland, OR');

-- --------------------------------------------------------
-- Table: purchases
-- --------------------------------------------------------
DROP TABLE IF EXISTS `purchases`;
CREATE TABLE `purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `purchase_number` varchar(50) NOT NULL,
  `purchase_date` date NOT NULL,
  `total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tax_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `paid_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` enum('received','ordered','pending') NOT NULL DEFAULT 'received',
  `payment_status` enum('paid','partial','unpaid') NOT NULL DEFAULT 'paid',
  `notes` text DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `purchase_number` (`purchase_number`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: purchase_items
-- --------------------------------------------------------
DROP TABLE IF EXISTS `purchase_items`;
CREATE TABLE `purchase_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `unit_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `subtotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`),
  KEY `purchase_id` (`purchase_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: inventory_transactions
-- --------------------------------------------------------
DROP TABLE IF EXISTS `inventory_transactions`;
CREATE TABLE `inventory_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `transaction_type` enum('purchase','sale','service_consumption','adjustment_in','adjustment_out','damage') NOT NULL,
  `quantity` int(11) NOT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `transaction_type` (`transaction_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: invoices
-- --------------------------------------------------------
DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(50) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `subtotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_type` enum('fixed','percentage') NOT NULL DEFAULT 'percentage',
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tax_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `grand_total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `paid_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `due_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `payment_status` enum('paid','partial','unpaid') NOT NULL DEFAULT 'paid',
  `notes` text DEFAULT NULL,
  `created_by` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoice_number` (`invoice_number`),
  KEY `appointment_id` (`appointment_id`),
  KEY `customer_id` (`customer_id`),
  KEY `invoice_date` (`invoice_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `invoices` (`id`, `invoice_number`, `appointment_id`, `customer_id`, `invoice_date`, `subtotal`, `discount_type`, `discount_amount`, `tax_amount`, `grand_total`, `paid_amount`, `due_amount`, `payment_status`, `notes`) VALUES
(1, 'INV-2026-0001', 1, 1, CURDATE(), 97.00, 'percentage', 6.50, 7.69, 98.19, 98.19, 0.00, 'paid', 'Haircut + Moroccan Shampoo bottle purchase.'),
(2, 'INV-2026-0002', 2, 2, CURDATE(), 120.00, 'fixed', 10.00, 9.35, 119.35, 119.35, 0.00, 'paid', 'Hydra-Facial treatment paid via credit card.');

-- --------------------------------------------------------
-- Table: invoice_items
-- --------------------------------------------------------
DROP TABLE IF EXISTS `invoice_items`;
CREATE TABLE `invoice_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `item_type` enum('service','product','package','membership') NOT NULL DEFAULT 'service',
  `item_id` int(11) NOT NULL,
  `item_name` varchar(150) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `unit_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `subtotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`),
  KEY `invoice_id` (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `invoice_items` (`invoice_id`, `item_type`, `item_id`, `item_name`, `staff_id`, `quantity`, `unit_price`, `subtotal`, `tax`) VALUES
(1, 'service', 1, 'Signature Haircut & Blowdry', 1, 1, 65.00, 65.00, 5.53),
(1, 'product', 1, 'Moroccan Argan Nourishing Shampoo 250ml', 1, 1, 32.00, 32.00, 2.16),
(2, 'service', 4, 'Glow Radiance Hydra-Facial', 4, 1, 120.00, 120.00, 9.35);

-- --------------------------------------------------------
-- Table: payments
-- --------------------------------------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `payment_method` enum('cash','card','upi','bank_transfer','gift_card') NOT NULL DEFAULT 'cash',
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `transaction_reference` varchar(100) DEFAULT NULL,
  `payment_date` date NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `payment_date` (`payment_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `payments` (`invoice_id`, `payment_method`, `amount`, `transaction_reference`, `payment_date`, `notes`) VALUES
(1, 'card', 98.19, 'TXN-CARD-9921', CURDATE(), 'Visa ending in 4112'),
(2, 'cash', 119.35, 'CASH-REC-102', CURDATE(), 'Full cash payment at front desk');

-- --------------------------------------------------------
-- Table: commissions
-- --------------------------------------------------------
DROP TABLE IF EXISTS `commissions`;
CREATE TABLE `commissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `service_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `commission_rate` decimal(5,2) NOT NULL DEFAULT 10.00,
  `commission_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` enum('pending','paid') NOT NULL DEFAULT 'pending',
  `paid_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `staff_id` (`staff_id`),
  KEY `invoice_id` (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `commissions` (`staff_id`, `invoice_id`, `service_id`, `service_amount`, `commission_rate`, `commission_amount`, `status`) VALUES
(1, 1, 1, 65.00, 15.00, 9.75, 'pending'),
(4, 2, 4, 120.00, 10.00, 12.00, 'pending');

-- --------------------------------------------------------
-- Table: expense_categories
-- --------------------------------------------------------
DROP TABLE IF EXISTS `expense_categories`;
CREATE TABLE `expense_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `expense_categories` (`id`, `name`, `description`) VALUES
(1, 'Salon Rent & Building Lease', 'Monthly facility rental fee'),
(2, 'Utilities & Electricity', 'Water, gas, electricity, high speed internet'),
(3, 'Salon Consumables & Laundry', 'Towel laundry service, disinfectant, sanitizers'),
(4, 'Marketing & Advertising', 'Social media ads, flyers, local promotions'),
(5, 'Staff Payroll & Bonuses', 'Base salaries and team performance bonuses');

-- --------------------------------------------------------
-- Table: expenses
-- --------------------------------------------------------
DROP TABLE IF EXISTS `expenses`;
CREATE TABLE `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `expense_date` date NOT NULL,
  `title` varchar(150) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `payment_method` enum('cash','card','bank_transfer','check') NOT NULL DEFAULT 'bank_transfer',
  `receipt_file` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_by` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `expense_date` (`expense_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `expenses` (`id`, `category_id`, `expense_date`, `title`, `amount`, `payment_method`, `notes`) VALUES
(1, 2, CURDATE(), 'Monthly High Voltage & AC Bill', 340.00, 'bank_transfer', 'Payment to ConEd NYC'),
(2, 3, CURDATE(), 'Commercial Laundry - Fresh Linens & Towels', 85.00, 'cash', 'Clean linen batch delivered');

-- --------------------------------------------------------
-- Table: cash_register
-- --------------------------------------------------------
DROP TABLE IF EXISTS `cash_register`;
CREATE TABLE `cash_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `opening_balance` decimal(10,2) NOT NULL DEFAULT 200.00,
  `closing_balance` decimal(10,2) DEFAULT NULL,
  `cash_in` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cash_out` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` enum('open','closed') NOT NULL DEFAULT 'open',
  `opened_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `closed_at` datetime DEFAULT NULL,
  `notes` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cash_register` (`user_id`, `opening_balance`, `cash_in`, `cash_out`, `status`) VALUES
(1, 200.00, 119.35, 85.00, 'open');

-- --------------------------------------------------------
-- Table: website_pages
-- --------------------------------------------------------
DROP TABLE IF EXISTS `website_pages`;
CREATE TABLE `website_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_key` varchar(50) NOT NULL,
  `title` varchar(150) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `meta_title` varchar(150) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_key` (`page_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `website_pages` (`page_key`, `title`, `subtitle`, `content`, `meta_title`, `meta_description`) VALUES
('home', 'Where Luxury Meets Wellness & Beauty', 'Experience the finest hair transformations, skin therapies, and tranquil spa treatments.', 'Welcome to our sanctuary of elegance and restoration.', 'Luxe Salon & Spa - Luxury Hair & Spa Sanctuary', 'Best salon and spa in town offering precision hair cuts, balayage, hydra-facials, and relaxing massages.'),
('about', 'Our Philosophy of Artful Beauty', 'Crafting confidence and inner peace since 2014.', 'For over a decade, our dedicated master stylists and certified therapists have blended cutting-edge styling with time-honored holistic relaxation techniques to deliver sublime transformations.', 'About Us - Luxe Salon & Spa', 'Learn more about our dedicated artisans, therapists and our mission for sustainable beauty and peace.'),
('services', 'Curated Salon & Spa Experiences', 'From trendsetting hairstyles to immersive healing therapies.', 'Explore our complete menu of salon services, skincare routines, and spa body treatments designed for your ultimate pampering.', 'Our Services - Luxe Salon & Spa', 'Discover our luxury haircuts, facials, pedicures, Swedish massages, and hydro spa rituals.'),
('packages', 'Exclusive Treatment Packages', 'Save and indulge with our carefully crafted wellness journeys.', 'Combining our most beloved services into complete signature pampering days.', 'Packages - Luxe Salon & Spa', 'Book luxury salon and spa package bundles with special savings.'),
('gallery', 'Moments of Glamour & Peace', 'Take a visual tour through our salon studio and serene spa suites.', 'View our signature transformations, calming suites, and artisan team in action.', 'Gallery - Luxe Salon & Spa', 'Visual showcase of hairstyles, spa amenities, and radiant customer results.'),
('team', 'Our Master Artisans & Therapists', 'World-class professionals passionate about your glow.', 'Meet our licensed hair stylists, makeup artists, and certified holistic massage therapists.', 'Our Team - Luxe Salon & Spa', 'Meet our team of licensed stylists and certified spa therapists.'),
('contact', 'Connect with Our Concierge', 'We are here to answer questions and prepare your visit.', 'Visit our prime downtown location or get in touch for special bookings and bridal inquiries.', 'Contact Us - Luxe Salon & Spa', 'Get directions, phone number, working hours, and message our front desk.');

-- --------------------------------------------------------
-- Table: website_banners
-- --------------------------------------------------------
DROP TABLE IF EXISTS `website_banners`;
CREATE TABLE `website_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `button_text` varchar(50) DEFAULT 'Book Appointment',
  `button_url` varchar(255) DEFAULT 'booking',
  `image` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 1,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `website_banners` (`title`, `subtitle`, `button_text`, `button_url`, `image`, `sort_order`, `status`) VALUES
('Signature Hair Transformations & Couture Styles', 'Unleash your unique radiance with our celebrity master stylists', 'Book Your Stylist', 'booking', 'banner-01.jpg', 1, 'active'),
('Tranquil Holistic Spa & Healing Massages', 'Escape everyday stress in our serene luxury spa sanctuaries', 'Reserve Spa Session', 'booking', 'banner-02.jpg', 2, 'active'),
('Glow Radiance Facials & Skin Revitalization', 'Advanced botanical ingredients and clinically proven hydra techniques', 'Explore Services', 'services', 'banner-03.jpg', 3, 'active');

-- --------------------------------------------------------
-- Table: gallery
-- --------------------------------------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL DEFAULT 'salon',
  `title` varchar(150) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 1,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `gallery` (`category`, `title`, `image`, `sort_order`, `status`) VALUES
('salon', 'Blonde Balayage & Beach Waves', 'gallery-01.jpg', 1, 'active'),
('salon', 'Precision Bob & Gloss Finish', 'gallery-02.jpg', 2, 'active'),
('spa', 'Zen Couple Massage Suite', 'gallery-03.jpg', 3, 'active'),
('spa', 'Aromatherapy Hot Stone Ritual', 'gallery-04.jpg', 4, 'active'),
('salon', 'Russian Luxury Gel Nail Art', 'gallery-05.jpg', 5, 'active'),
('spa', 'Hydro Floral Soaking Bath', 'gallery-06.jpg', 6, 'active');

-- --------------------------------------------------------
-- Table: testimonials
-- --------------------------------------------------------
DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(100) NOT NULL,
  `client_role` varchar(100) DEFAULT 'Regular Guest',
  `client_avatar` varchar(255) DEFAULT 'client-01.jpg',
  `rating` int(11) NOT NULL DEFAULT 5,
  `review` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `testimonials` (`client_name`, `client_role`, `client_avatar`, `rating`, `review`, `status`) VALUES
('Victoria Sterling', 'Fashion Editor', 'testi-01.jpg', 5, 'Isabella is an absolute hair magician! My balayage has never looked so luminous and natural. The ambiance is five-star perfection.', 'active'),
('Marcus Harrington', 'Architect', 'testi-02.jpg', 5, 'The deep tissue massage with Elena eased months of back soreness. The spa rooms are blissfully tranquil with heavenly scents.', 'active'),
('Amanda Kowalski', 'Creative Director', 'testi-03.jpg', 5, 'From the moment you step through the door, you are treated like royalty. The Hydra-Facial took 5 years off my face!', 'active');

-- --------------------------------------------------------
-- Table: offers
-- --------------------------------------------------------
DROP TABLE IF EXISTS `offers`;
CREATE TABLE `offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `discount_text` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `coupon_code` varchar(30) DEFAULT NULL,
  `valid_until` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `offers` (`title`, `discount_text`, `description`, `coupon_code`, `valid_until`, `status`) VALUES
('First Time Guest Welcome Gift', '20% OFF', 'Enjoy 20% off any salon service or spa treatment on your very first visit.', 'WELCOME20', DATE_ADD(CURDATE(), INTERVAL 60 DAY), 'active'),
('Weekday Spa Rejuvenation Special', '$35 OFF', 'Book any 90-minute massage or body scrub between Tuesday and Thursday.', 'WEEKDAYZEN', DATE_ADD(CURDATE(), INTERVAL 90 DAY), 'active'),
('Bridal Party Pamper Deluxe', '15% OFF', 'Complete hair, makeup and nail styling package for parties of 4 or more.', 'BRIDALGLOW', DATE_ADD(CURDATE(), INTERVAL 180 DAY), 'active');

-- --------------------------------------------------------
-- Table: contact_messages
-- --------------------------------------------------------
DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text NOT NULL,
  `status` enum('unread','read') NOT NULL DEFAULT 'unread',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;
