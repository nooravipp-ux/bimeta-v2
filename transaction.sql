/*
 Navicat Premium Data Transfer

 Source Server         : bimeta
 Source Server Type    : PostgreSQL
 Source Server Version : 160001 (160001)
 Source Host           : localhost:5432
 Source Catalog        : bimeta
 Source Schema         : transaction

 Target Server Type    : PostgreSQL
 Target Server Version : 160001 (160001)
 File Encoding         : 65001

 Date: 18/03/2024 02:47:14
*/


-- ----------------------------
-- Sequence structure for m_mapping_index_price_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."m_mapping_index_price_id_seq";
CREATE SEQUENCE "transaction"."m_mapping_index_price_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for purchase_order_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."purchase_order_seq";
CREATE SEQUENCE "transaction"."purchase_order_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for so_numbering_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."so_numbering_seq";
CREATE SEQUENCE "transaction"."so_numbering_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for spk_numbering_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."spk_numbering_seq";
CREATE SEQUENCE "transaction"."spk_numbering_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_delivery_order_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_delivery_order_id_seq";
CREATE SEQUENCE "transaction"."t_delivery_order_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_detail_delivery_order_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_detail_delivery_order_id_seq";
CREATE SEQUENCE "transaction"."t_detail_delivery_order_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_detail_goods_receive_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_detail_goods_receive_id_seq";
CREATE SEQUENCE "transaction"."t_detail_goods_receive_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_detail_purchase_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_detail_purchase_id_seq";
CREATE SEQUENCE "transaction"."t_detail_purchase_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_detail_sales_order_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_detail_sales_order_id_seq";
CREATE SEQUENCE "transaction"."t_detail_sales_order_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_detail_sales_order_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_detail_sales_order_seq";
CREATE SEQUENCE "transaction"."t_detail_sales_order_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_goods_receive_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_goods_receive_id_seq";
CREATE SEQUENCE "transaction"."t_goods_receive_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_invoice_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_invoice_id_seq";
CREATE SEQUENCE "transaction"."t_invoice_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_invoice_numbering_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_invoice_numbering_seq";
CREATE SEQUENCE "transaction"."t_invoice_numbering_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_mapping_index_price_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_mapping_index_price_seq";
CREATE SEQUENCE "transaction"."t_mapping_index_price_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_production_process_item_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_production_process_item_id_seq";
CREATE SEQUENCE "transaction"."t_production_process_item_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_purchase_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_purchase_id_seq";
CREATE SEQUENCE "transaction"."t_purchase_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_sales_order_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_sales_order_seq";
CREATE SEQUENCE "transaction"."t_sales_order_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_spk_production_process_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_spk_production_process_id_seq";
CREATE SEQUENCE "transaction"."t_spk_production_process_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_spk_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_spk_seq";
CREATE SEQUENCE "transaction"."t_spk_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_stock_finish_goods_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_stock_finish_goods_id_seq";
CREATE SEQUENCE "transaction"."t_stock_finish_goods_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_stock_raw_material_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_stock_raw_material_id_seq";
CREATE SEQUENCE "transaction"."t_stock_raw_material_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for travel_permit_numbering_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."travel_permit_numbering_seq";
CREATE SEQUENCE "transaction"."travel_permit_numbering_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for t_delivery_order
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_delivery_order";
CREATE TABLE "transaction"."t_delivery_order" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_delivery_order_id_seq'::regclass),
  "sales_order_id" int4,
  "travel_permit_no" varchar(255) COLLATE "pg_catalog"."default",
  "delivery_date" date,
  "licence_plate" varchar(255) COLLATE "pg_catalog"."default",
  "driver_name" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar COLLATE "pg_catalog"."default",
  "status" int2
)
;

-- ----------------------------
-- Records of t_delivery_order
-- ----------------------------
INSERT INTO "transaction"."t_delivery_order" VALUES (29, 53, 'B240029', '2024-02-29', 'D 53636 DX', 'DONO', '2024-02-28 18:29:41', 'ALI', NULL, NULL, 1);
INSERT INTO "transaction"."t_delivery_order" VALUES (30, 56, 'K240030', '2024-03-18', 'D 53636 DX', 'DOONO', '2024-03-17 18:15:16', 'ALI', NULL, NULL, 1);
INSERT INTO "transaction"."t_delivery_order" VALUES (31, 57, 'S240031', '2024-03-18', 'D 2343 DX', 'YONO', '2024-03-17 18:24:42', 'ALI', NULL, NULL, 1);

-- ----------------------------
-- Table structure for t_detail_delivery_order
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_detail_delivery_order";
CREATE TABLE "transaction"."t_detail_delivery_order" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_detail_delivery_order_id_seq'::regclass),
  "detail_sales_order_id" int4,
  "quantity" int4,
  "remarks" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default",
  "delivery_order_id" int4
)
;

-- ----------------------------
-- Records of t_detail_delivery_order
-- ----------------------------
INSERT INTO "transaction"."t_detail_delivery_order" VALUES (53, 56, 300, '-', '2024-03-17 18:15:27', 'ALI', NULL, NULL, 30);
INSERT INTO "transaction"."t_detail_delivery_order" VALUES (54, 57, 3, '-', '2024-03-17 18:24:52', 'ALI', NULL, NULL, 31);
INSERT INTO "transaction"."t_detail_delivery_order" VALUES (58, 51, 100, '-', '2024-03-17 19:31:27', 'ALI', NULL, NULL, 29);

-- ----------------------------
-- Table structure for t_detail_goods_receive
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_detail_goods_receive";
CREATE TABLE "transaction"."t_detail_goods_receive" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_detail_goods_receive_id_seq'::regclass),
  "goods_receive_id" int4,
  "detail_purchase_id" int4,
  "diameter" int2,
  "weight" float8,
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_ by" varchar(255) COLLATE "pg_catalog"."default",
  "no_roll" varchar(255) COLLATE "pg_catalog"."default",
  "remarks" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_detail_goods_receive
-- ----------------------------
INSERT INTO "transaction"."t_detail_goods_receive" VALUES (19, 11, 34, 150, 1090, '2024-03-15 16:27:46', 'ALI', NULL, NULL, '00009228389', '-');
INSERT INTO "transaction"."t_detail_goods_receive" VALUES (20, 12, 34, 150, 1090, '2024-03-15 16:30:25', 'ALI', NULL, NULL, '00009228389', '-');

-- ----------------------------
-- Table structure for t_detail_production_process_item
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_detail_production_process_item";
CREATE TABLE "transaction"."t_detail_production_process_item" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_spk_production_process_id_seq'::regclass),
  "production_process_item_id" int4,
  "date" date,
  "operator" varchar(225) COLLATE "pg_catalog"."default",
  "result" int4,
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" date,
  "status" int4,
  "remarks" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_detail_production_process_item
-- ----------------------------

-- ----------------------------
-- Table structure for t_detail_purchase
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_detail_purchase";
CREATE TABLE "transaction"."t_detail_purchase" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_detail_purchase_id_seq'::regclass),
  "purchase_id" int4,
  "material_id" int2,
  "quantity" int2,
  "price" numeric(10,2),
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default",
  "width" int2,
  "weight" int2,
  "measure_unit" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_detail_purchase
-- ----------------------------
INSERT INTO "transaction"."t_detail_purchase" VALUES (31, 10, 18, 5, 2500.00, '2024-02-28 12:27:15', 'ALI', NULL, NULL, 150, NULL, 'ROLL');
INSERT INTO "transaction"."t_detail_purchase" VALUES (32, 10, 19, 10, 3500.00, '2024-02-28 12:27:33', 'ALI', NULL, NULL, 165, NULL, 'ROLL');
INSERT INTO "transaction"."t_detail_purchase" VALUES (33, 13, 18, 5, 0.00, '2024-03-15 16:00:11', 'ALI', NULL, NULL, 150, NULL, 'ROLL');
INSERT INTO "transaction"."t_detail_purchase" VALUES (34, 14, 19, 5, 2300.00, '2024-03-15 16:26:42', 'ALI', NULL, NULL, 150, NULL, 'ROLL');

-- ----------------------------
-- Table structure for t_detail_sales_order
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_detail_sales_order";
CREATE TABLE "transaction"."t_detail_sales_order" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_detail_sales_order_id_seq'::regclass),
  "sales_order_id" int4,
  "quantity" int4,
  "flag_print" int4,
  "remarks" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "goods_id" int4,
  "updated_by" varchar(255) COLLATE "pg_catalog"."default",
  "price" numeric(10,2)
)
;

-- ----------------------------
-- Records of t_detail_sales_order
-- ----------------------------
INSERT INTO "transaction"."t_detail_sales_order" VALUES (50, 53, 2000, 0, '-', '2024-02-16 03:01:06', 'ALI', NULL, 1, NULL, 2343.00);
INSERT INTO "transaction"."t_detail_sales_order" VALUES (53, 53, 5000, 0, '-', '2024-02-16 03:02:10', 'ALI', NULL, 8, NULL, 2350.00);
INSERT INTO "transaction"."t_detail_sales_order" VALUES (52, 53, 200, 0, '-', '2024-02-16 03:01:52', 'ALI', NULL, 4, NULL, 1500.00);
INSERT INTO "transaction"."t_detail_sales_order" VALUES (51, 53, 2000, 0, '-', '2024-02-16 03:01:37', 'ALI', NULL, 3, NULL, 3425.00);
INSERT INTO "transaction"."t_detail_sales_order" VALUES (54, 55, 200, 1, '-', '2024-03-15 15:42:06', 'ALI', NULL, 2, NULL, 0.00);
INSERT INTO "transaction"."t_detail_sales_order" VALUES (55, 55, 500, 0, '-', '2024-03-15 15:42:27', 'ALI', NULL, 1, NULL, 0.00);
INSERT INTO "transaction"."t_detail_sales_order" VALUES (56, 56, 300, 1, '-', '2024-03-17 18:12:25', 'ALI', NULL, 8, NULL, 0.00);
INSERT INTO "transaction"."t_detail_sales_order" VALUES (57, 57, 3, 0, '-', '2024-03-17 18:22:59', 'ALI', NULL, 1, NULL, 0.00);

-- ----------------------------
-- Table structure for t_goods_receive
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_goods_receive";
CREATE TABLE "transaction"."t_goods_receive" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_goods_receive_id_seq'::regclass),
  "purchase_id" int4,
  "gr_no" varchar(255) COLLATE "pg_catalog"."default",
  "date" timestamp(0),
  "receiver" varchar(255) COLLATE "pg_catalog"."default",
  "status" int2,
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_goods_receive
-- ----------------------------
INSERT INTO "transaction"."t_goods_receive" VALUES (12, 14, 'SJ-00023222', '2024-03-15 23:30:00', 'ELIS', NULL, '2024-03-15 16:30:10', 'ALI', NULL, NULL);

-- ----------------------------
-- Table structure for t_invoice
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_invoice";
CREATE TABLE "transaction"."t_invoice" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_invoice_id_seq'::regclass),
  "invoice_no" varchar(255) COLLATE "pg_catalog"."default",
  "delivery_order_id" int4,
  "date" date,
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_invoice
-- ----------------------------
INSERT INTO "transaction"."t_invoice" VALUES (1, 'INV/2024/000004', 29, '2024-03-03', '2024-03-03 14:31:57', 'ALI', NULL, NULL);

-- ----------------------------
-- Table structure for t_mapping_index_price
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_mapping_index_price";
CREATE TABLE "transaction"."t_mapping_index_price" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_mapping_index_price_seq'::regclass),
  "ply_type" varchar(255) COLLATE "pg_catalog"."default",
  "flute_type" varchar(255) COLLATE "pg_catalog"."default",
  "substance_id" int4,
  "price" numeric(10,1),
  "tag" date,
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_mapping_index_price
-- ----------------------------
INSERT INTO "transaction"."t_mapping_index_price" VALUES (107, 'SF', 'B', 68, 3226.6, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (36, 'SW', 'B', 40, 5348.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (37, 'SW', 'B', 39, 6180.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (38, 'SW', 'B', 47, 5747.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (39, 'SW', 'B', 45, 6578.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (40, 'SW', 'B', 46, 6976.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (41, 'SW', 'B', 61, 6587.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (42, 'SW', 'B', 58, 7418.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (43, 'SW', 'B', 59, 7816.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (44, 'SW', 'B', 60, 8656.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (45, 'SW', 'B', 55, 5747.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (46, 'SW', 'B', 53, 6975.9, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (47, 'SW', 'B', 52, 6577.8, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (48, 'DW', 'B', 37, 7744.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (49, 'DW', 'B', 42, 8575.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (50, 'DW', 'B', 41, 9406.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (51, 'DW', 'B', 50, 8973.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (52, 'DW', 'B', 48, 9804.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (53, 'DW', 'B', 49, 10203.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (54, 'DW', 'B', 65, 9813.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (55, 'DW', 'B', 62, 10644.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (56, 'DW', 'B', 63, 11043.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (57, 'DW', 'B', 64, 11883.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (58, 'DW', 'B', 57, 8973.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (59, 'DW', 'B', 56, 10203.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (60, 'DW', 'B', 66, 0.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (61, 'DW', 'B', 67, 15243.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (62, 'TW', 'B', 44, 11802.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (63, 'TW', 'B', 43, 0.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (64, 'SF', 'B', 40, 3226.6, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (65, 'SF', 'B', 38, 4057.8, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (66, 'SF', 'B', 51, 4455.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (67, 'SW', 'E', 36, 4674.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (68, 'SW', 'E', 40, 5600.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (69, 'SW', 'E', 39, 6526.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (70, 'SF', 'E', 40, 3236.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (71, 'SF', 'E', 38, 4131.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (72, 'SF', 'E', 51, 4606.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (73, 'SW', 'E', 55, 6044.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (74, 'SW', 'E', 54, 7414.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (75, 'SW', 'E', 46, 7414.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (76, 'SW', 'E', 52, 6970.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (77, 'SW', 'E', 53, 7417.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (78, 'SW', 'B', 69, 4517.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (79, 'SW', 'B', 73, 4583.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (80, 'SW', 'B', 72, 4648.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (81, 'SW', 'B', 80, 4854.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (82, 'SW', 'B', 78, 4920.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (83, 'SW', 'B', 79, 5191.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (84, 'SW', 'B', 94, 5397.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (85, 'SW', 'B', 91, 5462.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (86, 'SW', 'B', 92, 5733.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (87, 'SW', 'B', 93, 6276.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (88, 'SW', 'B', 88, 5747.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (89, 'SW', 'B', 86, 6975.9, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (90, 'SW', 'B', 85, 6812.2, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (91, 'DW', 'B', 70, 7744.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (92, 'DW', 'B', 75, 7809.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (93, 'DW', 'B', 74, 7875.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (94, 'DW', 'B', 83, 8081.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (95, 'DW', 'B', 81, 8146.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (96, 'DW', 'B', 82, 8418.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (97, 'DW', 'B', 98, 8623.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (98, 'DW', 'B', 95, 8689.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (99, 'DW', 'B', 96, 8960.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (100, 'DW', 'B', 97, 9503.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (101, 'DW', 'B', 90, 8973.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (102, 'DW', 'B', 89, 10203.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (103, 'DW', 'B', 99, 0.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (104, 'DW', 'B', 67, 15243.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (105, 'TW', 'B', 77, 11036.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (106, 'TW', 'B', 76, 0.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (108, 'SF', 'B', 71, 3292.5, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (109, 'SF', 'B', 84, 4455.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (110, 'SW', 'E', 69, 4674.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (111, 'SW', 'E', 73, 4747.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (112, 'SW', 'B', 72, 4820.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (113, 'SF', 'E', 68, 3236.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (114, 'SF', 'E', 71, 3309.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (115, 'SF', 'E', 84, 4606.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (116, 'SW', 'E', 88, 6044.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (117, 'SW', 'E', 87, 7414.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (118, 'SW', 'E', 79, 5425.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (119, 'SW', 'E', 85, 6117.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (120, 'SW', 'E', 86, 6419.0, '2024-01-24', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for t_production_process_item
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_production_process_item";
CREATE TABLE "transaction"."t_production_process_item" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_production_process_item_id_seq'::regclass),
  "spk_id" int4,
  "process_id" int2,
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default",
  "status" int2,
  "sequence_order" int2
)
;

-- ----------------------------
-- Records of t_production_process_item
-- ----------------------------

-- ----------------------------
-- Table structure for t_purchase
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_purchase";
CREATE TABLE "transaction"."t_purchase" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_purchase_id_seq'::regclass),
  "supplier_id" int4,
  "date" date,
  "tax_type" varchar(255) COLLATE "pg_catalog"."default",
  "status" int2,
  "remarks" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default",
  "po_no" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_purchase
-- ----------------------------
INSERT INTO "transaction"."t_purchase" VALUES (14, 1, '2024-03-15', '1', 1, '-', '2024-03-15 16:26:20', 'ALI', NULL, NULL, '000014-PO-BK-III-2024');

-- ----------------------------
-- Table structure for t_sales_order
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_sales_order";
CREATE TABLE "transaction"."t_sales_order" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_sales_order_seq'::regclass),
  "transaction_no" varchar COLLATE "pg_catalog"."default",
  "ref_po_customer" varchar(255) COLLATE "pg_catalog"."default",
  "customer_id" int8,
  "order_date" date,
  "delivery_date" date,
  "tax_type" int4,
  "assign_to" int8,
  "status" int8,
  "attachment" text COLLATE "pg_catalog"."default",
  "remarks" text COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default",
  "shipping_address" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_sales_order
-- ----------------------------
INSERT INTO "transaction"."t_sales_order" VALUES (53, 'SO240060', 'TESTPO', 1839, '2024-02-16', '2024-02-23', 1, 6, 2, NULL, '-', '2024-02-16 03:00:20', 'ALI', NULL, NULL, 'KP.BABAKAN KUDUL RT.07 / 04, CIGUGUR TENGAH, CIMAHI TENGAH');
INSERT INTO "transaction"."t_sales_order" VALUES (55, 'SO24000062', 'PO-123345', 1572, '2024-03-15', '2024-03-22', 0, 6, 2, NULL, '-', '2024-03-15 15:41:48', 'ALI', NULL, NULL, 'JL KEMBAR 1 NO 4');
INSERT INTO "transaction"."t_sales_order" VALUES (56, 'SO24000063', 'PO-SJB-000234', 1571, '2024-03-18', '2024-03-22', 2, 6, 2, NULL, '-', '2024-03-17 18:12:10', 'ALI', NULL, NULL, 'CIREBON');
INSERT INTO "transaction"."t_sales_order" VALUES (57, 'SO24000064', 'PO-SAMPLE-0001', 1573, '2024-03-18', '2024-03-22', 3, 6, 2, NULL, '-', '2024-03-17 18:22:40', 'ALI', NULL, NULL, 'RUKO BLOK NO 3 BENTANG REGENCY');

-- ----------------------------
-- Table structure for t_spk
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_spk";
CREATE TABLE "transaction"."t_spk" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_spk_seq'::regclass),
  "detail_sales_order_id" int4,
  "spk_no" varchar(255) COLLATE "pg_catalog"."default",
  "start_date" date,
  "finish_date" date,
  "quantity" int4,
  "length" numeric(10,0),
  "width" numeric(10,0),
  "height" numeric(10,0),
  "l2" numeric(10,0),
  "p1" numeric(10,0),
  "l1" numeric(10,0),
  "p2" numeric(10,0),
  "t" numeric(10,0),
  "plape" numeric(10,0),
  "k" numeric(10,0),
  "netto_width" numeric(10,0),
  "netto_length" numeric(10,0),
  "bruto_width" numeric(10,0),
  "bruto_length" numeric(10,0),
  "sheet_quantity" int4,
  "flag_stitching" int2,
  "flag_glue" int2,
  "flag_pounch" int2,
  "status" int4,
  "current_process" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default",
  "persentage" numeric(10,0) DEFAULT 0,
  "specification" varchar(255) COLLATE "pg_catalog"."default",
  "spk_type" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_spk
-- ----------------------------
INSERT INTO "transaction"."t_spk" VALUES (93, 50, 'SPK-B-24-000097', '2024-03-12', NULL, 1000, 150, 175, 150, 173, 150, 175, 149, 150, 88, 30, 326, 677, 700, 695, 1000, 1, 0, 0, 2, '0', '2024-03-12 06:10:29', 'ALI', '2024-03-12 06:17:34', 'ALI', 0, 'SW B 125K/M/125K', NULL);
INSERT INTO "transaction"."t_spk" VALUES (94, 56, 'SPK-A-24-000098', '2024-03-18', NULL, 300, 27, 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 36, 27, 36, 27, 300, 0, 0, 0, 2, '0', '2024-03-17 18:13:27', 'ALI', '2024-03-17 18:13:41', 'ALI', 0, 'SW B 125K/M/125K', NULL);
INSERT INTO "transaction"."t_spk" VALUES (95, 57, 'SPK-B-24-000099', '2024-03-18', NULL, 3, 15, 15, 15, 15, 15, 15, 15, 15, 15, 30, 1900, 1900, 1900, 1000, 3, 0, 0, 0, 2, '0', '2024-03-17 18:24:04', 'ALI', '2024-03-17 18:24:14', 'ALI', 0, 'SW B 125K/M/125K', NULL);

-- ----------------------------
-- Table structure for t_stock_finish_goods
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_stock_finish_goods";
CREATE TABLE "transaction"."t_stock_finish_goods" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_stock_finish_goods_id_seq'::regclass),
  "goods_id" int4,
  "quantity" int4,
  "created_at" timestamp(6),
  "created_by" varchar(6) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(50) COLLATE "pg_catalog"."default",
  "source_from" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_stock_finish_goods
-- ----------------------------
INSERT INTO "transaction"."t_stock_finish_goods" VALUES (29, 2, 500, '2024-03-16 12:05:26', 'ALI', '2024-03-16 12:09:07', 'ALI', 'Stock Opname');
INSERT INTO "transaction"."t_stock_finish_goods" VALUES (30, 3, 100, '2024-03-16 12:15:55', 'ALI', '2024-03-16 12:16:06', 'ALI', 'Stock Opname');

-- ----------------------------
-- Table structure for t_stock_raw_material
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_stock_raw_material";
CREATE TABLE "transaction"."t_stock_raw_material" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_stock_raw_material_id_seq'::regclass),
  "material_id" int4,
  "width" numeric,
  "no_roll" varchar(50) COLLATE "pg_catalog"."default",
  "weight" numeric,
  "source_from" varchar(50) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(50) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_stock_raw_material
-- ----------------------------
INSERT INTO "transaction"."t_stock_raw_material" VALUES (6, 19, 150, '00009228389', 2090, '000014-PO-BK-III-2024', '2024-03-15 16:30:25', 'ALI', '2024-03-15 18:37:38', 'ALI');
INSERT INTO "transaction"."t_stock_raw_material" VALUES (7, 19, 150, 'ROL10020200', 2690, 'Stok Opname', '2024-03-15 18:39:15', 'ALI', '2024-03-15 18:46:10', 'ALI');

-- ----------------------------
-- Function structure for generate_invoice_number
-- ----------------------------
DROP FUNCTION IF EXISTS "transaction"."generate_invoice_number"();
CREATE OR REPLACE FUNCTION "transaction"."generate_invoice_number"()
  RETURNS "pg_catalog"."varchar" AS $BODY$
DECLARE
    current_year VARCHAR;
    sequence_number VARCHAR;
    invoice_number VARCHAR;
BEGIN
    -- Get the current year
    current_year := EXTRACT(YEAR FROM CURRENT_DATE)::VARCHAR;

    -- Get the next value from the sequence and format it with leading zeros
    sequence_number := LPAD(NEXTVAL('transaction.t_invoice_numbering_seq')::VARCHAR, 6, '0');

    -- Create the invoice number with the specified format
    invoice_number := 'INV/' || current_year || '/' || sequence_number;

    RETURN invoice_number;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for generate_purchase_order_number
-- ----------------------------
DROP FUNCTION IF EXISTS "transaction"."generate_purchase_order_number"();
CREATE OR REPLACE FUNCTION "transaction"."generate_purchase_order_number"()
  RETURNS "pg_catalog"."varchar" AS $BODY$
DECLARE
    seq_num INTEGER;
    result_str VARCHAR;
    month_roman VARCHAR;
BEGIN
		-- Get the Roman numeral representation of the current month
    SELECT CASE EXTRACT(MONTH FROM CURRENT_DATE)
        WHEN 1 THEN 'I'
        WHEN 2 THEN 'II'
        WHEN 3 THEN 'III'
        WHEN 4 THEN 'IV'
        WHEN 5 THEN 'V'
        WHEN 6 THEN 'VI'
        WHEN 7 THEN 'VII'
        WHEN 8 THEN 'VIII'
        WHEN 9 THEN 'IX'
        WHEN 10 THEN 'X'
        WHEN 11 THEN 'XI'
        WHEN 12 THEN 'XII'
    END INTO month_roman;
		
    -- Get the next value from the sequence
    SELECT nextval('transaction.purchase_order_seq') INTO seq_num;

    -- Format the result string
    result_str := to_char(seq_num, 'FM000000') || '-PO-BK-' || month_roman || '-' || EXTRACT(YEAR FROM CURRENT_DATE);

    RETURN result_str;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for generate_sales_order_number
-- ----------------------------
DROP FUNCTION IF EXISTS "transaction"."generate_sales_order_number"();
CREATE OR REPLACE FUNCTION "transaction"."generate_sales_order_number"()
  RETURNS "pg_catalog"."varchar" AS $BODY$
DECLARE
    seq_num INTEGER;
    result_str VARCHAR;
    last_two_digits VARCHAR;
BEGIN
    -- Get the last two digits of the current year
    SELECT RIGHT(EXTRACT(YEAR FROM CURRENT_DATE)::TEXT, 2) INTO last_two_digits;

    -- Get the next value from the sequence
    SELECT nextval('transaction.so_numbering_seq') INTO seq_num;

    -- Format the result string
    result_str := 'SO' || last_two_digits || to_char(seq_num, 'FM000000');

    RETURN result_str;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for generate_spk_number
-- ----------------------------
DROP FUNCTION IF EXISTS "transaction"."generate_spk_number"("param_mode" int4);
CREATE OR REPLACE FUNCTION "transaction"."generate_spk_number"("param_mode" int4)
  RETURNS "pg_catalog"."varchar" AS $BODY$
DECLARE
    seq_num INTEGER;
    result_str VARCHAR;
    last_two_digits VARCHAR;
    prefix_str VARCHAR;
BEGIN
    -- Get the last two digits of the current year
    SELECT RIGHT(EXTRACT(YEAR FROM CURRENT_DATE)::TEXT, 2) INTO last_two_digits;

    -- Get the next value from the sequence
    SELECT nextval('transaction.spk_numbering_seq') INTO seq_num;

    -- Determine the prefix based on the parameter
    CASE param_mode
        WHEN 1 THEN
            prefix_str := 'SPK-A';
        WHEN 2 THEN
            prefix_str := 'SPK-B';
        WHEN 3 THEN
            prefix_str := 'SPK-AB';
        WHEN 4 THEN
            prefix_str := 'SPK-BB';
        ELSE
            RAISE EXCEPTION 'Invalid parameter value. Valid values are 1, 2, 3, or 4.';
    END CASE;

    -- Format the result string
    result_str := prefix_str || '-' || last_two_digits || '-' || LPAD(seq_num::TEXT, 6, '0');

    RETURN result_str;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for generate_travel_permit_number
-- ----------------------------
DROP FUNCTION IF EXISTS "transaction"."generate_travel_permit_number"("type_param" int4);
CREATE OR REPLACE FUNCTION "transaction"."generate_travel_permit_number"("type_param" int4)
  RETURNS "pg_catalog"."varchar" AS $BODY$
DECLARE
    seq_num INTEGER;
    result_str VARCHAR;
    last_two_digits VARCHAR;
BEGIN
    -- Get the last two digits of the current year
    SELECT RIGHT(EXTRACT(YEAR FROM CURRENT_DATE)::TEXT, 2) INTO last_two_digits;

    -- Get the next value from the sequence
    SELECT nextval('transaction.travel_permit_numbering_seq'::regclass) INTO seq_num;

    -- Format the result string based on the parameter
    IF type_param = 0 OR type_param = 1 THEN
        result_str := 'B' || last_two_digits || to_char(seq_num, 'FM0000');
    ELSIF type_param = 2 THEN
        result_str := 'K' || last_two_digits || to_char(seq_num, 'FM0000');
    ELSIF type_param = 3 THEN
        result_str := 'S' || last_two_digits || to_char(seq_num, 'FM0000');
    ELSE
        RAISE EXCEPTION 'Invalid parameter: %', type_param;
    END IF;

    RETURN result_str;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."m_mapping_index_price_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."purchase_order_seq"', 14, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."so_numbering_seq"', 64, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."spk_numbering_seq"', 99, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_delivery_order_id_seq"', 31, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_delivery_order_id_seq"', 58, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_goods_receive_id_seq"', 20, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_purchase_id_seq"', 34, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_sales_order_id_seq"', 57, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_sales_order_seq"', 29, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_goods_receive_id_seq"', 12, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_invoice_id_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_invoice_numbering_seq"', 4, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_mapping_index_price_seq"', 120, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_production_process_item_id_seq"', 136, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_purchase_id_seq"', 14, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_sales_order_seq"', 57, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_spk_production_process_id_seq"', 30, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_spk_seq"', 95, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_stock_finish_goods_id_seq"', 30, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_stock_raw_material_id_seq"', 7, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."travel_permit_numbering_seq"', 31, true);

-- ----------------------------
-- Primary Key structure for table t_delivery_order
-- ----------------------------
ALTER TABLE "transaction"."t_delivery_order" ADD CONSTRAINT "t_delivery_order_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_detail_delivery_order
-- ----------------------------
ALTER TABLE "transaction"."t_detail_delivery_order" ADD CONSTRAINT "t_detail_delivery_order_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_detail_goods_receive
-- ----------------------------
ALTER TABLE "transaction"."t_detail_goods_receive" ADD CONSTRAINT "t_detail_goods_receive_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_detail_production_process_item
-- ----------------------------
ALTER TABLE "transaction"."t_detail_production_process_item" ADD CONSTRAINT "t_spk_production_process_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_detail_purchase
-- ----------------------------
ALTER TABLE "transaction"."t_detail_purchase" ADD CONSTRAINT "t_detail_purchase_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_detail_sales_order
-- ----------------------------
ALTER TABLE "transaction"."t_detail_sales_order" ADD CONSTRAINT "t_detail_sales_order_temp_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_goods_receive
-- ----------------------------
ALTER TABLE "transaction"."t_goods_receive" ADD CONSTRAINT "t_goods_receive_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_invoice
-- ----------------------------
ALTER TABLE "transaction"."t_invoice" ADD CONSTRAINT "t_invoice_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_mapping_index_price
-- ----------------------------
ALTER TABLE "transaction"."t_mapping_index_price" ADD CONSTRAINT "t_mapping_index_price_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_production_process_item
-- ----------------------------
ALTER TABLE "transaction"."t_production_process_item" ADD CONSTRAINT "t_production_process_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_purchase
-- ----------------------------
ALTER TABLE "transaction"."t_purchase" ADD CONSTRAINT "t_purchase_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_sales_order
-- ----------------------------
ALTER TABLE "transaction"."t_sales_order" ADD CONSTRAINT "t_sales_order_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_spk
-- ----------------------------
ALTER TABLE "transaction"."t_spk" ADD CONSTRAINT "t_spk_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_stock_finish_goods
-- ----------------------------
ALTER TABLE "transaction"."t_stock_finish_goods" ADD CONSTRAINT "t_stock_finish_goods_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_stock_raw_material
-- ----------------------------
ALTER TABLE "transaction"."t_stock_raw_material" ADD CONSTRAINT "t_stock_raw_material_pkey" PRIMARY KEY ("id");
