# 📋 متطلبات المشروع

## المتطلبات الأساسية

### البيئة:
- **PHP:** 8.1+
- **MySQL:** 8.0+
- **Node.js:** 16+
- **Composer:** 2.0+

### المتطلبات على الخادم:
- مساحة تخزينية: 500 ميجابايت
- ذاكرة RAM: 2 جيجابايت (الحد الأدنى)
- PHP Memory Limit: 256 ميجابايت

---

## مكتبات PHP (Composer)

| المكتبة | الإصدار | الوصف |
|--------|--------|-------|
| **laravel/framework** | ^11.0 | إطار العمل الأساسي |
| **laravel/sanctum** | ^4.0 | مصادقة API |
| **maatwebsite/excel** | ^3.1 | قراءة وكتابة Excel |
| **barryvdh/laravel-dompdf** | ^2.1 | توليد PDF |
| **intervention/image** | ^3.0 | معالجة الصور |
| **pusher/pusher-php-server** | ^7.0 | الإخطارات الفورية |
| **stripe/stripe-php** | ^13.0 | معالجة الدفع |
| **guzzlehttp/guzzle** | ^7.0 | طلبات HTTP |
| **laravel/breeze** | ^2.0 | نماذج المصادقة |
| **doctrine/dbal** | ^3.0 | معالجة قاعدة البيانات |

---

## مكتبات Node.js

| المكتبة | الإصدار | الوصف |
|--------|--------|-------|
| **bootstrap** | ^5.3.0 | إطار التصميم |
| **bootstrap-icons** | ^1.11.0 | مكتبة الرموز |
| **alpinejs** | ^3.13.0 | JavaScript التفاعلي |
| **sweetalert2** | ^11.10.0 | نوافذ تنبيهات جميلة |
| **chart.js** | ^4.4.0 | رسوم بيانية |
| **swiper** | ^11.0.0 | منزلقات الصور |
| **dayjs** | ^1.11.0 | معالجة التواريخ |

---

## إضافات Firefox (اختيارية للتطوير)

- **Laravel Debugbar** - debugging أسهل
- **Vue DevTools** - تتبع الحالة
- **Redux DevTools** - مراقبة الحالة

---

## أدوات خارجية (اختيارية)

| الأداة | الغرض |
|-------|-------|
| **Stripe** | معالجة الدفع |
| **Mailgun/SendGrid** | إرسال الرسائل |
| **AWS S3** | تخزين الملفات |
| **Cloudflare** | CDN وأمان |
| **Google Analytics** | تحليلات |

---

## متطلبات الاستضافة (Production)

### الحد الأدنى:
- **خادم مشترك (Shared Hosting)**
- PHP 8.1 مع أداة composer
- MySQL Database
- SSL Certificate (مجاني أو مدفوع)

### الموصى به:
- **VPS أو Cloud Server**
- 2 GB RAM
- 50 GB SSD Storage
- PHP-FPM
- Redis (اختياري)
- CDN (اختياري)

### مزودو الاستضافة الموصى بهم:
- SiteGround
- Bluehost
- HostGator
- Namecheap
- Kamatera
- DigitalOcean
- Heroku
- AWS

---

## اختبار المتطلبات

### التحقق من PHP:
\`\`\`bash
php -v
# يجب أن يظهر PHP 8.1+
\`\`\`

### التحقق من MySQL:
\`\`\`bash
mysql --version
# يجب أن يظهر MySQL 8.0+
\`\`\`

### التحقق من Composer:
\`\`\`bash
composer -V
# يجب أن يظهر Composer 2.0+
\`\`\`

### التحقق من Node.js:
\`\`\`bash
node -v
npm -v
# يجب أن يظهر Node.js 16+ و npm 8+
\`\`\`

---

**اجميع المتطلبات جاهزة؟ يمكنك البدء بالتثبيت الآن!**
