<?php

class block_ubpb_semapp_edit_form extends block_edit_form {

    protected function specific_definition($mform) {
        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));

        $mform->addElement('static', 'description', get_string('description', 'block_ubpb_semapp'));

        $mform->addElement('text', 'config_semapp_id', get_string('semapp_id', 'block_ubpb_semapp'));
        $mform->setType('config_semapp_id', PARAM_RAW);
        $mform->addRule('config_semapp_id', null, 'required', null, 'client');

        $mform->addElement('text', 'config_semapp_access_token', get_string('semapp_access_token', 'block_ubpb_semapp'));
        $mform->setType('config_semapp_access_token', PARAM_RAW);
        $mform->addRule('config_semapp_access_token', null, 'required', null, 'client');
    }
}
