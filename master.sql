/*
 Navicat Premium Data Transfer

 Source Server         : psql_bimeta
 Source Server Type    : PostgreSQL
 Source Server Version : 160001 (160001)
 Source Host           : localhost:5432
 Source Catalog        : bimeta
 Source Schema         : master

 Target Server Type    : PostgreSQL
 Target Server Version : 160001 (160001)
 File Encoding         : 65001

 Date: 23/01/2024 00:45:40
*/


-- ----------------------------
-- Sequence structure for m_customer_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "master"."m_customer_seq";
CREATE SEQUENCE "master"."m_customer_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for m_goods_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "master"."m_goods_id_seq";
CREATE SEQUENCE "master"."m_goods_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for m_material_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "master"."m_material_seq";
CREATE SEQUENCE "master"."m_material_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for m_production_process_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "master"."m_production_process_id_seq";
CREATE SEQUENCE "master"."m_production_process_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for m_substance_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "master"."m_substance_seq";
CREATE SEQUENCE "master"."m_substance_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for m_supplier_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "master"."m_supplier_seq";
CREATE SEQUENCE "master"."m_supplier_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for m_customer
-- ----------------------------
DROP TABLE IF EXISTS "master"."m_customer";
CREATE TABLE "master"."m_customer" (
  "id" int4 NOT NULL DEFAULT nextval('"master".m_customer_seq'::regclass),
  "code" varchar(255) COLLATE "pg_catalog"."default",
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "address" varchar(255) COLLATE "pg_catalog"."default",
  "province_id" int4,
  "regency_id" int4,
  "district_id" int4,
  "village_id" int4,
  "phone_number" varchar COLLATE "pg_catalog"."default",
  "pic" int4,
  "tax_type" varchar(255) COLLATE "pg_catalog"."default",
  "customer_type" int4,
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of m_customer
-- ----------------------------
INSERT INTO "master"."m_customer" VALUES (1, 'METRO', 'PT METRO', 'JL MOH TOHA', NULL, NULL, NULL, NULL, NULL, NULL, 'V0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_customer" VALUES (2, 'MDN', 'PT MEDION', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_customer" VALUES (4, 'DSE', 'PT Daese Garmin', 'JL. IBRAHIM ADJIE NO. 90 BANDUNG-INDONESIA', NULL, NULL, NULL, NULL, '022-7200950', NULL, 'V1', NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for m_goods
-- ----------------------------
DROP TABLE IF EXISTS "master"."m_goods";
CREATE TABLE "master"."m_goods" (
  "id" int4 NOT NULL DEFAULT nextval('"master".m_goods_id_seq'::regclass),
  "type" int2,
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "ply_type" varchar(255) COLLATE "pg_catalog"."default",
  "flute_type" varchar(255) COLLATE "pg_catalog"."default",
  "substance" varchar(255) COLLATE "pg_catalog"."default",
  "meas_unit" varchar(53) COLLATE "pg_catalog"."default",
  "meas_type" varchar(53) COLLATE "pg_catalog"."default",
  "length" float8,
  "width" float8,
  "height" float8,
  "top_ply_type" varchar(255) COLLATE "pg_catalog"."default",
  "top_flute_type" varchar(255) COLLATE "pg_catalog"."default",
  "top_substance" varchar(255) COLLATE "pg_catalog"."default",
  "top_meas_unit" varchar(255) COLLATE "pg_catalog"."default",
  "top_length" float8,
  "top_width" float8,
  "top_height" float8,
  "bottom_ply_type" varchar(255) COLLATE "pg_catalog"."default",
  "bottom_flute_type" varchar(255) COLLATE "pg_catalog"."default",
  "bottom_substance" varchar(255) COLLATE "pg_catalog"."default",
  "bottom_meas_unit" varchar(255) COLLATE "pg_catalog"."default",
  "bottom_length" float8,
  "bottom_width" float8,
  "bottom_height" float8,
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default",
  "price" numeric(10,2),
  "top_price" numeric(10,2),
  "bottom_price" numeric(10,2)
)
;

-- ----------------------------
-- Records of m_goods
-- ----------------------------
INSERT INTO "master"."m_goods" VALUES (1, 2, 'BOX', 'SW', 'B', '125K/M/125K', 'CM', 'UL', 15, 17.5, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-18 12:58:04', 'ali', NULL, NULL, 2500.00, NULL, NULL);
INSERT INTO "master"."m_goods" VALUES (2, 1, 'SHEET', 'SF', 'E', 'SF ALLMED', 'MM', NULL, 125, 150, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-18 12:58:57', 'ali', NULL, NULL, 3000.00, NULL, NULL);
INSERT INTO "master"."m_goods" VALUES (3, 3, 'BOX BADAN TUTUP (AB)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SW', 'B', 'SF ALLMED', 'CM', 15, 15, 15, 'SF', 'B', 'SF ALLMED', 'CM', 15, 15, 15, '2024-01-18 13:01:31', 'ali', NULL, NULL, NULL, 3500.00, 4500.00);
INSERT INTO "master"."m_goods" VALUES (4, 4, 'BOX BADAN TUTUP (BB)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SF', 'B', 'SF ALLMED', 'CM', 15, 15, 15, 'SF', 'B', 'WK/M', 'CM', 10, 20, 20, '2024-01-18 13:03:03', 'ali', NULL, NULL, NULL, 2500.00, 2300.00);
INSERT INTO "master"."m_goods" VALUES (6, 2, 'CARTON/LAYER', 'DW', 'B', '200K/M3/200K', 'CM', 'UL', 85, 53, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-19 16:47:15', 'ali', NULL, NULL, 0.00, NULL, NULL);
INSERT INTO "master"."m_goods" VALUES (7, 1, 'CARTON/LAYER', 'SW', 'B', 'SW ALLMED', 'CM', NULL, 82, 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-19 16:51:53', 'ali', NULL, NULL, 0.00, NULL, NULL);
INSERT INTO "master"."m_goods" VALUES (5, 1, 'CARTON/LAYER', 'DW', 'B', '200K/M3/200K', 'CM', 'UL', 85, 53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-19 16:44:56', 'ali', '2024-01-21 13:49:25', 'ali', 0.00, NULL, NULL);

-- ----------------------------
-- Table structure for m_material
-- ----------------------------
DROP TABLE IF EXISTS "master"."m_material";
CREATE TABLE "master"."m_material" (
  "id" int8 NOT NULL DEFAULT nextval('"master".m_material_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "type" varchar(255) COLLATE "pg_catalog"."default",
  "paper_type" varchar(255) COLLATE "pg_catalog"."default",
  "gramature" varchar(255) COLLATE "pg_catalog"."default",
  "unit" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of m_material
-- ----------------------------
INSERT INTO "master"."m_material" VALUES (1, 'K125', 'KRAFT', 'BROWN KRAFT', '125', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (2, 'K150', 'KRAFT', 'BROWN KRAFT', '150', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (3, 'K200', 'KRAFT', 'BROWN KRAFT', '200', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (4, 'K275', 'KRAFT', 'BROWN KRAFT', '275', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (5, 'K300', 'KRAFT', 'BROWN KRAFT', '300', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (6, 'TL125', 'KRAFT', 'TEST LINER', '125', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (7, 'TL150', 'KRAFT', 'TEST LINER', '150', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (8, 'WK150 ', 'KRAFT', 'WHITE KRAFT', '150', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (9, 'WK200', 'KRAFT', 'WHITE KRAFT', '200', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (10, 'M125', 'MEDIUM', 'MEDIUM', '125', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (11, 'M150', 'MEDIUM', 'MEDIUM', '150', 'GSM', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for m_production_process
-- ----------------------------
DROP TABLE IF EXISTS "master"."m_production_process";
CREATE TABLE "master"."m_production_process" (
  "id" int4 NOT NULL DEFAULT nextval('"master".m_production_process_id_seq'::regclass),
  "process_name" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of m_production_process
-- ----------------------------
INSERT INTO "master"."m_production_process" VALUES (1, 'COR', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_production_process" VALUES (2, 'SLITTER', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_production_process" VALUES (3, 'SLOTTER', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_production_process" VALUES (4, 'FLEXO', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_production_process" VALUES (5, 'LONGWAY', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_production_process" VALUES (6, 'PRINT SLOT', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_production_process" VALUES (7, 'COAK', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_production_process" VALUES (8, 'POUNCH', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_production_process" VALUES (9, 'TRIPLE', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_production_process" VALUES (10, 'LAMINASI', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_production_process" VALUES (11, 'KANCING', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_production_process" VALUES (12, 'KUPAS', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_production_process" VALUES (13, 'LEM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_production_process" VALUES (14, 'MUAT', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for m_substance
-- ----------------------------
DROP TABLE IF EXISTS "master"."m_substance";
CREATE TABLE "master"."m_substance" (
  "id" int4 NOT NULL DEFAULT nextval('"master".m_substance_seq'::regclass),
  "code" varchar(255) COLLATE "pg_catalog"."default",
  "substance" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar COLLATE "pg_catalog"."default",
  "cor_code" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of m_substance
-- ----------------------------
INSERT INTO "master"."m_substance" VALUES (69, 'SW ALLMED TL', '125M3 TL', '2024-01-20 14:47:31', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (70, 'DW ALLMED TL', '125M5 TL', '2024-01-20 14:48:26', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (71, '125K/M TL', '125K/125M TL', '2024-01-20 14:50:33', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (72, '125K/M/125K TL', '125K/125M/125K TL', '2024-01-20 14:51:06', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (73, '125K/M2 TL', '125K/125M2 TL', '2024-01-20 14:51:26', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (74, '125K/125M3/125K TL', '125K/125M3/125K TL', '2024-01-20 14:51:38', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (75, '125K/M4 TL', '125K/125M4 TL', '2024-01-20 14:51:58', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (76, '125K/M5/125K TL', '125K/125M5/125K TL', '2024-01-20 14:52:10', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (77, '125K/M6 TL', '125K/125M6 TL', '2024-01-20 14:52:24', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (78, '150K/M/125K TL', '150K/125M/125K TL', '2024-01-20 14:52:36', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (79, '150K/M/150K TL', '150K/125M/150K TL', '2024-01-20 14:53:00', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (80, '150K/M2 TL', '150K/125M2 TL', '2024-01-20 14:53:17', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (81, '150K/M3/125K TL', '150K/125M3/125K TL', '2024-01-20 14:53:32', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (82, '150K/M3/150K TL', '150K/125M3/150K TL', '2024-01-20 14:53:43', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (83, '150K/M4 TL', '150K/125M4 TL', '2024-01-20 14:53:53', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (84, '150WK/M TL', '150WK/125M TL', '2024-01-20 14:54:06', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (85, '150WK/M/125K TL', '150WK/125M/125K TL', '2024-01-20 14:54:16', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (86, '150WK/M/150K TL', '150WK/125M/150K TL', '2024-01-20 14:54:26', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (87, '150WK/M/150WK TL', '150WK/125M/150WK TL', '2024-01-20 14:54:36', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (88, '150WK/M2 TL', '150WK/125M2 TL', '2024-01-20 14:54:53', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (89, '150WK/M3/150WK TL', '150WK/125M3/150WK TL', '2024-01-20 14:55:04', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (90, '150WK/M4 TL', '150WK/125M4 TL', '2024-01-20 14:55:14', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (91, '200K/M/125K TL', '200K/125M/125K TL', '2024-01-20 14:55:25', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (92, '200K/M/150K TL', '200K/125M/150K TL', '2024-01-20 14:55:35', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (93, '200K/M/200K TL', '200K/125M/200K TL', '2024-01-20 14:55:46', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (94, '200K/M2 TL', '200K/125M2 TL', '2024-01-20 14:55:58', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (95, '200K/M3/125K TL', '200K/125M3/125K TL', '2024-01-20 14:56:10', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (96, '200K/M3/150K TL', '200K/125M3/150K TL', '2024-01-20 14:56:44', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (97, '200K/M3/200K TL', '200K/125M3/200K TL', '2024-01-20 14:57:13', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (98, '200K/M4 TL', '200K/125M4 TL', '2024-01-20 14:57:24', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (99, '200WK/M3/200K TL', '200WK/125M3/200K TL', '2024-01-20 14:57:35', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (36, 'SW ALLMED', '125M3', '2024-01-20 14:29:40', 'ali', NULL, NULL, '+++');
INSERT INTO "master"."m_substance" VALUES (37, 'DW ALLMED', '125M5', '2024-01-20 14:30:40', 'ali', NULL, NULL, '+++++');
INSERT INTO "master"."m_substance" VALUES (60, '200K/M/200K', '200K/125M/200K', '2024-01-20 14:35:31', 'ali', NULL, NULL, 'D+D');
INSERT INTO "master"."m_substance" VALUES (61, '200K/M2', '200K/125M2', '2024-01-20 14:35:42', 'ali', NULL, NULL, 'D++');
INSERT INTO "master"."m_substance" VALUES (62, '200K/M3/125K', '200K/125M3/125K', '2024-01-20 14:35:51', 'ali', NULL, NULL, 'D+++A');
INSERT INTO "master"."m_substance" VALUES (63, '200K/M3/150K', '200K/125M3/150K', '2024-01-20 14:36:03', 'ali', NULL, NULL, 'D+++C');
INSERT INTO "master"."m_substance" VALUES (64, '200K/M3/200K', '200K/125M3/200K', '2024-01-20 14:36:14', 'ali', NULL, NULL, 'D+++D');
INSERT INTO "master"."m_substance" VALUES (65, '200K/M4', '200K/125M4', '2024-01-20 14:37:15', 'ali', NULL, NULL, 'D++++');
INSERT INTO "master"."m_substance" VALUES (38, '125M/M', '125K/125M', '2024-01-20 14:30:55', 'ali', NULL, NULL, 'A+');
INSERT INTO "master"."m_substance" VALUES (35, 'SF ALLMED', '125M2', '2024-01-20 14:25:28', 'ali', NULL, NULL, '++');
INSERT INTO "master"."m_substance" VALUES (66, '200WK/M3/200K', '200WK/125M3/200K', '2024-01-20 14:40:14', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (67, '300K/M3/300K', '300K/125M3/300K', '2024-01-20 14:41:04', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (68, 'SF ALLMED TL', '125M2 TL', '2024-01-20 14:46:00', 'ali', NULL, NULL, NULL);
INSERT INTO "master"."m_substance" VALUES (39, '125K/M/125K', '125K/125M/125K', '2024-01-20 14:31:10', 'ali', NULL, NULL, 'A+A');
INSERT INTO "master"."m_substance" VALUES (40, '125K/M2', '125K/125M2', '2024-01-20 14:31:22', 'ali', NULL, NULL, 'A++');
INSERT INTO "master"."m_substance" VALUES (41, '125K/M3/125K', '125K/125M3/125K', '2024-01-20 14:31:35', 'ali', NULL, NULL, 'A+++A');
INSERT INTO "master"."m_substance" VALUES (42, '125K/M4', '125K/125M4', '2024-01-20 14:31:48', 'ali', NULL, NULL, 'A++++');
INSERT INTO "master"."m_substance" VALUES (43, '125K/M5/125K', '125K/125M5/125K', '2024-01-20 14:32:00', 'ali', NULL, NULL, 'A+++++A');
INSERT INTO "master"."m_substance" VALUES (44, '125K/M6', '125K/125M6', '2024-01-20 14:32:12', 'ali', NULL, NULL, 'A++++++');
INSERT INTO "master"."m_substance" VALUES (45, '150K/M/125K', '150K/125M/125K', '2024-01-20 14:32:23', 'ali', NULL, NULL, 'C+A');
INSERT INTO "master"."m_substance" VALUES (46, '150K/M/150K', '150K/125M/150K', '2024-01-20 14:32:36', 'ali', NULL, NULL, 'C+C');
INSERT INTO "master"."m_substance" VALUES (47, '150K/M2', '150K/125M2', '2024-01-20 14:32:48', 'ali', NULL, NULL, 'C++');
INSERT INTO "master"."m_substance" VALUES (48, '150K/M3/125K', '150K/125M3/125K', '2024-01-20 14:33:05', 'ali', NULL, NULL, 'C+++A');
INSERT INTO "master"."m_substance" VALUES (49, '150K/M3/150K', '150K/125M3/150K', '2024-01-20 14:33:18', 'ali', NULL, NULL, 'C+++C');
INSERT INTO "master"."m_substance" VALUES (50, '150K/M4', '150K/125M4', '2024-01-20 14:33:30', 'ali', NULL, NULL, 'C++++');
INSERT INTO "master"."m_substance" VALUES (51, '150WK/125M', '150WK/125M', '2024-01-20 14:33:42', 'ali', NULL, NULL, 'WK+');
INSERT INTO "master"."m_substance" VALUES (52, '150WK/M/125K', '150WK/125M/125K', '2024-01-20 14:33:54', 'ali', NULL, NULL, 'WK+A');
INSERT INTO "master"."m_substance" VALUES (53, '150WK/1M/150K', '150WK/125M/150K', '2024-01-20 14:34:06', 'ali', NULL, NULL, 'WK+C');
INSERT INTO "master"."m_substance" VALUES (54, '150WK/M/150WK', '150WK/125M/150WK', '2024-01-20 14:34:19', 'ali', NULL, NULL, 'WK+WK');
INSERT INTO "master"."m_substance" VALUES (55, '150WK/M2', '150WK/125M2', '2024-01-20 14:34:30', 'ali', NULL, NULL, 'WK++');
INSERT INTO "master"."m_substance" VALUES (56, '150WK/M3/150WK', '150WK/125M3/150WK', '2024-01-20 14:34:41', 'ali', NULL, NULL, 'WK+++WK');
INSERT INTO "master"."m_substance" VALUES (57, '150WK/M4', '150WK/125M4', '2024-01-20 14:34:54', 'ali', NULL, NULL, 'WK++++');
INSERT INTO "master"."m_substance" VALUES (58, '200K/M/125K', '200K/125M/125K', '2024-01-20 14:35:06', 'ali', NULL, NULL, 'D+A');
INSERT INTO "master"."m_substance" VALUES (59, '200K/M/150K', '200K/125M/150K', '2024-01-20 14:35:18', 'ali', NULL, NULL, 'D+C');

-- ----------------------------
-- Table structure for m_supplier
-- ----------------------------
DROP TABLE IF EXISTS "master"."m_supplier";
CREATE TABLE "master"."m_supplier" (
  "id" int8 NOT NULL DEFAULT nextval('"master".m_supplier_seq'::regclass),
  "code" varchar(255) COLLATE "pg_catalog"."default",
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "address" varchar(255) COLLATE "pg_catalog"."default",
  "province_id" int8,
  "regency_id" int8,
  "district_id" int8,
  "village_id" int8,
  "phone_number" int8,
  "pic" varchar(255) COLLATE "pg_catalog"."default",
  "tax_type" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of m_supplier
-- ----------------------------
INSERT INTO "master"."m_supplier" VALUES (1, 'CIK', 'PT CAKRAWALA INDAH KIAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (2, 'CMN', 'PT CITRA MEGA NUSANTARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (3, 'ESK ', 'PT ENGGAL SUBUR KERTAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (4, 'MDI', 'PT MOUNT DREAMS INDONESIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (5, 'PB', 'PT PURA BARUTAMA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (6, 'PK', 'PT PAKERIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (7, 'PS', 'PELANGI STEEL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (8, 'SGB', 'PT SHINE GOLDEN BRIDGE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (9, 'SI', 'PT SINAR INDAH KERTAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (10, 'SPM', 'PT SUMBER PELITA MAKMUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (11, 'SPS', 'PT STAR PAPER SUPPLY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"master"."m_customer_seq"', 4, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"master"."m_goods_id_seq"', 7, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"master"."m_material_seq"', 13, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"master"."m_production_process_id_seq"', 14, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"master"."m_substance_seq"', 99, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"master"."m_supplier_seq"', 12, true);

-- ----------------------------
-- Primary Key structure for table m_customer
-- ----------------------------
ALTER TABLE "master"."m_customer" ADD CONSTRAINT "m_customer_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table m_goods
-- ----------------------------
ALTER TABLE "master"."m_goods" ADD CONSTRAINT "m_goods_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table m_material
-- ----------------------------
ALTER TABLE "master"."m_material" ADD CONSTRAINT "m_material_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table m_production_process
-- ----------------------------
ALTER TABLE "master"."m_production_process" ADD CONSTRAINT "m_process_poduction_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table m_substance
-- ----------------------------
ALTER TABLE "master"."m_substance" ADD CONSTRAINT "m_substance_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table m_supplier
-- ----------------------------
ALTER TABLE "master"."m_supplier" ADD CONSTRAINT "m_supplier_pkey" PRIMARY KEY ("id");
