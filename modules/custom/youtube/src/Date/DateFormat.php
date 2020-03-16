<?php
/**
 * Defines the dateFormat class.
 */
class DateFormat implements ApiResponseTimeInterface {
  /**
   * {@inheritdoc}
   */
  public function dateFormat() {
    return date("y-m-d");
  }
}