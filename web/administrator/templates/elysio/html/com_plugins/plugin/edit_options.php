<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_plugins
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

foreach ($this->fieldsets as $name => $fieldset)
{
	if (!isset($fieldset->repeat) || isset($fieldset->repeat) && $fieldset->repeat == false)
	{
		$label = !empty($fieldset->label) ? JText::_($fieldset->label) : JText::_('COM_PLUGINS_' . $fieldset->name . '_FIELDSET_LABEL', true);
		$optionsname = 'options-' . $fieldset->name;
		echo JHtml::_('bootstrap.addTab', 'myTab', $optionsname,  $label);

		if (isset($fieldset->description) && trim($fieldset->description))
		{
			echo '<p class="tip">' . $this->escape(JText::_($fieldset->description)) . '</p>';
		}

		$hidden_fields = '';

		foreach ($this->form->getFieldset($name) as $field)
		{
			if (!$field->hidden)
			{
				?>
				<div class="k-form-group">
                    <?php echo $field->label; ?>
                    <?php echo $field->input; ?>
				</div>
			<?php
			}
			else
			{
				$hidden_fields .= $field->input;
			}
		}
		echo $hidden_fields;

		echo JHtml::_('bootstrap.endTab');
	}
}