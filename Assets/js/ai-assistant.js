(function () {
    "use strict";

    document.addEventListener("DOMContentLoaded", function () {

        const fab       = document.getElementById("eduverseAiToggle");
        const panel     = document.getElementById("eduverseAiPanel");
        const closeBtn  = document.getElementById("eduverseAiClose");
        const messages  = document.getElementById("eduverseAiMessages");
        const form      = document.getElementById("eduverseAiForm");
        const input     = document.getElementById("eduverseAiInput");
        const sendBtn   = document.getElementById("eduverseAiSend");

        if (!fab || !panel || !form || !input) {
            return; // widget markup not present on this page
        }

        const endpoint = (window.EDUVERSE_BASE_URL || "/") + "api/ai-chat.php";

        // In-memory conversation history for this open session only.
        let history = [];
        let isSending = false;

        function openPanel() {
            panel.classList.add("is-open");
            fab.classList.add("is-open");
            fab.setAttribute("aria-expanded", "true");
            input.focus();
        }

        function closePanel() {
            panel.classList.remove("is-open");
            fab.classList.remove("is-open");
            fab.setAttribute("aria-expanded", "false");
        }

        fab.addEventListener("click", function () {
            if (panel.classList.contains("is-open")) {
                closePanel();
            } else {
                openPanel();
            }
        });

        if (closeBtn) {
            closeBtn.addEventListener("click", closePanel);
        }

        // Escapes HTML, then allows a very small, safe subset of
        // formatting (bold + line breaks) rather than pulling in
        // a full markdown dependency.
        function formatMessage(text) {
            const div = document.createElement("div");
            div.textContent = text;
            let safe = div.innerHTML;
            safe = safe.replace(/\*\*(.+?)\*\*/g, "<strong>$1</strong>");
            safe = safe.replace(/\n/g, "<br>");
            return safe;
        }

        function addMessage(role, text) {
            const bubble = document.createElement("div");
            bubble.className = "eduverse-ai-msg " +
                (role === "user" ? "from-user" : role === "error" ? "from-error" : "from-ai");
            bubble.innerHTML = formatMessage(text);
            messages.appendChild(bubble);
            messages.scrollTop = messages.scrollHeight;
            return bubble;
        }

        function showTyping() {
            const typing = document.createElement("div");
            typing.className = "eduverse-ai-typing";
            typing.id = "eduverseAiTypingIndicator";
            typing.innerHTML = "<span></span><span></span><span></span>";
            messages.appendChild(typing);
            messages.scrollTop = messages.scrollHeight;
        }

        function hideTyping() {
            const typing = document.getElementById("eduverseAiTypingIndicator");
            if (typing) {
                typing.remove();
            }
        }

        async function sendMessage(text) {
            if (isSending) {
                return;
            }
            isSending = true;
            sendBtn.disabled = true;

            addMessage("user", text);
            showTyping();

            try {
                const response = await fetch(endpoint, {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({
                        message: text,
                        history: history
                    })
                });

                let data;
                try {
                    data = await response.json();
                } catch (parseErr) {
                    data = null;
                }

                hideTyping();

                if (!response.ok || !data || !data.reply) {
                    const errorText = (data && data.error)
                        ? data.error
                        : "Sorry, EduVerse AI is temporarily unavailable. Please try again in a moment.";
                    addMessage("error", errorText);
                    isSending = false;
                    sendBtn.disabled = false;
                    return;
                }

                addMessage("assistant", data.reply);
                history.push({ role: "user", content: text });
                history.push({ role: "assistant", content: data.reply });

            } catch (networkErr) {
                hideTyping();
                addMessage("error", "Sorry, EduVerse AI is temporarily unavailable. Please check your connection and try again.");
            } finally {
                isSending = false;
                sendBtn.disabled = false;
            }
        }

        document.querySelectorAll("#eduverseAiSuggestions [data-prompt]").forEach(function (button) {
            button.addEventListener("click", function () {
                const prompt = button.getAttribute("data-prompt");
                if (prompt) sendMessage(prompt);
            });
        });

        form.addEventListener("submit", function (e) {
            e.preventDefault();
            const text = input.value.trim();
            if (!text) {
                return;
            }
            input.value = "";
            input.style.height = "auto";
            sendMessage(text);
        });

        // Enter to send, Shift+Enter for a new line.
        input.addEventListener("keydown", function (e) {
            if (e.key === "Enter" && !e.shiftKey) {
                e.preventDefault();
                form.requestSubmit();
            }
        });

        // Auto-grow the textarea a little as the user types.
        input.addEventListener("input", function () {
            input.style.height = "auto";
            input.style.height = Math.min(input.scrollHeight, 90) + "px";
        });

    });
})();
