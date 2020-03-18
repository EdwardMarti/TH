<?php

/**
 * PHPExcel_Writer_Excel5_Xf
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel5
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    ##VERSION##, ##DATE##
 */

// Original file header of PEAR::Spreadsheet_Excel_Writer_Format (used as the base for this class):
// -----------------------------------------------------------------------------------------
// /*
// *  Module written/ported by Xavier Noguer <xnoguer@rezebra.com>
// *
// *  The majority of this is _NOT_ my code.  I simply ported it from the
// *  PERL Spreadsheet::WriteExcel module.
// *
// *  The author of the Spreadsheet::WriteExcel module is John McNamara
// *  <jmcnamara@cpan.org>
// *
// *  I _DO_ maintain this code, and John McNamara has nothing to do with the
// *  porting of this code to PHP.  Any questions directly related to this
// *  class library should be directed to me.
// *
// *  License Information:
// *
// *    Spreadsheet_Excel_Writer:  A library for generating Excel Spreadsheets
// *    Copyright (c) 2002-2003 Xavier Noguer xnoguer@rezebra.com
// *
// *    This library is free software; you can redistribute it and/or
// *    modify it under the terms of the GNU Lesser General Public
// *    License as published by the Free Software Foundation; either
// *    version 2.1 of the License, or (at your option) any later version.
// *
// *    This library is distributed in the hope that it will be useful,
// *    but WITHOUT ANY WARRANTY; without even the implied warranty of
// *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
// *    Lesser General Public License for more details.
// *
// *    You should have received a copy of the GNU Lesser General Public
// *    License along with this library; if not, write to the Free Software
// *    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
// */
class PHPExcel_Writer_Excel5_Xf
{
    /**
     * Style XF or a cell XF ?
     *
     * @var boolean
     */
    private $isStyleXf;

    /**
     * Index to the FONT record. Index 4 does not exist
     * @var integer
     */
    private $fontIndex;

    /**
     * An index (2 bytes) to a FORMAT record (number format).
     * @var integer
     */
    private $numberFormatIndex;

    /**
     * 1 bit, apparently not used.
     * @var integer
     */
    private $textJustLast;

    /**
     * The cell's foreground color.
     * @var integer
     */
    private $foregroundColor;

    /**
     * The cell's background color.
     * @var integer
     */
    private $backgroundColor;

    /**
     * Color of the bottom border of the cell.
     * @var integer
     */
    private $bottomBorderColor;

    /**
     * Color of the top border of the cell.
     * @var integer
     */
    private $topBorderColor;

    /**
    * Color of the left border of the cell.
    * @var integer
    */
    private $leftBorderColor;

    /**
     * Color of the right border of the cell.
     * @var integer
     */
    private $rightBorderColor;

    /**
     * Constructor
     *
     * @access public
     * @param PHPExcel_Style    The XF format
     */
    public function __construct(PHPExcel_Style $style = null)
    {
        $this->isStyleXf =     false;
        $this->fontIndex = 0;

        $this->numberFormatIndex     = 0;

        $this->textJustLast  = 0;

        $this->foregroundColor       = 0x40;
        $this->backgroundColor       = 0x41;

        $this->_diag           = 0;

        $this->bottomBorderColor   = 0x40;
        $this->topBorderColor      = 0x40;
        $this->leftBorderColor     = 0x40;
        $this->rightBorderColor    = 0x40;
        $this->_diag_color     = 0x40;
        $this->_style = $style;

    }


    /**
     * Generate an Excel BIFF XF record (style or cell).
     *
     * @return string The XF record
     */
    public function writeXf()
    {
        // Set the type of the XF record and some of the attributes.
        if ($this->isStyleXf) {
            $style = 0xFFF5;
        } else {
            $style   = self::mapLocked($this->_style->getProtection()->getLocked());
            $style  |= self::mapHidden($this->_style->getProtection()->getHidden()) << 1;
        }

        // Flags to indicate if attributes have been set.
        $atr_num     = ($this->numberFormatIndex != 0)?1:0;
        $atr_fnt     = ($this->fontIndex != 0)?1:0;
        $atr_alc     = ((int) $this->_style->getAlignment()->getWrapText()) ? 1 : 0;
        $atr_bdr     = (self::mapBorderStyle($this->_style->getBorders()->getBottom()->getBorderStyle())   ||
                        self::mapBorderStyle($this->_style->getBorders()->getTop()->getBorderStyle())      ||
                        self::mapBorderStyle($this->_style->getBorders()->getLeft()->getBorderStyle())     ||
                        self::mapBorderStyle($this->_style->getBorders()->getRight()->getBorderStyle()))?1:0;
        $atr_pat     = (($this->foregroundColor != 0x40) ||
                        ($this->backgroundColor != 0x41) ||
                        self::mapFillType($this->_style->getFill()->getFillType()))?1:0;
        $atr_prot    = self::mapLocked($this->_style->getProtection()->getLocked())
                        | self::mapHidden($this->_style->getProtection()->getHidden());

        // Zero the default border colour if the border has not been set.
        if (self::mapBorderStyle($this->_style->getBorders()->getBottom()->getBorderStyle()) == 0) {
            $this->bottomBorderColor = 0;
        }
        if (self::mapBorderStyle($this->_style->getBorders()->getTop()->getBorderStyle())  == 0) {
            $this->topBorderColor = 0;
        }
        if (self::mapBorderStyle($this->_style->getBorders()->getRight()->getBorderStyle()) == 0) {
            $this->rightBorderColor = 0;
        }
        if (self::mapBorderStyle($this->_style->getBorders()->getLeft()->getBorderStyle()) == 0) {
            $this->leftBorderColor = 0;
        }
        if (self::mapBorderStyle($this->_style->getBorders()->getDiagonal()->getBorderStyle()) == 0) {
            $this->_diag_color = 0;
        }

        $record = 0x00E0;              // Record identifier
        $length = 0x0014;              // Number of bytes to follow

        $ifnt = $this->fontIndex;   // Index to FONT record
      