/*
 Navicat Premium Data Transfer

 Source Server         : psql_bimeta
 Source Server Type    : PostgreSQL
 Source Server Version : 160001 (160001)
 Source Host           : localhost:5432
 Source Catalog        : bimeta
 Source Schema         : transaction

 Target Server Type    : PostgreSQL
 Target Server Version : 160001 (160001)
 File Encoding         : 65001

 Date: 11/01/2024 01:55:34
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
  "updated_by" varchar COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_delivery_order
-- ----------------------------
INSERT INTO "transaction"."t_delivery_order" VALUES (14, 28, 'K240014', '2024-01-09', 'D 3453 EW', 'Jhono', '2024-01-09 15:46:15', 'ali', NULL, NULL);

-- ----------------------------
-- Table structure for t_detail_delivery_order
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_detail_delivery_order";
CREATE TABLE "transaction"."t_detail_delivery_order" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_detail_delivery_order_id_seq'::regclass),
  "spk_id" int4,
  "quantity" int4,
  "remarks" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar COLLATE "pg_catalog"."default",
  "delivery_order_id" int4
)
;

-- ----------------------------
-- Records of t_detail_delivery_order
-- ----------------------------

-- ----------------------------
-- Table structure for t_detail_production_process_item
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_detail_production_process_item";
CREATE TABLE "transaction"."t_detail_production_process_item" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_spk_production_process_id_seq'::regclass),
  "production_process_item_id" int4,
  "date" date,
  "operator_id" varchar(225) COLLATE "pg_catalog"."default",
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
INSERT INTO "transaction"."t_detail_production_process_item" VALUES (6, 34, '2024-01-01', 'Jhon', 100, NULL, NULL, NULL, NULL, NULL, 'TL');

-- ----------------------------
-- Table structure for t_detail_sales_order
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_detail_sales_order";
CREATE TABLE "transaction"."t_detail_sales_order" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_detail_sales_order_id_seq'::regclass),
  "sales_order_id" int4,
  "goods_name" varchar(255) COLLATE "pg_catalog"."default",
  "goods_type" int2,
  "quantity" int4,
  "price" int4,
  "ply_type" varchar(255) COLLATE "pg_catalog"."default",
  "flute_type" varchar(255) COLLATE "pg_catalog"."default",
  "substance_id" int4,
  "meas_unit" varchar(255) COLLATE "pg_catalog"."default",
  "meas_type" varchar(255) COLLATE "pg_catalog"."default",
  "length" float8,
  "width" float8,
  "height" float8,
  "flag_print" int4,
  "remarks" varchar(255) COLLATE "pg_catalog"."default",
  "top_ply_type" varchar(255) COLLATE "pg_catalog"."default",
  "top_flute_type" varchar(255) COLLATE "pg_catalog"."default",
  "top_substance_id" int4,
  "top_meas_unit" varchar(255) COLLATE "pg_catalog"."default",
  "top_meas_type" varchar(255) COLLATE "pg_catalog"."default",
  "top_length" float8,
  "top_width" float8,
  "top_height" float8,
  "top_flag_print" int4,
  "top_remarks" varchar(255) COLLATE "pg_catalog"."default",
  "bottom_ply_type" varchar(255) COLLATE "pg_catalog"."default",
  "bottom_flute_type" varchar(255) COLLATE "pg_catalog"."default",
  "bottom_substance_id" int4,
  "bottom_meas_unit" varchar(255) COLLATE "pg_catalog"."default",
  "bottom_meas_type" varchar(255) COLLATE "pg_catalog"."default",
  "bottom_length" float8,
  "bottom_width" float8,
  "bottom_height" float8,
  "bottom_flag_print" int4,
  "bottom_remarks" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_detail_sales_order
-- ----------------------------
INSERT INTO "transaction"."t_detail_sales_order" VALUES (3, 28, 'BOX SEPATU UKURAN 42', 2, 3000, 0, 'SW', 'B', 7, 'CM', 'UD', 17.5, 17.5, 17.5, NULL, 'Test Remarks', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-09 12:07:48', 'admin', NULL, NULL);
INSERT INTO "transaction"."t_detail_sales_order" VALUES (4, 28, 'Sheet', 1, 2000, 0, 'SW', 'C', 4, 'CM', 'UD', 17.5, 20, NULL, NULL, 'test sheet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-09 12:09:05', 'admin', NULL, NULL);
INSERT INTO "transaction"."t_detail_sales_order" VALUES (5, 30, 'BOX KUE ULANG TAHUN', 2, 5000, 0, 'SW', 'B', 7, 'CM', 'UL', 17.5, 17.5, 17.5, 1, 'testt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 16:58:40', 'admin', NULL, NULL);
INSERT INTO "transaction"."t_detail_sales_order" VALUES (6, 31, 'BOX', 2, 15, 0, 'SW', 'C', 6, 'CM', 'UD', 36, 24, 33, 0, 'PLOS AJAH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 17:52:47', 'ali', NULL, NULL);
INSERT INTO "transaction"."t_detail_sales_order" VALUES (7, 32, 'BOX RUBEN', 2, 15, 0, 'SW', 'C', 6, 'CM', 'UD', 36, 24, 33, 0, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-10 18:48:10', 'ali', NULL, NULL);

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
INSERT INTO "transaction"."t_mapping_index_price" VALUES (2, 'SW', 'BC', 6, 5294.0, '2023-12-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (3, 'SW', 'BC', 7, 6147.0, '2023-12-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (1, 'SW', 'BC', 5, 4441.0, '2023-12-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (4, 'SW', 'BC', 8, 5692.0, '2023-12-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (5, 'SW', 'BC', 9, 6545.0, '2024-01-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (7, 'SW', 'BC', 10, 6943.0, '2024-01-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (8, 'SW', 'BC', 11, 6632.0, '2024-01-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (9, 'SW', 'BC', 12, 7385.0, '2024-01-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (10, 'SW', 'BC', 13, 7783.0, '2024-01-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (11, 'SW', 'BC', 14, 8623.0, '2024-01-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (12, 'SW', 'BC', 15, 5692.0, '2024-01-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (13, 'SW', 'BC', 17, 6545.0, '2024-01-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (14, 'SW', 'BC', 16, 6944.0, '2024-01-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (20, 'SW', 'BC', 6, 8800.0, '2024-01-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (21, 'SW', 'BC', 6, 8765.0, '2024-01-05', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (24, 'SF', 'BC', 3, 4423.0, '2024-01-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (25, 'SW', 'E', 5, 4595.0, '2024-01-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (26, 'SW', 'E', 6, 5545.0, '2024-01-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (27, 'SW', 'E', 7, 6496.0, '2024-01-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (28, 'SW', 'E', 15, 5989.0, '2024-01-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (30, 'SW', 'E', 4, 7383.0, '2024-01-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (31, 'SW', 'E', 10, 7383.0, '2024-01-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (32, 'SW', 'E', 17, 6940.0, '2024-01-01', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (34, 'SW', 'E', 16, 7383.0, '2024-01-01', NULL, NULL, NULL, NULL);

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
INSERT INTO "transaction"."t_production_process_item" VALUES (36, 34, 2, NULL, NULL, NULL, NULL, 1, 2);
INSERT INTO "transaction"."t_production_process_item" VALUES (37, 34, 5, NULL, NULL, NULL, NULL, 1, 3);
INSERT INTO "transaction"."t_production_process_item" VALUES (38, 34, 13, NULL, NULL, NULL, NULL, 1, 4);
INSERT INTO "transaction"."t_production_process_item" VALUES (39, 34, 14, NULL, NULL, NULL, NULL, 1, 5);
INSERT INTO "transaction"."t_production_process_item" VALUES (40, 36, 1, NULL, NULL, '2024-01-09 15:31:14', 'ali', 3, 1);
INSERT INTO "transaction"."t_production_process_item" VALUES (41, 36, 4, NULL, NULL, '2024-01-09 15:32:08', 'ali', 3, 2);
INSERT INTO "transaction"."t_production_process_item" VALUES (43, 39, 1, '2024-01-10 12:50:48', 'ali', '2024-01-10 16:20:28', 'ali', 2, 1);
INSERT INTO "transaction"."t_production_process_item" VALUES (42, 36, 14, NULL, NULL, '2024-01-10 16:22:06', 'admin', 2, 3);
INSERT INTO "transaction"."t_production_process_item" VALUES (34, 34, 1, NULL, NULL, '2024-01-10 16:22:57', 'admin', 2, 1);

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
  "updated_by" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_sales_order
-- ----------------------------
INSERT INTO "transaction"."t_sales_order" VALUES (28, 'SO240035', 'PO-12345', 1, '2024-01-09', '2024-01-09', 1, 6, 2, '', 'Test Remarks', '2024-01-09 12:07:03', 'admin', NULL, NULL);
INSERT INTO "transaction"."t_sales_order" VALUES (29, 'SO240036', 'TEST-PO-CUSTOMER-2', 2, '2024-01-10', '2024-01-17', 1, 6, 2, '', 'TL', '2024-01-10 12:01:41', 'ali', NULL, NULL);
INSERT INTO "transaction"."t_sales_order" VALUES (30, 'SO240037', 'TEST-PO-3', 1, '2024-01-10', '2024-01-12', 1, 6, 2, '', 'test', '2024-01-10 16:57:50', 'admin', NULL, NULL);
INSERT INTO "transaction"."t_sales_order" VALUES (31, 'SO240038', 'TEST-SPK-0003', 1, '2024-01-11', '2024-01-12', 1, 6, 2, '', 'TL', '2024-01-10 17:51:14', 'ali', NULL, NULL);
INSERT INTO "transaction"."t_sales_order" VALUES (32, 'SO240039', 'TEST-SPK-0004', 1, '2024-01-11', '2024-01-18', 1, 6, 2, '', 'test spk', '2024-01-10 18:46:45', 'ali', NULL, NULL);

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
  "l2" numeric(10,0),
  "p1" numeric(10,0),
  "l1" numeric(10,0),
  "p2" numeric(10,0),
  "t" numeric(10,0),
  "plape" numeric(10,0),
  "k" numeric(10,0),
  "netto_width" numeric(10,0),
  "netto_length" numeric(10,0),
  "bruto_length" numeric(10,0),
  "sheet_quantity" int4,
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default",
  "status" int4,
  "bruto_width" numeric(10,0),
  "current_process" varchar(255) COLLATE "pg_catalog"."default",
  "flag_stitching" int2,
  "flag_glue" int2,
  "flag_pounch" int2
)
;

-- ----------------------------
-- Records of t_spk
-- ----------------------------
INSERT INTO "transaction"."t_spk" VALUES (37, 4, 'SPK-24-0037', '2024-01-10', '2024-01-09', 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 200, 200, 300, '2024-01-09 18:00:31', 'ali', '2024-01-09 18:01:10', 'ali', 4, 100, '0', 1, 0, 1);
INSERT INTO "transaction"."t_spk" VALUES (39, 4, 'SPK-24-0039', '2024-01-10', '2024-01-10', 1800, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, 30, 120, 1800, '2024-01-10 12:36:32', 'ali', '2024-01-10 16:20:28', 'ali', 4, 245, 'COR', 0, 1, 0);
INSERT INTO "transaction"."t_spk" VALUES (36, 3, 'SPK-24-0036', '2024-01-09', '2024-01-16', 2800, NULL, NULL, 230, 200, 250, 25, 35, 1200, 1350, 1350, 2800, '2024-01-09 14:32:22', 'ali', '2024-01-10 16:22:06', 'admin', 4, 1200, 'MUAT', 1, 0, 1);
INSERT INTO "transaction"."t_spk" VALUES (34, 3, 'SPK-24-0034', '2024-01-09', '2024-01-09', 200, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 100, '2024-01-09 12:10:36', 'ali', '2024-01-10 16:22:57', 'admin', 4, 17, 'COR', 1, 0, 1);
INSERT INTO "transaction"."t_spk" VALUES (40, 6, 'SPK-24-0040', NULL, NULL, 15, 240, 363, 243, 362, 335, 122, 30, 579, 1238, 1260, 8, '2024-01-10 18:12:49', 'ali', NULL, NULL, 1, 1200, NULL, 0, 0, 0);
INSERT INTO "transaction"."t_spk" VALUES (41, 7, 'SPK-24-0041', '2024-01-11', NULL, 15, 240, 363, 243, 362, 335, 122, 30, 579, 1238, 1260, 8, '2024-01-10 18:52:33', 'ali', '2024-01-10 18:53:16', 'ali', 2, 1200, '0', 0, 1, 0);

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
    result_str := 'SO' || last_two_digits || to_char(seq_num, 'FM0000');

    RETURN result_str;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for generate_spk_number
-- ----------------------------
DROP FUNCTION IF EXISTS "transaction"."generate_spk_number"();
CREATE OR REPLACE FUNCTION "transaction"."generate_spk_number"()
  RETURNS "pg_catalog"."varchar" AS $BODY$
DECLARE
    seq_num INTEGER;
    result_str VARCHAR;
    last_two_digits VARCHAR;
BEGIN
    -- Get the last two digits of the current year
    SELECT RIGHT(EXTRACT(YEAR FROM CURRENT_DATE)::TEXT, 2) INTO last_two_digits;

    -- Get the next value from the sequence
    SELECT nextval('transaction.spk_numbering_seq') INTO seq_num;

    -- Format the result string
    result_str := 'SPK-' || last_two_digits || '-' || to_char(seq_num, 'FM0000');

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
    IF type_param = 0 THEN
        result_str := 'K' || last_two_digits || to_char(seq_num, 'FM0000');
    ELSIF type_param = 1 THEN
        result_str := 'K' || last_two_digits || to_char(seq_num, 'FM0000');
    ELSIF type_param = 2 THEN
        result_str := 'B' || last_two_digits || to_char(seq_num, 'FM0000');
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
SELECT setval('"transaction"."so_numbering_seq"', 39, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."spk_numbering_seq"', 41, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_delivery_order_id_seq"', 15, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_delivery_order_id_seq"', 6, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_sales_order_id_seq"', 7, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_sales_order_seq"', 29, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_mapping_index_price_seq"', 34, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_production_process_item_id_seq"', 43, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_sales_order_seq"', 32, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_spk_production_process_id_seq"', 6, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_spk_seq"', 41, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."travel_permit_numbering_seq"', 15, true);

-- ----------------------------
-- Primary Key structure for table t_delivery_order
-- ----------------------------
ALTER TABLE "transaction"."t_delivery_order" ADD CONSTRAINT "t_delivery_order_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_detail_delivery_order
-- ----------------------------
ALTER TABLE "transaction"."t_detail_delivery_order" ADD CONSTRAINT "t_detail_delivery_order_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_detail_production_process_item
-- ----------------------------
ALTER TABLE "transaction"."t_detail_production_process_item" ADD CONSTRAINT "t_spk_production_process_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_detail_sales_order
-- ----------------------------
ALTER TABLE "transaction"."t_detail_sales_order" ADD CONSTRAINT "t_detail_sales_order_temp_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_mapping_index_price
-- ----------------------------
ALTER TABLE "transaction"."t_mapping_index_price" ADD CONSTRAINT "t_mapping_index_price_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_production_process_item
-- ----------------------------
ALTER TABLE "transaction"."t_production_process_item" ADD CONSTRAINT "t_production_process_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_sales_order
-- ----------------------------
ALTER TABLE "transaction"."t_sales_order" ADD CONSTRAINT "t_sales_order_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_spk
-- ----------------------------
ALTER TABLE "transaction"."t_spk" ADD CONSTRAINT "t_spk_pkey" PRIMARY KEY ("id");
