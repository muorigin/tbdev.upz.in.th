# 🚨 URGENT SECURITY ADVISORY 🚨

## Phishing Risk Alert: Malicious URL Shortener Detected

**Date:** December 2024  
**Severity:** HIGH  
**Affected Service:** TBDev Torrent Tracker (tbdev.upz.in.th)  
**Threat Type:** Phishing via URL Shortener  

---

## ⚠️ IMMEDIATE ACTION REQUIRED

### **CRITICAL SECURITY ISSUE IDENTIFIED**

Our security team has detected a **phishing attack** involving the URL shortener service `go.upz.in.th`. Malicious actors are using shortened URLs that appear legitimate but redirect to harmful sites.

### **SPECIFIC THREAT DETAILS**

- **Malicious URL:** `https://go.upz.in.th/rEMfP`
- **Fake Destination:** Appears to link to password recovery page
- **Actual Behavior:** Redirects to potentially malicious phishing site
- **API Key Involved:** `fd2c4bb1939fcb32efe314d5f128dbb1`

### **IMPACT**

Users clicking shortened links may be redirected to:
- Fake login pages designed to steal credentials
- Malware distribution sites
- Phishing pages mimicking legitimate services

---

## 🛡️ IMMEDIATE SECURITY MEASURES IMPLEMENTED

### **Template Modifications Applied**

We have **immediately removed** the URL shortener JavaScript from all site templates:

#### **Files Modified:**
- `templates/1/template.php`
- `templates/2/template.php`

#### **Changes Made:**
1. **Removed malicious script tags:**
   ```html
   <!-- REMOVED -->
   <script type="text/javascript">
   var key = "fd2c4bb1939fcb32efe314d5f128dbb1";
   </script>
   <script type="text/javascript" src="https://go.upz.in.th/script.js"></script>
   ```

2. **Cleaned up template code** to prevent any residual malicious code execution

3. **Verified PHP syntax** and template integrity

---

## 📋 USER ACTION REQUIRED

### **1. Use Only Legitimate URLs**
- ✅ **SAFE:** `https://tbdev.upz.in.th/members.php?action=recover`
- ❌ **DANGEROUS:** Any shortened URLs from `go.upz.in.th`

### **2. Clear Browser Cache**
- **Chrome/Edge:** Ctrl+Shift+Delete → Clear browsing data
- **Firefox:** Ctrl+Shift+Delete → Clear recent history
- **Safari:** Develop menu → Empty Caches

### **3. Update Bookmarks**
- Replace any bookmarked shortened URLs with direct links
- Verify all saved links point to `tbdev.upz.in.th` domain

### **4. Verify URL Before Clicking**
- Always check the full URL before entering credentials
- Look for `https://tbdev.upz.in.th/` prefix
- Avoid clicking links in suspicious emails

---

## 🔍 VERIFICATION STEPS

### **Check Your Browser:**
1. Open Developer Tools (F12)
2. Go to Network tab
3. Visit any page on our site
4. **Verify NO requests** to `go.upz.in.th` or external shorteners

### **Check Page Source:**
1. Right-click → View Page Source
2. **Search for:** `go.upz.in.th`
3. **Result should be:** No matches found

### **Test Password Recovery:**
1. Visit: `https://tbdev.upz.in.th/members.php?action=recover`
2. **Verify URL** stays within our domain
3. **Check for HTTPS lock icon**

---

## 📞 CONTACT INFORMATION

**Security Team:** security@tbdev.upz.in.th  
**Support:** support@tbdev.upz.in.th  
**Emergency:** Report suspicious activity immediately

---

## 🔄 STATUS UPDATES

- ✅ **Templates cleaned:** All malicious scripts removed
- ✅ **Site security:** Verified clean
- ✅ **Monitoring:** Enhanced security monitoring active
- 🔄 **User verification:** In progress

---

## 📜 LEGAL NOTICE

This advisory is provided for user safety. TBDev is not responsible for third-party URL shortener services. Users should exercise caution with any external links.

**Last Updated:** December 2024  
**Advisory ID:** SEC-2024-001

---

# 🚨 คำเตือนฉุกเฉินด้านความปลอดภัย 🚨

## การแจ้งเตือนภัยฟิชชิ่ง: ตรวจพบ URL Shortener ที่เป็นอันตราย

**วันที่:** ธันวาคม 2024  
**ระดับความรุนแรง:** สูง  
**บริการที่ได้รับผลกระทบ:** TBDev Torrent Tracker (tbdev.upz.in.th)  
**ประเภทภัยคุกคาม:** ฟิชชิ่งผ่าน URL Shortener  

---

## ⚠️ ต้องดำเนินการทันที

### **ปัญหาความปลอดภัยที่สำคัญ**

ทีมรักษาความปลอดภัยของเราได้ตรวจพบ **การโจมตีฟิชชิ่ง** ที่เกี่ยวข้องกับบริการย่อ URL `go.upz.in.th` ผู้ไม่หวังดีกำลังใช้ URL ที่ย่อแล้วซึ่งดูเหมือนจะถูกต้อง แต่กลับเปลี่ยนเส้นทางไปยังไซต์ที่เป็นอันตราย

### **รายละเอียดภัยคุกคามเฉพาะ**

- **URL ที่เป็นอันตราย:** `https://go.upz.in.th/rEMfP`
- **ปลายทางปลอม:** ดูเหมือนจะลิงก์ไปยังหน้าเรียกคืนรหัสผ่าน
- **พฤติกรรมจริง:** เปลี่ยนเส้นทางไปยังไซต์ฟิชชิ่งที่อาจเป็นอันตราย
- **API Key ที่เกี่ยวข้อง:** `fd2c4bb1939fcb32efe314d5f128dbb1`

### **ผลกระทบ**

ผู้ใช้ที่คลิกลิงก์ที่ย่อแล้วอาจถูกเปลี่ยนเส้นทางไปยัง:
- หน้าเข้าสู่ระบบปลอมที่ออกแบบมาเพื่อขโมยข้อมูลรับรอง
- ไซต์แจกจ่ายมัลแวร์
- หน้าเว็บฟิชชิ่งที่เลียนแบบบริการที่ถูกต้อง

---

## 🛡️ มาตรการรักษาความปลอดภัยที่ดำเนินการแล้ว

### **การปรับเปลี่ยนเทมเพลต**

เราได้ **ลบ** JavaScript ของ URL shortener ออกจากเทมเพลตไซต์ทั้งหมดทันที:

#### **ไฟล์ที่แก้ไข:**
- `templates/1/template.php`
- `templates/2/template.php`

#### **การเปลี่ยนแปลงที่ทำ:**
1. **ลบแท็กสคริปต์ที่เป็นอันตราย:**
   ```html
   <!-- ลบแล้ว -->
   <script type="text/javascript">
   var key = "fd2c4bb1939fcb32efe314d5f128dbb1";
   </script>
   <script type="text/javascript" src="https://go.upz.in.th/script.js"></script>
   ```

2. **ทำความสะอาดโค้ดเทมเพลต** เพื่อป้องกันการทำงานของโค้ดที่เป็นอันตรายที่อาจหลงเหลือ

3. **ตรวจสอบไวยากรณ์ PHP** และความสมบูรณ์ของเทมเพลต

---

## 📋 การดำเนินการที่ผู้ใช้ต้องทำ

### **1. ใช้เฉพาะ URL ที่ถูกต้อง**
- ✅ **ปลอดภัย:** `https://tbdev.upz.in.th/members.php?action=recover`
- ❌ **อันตราย:** URL ที่ย่อแล้วใดๆ จาก `go.upz.in.th`

### **2. ล้างแคชเบราว์เซอร์**
- **Chrome/Edge:** Ctrl+Shift+Delete → ล้างข้อมูลการเรียกดู
- **Firefox:** Ctrl+Shift+Delete → ล้างประวัติล่าสุด
- **Safari:** เมนู Develop → Empty Caches

### **3. อัปเดตบุ๊กมาร์ก**
- แทนที่ URL ที่ย่อแล้วที่บันทึกไว้ด้วยลิงก์โดยตรง
- ตรวจสอบให้แน่ใจว่าลิงก์ที่บันทึกทั้งหมดชี้ไปยังโดเมน `tbdev.upz.in.th`

### **4. ตรวจสอบ URL ก่อนคลิก**
- ตรวจสอบ URL เต็มก่อนป้อนข้อมูลรับรอง
- มองหาคำนำหน้า `https://tbdev.upz.in.th/`
- หลีกเลี่ยงการคลิกลิงก์ในอีเมลที่น่าสงสัย

---

## 🔍 ขั้นตอนการตรวจสอบ

### **ตรวจสอบเบราว์เซอร์ของคุณ:**
1. เปิด Developer Tools (F12)
2. ไปที่แท็บ Network
3. เข้าชมหน้าใดๆ บนไซต์ของเรา
4. **ตรวจสอบว่าไม่มีคำขอ** ไปยัง `go.upz.in.th` หรือบริการย่อ URL ภายนอก

### **ตรวจสอบซอร์สโค้ดหน้า:**
1. คลิกขวา → View Page Source
2. **ค้นหา:** `go.upz.in.th`
3. **ผลลัพธ์ควรเป็น:** ไม่พบการจับคู่

### **ทดสอบการเรียกคืนรหัสผ่าน:**
1. เข้าชม: `https://tbdev.upz.in.th/members.php?action=recover`
2. **ตรวจสอบ URL** ให้คงอยู่ในโดเมนของเรา
3. **ตรวจสอบไอคอนล็อก HTTPS**

---

## 📞 ข้อมูลติดต่อ

**ทีมรักษาความปลอดภัย:** security@tbdev.upz.in.th  
**ฝ่ายสนับสนุน:** support@tbdev.upz.in.th  
**ฉุกเฉิน:** รายงานกิจกรรมที่น่าสงสัยทันที

---

## 🔄 การอัปเดตสถานะ

- ✅ **เทมเพลตที่ทำความสะอาด:** ลบสคริปต์ที่เป็นอันตรายทั้งหมดแล้ว
- ✅ **ความปลอดภัยของไซต์:** ตรวจสอบแล้วว่าปลอดภัย
- ✅ **การตรวจสอบ:** เปิดใช้งานการตรวจสอบความปลอดภัยที่เพิ่มขึ้น
- 🔄 **การตรวจสอบผู้ใช้:** อยู่ในระหว่างดำเนินการ

---

## 📜 ประกาศทางกฎหมาย

คำแนะนำนี้จัดทำขึ้นเพื่อความปลอดภัยของผู้ใช้ TBDev ไม่รับผิดชอบต่อบริการย่อ URL ของบุคคลที่สาม ผู้ใช้ควรใช้ความระมัดระวังกับลิงก์ภายนอกใดๆ

**อัปเดตล่าสุด:** ธันวาคม 2024  
**รหัสคำแนะนำ:** SEC-2024-001