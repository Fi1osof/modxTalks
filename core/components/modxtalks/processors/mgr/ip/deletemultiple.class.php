<?php
/**
 * Remove selected IP addresses
 *
 * @package modxtalks
 * @subpackage processors
 */
class modxTalksIpBlockMultipleProcessor extends modObjectProcessor {
    public $classKey = 'modxTalksIpBlock';
    public $languageTopics = array('modxtalks:default');

    public function process() {
        if (!$ids = $this->getProperty('ids',null)) {
            return $this->failure($this->modx->lexicon('modxtalks.post_err_ns_multiple'));
        }
        $ids = is_array($ids) ? $ids : explode(',',$ids);

        if (!$addresses = $this->modx->removeCollection('modxTalksIpBlock',array('id:IN' => $ids))) {
            return $this->failure($this->modx->lexicon('modxtalks.post_err_ns_multiple'));
        }

        return $this->success();
    }
}
return 'modxTalksIpBlockMultipleProcessor';