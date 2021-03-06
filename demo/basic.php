<?php

/*
 * Copyright (C) 2015 FormHandler
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
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301  USA
 *
 * @author Marien den Besten
 */

include '../src/Loader.php';

use \FormHandler\FormHandler;
use \FormHandler\Field as Field;
use \FormHandler\Button as Button;
use \FormHandler\Validator as Validator;

\FormHandler\Configuration::set('fhtml_dir', '../src/FHTML/');

//create a new FormHandler object
$form = new FormHandler();

//some fields.. (see manual for examples)
Field\Text::set($form, 'Name', 'name')
    ->setRequired(true)
    ->setMaxlength(40)
    ->setWrapperAttribute('extraAttribute', 'basicField');

Field\Number::set($form, 'Age', 'age')
    ->setRequired(true)
    ->setValidator(new Validator\Integer())
    ->setMin(1)
    ->setMax(110)
    ->setStep(1);

Field\Select::set($form, 'Hobby', 'hobby');

//button for submitting
Button\Submit::set($form, 'Send');

//set the 'commit-after-form' function
$form->onCorrect(function($data, FormHandler $form)
{
    $hobbyText = $form->getField('hobby')->getOptionText($data['hobby']);
    return "Hello " . $data['name'] . ", you are " . $data['age'] . " years old and you have selected the hobby: $hobbyText";
});

//process all form results, needs to be done before any output has been done
$form_html = $form->flush();

//below is code to show the form

echo 'Basic FormHandler demo<hr>';
echo $form_html;
