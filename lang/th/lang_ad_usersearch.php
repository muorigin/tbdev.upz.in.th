<?php
$lang = array(
#ers
'usersearch_error' => 'ข้อผิดพลาด',
'usersearch_warn' => 'คำเตือน',
'usersearch_bademail' => 'อีเมลไม่ถูกต้อง',
'usersearch_badip' => 'IP ไม่ถูกต้อง',
'usersearch_badmask' => 'ซับเน็ตมาสก์ไม่ถูกต้อง',
'usersearch_badratio' => 'อัตราส่วนไม่ถูกต้อง',
'usersearch_badratio2' => 'จำเป็นต้องมีอัตราส่วนสองตัวสำหรับการค้นหาประเภทนี้',
'usersearch_badratio3' => 'อัตราส่วนตัวที่สองไม่ถูกต้อง',
'usersearch_badup' => 'จำนวนการอัปโหลดไม่ถูกต้อง',
'usersearch_badup2' => 'จำเป็นต้องมีจำนวนการอัปโหลดสองตัวสำหรับการค้นหาประเภทนี้',
'usersearch_badup3' => 'จำนวนการอัปโหลดตัวที่สองไม่ถูกต้อง',
'usersearch_baddl' => 'จำนวนการดาวน์โหลดไม่ถูกต้อง',
'usersearch_baddl2' => 'จำเป็นต้องมีจำนวนการดาวน์โหลดสองตัวสำหรับการค้นหาประเภทนี้',
'usersearch_baddl3' => 'จำนวนการดาวน์โหลดตัวที่สองไม่ถูกต้อง',
'usersearch_baddate' => 'วันที่ไม่ถูกต้อง',
'usersearch_baddate2' => 'จำเป็นต้องมีวันที่สองตัวสำหรับการค้นหาประเภทนี้',
'usersearch_nouser' => 'ไม่พบผู้ใช้',

#temp thingy
'usersearch_count' => 'จำนวนการค้นหา',
'usersearch_query' => 'คำค้นหา',
'usersearch_url' => 'พารามิเตอร์ URL ที่ใช้จริง',

#main table
'usersearch_window_title'=>'การค้นหาผู้ใช้สำหรับผู้ดูแลระบบ',
'usersearch_title'=>'การค้นหาผู้ใช้สำหรับผู้ดูแลระบบ',
'usersearch_inlink'=>'คำแนะนำ',
'usersearch_reset'=>'รีเซ็ต',
'usersearch_name'=>'ชื่อ',
'usersearch_ratio'=>'อัตราส่วน',
'usersearch_status'=>'สถานะสมาชิก',
'usersearch_email'=>'อีเมล',
'usersearch_ip'=>'IP',
'usersearch_acstatus'=>'สถานะบัญชี',
'usersearch_comments'=>'ความคิดเห็น',
'usersearch_mask'=>'มาสก์',
'usersearch_class'=>'คลาส',
'usersearch_joined'=>'เข้าร่วมเมื่อ',
'usersearch_uploaded'=>'อัปโหลดแล้ว',
'usersearch_donor'=>'ผู้บริจาค',
'usersearch_lastseen'=>'เห็นครั้งสุดท้าย',
'usersearch_downloaded'=>'ดาวน์โหลดแล้ว',
'usersearch_warned'=>'ถูกเตือน',
'usersearch_active'=>'เฉพาะที่ใช้งานอยู่',
'usersearch_banned'=>'IP ที่ถูกปิดใช้งาน',

#second table
'usersearch_enabled' => 'เปิดใช้งาน',
'usersearch_asts' => 'สถานะ',
'usersearch_history' => 'ประวัติ',
'usersearch_pR' => 'pR',
'usersearch_pUL' => 'pUL (MB)',
'usersearch_pDL' => 'pDL (MB)',

#instructions 
'usersearch_instructions' =>"<table border='0' align='center'><tr><td class='embedded' bgcolor='#F5F4EA'><div align='left'>\n
	ฟิลด์ที่เว้นว่างไว้จะถูกเพิกเฉย;\n
	ไวลด์การ์ด * และ ? สามารถใช้ใน ชื่อ, อีเมล และ ความคิดเห็น, รวมถึงค่าหลายค่า\n
	คั่นด้วยช่องว่าง (เช่น 'wyz Max*' ในชื่อจะแสดงทั้งผู้ใช้ชื่อ\n
	'wyz' และผู้ใช้ชื่อขึ้นต้นด้วย 'Max'. ในทำนองเดียวกัน '~' สามารถใช้สำหรับ\n
	การปฏิเสธ เช่น '~alfiest' ในความคิดเห็นจะจำกัดการค้นหาให้กับผู้ใช้\n
	ที่ไม่มี 'alfiest' ในความคิดเห็นของพวกเขา).<br /><br />\n
    ฟิลด์อัตราส่วนยอมรับ 'Inf' และ '---' นอกเหนือจากค่าตัวเลขปกติ.<br /><br />\n
	ซับเน็ตมาสก์สามารถป้อนได้ทั้งในรูปแบบทศนิยมจุดหรือ CIDR\n
	(เช่น 255.255.255.0 เหมือนกับ /24).<br /><br />\n
    อัปโหลดและดาวน์โหลดควรป้อนในหน่วย GB.<br /><br />\n
	สำหรับพารามิเตอร์การค้นหาที่มีฟิลด์ข้อความหลายฟิลด์ ฟิลด์ที่สองจะถูก\n
	เพิกเฉยเว้นแต่จะเกี่ยวข้องกับประเภทการค้นหาที่เลือก. <br /><br />\n
	'เฉพาะที่ใช้งานอยู่' จำกัดการค้นหาให้กับผู้ใช้ที่กำลัง leech หรือ seed อยู่ในขณะนี้,\n
	'IP ที่ถูกปิดใช้งาน' ให้กับผู้ใช้ที่มี IP ของพวกเขาปรากฏในบัญชีที่ถูกปิดใช้งาน.<br /><br />\n
	คอลัมน์ 'p' ในผลลัพธ์แสดงสถิติบางส่วน, นั่นคือ,\n
	ของทอร์เรนต์ที่กำลังดำเนินอยู่. <br /><br />\n
	คอลัมน์ประวัติแสดงจำนวนโพสต์ฟอรัมและความคิดเห็นทอร์เรนต์,\n
	ตามลำดับ, รวมถึงลิงก์ไปยังหน้านี้.\n
	</div></td></tr></table><br /><br />\n"
);

?>