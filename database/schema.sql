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

-- ==========================================
-- TEMPLATE & MULTI-LAYOUT DYNAMIC TABLES
-- ==========================================

DROP TABLE IF EXISTS template_hero_banners;
CREATE TABLE `template_hero_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_key` varchar(50) NOT NULL DEFAULT 'template2',
  `layout_number` int(11) NOT NULL DEFAULT 1,
  `badge` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `button_text` varchar(100) DEFAULT 'Book Appointment',
  `button_url` varchar(255) DEFAULT 'booking',
  `image` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 1,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `tpl_layout` (`template_key`,`layout_number`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO template_hero_banners (id, template_key, layout_number, badge, title, description, button_text, button_url, image, background_image, sort_order, status, created_at) VALUES ('1', 'template2', '1', 'True Beauty Starts with Healthy Skin', 'Glow Starts with <br> Healthy Skin', 'Healthy skin is the true foundation of lasting beauty. When your skin is well-nourished, protected, and properly cared for, it naturally glows with confidence and vitality.', 'Book Now', 'booking', 'uploads/template2/t2_hero_slide_1790856741_1790856741_955.png', 'assets/template2/images/backgrounds/slider-1-1.html', '1', 'active', '2026-10-01 17:24:57');
INSERT INTO template_hero_banners (id, template_key, layout_number, badge, title, description, button_text, button_url, image, background_image, sort_order, status, created_at) VALUES ('2', 'template2', '1', 'Reveal Your Natural Beauty with Expert Care', 'Healthy Skin <br> Beautiful Glow', 'Experience customized facial treatments and botanical skin nourishment designed to restore hydration, smooth fine lines, and enhance natural radiance.', 'Explore Treatments', 'services', 'uploads/template2/t2_hero_slide_1790856773_1790856773_626.png', 'assets/template2/images/backgrounds/slider-1-1.html', '2', 'active', '2026-10-01 17:24:57');
INSERT INTO template_hero_banners (id, template_key, layout_number, badge, title, description, button_text, button_url, image, background_image, sort_order, status, created_at) VALUES ('3', 'template2', '1', 'Fresh, Radiant & Naturally Beautiful Skin', 'Your Journey to <br> Perfect Skin', 'Pamper yourself with premium holistic spa therapies that relax your senses while rejuvenating your skin from within.', 'Book Now', 'booking', 'uploads/template2/t2_hero_slide_1790856793_1790856793_879.png', 'assets/template2/images/backgrounds/slider-1-1.html', '3', 'active', '2026-10-01 17:24:57');
INSERT INTO template_hero_banners (id, template_key, layout_number, badge, title, description, button_text, button_url, image, background_image, sort_order, status, created_at) VALUES ('4', 'template2', '2', 'Welcome to PureGlow Spa', 'Natural Care for <br> Glowing Skin', 'Revitalize your body and mind with our modern botanical therapies and rejuvenating touch.', 'Discover Services', 'services', 'uploads/template2/t2_hero_slide_1790856919_1790856919_354.png', '', '1', 'active', '2026-10-01 17:24:57');
INSERT INTO template_hero_banners (id, template_key, layout_number, badge, title, description, button_text, button_url, image, background_image, sort_order, status, created_at) VALUES ('5', 'template2', '3', 'Luxury Spa & Holistic Care', 'Natural Care for Glowing Skin', 'Experience cutting-edge clinical facial rituals and restorative full-body holistic wellness.', 'Book now', 'booking', 'uploads/template2/t2_hero_slide_1790857463_1790857463_849.jpg', 'assets/template2/images/backgrounds/banner-v2-bg.jpg', '1', 'active', '2026-10-01 17:24:57');
INSERT INTO template_hero_banners (id, template_key, layout_number, badge, title, description, button_text, button_url, image, background_image, sort_order, status, created_at) VALUES ('7', 'template2', '2', 'Welcome to PureGlow Spa', 'Natural Care for <br> Glowing Skin', 'Revitalize your body and mind with our modern botanical therapies and rejuvenating touch.', 'Book Now', 'booking', 'uploads/template2/t2_hero_slide_1790857331_1790857331_898.png', '', '2', 'active', '2026-10-01 17:52:11');
INSERT INTO template_hero_banners (id, template_key, layout_number, badge, title, description, button_text, button_url, image, background_image, sort_order, status, created_at) VALUES ('8', 'template2', '3', 'Luxury Spa & Holistic Care 2', 'Natural Care for Glowing Skin 2', 'Experience cutting-edge clinical facial rituals and restorative full-body holistic wellness 2', 'Book now', 'booking', 'uploads/template2/t2_hero_slide_1790857729_1790857729_474.jpg', '', '2', 'active', '2026-10-01 17:58:49');

DROP TABLE IF EXISTS template_featured_items;
CREATE TABLE `template_featured_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_key` varchar(50) NOT NULL,
  `layout_number` int(11) NOT NULL DEFAULT 1,
  `title` varchar(255) NOT NULL,
  `short_desc` text DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `button_text` varchar(100) DEFAULT 'Book Now',
  `button_link` varchar(255) DEFAULT 'booking',
  `sort_order` int(11) DEFAULT 0,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO template_featured_items (id, template_key, layout_number, title, short_desc, thumbnail, button_text, button_link, sort_order, status, created_at) VALUES ('1', 'template2', '1', 'Deep Hydration Therapy', 'Restore moisture and keep your skin soft, smooth, and naturally radiant.', 'uploads/template2/t2_feat_1790916871_1790916871_251.jpg', 'Book Now', 'booking', '1', 'active', '2026-10-01 15:37:19');
INSERT INTO template_featured_items (id, template_key, layout_number, title, short_desc, thumbnail, button_text, button_link, sort_order, status, created_at) VALUES ('2', 'template2', '1', 'Anti-Aging Solutions', 'Turn back the clock with targeted peptides, firming masks, and gentle lymphatic stimulation.', 'uploads/template2/t2_feat_1790916802_1790916802_479.jpg', 'Book Now', 'booking', '2', 'active', '2026-10-01 15:37:19');
INSERT INTO template_featured_items (id, template_key, layout_number, title, short_desc, thumbnail, button_text, button_link, sort_order, status, created_at) VALUES ('3', 'template2', '1', 'Acne & Blemish Treatment', 'Purify congested pores, calm inflammation, and restore skin microbiome balance.', 'uploads/template2/t2_feat_1790916816_1790916816_159.jpg', 'Book Now', 'booking', '3', 'active', '2026-10-01 15:37:19');
INSERT INTO template_featured_items (id, template_key, layout_number, title, short_desc, thumbnail, button_text, button_link, sort_order, status, created_at) VALUES ('4', 'template2', '1', 'Skin Brightening Care', 'Even skin tone, fade hyperpigmentation, and reveal an unmistakable youthful glow.', 'uploads/template2/t2_feat_1790916926_1790916926_270.jpg', 'Book Now', 'booking', '4', 'active', '2026-10-01 15:37:19');
INSERT INTO template_featured_items (id, template_key, layout_number, title, short_desc, thumbnail, button_text, button_link, sort_order, status, created_at) VALUES ('5', 'template2', '2', 'Deep Cleansing Facial', 'Skin Glow Therapy', 'assets/template2/images/work/work-1-1.jpg', 'View Work', 'booking', '1', 'active', '2026-10-02 13:34:51');
INSERT INTO template_featured_items (id, template_key, layout_number, title, short_desc, thumbnail, button_text, button_link, sort_order, status, created_at) VALUES ('6', 'template2', '2', 'Skin Rejuvenation Therapy', 'Skin Glow Therapy', 'assets/template2/images/work/work-1-2.jpg', 'View Work', 'booking', '2', 'active', '2026-10-02 13:34:51');
INSERT INTO template_featured_items (id, template_key, layout_number, title, short_desc, thumbnail, button_text, button_link, sort_order, status, created_at) VALUES ('7', 'template2', '2', 'Hydrating Facial Mask', 'Skin Glow Therapy', 'assets/template2/images/work/work-1-3.jpg', 'View Work', 'booking', '3', 'active', '2026-10-02 13:34:51');
INSERT INTO template_featured_items (id, template_key, layout_number, title, short_desc, thumbnail, button_text, button_link, sort_order, status, created_at) VALUES ('8', 'template2', '2', 'Radiance Renewal Care', 'Skin Glow Therapy', 'assets/template2/images/work/work-1-1.jpg', 'View Work', 'booking', '4', 'active', '2026-10-02 13:34:51');
INSERT INTO template_featured_items (id, template_key, layout_number, title, short_desc, thumbnail, button_text, button_link, sort_order, status, created_at) VALUES ('9', 'template2', '3', 'Advanced Cellular Renewal', 'Targeted cellular repair and deep hydration', 'assets/template2/images/resources/feature-1-1.jpg', 'Book Now', 'booking', '1', 'active', '2026-10-02 13:34:51');
INSERT INTO template_featured_items (id, template_key, layout_number, title, short_desc, thumbnail, button_text, button_link, sort_order, status, created_at) VALUES ('10', 'template2', '3', 'Intensive Collagen Therapy', 'Restores facial firmness and elasticity', 'assets/template2/images/resources/feature-1-2.jpg', 'Book Now', 'booking', '2', 'active', '2026-10-02 13:34:51');
INSERT INTO template_featured_items (id, template_key, layout_number, title, short_desc, thumbnail, button_text, button_link, sort_order, status, created_at) VALUES ('11', 'template2', '3', 'Botanical Purifying Cleanse', 'Eliminates impurities while preserving skin barrier', 'assets/template2/images/resources/feature-1-3.jpg', 'Book Now', 'booking', '3', 'active', '2026-10-02 13:34:51');
INSERT INTO template_featured_items (id, template_key, layout_number, title, short_desc, thumbnail, button_text, button_link, sort_order, status, created_at) VALUES ('12', 'template2', '3', 'Radiance Illuminating Care', 'Brightens hyperpigmentation and evens skin tone', 'assets/template2/images/resources/feature-1-4.jpg', 'Book Now', 'booking', '4', 'active', '2026-10-02 13:34:51');

DROP TABLE IF EXISTS template_services;
CREATE TABLE `template_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_key` varchar(50) NOT NULL,
  `layout_number` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(100) DEFAULT 'icon-botox',
  `thumbnail` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `key_benefits` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT 0.00,
  `duration` varchar(50) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO template_services (id, template_key, layout_number, title, slug, icon, thumbnail, banner_image, short_desc, description, key_benefits, price, duration, sort_order, status, created_at) VALUES ('1', 'template2', '1', 'Deep Cleansing Facial', 'cleansing-facial', 'icon-botox', 'uploads/template2/t2_svc_thumb_1790918021_1790918021_291.jpg', 'uploads/template2/t2_svc_banner_1790918055_1790918055_276.jpg', 'Deep cleansing facial to refresh and rejuvenate your skin for a natural glow.', '<p>Our skincare services are designed to improve the health, appearance, and natural glow of your skin. We offer a variety of professional treatments, including deep cleansing facials, acne care, hydration therapy, and advanced skin rejuvenation solutions. Each service is carefully tailored to suit different skin types and concerns, ensuring safe and effective results.</p>\r\n<h4>Youthful Skin Boosts</h4>\r\n<p>Experience the confidence that comes with healthy, radiant skin. Professional skincare treatments are designed to refresh, nourish, and rejuvenate your skin while enhancing its natural beauty.</p><table class=\"table table-borderless no-border\" border=\"0\" data-borderless=\"1\" style=\"--bs-table-bg-type: initial; --bs-table-color-state: initial; --bs-table-bg-state: initial; --bs-table-color: rgba(255, 255, 255, .8); --bs-table-bg: #161618; --bs-table-border-color: rgba(255, 255, 255, .1); --bs-table-accent-bg: rgba(255, 255, 255, .05); --bs-table-striped-color: #fff; --bs-table-striped-bg: #F6F6F9; --bs-table-active-color: #fff; --bs-table-active-bg: rgba(255, 255, 255, 0.1); --bs-table-hover-color: #fff; --bs-table-hover-bg: rgba(255, 255, 255, .1); width: 1878px; margin: 1rem auto 1rem 0px; border-width: medium;\"><tbody style=\"border-width: medium !important;\"><tr style=\"border-width: medium !important;\"><td class=\"no-border\" style=\"padding: 0px; border-width: medium !important; background-color: rgba(255, 255, 255, 0.04) !important;\"><ul style=\"color: rgb(241, 245, 249); font-size: 15px;\"><li>Promotes natural skin renewal and improves elasticity</li><li>Helps fade dark spots and balance pigmentation</li><li>Revives natural glow for a fresh appearance</li><li>Deeply nourishes the skin for healthy vitality</li><li>Delivers noticeable results with gentle care</li><li>Delivers noticeable results with gentle care</li></ul></td><td class=\"no-border\" style=\"padding: 0px; border-width: medium !important; background-color: rgba(255, 255, 255, 0.04) !important;\"><p><img src=\"data:image/jpeg;base64,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\" data-filename=\"service-details-img2.jpg\" style=\"width: 300px;\"></p></td></tr></tbody></table><p>Our skincare services are designed to improve the health, appearance, and natural glow of your skin. We offer a variety of professional treatments, including deep cleansing facials, acne care, hydration therapy, and advanced skin rejuvenation solutions. Each service is carefully tailored to suit different skin types and concerns, ensuring safe and effective results.</p>', NULL, '85.00', '60 mins', '1', 'active', '2026-10-01 15:37:19');
INSERT INTO template_services (id, template_key, layout_number, title, slug, icon, thumbnail, banner_image, short_desc, description, key_benefits, price, duration, sort_order, status, created_at) VALUES ('2', 'template2', '1', 'Skin Brightening Ritual', 'skin-brightening', 'icon-botox', 'uploads/template2/t2_svc_thumb_1790919576_1790919576_246.jpg', 'uploads/template2/t2_svc_banner_1790919576_1790919576_574.jpg', 'Botanical brightening serum infusion to revive fatigued complexion.', '<p>Our Skin Brightening Ritual harnesses organic vitamin C, niacinamide, and licorice root extracts to gently fade hyperpigmentation, brighten dull areas, and leave your face glowing with youthful luminosity.</p><h4>Benefits of Skin Brightening</h4><ul><li>Evens out skin discolouration and dark spots</li><li>Restores radiant translucence</li><li>Shields against environmental oxidative stress</li></ul>', NULL, '95.00', '75 mins', '2', 'active', '2026-10-01 15:37:19');
INSERT INTO template_services (id, template_key, layout_number, title, slug, icon, thumbnail, banner_image, short_desc, description, key_benefits, price, duration, sort_order, status, created_at) VALUES ('3', 'template2', '1', 'Acne & Blemish Treatment', 'acne-treatment', 'icon-botox', 'uploads/template2/t2_svc_thumb_1790919625_1790919625_163.jpg', 'uploads/template2/t2_svc_banner_1790919625_1790919625_393.jpg', 'Targeted purifying treatment that calms irritation and clears congested pores.', '<p>A clinical calming protocol designed to rebalance blemish-prone and oily skin. Using salicylic acid peels, ultrasonic extractions, and antibacterial blue LED light therapy.</p><h4>Treatment Highlights</h4><ul><li>Unclogs deeply congested pores</li><li>Reduces active inflammation without over-drying</li><li>Accelerates cell turnover and healing</li></ul>', NULL, '90.00', '60 mins', '3', 'active', '2026-10-01 15:37:19');
INSERT INTO template_services (id, template_key, layout_number, title, slug, icon, thumbnail, banner_image, short_desc, description, key_benefits, price, duration, sort_order, status, created_at) VALUES ('4', 'template2', '1', 'Hydrating Glow Therapy', 'hydrating-glow-therapy', 'icon-botox', 'uploads/template2/t2_svc_thumb_1790919670_1790919670_198.jpg', 'uploads/template2/t2_svc_banner_1790919670_1790919670_303.jpg', 'Intense moisture infusion with micro-hyaluronic acids and seaweed peptides.', '<p>Quench dehydrated skin with our multi-depth hyaluronic infusion. Restores natural skin barrier moisture locks and plumps fine lines for a supple, dewy finish.</p><h4>Key Advantages</h4><ul><li>Deep moisture replenishment</li><li>Improves skin elasticity and bounce</li><li>Soothes winter dryness and sun damage</li></ul>', NULL, '110.00', '75 mins', '4', 'active', '2026-10-01 15:37:19');
INSERT INTO template_services (id, template_key, layout_number, title, slug, icon, thumbnail, banner_image, short_desc, description, key_benefits, price, duration, sort_order, status, created_at) VALUES ('5', 'template2', '1', 'Detox & Lymphatic Drainage', 'detox-therapy', 'icon-botox', 'uploads/template2/t2_svc_thumb_1790919702_1790919702_112.jpg', 'uploads/template2/t2_svc_banner_1790919702_1790919702_546.jpg', 'Soothing facial massage to stimulate lymphatic flow and reduce facial puffiness.', '<p>A holistic treatment utilizing gua sha, jade rolling, and specialized lymphatic drainage stroking to flush out toxins, reduce facial puffiness, and sculpt jawline contours naturally.</p>', NULL, '120.00', '80 mins', '5', 'active', '2026-10-01 15:37:19');
INSERT INTO template_services (id, template_key, layout_number, title, slug, icon, thumbnail, banner_image, short_desc, description, key_benefits, price, duration, sort_order, status, created_at) VALUES ('6', 'template2', '1', 'Sensitive Skin Calming Care', 'sensitive-skin-care', 'icon-botox', 'uploads/template2/t2_svc_thumb_1790919723_1790919723_547.jpg', 'uploads/template2/t2_svc_banner_1790919723_1790919723_172.jpg', 'Ultra-gentle restorative care formulated for reactive and rosacea-prone skin.', '<p>Gentle calming botanicals including chamomile, centella asiatica, and colloidal oatmeal rebuild the moisture barrier while soothing redness and irritation.</p>', NULL, '95.00', '60 mins', '6', 'active', '2026-10-01 15:37:19');
INSERT INTO template_services (id, template_key, layout_number, title, slug, icon, thumbnail, banner_image, short_desc, description, key_benefits, price, duration, sort_order, status, created_at) VALUES ('7', 'template2', '2', 'Organic Herbal Facial', 'organic-herbal-facial', 'icon-botox', 'uploads/template2/t2_svc_thumb_1790930005_1790930005_212.jpg', 'uploads/template2/t2_svc_banner_1790930005_1790930005_946.jpg', 'Organic plant botanicals and nutrient infusion for sensitive skin restoration.', '<p>Our Organic Herbal Facial utilizes certified organic botanical extracts and soothing compresses...</p>', NULL, '95.00', '60 mins', '1', 'active', '2026-10-02 13:34:51');
INSERT INTO template_services (id, template_key, layout_number, title, slug, icon, thumbnail, banner_image, short_desc, description, key_benefits, price, duration, sort_order, status, created_at) VALUES ('8', 'template2', '2', 'Aroma Body Polish', 'aroma-body-polish', 'icon-botox', 'uploads/template2/t2_svc_thumb_1790930021_1790930021_712.jpg', 'uploads/template2/t2_svc_banner_1790930021_1790930021_644.jpg', 'Exfoliating botanical scrub with essential oils for satin smoothness.', '<p>Deeply polishing full-body ritual designed to buff away dull surface cells...</p>', NULL, '120.00', '75 mins', '2', 'active', '2026-10-02 13:34:51');
INSERT INTO template_services (id, template_key, layout_number, title, slug, icon, thumbnail, banner_image, short_desc, description, key_benefits, price, duration, sort_order, status, created_at) VALUES ('9', 'template2', '2', 'Laser Skin Rejuvenation', 'laser-skin-rejuvenation', 'icon-botox', 'uploads/template2/t2_svc_thumb_1790930033_1790930033_714.jpg', 'uploads/template2/t2_svc_banner_1790930033_1790930033_804.jpg', 'Non-invasive collagen boosting laser therapy for deep texture renewal.', '<p>State-of-the-art non-ablative laser technology targeting hyperpigmentation and fine lines...</p>', NULL, '150.00', '90 mins', '3', 'active', '2026-10-02 13:34:51');
INSERT INTO template_services (id, template_key, layout_number, title, slug, icon, thumbnail, banner_image, short_desc, description, key_benefits, price, duration, sort_order, status, created_at) VALUES ('10', 'template2', '2', 'Collagen Infusion Therapy', 'collagen-infusion-therapy', 'icon-cream', 'assets/template2/images/services/services-1-1.jpg', 'assets/template2/images/services/service-details-img4.jpg', 'Intense dermal firming with bioactive collagen peptides and vitamin C.', '<p>A deeply hydrating and collagen-rebuilding protocol tailored for aging skin...</p>', NULL, '110.00', '60 mins', '4', 'active', '2026-10-02 13:34:51');
INSERT INTO template_services (id, template_key, layout_number, title, slug, icon, thumbnail, banner_image, short_desc, description, key_benefits, price, duration, sort_order, status, created_at) VALUES ('11', 'template2', '2', 'Hydro-Dermabrasion Glow', 'hydro-dermabrasion-glow', 'icon-botox', 'assets/template2/images/services/services-1-2.jpg', 'assets/template2/images/services/service-details-img4.jpg', 'Gentle water-peel exfoliation combined with serum micro-infusion.', '<p>Simultaneously exfoliates, vacuums debris from pores, and infuses custom antioxidants...</p>', NULL, '135.00', '75 mins', '5', 'active', '2026-10-02 13:34:51');
INSERT INTO template_services (id, template_key, layout_number, title, slug, icon, thumbnail, banner_image, short_desc, description, key_benefits, price, duration, sort_order, status, created_at) VALUES ('12', 'template2', '2', 'Microcurrent Face Lifting', 'microcurrent-face-lifting', 'icon-massage', 'assets/template2/images/services/services-1-3.jpg', 'assets/template2/images/services/service-details-img4.jpg', 'Low-level electrical microcurrents to re-educate facial muscles and sculpt jawline.', '<p>Natural non-surgical facelift stimulating ATP production and facial contour definition...</p>', NULL, '140.00', '60 mins', '6', 'active', '2026-10-02 13:34:51');
INSERT INTO template_services (id, template_key, layout_number, title, slug, icon, thumbnail, banner_image, short_desc, description, key_benefits, price, duration, sort_order, status, created_at) VALUES ('13', 'template2', '3', 'Clinical Chemical Peel', 'clinical-chemical-peel', 'icon-botox', 'assets/template2/images/services/services-1-1.jpg', 'assets/template2/images/services/service-details-img4.jpg', 'Medical-grade glycolic and salicylic peel for intense cellular renewal.', '<p>Formulated with targeted multi-acid complexes for deep clarifying and tone correction...</p>', NULL, '165.00', '60 mins', '1', 'active', '2026-10-02 13:34:51');
INSERT INTO template_services (id, template_key, layout_number, title, slug, icon, thumbnail, banner_image, short_desc, description, key_benefits, price, duration, sort_order, status, created_at) VALUES ('14', 'template2', '3', 'Cryotherapy Skin Sculpting', 'cryotherapy-skin-sculpting', 'icon-cream', 'assets/template2/images/services/services-1-2.jpg', 'assets/template2/images/services/service-details-img4.jpg', 'Sub-zero cryo-cooling stimulates microcirculation and tightens pores.', '<p>Controlled localized thermal shock triggers immediate vasoconstriction and collagen genesis...</p>', NULL, '180.00', '75 mins', '2', 'active', '2026-10-02 13:34:51');
INSERT INTO template_services (id, template_key, layout_number, title, slug, icon, thumbnail, banner_image, short_desc, description, key_benefits, price, duration, sort_order, status, created_at) VALUES ('15', 'template2', '3', 'Oxygen Botanical Therapy', 'oxygen-botanical-therapy', 'icon-massage', 'assets/template2/images/services/services-1-3.jpg', 'assets/template2/images/services/service-details-img4.jpg', 'Hyperbaric pure oxygen spray infusing hyaluronic acid and peptides.', '<p>High-pressure medical oxygen stream propels low-molecular serums directly into epidermal layers...</p>', NULL, '145.00', '60 mins', '3', 'active', '2026-10-02 13:34:51');
INSERT INTO template_services (id, template_key, layout_number, title, slug, icon, thumbnail, banner_image, short_desc, description, key_benefits, price, duration, sort_order, status, created_at) VALUES ('16', 'template2', '3', 'Gold Leaf Radiance Facial', 'gold-leaf-radiance-facial', 'icon-botox', 'assets/template2/images/services/services-1-1.jpg', 'assets/template2/images/services/service-details-img4.jpg', '24K gold foil application delivering intense antioxidant radiance.', '<p>Ancient regal treatment revived with modern micronized mineral technology...</p>', NULL, '210.00', '90 mins', '4', 'active', '2026-10-02 13:34:51');
INSERT INTO template_services (id, template_key, layout_number, title, slug, icon, thumbnail, banner_image, short_desc, description, key_benefits, price, duration, sort_order, status, created_at) VALUES ('17', 'template2', '3', 'Cellular Repair Therapy', 'cellular-repair-therapy', 'icon-cream', 'assets/template2/images/services/services-1-2.jpg', 'assets/template2/images/services/service-details-img4.jpg', 'Deep dermal restructuring with growth factor serums and LED light.', '<p>Synergistic photo-biomodulation coupled with stem peptide concentrates...</p>', NULL, '175.00', '75 mins', '5', 'active', '2026-10-02 13:34:51');
INSERT INTO template_services (id, template_key, layout_number, title, slug, icon, thumbnail, banner_image, short_desc, description, key_benefits, price, duration, sort_order, status, created_at) VALUES ('18', 'template2', '3', 'Ultrasonic Deep Infusion', 'ultrasonic-deep-infusion', 'icon-massage', 'assets/template2/images/services/services-1-3.jpg', 'assets/template2/images/services/service-details-img4.jpg', 'High-frequency sound waves enabling transdermal nutrient permeation.', '<p>Non-invasive sonophoresis dramatically enhances nutrient permeability without skin irritation...</p>', NULL, '155.00', '60 mins', '6', 'active', '2026-10-02 13:34:51');

DROP TABLE IF EXISTS template_blogs;
CREATE TABLE `template_blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_key` varchar(50) NOT NULL,
  `layout_number` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `author_name` varchar(100) DEFAULT 'Admin',
  `published_date` date DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO template_blogs (id, template_key, layout_number, title, slug, thumbnail, author_name, published_date, short_desc, content, tags, sort_order, status, created_at) VALUES ('1', 'template2', '1', 'Skincare Secrets for a Natural Daily Glow', 'skincare-secrets-natural-glow', 'uploads/template2/t2_blog_1790937390_1790937390_805.jpg', 'Admin', '2026-03-15', 'Discover expert tips on balancing hydration, gentle exfoliation, and nutrition for luminous skin.', '<p>Healthy skin is the foundation of natural, effortless beauty. With proper morning and evening care rituals, your skin can maintain its balance, radiance, and youthful tone throughout every season.</p><h3 class=\"text-xl font-bold text-gray-900 mt-8 mb-3\" style=\"border: 0px solid rgb(229, 231, 235); margin: 32px 0px 12px; padding: 0px; font-size: 20px; overflow-wrap: break-word; --tw-font-weight: 700; font-family: Montserrat, sans-serif; --tw-tracking: -.025em; letter-spacing: -0.5px; line-height: 1.4; color: oklch(0.21 0.034 264.665); background-color: rgb(255, 255, 255);\">Why Lorem Ipsum Is Used?</h3><p style=\"border: 0px solid rgb(229, 231, 235); margin: 0px 0px 16px; padding: 0px; overflow-wrap: break-word; color: oklch(0.373 0.034 259.733); font-family: &quot;Source Sans 3&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 255);\">It helps the designer plan where the content will sit. It helps in creating drafts of the content on the pages of the website. It originates from the Latin text but is seen as gibberish.</p><p style=\"border: 0px solid rgb(229, 231, 235); margin: 0px 0px 16px; padding: 0px; overflow-wrap: break-word; color: oklch(0.373 0.034 259.733); font-family: &quot;Source Sans 3&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 255);\">Sometimes, the reader gets distracted while creating or working on the website. That\'s why this language is important.</p><p style=\"border: 0px solid rgb(229, 231, 235); margin: 0px 0px 16px; padding: 0px; overflow-wrap: break-word; color: oklch(0.373 0.034 259.733); font-family: &quot;Source Sans 3&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 255);\">This tool makes the work easier for the webmaster.</p><h3 class=\"text-xl font-bold text-gray-900 mt-8 mb-3\" style=\"border: 0px solid rgb(229, 231, 235); margin: 32px 0px 12px; padding: 0px; font-size: 20px; overflow-wrap: break-word; --tw-font-weight: 700; font-family: Montserrat, sans-serif; --tw-tracking: -.025em; letter-spacing: -0.5px; line-height: 1.4; color: oklch(0.21 0.034 264.665); background-color: rgb(255, 255, 255);\">How Lorem Ipsum Can Be Used?</h3><p style=\"border: 0px solid rgb(229, 231, 235); margin: 0px 0px 16px; padding: 0px; overflow-wrap: break-word; color: oklch(0.373 0.034 259.733); font-family: &quot;Source Sans 3&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 255);\">When using Lorem Ipsum for creating dummy content for your newly created website, you can select the text formats you want from the tool. Like, words, sentences, or paragraphs.</p><p style=\"border: 0px solid rgb(229, 231, 235); margin: 0px 0px 16px; padding: 0px; overflow-wrap: break-word; color: oklch(0.373 0.034 259.733); font-family: &quot;Source Sans 3&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 255);\">Then, you can select whether you want HTML markup in your dummy content or not</p><p style=\"border: 0px solid rgb(229, 231, 235); margin: 0px 0px 16px; padding: 0px; overflow-wrap: break-word; color: oklch(0.373 0.034 259.733); font-family: &quot;Source Sans 3&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 255);\">Then, you can choose the number of words and paragraphs for your dummy content and execute the plan accordingly.</p><p style=\"border: 0px solid rgb(229, 231, 235); margin: 0px 0px 16px; padding: 0px; overflow-wrap: break-word; color: oklch(0.373 0.034 259.733); font-family: &quot;Source Sans 3&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 255);\">You can use this tool at incrementors.com for free.</p><h3 class=\"text-xl font-bold text-gray-900 mt-8 mb-3\" style=\"border: 0px solid rgb(229, 231, 235); margin: 32px 0px 12px; padding: 0px; font-size: 20px; overflow-wrap: break-word; --tw-font-weight: 700; font-family: Montserrat, sans-serif; --tw-tracking: -.025em; letter-spacing: -0.5px; line-height: 1.4; color: oklch(0.21 0.034 264.665); background-color: rgb(255, 255, 255);\">How Can I Use Lorem Ipsum Tool For My Website?</h3><p style=\"border: 0px solid rgb(229, 231, 235); margin: 0px 0px 16px; padding: 0px; overflow-wrap: break-word; color: oklch(0.373 0.034 259.733); font-family: &quot;Source Sans 3&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 255);\">You can click on the \'item to generate\' column and select the format you want content in.</p><p style=\"border: 0px solid rgb(229, 231, 235); margin: 0px 0px 16px; padding: 0px; overflow-wrap: break-word; color: oklch(0.373 0.034 259.733); font-family: &quot;Source Sans 3&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 255);\">Below that, you can select if you want an HTML tag in your content or not</p><p style=\"border: 0px solid rgb(229, 231, 235); margin: 0px 0px 16px; padding: 0px; overflow-wrap: break-word; color: oklch(0.373 0.034 259.733); font-family: &quot;Source Sans 3&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 255);\">After that, you can choose how many paragraphs you want in the \'how many items to generate\' column.</p><p style=\"border: 0px solid rgb(229, 231, 235); margin: 0px 0px 16px; padding: 0px; overflow-wrap: break-word; color: oklch(0.373 0.034 259.733); font-family: &quot;Source Sans 3&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 255);\">Then, you can choose the minimum and maximum words you want per sentence.</p><p style=\"border: 0px solid rgb(229, 231, 235); margin: 0px 0px 16px; padding: 0px; overflow-wrap: break-word; color: oklch(0.373 0.034 259.733); font-family: &quot;Source Sans 3&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 255);\">Later, you can select the minimum and maximum sentences you want per paragraph.</p>', 'Skincare, Glow, Organic', '1', 'active', '2026-10-01 15:37:47');
INSERT INTO template_blogs (id, template_key, layout_number, title, slug, thumbnail, author_name, published_date, short_desc, content, tags, sort_order, status, created_at) VALUES ('2', 'template2', '1', 'Top Skincare Tips for Every Skin Type', 'top-skincare-tips-every-skin-type', 'uploads/template2/t2_blog_1790937261_1790937261_684.jpg', 'Esthetician Team', '2026-03-22', 'Whether your skin is sensitive, oily, or dry, here is the master routine curated by dermatologists.', '<p>Understanding your unique skin barrier is essential before introducing active ingredients. Here is our master guide for oily, combination, and sensitive complexions.</p><h4>Identifying Your Skin Barrier State</h4><p>When the acid mantle is compromised, irritation and redness flare up easily. Simplify your routine with restorative centella and hyaluronic acid.</p>', 'Wellness, Skin Care, Routine', '2', 'active', '2026-10-01 15:37:47');
INSERT INTO template_blogs (id, template_key, layout_number, title, slug, thumbnail, author_name, published_date, short_desc, content, tags, sort_order, status, created_at) VALUES ('3', 'template2', '1', 'The Ultimate Guide to Holistic Skin Wellness', 'ultimate-guide-holistic-skin-wellness', 'uploads/template2/t2_blog_1790937268_1790937268_198.jpg', 'Dr. Clara Vance', '2026-03-28', 'Why true beauty starts from within: how stress management, sleep, and botanical treatments align.', '<p>Your skin reflects your inner wellness. From mindful breathing to antioxidant-rich diets, explore holistic lifestyle habits that amplify the results of your spa treatments.</p>', 'Holistic, Spa, Wellness', '3', 'active', '2026-10-01 15:37:47');
INSERT INTO template_blogs (id, template_key, layout_number, title, slug, thumbnail, author_name, published_date, short_desc, content, tags, sort_order, status, created_at) VALUES ('4', 'template2', '2', 'Botanical Aromatherapy & Essential Oils for Deep Relaxation', 'botanical-aromatherapy-essential-oils-deep-relaxation', 'assets/template2/images/blog/blog-v2-img1.jpg', 'Sophia Laurent', '2026-09-30', 'Discover how organic botanical essential oils and holistic pressure therapy ease neuromuscular tension and renew natural vitality.', '<p>Aromatherapy has served as an essential holistic healing pillar for centuries. In our Modern Botanical Sanctuary, we fuse organic essences with intentional therapeutic touch.</p><h4>1. Pure Essential Oil Profiles</h4><p>Lavender, bergamot, and cedarwood combine to restore internal balance, lower cortisol levels, and encourage restorative cellular renewal.</p><h4>2. The Healing Touch Protocol</h4><p>Our licensed therapists integrate lymphatic stimulation and warm botanical compresses to detoxify muscles and soothe sensory fatigue.</p>', 'Botanical, Aromatherapy, Wellness', '1', 'active', '2026-10-02 15:58:26');
INSERT INTO template_blogs (id, template_key, layout_number, title, slug, thumbnail, author_name, published_date, short_desc, content, tags, sort_order, status, created_at) VALUES ('5', 'template2', '2', 'The Healing Power of Herbal Compresses & Warm Botanical Stones', 'healing-power-herbal-compresses-warm-botanical-stones', 'assets/template2/images/blog/blog-v2-img2.jpg', 'Sophia Laurent', '2026-09-27', 'Unwind with steamed herbal poultices and basalt stones infused with sacred herbs designed to soothe inflamed tissue and rejuvenate skin elasticity.', '<p>Steamed herbal compresses work synergistically with heated volcanic basalt stones to drive medicinal botanical nutrients deeply into tight tissues.</p><h4>1. Handcrafted Herb Poultices</h4><p>Formulated with lemongrass, turmeric, and kaffir lime, these compresses provide anti-inflammatory and micro-circulatory benefits.</p><h4>2. Harmonizing Energy Centers</h4><p>Smooth basalt stones are warmed to precise therapeutic temperatures and swept along energy pathways to promote deep calm and radiant blood flow.</p>', 'Herbal, Hot Stone, Body Therapy', '2', 'active', '2026-10-02 15:58:26');
INSERT INTO template_blogs (id, template_key, layout_number, title, slug, thumbnail, author_name, published_date, short_desc, content, tags, sort_order, status, created_at) VALUES ('6', 'template2', '2', 'Detoxify & Restore: Morning Botanical Skin Care Ritual', 'detoxify-restore-morning-botanical-skincare-ritual', 'assets/template2/images/blog/blog-v2-img3.jpg', 'Sophia Laurent', '2026-09-24', 'Transform your morning skin routine with clean botanicals, antioxidant hydrosols, and restorative facial massage for sustained all-day radiance.', '<p>Starting your morning with a mindful botanical ritual prepares your dermal barrier against modern environmental oxidants while preserving optimum hydration.</p><h4>1. Phyto-Nutrient Cleansing</h4><p>Gentle chamomile and aloe gel cleansers purify pores without stripping moisture or disrupting the protective acid mantle.</p><h4>2. Antioxidant Shielding</h4><p>Follow with green tea hydrosol and rosehip seed serum to fortify collagen synthesis and maintain a dewy, glowing complexion all day.</p>', 'Detox, Morning Routine, Botanical Glow', '3', 'active', '2026-10-02 15:58:26');
INSERT INTO template_blogs (id, template_key, layout_number, title, slug, thumbnail, author_name, published_date, short_desc, content, tags, sort_order, status, created_at) VALUES ('7', 'template2', '3', 'Clinical Laser Rejuvenation: Protocols, Expectations & Results', 'clinical-laser-rejuvenation-protocols-expectations-results', 'uploads/template2/t2_blog_1790937282_1790937282_746.jpg', 'Dr. Marcus Vance', '2026-10-01', 'An in-depth clinical analysis of non-ablative fractional laser therapies, dermal resurfacing, and cellular collagen stimulation.', '<p>Advanced clinical dermatological technology allows precise targeting of photo-damaged tissue, stubborn hyperpigmentation, and loss of dermal density.</p><h4>1. Fractional Photo-Thermal Synthesis</h4><p>Controlled micro-thermal zones stimulate rapid fibroblasts activation without prolonged epidermal downtime.</p><h4>2. Expected Clinical Trajectory</h4><p>Patients typically experience immediate dermal tightening followed by progressive collagen remodeling spanning 60 to 90 days.</p>', 'Clinical, Laser, Rejuvenation', '1', 'active', '2026-10-02 15:58:26');
INSERT INTO template_blogs (id, template_key, layout_number, title, slug, thumbnail, author_name, published_date, short_desc, content, tags, sort_order, status, created_at) VALUES ('8', 'template2', '3', 'Advanced Peptide Therapy & Epidermal Collagen Science', 'advanced-peptide-therapy-epidermal-collagen-science', 'uploads/template2/t2_blog_1790937290_1790937290_123.jpg', 'Dr. Marcus Vance', '2026-09-28', 'Explore the scientific breakthrough of bio-identical peptides and signal molecules in reversing deep cellular aging and loss of firmness.', '<p>Peptides serve as vital biological signaling messengers communicating directly with dermal cells to stimulate elastin and structural proteins.</p><h4>1. Copper Tripeptides (GHK-Cu)</h4><p>Proven to enhance tissue remodeling, accelerate wound repair, and restore protective barrier thickness against environmental stressors.</p><h4>2. Clinical Application Protocols</h4><p>Incorporated via targeted iontophoresis and sonophoresis to maximize molecular transdermal penetration and long-term firming.</p>', 'Peptides, Clinical Science', '2', 'active', '2026-10-02 15:58:26');
INSERT INTO template_blogs (id, template_key, layout_number, title, slug, thumbnail, author_name, published_date, short_desc, content, tags, sort_order, status, created_at) VALUES ('9', 'template2', '3', 'Post-Clinical Procedure Aftercare for Maximum Result Longevity', 'post-clinical-procedure-aftercare-guide-longevity', 'uploads/template2/t2_blog_1790937298_1790937298_838.jpg', 'Dr. Marcus Vance', '2026-09-25', 'Dermatological guidelines to safeguard your skin barrier, prevent post-inflammatory redness, and prolong clinical treatment benefits.', '<p>The success of any clinical peel, microneedling, or laser session depends heavily on the critical 72-hour post-treatment barrier care.</p><h4>1. Hydration &amp; Occlusion Defense</h4><p>Using ceramide-rich emollient matrices and pharmaceutical hyaluronic acid shields raw tissue while accelerating re-epithelialization.</p><h4>2. Strict Broad-Spectrum Photoprotection</h4><p>High-grade micronized zinc oxide SPF 50+ must be applied daily to avoid secondary melanin stimulation and preserve procedural results.</p>', 'Dermatology, Recovery', '3', 'active', '2026-10-02 15:58:26');

DROP TABLE IF EXISTS template_testimonials;
CREATE TABLE `template_testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_key` varchar(50) NOT NULL,
  `layout_number` int(11) NOT NULL DEFAULT 0,
  `client_name` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT 5,
  `review` text NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO template_testimonials (id, template_key, layout_number, client_name, designation, rating, review, avatar, sort_order, status, created_at) VALUES ('1', 'template2', '0', 'Sarah Jenkins', 'Fashion Stylist', '5', 'The deep cleansing facial made my skin look radiant for weeks! The therapist was gentle, professional, and knowledgeable. The atmosphere is heavenly.', 'uploads/template2/t2_testi_1790923220_1790923220_576.jpg', '1', 'active', '2026-10-01 15:37:19');
INSERT INTO template_testimonials (id, template_key, layout_number, client_name, designation, rating, review, avatar, sort_order, status, created_at) VALUES ('2', 'template2', '0', 'Jessica Alba', 'Creative Director', '5', 'I visit Pureglow twice a month for their botanical rituals. My skin has never looked clearer or more youthful. Truly the best spa experience in town!', 'uploads/template2/t2_testi_1790923237_1790923237_783.jpg', '2', 'active', '2026-10-01 15:37:19');
INSERT INTO template_testimonials (id, template_key, layout_number, client_name, designation, rating, review, avatar, sort_order, status, created_at) VALUES ('3', 'template2', '0', 'Emily Rodriguez', 'Entrepreneur', '5', 'A completely rejuvenating session from start to finish. The organic products smell divine, and the staff treat you like absolute royalty.', 'uploads/template2/t2_testi_1790923247_1790923247_678.jpg', '3', 'active', '2026-10-01 15:37:19');
INSERT INTO template_testimonials (id, template_key, layout_number, client_name, designation, rating, review, avatar, sort_order, status, created_at) VALUES ('4', 'template2', '0', 'Michael Chen', 'Architect', '5', 'Outstanding therapist skill. Their anti-fatigue facial erased months of stress from my complexion. Highly recommend their bespoke packages.', 'uploads/template2/t2_testi_1790923255_1790923255_688.jpg', '4', 'active', '2026-10-01 15:37:19');

DROP TABLE IF EXISTS template_faqs;
CREATE TABLE `template_faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_key` varchar(50) NOT NULL,
  `layout_number` int(11) NOT NULL DEFAULT 0,
  `question` varchar(500) NOT NULL,
  `answer` text NOT NULL,
  `sort_order` int(11) DEFAULT 0,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO template_faqs (id, template_key, layout_number, question, answer, sort_order, status, created_at) VALUES ('1', 'template2', '1', 'What skincare treatments do you offer?', 'We provide a wide range of organic and clinical treatments including Deep Cleansing Facials, Acne Therapy, Skin Brightening, Botanical Peels, and Deep Hydration therapies.', '1', 'active', '2026-10-01 15:37:19');
INSERT INTO template_faqs (id, template_key, layout_number, question, answer, sort_order, status, created_at) VALUES ('2', 'template2', '1', 'How often should I get a facial treatment?', 'For optimal skin renewal and maintenance, we recommend scheduling a professional facial every 3 to 4 weeks, aligned with your natural cell turnover cycle.', '2', 'active', '2026-10-01 15:37:19');
INSERT INTO template_faqs (id, template_key, layout_number, question, answer, sort_order, status, created_at) VALUES ('3', 'template2', '1', 'Do I need to book an appointment in advance?', 'Yes, we recommend booking 2 to 3 days in advance to secure your preferred therapist and treatment room, though walk-ins are accommodated when available.', '3', 'active', '2026-10-01 15:37:19');
INSERT INTO template_faqs (id, template_key, layout_number, question, answer, sort_order, status, created_at) VALUES ('4', 'template2', '1', 'How long does a skincare session take?', 'Our signature sessions range between 60 to 90 minutes. Each appointment includes a personal skin consultation, preparation, treatment, and homecare guidance.', '4', 'active', '2026-10-01 15:37:19');
INSERT INTO template_faqs (id, template_key, layout_number, question, answer, sort_order, status, created_at) VALUES ('5', 'template2', '1', 'Can I book or order services online?', 'Yes! You can reserve your preferred time and therapist directly through our online booking portal with instant SMS and email confirmation.', '5', 'active', '2026-10-01 15:37:19');
INSERT INTO template_faqs (id, template_key, layout_number, question, answer, sort_order, status, created_at) VALUES ('6', 'template2', '1', 'Do I need to book an appointment in advance?', 'Yes, we recommend booking 2 to 3 days in advance to secure your preferred therapist and treatment room, though walk-ins are accommodated when available.', '6', 'active', '2026-10-02 12:14:32');
INSERT INTO template_faqs (id, template_key, layout_number, question, answer, sort_order, status, created_at) VALUES ('7', 'template2', '2', 'What makes Layout 2 skincare therapies unique?', 'Our specialized treatments combine holistic aromatherapy with advanced non-invasive rejuvenation to restore cellular elasticity.', '1', 'active', '2026-10-02 13:34:51');
INSERT INTO template_faqs (id, template_key, layout_number, question, answer, sort_order, status, created_at) VALUES ('8', 'template2', '2', 'How long is a typical wellness & body polish session?', 'Our wellness sessions range between 60 to 90 minutes, including tailored consultation and aftercare.', '2', 'active', '2026-10-02 13:34:51');
INSERT INTO template_faqs (id, template_key, layout_number, question, answer, sort_order, status, created_at) VALUES ('9', 'template2', '2', 'Are treatments suitable for sensitive skin types?', 'Yes, our certified therapists evaluate your skin barrier beforehand and customize hypoallergenic botanical extracts.', '3', 'active', '2026-10-02 13:34:51');
INSERT INTO template_faqs (id, template_key, layout_number, question, answer, sort_order, status, created_at) VALUES ('10', 'template2', '2', 'How soon can I see visible results?', 'Most clients notice an immediate luminous glow and enhanced hydration right after the initial session.', '4', 'active', '2026-10-02 13:34:51');
INSERT INTO template_faqs (id, template_key, layout_number, question, answer, sort_order, status, created_at) VALUES ('11', 'template2', '3', 'What clinical skincare treatments do you provide in Layout 3?', 'We offer medical-grade chemical peels, cryo-sculpting, oxygen infusion, and cellular repair treatments led by expert estheticians.', '1', 'active', '2026-10-02 13:34:51');
INSERT INTO template_faqs (id, template_key, layout_number, question, answer, sort_order, status, created_at) VALUES ('12', 'template2', '3', 'Is there any downtime after clinical chemical peels?', 'Most superficial treatments have zero downtime with mild radiance flaking over 48 hours, fully manageable with our post-treatment cream.', '2', 'active', '2026-10-02 13:34:51');
INSERT INTO template_faqs (id, template_key, layout_number, question, answer, sort_order, status, created_at) VALUES ('13', 'template2', '3', 'How many sessions are recommended for optimal skin transformation?', 'A package of 4 to 6 treatments spaced 3 weeks apart yields optimal cellular restructuring and lasting luminosity.', '3', 'active', '2026-10-02 13:34:51');
INSERT INTO template_faqs (id, template_key, layout_number, question, answer, sort_order, status, created_at) VALUES ('14', 'template2', '3', 'Can I combine microdermabrasion with oxygen therapy?', 'Yes, combination therapies are tailored after a 3D skin analysis to maximize transdermal nutrient absorption.', '4', 'active', '2026-10-02 13:34:51');

DROP TABLE IF EXISTS template_layout_settings;
CREATE TABLE `template_layout_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_key` varchar(50) NOT NULL,
  `layout_number` int(11) NOT NULL,
  `section_key` varchar(50) NOT NULL,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` mediumtext DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `tpl_layout_sec_key` (`template_key`,`layout_number`,`section_key`,`setting_key`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('1', 'template2', '1', 'hero', 'hero_badge', 'Fresh, Radiant & Naturally Beautiful Skin', '2026-10-01 15:37:19', '2026-10-01 17:43:13');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('2', 'template2', '1', 'hero', 'hero_title', 'Your Journey to <br> Perfect Skin', '2026-10-01 15:37:19', '2026-10-01 17:43:13');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('3', 'template2', '1', 'hero', 'hero_desc', 'Pamper yourself with premium holistic spa therapies that relax your senses while rejuvenating your skin from within.', '2026-10-01 15:37:19', '2026-10-01 17:43:13');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('4', 'template2', '1', 'hero', 'hero_btn_text', 'Book Now', '2026-10-01 15:37:19', '2026-10-01 17:43:13');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('5', 'template2', '1', 'hero', 'hero_btn_url', 'booking', '2026-10-01 15:37:19', '2026-10-01 17:43:13');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('6', 'template2', '1', 'hero', 'hero_image', 'uploads/template2/t2_hero_slide_1790856793_1790856793_879.png', '2026-10-01 15:37:19', '2026-10-01 17:43:13');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('7', 'template2', '1', 'about', 'about_tagline', 'About Us', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('8', 'template2', '1', 'about', 'about_title', 'Explore Our Dedication to Healthy Skin', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('9', 'template2', '1', 'about', 'about_desc', 'We are passionate about helping you achieve healthy, glowing skin through gentle and effective care. Our journey began with a simple belief that true beauty starts with skin wellness.', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('10', 'template2', '1', 'about', 'about_experience', '27', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('11', 'template2', '1', 'about', 'about_author_name', 'Emma Watson', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('12', 'template2', '1', 'about', 'about_author_role', 'Founder & Master Esthetician', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('13', 'template2', '1', 'about', 'about_image_1', 'uploads/template2/t2_about1_l1_1790917133_188.jpg', '2026-10-01 15:37:19', '2026-10-02 10:28:53');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('14', 'template2', '1', 'about', 'about_image_2', 'uploads/template2/t2_about2_l1_1790917133_269.jpg', '2026-10-01 15:37:19', '2026-10-02 10:28:53');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('15', 'template2', '1', 'featured_skincare', 'tagline', 'Featured Skincare', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('16', 'template2', '1', 'featured_skincare', 'title', 'Beauty and Glow Skin Solutions', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('17', 'template2', '1', 'services_header', 'tagline', 'We Offer', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('18', 'template2', '1', 'services_header', 'title', 'Beauty and Skin Care Services', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('19', 'template2', '1', 'services_header', 'desc', 'Our skin care services are designed to nourish, protect, and enhance your natural beauty. We use advanced techniques and high-quality products.', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('20', 'template2', '1', 'testimonials_header', 'tagline', 'Testimonial', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('21', 'template2', '1', 'testimonials_header', 'title', 'Radiant Reviews from Our Happy Clients', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('22', 'template2', '1', 'faq_header', 'tagline', 'Frequently Asked Questions', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('23', 'template2', '1', 'faq_header', 'title', 'Clear Answers About Your Treatment', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('24', 'template2', '1', 'blog_header', 'tagline', 'Latest News', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('25', 'template2', '1', 'blog_header', 'title', 'Latest News & Articles From Our Experts', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('26', 'template2', '1', 'blog_header', 'desc', 'Beautiful skin doesn\'t happen overnight. It requires patience, consistency, and the right treatments.', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('27', 'template2', '2', 'hero', 'hero_badge', 'Welcome to PureGlow Spa', '2026-10-01 15:37:19', '2026-10-01 17:45:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('28', 'template2', '2', 'hero', 'hero_title', 'Natural Care for <br> Glowing Skin', '2026-10-01 15:37:19', '2026-10-01 17:46:18');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('29', 'template2', '2', 'hero', 'hero_desc', 'Revitalize your body and mind with our modern botanical therapies and rejuvenating touch.', '2026-10-01 15:37:19', '2026-10-01 17:45:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('30', 'template2', '2', 'hero', 'hero_btn_text', 'Book Now', '2026-10-01 15:37:19', '2026-10-01 17:52:11');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('31', 'template2', '2', 'hero', 'hero_btn_url', 'booking', '2026-10-01 15:37:19', '2026-10-01 17:52:11');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('32', 'template2', '2', 'hero', 'hero_image', 'uploads/template2/t2_hero_slide_1790857331_1790857331_898.png', '2026-10-01 15:37:19', '2026-10-01 17:52:11');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('33', 'template2', '2', 'about', 'about_tagline', 'Our Sanctuary', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('34', 'template2', '2', 'about', 'about_title', 'Transformative Holistic Care for Modern Living', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('35', 'template2', '2', 'about', 'about_desc', 'Step inside our calm sanctuary where pure botanical botanicals and master therapist touches restore harmony to body and spirit.', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('36', 'template2', '2', 'about', 'about_experience', '15', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('37', 'template2', '2', 'about', 'about_author_name', 'Sophia Laurent', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('38', 'template2', '2', 'about', 'about_author_role', 'Wellness Director', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('39', 'template2', '2', 'services_header', 'tagline', 'We Offer', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('40', 'template2', '2', 'services_header', 'title', 'Holistic Spa & Therapeutic Rituals', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('41', 'template2', '2', 'testimonials_header', 'tagline', 'Client Stories', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('42', 'template2', '2', 'testimonials_header', 'title', 'What Our Cherished Guests Say', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('43', 'template2', '2', 'blog_header', 'tagline', 'Latest News', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('44', 'template2', '2', 'blog_header', 'title', 'Wellness Insights & Beauty Journal', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('45', 'template2', '3', 'hero', 'hero_badge', 'Luxury Spa & Holistic Care 2', '2026-10-01 15:37:19', '2026-10-01 18:16:51');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('46', 'template2', '3', 'hero', 'hero_title', 'Natural Care for Glowing Skin 2', '2026-10-01 15:37:19', '2026-10-01 18:16:41');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('47', 'template2', '3', 'hero', 'hero_desc', 'Experience cutting-edge clinical facial rituals and restorative full-body holistic wellness 2', '2026-10-01 15:37:19', '2026-10-01 18:16:41');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('48', 'template2', '3', 'hero', 'hero_btn_text', 'Book now', '2026-10-01 15:37:19', '2026-10-01 17:55:30');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('49', 'template2', '3', 'hero', 'hero_btn_url', 'booking', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('50', 'template2', '3', 'hero', 'hero_image', 'uploads/template2/t2_hero_slide_1790857729_1790857729_474.jpg', '2026-10-01 15:37:19', '2026-10-01 17:58:49');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('51', 'template2', '3', 'about', 'about_tagline', 'About Pureglow', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('52', 'template2', '3', 'about', 'about_title', 'Pioneering Skin Care Excellence Since 2008', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('53', 'template2', '3', 'about', 'about_desc', 'Our licensed clinicians merge time-honored eastern massage philosophies with innovative European facial therapies.', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('54', 'template2', '3', 'about', 'about_experience', '20', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('55', 'template2', '3', 'services_header', 'tagline', 'We Offer', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('56', 'template2', '3', 'services_header', 'title', 'Clinical Treatments & Restorative Care', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('57', 'template2', '3', 'testimonials_header', 'tagline', 'Client Experiences', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('58', 'template2', '3', 'testimonials_header', 'title', 'Real Results from Real Clients', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('59', 'template2', '3', 'blog_header', 'tagline', 'Latest News', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
INSERT INTO template_layout_settings (id, template_key, layout_number, section_key, setting_key, setting_value, created_at, updated_at) VALUES ('60', 'template2', '3', 'blog_header', 'title', 'Clinical Beauty & Wellness Journal', '2026-10-01 15:37:19', '2026-10-01 15:37:19');
