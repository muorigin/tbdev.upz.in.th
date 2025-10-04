<?php

$TABLE[] = "CREATE TABLE `attachmentdownloads`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสดาวน์โหลดไฟล์แนบ (Primary Key)',
  `fileid` int(10) NOT NULL DEFAULT 0 COMMENT 'รหัสไฟล์ที่อ้างอิง',
  `username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ชื่อผู้ใช้ที่ดาวน์โหลด',
  `userid` int(10) NOT NULL DEFAULT 0 COMMENT 'รหัสผู้ใช้ที่ดาวน์โหลด',
  `date` int(11) NOT NULL DEFAULT 0 COMMENT 'วันที่ดาวน์โหลด (Timestamp)',
  `downloads` int(10) UNSIGNED NOT NULL COMMENT 'จำนวนครั้งที่ดาวน์โหลด',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fileid_userid`(`fileid`, `userid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางบันทึกประวัติการดาวน์โหลดไฟล์แนบ' ROW_FORMAT = Dynamic;";


$TABLE[] = "CREATE TABLE `attachments`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสไฟล์แนบ (Primary Key)',
  `topicid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสหัวข้อที่เกี่ยวข้อง',
  `postid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสโพสต์ที่เกี่ยวข้อง',
  `filename` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ชื่อไฟล์',
  `size` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'ขนาดไฟล์ (bytes)',
  `owner` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสเจ้าของไฟล์',
  `downloads` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนการดาวน์โหลดทั้งหมด',
  `added` int(11) NOT NULL DEFAULT 0 COMMENT 'วันที่เพิ่มไฟล์ (Timestamp)',
  `type` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ประเภทไฟล์',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `topicid`(`topicid`) USING BTREE,
  INDEX `postid`(`postid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางเก็บข้อมูลไฟล์แนบในฟอรัม' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `avps`  (
  `arg` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ชื่อตัวแปร',
  `value_s` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ค่าตัวแปร (String)',
  `value_i` int(11) NOT NULL DEFAULT 0 COMMENT 'ค่าตัวแปร (Integer)',
  `value_u` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'ค่าตัวแปร (Unsigned Integer)',
  PRIMARY KEY (`arg`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางตัวแปรและค่าต่างๆ ของระบบ (Attribute-Value Pairs)' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `bans`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสการแบน (Primary Key)',
  `added` int(11) NOT NULL COMMENT 'วันที่แบน (Timestamp)',
  `addedby` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสผู้แบน',
  `comment` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'เหตุผลการแบน',
  `first` int(11) NULL DEFAULT NULL COMMENT 'ไอพีเริ่มต้น (รูปแบบตัวเลข)',
  `last` int(11) NULL DEFAULT NULL COMMENT 'ไอพีสิ้นสุด (รูปแบบตัวเลข)',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `first_last`(`first`, `last`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางบันทึกการแบนไอพี' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `blocks`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสการบล็อก (Primary Key)',
  `userid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสผู้ใช้ที่บล็อก',
  `blockid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสผู้ใช้ที่ถูกบล็อก',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `userfriend`(`userid`, `blockid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางบันทึกการบล็อกผู้ใช้' ROW_FORMAT = Fixed;";

$TABLE[] = "CREATE TABLE `categories`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสหมวดหมู่ (Primary Key)',
  `name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ชื่อหมวดหมู่',
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'รูปภาพหมวดหมู่',
  `cat_desc` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'ไม่มีคำอธิบาย' COMMENT 'คำอธิบายหมวดหมู่',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางหมวดหมู่ทอร์เรนต์' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `cleanup`  (
  `clean_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสงานทำความสะอาด (Primary Key)',
  `clean_title` char(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ชื่องาน',
  `clean_file` char(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ไฟล์ที่ใช้ทำงาน',
  `clean_time` int(11) NOT NULL DEFAULT 0 COMMENT 'เวลาที่ทำงานล่าสุด (Timestamp)',
  `clean_increment` int(11) NOT NULL DEFAULT 0 COMMENT 'ช่วงเวลาการทำงาน (วินาที)',
  `clean_cron_key` char(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'รหัสลับสำหรับ Cron',
  `clean_log` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'บันทึกการทำงานหรือไม่',
  `clean_desc` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'คำอธิบายงาน',
  `clean_on` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'เปิดใช้งานงานหรือไม่',
  PRIMARY KEY (`clean_id`) USING BTREE,
  INDEX `clean_time`(`clean_time`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางกำหนดการงานทำความสะอาดระบบ' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `cleanup_log`  (
  `clog_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสบันทึก (Primary Key)',
  `clog_event` char(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ชื่อเหตุการณ์',
  `clog_time` int(11) NOT NULL DEFAULT 0 COMMENT 'เวลาที่เกิดเหตุการณ์ (Timestamp)',
  `clog_ip` char(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '0' COMMENT 'ไอพีที่เกิดเหตุการณ์',
  `clog_desc` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'รายละเอียดเหตุการณ์',
  PRIMARY KEY (`clog_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางบันทึกการทำงานของ Cleanup' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `comments`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสความคิดเห็น (Primary Key)',
  `user` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสผู้ใช้ที่แสดงความคิดเห็น',
  `torrent` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสทอร์เรนต์ที่เกี่ยวข้อง',
  `added` int(11) NOT NULL COMMENT 'วันที่แสดงความคิดเห็น (Timestamp)',
  `text` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ข้อความความคิดเห็น (ที่ถูกแปลงแล้ว)',
  `ori_text` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ข้อความความคิดเห็นต้นฉบับ',
  `editedby` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสผู้ใช้ที่แก้ไข',
  `editedat` int(11) NOT NULL COMMENT 'วันที่แก้ไข (Timestamp)',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user`(`user`) USING BTREE,
  INDEX `torrent`(`torrent`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางความคิดเห็นในทอร์เรนต์' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `countries`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเทศ (Primary Key)',
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL COMMENT 'ชื่อประเทศ',
  `flagpic` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL COMMENT 'ไฟล์ภาพธงชาติ',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 78 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางข้อมูลประเทศ' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `files`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสไฟล์ (Primary Key)',
  `torrent` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสทอร์เรนต์ที่เกี่ยวข้อง',
  `filename` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ชื่อไฟล์',
  `size` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'ขนาดไฟล์ (bytes)',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `torrent`(`torrent`) USING BTREE,
  FULLTEXT INDEX `filename`(`filename`)
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางรายการไฟล์ในทอร์เรนต์' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `forum_mods`  (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ดูแลฟอรัม (Primary Key)',
  `uid` int(10) NOT NULL DEFAULT 0 COMMENT 'รหัสผู้ใช้',
  `fid` int(10) NOT NULL DEFAULT 0 COMMENT 'รหัสฟอรัม',
  `user` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ชื่อผู้ใช้',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `uid`(`uid`, `fid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางผู้ดูแลฟอรัม' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `forum_parents`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสกลุ่มฟอรัม (Primary Key)',
  `name` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ชื่อกลุ่มฟอรัม',
  `description` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL COMMENT 'คำอธิบายกลุ่มฟอรัม',
  `minclassview` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'ระดับขั้นต่ำสำหรับการมองเห็น',
  `forid` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'รหัสฟอรัมหลัก',
  `sort` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'ลำดับการแสดงผล',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางกลุ่มฟอรัมหลัก' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `forum_poll_answers`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสคำตอบโพล (Primary Key)',
  `pollid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสโพล',
  `userid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสผู้ใช้ที่ตอบ',
  `selection` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'ตัวเลือกที่เลือก',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pollid`(`pollid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางคำตอบโพลในฟอรัม' ROW_FORMAT = Fixed;";

$TABLE[] = "CREATE TABLE `forum_polls`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสโพล (Primary Key)',
  `added` int(11) NOT NULL DEFAULT 0 COMMENT 'วันที่สร้างโพล (Timestamp)',
  `question` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'คำถามโพล',
  `option0` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 0',
  `option1` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 1',
  `option2` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 2',
  `option3` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 3',
  `option4` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 4',
  `option5` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 5',
  `option6` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 6',
  `option7` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 7',
  `option8` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 8',
  `option9` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 9',
  `option10` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 10',
  `option11` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 11',
  `option12` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 12',
  `option13` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 13',
  `option14` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 14',
  `option15` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 15',
  `option16` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 16',
  `option17` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 17',
  `option18` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 18',
  `option19` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ตัวเลือกที่ 19',
  `sort` enum('yes','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'เรียงลำดับหรือไม่',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางโพลในฟอรัม' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `forum_subs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสการติดตาม (Primary Key)',
  `userid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสผู้ใช้',
  `topicid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสหัวข้อที่ติดตาม',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางการติดตามหัวข้อฟอรัม' ROW_FORMAT = Fixed;";

$TABLE[] = "CREATE TABLE `forums`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสฟอรัม (Primary Key)',
  `name` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ชื่อฟอรัม',
  `description` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL COMMENT 'คำอธิบายฟอรัม',
  `sort` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'ลำดับการแสดงผล',
  `forid` tinyint(4) NULL DEFAULT 0 COMMENT 'รหัสฟอรัมหลัก',
  `postcount` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนโพสต์ทั้งหมด',
  `topiccount` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนหัวข้อทั้งหมด',
  `minclassread` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'ระดับขั้นต่ำสำหรับการอ่าน',
  `minclasswrite` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'ระดับขั้นต่ำสำหรับการเขียน',
  `minclasscreate` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'ระดับขั้นต่ำสำหรับการสร้างหัวข้อ',
  `place` int(10) NOT NULL DEFAULT -1 COMMENT 'ตำแหน่งในการแสดงผล',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางฟอรัม' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `friends`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสเพื่อน (Primary Key)',
  `userid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสผู้ใช้',
  `friendid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสเพื่อน',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `userfriend`(`userid`, `friendid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางรายการเพื่อน' ROW_FORMAT = Fixed;";

$TABLE[] = "CREATE TABLE `messages`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสข้อความ (Primary Key)',
  `sender` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสผู้ส่ง',
  `receiver` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสผู้รับ',
  `added` int(11) NOT NULL COMMENT 'วันที่ส่ง (Timestamp)',
  `subject` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ไม่มีหัวเรื่อง' COMMENT 'หัวเรื่องข้อความ',
  `msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'เนื้อหาข้อความ',
  `unread` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'ยังไม่ได้อ่านหรือไม่',
  `poster` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสผู้โพสต์',
  `location` smallint(6) NOT NULL DEFAULT 1 COMMENT 'ตำแหน่งในกล่องข้อความ',
  `saved` enum('no','yes') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'บันทึกไว้หรือไม่',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `receiver`(`receiver`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางข้อความส่วนตัว' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `news`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสข่าว (Primary Key)',
  `userid` int(11) NOT NULL DEFAULT 0 COMMENT 'รหัสผู้เขียนข่าว',
  `added` int(11) NOT NULL COMMENT 'วันที่เขียนข่าว (Timestamp)',
  `body` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'เนื้อหาข่าว',
  `headline` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'ข่าว TBDEV.NET' COMMENT 'หัวข้อข่าว',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `added`(`added`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางข่าวประชาสัมพันธ์' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `peers`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัส peer (Primary Key)',
  `torrent` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสทอร์เรนต์',
  `info_hash` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ค่า info_hash ของทอร์เรนต์',
  `passkey` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'รหัสผ่านสำหรับติดตาม',
  `peer_id` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL COMMENT 'รหัส peer',
  `compact` varchar(6) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL COMMENT 'ข้อมูลแบบ compact',
  `ip` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ไอพีแอดเดรส',
  `port` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'พอร์ต',
  `uploaded` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนที่อัพโหลดแล้ว (bytes)',
  `downloaded` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนที่ดาวน์โหลดแล้ว (bytes)',
  `to_go` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนที่เหลือในการดาวน์โหลด (bytes)',
  `seeder` enum('yes','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'เป็นผู้แจกจ่ายหรือไม่',
  `started` int(11) NOT NULL COMMENT 'เวลาเริ่มต้น (Timestamp)',
  `last_action` int(11) NOT NULL COMMENT 'เวลาล่าสุดที่มีการกระทำ (Timestamp)',
  `connectable` enum('yes','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'สามารถเชื่อมต่อได้หรือไม่',
  `userid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสผู้ใช้',
  `agent` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ชื่อไคลเอนต์',
  `finishedat` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'เวลาที่ดาวน์โหลดเสร็จ (Timestamp)',
  `downloadoffset` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'ค่าชดเชยการดาวน์โหลด',
  `uploadoffset` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'ค่าชดเชยการอัพโหลด',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `torrent_peer_id`(`torrent`, `peer_id`) USING BTREE,
  INDEX `torrent`(`torrent`) USING BTREE,
  INDEX `torrent_seeder`(`torrent`, `seeder`) USING BTREE,
  INDEX `last_action`(`last_action`) USING BTREE,
  INDEX `connectable`(`connectable`) USING BTREE,
  INDEX `userid`(`userid`) USING BTREE,
  INDEX `passkey`(`passkey`) USING BTREE,
  INDEX `torrent_connect`(`torrent`, `connectable`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางเก็บข้อมูล peer ของทอร์เรนต์' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `pmboxes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสกล่องข้อความ (Primary Key)',
  `userid` int(11) NOT NULL COMMENT 'รหัสผู้ใช้',
  `boxnumber` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'หมายเลขกล่อง',
  `name` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ชื่อกล่องข้อความ',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางกล่องข้อความส่วนตัว' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `posts`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสโพสต์ (Primary Key)',
  `topicid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสหัวข้อ',
  `userid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสผู้ใช้',
  `added` int(11) NULL DEFAULT 0 COMMENT 'วันที่โพสต์ (Timestamp)',
  `body` mediumtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL COMMENT 'เนื้อหาโพสต์',
  `parsed_body` mediumtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL COMMENT 'เนื้อหาโพสต์ที่ถูกแปลงแล้ว',
  `editedby` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสผู้ใช้ที่แก้ไข',
  `editedat` int(11) NULL DEFAULT 0 COMMENT 'วันที่แก้ไข (Timestamp)',
  `post_history` mediumtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ประวัติการแก้ไขโพสต์',
  `posticon` int(2) NOT NULL DEFAULT 0 COMMENT 'รหัสไอคอนโพสต์',
  `anonymous` enum('yes','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'โพสต์แบบไม่ระบุชื่อหรือไม่',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `topicid`(`topicid`) USING BTREE,
  INDEX `userid`(`userid`) USING BTREE,
  FULLTEXT INDEX `body`(`body`)
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางโพสต์ในฟอรัม' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `readposts`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสบันทึกการอ่าน (Primary Key)',
  `userid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสผู้ใช้',
  `topicid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสหัวข้อ',
  `lastpostread` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสโพสต์ล่าสุดที่อ่าน',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `topicid`(`topicid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางบันทึกการอ่านโพสต์' ROW_FORMAT = Fixed;";

$TABLE[] = "CREATE TABLE `reputation`  (
  `reputationid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสคะแนนชื่อเสียง (Primary Key)',
  `reputation` int(10) NOT NULL DEFAULT 0 COMMENT 'คะแนนชื่อเสียง',
  `whoadded` int(10) NOT NULL DEFAULT 0 COMMENT 'รหัสผู้ให้คะแนน',
  `reason` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL COMMENT 'เหตุผล',
  `dateadd` int(10) NOT NULL DEFAULT 0 COMMENT 'วันที่ให้คะแนน (Timestamp)',
  `postid` int(10) NOT NULL DEFAULT 0 COMMENT 'รหัสโพสต์ที่เกี่ยวข้อง',
  `userid` mediumint(8) NOT NULL DEFAULT 0 COMMENT 'รหัสผู้ใช้ที่ได้รับคะแนน',
  PRIMARY KEY (`reputationid`) USING BTREE,
  INDEX `userid`(`userid`) USING BTREE,
  INDEX `whoadded`(`whoadded`) USING BTREE,
  INDEX `multi`(`postid`, `userid`) USING BTREE,
  INDEX `dateadd`(`dateadd`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางคะแนนชื่อเสียงผู้ใช้' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `reputationlevel`  (
  `reputationlevelid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสระดับชื่อเสียง (Primary Key)',
  `minimumreputation` int(10) NOT NULL DEFAULT 0 COMMENT 'คะแนนขั้นต่ำ',
  `level` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL COMMENT 'ชื่อระดับ',
  PRIMARY KEY (`reputationlevelid`) USING BTREE,
  INDEX `reputationlevel`(`minimumreputation`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางระดับคะแนนชื่อเสียง' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `rules`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสกฎ (Primary Key)',
  `cid` int(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสหมวดหมู่กฎ',
  `heading` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'หัวข้อกฎ',
  `body` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'เนื้อหากฎ',
  `ctime` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'เวลาที่สร้าง (Timestamp)',
  `mtime` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'เวลาที่แก้ไขล่าสุด (Timestamp)',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `cat_id`(`cid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางกฎของระบบ' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `rules_categories`  (
  `cid` int(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสหมวดหมู่กฎ (Primary Key)',
  `rcat_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'ชื่อหมวดหมู่กฎ',
  `min_class_read` int(2) NOT NULL DEFAULT 0 COMMENT 'ระดับขั้นต่ำสำหรับการอ่าน',
  PRIMARY KEY (`cid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางหมวดหมู่กฎ' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `searchcloud`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสคำค้นหา (Primary Key)',
  `searchedfor` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'คำที่ค้นหา',
  `howmuch` int(10) NOT NULL COMMENT 'จำนวนครั้งที่ค้นหา',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `searchedfor`(`searchedfor`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางสถิติคำค้นหา' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `sitelog`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสบันทึกระบบ (Primary Key)',
  `added` int(11) NOT NULL COMMENT 'วันที่บันทึก (Timestamp)',
  `txt` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL COMMENT 'ข้อความบันทึก',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `added`(`added`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางบันทึกกิจกรรมระบบ' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `stylesheets`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสสไตล์ชีต (Primary Key)',
  `uri` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ที่อยู่ไฟล์สไตล์ชีต',
  `name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ชื่อสไตล์ชีต',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางสไตล์ชีตของเว็บไซต์' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `subscriptions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสการสมัครสมาชิก (Primary Key)',
  `userid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสผู้ใช้',
  `topicid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสหัวข้อ',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางการสมัครติดตามหัวข้อ' ROW_FORMAT = Fixed;";

$TABLE[] = "CREATE TABLE `topics`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสหัวข้อ (Primary Key)',
  `userid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสผู้สร้างหัวข้อ',
  `subject` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL COMMENT 'ชื่อหัวข้อ',
  `locked` enum('yes','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'ล็อกหัวข้อหรือไม่',
  `forumid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสฟอรัม',
  `lastpost` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'โพสต์ล่าสุด (Timestamp)',
  `sticky` enum('yes','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'ปักหมุดหัวข้อหรือไม่',
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนการดู',
  `pollid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสโพล',
  `anonymous` enum('yes','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'สร้างแบบไม่ระบุชื่อหรือไม่',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `userid`(`userid`) USING BTREE,
  INDEX `subject`(`subject`) USING BTREE,
  INDEX `lastpost`(`lastpost`) USING BTREE,
  INDEX `locked_sticky`(`locked`, `sticky`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางหัวข้อในฟอรัม' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `torrents`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสทอร์เรนต์ (Primary Key)',
  `info_hash` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ค่า info_hash',
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ชื่อทอร์เรนต์',
  `filename` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ชื่อไฟล์ทอร์เรนต์',
  `save_as` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ชื่อโฟลเดอร์ที่จะบันทึก',
  `search_text` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ข้อความสำหรับการค้นหา',
  `descr` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'คำอธิบาย (ที่ถูกแปลงแล้ว)',
  `ori_descr` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'คำอธิบายต้นฉบับ',
  `category` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสหมวดหมู่',
  `size` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'ขนาดทั้งหมด (bytes)',
  `added` int(11) NOT NULL COMMENT 'วันที่เพิ่ม (Timestamp)',
  `type` enum('single','multi') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'single' COMMENT 'ประเภททอร์เรนต์',
  `numfiles` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนไฟล์',
  `comments` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนความคิดเห็น',
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนการดู',
  `hits` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนการคลิก',
  `times_completed` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนครั้งที่ดาวน์โหลดเสร็จ',
  `leechers` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนผู้ดาวน์โหลด',
  `seeders` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนผู้แจกจ่าย',
  `last_action` int(11) NOT NULL COMMENT 'การกระทำล่าสุด (Timestamp)',
  `visible` enum('yes','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'แสดงผลหรือไม่',
  `banned` enum('yes','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'ถูกแบนหรือไม่',
  `owner` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสเจ้าของ',
  `numratings` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนผู้ให้คะแนน',
  `ratingsum` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'ผลรวมคะแนน',
  `nfo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ข้อมูล NFO',
  `client_created_by` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'ไม่ทราบ' COMMENT 'ไคลเอนต์ที่สร้างทอร์เรนต์',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `info_hash`(`info_hash`) USING BTREE,
  INDEX `owner`(`owner`) USING BTREE,
  INDEX `visible`(`visible`) USING BTREE,
  INDEX `category_visible`(`category`, `visible`) USING BTREE,
  FULLTEXT INDEX `ft_search`(`search_text`, `ori_descr`)
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางทอร์เรนต์' ROW_FORMAT = Dynamic;";

$TABLE[] = "CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้ (Primary Key)',
  `username` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ชื่อผู้ใช้',
  `passhash` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'รหัสผ่านที่เข้ารหัสแล้ว',
  `secret` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'รหัสลับ',
  `passkey` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '' COMMENT 'รหัสสำหรับติดตามทอร์เรนต์',
  `email` varchar(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'อีเมล',
  `status` enum('pending','confirmed') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'สถานะบัญชี',
  `added` int(11) NOT NULL COMMENT 'วันที่สมัคร (Timestamp)',
  `last_login` int(11) NOT NULL DEFAULT 0 COMMENT 'ล็อกอินล่าสุด (Timestamp)',
  `last_access` int(11) NOT NULL DEFAULT 0 COMMENT 'เข้าถึงล่าสุด (Timestamp)',
  `forum_access` int(11) NOT NULL DEFAULT 0 COMMENT 'เข้าถึงฟอรัมล่าสุด (Timestamp)',
  `editsecret` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'รหัสลับสำหรับแก้ไข',
  `privacy` enum('strong','normal','low') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'normal' COMMENT 'ระดับความเป็นส่วนตัว',
  `stylesheet` int(10) NULL DEFAULT 1 COMMENT 'รหัสสไตล์ชีต',
  `info` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL COMMENT 'ข้อมูลส่วนตัว',
  `signature` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL COMMENT 'ลายเซ็น',
  `signatures` enum('yes','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'แสดงลายเซ็นหรือไม่',
  `acceptpms` enum('yes','friends','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'รับข้อความส่วนตัวจาก',
  `ip` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ไอพีล่าสุด',
  `class` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'ระดับผู้ใช้',
  `language` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'en' COMMENT 'ภาษา',
  `avatar` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'รูปประจำตัว',
  `av_w` smallint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'ความกว้างรูปประจำตัว',
  `av_h` smallint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'ความสูงรูปประจำตัว',
  `uploaded` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนที่อัพโหลดทั้งหมด (bytes)',
  `downloaded` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนที่ดาวน์โหลดทั้งหมด (bytes)',
  `title` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'คำนำหน้า',
  `country` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'รหัสประเทศ',
  `notifs` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'การแจ้งเตือน',
  `modcomment` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ความคิดเห็นจากผู้ดูแล',
  `enabled` enum('yes','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'เปิดใช้งานบัญชีหรือไม่',
  `avatars` enum('yes','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'แสดงรูปประจำตัวหรือไม่',
  `donor` enum('yes','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'เป็นผู้บริจาคหรือไม่',
  `donoruntil` int(11) NOT NULL DEFAULT 0 COMMENT 'วันที่หมดอายุสถานะผู้บริจาค (Timestamp)',
  `warned` enum('yes','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'ถูกเตือนหรือไม่',
  `warneduntil` int(11) NOT NULL DEFAULT 0 COMMENT 'วันที่หมดอายุการเตือน (Timestamp)',
  `torrentsperpage` int(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนทอร์เรนต์ต่อหน้า',
  `topicsperpage` int(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนหัวข้อต่อหน้า',
  `postsperpage` int(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'จำนวนโพสต์ต่อหน้า',
  `deletepms` enum('yes','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'ลบข้อความส่วนตัวเมื่อตอบหรือไม่',
  `savepms` enum('yes','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'บันทึกข้อความส่วนตัวที่ส่งหรือไม่',
  `reputation` int(10) NOT NULL DEFAULT 10 COMMENT 'คะแนนชื่อเสียง',
  `time_offset` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '0' COMMENT 'การชดเชยเวลา',
  `dst_in_use` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'ใช้เวลาออมแสงหรือไม่',
  `auto_correct_dst` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'แก้ไขเวลาออมแสงอัตโนมัติหรือไม่',
  `forum_mod` enum('yes','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT 'no' COMMENT 'เป็นผู้ดูแลฟอรัมหรือไม่',
  `forums_mod` varchar(320) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '' COMMENT 'ฟอรัมที่ดูแล',
  `subscription_pm` enum('yes','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT 'no' COMMENT 'แจ้งเตือนการสมัครสมาชิกผ่าน PM หรือไม่',
  `mood` int(10) NOT NULL DEFAULT 1 COMMENT 'อารมณ์',
  `anonymous` enum('yes','no') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'ไม่แสดงชื่อหรือไม่',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE,
  INDEX `ip`(`ip`) USING BTREE,
  INDEX `uploaded`(`uploaded`) USING BTREE,
  INDEX `downloaded`(`downloaded`) USING BTREE,
  INDEX `country`(`country`) USING BTREE,
  INDEX `last_access`(`last_access`) USING BTREE,
  INDEX `enabled`(`enabled`) USING BTREE,
  INDEX `warned`(`warned`) USING BTREE,
  INDEX `pkey`(`passkey`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'ตารางผู้ใช้' ROW_FORMAT = Dynamic;";

?>