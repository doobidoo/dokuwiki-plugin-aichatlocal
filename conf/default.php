<?php
$conf['local_llm_baseurl'] = 'http://localhost:8000';
$conf['local_llm_apikey'] = '';

// conf/metadata.php
<?php
$meta['local_llm_baseurl'] = array('string');
$meta['local_llm_apikey'] = array('password');

// lang/en/settings.php
<?php
$lang['local_llm_baseurl'] = 'Base URL of your local LLM API endpoint';
$lang['local_llm_apikey'] = 'API key for local LLM (if required)';
