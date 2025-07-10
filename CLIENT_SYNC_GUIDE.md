# คู่มือการใช้งานระบบ Sync ข้อมูลลูกค้า

## ภาพรวม

ระบบนี้ใช้สำหรับอัพเดตข้อมูลลูกค้าจาก Exness API และบันทึกลงฐานข้อมูล โดยรองรับการ sync ทั้งข้อมูลใหม่และข้อมูลที่มีอยู่แล้ว

## ฟีเจอร์หลัก

### 1. Sync ข้อมูลทั้งหมด (Full Sync)
- อัพเดตข้อมูลลูกค้าทั้งหมดที่มีอยู่
- เพิ่มลูกค้าใหม่
- ใช้ข้อมูลจากทั้ง V1 และ V2 API

### 2. Sync เฉพาะลูกค้าใหม่ (New Clients Only)
- เพิ่มเฉพาะลูกค้าใหม่ที่ยังไม่มีในฐานข้อมูล
- ไม่อัพเดตข้อมูลลูกค้าที่มีอยู่แล้ว
- เหมาะสำหรับการ sync ประจำวัน

### 3. ระบบสถิติ
- แสดงสถิติการ sync
- จำนวนลูกค้าตามสถานะ
- การกระจายตามประเทศ

## วิธีการใช้งาน

### 1. ผ่าน Artisan Commands

#### Sync ข้อมูลทั้งหมด
```bash
php artisan clients:sync
```

#### Sync เฉพาะลูกค้าใหม่
```bash
php artisan clients:sync --new-only 
```

#### ดูข้อมูล API (สำหรับ debug)
```bash
php artisan clients:sync --show-api
```

### 2. ผ่าน API Endpoints

#### Sync ข้อมูลทั้งหมด
```http
POST /api/clients/sync
```

#### Sync เฉพาะลูกค้าใหม่
```http
POST /api/clients/sync-new
```

#### ดูสถิติการ sync
```http
GET /api/clients/sync-stats
```

#### ดูข้อมูลลูกค้า
```http
GET /api/clients
```

#### Debug API
```http
GET /api/clients/debug
```

#### Debug Database
```http
GET /api/clients/debug-db
```

### 3. ผ่าน Web Interface

#### Sync ข้อมูลทั้งหมด
```http
POST /api/clients/sync
```

#### Sync เฉพาะลูกค้าใหม่
```http
POST /api/clients/sync-new
```

## โครงสร้างข้อมูล

### ตาราง clients
- `client_uid` - รหัสลูกค้า (unique)
- `partner_account` - บัญชีพาร์ทเนอร์
- `client_id` - รหัสลูกค้า
- `reg_date` - วันที่ลงทะเบียน
- `client_country` - ประเทศ
- `volume_lots` - ปริมาณการเทรด (lots)
- `volume_mln_usd` - ปริมาณการเทรด (ล้าน USD)
- `reward_usd` - รางวัล (USD)
- `rebate_amount_usd` - จำนวน rebate (USD)
- `client_status` - สถานะลูกค้า
- `kyc_passed` - ผ่าน KYC หรือไม่
- `ftd_received` - ได้รับ FTD หรือไม่
- `ftt_made` - ทำ FTT หรือไม่
- `raw_data` - ข้อมูลดิบจาก API
- `last_sync_at` - เวลาที่ sync ล่าสุด

## การตั้งค่า

### 1. ข้อมูล API
ข้อมูล API ถูกตั้งค่าใน `app/Services/ExnessAuthService.php`:
- Email: `Janischa.trade@gmail.com`
- Password: `Janis@2025`

### 2. URLs API
- V1 API: `https://my.exnessaffiliates.com/api/reports/clients/`
- V2 API: `https://my.exnessaffiliates.com/api/v2/reports/clients/`

## การทำงานของระบบ

### 1. การดึงข้อมูล
1. ดึง token จาก Exness API
2. เรียกข้อมูลจาก V1 API
3. เรียกข้อมูลจาก V2 API
4. รวมข้อมูลจากทั้งสอง API

### 2. การประมวลผลข้อมูล
1. สร้าง map ของข้อมูล V2 โดยใช้ short UID
2. รวมข้อมูล V1 และ V2
3. กำหนดสถานะสุดท้าย
4. บันทึกลงฐานข้อมูล

### 3. การจัดการข้อมูล
- **Full Sync**: อัพเดตข้อมูลที่มีอยู่และเพิ่มข้อมูลใหม่
- **New Only**: เพิ่มเฉพาะข้อมูลใหม่

## การ Debug

### 1. ดูข้อมูล API
```bash
php artisan clients:sync --show-api
```

### 2. ดูข้อมูล Database
```http
GET /api/clients/debug-db
```

### 3. ดูข้อมูล API Raw
```http
GET /api/clients/debug
```

## การ Monitor

### 1. Logs
ระบบจะบันทึก log ใน `storage/logs/laravel.log`:
- การเริ่มต้น sync
- จำนวนข้อมูลที่ได้รับ
- การบันทึกข้อมูล
- ข้อผิดพลาด

### 2. สถิติ
```http
GET /api/clients/sync-stats
```

## ข้อควรระวัง

1. **การ Sync ข้อมูลทั้งหมด** จะอัพเดตข้อมูลลูกค้าทั้งหมดที่มีอยู่
2. **การ Sync เฉพาะลูกค้าใหม่** จะไม่กระทบข้อมูลที่มีอยู่
3. ระบบจะบันทึกข้อมูลดิบจาก API ใน `raw_data` field
4. ควรตรวจสอบ log เพื่อดูสถานะการ sync

## การแก้ไขปัญหา

### 1. API Error
- ตรวจสอบ credentials ใน ExnessAuthService
- ตรวจสอบ network connection
- ดู log สำหรับรายละเอียดข้อผิดพลาด

### 2. Database Error
- ตรวจสอบการเชื่อมต่อฐานข้อมูล
- ตรวจสอบโครงสร้างตาราง
- ดู log สำหรับรายละเอียดข้อผิดพลาด

### 3. Data Mismatch
- ใช้ `--show-api` option เพื่อดูข้อมูล API
- ใช้ debug endpoints เพื่อตรวจสอบข้อมูล
- ตรวจสอบ mapping ระหว่าง V1 และ V2 API

## การตั้งค่า Cron Job (แนะนำ)

เพื่อให้ระบบ sync ข้อมูลอัตโนมัติ ให้เพิ่ม cron job:

```bash
# Sync เฉพาะลูกค้าใหม่ทุกวันเวลา 6:00 น.
0 6 * * * cd /path/to/your/project && php artisan clients:sync --new-only

# Sync ข้อมูลทั้งหมดทุกสัปดาห์วันอาทิตย์เวลา 2:00 น.
0 2 * * 0 cd /path/to/your/project && php artisan clients:sync
```

## การพัฒนาต่อ

### 1. เพิ่มฟีเจอร์ใหม่
- การ sync แบบ incremental
- การ backup ข้อมูลก่อน sync
- การแจ้งเตือนเมื่อมีลูกค้าใหม่

### 2. ปรับปรุงประสิทธิภาพ
- การใช้ queue สำหรับ sync ข้อมูลจำนวนมาก
- การ cache ข้อมูล API
- การ optimize การ query ฐานข้อมูล

### 3. การเพิ่มความปลอดภัย
- การเข้ารหัส credentials
- การ validate ข้อมูล
- การ audit log 