<?php
/**
 * DokuWiki Plugin aichatlocal (Action Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Your Name <your@email.com>
 */

// must be run within Dokuwiki
if (!defined('DOKU_INC')) {
    die();
}

class action_plugin_aichatlocal extends \DokuWiki\Extension\ActionPlugin
{
    /** @inheritDoc */
    public function register(Doku_Event_Handler $controller)
    {
        $controller->register_hook('PLUGIN_AICHAT_MODEL_REGISTER', 'BEFORE', $this, 'handleModelRegister');
    }

    /**
     * Register our local model provider
     *
     * @param Doku_Event $event
     * @return void
     */
    public function handleModelRegister(Doku_Event $event)
    {
        $modelDir = __DIR__ . '/Model';
        if (is_dir($modelDir)) {
            $event->data[] = $modelDir;
        }
    }
}
