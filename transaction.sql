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

 Date: 23/01/2024 00:45:20
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
  "updated_by" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_detail_sales_order
-- ----------------------------
INSERT INTO "transaction"."t_detail_sales_order" VALUES (32, 45, 5000, 1, '-', '2024-01-22 16:12:51', 'ali', NULL, 1, NULL);
INSERT INTO "transaction"."t_detail_sales_order" VALUES (33, 45, 2000, 0, '-', '2024-01-22 16:13:20', 'ali', NULL, 7, NULL);
INSERT INTO "transaction"."t_detail_sales_order" VALUES (34, 45, 2000, 1, '-', '2024-01-22 16:13:38', 'ali', NULL, 3, NULL);
INSERT INTO "transaction"."t_detail_sales_order" VALUES (35, 45, 2000, 1, '-', '2024-01-22 16:13:51', 'ali', NULL, 4, NULL);

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
INSERT INTO "transaction"."t_mapping_index_price" VALUES (35, 'SW', 'B', 36, 4517.0, '2024-01-24', NULL, NULL, NULL, NULL);
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
INSERT INTO "transaction"."t_sales_order" VALUES (45, 'SO240052', 'PO-12345', 4, '2024-01-22', '2024-01-26', 2, 6, 2, NULL, 'TEST', '2024-01-22 16:12:35', 'ali', NULL, NULL, 'JL. IBRAHIM ADJIE WISNU, BANDUNG - JAWA BARAT');

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
  "top_quantity" int4,
  "top_length" numeric(10,0),
  "top_width" numeric(10,0),
  "top_height" numeric(10,0),
  "top_l2" numeric(10,0),
  "top_p1" numeric(10,0),
  "top_l1" numeric(10,0),
  "top_p2" numeric(10,0),
  "top_t" numeric(10,0),
  "top_plape" numeric(10,0),
  "top_k" numeric(10,0),
  "top_netto_width" numeric(10,0),
  "top_netto_length" numeric(10,0),
  "top_bruto_width" numeric(10,0),
  "top_bruto_length" numeric(10,0),
  "top_sheet_quantity" int4,
  "top_flag_stitching" int2,
  "top_flag_glue" int2,
  "top_flag_pounch" int2,
  "bottom_quantity" int4,
  "bottom_length" numeric(10,0),
  "bottom_width" numeric(10,0),
  "bottom_height" numeric(10,0),
  "bottom_l2" numeric(10,0),
  "bottom_p1" numeric(10,0),
  "bottom_l1" numeric(10,0),
  "bottom_p2" numeric(10,0),
  "bottom_t" numeric(10,0),
  "bottom_plape" numeric(10,0),
  "bottom_k" numeric(10,0),
  "bottom_netto_width" numeric(10,0),
  "bottom_netto_length" numeric(10,0),
  "bottom_bruto_width" numeric(10,0),
  "bottom_bruto_length" numeric(10,0),
  "bottom_sheet_quantity" int4,
  "bottom_flag_stitching" int2,
  "bottom_flag_glue" int2,
  "bottom_flag_pounch" int2,
  "status" int4,
  "current_process" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_spk
-- ----------------------------
INSERT INTO "transaction"."t_spk" VALUES (61, 35, 'SPK-BB-24-0065', '2024-01-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 17, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 71, 71, 717, 17, NULL, NULL, NULL, 1000, 17, 17, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 71, 717, 17, 17, 17, NULL, NULL, NULL, 2, '0', '2024-01-22 17:01:09', 'ali', '2024-01-22 17:39:26', 'ali');
INSERT INTO "transaction"."t_spk" VALUES (60, 34, 'SPK-AB-24-0064', '2024-01-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 16, 16, 16, 16, NULL, NULL, NULL, 197, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 170, 170, 150, 1128, 200, NULL, NULL, NULL, 2, '0', '2024-01-22 16:59:36', 'ali', '2024-01-22 17:39:36', 'ali');
INSERT INTO "transaction"."t_spk" VALUES (59, 33, 'SPK-A-24-0063', '2024-01-23', NULL, 1000, NULL, 510, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 510, 820, 1050, 2480, 84, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '0', '2024-01-22 16:46:23', 'ali', '2024-01-22 17:39:46', 'ali');
INSERT INTO "transaction"."t_spk" VALUES (58, 32, 'SPK-B-24-0062', '2024-01-23', NULL, 2000, 150, 175, 150, 173, 150, 175, 149, 150, 88, 30, 326, 677, 700, 695, 1000, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '0', '2024-01-22 16:42:56', 'ali', '2024-01-22 17:39:55', 'ali');

-- ----------------------------
-- Table structure for t_stock_finish_goods
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_stock_finish_goods";
CREATE TABLE "transaction"."t_stock_finish_goods" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_stock_finish_goods_id_seq'::regclass),
  "date" timestamp(0),
  "source_from" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default",
  "quantity" int4,
  "goods_id" int4
)
;

-- ----------------------------
-- Records of t_stock_finish_goods
-- ----------------------------

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
    result_str := prefix_str || '-' || last_two_digits || '-' || LPAD(seq_num::TEXT, 4, '0');

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
SELECT setval('"transaction"."so_numbering_seq"', 52, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."spk_numbering_seq"', 65, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_delivery_order_id_seq"', 23, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_delivery_order_id_seq"', 21, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_sales_order_id_seq"', 35, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_sales_order_seq"', 29, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_mapping_index_price_seq"', 77, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_production_process_item_id_seq"', 79, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_sales_order_seq"', 45, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_spk_production_process_id_seq"', 12, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_spk_seq"', 61, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_stock_finish_goods_id_seq"', 11, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."travel_permit_numbering_seq"', 23, true);

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

-- ----------------------------
-- Primary Key structure for table t_stock_finish_goods
-- ----------------------------
ALTER TABLE "transaction"."t_stock_finish_goods" ADD CONSTRAINT "t_stock_finish_goods_pkey" PRIMARY KEY ("id");
