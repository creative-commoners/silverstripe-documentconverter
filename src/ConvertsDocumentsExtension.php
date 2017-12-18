<?php

namespace SilverStripe\DocumentConverter;

use SilverStripe\Assets\File;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

class ConvertsDocumentsExtension extends DataExtension {

	public static $has_one = array(
		'ImportedFromFile' => File::class
	);

	function updateCMSFields(FieldList $fields) {
		/*
		// Currently the ToggleCompositeField plays badly with TreeDropdownField formatting.
		// Could be switched back in the future, if this is fixed.
		$fields->addFieldToTab('Root.Main', 
			ToggleCompositeField::create('Import', 'Import', array(
				new DocumentImportField()
			))->setHeadingLevel(4)
		);
		 */
		$fields->findOrMakeTab(
			'Root.Import',
			_t(__CLASS__ . '.ImportTab', 'Import')
		);
		$fields->addFieldToTab('Root.Import', new DocumentImportField());
	}
}
