<?php
/**
 * Return the bootstrap class that formats the input field as invalid
 */
function isInvalid($param) {
    return !empty($param) ? 'is-invalid' : '';
}