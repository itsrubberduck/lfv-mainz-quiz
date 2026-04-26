<?php
declare(strict_types=1);

date_default_timezone_set('Europe/Berlin');

const SCORE_FILE = __DIR__ . '/data/scores.json';

define('ADMIN_TOKEN', getenv('LFV_QUIZ_ADMIN_TOKEN') ?: 'lfv-mainz-admin');

$questions = [
    [
        'id' => 1,
        'question' => 'Was ist die Hauptenergiequelle eines Segelflugzeugs?',
        'answers' => ['A) Treibstoff', 'B) Aufwinde', 'C) Elektrizität', 'D) Batterien'],
        'correct' => 1,
    ],
    [
        'id' => 2,
        'question' => 'Wie nennt man aufsteigende Warmluft, die Segelflieger nutzen?',
        'answers' => ['A) Jetstream', 'B) Thermik', 'C) Kaltfront', 'D) Zyklon'],
        'correct' => 1,
    ],
    [
        'id' => 3,
        'question' => 'Welches Instrument misst die Steig- oder Sinkgeschwindigkeit?',
        'answers' => ['A) Höhenmesser', 'B) Kompass', 'C) Variometer', 'D) Fahrtmesser'],
        'correct' => 2,
    ],
    [
        'id' => 4,
        'question' => 'Was bedeutet „Gleitzahl“?',
        'answers' => ['A) Geschwindigkeit des Flugzeugs', 'B) Verhältnis von Höhe zu Strecke', 'C) Gewicht des Flugzeugs', 'D) Motorleistung'],
        'correct' => 1,
    ],
    [
        'id' => 5,
        'question' => 'Wie startet ein Segelflugzeug am häufigsten?',
        'answers' => ['A) Raketenstart', 'B) Schleppflugzeug', 'C) Katapult', 'D) Fallschirm'],
        'correct' => 1,
    ],
    [
        'id' => 6,
        'question' => 'Was ist ein „Bart“ im Segelflug?',
        'answers' => ['A) Eine Wolkenform', 'B) Ein Aufwindkern', 'C) Ein Flugfehler', 'D) Ein Instrument'],
        'correct' => 1,
    ],
    [
        'id' => 7,
        'question' => 'Welche Wolken zeigen oft Thermik an?',
        'answers' => ['A) Cirrus', 'B) Cumulus', 'C) Stratus', 'D) Nimbus'],
        'correct' => 1,
    ],
    [
        'id' => 8,
        'question' => 'Was ist ein „Hangaufwind“?',
        'answers' => ['A) Aufwind durch Motoren', 'B) Wind, der an einem Hang nach oben gedrückt wird', 'C) Fallwind', 'D) Gewitterwind'],
        'correct' => 1,
    ],
    [
        'id' => 9,
        'question' => 'Wofür steht das ICAO-Kennzeichen?',
        'answers' => ['A) Flugzeugfarbe', 'B) Internationale Registrierung', 'C) Pilotenschein', 'D) Wetterlage'],
        'correct' => 1,
    ],
    [
        'id' => 10,
        'question' => 'Wie nennt man den Teil des Fluges ohne Höhengewinn?',
        'answers' => ['A) Steigflug', 'B) Sinkflug', 'C) Geradeausflug', 'D) Gleitflug'],
        'correct' => 3,
    ],
    [
        'id' => 11,
        'question' => 'Was misst der Fahrtmesser?',
        'answers' => ['A) Höhe', 'B) Geschwindigkeit relativ zur Luft', 'C) Windrichtung', 'D) Steigrate'],
        'correct' => 1,
    ],
    [
        'id' => 12,
        'question' => 'Was ist ein „Seilriss“?',
        'answers' => ['A) Wetterphänomen', 'B) Zwischenfall beim Windenstart', 'C) Navigationsfehler', 'D) Landetechnik'],
        'correct' => 1,
    ],
    [
        'id' => 13,
        'question' => 'Welche Kraft hält das Flugzeug in der Luft?',
        'answers' => ['A) Reibung', 'B) Auftrieb', 'C) Schwerkraft', 'D) Magnetismus'],
        'correct' => 1,
    ],
    [
        'id' => 14,
        'question' => 'Was ist ein „Winglet“?',
        'answers' => ['A) Triebwerksteil', 'B) Flügelspitze zur Verbesserung der Aerodynamik', 'C) Cockpitinstrument', 'D) Fahrwerk'],
        'correct' => 1,
    ],
    [
        'id' => 15,
        'question' => 'Was bedeutet „Außenlandung“?',
        'answers' => ['A) Landung im Ausland', 'B) Landung außerhalb eines Flugplatzes', 'C) Notlandung im Wasser', 'D) Landung bei Nacht'],
        'correct' => 1,
    ],
    [
        'id' => 16,
        'question' => 'Welche Einheit wird für Höhe verwendet?',
        'answers' => ['A) Knoten', 'B) Meter oder Fuß', 'C) Pascal', 'D) Joule'],
        'correct' => 1,
    ],
    [
        'id' => 19,
        'question' => 'Was ist der Zweck eines Höhenruders?',
        'answers' => ['A) Steuerung nach links/rechts', 'B) Steuerung der Geschwindigkeit', 'C) Steuerung der Nickbewegung', 'D) Bremsen'],
        'correct' => 2,
    ],
    [
        'id' => 20,
        'question' => 'Was ist ein „Endanflug“?',
        'answers' => ['A) Startphase', 'B) Letzter Teil vor der Landung', 'C) Notverfahren', 'D) Steigflug'],
        'correct' => 1,
    ],
    [
        'id' => 21,
        'question' => 'Was ist ein „Trimmhebel“ im Segelflugzeug?',
        'answers' => ['A) Steuerung der Landeklappen', 'B) Einstellung der optimalen Steuerkraft', 'C) Notbremse', 'D) Funkgerät'],
        'correct' => 1,
    ],
    [
        'id' => 22,
        'question' => 'Was passiert bei zu hoher Geschwindigkeit im Sturzflug?',
        'answers' => ['A) Mehr Auftrieb', 'B) Strukturbelastung steigt', 'C) Besseres Gleiten', 'D) Weniger Widerstand'],
        'correct' => 1,
    ],
    [
        'id' => 23,
        'question' => 'Was ist die „Mindestgeschwindigkeit“ eines Segelflugzeugs?',
        'answers' => ['A) Schnellste Geschwindigkeit', 'B) Geschwindigkeit beim Start', 'C) Langsamste stabile Fluggeschwindigkeit', 'D) Landegeschwindigkeit'],
        'correct' => 2,
    ],
    [
        'id' => 24,
        'question' => 'Was ist ein „Strömungsabriss“?',
        'answers' => ['A) Motorausfall', 'B) Verlust des Auftriebs durch zu hohen Anstellwinkel', 'C) Funkstörung', 'D) Wetterwechsel'],
        'correct' => 1,
    ],
    [
        'id' => 25,
        'question' => 'Wozu dienen Bremsklappen?',
        'answers' => ['A) Geschwindigkeit erhöhen', 'B) Luftwiderstand erhöhen', 'C) Richtung ändern', 'D) Thermik finden'],
        'correct' => 1,
    ],
    [
        'id' => 26,
        'question' => 'Was ist eine „Landeeinteilung“?',
        'answers' => ['A) Flugplanung', 'B) Planung des Landeanflugs', 'C) Wartung', 'D) Wetteranalyse'],
        'correct' => 1,
    ],
    [
        'id' => 27,
        'question' => 'Was ist ein „Queranflug“?',
        'answers' => ['A) Startphase', 'B) Teil der Platzrunde quer zur Landebahn', 'C) Steigflug', 'D) Notverfahren'],
        'correct' => 1,
    ],
    [
        'id' => 28,
        'question' => 'Was beschreibt die „Platzrunde“?',
        'answers' => ['A) Flug um ein Gebirge', 'B) Standardverfahren für Start und Landung am Flugplatz', 'C) Kunstflugprogramm', 'D) Thermikkreis'],
        'correct' => 1,
    ],
    [
        'id' => 29,
        'question' => 'Was ist ein „F-Schlepp-Seil“?',
        'answers' => ['A) Funkkabel', 'B) Seil zwischen Segelflugzeug und Schleppflugzeug', 'C) Bremsseil', 'D) Fallschirmleine'],
        'correct' => 1,
    ],
    [
        'id' => 30,
        'question' => 'Was ist ein „Haubenabwurf“?',
        'answers' => ['A) Reinigung des Cockpits', 'B) Notverfahren zum Abwerfen der Cockpithaube', 'C) Starttechnik', 'D) Landeverfahren'],
        'correct' => 1,
    ],
    [
        'id' => 31,
        'question' => 'Was ist eine „Flugvorbereitung“?',
        'answers' => ['A) Nur Tanken', 'B) Planung von Wetter, Strecke und Flugzeug', 'C) Reinigung', 'D) Funkcheck'],
        'correct' => 1,
    ],
    [
        'id' => 32,
        'question' => 'Was ist ein „Checkflug“?',
        'answers' => ['A) Wettbewerb', 'B) Überprüfungsflug mit Fluglehrer', 'C) Nachtflug', 'D) Alleinflug'],
        'correct' => 1,
    ],
    [
        'id' => 33,
        'question' => 'Was ist ein „Alleinflug“?',
        'answers' => ['A) Flug ohne Funk', 'B) Flug ohne Fluglehrer an Bord', 'C) Flug ohne Plan', 'D) Flug im Ausland'],
        'correct' => 1,
    ],
    [
        'id' => 34,
        'question' => 'Was bedeutet „Landepriorität“?',
        'answers' => ['A) Wer zuerst startet', 'B) Reihenfolge der Landungen bei mehreren Flugzeugen', 'C) Geschwindigkeit beim Landen', 'D) Richtung des Windes'],
        'correct' => 1,
    ],
    [
        'id' => 35,
        'question' => 'Was ist ein „Winddreieck“?',
        'answers' => ['A) Flugzeugform', 'B) Grafische Darstellung von Wind und Kurs', 'C) Wolkenform', 'D) Starttechnik'],
        'correct' => 1,
    ],
    [
        'id' => 36,
        'question' => 'Was ist ein „Außencheck“?',
        'answers' => ['A) Funkprüfung', 'B) Kontrolle des Flugzeugs vor dem Start von außen', 'C) Wetterbericht', 'D) Landungstest'],
        'correct' => 1,
    ],
    [
        'id' => 37,
        'question' => 'Was ist ein „Startabbruch“?',
        'answers' => ['A) Geplanter Start', 'B) Unterbrechung des Starts aus Sicherheitsgründen', 'C) Landung', 'D) Steigflug'],
        'correct' => 1,
    ],
    [
        'id' => 38,
        'question' => 'Was ist ein „Flugleiter“?',
        'answers' => ['A) Pilot', 'B) Verantwortlicher für den Flugbetrieb am Platz', 'C) Mechaniker', 'D) Passagier'],
        'correct' => 1,
    ],
];

function jsonResponse(array $payload, int $status = 200): never
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

function readScores(): array
{
    if (!is_file(SCORE_FILE)) {
        return [];
    }

    $content = file_get_contents(SCORE_FILE);
    if ($content === false || trim($content) === '') {
        return [];
    }

    $scores = json_decode($content, true);
    if (!is_array($scores)) {
        return [];
    }

    return array_map('normalizeScore', $scores);
}

function writeScores(array $scores): void
{
    $dir = dirname(SCORE_FILE);
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }

    $json = json_encode($scores, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    file_put_contents(SCORE_FILE, $json . PHP_EOL, LOCK_EX);
}

function normalizeScore(array $score): array
{
    if (!isset($score['id'])) {
        $score['id'] = scoreId($score);
    }

    return $score;
}

function scoreId(array $score): string
{
    return substr(hash('sha256', implode('|', [
        (string) ($score['name'] ?? ''),
        (string) ($score['createdAt'] ?? ''),
        (string) ($score['timeMs'] ?? ''),
        (string) ($score['correct'] ?? ''),
    ])), 0, 16);
}

function publicScores(array $scores): array
{
    usort($scores, static function (array $a, array $b): int {
        return [$b['score'], $b['correct'], -$b['timeMs'], $b['createdAt']]
            <=> [$a['score'], $a['correct'], -$a['timeMs'], $a['createdAt']];
    });

    return array_slice(array_map(static function (array $score): array {
        return [
            'id' => $score['id'],
            'name' => $score['name'],
            'correct' => $score['correct'],
            'total' => $score['total'],
            'timeMs' => $score['timeMs'],
            'score' => $score['score'],
            'createdAt' => $score['createdAt'],
        ];
    }, $scores), 0, 10);
}

function questionMap(array $questions): array
{
    $map = [];
    foreach ($questions as $question) {
        $map[(string) $question['id']] = $question;
    }

    return $map;
}

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function isAdminRequest(): bool
{
    $token = (string) ($_GET['token'] ?? '');
    return $token !== '' && hash_equals(ADMIN_TOKEN, $token);
}

function renderAdmin(array $scores, string $message = ''): never
{
    usort($scores, static function (array $a, array $b): int {
        return [$b['score'], $b['correct'], -$b['timeMs'], $b['createdAt']]
            <=> [$a['score'], $a['correct'], -$a['timeMs'], $a['createdAt']];
    });

    $token = h((string) ($_GET['token'] ?? ''));
    $messageHtml = $message !== '' ? '<p class="admin-message">' . h($message) . '</p>' : '';

    echo '<!doctype html><html lang="de"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<title>LFV Mainz Quiz Backend</title><link rel="icon" type="image/svg+xml" href="assets/favicon.svg"><link rel="stylesheet" href="assets/styles.css"></head><body>';
    echo '<main class="admin-shell"><h1>Highscore Backend</h1>' . $messageHtml;
    echo '<form method="post" action="index.php?action=admin&token=' . $token . '" onsubmit="return confirm(\'Alle Highscores löschen?\')">';
    echo '<input type="hidden" name="admin_action" value="clear"><button class="primary-button" type="submit">Alle löschen</button></form>';

    if ($scores === []) {
        echo '<p class="empty-state">Keine Highscores vorhanden.</p>';
    } else {
        echo '<table class="admin-table"><thead><tr><th>Name</th><th>Richtig</th><th>Zeit</th><th>Punkte</th><th></th></tr></thead><tbody>';
        foreach ($scores as $score) {
            echo '<tr>';
            echo '<td>' . h((string) $score['name']) . '</td>';
            echo '<td>' . (int) $score['correct'] . '/' . (int) $score['total'] . '</td>';
            echo '<td>' . h(gmdate('i:s', (int) floor(((int) $score['timeMs']) / 1000))) . '</td>';
            echo '<td>' . (int) $score['score'] . '</td>';
            echo '<td><form method="post" action="index.php?action=admin&token=' . $token . '">';
            echo '<input type="hidden" name="admin_action" value="delete">';
            echo '<input type="hidden" name="score_id" value="' . h((string) $score['id']) . '">';
            echo '<button class="admin-delete" type="submit">Löschen</button></form></td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
    }

    echo '</main></body></html>';
    exit;
}

function answerId(int $questionId, int $answerIndex): string
{
    return hash('sha256', $questionId . ':' . $answerIndex . ':lfv-mainz-quiz');
}

function publicQuestion(array $question): array
{
    $answers = [];
    foreach ($question['answers'] as $index => $answer) {
        $text = preg_replace('/^[A-D]\)\s*/', '', $answer);
        $answers[] = [
            'id' => answerId((int) $question['id'], (int) $index),
            'text' => is_string($text) ? $text : $answer,
        ];
    }

    shuffle($answers);

    return [
        'id' => $question['id'],
        'question' => $question['question'],
        'answers' => array_values(array_map(static function (array $answer, int|string $index): array {
            return [
                'id' => $answer['id'],
                'text' => chr(65 + (int) $index) . ') ' . $answer['text'],
            ];
        }, $answers, array_keys($answers))),
    ];
}

$action = $_GET['action'] ?? null;

if ($action === 'admin') {
    if (!isAdminRequest()) {
        http_response_code(404);
        echo 'Nicht gefunden.';
        exit;
    }

    $scores = readScores();
    $message = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $adminAction = (string) ($_POST['admin_action'] ?? '');
        if ($adminAction === 'clear') {
            $scores = [];
            writeScores($scores);
            $message = 'Alle Highscores wurden gelöscht.';
        }

        if ($adminAction === 'delete') {
            $scoreId = (string) ($_POST['score_id'] ?? '');
            $before = count($scores);
            $scores = array_values(array_filter($scores, static function (array $score) use ($scoreId): bool {
                return !hash_equals((string) $score['id'], $scoreId);
            }));
            writeScores($scores);
            $message = count($scores) < $before ? 'Eintrag wurde gelöscht.' : 'Eintrag wurde nicht gefunden.';
        }
    }

    renderAdmin($scores, $message);
}

if ($action === 'questions') {
    $quizQuestions = $questions;
    shuffle($quizQuestions);
    $quizQuestions = array_slice($quizQuestions, 0, 15);

    jsonResponse([
        'questions' => array_map('publicQuestion', $quizQuestions),
    ]);
}

if ($action === 'scores') {
    jsonResponse(['scores' => publicScores(readScores())]);
}

if ($action === 'submit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $payload = json_decode(file_get_contents('php://input') ?: '', true);
    if (!is_array($payload)) {
        jsonResponse(['error' => 'Ungültige Anfrage.'], 400);
    }

    $name = trim((string) ($payload['name'] ?? ''));
    $answers = $payload['answers'] ?? [];
    $timeMs = (int) ($payload['timeMs'] ?? 0);

    if ($name === '' || mb_strlen($name) > 40) {
        jsonResponse(['error' => 'Bitte gib einen Namen mit maximal 40 Zeichen ein.'], 422);
    }

    if (!is_array($answers) || count($answers) !== 15 || $timeMs < 1000 || $timeMs > 30 * 60 * 1000) {
        jsonResponse(['error' => 'Quizdaten sind unvollständig.'], 422);
    }

    $map = questionMap($questions);
    $correct = 0;
    $seen = [];

    foreach ($answers as $questionId => $answerId) {
        $key = (string) $questionId;
        if (!isset($map[$key]) || isset($seen[$key]) || !is_string($answerId)) {
            jsonResponse(['error' => 'Antwortdaten sind ungültig.'], 422);
        }

        $seen[$key] = true;
        $correctAnswerId = answerId((int) $map[$key]['id'], (int) $map[$key]['correct']);
        if (hash_equals($correctAnswerId, $answerId)) {
            $correct++;
        }
    }

    $seconds = max(1, (int) ceil($timeMs / 1000));
    $score = max(0, ($correct * 100) - (int) floor($seconds / 5));

    $scores = readScores();
    $entry = [
        'id' => bin2hex(random_bytes(8)),
        'name' => htmlspecialchars($name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'),
        'correct' => $correct,
        'total' => 15,
        'timeMs' => $timeMs,
        'score' => $score,
        'createdAt' => date('c'),
    ];

    $scores[] = $entry;
    writeScores($scores);

    jsonResponse([
        'result' => $entry,
        'scores' => publicScores($scores),
    ]);
}
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LFV Mainz Segelflug-Quiz | Highscore Challenge</title>
    <meta name="description" content="Das Segelflug-Quiz des LFV Mainz mit Zeitwertung, Highscore und Top 10.">
    <link rel="icon" type="image/svg+xml" href="assets/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
<div id="app" class="app-shell">
    <header class="site-header">
        <a href="https://edfz.de/" aria-label="LFV Mainz">
            <img src="https://edfz.de/wp-content/uploads/2023/02/Luftfahrtverein_MZ_Logo_Book_2.png" alt="LFV Mainz Logo">
        </a>
        <div>
            <p class="eyebrow">Luftfahrtverein Mainz</p>
            <h1>Segelflug-Quiz</h1>
        </div>
    </header>

    <main class="layout">
        <section class="quiz-panel" aria-live="polite">
            <div v-if="screen === 'start'" class="start-screen">
                <p class="kicker">15 Fragen. Zufällige Reihenfolge. Zeit zählt.</p>
                <h2>Teste dein Segelflugwissen</h2>
                <label class="field-label" for="playerName">Name</label>
                <input id="playerName" v-model.trim="name" class="text-input" type="text" maxlength="40" autocomplete="name" placeholder="Dein Name">
                <button class="primary-button" type="button" :disabled="!name || loading" @click="startQuiz">
                    Quiz starten
                </button>
                <p v-if="error" class="error-text">{{ error }}</p>
            </div>

            <div v-else-if="screen === 'quiz' && currentQuestion" class="question-screen">
                <div class="quiz-meta">
                    <strong>Frage {{ currentIndex + 1 }} / {{ questions.length }}</strong>
                    <span>{{ formattedLiveTime }}</span>
                </div>
                <div class="progress" aria-hidden="true">
                    <span :style="{ width: progress + '%' }"></span>
                </div>
                <h2>{{ currentQuestion.question }}</h2>
                <div class="answers">
                    <button
                        v-for="(answer, index) in currentQuestion.answers"
                        :key="answer.id"
                        class="answer-button"
                        :class="{ selected: answers[currentQuestion.id] === answer.id }"
                        type="button"
                        @click="selectAnswer(index)"
                    >
                        {{ answer.text }}
                    </button>
                </div>
                <button class="primary-button" type="button" :disabled="answers[currentQuestion.id] === undefined" @click="nextQuestion">
                    {{ currentIndex === questions.length - 1 ? 'Auswerten' : 'Weiter' }}
                </button>
            </div>

            <div v-else-if="screen === 'result' && result" class="result-screen">
                <p class="kicker">Dein Ergebnis</p>
                <h2>{{ result.correct }} von {{ result.total }} richtig</h2>
                <div class="result-grid">
                    <div>
                        <span>Zeit</span>
                        <strong>{{ formatTime(result.timeMs) }}</strong>
                    </div>
                    <div>
                        <span>Highscore</span>
                        <strong>{{ result.score }}</strong>
                    </div>
                </div>
                <button class="primary-button" type="button" @click="startQuiz">
                    Nochmal spielen
                </button>
            </div>

            <div v-else class="loading-state">Quiz wird geladen.</div>
        </section>

        <aside class="score-panel">
            <div class="score-heading">
                <div>
                    <p class="eyebrow">Top 10</p>
                    <h2>Highscore</h2>
                </div>
                <button class="icon-button" type="button" title="Highscore aktualisieren" @click="loadScores">↻</button>
            </div>

            <ol class="score-list">
                <li v-for="(score, index) in scores" :key="score.createdAt + score.name" :class="{ podium: index < 3 }">
                    <button v-if="index < 3" class="medal" type="button" :title="'Konfetti für Platz ' + (index + 1)" @click="confetti">
                        {{ medals[index] }}
                    </button>
                    <span v-else class="rank">{{ index + 1 }}</span>
                    <div>
                        <strong>{{ score.name }}</strong>
                        <span>{{ score.correct }}/{{ score.total }} richtig · {{ formatTime(score.timeMs) }}</span>
                    </div>
                    <b>{{ score.score }}</b>
                </li>
            </ol>

            <p v-if="scores.length === 0" class="empty-state">Noch keine Einträge.</p>
        </aside>
    </main>

    <footer class="site-footer">
        <a href="https://edfz.de/">Impressum</a>
    </footer>
</div>

<script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
<script src="assets/app.js"></script>
</body>
</html>
