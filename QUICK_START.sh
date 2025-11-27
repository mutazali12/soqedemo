#!/bin/bash

echo "🚀 سوقي - Souqi Marketplace - البدء السريع"
echo "================================================"

# الألوان
GREEN='\033[0;32m'
BLUE='\033[0;34m'
NC='\033[0m'

# الخطوة 1
echo -e "${BLUE}1️⃣  نسخ ملف البيئة...${NC}"
cp .env.example .env
echo -e "${GREEN}✓ تم${NC}"

# الخطوة 2
echo -e "${BLUE}2️⃣  تثبيت مكتبات PHP...${NC}"
composer install
echo -e "${GREEN}✓ تم${NC}"

# الخطوة 3
echo -e "${BLUE}3️⃣  توليد مفتاح التطبيق...${NC}"
php artisan key:generate
echo -e "${GREEN}✓ تم${NC}"

# الخطوة 4
echo -e "${BLUE}4️⃣  تثبيت مكتبات JavaScript...${NC}"
npm install
echo -e "${GREEN}✓ تم${NC}"

# الخطوة 5
echo -e "${BLUE}5️⃣  إعداد قاعدة البيانات...${NC}"
echo "تأكد من إنشاء قاعدة بيانات MySQL باسم: souqi_marketplace"
echo "اضغط Enter بعد الانتهاء..."
read

php artisan migrate --seed
echo -e "${GREEN}✓ تم${NC}"

# الخطوة 6
echo -e "${BLUE}6️⃣  إنشاء رابط التخزين...${NC}"
php artisan storage:link
echo -e "${GREEN}✓ تم${NC}"

# الخطوة 7
echo -e "${BLUE}7️⃣  تجميع الأصول...${NC}"
npm run dev &
echo -e "${GREEN}✓ جاري التجميع...${NC}"

# الخطوة 8
echo -e "${BLUE}8️⃣  تشغيل الخادم...${NC}"
echo "سيتم تشغيل الخادم على: http://localhost:8000"
echo ""
php artisan serve

echo -e "${GREEN}✓ اكتمل!${NC}"
