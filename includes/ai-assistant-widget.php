<?php
// AI assistant widget — floating button + chat panel.
// Included from footer.php so it's on every page that uses the shared footer.

if (!defined('BASE_URL')) {
    return;
}
?>

<link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/ai-assistant.css">

<button
    id="eduverseAiToggle"
    class="eduverse-ai-fab"
    type="button"
    aria-label="Open EduVerse AI Assistant"
    aria-expanded="false"
>
    <span class="eduverse-ai-fab-icon"><i class="bi bi-robot"></i></span>
    <span class="eduverse-ai-fab-label">EduVerse AI</span>
    <i class="bi bi-x-lg eduverse-ai-fab-close"></i>
</button>

<div class="eduverse-ai-panel" id="eduverseAiPanel" role="dialog" aria-label="EduVerse AI Assistant">

    <div class="eduverse-ai-header">

        <div class="eduverse-ai-header-icon">
            <i class="bi bi-robot"></i>
        </div>

        <div class="eduverse-ai-header-text">
            <h4>EduVerse AI</h4>
            <p><span class="eduverse-ai-status-dot"></span> Online</p>
        </div>

        <button class="eduverse-ai-close" id="eduverseAiClose" type="button" aria-label="Close chat">
            <i class="bi bi-x-lg"></i>
        </button>

    </div>

    <div class="eduverse-ai-messages" id="eduverseAiMessages">

        <div class="eduverse-ai-msg from-ai">
            Hi! I'm EduVerse AI 👋<br><br>
            I can help you find courses, books, and partner institutes on EduVerse, or think through what to learn next. What would you like to explore?
        </div>

        <div class="eduverse-ai-suggestions" id="eduverseAiSuggestions">
            <button type="button" data-prompt="Help me find a course">Find a course</button>
            <button type="button" data-prompt="Help me choose what to learn next">What should I learn next?</button>
            <button type="button" data-prompt="Tell me about the AI Career Advisor">Explore careers</button>
        </div>

    </div>

    <form class="eduverse-ai-input-row" id="eduverseAiForm">

        <textarea
            id="eduverseAiInput"
            rows="1"
            placeholder="Ask EduVerse AI..."
            aria-label="Message EduVerse AI"
        ></textarea>

        <button class="eduverse-ai-send" id="eduverseAiSend" type="submit" aria-label="Send message">
            <i class="bi bi-send-fill"></i>
        </button>

    </form>

</div>

<script>
    window.EDUVERSE_BASE_URL = "<?php echo BASE_URL; ?>";
</script>
<script src="<?php echo BASE_URL; ?>Assets/js/ai-assistant.js" defer></script>
