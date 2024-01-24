<?php

if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

/*
 * Add Field to System Categories
 */
$temporaryColumns = array(
	'tx_hwtsyscategories_selectable' => array (
		'exclude' => 1,
		'label' => 'LLL:EXT:hwt_syscategories/Resources/Private/Language/locallang_db.xlf:sys_category.tx_hwtsyscategories_selectable',
		'config' => array (
			'type' => 'check',
		)
	),

	'tx_hwtsyscategories_images' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:hwt_syscategories/Resources/Private/Language/locallang_db.xlf:sys_category.tx_hwtsyscategories_images',
		'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
			'tx_hwtsyscategories_images',
			array(
				'appearance' => array(
					'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
				),
				// custom configuration for displaying fields in the overlay/reference table
				// to use the imageoverlayPalette instead of the basicoverlayPalette
				'overrideChildTca' => array(
					'0' => array(
						'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
						'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
					),
				),
				'maxitems' => 1,
			),
			$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
		)
	),

    'tx_hwtsyscategories_link' => array(
        'exclude' => 1,
        'label' => 'LLL:EXT:hwt_syscategories/Resources/Private/Language/locallang_db.xlf:sys_category.tx_hwtsyscategories_link',
        'config' => array(
            'type' => 'input',
            'renderType' => 'inputLink',
            'size' => 50,
            'max' => 1024,
            'eval' => 'trim',
        )
    ),
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
	'sys_category',
	$temporaryColumns,
	TRUE
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
	'sys_category',
	'1',
	'tx_hwtsyscategories_selectable',
	'after:hidden'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'sys_category',
	'tx_hwtsyscategories_images',
	'',
	'after:description'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'sys_category',
	'tx_hwtsyscategories_link',
	'',
	'after:tx_hwtsyscategories_images'
);