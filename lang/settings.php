<?php
/**
 * English language file for aichatlocal plugin
 *
 * @author Heinrich Krupp <heinrich.krupp@gmail.com>
 */

$lang['local_llm_baseurl'] = 'Base URL of your local LLM API endpoint (e.g., http://localhost:8000)';
$lang['local_llm_apikey'] = 'API key for local LLM authentication (leave empty if not required)';

// Error messages that might be shown in the admin interface
$lang['error_no_url'] = 'Local LLM base URL is not configured';
$lang['error_invalid_url'] = 'Invalid Local LLM base URL format';
$lang['error_connection'] = 'Could not connect to Local LLM API';

// Success messages
$lang['success_test'] = 'Successfully connected to Local LLM API';

// Help texts for configuration
$lang['local_llm_baseurl_help'] = 'Enter the full URL where your local LLM API is running. Make sure the API is OpenAI-compatible and includes the necessary endpoints.';
$lang['local_llm_apikey_help'] = 'If your local LLM requires authentication, enter the API key here. The key will be sent as a Bearer token in the Authorization header.';
