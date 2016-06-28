#
# Table structure for table 'sys_category'
#
CREATE TABLE sys_category (
	tx_hwtsyscategories_selectable tinyint(4) DEFAULT '1' NOT NULL,
	tx_hwtsyscategories_images int(11) unsigned DEFAULT '0',
    tx_hwtsyscategories_link varchar(1024) DEFAULT '' NOT NULL,
);