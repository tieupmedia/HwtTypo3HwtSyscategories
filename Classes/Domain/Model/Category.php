<?php

namespace Hwt\HwtSyscategories\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Heiko Westermann <hwt3@gmx.de>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Category model
 *
 * @package TYPO3
 * @subpackage tx_hwtsyscategories
 * @author Heiko Westermann <hwt3@gmx.de>
 */
class Category extends \TYPO3\CMS\Extbase\Domain\Model\Category {
	/**
	 * @var \Hwt\HwtSyscategories\Domain\Model\Category|NULL
	 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
	 */
	protected $parent = NULL;

    /**
     * txHwtsyscategoriesImages
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $txHwtsyscategoriesImages;

    /**
     * txHwtsyscategoriesLink
     *
	 * @var string
	 */
	protected $txHwtsyscategoriesLink;


    /**
     * __construct
     * @return AbstractObject
     */
     public function __construct() {
         $this->txHwtsyscategoriesImages = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
     }




	/**
	 * Gets the parent category.
	 *
	 * @return \Hwt\HwtSyscategories\Domain\Model\Category|NULL the parent category
	 * @api
	 */
	public function getParent() {
		if ($this->parent instanceof \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy) {
			$this->parent->_loadRealInstance();
		}
		return $this->parent;
	}


    /**
      * Get txHwtsyscategoriesImages
      *
      * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage $txHwtsyscategoriesImages
      */
    public function getTxHwtsyscategoriesImages() {
            return $this->txHwtsyscategoriesImages;
    }


	/**
	 * Get link
	 *
	 * @return string
	 */
	public function getTxHwtsyscategoriesLink() {
		return $this->txHwtsyscategoriesLink;
	}
}
