<?php

/**
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
 */

namespace FormHandler\Validator;

/**
 * Phone Dutch
 *
 * @author Marien den Besten
 */
class PhoneDutch extends Validator implements ValidatorInterface
{
    public function validate($value)
    {
        $regex = '/^[0-9]{2,4}[-]?[0-9]{6,8}$/';
        $value = str_replace(array(' ', '-'), array('', ''), $value);
        return (strlen($value) == 10 && preg_match($regex, $value));
    }
}
