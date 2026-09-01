<?php

if (!defined('EDUVERSE_AI_CONFIG_LOADED')) {
    define('EDUVERSE_AI_CONFIG_LOADED', true);

    if (!defined('GROQ_API_KEY') && file_exists(__DIR__ . '/ai-key.local.php')) {
        require __DIR__ . '/ai-key.local.php';
    }

    if (!defined('GROQ_API_KEY')) {
        $envKey = getenv('GROQ_API_KEY');
        define('GROQ_API_KEY', $envKey !== false ? $envKey : '');
    }

    if (!defined('GROQ_API_ENDPOINT')) {
        define('GROQ_API_ENDPOINT', 'https://api.groq.com/openai/v1/chat/completions');
    }

    if (!defined('GROQ_MODEL')) {
        define('GROQ_MODEL', 'openai/gpt-oss-120b');
    }

    if (!defined('EDUVERSE_AI_MAX_MESSAGE_LENGTH')) {
        define('EDUVERSE_AI_MAX_MESSAGE_LENGTH', 800);
    }
    if (!defined('EDUVERSE_AI_MAX_HISTORY_TURNS')) {
        define('EDUVERSE_AI_MAX_HISTORY_TURNS', 8);
    }
    if (!defined('EDUVERSE_AI_TIMEOUT_SECONDS')) {
        define('EDUVERSE_AI_TIMEOUT_SECONDS', 20);
    }
}
