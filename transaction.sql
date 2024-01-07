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

 Date: 08/01/2024 04:02:06
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
INSERT INTO "transaction"."t_detail_production_process_item" VALUES (2, 23, '2024-01-04', 'Dimas', 200, NULL, NULL, NULL, NULL, NULL, 'SW');
INSERT INTO "transaction"."t_detail_production_process_item" VALUES (3, 28, '2024-01-05', 'Apip', 1500, NULL, NULL, NULL, NULL, NULL, 'Test Progress Produksi');
INSERT INTO "transaction"."t_detail_production_process_item" VALUES (1, 23, NULL, 'Taufan', 12, NULL, NULL, NULL, NULL, NULL, '1dsdsd');
INSERT INTO "transaction"."t_detail_production_process_item" VALUES (4, 28, '2024-01-05', 'Jhon', 1200, NULL, NULL, NULL, NULL, NULL, 'Testt');
INSERT INTO "transaction"."t_detail_production_process_item" VALUES (5, 33, '2024-01-07', 'Jhon', 200, NULL, NULL, NULL, NULL, NULL, 'test sales order');

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
  "flag_plain" int4,
  "flag_print" int4,
  "flag_pounch" int4,
  "remarks" varchar(255) COLLATE "pg_catalog"."default",
  "top_ply_type" varchar(255) COLLATE "pg_catalog"."default",
  "top_flute_type" varchar(255) COLLATE "pg_catalog"."default",
  "top_substance_id" int4,
  "top_meas_unit" varchar(255) COLLATE "pg_catalog"."default",
  "top_meas_type" varchar(255) COLLATE "pg_catalog"."default",
  "top_length" float8,
  "top_width" float8,
  "top_height" float8,
  "top_flag_plain" int4,
  "top_flag_print" int4,
  "top_flag_pounch" int4,
  "top_remarks" varchar(255) COLLATE "pg_catalog"."default",
  "bottom_ply_type" varchar(255) COLLATE "pg_catalog"."default",
  "bottom_flute_type" varchar(255) COLLATE "pg_catalog"."default",
  "bottom_substance_id" int4,
  "bottom_meas_unit" varchar(255) COLLATE "pg_catalog"."default",
  "bottom_meas_type" varchar(255) COLLATE "pg_catalog"."default",
  "bottom_length" float8,
  "bottom_width" float8,
  "bottom_height" float8,
  "bottom_flag_plain" int4,
  "bottom_flag_print" int4,
  "bottom_flag_pounch" int4,
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
INSERT INTO "transaction"."t_detail_sales_order" VALUES (1, 26, 'Box', 2, 2000, 0, 'SW', 'B', 9, 'CM', 'UD', 10, 10, 10, 1, 1, 1, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-07 07:39:12', 'admin', NULL, NULL);
INSERT INTO "transaction"."t_detail_sales_order" VALUES (2, 26, 'Sheet', 1, 5000, 0, 'SW', 'B/C', 7, 'CM', 'UD', 12, 12, NULL, 1, NULL, 1, 'test sheet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-07 07:39:53', 'admin', NULL, NULL);

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
INSERT INTO "transaction"."t_production_process_item" VALUES (33, 33, 1, NULL, NULL, NULL, NULL, 1, 1);

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
INSERT INTO "transaction"."t_sales_order" VALUES (26, 'SO240033', 'Test PO BOX', 2, '2024-01-07', '2024-01-08', 1, 6, 1, '', 'Test Sales Order', '2024-01-07 07:34:44', 'admin', NULL, NULL);
INSERT INTO "transaction"."t_sales_order" VALUES (27, 'SO240034', 'test 21', 1, '2024-01-07', '2024-01-09', 1, 6, 0, '', 'TEST', '2024-01-07 12:53:48', 'admin', NULL, NULL);

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
  "l2" numeric(10,1),
  "p1" numeric(10,1),
  "l1" numeric(10,1),
  "p2" numeric(10,1),
  "t" numeric(10,1),
  "plape" numeric(10,1),
  "k" numeric(10,1),
  "netto_width" numeric(10,1),
  "netto_length" numeric(10,1),
  "bruto_length" numeric(10,1),
  "sheet_quantity" int4,
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default",
  "status" int4,
  "bruto_width" numeric(10,1),
  "current_process" varchar(255) COLLATE "pg_catalog"."default",
  "flag_print" int2,
  "flag_polos" int2,
  "flag_lem" int2,
  "flag_pounch" int2
)
;

-- ----------------------------
-- Records of t_spk
-- ----------------------------
INSERT INTO "transaction"."t_spk" VALUES (33, 2, 'SPK-24-0033', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10.0, 210.0, 10.0, NULL, '2024-01-07 12:23:03', 'admin', NULL, NULL, NULL, 20.0, NULL, NULL, NULL, NULL, NULL);

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
SELECT setval('"transaction"."so_numbering_seq"', 34, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."spk_numbering_seq"', 33, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_delivery_order_id_seq"', 13, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_delivery_order_id_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_sales_order_id_seq"', 2, true);

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
SELECT setval('"transaction"."t_production_process_item_id_seq"', 33, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_sales_order_seq"', 27, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_spk_production_process_id_seq"', 5, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_spk_seq"', 33, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."travel_permit_numbering_seq"', 13, true);

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
