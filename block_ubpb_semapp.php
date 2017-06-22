<?php

class block_ubpb_semapp extends block_base {

    public function init() {
        $this->title = get_string('title', 'block_ubpb_semapp');
    }

    public function get_content() {
      if ($this->content !== null) {
        return $this->content;
      }

      $this->content = new stdClass;

      if ($this->semapp_configured()) {
        $this->content->text = $this->semapp_content();
      } else {
        $this->content->text = get_string('config_required', 'block_ubpb_semapp');
      }

      return $this->content;
  }

  public function instance_allow_multiple() {
    return false;
  }

  public function hide_header() {
    return false; //return $this->semapp_configured();
  }

  function applicable_formats() {
    return array(
      'all'   => true,
      'mod'   => false,
      'my'    => false,
      'admin' => false,
      'tag'   => false
    );
  }

  function has_config() {
    return true;
  }

  private function semapp_configured() {
    return !empty($this->config->semapp_id) && !empty($this->config->semapp_access_token);
  }

  private function semapp_base_url() {
    $base_url = get_config('ubpb_semapp', 'base_url');

    if (empty($base_url)) {
      $base_url = "http://semapp.ub.uni-paderborn.de";
    }

    return $base_url;
  }

  private function semapp_content() {
    $open_str = get_string('open', 'block_ubpb_semapp');

    return <<<HTML
      <form method="get" action="{$this->semapp_base_url()}/apps/{$this->config->semapp_id}" target="_blank">
        <input type="hidden" name="token" value="{$this->config->semapp_access_token}">
        <input type="submit" name="submit" class="btn btn-primary btn-block" value="{$open_str}">
      </form>
HTML;
  }
}
