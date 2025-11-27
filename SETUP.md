# 🔧 دليل إعداد المشروع بسرعة

## التثبيت السريع (5 دقائق)

### Windows

\`\`\`bash
# 1. استنساخ المشروع
git clone https://github.com/yourusername/souqi-marketplace.git
cd souqi-marketplace

# 2. تثبيت المكتبات
composer install && npm install

# 3. إعداد البيئة
copy .env.example .env
php artisan key:generate

# 4. إنشاء قاعدة البيانات (استخدم phpMyAdmin)
# أنشئ قاعدة بيانات باسم: souqi_marketplace

# 5. تشغيل الهجرات
php artisan migrate --seed

# 6. تجميع الأصول
npm run dev

# 7. بدء الخادم (في نافذة أخرى)
php artisan serve
\`\`\`

### macOS/Linux

\`\`\`bash
# 1. استنساخ المشروع
git clone https://github.com/yourusername/souqi-marketplace.git
cd souqi-marketplace

# 2. تثبيت المكتبات
composer install
npm install

# 3. إعداد البيئة
cp .env.example .env
php artisan key:generate

# 4. إنشاء قاعدة البيانات
mysql -u root -p -e "CREATE DATABASE souqi_marketplace CHARACTER SET utf8mb4;"

# 5. تشغيل الهجرات
php artisan migrate --seed

# 6. تجميع الأصول
npm run dev

# 7. بدء الخادم
php artisan serve
\`\`\`

---

## 🎯 الخطوات الإضافية

### إعداد البريد الإلكتروني

حدّث في `.env`:
\`\`\`
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
\`\`\`

### إعداد Stripe (اختياري)

\`\`\`
STRIPE_PUBLIC_KEY=your_public_key
STRIPE_SECRET_KEY=your_secret_key
\`\`\`

### إعداد التخزين

\`\`\`bash
php artisan storage:link
\`\`\`

---

## ✅ التحقق من التثبيت

افتح المتصفح:
- الرئيسية: http://localhost:8000
- لوحة الإدارة: http://localhost:8000/admin

**بيانات الدخول الافتراضية:**
- البريد: admin@souqi.com
- كلمة المرور: password123

---

## 🚀 الآن أنت جاهز!

ابدأ بإضافة المنتجات والتجار والعملاء.
