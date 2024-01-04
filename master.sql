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

 Date: 04/01/2024 15:21:12
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
INSERT INTO "master"."m_material" VALUES (1, 'KRAFT 125', 'KRAFT', 'BROWN KRAFT', '125', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (2, 'KRAFT 150', 'KRAFT', 'BROWN KRAFT', '150', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (3, 'KRAFT 200', 'KRAFT', 'BROWN KRAFT', '200', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (4, 'KRAFT 275', 'KRAFT', 'BROWN KRAFT', '275', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (5, 'KRAFT 300', 'KRAFT', 'BROWN KRAFT', '300', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (6, 'TEST LINER 125', 'KRAFT', 'TEST LINER', '125', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (7, 'TEST LINER 150', 'KRAFT', 'TEST LINER', '150', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (8, 'WHITE KRAFT 150 ', 'KRAFT', 'WHITE KRAFT', '150', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (9, 'WHITE KRAFT 200', 'KRAFT', 'WHITE KRAFT', '200', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (10, 'MEDIUM 125', 'MEDIUM', 'MEDIUM', '125', 'GSM', NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_material" VALUES (11, 'MEDIUM 150', 'MEDIUM', 'MEDIUM', '150', 'GSM', NULL, NULL, NULL, NULL);

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
INSERT INTO "master"."m_substance" VALUES (1, 'SF ALLMED', '125 M2', NULL, NULL, NULL, NULL, '++');
INSERT INTO "master"."m_substance" VALUES (2, '125K/M', '125K/125M', NULL, NULL, NULL, NULL, '+A');
INSERT INTO "master"."m_substance" VALUES (3, 'WK/M', '150WK/125M', NULL, NULL, NULL, NULL, '+WK');
INSERT INTO "master"."m_substance" VALUES (4, 'WK/M/WK', '150WK/125M/150WK', NULL, NULL, NULL, NULL, 'WK+WK');
INSERT INTO "master"."m_substance" VALUES (5, 'SW ALLMED', '125 M3', NULL, NULL, NULL, NULL, '+++');
INSERT INTO "master"."m_substance" VALUES (6, '125K/M2', '125K/125M2', NULL, NULL, NULL, NULL, 'A++');
INSERT INTO "master"."m_substance" VALUES (7, '125K/M/125K', '125K/125M/125K', NULL, NULL, NULL, NULL, 'A+A');
INSERT INTO "master"."m_substance" VALUES (8, '150K/M2', '150K/125M2', NULL, NULL, NULL, NULL, 'C++');
INSERT INTO "master"."m_substance" VALUES (9, '150K/M/125K', '150K/125M/125K', NULL, NULL, NULL, NULL, 'C+A');
INSERT INTO "master"."m_substance" VALUES (10, '150K/M/150K', '150K/125M/150K', NULL, NULL, NULL, NULL, 'C+C');
INSERT INTO "master"."m_substance" VALUES (11, '200K/M2', '200K/125M2', NULL, NULL, NULL, NULL, 'D++');
INSERT INTO "master"."m_substance" VALUES (12, '200K/M/125K', '200K/125M/125K', NULL, NULL, NULL, NULL, 'D+A');
INSERT INTO "master"."m_substance" VALUES (13, '200K/M/150K', '200K/125M/150K', NULL, NULL, NULL, NULL, 'D+C');
INSERT INTO "master"."m_substance" VALUES (14, '200K/M/200K', '200K/125M/200K', NULL, NULL, NULL, NULL, 'D+D');
INSERT INTO "master"."m_substance" VALUES (15, 'WK/M2', '150WK/125M2', NULL, NULL, NULL, NULL, 'WK++');
INSERT INTO "master"."m_substance" VALUES (16, 'WK/M/150K', '150WK/125M/150K', NULL, NULL, NULL, NULL, 'WK+C');
INSERT INTO "master"."m_substance" VALUES (17, 'WK/M/125K', '150WK/125M/125K', NULL, NULL, NULL, NULL, 'WK+A');
INSERT INTO "master"."m_substance" VALUES (18, 'DW ALLMED', '125 M5', NULL, NULL, NULL, NULL, '+++++');
INSERT INTO "master"."m_substance" VALUES (19, '125K/M4', '125K/125M4', NULL, NULL, NULL, NULL, 'A++++');
INSERT INTO "master"."m_substance" VALUES (20, '125K/M3/125K', '125K/125M3/125K', NULL, NULL, NULL, NULL, 'A+++A');
INSERT INTO "master"."m_substance" VALUES (21, '150K/M4', '150K/125M4', NULL, NULL, NULL, NULL, 'C++++');
INSERT INTO "master"."m_substance" VALUES (22, '150K/M3/125K', '150K/125M3/125K', NULL, NULL, NULL, NULL, 'C+++A');
INSERT INTO "master"."m_substance" VALUES (23, '150K/M3/150K', '150K/125M3/150K', NULL, NULL, NULL, NULL, 'C+++C');
INSERT INTO "master"."m_substance" VALUES (24, '200K/M4', '200K/125M4', NULL, NULL, NULL, NULL, 'D++++');
INSERT INTO "master"."m_substance" VALUES (25, '200K/M3/125K', '200K/125M3/125K', NULL, NULL, NULL, NULL, 'D+++A');
INSERT INTO "master"."m_substance" VALUES (26, '200K/M3/150K', '200K/125M3/150K', NULL, NULL, NULL, NULL, 'D+++C');
INSERT INTO "master"."m_substance" VALUES (27, '200K/M3/200K', '200K/125M3/200K', NULL, NULL, NULL, NULL, 'D+++D');
INSERT INTO "master"."m_substance" VALUES (28, '150WK/M4', '150WK/125M4', NULL, NULL, NULL, NULL, 'WK++++');
INSERT INTO "master"."m_substance" VALUES (29, 'WK/M3/WK', '150WK/125M3/150WK', NULL, NULL, NULL, NULL, 'WK+++WK');
INSERT INTO "master"."m_substance" VALUES (30, '200WK/M/200K', '200WK/125M3/200K', NULL, NULL, NULL, NULL, '200WK+D');
INSERT INTO "master"."m_substance" VALUES (31, '300K/M3/300K', '300K/125M3/300K', NULL, NULL, NULL, NULL, 'G+++G');
INSERT INTO "master"."m_substance" VALUES (32, '125K/M6', '125K/125M6', NULL, NULL, NULL, NULL, 'A++++++');
INSERT INTO "master"."m_substance" VALUES (33, '125K/M5/125K', '125K/125M5/125K', NULL, NULL, NULL, NULL, 'A+++++A');

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
  "customer_type" int4,
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of m_supplier
-- ----------------------------
INSERT INTO "master"."m_supplier" VALUES (1, 'CIK', 'PT CAKRAWALA INDAH KIAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (2, 'CMN', 'PT CITRA MEGA NUSANTARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (3, 'ESK ', 'PT ENGGAL SUBUR KERTAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (4, 'MDI', 'PT MOUNT DREAMS INDONESIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (5, 'PB', 'PT PURA BARUTAMA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (6, 'PK', 'PT PAKERIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (7, 'PS', 'PELANGI STEEL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (8, 'SGB', 'PT SHINE GOLDEN BRIDGE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (9, 'SI', 'PT SINAR INDAH KERTAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (10, 'SPM', 'PT SUMBER PELITA MAKMUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "master"."m_supplier" VALUES (11, 'SPS', 'PT STAR PAPER SUPPLY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"master"."m_customer_seq"', 2, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"master"."m_material_seq"', 11, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"master"."m_production_process_id_seq"', 14, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"master"."m_substance_seq"', 33, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"master"."m_supplier_seq"', 11, true);

-- ----------------------------
-- Primary Key structure for table m_customer
-- ----------------------------
ALTER TABLE "master"."m_customer" ADD CONSTRAINT "m_customer_pkey" PRIMARY KEY ("id");

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
