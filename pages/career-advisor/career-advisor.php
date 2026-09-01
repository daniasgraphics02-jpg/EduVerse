<?php require_once __DIR__ . '/../../includes/config.php'; ?>
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AI Career Advisor | EduVerse</title>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/core/style.css">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/core/components.css">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/sidebar.css">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/header.css">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/footer.css">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/responsive.css">
<link rel="stylesheet" href="assets/css/career-advisor.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head><body>
<?php $activePage='ai-advisor'; include __DIR__ . '/../../includes/sidebar.php'; include __DIR__ . '/../../includes/header.php'; ?>
<main class="main-content"><div class="page-container career-page">
<section class="career-hero" id="careerIntro"><div class="career-orb orb-one"></div><div class="career-orb orb-two"></div>
<span class="career-eyebrow"><i class="bi bi-stars"></i> EDUVERSE AI CAREER ADVISOR</span>
<h1>Discover a Career Path That Fits <span>You</span></h1>
<p>This is not a generic course filter. Answer a short set of questions and EduVerse will assess your interests, strengths, experience and goals to suggest career paths, skill gaps and a practical learning roadmap.</p>
<div class="career-hero-actions"><button class="career-primary" id="startAssessment"><i class="bi bi-rocket-takeoff"></i> Start Career Assessment</button><a href="#howItWorks" class="career-secondary">How it works <i class="bi bi-arrow-down"></i></a></div>
<div class="career-trust"><span><i class="bi bi-chat-square-text"></i> 8–10 guided questions</span><span><i class="bi bi-diagram-3"></i> Personalized results</span><span><i class="bi bi-signpost-split"></i> Action roadmap</span></div></section>
<section class="assessment-shell hidden" id="assessmentShell" aria-live="polite"><div class="assessment-top"><div><span class="mini-label">CAREER ASSESSMENT</span><h2>Let's understand your profile</h2></div><button class="assessment-exit" id="restartAssessment" title="Start over"><i class="bi bi-arrow-counterclockwise"></i> Start over</button></div>
<div class="progress-row"><div class="progress-track"><span id="assessmentProgress"></span></div><span id="assessmentCounter">Question 1 of 9</span></div>
<div class="assessment-card"><div class="question-icon" id="questionIcon"><i class="bi bi-person-workspace"></i></div><h2 id="assessmentQuestion"></h2><p id="assessmentHint"></p><div id="assessmentOptions" class="assessment-options"></div><div id="assessmentTextWrap" class="assessment-text-wrap hidden"><textarea id="assessmentText" placeholder="Type your answer here..."></textarea><button id="nextTextQuestion" class="career-primary">Continue <i class="bi bi-arrow-right"></i></button></div></div></section>
<section class="analysis-state hidden" id="analysisState"><div class="analysis-loader"><i class="bi bi-cpu"></i></div><h2>Analyzing your career profile...</h2><p>Matching your interests, strengths, skills and goals with possible career directions.</p><div class="analysis-steps"><span class="active">Understanding your profile</span><span>Identifying career matches</span><span>Finding skill gaps</span><span>Building your roadmap</span></div></section>
<section class="results-shell hidden" id="resultsShell"></section>
<section id="howItWorks" class="how-it-works"><div><span class="section-badge">HOW IT WORKS</span><h2>From answers to action</h2></div><div class="how-grid"><article><b>01</b><i class="bi bi-chat-square-heart"></i><h3>Tell us about you</h3><p>Share your interests, education, skills and career goals through guided questions.</p></article><article><b>02</b><i class="bi bi-cpu"></i><h3>Get a career analysis</h3><p>See the career paths that best match your profile and why they fit.</p></article><article><b>03</b><i class="bi bi-map"></i><h3>Follow your roadmap</h3><p>Turn your result into clear next steps and explore relevant EduVerse resources.</p></article></div></section>
<?php include __DIR__ . '/../../includes/footer.php'; ?></div></main>
<script>window.EDUVERSE_BASE_URL='<?php echo BASE_URL; ?>';</script><script src="assets/js/career-advisor.js"></script><script src="<?php echo BASE_URL; ?>Assets/js/sidebar-header.js"></script>
</body></html>
