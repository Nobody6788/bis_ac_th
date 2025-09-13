<?php

return [
    // Navigation
    'nav' => [
        'about' => 'เกี่ยวกับโรงเรียน',
        'notice_board' => 'ประกาศ',
        'news_notice' => 'ข่าวและประกาศ',
        'gallery' => 'แกลเลอรี่',
        'contact' => 'ติดต่อเรา',
        'language' => 'ภาษา',
        'english' => 'English',
        'thai' => 'ไทย',
        'login' => 'เข้าสู่ระบบ',
        'register' => 'สมัครสมาชิก',
        'profile' => 'โปรไฟล์ของฉัน',
        'logout' => 'ออกจากระบบ',
        'dashboard' => 'แดชบอร์ด',
    ],
    
    // Homepage
    'home' => [
        'school_name' => 'โรงเรียนนานาชาติบอสตัน เชียงใหม่',
        'greeting' => 'คำทักทาย',
        'teachers' => 'คณะครูผู้สอน',
        'welcome' => 'ยินดีต้อนรับสู่โรงเรียนนานาชาติบอสตัน',
        'slogan' => 'สร้างความเป็นเลิศ บ่มเพาะพลเมืองโลก',
        'learn_more' => 'ดูเพิ่มเติม',
        'welcome_message' => 'โรงเรียนนานาชาติชั้นนำในภาคเหนือของประเทศไทย',
        'quick_links' => 'ลิงก์ด่วน',
    ],
    
    // Common
    'common' => [
        'read_more' => 'อ่านต่อ',
        'view_all' => 'ดูทั้งหมด',
        'loading' => 'กำลังโหลด...',
        'search' => 'ค้นหา...',
        'submit' => 'ส่ง',
        'cancel' => 'ยกเลิก',
        'save' => 'บันทึก',
        'edit' => 'แก้ไข',
        'delete' => 'ลบ',
        'back' => 'ย้อนกลับ',
        'next' => 'ถัดไป',
        'previous' => 'ก่อนหน้า',
        'close' => 'ปิด',
        'select_option' => '-- กรุณาเลือก --',
        'no_records' => 'ไม่พบข้อมูล',
    ],
    
    // Authentication
    'auth' => [
        'login' => 'เข้าสู่ระบบ',
        'register' => 'สมัครสมาชิก',
        'logout' => 'ออกจากระบบ',
        'email' => 'อีเมล',
        'password' => 'รหัสผ่าน',
        'remember_me' => 'จดจำฉัน',
        'forgot_password' => 'ลืมรหัสผ่าน?',
        'reset_password' => 'รีเซ็ตรหัสผ่าน',
        'confirm_password' => 'ยืนยันรหัสผ่าน',
        'name' => 'ชื่อ-นามสกุล',
        'first_name' => 'ชื่อ',
        'last_name' => 'นามสกุล',
        'phone' => 'เบอร์โทรศัพท์',
    ],
    
    // Footer
    'footer' => [
        'address' => '123 ถนนโรงเรียน เชียงใหม่ ประเทศไทย',
        'phone' => 'โทร: +66 53 123 456',
        'email' => 'อีเมล: info@bischangmai.ac.th',
        'quick_links' => 'ลิงก์ด่วน',
        'news_events' => 'ข่าวและกิจกรรม',
        'gallery' => 'แกลเลอรี่',
        'follow_us' => 'ติดตามเรา',
        'newsletter' => [
            'title' => 'จดหมายข่าว',
            'description' => 'สมัครรับข่าวสารล่าสุดจากเรา',
            'placeholder' => 'อีเมลของคุณ',
            'subscribe' => 'สมัคร',
        ],
        'copyright' => '© :year โรงเรียนนานาชาติบอสตัน เชียงใหม่ สงวนลิขสิทธิ์',
    ],
    
    // Validation
    'validation' => [
        'required' => 'กรุณากรอกข้อมูล :attribute',
        'email' => 'กรุณากรอกที่อยู่อีเมลให้ถูกต้อง',
        'min' => [
            'string' => ':attribute ต้องมีความยาวอย่างน้อย :min ตัวอักษร',
        ],
        'max' => [
            'string' => ':attribute ต้องมีความยาวไม่เกิน :max ตัวอักษร',
        ],
        'confirmed' => 'การยืนยัน :attribute ไม่ตรงกัน',
    ],
    
    // Messages
    'messages' => [
        'success' => [
            'saved' => 'บันทึกข้อมูลเรียบร้อยแล้ว',
            'updated' => 'อัปเดตข้อมูลเรียบร้อยแล้ว',
            'deleted' => 'ลบข้อมูลเรียบร้อยแล้ว',
        ],
        'error' => [
            'general' => 'เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง',
            'not_found' => 'ไม่พบข้อมูลที่ต้องการ',
            'unauthorized' => 'คุณไม่มีสิทธิ์เข้าถึงส่วนนี้',
        ],
    ],
];
