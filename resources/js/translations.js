// Language Translation System with localStorage
class LanguageManager {
    constructor() {
        this.currentLanguage = this.getStoredLanguage() || 'en';
        this.translations = {};
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
        this.applyLanguage(this.currentLanguage);
    }

    // Load all translation data
    loadTranslations() {
        this.translations = {
            en: {
                // Header
                'nav.about': 'About',
                'nav.programs': 'Programs', 
                'nav.admissions': 'Admissions',
                'nav.gallery': 'Gallery',
                'nav.news': 'News',
                'nav.notice': 'News & Updates',
                'nav.contact': 'Contact',
                'nav.apply': 'Apply Now',
                
                // Hero Section
                'hero.title.inspiring': 'Inspiring',
                'hero.title.excellence': 'Excellence',
                'hero.title.nurturing': 'Nurturing',
                'hero.title.citizens': 'Global Citizens',
                'hero.description': 'At Boston International School Chiangmai, we empower students to become innovative thinkers, compassionate leaders, and responsible global citizens through world-class education.',
                'hero.btn.apply': 'Apply Now',
                'hero.btn.tour': 'Virtual Tour',
                'hero.stats.university': 'University Acceptance',
                'hero.stats.nationalities': 'Nationalities',
                'hero.stats.years': 'Years Excellence',
                
                // Programs Section
                'programs.title': 'Boston International School Chiangmai Features',
                'programs.subtitle': 'Our comprehensive programs and innovative approach to education prepare students for success in an ever-changing global landscape.',
                'programs.multilingual.title': 'Multilingual Education',
                'programs.multilingual.desc': 'Students master English, Thai, and choose from Mandarin, French, or Spanish, preparing them for global communication.',
                'programs.multilingual.badge': '3+ Languages Offered',
                'programs.steam.title': 'STEAM Innovation',
                'programs.steam.desc': 'Cutting-edge Science, Technology, Engineering, Arts, and Mathematics programs foster creativity and critical thinking.',
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
                'programs.global.title': 'Global Citizenship',
                'programs.global.desc': 'Community service, cultural exchange programs, and global awareness initiatives develop responsible world citizens.',
                'programs.global.badge': '40+ Nationalities',
                
                // About Section
                'about.title': 'What is Boston International School Chiangmai?',
                'about.desc1': 'Founded in 1999, Boston International School Chiangmai has been at the forefront of innovative education, nurturing students from over 40 nationalities to become confident, creative, and caring global citizens.',
                'about.desc2': 'Our comprehensive curriculum combines the best of international educational practices with local cultural understanding, preparing students for success in an interconnected world.',
                'about.stats.students': 'Students',
                'about.stats.faculty': 'Faculty',
                'about.btn': 'Learn More About Our Programs',
                
                // Contact Section
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
                'contact.info.email': 'Email',
                
                // Footer
                'footer.description': 'Empowering students to become global citizens through innovative education, character development, and academic excellence.',
                'footer.links': 'Quick Links',
                'footer.contact': 'Contact Us',
                'footer.copyright': 'Boston International School Chiangmai. All rights reserved.',
                
                // School Info
                'school.name': 'Boston International School',
                'school.subtitle': 'Chiangmai',
                'school.tagline': 'Excellence in Education'
            },
            
            th: {
                // Header
                'nav.about': 'เกี่ยวกับเรา',
                'nav.programs': 'หลักสูตร',
                'nav.admissions': 'การรับสมัคร',
                'nav.gallery': 'แกลเลอรี่',
                'nav.news': 'ข่าวสาร',
                'nav.notice': 'ข่าวสารและข้อมูลอัพเดท',
                'nav.contact': 'ติดต่อ',
                'nav.apply': 'สมัครเรียน',
                
                // Hero Section
                'hero.title.inspiring': 'สร้างแรงบันดาลใจ',
                'hero.title.excellence': 'ความเป็นเลิศ',
                'hero.title.nurturing': 'เลี้ยงดู',
                'hero.title.citizens': 'พลเมืองโลก',
                'hero.description': 'ที่โรงเรียนนานาชาติบอสตัน เชียงใหม่ เราเสริมพลังให้นักเรียนกลายเป็นนักคิดที่มีนวัตกรรม ผู้นำที่เมตตา และพลเมืองโลกที่มีความรับผิดชอบผ่านการศึกษาระดับโลก',
                'hero.btn.apply': 'สมัครเรียน',
                'hero.btn.tour': 'ทัวร์เสมือนจริง',
                'hero.stats.university': 'เข้ามหาวิทยาลัย',
                'hero.stats.nationalities': 'สัญชาติ',
                'hero.stats.years': 'ปีแห่งความเป็นเลิศ',
                
                // Programs Section
                'programs.title': 'จุดเด่นของโรงเรียนนานาชาติบอสตัน เชียงใหม่',
                'programs.subtitle': 'หลักสูตรที่ครอบคลุมและแนวทางการศึกษาที่เป็นนวัตกรรมของเราเตรียมนักเรียนให้พร้อมสำหรับความสำเร็จในโลกที่เปลี่ยนแปลงตลอดเวลา',
                'programs.multilingual.title': 'การศึกษาแบบหลายภาษา',
                'programs.multilingual.desc': 'นักเรียนเชี่ยวชาญภาษาอังกฤษ ไทย และเลือกเรียนภาษาจีน ฝรั่งเศส หรือสペイน เพื่อเตรียมพร้อมสำหรับการสื่อสารระดับโลก',
                'programs.multilingual.badge': 'เสนอ 3+ ภาษา',
                'programs.steam.title': 'นวัตกรรม STEAM',
                'programs.steam.desc': 'หลักสูตรวิทยาศาสตร์ เทคโนโลยี วิศวกรรม ศิลปะ และคณิตศาสตร์ที่ทันสมัยส่งเสริมความคิดสร้างสรรค์และการคิดอย่างมีวิจารณญาณ',
                'programs.steam.badge': 'ห้องปฏิบัติการทันสมัย',
                'programs.ib.title': 'โรงเรียน IB World',
                'programs.ib.desc': 'หลักสูตร IB ที่ได้รับอนุมัติตั้งแต่ระดับประถมจนถึงหลักสูตรดิปโลมา รับประกันมาตรฐานการศึกษาระดับโลก',
                'programs.ib.badge': 'PYP • MYP • DP',
                'programs.sports.title': 'ความเป็นเลิศด้านกีฬา',
                'programs.sports.desc': 'โปรแกรมกีฬาที่ครอบคลุม รวมถึงว่ายน้ำ ฟุตบอล บาสเกตบอล เทนนิส และกีฬาไทยดั้งเดิม',
                'programs.sports.badge': 'เสนอ 15+ กีฬา',
                'programs.arts.title': 'ศิลปะสร้างสรรค์',
                'programs.arts.desc': 'หลักสูตรศิลปกรรมและการแสดงที่หลากหลาย รวมถึงดนตรี ละคร ศิลปะดิจิทัล และศิลปวัฒนธรรมไทยดั้งเดิม',
                'programs.arts.badge': 'โปรแกรมได้รับรางวัล',
                'programs.global.title': 'พลเมืองโลก',
                'programs.global.desc': 'การบริการชุมชน โปรแกรมแลกเปลี่ยนทางวัฒนธรรม และการริเริ่มด้านการรับรู้ระดับโลกพัฒนาพลเมืองโลกที่มีความรับผิดชอบ',
                'programs.global.badge': '40+ สัญชาติ',
                
                // About Section
                'about.title': 'โรงเรียนนานาชาติบอสตัน เชียงใหม่คืออะไร?',
                'about.desc1': 'ก่อตั้งในปี 1999 โรงเรียนนานาชาติบอสตัน เชียงใหม่ได้เป็นผู้นำในการศึกษาที่เป็นนวัตกรรม เลี้ยงดูนักเรียนจากมากกว่า 40 สัญชาติให้กลายเป็นพลเมืองโลกที่มั่นใจ สร้างสรรค์ และใส่ใจ',
                'about.desc2': 'หลักสูตรที่ครอบคลุมของเรารวมแนวปฏิบัติการศึกษานานาชาติที่ดีที่สุดเข้ากับความเข้าใจทางวัฒนธรรมท้องถิ่น เตรียมนักเรียนให้พร้อมสำหรับความสำเร็จในโลกที่เชื่อมโยงกัน',
                'about.stats.students': 'นักเรียน',
                'about.stats.faculty': 'คณาจารย์',
                'about.btn': 'เรียนรู้เพิ่มเติมเกี่ยวกับหลักสูตรของเรา',
                
                // Contact Section
                'contact.title': 'ติดต่อเรา',
                'contact.subtitle': 'พร้อมที่จะเริ่มต้นการเดินทางกับโรงเรียนนานาชาติบอสตัน เชียงใหม่หรือยัง? ติดต่อทีมรับสมัครของเรา',
                'contact.form.title': 'ส่งข้อความถึงเรา',
                'contact.form.firstname': 'ชื่อ',
                'contact.form.lastname': 'นามสกุล',
                'contact.form.email': 'อีเมล',
                'contact.form.phone': 'หมายเลขโทรศัพท์',
                'contact.form.grade': 'ระดับชั้นที่สนใจ',
                'contact.form.message': 'ข้อความ',
                'contact.form.submit': 'ส่งข้อความ',
                'contact.info.title': 'เยี่ยมชมวิทยาเขตของเรา',
                'contact.info.address': 'ที่อยู่',
                'contact.info.phone': 'โทรศัพท์',
                'contact.info.email': 'อีเมล',
                
                // Footer
                'footer.description': 'เสริมพลังให้นักเรียนกลายเป็นพลเมืองโลกผ่านการศึกษาที่เป็นนวัตกรรม การพัฒนาบุคลิกภาพ และความเป็นเลิศทางวิชาการ',
                'footer.links': 'ลิงก์ด่วน',
                'footer.contact': 'ติดต่อเรา',
                'footer.copyright': 'โรงเรียนนานาชาติบอสตัน เชียงใหม่ สงวนลิขสิทธิ์',
                
                // School Info
                'school.name': 'โรงเรียนนานาชาติบอสตัน',
                'school.subtitle': 'เชียงใหม่',
                'school.tagline': 'ความเป็นเลิศในการศึกษา'
            },
            
            ko: {
                // Header
                'nav.about': '소개',
                'nav.programs': '프로그램',
                'nav.admissions': '입학',
                'nav.gallery': '갤러리',
                'nav.news': '소식',
                'nav.notice': '뉴스 및 업데이트',
                'nav.contact': '연락처',
                'nav.apply': '지원하기',
                
                // Hero Section
                'hero.title.inspiring': '영감을 주는',
                'hero.title.excellence': '우수성',
                'hero.title.nurturing': '육성하는',
                'hero.title.citizens': '글로벌 시민',
                'hero.description': '보스턴 국제학교 치앉마이에서는 학생들이 세계적 수준의 교육을 통해 혁신적인 사상가, 자비로운 리더, 그리고 책임감 있는 글로벌 시민이 될 수 있도록 힘을 실어줍니다.',
                'hero.btn.apply': '지원하기',
                'hero.btn.tour': '가상 투어',
                'hero.stats.university': '대학 진학률',
                'hero.stats.nationalities': '국적',
                'hero.stats.years': '년의 우수성',
                
                // Programs Section
                'programs.title': '보스턴 국제학교 치안마이의 특징',
                'programs.subtitle': '우리의 포괄적인 프로그램과 혁신적인 교육 접근 방식은 학생들이 끊임없이 변화하는 글로벌 환경에서 성공할 수 있도록 준비시킵니다.',
                'programs.multilingual.title': '다국어 교육',
                'programs.multilingual.desc': '학생들은 영어, 태국어를 마스터하고 중국어, 프랑스어, 스페인어 중에서 선택하여 글로벌 커뮤니케이션을 준비합니다.',
                'programs.multilingual.badge': '3개 이상 언어 제공',
                'programs.steam.title': 'STEAM 혁신',
                'programs.steam.desc': '최첨단 과학, 기술, 공학, 예술, 수학 프로그램은 창의성과 비판적 사고를 촉진합니다.',
                'programs.steam.badge': '최첨단 실험실',
                'programs.ib.title': 'IB 월드 스쿨',
                'programs.ib.desc': '초등 과정부터 디플로마 프로그램까지 공인된 IB 프로그램으로 세계적 수준의 교육 표준을 보장합니다.',
                'programs.ib.badge': 'PYP • MYP • DP',
                'programs.sports.title': '스포츠 우수성',
                'programs.sports.desc': '수영, 축구, 농구, 테니스, 태국 전통 스포츠를 포함한 종합적인 체육 프로그램.',
                'programs.sports.badge': '15개 이상 스포츠 제공',
                'programs.arts.title': '창의 예술',
                'programs.arts.desc': '음악, 연극, 디지털 아트, 태국 전통 문화 예술을 포함한 풍부한 시각 및 공연 예술 프로그램.',
                'programs.arts.badge': '수상 경력 프로그램',
                'programs.global.title': '글로벌 시민의식',
                'programs.global.desc': '지역사회 봉사, 문화 교류 프로그램, 글로벌 인식 이니셔티브가 책임감 있는 세계 시민을 개발합니다.',
                'programs.global.badge': '40개 이상 국적',
                
                // About Section
                'about.title': '보스턴 국제학교 치안마이란 무엇인가요?',
                'about.desc1': '1999년에 설립된 보스턴 국제학교 치안마이는 혁신적인 교육의 최전선에서 40개 이상 국적의 학생들을 자신감 있고 창의적이며 배려심 깊은 글로벌 시민으로 육성해왔습니다.',
                'about.desc2': '우리의 포괄적인 커리큘럼은 최고의 국제 교육 관행과 현지 문화적 이해를 결합하여 학생들이 상호 연결된 세계에서 성공할 수 있도록 준비시킵니다.',
                'about.stats.students': '학생',
                'about.stats.faculty': '교수진',
                'about.btn': '프로그램에 대해 더 알아보기',
                
                // Contact Section
                'contact.title': '연락하기',
                'contact.subtitle': '보스턴 국제학교 치안마이와 함께 여행을 시작할 준비가 되셨나요? 입학 팀에 연락해 주세요.',
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
                'contact.info.email': '이메일',
                
                // Footer
                'footer.description': '혁신적인 교육, 인성 개발, 학업 우수성을 통해 학생들이 글로벌 시민이 될 수 있도록 힘을 실어줍니다.',
                'footer.links': '빠른 링크',
                'footer.contact': '연락처',
                'footer.copyright': '보스턴 국제학교 치안마이. 모든 권리 보유.',
                
                // School Info
                'school.name': '보스턴 국제학교',
                'school.subtitle': '치안마이',
                'school.tagline': '교육의 우수성'
            }
        };
    }

    // Setup language dropdown functionality
    setupLanguageDropdown() {
        console.log('Setting up language dropdown...');
        
        // Desktop dropdown
        const dropdown = document.getElementById('language-dropdown');
        const currentLangDisplay = document.getElementById('current-language');
        const dropdownMenu = document.getElementById('language-menu');
        
        // Mobile dropdown
        const mobileDropdown = document.getElementById('mobile-language-dropdown');
        const mobileCurrentLang = document.getElementById('mobile-current-language');
        const mobileDropdownMenu = document.getElementById('mobile-language-menu');
        
        console.log('DOM elements found:', {
            desktop: !!dropdown,
            desktopMenu: !!dropdownMenu,
            mobile: !!mobileDropdown,
            mobileMenu: !!mobileDropdownMenu
        });
        
        // Set current language display
        this.updateCurrentLanguageDisplay();
        
        // Desktop dropdown functionality
        if (dropdown && dropdownMenu) {
            console.log('Setting up desktop dropdown');
            
            // Remove any existing listeners first
            dropdown.replaceWith(dropdown.cloneNode(true));
            const newDropdown = document.getElementById('language-dropdown');
            
            newDropdown.addEventListener('click', (e) => {
                console.log('Desktop dropdown clicked');
                e.preventDefault();
                e.stopPropagation();
                
                const menu = document.getElementById('language-menu');
                const mobileMenu = document.getElementById('mobile-language-menu');
                
                menu.classList.toggle('hidden');
                if (mobileMenu) mobileMenu.classList.add('hidden');
            });

            // Handle language selection in desktop
            const languageButtons = dropdownMenu.querySelectorAll('[data-lang]');
            languageButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    console.log('Desktop language selected:', button.getAttribute('data-lang'));
                    e.preventDefault();
                    e.stopPropagation();
                    const selectedLang = button.getAttribute('data-lang');
                    this.changeLanguage(selectedLang);
                    dropdownMenu.classList.add('hidden');
                });
            });
        } else {
            console.log('Desktop dropdown elements not found');
        }
        
        // Mobile dropdown functionality with enhanced touch support
        if (mobileDropdown && mobileDropdownMenu) {
            console.log('Setting up mobile dropdown with touch support');
            
            // Remove any existing listeners first
            mobileDropdown.replaceWith(mobileDropdown.cloneNode(true));
            const newMobileDropdown = document.getElementById('mobile-language-dropdown');
            
            // Add both click and touchstart for better mobile support
            const mobileClickHandler = (e) => {
                console.log('Mobile dropdown activated');
                e.preventDefault();
                e.stopPropagation();
                
                const mobileMenu = document.getElementById('mobile-language-menu');
                const desktopMenu = document.getElementById('language-menu');
                
                mobileMenu.classList.toggle('hidden');
                if (desktopMenu) desktopMenu.classList.add('hidden');
            };
            
            newMobileDropdown.addEventListener('click', mobileClickHandler);
            newMobileDropdown.addEventListener('touchstart', mobileClickHandler, {passive: false});

            // Handle language selection in mobile
            const mobileLanguageButtons = mobileDropdownMenu.querySelectorAll('[data-lang]');
            mobileLanguageButtons.forEach(button => {
                const mobileLanguageHandler = (e) => {
                    console.log('Mobile language selected:', button.getAttribute('data-lang'));
                    e.preventDefault();
                    e.stopPropagation();
                    const selectedLang = button.getAttribute('data-lang');
                    this.changeLanguage(selectedLang);
                    mobileDropdownMenu.classList.add('hidden');
                };
                
                button.addEventListener('click', mobileLanguageHandler);
                button.addEventListener('touchstart', mobileLanguageHandler, {passive: false});
            });
        } else {
            console.log('Mobile dropdown elements not found:', {
                mobileDropdown: !!mobileDropdown,
                mobileDropdownMenu: !!mobileDropdownMenu
            });
        }

        // Close dropdowns when clicking outside
        const outsideClickHandler = (e) => {
            const dropdown = document.getElementById('language-dropdown');
            const dropdownMenu = document.getElementById('language-menu');
            const mobileDropdown = document.getElementById('mobile-language-dropdown');
            const mobileDropdownMenu = document.getElementById('mobile-language-menu');
            
            if (!dropdown?.contains(e.target) && !mobileDropdown?.contains(e.target)) {
                if (dropdownMenu) dropdownMenu.classList.add('hidden');
                if (mobileDropdownMenu) mobileDropdownMenu.classList.add('hidden');
            }
        };
        
        document.addEventListener('click', outsideClickHandler);
        document.addEventListener('touchstart', outsideClickHandler);
    }

    // Change language and apply translations
    changeLanguage(lang) {
        this.currentLanguage = lang;
        this.setStoredLanguage(lang);
        this.applyLanguage(lang);
        this.updateCurrentLanguageDisplay();
        this.updateLogo(lang);
    }

    // Apply language translations to the page
    applyLanguage(lang) {
        const elements = document.querySelectorAll('[data-translate]');
        elements.forEach(element => {
            const key = element.getAttribute('data-translate');
            const translation = this.getTranslation(key, lang);
            if (translation) {
                if (element.tagName === 'INPUT' && element.type === 'submit') {
                    element.value = translation;
                } else if (element.tagName === 'INPUT' || element.tagName === 'TEXTAREA') {
                    element.placeholder = translation;
                } else {
                    element.textContent = translation;
                }
            }
        });
    }

    // Get translation for a specific key
    getTranslation(key, lang = this.currentLanguage) {
        return this.translations[lang] && this.translations[lang][key] 
            ? this.translations[lang][key] 
            : this.translations['en'][key] || key;
    }

    // Update the current language display
    updateCurrentLanguageDisplay() {
        const currentLangDisplay = document.getElementById('current-language');
        const mobileCurrentLang = document.getElementById('mobile-current-language');
        
        const flagEmoji = this.getFlagEmoji(this.currentLanguage);
        const langName = this.getLanguageName(this.currentLanguage);
        
        if (currentLangDisplay) {
            currentLangDisplay.innerHTML = `${flagEmoji} <span class="hidden sm:inline">${langName}</span>`;
        }
        
        if (mobileCurrentLang) {
            mobileCurrentLang.innerHTML = `${flagEmoji} ${langName}`;
        }
    }

    // Get flag emoji for language
    getFlagEmoji(lang) {
        const flags = {
            'en': '🇺🇸',
            'th': '🇹🇭', 
            'ko': '🇰🇷'
        };
        return flags[lang] || '🇺🇸';
    }

    // Get language name
    getLanguageName(lang) {
        const names = {
            'en': 'English',
            'th': 'ไทย',
            'ko': '한국어'
        };
        return names[lang] || 'English';
    }

    // Update logo based on language
    updateLogo(lang) {
        const logoImg = document.getElementById('school-logo');
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
            logoImg.src = logoPath;
        }
    }
}

// Initialize language manager when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM loaded, checking if language manager exists');
    if (!window.languageManager) {
        console.log('Creating new language manager');
        window.languageManager = new LanguageManager();
    } else {
        console.log('Language manager already exists, refreshing setup');
        window.languageManager.setupLanguageDropdown();
    }
});

export default LanguageManager;