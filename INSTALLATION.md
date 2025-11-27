# 📖 دليل التثبيت الشامل - Souqi Marketplace

## المتطلبات الأساسية

قبل البدء، تأكد من توفر:

### أدوات التطوير:
- **PHP 8.1+** - [التحميل](https://www.php.net/downloads)
- **Composer** - [التحميل](https://getcomposer.org/download/)
- **MySQL 8.0+** - [التحميل](https://www.mysql.com/downloads/)
- **Node.js 16+** - [التحميل](https://nodejs.org/en/download/)
- **Git** - [التحميل](https://git-scm.com/download/)

---

## 🚀 التثبيت على الجهاز المحلي

### الخطوة 1: استنساخ المشروع
\`\`\`bash
git clone https://github.com/yourusername/souqi-marketplace.git
cd souqi-marketplace
\`\`\`

### الخطوة 2: تثبيت المكتبات PHP
\`\`\`bash
composer install
\`\`\`

**الوقت المتوقع:** 2-5 دقائق

### الخطوة 3: تثبيت مكتبات Node.js
\`\`\`bash
npm install
\`\`\`

**الوقت المتوقع:** 2-3 دقائق

### الخطوة 4: إعداد ملف البيئة
\`\`\`bash
cp .env.example .env
php artisan key:generate
\`\`\`

### الخطوة 5: إعداد قاعدة البيانات

#### أولاً: إنشاء قاعدة البيانات

**الخيار 1: استخدام phpMyAdmin**
1. افتح `http://localhost/phpmyadmin`
2. انقر على "New" أو "جديد"
3. اكتب اسم قاعدة البيانات: `souqi_marketplace`
4. اختر Collation: `utf8mb4_unicode_ci`
5. انقر Create

**الخيار 2: استخدام Terminal**
\`\`\`bash
mysql -u root -p
CREATE DATABASE souqi_marketplace CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
\`\`\`

#### ثانياً: تحديث ملف .env
\`\`\`bash
# قم بتحرير .env وتعديل:
DB_HOST=127.0.0.1
DB_DATABASE=souqi_marketplace
DB_USERNAME=root
DB_PASSWORD=yourpassword
\`\`\`

#### ثالثاً: تشغيل المتراجعات
\`\`\`bash
php artisan migrate --seed
\`\`\`

### الخطوة 6: تجميع الأصول (Assets)
\`\`\`bash
npm run dev
# أو
npm run build
\`\`\`

### الخطوة 7: بدء الخادم
\`\`\`bash
php artisan serve
\`\`\`

**النتيجة:**
\`\`\`
Laravel development server started on [http://127.0.0.1:8000]
\`\`\`

### الخطوة 8: الوصول إلى الموقع

افتح المتصفح وانتقل إلى:
- **الرئيسية:** http://localhost:8000
- **لوحة العميل:** http://localhost:8000/customer/dashboard
- **لوحة التاجر:** http://localhost:8000/seller/dashboard
- **لوحة التوصيل:** http://localhost:8000/delivery/dashboard
- **لوحة الإدارة:** http://localhost:8000/admin/dashboard

### بيانات الدخول الافتراضية

\`\`\`
👤 Admin
البريد: admin@souqi.com
كلمة المرور: password123

👤 Seller
البريد: seller@souqi.com
كلمة المرور: password123

👤 Customer
البريد: customer@souqi.com
كلمة المرور: password123

👤 Delivery
البريد: delivery@souqi.com
كلمة المرور: password123
\`\`\`

---

## 🌐 التثبيت على الاستضافة

### المرحلة الأولى: إعداد الاستضافة

#### 1. اختيار مزود استضافة
**مواصفات الاستضافة المطلوبة:**
- PHP 8.1+
- MySQL 8.0+
- مساحة تخزينية: 500 ميجابايت على الأقل
- عرض نطاق: 50 جيجابايت (حسب الاستخدام)
- دعم SSH
- دعم Composer
- شهادة SSL مجانية أو مدفوعة

**مزودو الاستضافة الموصى بهم:**
- Bluehost
- SiteGround
- HostGator
- Namecheap
- Kamatera

### المرحلة الثانية: إعداد البيئة

#### 1. الاتصال عبر SSH
\`\`\`bash
ssh user@your-domain.com
\`\`\`

#### 2. الانتقال إلى مجلد الاستضافة
\`\`\`bash
cd ~/public_html
# أو
cd ~/domains/your-domain.com/public_html
\`\`\`

#### 3. استنساخ المشروع
\`\`\`bash
git clone https://github.com/yourusername/souqi-marketplace.git .
\`\`\`

**ملاحظة:** النقطة (.) تنسخ الملفات في المجلد الحالي مباشرة

#### 4. تثبيت المكتبات
\`\`\`bash
composer install --optimize-autoloader --no-dev
npm ci --production
\`\`\`

### المرحلة الثالثة: إعداد قاعدة البيانات

#### 1. إنشاء قاعدة بيانات جديدة

عبر cPanel:
1. ادخل إلى cPanel
2. ابحث عن "MySQL Databases"
3. انقر على "New Database"
4. اكتب الاسم: `yourusername_souqi`
5. انقر Create

**حفظ بيانات الاتصال:**
\`\`\`
Host: localhost
Database: yourusername_souqi
Username: yourusername_souqi
Password: (يتم توليده تلقائياً)
\`\`\`

#### 2. تحديث ملف .env
\`\`\`bash
# عبر SSH
nano .env
\`\`\`

أضف بيانات الاتصال:
\`\`\`
DB_HOST=localhost
DB_DATABASE=yourusername_souqi
DB_USERNAME=yourusername_souqi
DB_PASSWORD=your-password-here
APP_URL=https://your-domain.com
APP_ENV=production
APP_DEBUG=false
\`\`\`

#### 3. تشغيل المتراجعات
\`\`\`bash
php artisan migrate --force --seed
\`\`\`

### المرحلة الرابعة: إعدادات الخادم

#### 1. تعيين Document Root

في cPanel:
1. اذهب إلى "Addon Domains"
2. أضف دومين جديد وحدد المسار كـ `public_html/public`

#### 2. تفعيل HTTPS/SSL

في cPanel:
1. ابحث عن "AutoSSL" أو "SSL Manager"
2. فعّل شهادة SSL (عادة مجانية)
3. انتظر التفعيل (قد يستغرق 15 دقيقة)

#### 3. إعادة توجيه HTTP إلى HTTPS

في `public/.htaccess`:
\`\`\`apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{HTTPS} off
    RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^ index.php [QSA,L]
</IfModule>
