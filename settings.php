<?php

$settings->add(
  new admin_setting_configtext(
    'ubpb_semapp/base_url',
    get_string('base_url', 'block_ubpb_semapp'),
    '',
    'https://semapp.ub.uni-paderborn.de',
    PARAM_RAW
  )
);
