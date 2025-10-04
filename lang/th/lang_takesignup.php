<?php

$lang = array(

#takesignup
'takesignup_error' => "ข้อผิดพลาด",
'takesignup_limit' => "ขอโทษ ผู้ใช้ถึงขีดจำกัดแล้ว โปรดลองอีกครั้งในภายหลัง",
'takesignup_user_error' => "ข้อผิดพลาดผู้ใช้",
'takesignup_form_data' => "ข้อมูลฟอร์มไม่ถูกต้อง!",
'takesignup_username_length' => "ชื่อผู้ใช้ยาวเกินไปหรือสั้นเกินไป",
'takesignup_allowed_chars' => "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
'takesignup_blank' => "อย่าปล่อยฟิลด์ใดว่าง",
'takesignup_nomatch' => "รหัสผ่านไม่ตรงกัน! ต้องพิมพ์ผิด ลองอีกครั้ง",
'takesignup_pass_short' => "ขอโทษ รหัสผ่านสั้นเกินไป (ต่ำสุด 6 ตัวอักษร)",
'takesignup_pass_long' => "ขอโทษ รหัสผ่านยาวเกินไป (สูงสุด 40 ตัวอักษร)",
'takesignup_same' => "ขอโทษ รหัสผ่านไม่สามารถเหมือนกับชื่อผู้ใช้",
'takesignup_validemail' => "นั่นไม่เหมือนที่อยู่อีเมลที่ถูกต้อง",
'takesignup_invalidname' => "ชื่อผู้ใช้ไม่ถูกต้อง",
'takesignup_failed' => "การสมัครล้มเหลว",
'takesignup_qualify' => "ขอโทษ คุณไม่มีคุณสมบัติที่จะเป็นสมาชิกของไซต์นี้",
'takesignup_email_used' => "ที่อยู่อีเมลถูกใช้แล้ว",
'takesignup_user_exists' => "ชื่อผู้ใช้มีอยู่แล้ว!",
'takesignup_fatal_error' => "ข้อผิดพลาดร้ายแรง!",
'takesignup_mail' => "",
'takesignup_confirm' => "การยืนยันการลงทะเบียนผู้ใช้",
'takesignup_from' => "จาก:"
);

$lang['takesignup_email_body'] = <<<EOD

คุณได้ขอบัญชีผู้ใช้ใหม่บน <#SITENAME#> และคุณได้
ระบุที่อยู่นี้ (<#USEREMAIL#>) เป็นผู้ติดต่อผู้ใช้

หากคุณไม่ได้ทำเช่นนี้ โปรดละเว้นอีเมลนี้ ผู้ที่ป้อนที่อยู่
อีเมลของคุณมีที่อยู่ IP <#IP_ADDRESS#> โปรดอย่าตอบกลับ

เพื่อยืนยันการลงทะเบียนผู้ใช้ของคุณ คุณต้องตามลิงก์นี้:

<#REG_LINK#>

หลังจากทำเช่นนี้ คุณจะสามารถใช้บัญชีใหม่ได้ หากคุณล้มเหลวในการ
ทำเช่นนี้ บัญชีของคุณจะถูกลบภายในไม่กี่วัน เราขอร้องให้คุณอ่าน
กฎและ FAQ ก่อนเริ่มใช้ <#SITENAME#>
EOD;
?>