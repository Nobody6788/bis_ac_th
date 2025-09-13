// Enhanced Language Manager - Server-side Integration
class LanguageManager {
    constructor() {
        this.currentLanguage = this.getStoredLanguage() || document.documentElement.lang || 'en';
        this.translations = {};
        this.csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        this.init();
    }

    // Get stored language from localStorage
    getStoredLanguage() {
        return localStorage.getItem('preferredLanguage');
    }

    // Store language preference in localStorage
    setStoredLanguage(lang) {
        localStorage.setItem('preferredLanguage', lang);
    }

    // Initialize the language system
    init() {
        this.loadTranslations();
        this.setupLanguageDropdown();
        this.updateLogo(this.currentLanguage);
        this.updateLanguageDisplay(this.currentLanguage);
        this.translatePage(this.currentLanguage);
    }

    // Load translations from Laravel backend
    async loadTranslations() {
        try {
            const response = await fetch(`/api/translations/${this.currentLanguage}`);
            if (response.ok) {
                this.translations[this.currentLanguage] = await response.json();
            }
        } catch (error) {
            console.warn('Could not load translations from server, using fallback');
            this.loadFallbackTranslations();
        }
    }

    // Fallback translations if server is not available
    loadFallbackTranslations() {
        this.translations = {
            en: {
                'hero.title.inspiring': 'Inspiring',
                'hero.title.excellence': 'Excellence',
                'hero.title.nurturing': 'Nurturing',
                'hero.title.citizens': 'Global Citizens',
                'hero.description': 'At Boston International School Chiangmai, we cultivate confident, creative, and caring students who are ready to make a positive impact on the world through innovative education and global perspectives.',
                'hero.stats.university': 'University Acceptance',
                'hero.stats.nationalities': 'Nationalities',
                'hero.stats.years': 'Years Excellence',
                'programs.title': 'Boston International School Chiangmai Features',
                'programs.subtitle': 'Our comprehensive programs and innovative approach to education prepare students for success in an ever-changing global landscape.',
                'programs.multilingual.title': 'Multilingual Education',
                'programs.multilingual.desc': 'Students master English, Thai, and choose from Mandarin, French, or Spanish, preparing them for global communication.',
                'programs.multilingual.badge': '3+ Languages Offered',
                'programs.steam.title': 'STEAM Innovation',
                'programs.steam.desc': 'Cutting-edge Science, Technology, Engineering, Arts, and Mathematics programs with state-of-the-art laboratories and maker spaces.',
                'programs.steam.badge': 'State-of-the-art Labs',
                'programs.ib.title': 'IB World School',
                'programs.ib.desc': 'Authorized IB programmes from Primary Years through Diploma Programme, ensuring world-class education standards.',
                'programs.ib.badge': 'PYP • MYP • DP',
                'programs.sports.title': 'Sports Excellence',
                'programs.sports.desc': 'Comprehensive athletics program including swimming, football, basketball, tennis, and traditional Thai sports.',
                'programs.sports.badge': '15+ Sports Offered',
                'programs.arts.title': 'Creative Arts',
                'programs.arts.desc': 'Rich visual and performing arts programmes including music, drama, digital arts, and traditional Thai cultural arts.',
                'programs.arts.badge': 'Award-winning Programs',
                'about.title': 'What is Boston International School Chiangmai?',
                'about.desc1': 'Founded in 1999, Boston International School Chiangmai has been at the forefront of innovative education, nurturing students from over 40 nationalities to become confident, creative, and caring global citizens.',
                'about.desc2': 'Our comprehensive curriculum combines the best of international educational practices with local cultural understanding, preparing students for success in an interconnected world.',
                'about.stats.students': 'Students',
                'about.stats.faculty': 'Faculty',
                'about.btn': 'Learn More About Our Programs',
                'staff.title': 'Meet Our Leadership Team',
                'staff.subtitle': 'Our dedicated team of educators and administrators brings together decades of experience in international education, committed to nurturing every student\'s potential.',
                'staff.principal.name': 'Dr. Sarah Wilson',
                'staff.principal.title': 'PhD, M.Ed',
                'staff.principal.position': 'Principal',
                'staff.academic_director.name': 'Prof. Michael Chen',
                'staff.academic_director.title': 'MSc, BSc',
                'staff.academic_director.position': 'Academic Director',
                'staff.head_primary.name': 'Ms. Emma Thompson',
                'staff.head_primary.title': 'M.Ed, BA',
                'staff.head_primary.position': 'Head of Primary',
                'staff.head_secondary.name': 'Dr. James Rodriguez',
                'staff.head_secondary.title': 'PhD, MA',
                'staff.head_secondary.position': 'Head of Secondary',
                'staff.admissions_director.name': 'Ms. Lisa Park',
                'staff.admissions_director.title': 'MBA, BA',
                'staff.admissions_director.position': 'Admissions Director',
                'staff.student_services.name': 'Mr. David Anderson',
                'staff.student_services.title': 'MSW, BSW',
                'staff.student_services.position': 'Student Services Director',
                'contact.title': 'Get in Touch',
                'contact.subtitle': 'Ready to start your journey with Boston International School Chiangmai? Contact our admissions team.',
                'contact.form.title': 'Send us a Message',
                'contact.form.firstname': 'First Name',
                'contact.form.lastname': 'Last Name',
                'contact.form.email': 'Email',
                'contact.form.phone': 'Phone Number',
                'contact.form.grade': 'Grade Level of Interest',
                'contact.form.message': 'Message',
                'contact.form.submit': 'Send Message',
                'contact.info.title': 'Visit Our Campus',
                'contact.info.address': 'Address',
                'contact.info.phone': 'Phone',
                'contact.info.email': 'Email'
            },
            th: {
                'hero.title.inspiring': 'สร้างแรงบันดาลใจ',
                'hero.title.excellence': 'ความเป็นเลิศ',
                'hero.title.nurturing': 'การเลี้ยงดู',
                'hero.title.citizens': 'พลเมืองโลก',
                'hero.description': 'ที่โรงเรียนนานาชาติบอสตันเชียงใหม่ เราปลูกฝังนักเรียนให้มีความมั่นใจ สร้างสรรค์ และใส่ใจ พร้อมที่จะสร้างผลกระทบเชิงบวกต่อโลกผ่านการศึกษาที่เป็นนวัตกรรมและมุมมองระดับโลก',
                'hero.stats.university': 'การเข้ามหาวิทยาลัย',
                'hero.stats.nationalities': 'สัญชาติ',
                'hero.stats.years': 'ปีแห่งความเป็นเลิศ',
                'programs.title': 'จุดเด่นของโรงเรียนนานาชาติบอสตันเชียงใหม่',
                'programs.subtitle': 'หลักสูตรที่ครอบคลุมและแนวทางการศึกษาที่เป็นนวัตกรรมของเราเตรียมนักเรียนให้พร้อมสำหรับความสำเร็จในโลกที่เปลี่ยนแปลงอยู่ตลอดเวลา',
                'programs.multilingual.title': 'การศึกษาหลายภาษา',
                'programs.multilingual.desc': 'นักเรียนเชี่ยวชาญภาษาอังกฤษ ไทย และเลือกเรียนภาษาจีน ฝรั่งเศส หรือสเปน เพื่อเตรียมพร้อมสำหรับการสื่อสารระดับโลก',
                'programs.multilingual.badge': 'เสนอ 3+ ภาษา',
                'programs.steam.title': 'นวัตกรรม STEAM',
                'programs.steam.desc': 'หลักสูตรวิทยาศาสตร์ เทคโนโลยี วิศวกรรม ศิลปะ และคณิตศาสตร์ที่ทันสมัย พร้อมห้องปฏิบัติการและพื้นที่สร้างสรรค์ที่ล้ำสมัย',
                'programs.steam.badge': 'ห้องปฏิบัติการที่ล้ำสมัย',
                'programs.ib.title': 'โรงเรียน IB World',
                'programs.ib.desc': 'หลักสูตร IB ที่ได้รับการรับรองตั้งแต่ระดับประถมจนถึงหลักสูตรดิพโลมา รับประกันมาตรฐานการศึกษาระดับโลก',
                'programs.ib.badge': 'PYP • MYP • DP',
                'programs.sports.title': 'ความเป็นเลิศด้านกีฬา',
                'programs.sports.desc': 'โปรแกรมกีฬาที่ครอบคลุม รวมถึงการว่ายน้ำ ฟุตบอล บาสเกตบอล เทนนิส และกีฬาไทยดั้งเดิม',
                'programs.sports.badge': 'เสนอ 15+ กีฬา',
                'programs.arts.title': 'ศิลปะสร้างสรรค์',
                'programs.arts.desc': 'หลักสูตรศิลปภาพและการแสดงที่หลากหลาย รวมถึงดนตรี ละคร ศิลปะดิจิทัล และศิลปะวัฒนธรรมไทยดั้งเดิม',
                'programs.arts.badge': 'โปรแกรมที่ได้รับรางวัล',
                'about.title': 'โรงเรียนนานาชาติบอสตันเชียงใหม่คืออะไร?',
                'about.desc1': 'ก่อตั้งขึ้นในปี 1999 โรงเรียนนานาชาติบอสตันเชียงใหม่เป็นผู้นำในการศึกษาที่เป็นนวัตกรรม บ่มเพาะนักเรียนจากกว่า 40 สัญชาติให้เป็นพลเมืองโลกที่มั่นใจ สร้างสรรค์ และใส่ใจ',
                'about.desc2': 'หลักสูตรที่ครอบคลุมของเรารวมสิ่งที่ดีที่สุดของแนวปฏิบัติการศึกษานานาชาติเข้ากับความเข้าใจวัฒนธรรมท้องถิ่น เตรียมนักเรียนให้พร้อมสำหรับความสำเร็จในโลกที่เชื่อมโยงกัน',
                'about.stats.students': 'นักเรียน',
                'about.stats.faculty': 'คณาจารย์',
                'about.btn': 'เรียนรู้เพิ่มเติมเกี่ยวกับหลักสูตรของเรา',
                'staff.title': 'พบกับทีมผู้นำของเรา',
                'staff.subtitle': 'ทีมงานที่ทุ่มเทของนักการศึกษาและผู้บริหารรวบรวมประสบการณ์หลายทศวรรษในการศึกษานานาชาติ มุ่งมั่นที่จะพัฒนาศักยภาพของนักเรียนทุกคน',
                'staff.principal.name': 'ดร. ซาราห์ วิลสัน',
                'staff.principal.title': 'ปริญญาเอก, ศษ.ม.',
                'staff.principal.position': 'ผู้อำนวยการ',
                'staff.academic_director.name': 'ศ. ไมเคิล เฉิน',
                'staff.academic_director.title': 'วท.ม., วท.บ.',
                'staff.academic_director.position': 'ผู้อำนวยการฝ่ายวิชาการ',
                'staff.head_primary.name': 'นางสาว เอ็มม่า ทอมป์สัน',
                'staff.head_primary.title': 'ศษ.ม., ศศ.บ.',
                'staff.head_primary.position': 'หัวหน้าระดับประถม',
                'staff.head_secondary.name': 'ดร. เจมส์ โรดริเกซ',
                'staff.head_secondary.title': 'ปริญญาเอก, ศศ.ม.',
                'staff.head_secondary.position': 'หัวหน้าระดับมัธยม',
                'staff.admissions_director.name': 'นางสาว ลิซ่า ปาร์ค',
                'staff.admissions_director.title': 'บธ.ม., ศศ.บ.',
                'staff.admissions_director.position': 'ผู้อำนวยการฝ่ายรับสมัคร',
                'staff.student_services.name': 'นาย เดวิด แอนเดอร์สัน',
                'staff.student_services.title': 'สค.ม., สค.บ.',
                'staff.student_services.position': 'ผู้อำนวยการฝ่ายบริการนักเรียน',
                'contact.title': 'ติดต่อเรา',
                'contact.subtitle': 'พร้อมที่จะเริ่มต้นการเดินทางกับโรงเรียนนานาชาติบอสตันเชียงใหม่หรือไม่? ติดต่อทีมรับสมัครของเรา',
                'contact.form.title': 'ส่งข้อความถึงเรา',
                'contact.form.firstname': 'ชื่อ',
                'contact.form.lastname': 'นามสกุล',
                'contact.form.email': 'อีเมล',
                'contact.form.phone': 'หมายเลขโทรศัพท์',
                'contact.form.grade': 'ระดับชั้นที่สนใจ',
                'contact.form.message': 'ข้อความ',
                'contact.form.submit': 'ส่งข้อความ',
                'contact.info.title': 'เยี่ยมชมโรงเรียนของเรา',
                'contact.info.address': 'ที่อยู่',
                'contact.info.phone': 'โทรศัพท์',
                'contact.info.email': 'อีเมล'
            },
            ko: {
                'hero.title.inspiring': '영감을 주는',
                'hero.title.excellence': '우수성',
                'hero.title.nurturing': '양육하는',
                'hero.title.citizens': '글로벌 시민',
                'hero.description': '보스턴 국제학교 치앙마이에서는 혁신적인 교육과 글로벌 관점을 통해 세상에 긍정적인 영향을 미칠 준비가 된 자신감 있고 창의적이며 배려심 있는 학생들을 기릅니다.',
                'hero.stats.university': '대학 진학률',
                'hero.stats.nationalities': '국적',
                'hero.stats.years': '년간의 우수성',
                'programs.title': '보스턴 국제학교 치앙마이의 특징',
                'programs.subtitle': '우리의 포괄적인 프로그램과 혁신적인 교육 접근법은 끊임없이 변화하는 글로벌 환경에서 성공할 수 있도록 학생들을 준비시킵니다.',
                'programs.multilingual.title': '다국어 교육',
                'programs.multilingual.desc': '학생들은 영어, 태국어를 마스터하고 중국어, 프랑스어 또는 스페인어 중에서 선택하여 글로벌 소통을 준비합니다.',
                'programs.multilingual.badge': '3개 이상의 언어 제공',
                'programs.steam.title': 'STEAM 혁신',
                'programs.steam.desc': '최첨단 과학, 기술, 공학, 예술, 수학 프로그램과 최신 실험실 및 메이커 스페이스를 제공합니다.',
                'programs.steam.badge': '최첨단 실험실',
                'programs.ib.title': 'IB 월드 스쿨',
                'programs.ib.desc': '초등 과정부터 디플로마 프로그램까지 공인된 IB 프로그램으로 세계적 수준의 교육 표준을 보장합니다.',
                'programs.ib.badge': 'PYP • MYP • DP',
                'programs.sports.title': '스포츠 우수성',
                'programs.sports.desc': '수영, 축구, 농구, 테니스 및 전통 태국 스포츠를 포함한 포괄적인 체육 프로그램을 제공합니다.',
                'programs.sports.badge': '15개 이상의 스포츠 제공',
                'programs.arts.title': '창의적 예술',
                'programs.arts.desc': '음악, 연극, 디지털 아트 및 전통 태국 문화 예술을 포함한 다양한 시각 및 공연 예술 프로그램을 제공합니다.',
                'programs.arts.badge': '수상 경력의 프로그램',
                'about.title': '보스턴 국제학교 치앙마이란 무엇인가요?',
                'about.desc1': '1999년에 설립된 보스턴 국제학교 치앙마이는 혁신적인 교육의 최전선에서 40개 이상의 국가 출신 학생들을 자신감 있고 창의적이며 배려심 있는 글로벌 시민으로 양성해 왔습니다.',
                'about.desc2': '우리의 포괄적인 커리큘럼은 국제 교육 관행의 최고와 지역 문화적 이해를 결합하여 상호 연결된 세상에서의 성공을 위해 학생들을 준비시킵니다.',
                'about.stats.students': '학생',
                'about.stats.faculty': '교직원',
                'about.btn': '우리 프로그램에 대해 더 알아보기',
                'staff.title': '리더십 팀을 만나보세요',
                'staff.subtitle': '국제 교육 분야에서 수십 년의 경험을 쌓은 헌신적인 교육자와 행정진으로 구성된 우리 팀은 모든 학생의 잠재력을 육성하는 데 최선을 다하고 있습니다.',
                'staff.principal.name': '사라 윌슨 박사',
                'staff.principal.title': '박사, 교육학 석사',
                'staff.principal.position': '교장',
                'staff.academic_director.name': '마이클 첸 교수',
                'staff.academic_director.title': '이학 석사, 이학사',
                'staff.academic_director.position': '학술 감독',
                'staff.head_primary.name': '엠마 톰슨 선생님',
                'staff.head_primary.title': '교육학 석사, 문학사',
                'staff.head_primary.position': '초등부 책임자',
                'staff.head_secondary.name': '제임스 로드리게스 박사',
                'staff.head_secondary.title': '박사, 문학 석사',
                'staff.head_secondary.position': '중고등부 책임자',
                'staff.admissions_director.name': '리사 박 선생님',
                'staff.admissions_director.title': '경영학 석사, 문학사',
                'staff.admissions_director.position': '입학 감독',
                'staff.student_services.name': '데이비드 앤더슨 선생님',
                'staff.student_services.title': '사회복지학 석사, 사회복지학사',
                'staff.student_services.position': '학생 서비스 감독',
                'contact.title': '연락하기',
                'contact.subtitle': '보스턴 국제학교 치앙마이와 함께 여정을 시작할 준비가 되셨나요? 입학 팀에 연락하십시오.',
                'contact.form.title': '메시지 보내기',
                'contact.form.firstname': '이름',
                'contact.form.lastname': '성',
                'contact.form.email': '이메일',
                'contact.form.phone': '전화번호',
                'contact.form.grade': '관심 학년',
                'contact.form.message': '메시지',
                'contact.form.submit': '메시지 보내기',
                'contact.info.title': '캠퍼스 방문',
                'contact.info.address': '주소',
                'contact.info.phone': '전화',
                'contact.info.email': '이메일'
            }
        };
    }

    // Setup language dropdown functionality
    setupLanguageDropdown() {
        // Guest language dropdowns
        const dropdown = document.getElementById('language-dropdown');
        const menu = document.getElementById('language-menu');
        
        // Authenticated user language dropdowns
        const authDropdown = document.getElementById('auth-language-dropdown');
        const authMenu = document.getElementById('auth-language-menu');
        
        // Mobile dropdowns
        const mobileDropdown = document.getElementById('mobile-language-dropdown');
        const mobileMenu = document.getElementById('mobile-language-menu');
        
        const mobileAuthDropdown = document.getElementById('mobile-auth-language-dropdown');
        const mobileAuthMenu = document.getElementById('mobile-auth-language-menu');
        
        // Get all language buttons
        const languageButtons = document.querySelectorAll('[data-lang]');
        
        // Setup desktop dropdown for guests
        if (dropdown && menu) {
            dropdown.addEventListener('click', (e) => {
                e.stopPropagation();
                menu.classList.toggle('hidden');
                // Close other menus
                if (authMenu) authMenu.classList.add('hidden');
                if (mobileMenu) mobileMenu.classList.add('hidden');
                if (mobileAuthMenu) mobileAuthMenu.classList.add('hidden');
            });
        }
        
        // Setup desktop dropdown for authenticated users
        if (authDropdown && authMenu) {
            authDropdown.addEventListener('click', (e) => {
                e.stopPropagation();
                authMenu.classList.toggle('hidden');
                // Close other menus
                if (menu) menu.classList.add('hidden');
                if (mobileMenu) mobileMenu.classList.add('hidden');
                if (mobileAuthMenu) mobileAuthMenu.classList.add('hidden');
            });
        }
        
        // Setup mobile dropdown for guests
        if (mobileDropdown && mobileMenu) {
            mobileDropdown.addEventListener('click', (e) => {
                e.stopPropagation();
                mobileMenu.classList.toggle('hidden');
                // Close other menus
                if (menu) menu.classList.add('hidden');
                if (authMenu) authMenu.classList.add('hidden');
                if (mobileAuthMenu) mobileAuthMenu.classList.add('hidden');
            });
        }
        
        // Setup mobile dropdown for authenticated users
        if (mobileAuthDropdown && mobileAuthMenu) {
            mobileAuthDropdown.addEventListener('click', (e) => {
                e.stopPropagation();
                mobileAuthMenu.classList.toggle('hidden');
                // Close other menus
                if (menu) menu.classList.add('hidden');
                if (authMenu) authMenu.classList.add('hidden');
                if (mobileMenu) mobileMenu.classList.add('hidden');
            });
        }
        
        // Setup language button click handlers
        languageButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                const lang = button.getAttribute('data-lang');
                this.changeLanguage(lang);
                
                // Close all menus
                if (menu) menu.classList.add('hidden');
                if (authMenu) authMenu.classList.add('hidden');
                if (mobileMenu) mobileMenu.classList.add('hidden');
                if (mobileAuthMenu) mobileAuthMenu.classList.add('hidden');
            });
        });
        
        // Close menus when clicking outside
        document.addEventListener('click', () => {
            if (menu) menu.classList.add('hidden');
            if (authMenu) authMenu.classList.add('hidden');
            if (mobileMenu) mobileMenu.classList.add('hidden');
            if (mobileAuthMenu) mobileAuthMenu.classList.add('hidden');
        });
        
        this.updateLanguageDisplay(this.currentLanguage);
    }

    // Enhanced language change - Updates server-side locale and client-side content
    async changeLanguage(lang) {
        console.log('Changing language to:', lang);
        
        try {
            // Send language change request to server
            const response = await fetch('/language/switch', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ locale: lang })
            });
            
            if (response.ok) {
                const result = await response.json();
                console.log('Server locale updated:', result);
                
                // Update client-side state
                this.currentLanguage = lang;
                this.setStoredLanguage(lang);
                
                // Load translations for the new language if not already loaded
                if (!this.translations[lang]) {
                    await this.loadTranslations();
                }
                
                // Update UI elements
                this.updateLogo(lang);
                this.updateLanguageDisplay(lang);
                this.translatePage(lang);
                
                // Optional: Show success message
                this.showLanguageChangeNotification(lang);
                
                // Reload the page to ensure all server-side content is updated
                setTimeout(() => {
                    window.location.reload();
                }, 500);
            } else {
                console.error('Failed to update server locale');
                // Fallback to client-side only
                this.clientSideLanguageChange(lang);
            }
        } catch (error) {
            console.error('Error switching language:', error);
            // Fallback to client-side only
            this.clientSideLanguageChange(lang);
        }
    }
    
    // Fallback client-side language change
    async clientSideLanguageChange(lang) {
        this.currentLanguage = lang;
        this.setStoredLanguage(lang);
        
        if (!this.translations[lang]) {
            await this.loadTranslations();
        }
        
        this.updateLogo(lang);
        this.updateLanguageDisplay(lang);
        this.translatePage(lang);
    }
    
    // Show language change notification
    showLanguageChangeNotification(lang) {
        const langNames = {
            'en': 'English',
            'th': 'ไทย',
            'ko': '한국어'
        };
        
        // Create a simple notification
        const notification = document.createElement('div');
        notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-md shadow-lg z-50 transition-opacity duration-300';
        notification.textContent = `Language changed to ${langNames[lang] || lang}`;
        
        document.body.appendChild(notification);
        
        // Remove notification after 2 seconds
        setTimeout(() => {
            notification.style.opacity = '0';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        }, 2000);
    }

    // Translate all elements with data-translate attributes
    translatePage(lang) {
        const elements = document.querySelectorAll('[data-translate]');
        const translations = this.translations[lang] || this.translations['en'] || {};
        
        elements.forEach(element => {
            const key = element.getAttribute('data-translate');
            if (translations[key]) {
                // Check if the element contains HTML or is just text
                if (element.innerHTML.includes('<')) {
                    // For elements that might contain HTML, be more careful
                    const textNodes = this.getTextNodes(element);
                    if (textNodes.length === 1) {
                        element.textContent = translations[key];
                    }
                } else {
                    element.textContent = translations[key];
                }
            }
        });
    }

    // Helper function to get text nodes
    getTextNodes(element) {
        const textNodes = [];
        const walker = document.createTreeWalker(
            element,
            NodeFilter.SHOW_TEXT,
            {
                acceptNode: function(node) {
                    return node.nodeValue.trim() ? NodeFilter.FILTER_ACCEPT : NodeFilter.FILTER_REJECT;
                }
            }
        );
        
        let node;
        while (node = walker.nextNode()) {
            textNodes.push(node);
        }
        return textNodes;
    }

    // Update language dropdown display
    updateLanguageDisplay(lang) {
        // Guest dropdowns
        const currentLangElement = document.getElementById('current-language');
        const mobileCurrentLangElement = document.getElementById('mobile-current-language');
        
        // Authenticated user dropdowns
        const authCurrentLangElement = document.getElementById('auth-current-language');
        const mobileAuthCurrentLangElement = document.getElementById('mobile-auth-current-language');
        
        const displays = {
            'en': '🇺🇸 <span class="hidden sm:inline">English</span>',
            'th': '🇹🇭 <span class="hidden sm:inline">ไทย</span>',
            'ko': '🇰🇷 <span class="hidden sm:inline">한국어</span>'
        };
        
        const mobileDisplays = {
            'en': '🇺🇸 English',
            'th': '🇹🇭 ไทย',
            'ko': '🇰🇷 한국어'
        };
        
        // Update guest dropdowns
        if (currentLangElement) {
            currentLangElement.innerHTML = displays[lang] || displays['en'];
        }
        
        if (mobileCurrentLangElement) {
            mobileCurrentLangElement.textContent = mobileDisplays[lang] || mobileDisplays['en'];
        }
        
        // Update authenticated user dropdowns
        if (authCurrentLangElement) {
            authCurrentLangElement.innerHTML = displays[lang] || displays['en'];
        }
        
        if (mobileAuthCurrentLangElement) {
            mobileAuthCurrentLangElement.textContent = mobileDisplays[lang] || mobileDisplays['en'];
        }
    }

    // Update logo based on language
    updateLogo(lang) {
        console.log('Updating logo for language:', lang);
        const logoImg = document.getElementById('school-logo');
        console.log('Logo element found:', !!logoImg);
        if (logoImg) {
            let logoPath;
            switch(lang) {
                case 'th':
                    logoPath = '/logo-th.jpeg';
                    break;
                case 'ko':
                    logoPath = '/logo-ko.jpeg';
                    break;
                default:
                    logoPath = '/logo-en.jpeg';
            }
            console.log('Setting logo path to:', logoPath);
            logoImg.src = logoPath;
        } else {
            console.error('Logo element with id "school-logo" not found');
        }
    }
}

// Initialize language manager when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM loaded, initializing language manager');
    if (!window.languageManager) {
        window.languageManager = new LanguageManager();
    } else {
        window.languageManager.setupLanguageDropdown();
        window.languageManager.translatePage(window.languageManager.currentLanguage);
    }
});

export default LanguageManager;