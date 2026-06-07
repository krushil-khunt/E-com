-- sample_data.sql
-- Sample dataset for the Laravel e-commerce application.
-- IMPORTANT: Run the whole script, or disable foreign key checks before truncating parent tables.
-- Truncate child tables first: carts, reviews, wishlists, orders, products, categories, users.

SET FOREIGN_KEY_CHECKS = 0;

TRUNCATE TABLE `carts`;
TRUNCATE TABLE `reviews`;
TRUNCATE TABLE `wishlists`;
TRUNCATE TABLE `orders`;
TRUNCATE TABLE `products`;
TRUNCATE TABLE `categories`;
TRUNCATE TABLE `users`;
TRUNCATE TABLE `password_reset_tokens`;
TRUNCATE TABLE `failed_jobs`;
TRUNCATE TABLE `personal_access_tokens`;

INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`role`,`created_at`,`updated_at`) VALUES
(1,'Admin User','admin@example.com','2026-05-01 09:00:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'admin','2026-05-01 09:00:00','2026-05-01 09:00:00'),
(2,'Aarav Patel','aarav.patel@example.com','2026-05-02 08:15:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','t9XLmzYJ1u','user','2026-05-02 08:15:00','2026-05-10 12:55:00'),
(3,'Nina Shah','nina.shah@example.com','2026-05-02 09:40:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','B7cQpW3k','user','2026-05-02 09:40:00','2026-05-12 14:11:00'),
(4,'Riya Desai','riya.desai@example.com','2026-05-03 10:10:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'user','2026-05-03 10:10:00','2026-05-03 10:10:00'),
(5,'Kunal Mehta','kunal.mehta@example.com','2026-05-04 11:05:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Kx8eQW9H','user','2026-05-04 11:05:00','2026-05-04 11:05:00'),
(6,'Simran Kaur','simran.kaur@example.com','2026-05-05 12:20:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'user','2026-05-05 12:20:00','2026-05-05 12:20:00'),
(7,'Ayaan Sharma','ayaan.sharma@example.com','2026-05-05 13:45:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','0mP2xQ5d','user','2026-05-05 13:45:00','2026-05-05 13:45:00'),
(8,'Anika Joshi','anika.joshi@example.com','2026-05-06 07:55:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','rN5QvLx8','user','2026-05-06 07:55:00','2026-05-06 07:55:00'),
(9,'Dev Shah','dev.shah@example.com','2026-05-06 08:35:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'user','2026-05-06 08:35:00','2026-05-06 08:35:00'),
(10,'Priya Singh','priya.singh@example.com','2026-05-07 09:10:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','hM1kRf7w','user','2026-05-07 09:10:00','2026-05-07 09:10:00'),
(11,'Sameer Khan','sameer.khan@example.com','2026-05-07 10:30:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'user','2026-05-07 10:30:00','2026-05-07 10:30:00'),
(12,'Meera Gupta','meera.gupta@example.com','2026-05-08 11:55:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','sH7aPv1z','user','2026-05-08 11:55:00','2026-05-08 11:55:00'),
(13,'Arjun Verma','arjun.verma@example.com','2026-05-08 12:40:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'user','2026-05-08 12:40:00','2026-05-08 12:40:00'),
(14,'Isha Nair','isha.nair@example.com','2026-05-09 13:15:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','T4rYj9Vb','user','2026-05-09 13:15:00','2026-05-09 13:15:00'),
(15,'Vikram Rao','vikram.rao@example.com','2026-05-09 14:05:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'user','2026-05-09 14:05:00','2026-05-09 14:05:00'),
(16,'Sana Kapoor','sana.kapoor@example.com','2026-05-10 15:20:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','P9bLc8Ea','user','2026-05-10 15:20:00','2026-05-10 15:20:00'),
(17,'Rohan Iyer','rohan.iyer@example.com','2026-05-10 16:45:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'user','2026-05-10 16:45:00','2026-05-10 16:45:00'),
(18,'Neha Malhotra','neha.malhotra@example.com','2026-05-11 08:00:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','jV3dRb6N','user','2026-05-11 08:00:00','2026-05-11 08:00:00'),
(19,'Aditya Kulkarni','aditya.kulkarni@example.com','2026-05-11 09:30:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'user','2026-05-11 09:30:00','2026-05-11 09:30:00'),
(20,'Ananya Bose','ananya.bose@example.com','2026-05-11 10:45:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'user','2026-05-11 10:45:00','2026-05-11 10:45:00');

INSERT INTO `password_reset_tokens` (`email`,`token`,`created_at`) VALUES
('priya.singh@example.com','reset_token_52349','2026-05-11 11:00:00');

INSERT INTO `failed_jobs` (`id`,`uuid`,`connection`,`queue`,`payload`,`exception`,`failed_at`) VALUES
(1,'4e92f6a9-8e1d-4d72-9d3c-1a4d0d4f96ba','database','default','{"job":"App\\Jobs\\SyncInventory"}','"SQLSTATE[23000]: Integrity constraint violation"','2026-05-11 11:15:00');

INSERT INTO `personal_access_tokens` (`id`,`tokenable_type`,`tokenable_id`,`name`,`token`,`abilities`,`last_used_at`,`expires_at`,`created_at`,`updated_at`) VALUES
(1,'App\\Models\\User',2,'Mobile App Token','c9b1f2d3a4e5b6c7d8e9f0a1b2c3d4e5f6a7b8c9d0e1f2a3b4c5d6e7f8a9b0c','["read","write"]','2026-05-11 11:30:00','2026-11-11 11:30:00','2026-05-11 11:30:00','2026-05-11 11:30:00');

INSERT INTO `categories` (`id`,`name`,`created_at`,`updated_at`) VALUES
(1,'Smart Phones','2026-05-01 09:20:00','2026-05-01 09:20:00'),
(2,'Laptops','2026-05-01 09:20:00','2026-05-01 09:20:00'),
(3,'Earbuds','2026-05-01 09:20:00','2026-05-01 09:20:00'),
(4,'Smart Watches','2026-05-01 09:20:00','2026-05-01 09:20:00'),
(5,'Tablets','2026-05-01 09:20:00','2026-05-01 09:20:00'),
(6,'Mice','2026-05-01 09:20:00','2026-05-01 09:20:00'),
(7,'Chargers','2026-05-01 09:20:00','2026-05-01 09:20:00'),
(8,'Power Banks','2026-05-01 09:20:00','2026-05-01 09:20:00'),
(9,'Gaming Accessories','2026-05-01 09:20:00','2026-05-01 09:20:00'),
(10,'Phone Cases','2026-05-01 09:20:00','2026-05-01 09:20:00'),
(11,'Screen Protectors','2026-05-01 09:20:00','2026-05-01 09:20:00'),
(12,'Audio Accessories','2026-05-01 09:20:00','2026-05-01 09:20:00');

INSERT INTO `products` (`id`,`name`,`brand`,`price`,`image`,`description`,`ram`,`storage`,`stock`,`category_id`,`created_at`,`updated_at`) VALUES
(1,'iPhone 16 Pro','Apple',134900,'https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=600&q=80','Super-thin bezel display, A18 Pro chip, advanced camera controls, and longer battery life.','8 GB','256 GB',32,1,'2026-05-02 10:00:00','2026-05-02 10:00:00'),
(2,'Samsung Galaxy S24 Ultra','Samsung',124999,'https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?auto=format&fit=crop&w=600&q=80','Snapdragon 8 Gen 3, 200MP quad camera, adaptive display and S Pen support.','12 GB','256 GB',28,1,'2026-05-02 10:10:00','2026-05-02 10:10:00'),
(3,'OnePlus 12','OnePlus',64999,'https://images.unsplash.com/photo-1598327105666-5b89351aff97?auto=format&fit=crop&w=600&q=80','Hasselblad camera system, 100W SuperVOOC charging and 2K AMOLED display.','16 GB','512 GB',24,1,'2026-05-02 10:20:00','2026-05-02 10:20:00'),
(4,'Google Pixel 8 Pro','Google',106999,'https://images.unsplash.com/photo-1616348436168-de43ad0db179?q=80&w=600&auto=format&fit=crop','AI-powered Pixel camera, Tensor G3, and responsive Android experience.','12 GB','128 GB',26,1,'2026-05-02 10:30:00','2026-05-02 10:30:00'),
(5,'Xiaomi 14 Ultra','Xiaomi',79999,'https://images.unsplash.com/photo-1610817025544-d4f5f0b0e1f3?q=80&w=600&auto=format&fit=crop','Leading telephoto camera, Snapdragon 8 Gen 3, and high refresh display.','12 GB','256 GB',16,1,'2026-05-02 10:40:00','2026-05-02 10:40:00'),
(6,'Sony Xperia 1 V','Sony',119999,'https://images.unsplash.com/photo-1508177422074-d1875e31e6ae?q=80&w=600&auto=format&fit=crop','4K OLED display, pro-grade photography tools, and cinematic video capture.','12 GB','256 GB',18,1,'2026-05-02 10:50:00','2026-05-02 10:50:00'),
(7,'Motorola Razr+ 2026','Motorola',89999,'https://images.unsplash.com/photo-1595608943001-011016d46e52?q=80&w=600&auto=format&fit=crop','Premium foldable display, durable hinge, and flagship performance.','12 GB','512 GB',12,1,'2026-05-02 11:00:00','2026-05-02 11:00:00'),
(8,'Nokia X30','Nokia',24999,'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?q=80&w=600&auto=format&fit=crop','Durable bio-based phone, AMOLED display, and reliable 5G connectivity.','8 GB','128 GB',22,1,'2026-05-02 11:10:00','2026-05-02 11:10:00'),
(9,'ASUS ROG Phone 8','ASUS',99999,'https://images.unsplash.com/photo-1640563285507-7c9eade08b4f?q=80&w=600&auto=format&fit=crop','Dedicated gaming controls, 165Hz AMOLED display, and vapor chamber cooling.','16 GB','256 GB',14,9,'2026-05-02 11:20:00','2026-05-02 11:20:00'),
(10,'Samsung Galaxy Z Fold 6','Samsung',224999,'https://images.unsplash.com/photo-1527430253228-e93688616381?q=80&w=600&auto=format&fit=crop','Premium foldable tablet-phone, multitasking software, and large inner display.','12 GB','512 GB',8,1,'2026-05-02 11:30:00','2026-05-02 11:30:00'),
(11,'MacBook Pro M4','Apple',169900,'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=600&q=80','Next-gen M4 processor, Liquid Retina XDR display, and up to 22h battery.','16 GB','512 GB',10,2,'2026-05-02 11:40:00','2026-05-02 11:40:00'),
(12,'Dell XPS 15','Dell',189999,'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?q=80&w=600&auto=format&fit=crop','Intel Core i9, RTX 4060, and a stunning InfinityEdge OLED display.','32 GB','1 TB',9,2,'2026-05-02 11:50:00','2026-05-02 11:50:00'),
(13,'HP Spectre x360','HP',149999,'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=600&auto=format&fit=crop','Convertible 2-in-1 design, OLED touchscreen, and long battery life.','16 GB','1 TB',11,2,'2026-05-02 12:00:00','2026-05-02 12:00:00'),
(14,'Lenovo Legion 9i','Lenovo',179999,'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=600&auto=format&fit=crop','High-performance gaming laptop with mechanical keyboard and liquid metal cooling.','32 GB','1 TB',7,9,'2026-05-02 12:10:00','2026-05-02 12:10:00'),
(15,'Microsoft Surface Laptop 6','Microsoft',159999,'https://images.unsplash.com/photo-1587614382346-ac04f1b188dd?q=80&w=600&auto=format&fit=crop','Ultra-thin design, PixelSense touchscreen, and Microsoft 365 ready.','16 GB','512 GB',12,2,'2026-05-02 12:20:00','2026-05-02 12:20:00'),
(16,'Apple iPad Pro M4','Apple',99900,'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?q=80&w=600&auto=format&fit=crop','Tandem OLED display, M4 chip, and Apple Pencil Pro support.','8 GB','256 GB',25,5,'2026-05-02 12:30:00','2026-05-02 12:30:00'),
(17,'Samsung Galaxy Tab S9','Samsung',79999,'https://images.unsplash.com/photo-1523475496153-3d6ccbc2e410?q=80&w=600&auto=format&fit=crop','Dynamic AMOLED 2X, S Pen included, and desktop-class performance.','8 GB','256 GB',20,5,'2026-05-02 12:40:00','2026-05-02 12:40:00'),
(18,'Amazon Fire HD 11','Amazon',25999,'https://images.unsplash.com/photo-1512470876309-e1edb7f27c20?q=80&w=600&auto=format&fit=crop','Affordable tablet with Dolby Atmos audio and 11-inch 2K display.','4 GB','64 GB',30,5,'2026-05-02 12:50:00','2026-05-02 12:50:00'),
(19,'Lenovo Tab P13 Pro','Lenovo',54999,'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=600&auto=format&fit=crop','OLED display, quad speakers, and Snapdragon 870 performance.','8 GB','256 GB',18,5,'2026-05-02 13:00:00','2026-05-02 13:00:00'),
(20,'Samsung Galaxy Buds 3 Pro','Samsung',17999,'https://images.unsplash.com/photo-1590658268037-6bf12165a8df?q=80&w=600&auto=format&fit=crop','Active noise cancellation, 24-bit audio, and ambient sound mode.','-','- ',35,3,'2026-05-02 13:10:00','2026-05-02 13:10:00'),
(21,'Apple AirPods Pro (2nd Gen)','Apple',24900,'https://images.unsplash.com/photo-1588449668338-d151688b3c4e?q=80&w=600&auto=format&fit=crop','Adaptive transparency, spatial audio, and MagSafe wireless charging case.','-','- ',40,3,'2026-05-02 13:20:00','2026-05-02 13:20:00'),
(22,'Sony WF-1000XM5','Sony',23990,'https://images.unsplash.com/photo-1590658268037-6bf12165a8df?q=80&w=600&auto=format&fit=crop','Industry-leading ANC, Hi-Res audio, and excellent battery life.','-','- ',28,3,'2026-05-02 13:30:00','2026-05-02 13:30:00'),
(23,'Bose QuietComfort Earbuds II','Bose',23990,'https://images.unsplash.com/photo-1590658268037-6bf12165a8df?q=80&w=600&auto=format&fit=crop','Adaptive noise cancelling, aware mode, and immersive sound tuning.','-','- ',22,3,'2026-05-02 13:40:00','2026-05-02 13:40:00'),
(24,'Beats Fit Pro','Beats',14990,'https://images.unsplash.com/photo-1590658268037-6bf12165a8df?q=80&w=600&auto=format&fit=crop','Secure-fit earbuds with spatial audio and Apple H1 chip.','-','- ',44,3,'2026-05-02 13:50:00','2026-05-02 13:50:00'),
(25,'Jabra Elite 8 Active','Jabra',12999,'https://images.unsplash.com/photo-1590658268037-6bf12165a8df?q=80&w=600&auto=format&fit=crop','Sport-ready earbuds with ANC, 35h playback, and secure fit.','-','- ',26,3,'2026-05-02 14:00:00','2026-05-02 14:00:00'),
(26,'Apple Watch Series 9','Apple',41900,'https://images.unsplash.com/photo-1508685096489-7aacd43bd3b1?q=80&w=600&auto=format&fit=crop','S9 SiP chip, double-tap gesture, Always-On Retina, and health tracking.','1 GB','64 GB',19,4,'2026-05-02 14:10:00','2026-05-02 14:10:00'),
(27,'Samsung Galaxy Watch 6','Samsung',29999,'https://images.unsplash.com/photo-1508685096489-7aacd43bd3b1?q=80&w=600&auto=format&fit=crop','Sleep tracking, BIA body composition, and LTE-ready smartwatch.','2 GB','16 GB',21,4,'2026-05-02 14:20:00','2026-05-02 14:20:00'),
(28,'Garmin Fenix 7','Garmin',49999,'https://images.unsplash.com/photo-1508685096489-7aacd43bd3b1?q=80&w=600&auto=format&fit=crop','Rugged GPS multisport watch with solar charging and advanced health metrics.','1 GB','32 GB',13,4,'2026-05-02 14:30:00','2026-05-02 14:30:00'),
(29,'Fitbit Sense 2','Fitbit',18999,'https://images.unsplash.com/photo-1508685096489-7aacd43bd3b1?q=80&w=600&auto=format&fit=crop','Stress management, ECG, sleep score, and advanced health sensors.','1 GB','32 GB',24,4,'2026-05-02 14:40:00','2026-05-02 14:40:00'),
(30,'Logitech MX Master 3S','Logitech',10995,'https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?q=80&w=600&auto=format&fit=crop','Ergonomic mouse with 8K DPI sensor, Quiet Click, and USB-C fast charging.','-','- ',33,6,'2026-05-02 14:50:00','2026-05-02 14:50:00'),
(31,'Razer DeathAdder V3','Razer',5995,'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=600&auto=format&fit=crop','Compact gaming mouse with optical switches and 30K DPI sensor.','-','- ',38,9,'2026-05-02 15:00:00','2026-05-02 15:00:00'),
(32,'Corsair Dark Core RGB','Corsair',8995,'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=600&auto=format&fit=crop','Wireless gaming mouse with Qi charging support and 18K DPI sensor.','-','- ',27,9,'2026-05-02 15:10:00','2026-05-02 15:10:00'),
(33,'Apple Magic Mouse 2','Apple',7499,'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=600&auto=format&fit=crop','Low-profile wireless mouse with multi-touch surface and rechargeable battery.','-','- ',20,6,'2026-05-02 15:20:00','2026-05-02 15:20:00'),
(34,'SteelSeries Aerox 3','SteelSeries',4999,'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=600&auto=format&fit=crop','Lightweight ultra-porous gaming mouse with fast optical switches.','-','- ',18,9,'2026-05-02 15:30:00','2026-05-02 15:30:00'),
(35,'Anker Prime 67W GaN Charger','Anker',3999,'https://images.unsplash.com/photo-1622445262465-2481c4574875?q=80&w=600&auto=format&fit=crop','Compact GaN wall charger with 2x USB-C ports and 67W total output.','-','- ',44,7,'2026-05-02 15:40:00','2026-05-02 15:40:00'),
(36,'Belkin 3-in-1 Fast Charger','Belkin',5499,'https://images.unsplash.com/photo-1622445262465-2481c4574875?q=80&w=600&auto=format&fit=crop','3-in-1 charger for iPhone, Apple Watch, and AirPods with compact stand.','-','- ',16,7,'2026-05-02 15:50:00','2026-05-02 15:50:00'),
(37,'Aukey 65W PD Wall Charger','Aukey',2999,'https://images.unsplash.com/photo-1622445262465-2481c4574875?q=80&w=600&auto=format&fit=crop','65W USB-C PD wall charger with foldable prongs and pass-through charging.','-','- ',36,7,'2026-05-02 16:00:00','2026-05-02 16:00:00'),
(38,'Samsung 45W Super Fast Charger','Samsung',4499,'https://images.unsplash.com/photo-1622445262465-2481c4574875?q=80&w=600&auto=format&fit=crop','Official Samsung fast charger with 45W USB-C PD for Galaxy flagship phones.','-','- ',29,7,'2026-05-02 16:10:00','2026-05-02 16:10:00'),
(39,'Anker PowerCore 24K Power Bank','Anker',14999,'https://images.unsplash.com/photo-1609592424109-dd77d704c311?q=80&w=600&auto=format&fit=crop','24,000mAh power bank with 140W two-way charging and digital status display.','-','- ',15,8,'2026-05-02 16:20:00','2026-05-02 16:20:00'),
(40,'Xiaomi 20,000mAh Power Bank','Xiaomi',3999,'https://images.unsplash.com/photo-1609592424109-dd77d704c311?q=80&w=600&auto=format&fit=crop','Slim power bank with dual USB-A/C output and fast charge support.','-','- ',42,8,'2026-05-02 16:30:00','2026-05-02 16:30:00'),
(41,'Mophie 20K USB-C Power Bank','Mophie',5999,'https://images.unsplash.com/photo-1609592424109-dd77d704c311?q=80&w=600&auto=format&fit=crop','High-capacity portable charger with fast USB-C input/output.','-','- ',21,8,'2026-05-02 16:40:00','2026-05-02 16:40:00'),
(42,'UGREEN 65W Car Charger','UGREEN',2599,'https://images.unsplash.com/photo-1622445262465-2481c4574875?q=80&w=600&auto=format&fit=crop','Dual-port car charger with 65W USB-C PD and smart power delivery.','-','- ',38,7,'2026-05-02 16:50:00','2026-05-02 16:50:00'),
(43,'Spigen Tough Armor Phone Case','Spigen',1499,'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=600&auto=format&fit=crop','Dual-layer protective case with air-cushion technology and raised bezels.','-','- ',55,10,'2026-05-02 17:00:00','2026-05-02 17:00:00'),
(44,'OtterBox Defender Case','OtterBox',3499,'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=600&auto=format&fit=crop','Heavy-duty protective case with port covers and multi-layer defense.','-','- ',17,10,'2026-05-02 17:10:00','2026-05-02 17:10:00'),
(45,'ESR Screen Protector','ESR',799,'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=600&auto=format&fit=crop','Tempered glass screen protector with 9H hardness and anti-fingerprint coating.','-','- ',63,11,'2026-05-02 17:20:00','2026-05-02 17:20:00'),
(46,'ZAGG Glass Curve Screen Protector','ZAGG',1299,'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=600&auto=format&fit=crop','Edge-to-edge curved protector with shock absorption and clarity.','-','- ',48,11,'2026-05-02 17:30:00','2026-05-02 17:30:00'),
(47,'Nomad Leather Wallet Case','Nomad',4999,'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=600&auto=format&fit=crop','Premium leather wallet case with three card slots and protective back.','-','- ',14,10,'2026-05-02 17:40:00','2026-05-02 17:40:00'),
(48,'Sony WH-CH720N','Sony',9990,'https://images.unsplash.com/photo-1590658268037-6bf12165a8df?q=80&w=600&auto=format&fit=crop','Noise cancelling over-ear headphones with 35h battery and ambient mode.','-','- ',32,12,'2026-05-02 17:50:00','2026-05-02 17:50:00'),
(49,'JBL Tune 130NC','JBL',4999,'https://images.unsplash.com/photo-1590658268037-6bf12165a8df?q=80&w=600&auto=format&fit=crop','True wireless earbuds with adaptive noise cancellation and 40h playtime.','-','- ',38,12,'2026-05-02 18:00:00','2026-05-02 18:00:00'),
(50,'Anker Soundcore Life P3','Anker',3999,'https://images.unsplash.com/photo-1590658268037-6bf12165a8df?q=80&w=600&auto=format&fit=crop','Affordable ANC wireless earbuds with powerful bass and dual-mic calls.','-','- ',46,12,'2026-05-02 18:10:00','2026-05-02 18:10:00');

INSERT INTO `carts` (`id`,`user_id`,`product_id`,`quantity`,`created_at`,`updated_at`) VALUES
(1,2,1,1,'2026-05-10 10:05:00','2026-05-10 10:05:00'),
(2,2,20,2,'2026-05-10 10:07:00','2026-05-10 10:07:00'),
(3,3,12,1,'2026-05-11 09:00:00','2026-05-11 09:00:00'),
(4,3,21,2,'2026-05-11 09:03:00','2026-05-11 09:03:00'),
(5,4,5,1,'2026-05-11 10:20:00','2026-05-11 10:20:00'),
(6,5,35,1,'2026-05-11 11:10:00','2026-05-11 11:10:00'),
(7,6,16,1,'2026-05-11 12:25:00','2026-05-11 12:25:00'),
(8,7,27,1,'2026-05-11 12:50:00','2026-05-11 12:50:00'),
(9,8,38,2,'2026-05-11 13:15:00','2026-05-11 13:15:00'),
(10,9,43,1,'2026-05-11 13:45:00','2026-05-11 13:45:00'),
(11,10,3,1,'2026-05-11 14:10:00','2026-05-11 14:10:00'),
(12,11,18,1,'2026-05-11 14:30:00','2026-05-11 14:30:00'),
(13,12,26,1,'2026-05-11 14:55:00','2026-05-11 14:55:00'),
(14,13,32,1,'2026-05-11 15:10:00','2026-05-11 15:10:00'),
(15,14,41,1,'2026-05-11 15:20:00','2026-05-11 15:20:00'),
(16,15,8,2,'2026-05-11 15:45:00','2026-05-11 15:45:00'),
(17,16,50,1,'2026-05-11 16:00:00','2026-05-11 16:00:00'),
(18,17,23,2,'2026-05-11 16:25:00','2026-05-11 16:25:00'),
(19,18,28,1,'2026-05-11 16:45:00','2026-05-11 16:45:00'),
(20,19,34,1,'2026-05-11 17:00:00','2026-05-11 17:00:00');

INSERT INTO `orders` (`id`,`user_id`,`name`,`email`,`phone`,`address`,`total`,`status`,`created_at`,`updated_at`) VALUES
(1,2,'Aarav Patel','aarav.patel@example.com','+91-98765-43210','507 Sunrise Apartments, Bandra East, Mumbai','415798','Pending','2026-05-10 10:45:00','2026-05-10 10:45:00'),
(2,3,'Nina Shah','nina.shah@example.com','+91-91234-56789','14 Coral Heights, Andheri West, Mumbai','179889','Delivered','2026-05-11 09:30:00','2026-05-11 09:30:00'),
(3,4,'Riya Desai','riya.desai@example.com','+91-99876-54321','88 Palm Street, MG Road, Pune','29999','Delivered','2026-05-11 10:45:00','2026-05-11 10:45:00'),
(4,5,'Kunal Mehta','kunal.mehta@example.com','+91-90123-45678','22 Lotus Apartments, Salt Lake, Kolkata','43999','Pending','2026-05-11 11:20:00','2026-05-11 11:20:00'),
(5,6,'Simran Kaur','simran.kaur@example.com','+91-98765-12345','49 Tulip Towers, Radio Metro, Delhi','99900','Pending','2026-05-11 12:45:00','2026-05-11 12:45:00'),
(6,7,'Ayaan Sharma','ayaan.sharma@example.com','+91-87654-32109','19 Orchid Residency, Juhu, Mumbai','41900','Delivered','2026-05-11 13:20:00','2026-05-11 13:20:00'),
(7,8,'Anika Joshi','anika.joshi@example.com','+91-76543-21098','70 Jasmine Complex, Koramangala, Bangalore','54999','Pending','2026-05-11 14:05:00','2026-05-11 14:05:00'),
(8,9,'Dev Shah','dev.shah@example.com','+91-65432-10987','5 Sunrise Avenue, Paldi, Ahmedabad','58995','Delivered','2026-05-11 14:40:00','2026-05-11 14:40:00'),
(9,10,'Priya Singh','priya.singh@example.com','+91-54321-09876','33 Brindavan Society, Noida','78990','Pending','2026-05-11 15:10:00','2026-05-11 15:10:00'),
(10,11,'Sameer Khan','sameer.khan@example.com','+91-43210-98765','12 Amber Lane, Gurugram','119994','Delivered','2026-05-11 15:55:00','2026-05-11 15:55:00'),
(11,12,'Meera Gupta','meera.gupta@example.com','+91-32109-87654','29 Lotus Street, Jalandhar','29999','Pending','2026-05-11 16:35:00','2026-05-11 16:35:00'),
(12,13,'Arjun Verma','arjun.verma@example.com','+91-21098-76543','66 Pearl Residency, Chandigarh','99900','Pending','2026-05-11 17:05:00','2026-05-11 17:05:00'),
(13,14,'Isha Nair','isha.nair@example.com','+91-10987-65432','11 Maple Grove, Kochi','25998','Delivered','2026-05-11 17:25:00','2026-05-11 17:25:00'),
(14,15,'Vikram Rao','vikram.rao@example.com','+91-98765-21098','2 Azure Apartments, Hyderabad','124998','Pending','2026-05-11 17:50:00','2026-05-11 17:50:00'),
(15,16,'Sana Kapoor','sana.kapoor@example.com','+91-87654-10987','44 Coral Cove, Bhopal','19998','Delivered','2026-05-11 18:10:00','2026-05-11 18:10:00');

INSERT INTO `reviews` (`id`,`user_id`,`product_id`,`rating`,`review`,`created_at`,`updated_at`) VALUES
(1,2,1,5,'The iPhone 16 Pro camera is outstanding and the display is incredibly smooth.','2026-05-10 12:00:00','2026-05-10 12:00:00'),
(2,3,2,4,'Great premium phone with a fantastic screen but battery could be better.','2026-05-11 09:35:00','2026-05-11 09:35:00'),
(3,4,3,5,'OnePlus 12 is fast, the charging is insane, and the software is fluid.','2026-05-11 10:50:00','2026-05-11 10:50:00'),
(4,5,12,4,'Perfect laptop for both work and light gaming, the OLED panel is crisp.','2026-05-11 11:30:00','2026-05-11 11:30:00'),
(5,6,20,5,'These earbuds are super comfortable and the ANC works very well.','2026-05-11 12:35:00','2026-05-11 12:35:00'),
(6,7,26,5,'Apple Watch Series 9 feels premium and the fitness tracking is excellent.','2026-05-11 13:05:00','2026-05-11 13:05:00'),
(7,8,35,4,'Anker charger is compact and charges my laptop quickly.','2026-05-11 13:35:00','2026-05-11 13:35:00'),
(8,9,43,5,'My phone is well protected and the case looks premium.','2026-05-11 13:50:00','2026-05-11 13:50:00'),
(9,10,27,5,'Galaxy Watch 6 battery lasts all day and the health metrics are really accurate.','2026-05-11 14:20:00','2026-05-11 14:20:00'),
(10,11,16,5,'The iPad Pro M4 feels incredibly fast for drawing and streaming.','2026-05-11 14:40:00','2026-05-11 14:40:00'),
(11,12,18,4,'Fire HD is fantastic value, the screen is sharp enough for media consumption.','2026-05-11 14:55:00','2026-05-11 14:55:00'),
(12,13,31,5,'The Razer mouse is responsive and feels perfect for gaming.','2026-05-11 15:25:00','2026-05-11 15:25:00'),
(13,14,48,4,'Sony headphones are comfy and the sound quality is very good.','2026-05-11 15:45:00','2026-05-11 15:45:00'),
(14,15,39,5,'The Anker power bank charges my devices all day and is easy to carry.','2026-05-11 16:15:00','2026-05-11 16:15:00'),
(15,16,50,4,'Soundcore earbuds are great for everyday use and the bass is solid.','2026-05-11 16:35:00','2026-05-11 16:35:00'),
(16,17,4,5,'Pixel camera quality is amazing and the software is really polished.','2026-05-11 16:55:00','2026-05-11 16:55:00'),
(17,18,11,5,'MacBook Pro M4 feels like a productivity beast and the battery lasts all day.','2026-05-11 17:15:00','2026-05-11 17:15:00'),
(18,19,14,5,'Legion is a fantastic gaming laptop with an excellent keyboard.','2026-05-11 17:35:00','2026-05-11 17:35:00'),
(19,20,45,4,'ESR protector is crystal clear and fits my screen perfectly.','2026-05-11 17:55:00','2026-05-11 17:55:00'),
(20,2,17,4,'Galaxy Tab has a beautiful display and the S Pen makes notes easy.','2026-05-11 18:15:00','2026-05-11 18:15:00');

INSERT INTO `wishlists` (`id`,`user_id`,`product_id`,`created_at`,`updated_at`) VALUES
(1,2,11,'2026-05-10 10:20:00','2026-05-10 10:20:00'),
(2,3,8,'2026-05-11 09:10:00','2026-05-11 09:10:00'),
(3,4,22,'2026-05-11 10:25:00','2026-05-11 10:25:00'),
(4,5,33,'2026-05-11 11:15:00','2026-05-11 11:15:00'),
(5,6,27,'2026-05-11 12:30:00','2026-05-11 12:30:00'),
(6,7,39,'2026-05-11 12:55:00','2026-05-11 12:55:00'),
(7,8,45,'2026-05-11 13:40:00','2026-05-11 13:40:00'),
(8,9,50,'2026-05-11 14:00:00','2026-05-11 14:00:00'),
(9,10,5,'2026-05-11 14:45:00','2026-05-11 14:45:00'),
(10,11,20,'2026-05-11 15:10:00','2026-05-11 15:10:00'),
(11,12,2,'2026-05-11 15:35:00','2026-05-11 15:35:00'),
(12,13,29,'2026-05-11 15:55:00','2026-05-11 15:55:00'),
(13,14,37,'2026-05-11 16:25:00','2026-05-11 16:25:00'),
(14,15,44,'2026-05-11 16:45:00','2026-05-11 16:45:00'),
(15,16,49,'2026-05-11 17:05:00','2026-05-11 17:05:00');

SET FOREIGN_KEY_CHECKS = 1;
