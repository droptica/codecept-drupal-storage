<?php

namespace Codeception\Module;

use Codeception\Module;

/**
 * Class SuiteVariablesStorage
 * @package Codeception\Module
 */
class SuiteVariablesStorage extends \Codeception\Module
{

  /**
   * Variables.
   *
   * @var array
   */
  protected $variables = array();

  /**
   * Nodes.
   *
   * @var array
   */
  protected $nodes = array();

  /**
   * Set variable to storage.
   *
   * @param $name
   * @param $value
   */
  public function setVariableToStorage($name, $value) {
    $this->variables[$name] = $value;
  }

  /**
   * Get variables from storage.
   *
   * @param array $names
   * @return array
   */
  public function getVariablesFromStorage($names = array()) {
    if (count($names) == 0) {
      return $this->variables;
    }
    $result = array();
    foreach ($names as $name) {
      $result[$name] = $this->getVariableFromStorage($name);
    }
    return $result;
  }

  /**
   * Get variable from storage.
   *
   * @param $name
   * @return null
   */
  public function getVariableFromStorage($name) {
    if (isset($this->variables[$name])) {
      return $this->variables[$name];
    }
    return NULL;
  }

  /**
   * Delete variable from storage.
   *
   * @param $name
   * @return array
   */
  public function deleteVariableFromStorage($name) {
    if (isset($this->variables[$name])) {
      unset($this->variables[$name]);
    }
  }

  /**
   * Append node to storage.
   *
   * @param $nid
   */
  public function appendNodeToStorage($nid) {
    $this->nodes[$nid] = node_load($nid);
  }

  /**
   * Get all nodes from storage.
   */
  public function getAllNodesFromStorage() {
    return $this->nodes;
  }

  /**
   * Get single node from storage.
   *
   * @param $nid
   * @return bool
   */
  public function getNodeFromStorage($nid) {
    if (isset($this->nodes[$nid])) {
      return $this->nodes[$nid];
    }
    return FALSE;
  }

  /**
   * Delete node from storage.
   *
   * @param $nid
   * @return bool
   */
  public function deleteNodeFromStorage($nid) {
    if (isset($this->nodes[$nid])) {
      unset($this->nodes[$nid]);
    }
  }

}